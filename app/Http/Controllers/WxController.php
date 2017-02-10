<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\User as WxUser;
use Overtrue\Wechat\QRCode;

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
        $user=new User();
        $user->openid=$event->FromUserName;
        $user->name=$wu->nickname;
        $user->subtime=time();
        $user->save();
        $this->qr($user->uid);






        $msg='欢迎你，'.$event->FromUserName;
        return $msg;
    }

    public function qr($uid)
    {
        //开始生成二维码
        $qrcode=new QRCode(env('WX_ID') , env('WX_SEC'));
        $result=$qrcode->forever($uid);
        $ticket=$result->ticket;
        //下载二维码
        $qrcode->download($ticket,public_path().$this->mkd().'/'.'qr_'.$uid.'.jpg');
    }

    protected function mkd()
    {
        $path=date('/Y/md');
        if(!is_dir(public_path().$path)){
            mkdir(public_path().$path,0777,true);
        }
        return $path;

    }

}
