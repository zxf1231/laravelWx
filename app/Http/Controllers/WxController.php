<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Wechat\Server;

class WxController extends Controller
{
    //

    public function index()
    {


        // $encodingAESKey 可以为空
        $server = new Server( env('WX_ID') , env('WX_TK') );

        $server->on('event' , 'subscribe' , [$this , 'guanzhu']);
        $server->on('event' , 'unsubscribe' , [$this , 'qxgz']);

        return $server->serve();


    }
}
