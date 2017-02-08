<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WxController extends Controller
{
    //

    public function index()
    {
        define('TOKEN','php_zxf');
        $server=new Server(env('WX_ID'),env('WX_TOKEN'));
        return $server->server();

    }
}
