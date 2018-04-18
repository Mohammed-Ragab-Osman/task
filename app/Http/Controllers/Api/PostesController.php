<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Poste;
use App\User;

class PostesController extends Controller
{
    public function all_posts()
    {
        $all_post = Poste::OrderBy('id', 'desc')->paginate(2);
        return response(['all_post', $all_post]);
    }

    public function add_posts(Request $request)
    {
        $this->validate(request(), [
            'text' => 'required|string|max:200',
        ]);
        $post = new Poste();

        $api_token = $request->input('api_token');
        $user = DB::table('users')->where('api_token', $api_token)->first();
        $post->user_id = $user->id;
        $post->test = $request->text;
        $post->save();
        return response(['post', $post]);

    }

    public function deletepost(Request $request)
    {
        $id = $request->input('id');
        if (isset($id)) {
            $post = DB::table('postes')->where('id', $id)->delete();
            return response(['messages', 'this post is deleted']);
        } else {
            return response(['messages', 'please select any id']);
        }
    }

    public function updatepost(Request $request)
    {


        $this->validate(request(), [
            'text' => 'required|string|max:200',
        ]);

        /*id 	user_id 	post 	created_at 	updated_at 	otherpost */
        $id = $request->input('id');
        if (isset($id)) {
            DB::table('postes')->where('id', $id)->update(array(
                'test' => $request->input('text'),
            ));
            return response(['messages', 'this post is Updated']);

        } else {
            return response(['messages', 'please select any id']);
        }

    }

}
