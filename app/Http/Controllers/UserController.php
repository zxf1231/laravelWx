<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Wechat\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $auth=new Auth(env('WX_ID'),env('WX_SEC'));
        $user=$auth->authorize();
        $request->session()->put('user',$user->all());
        return back();
    }
}
