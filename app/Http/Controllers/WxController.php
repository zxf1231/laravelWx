<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\User as WxUser;

class WxController extends Controller
{
    //

    public function index()
    {

//        dd(env('WX_SEC'));

        // $encodingAESKey 可以为空
        $server = new Server( env('WX_ID') , env('WX_TOKEN') );

        $server->on('event' , 'subscribe' , [$this , 'guanzhu']);
        $server->on('event' , 'unsubscribe' , [$this , 'qxgz']);

        return $server->serve();


    }

    public function guanzhu($event)
    {
        $wxuser=new WxUser(env('WX_ID') , env('WX_SEC'));
        $wu=$wxuser->get($event->FromUserName);
//        $user=new User();
//        $user->openid=$event->FromUserName;
//        $user->name=$wu->nickname;
//        $user->subtime=time();
//        $user->save();

        $msg='欢迎你，'.$wu;
        return $msg;
    }

}
