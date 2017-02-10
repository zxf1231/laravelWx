<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Wechat\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        if($request->session()->get('user')){
            return redirect('/');
        }
        $auth=new Auth(env('WX_ID'),env('WX_SEC'));
        $to='http://59.110.137.30/login';
        $user=$auth->authorize($to);
        $request->session()->put('user',$user->all());
        return back();
    }

//    public function index(Request $request)
//    {
//        if(!$request->session()->get('user')){
//            return redirect('/login');
//        }
//        dd($request->session()->get('user'));
//
//    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        echo "logout out";
    }
}
