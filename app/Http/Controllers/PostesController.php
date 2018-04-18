<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Poste;
use App\User;
use Auth;

class PostesController extends Controller
{
    public function addpost()
    {
        return view('layouts.post.addpost');
    }

    public function storepost(Request $request)
    {

        /*id 	user_id 	test 	created_at 	updated_at */
        $this->validate(request(), [
            'text' => 'required|string|max:200',
        ]);


        $post = new Poste();
        $post->user_id = Auth::user()->id;
        $post->test = $request->text;
        $post->save();
        return redirect('/all-post')->with('success', 'لقد تم ارسال رسالتك بنجاح !!');

    }

    public function allpost()
    {

        $post = DB::table('postes')->where('user_id', Auth::user()->id)->get();
        return view('layouts.post.all_postes')->with('post', $post)->with('success', 'لقد تم ارسال سؤالك بنجاح !!');
    }

    public function deletepost($id)
    {
        $post = DB::table('postes')->where('id', $id)->delete();
        return back()->with('success', 'لقد تم الحذف  بنجاح !!');
    }

    public function editpost($id)
    {

        $post = DB::table('postes')->where('id', $id)->first();
        return view('layouts.post.addpost')->with('post', $post);
    }

    public function updatepost($id, Request $request)
    {


        $this->validate(request(), [
            'text' => 'required|string|max:200',
        ]);

        /*id 	user_id 	post 	created_at 	updated_at 	otherpost */

        DB::table('postes')->where('id', $id)->update(array(
            'test' => $request->text,
        ));

        return redirect('/all-post')->with('success', 'لقد تم التعديل بنجاح !!');
    }
}
