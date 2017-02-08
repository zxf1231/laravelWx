<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Wechat\Server;

class WxController extends Controller
{
    //

    public function index()
    {

//        dd(env('WX_ID'));

        // $encodingAESKey 可以为空
        $server = new Server( env('WX_ID') , env('WX_TOKEN') );

        $server->on('event' , 'subscribe' , [$this , 'guanzhu']);
        $server->on('event' , 'unsubscribe' , [$this , 'qxgz']);

        return $server->serve();


    }
}
