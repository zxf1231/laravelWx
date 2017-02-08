<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class WxController extends Controller
{
    //

    public function index()
    {
        $options = [
            'debug'     => true,
            'app_id'    => 'wxa83770b393b6a056',
            'secret'    => 'f5dfaf9af9184351631029ae3bfb2db5',
            'token'     => 'php_zxf',
            'log' => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log',
            ],
            // ...
        ];

        $app = new Application($options);

        $server = $app->server;

    }
}
