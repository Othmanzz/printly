<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $data['categories']   = [];
         $data["home_banner"] = DB::selectOne("select * from banners where id = 1 ");
         $categories = DB::select("select * from categories order by id desc");
         foreach($categories as $category){
            $products = DB::select("select * from products where category = '$category->id' order by id desc");

             $data['categories'][] = array(
                 'id' => $category->id,
                 'name' => $category->name,
                 'products' => $products,
             );
         }
         $data["carts"] = DB::select("select c.id as cart_id , p.product_name  from carts as c left join products as p on c.product_id = p.id where c.user_id = '".Auth::id()."' order by c.id desc");

        $data["products"] = DB::select("select u.name , u.id ,p.id as product_id ,p.desc as product_desc , p.image as image , p.price,
         p.product_name  from products as p left join users as u on p.from = u.id where p.accepted = 1 order by p.id desc limit 6");

        return view('site.index',$data);
    }


    public function products(Request $request , $limit = 0){
        $data = [];

        $data["products"] = DB::select("select u.name , u.id ,p.id as product_id , p.product_name  from products as p left join users as u on p.user_id = u.id where p.accepted = 1  order by p.id desc");


        return $data;
    }
}
