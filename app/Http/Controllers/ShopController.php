<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Cart;

class ShopController extends Controller
{
    //

    protected $gs = [
        1=>['goods_id'=>1,'goods_name'=>'白百合 清香宜人', 'price'=>23.1],
        2=>['goods_id'=>2,'goods_name'=>'红玫瑰 热烈奔放', 'price'=>23.2],
        3=>['goods_id'=>3,'goods_name'=>'黄牡丹 雍容华贵', 'price'=>23.3],
        4=>['goods_id'=>4,'goods_name'=>'狗尾巴 淡泊名利', 'price'=>23.4],
    ];

    public function index(Request $request)
    {

        if(!$request->session()->get('user')){
            return redirect('/login');
        }
        return view('index',['gs'=>$this->gs]);
    }


    public function goods($gid)
    {
        $g=$this->gs[$gid];

        return view('goods',$g);
    }

    public function buy($gid)
    {
        $g=$this->gs[$gid];
//        Cart::add(1,'nokia',23,2);
//        $gs=Cart::getContent();
//        dd($gs);

    }
}
