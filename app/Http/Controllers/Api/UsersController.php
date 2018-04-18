<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
/*use Illuminate\Http\Request;*/

use DB;
use App\Poste;
use App\User;
use Auth;

use Validator;

class UsersController extends Controller
{
    public function login(/*Request $request*/)
    {
        $ruls = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $validate = Validator::make(request()->all(), $ruls);

        if ($validate->fails()) {
            return response(['status' => false, 'messages' => $validate->messages()]);
        } else {
            if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
                $user= auth()->user();
                $user->api_token = str_random(16);
                $user->save();
                return response(['status'=>true, 'user'=>$user,'token'=>$user->api_token]);
            }else{
                return response(['status' => false, 'messages' => 'Invaild Login']);
            };
        }
    }
}
