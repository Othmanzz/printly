<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        $data["covers"] = [];
        $total_price = 0;
        $data["products"] = DB::select("select c.id as c_id , p.image , p.id , c.quantity , p.product_name ,p.desc, p.price from `carts` as c left join products as p on
         c.product_id = p.id where c.type = '0' and c.user_id = '" . Auth::id() . "'");


         $get_carts = DB::select("select p.id as c_id from `carts`
         as c left join custom_products as p on
         c.product_id = p.id   where c.type = '1' and c.user_id = '".Auth::id()."' ");
         $files = [];
         foreach ($get_carts as $cart) {
             $files[] = $cart->c_id;
         }
        $files = implode("','",$files);
        $files = "'$files'";

        $covers = DB::select("select * from cover_type as c left join custom_products_files as f on c.id = f.cover_type where f.custom_product in ($files) ");
        foreach($covers as $cover){
         $files = DB::select("select * from `custom_products_files` where custom_product in ($files) and cover_type = $cover->cover_type ");
         $filesarray= [];

         foreach($files as $file){
             $get_file_prop = DB::selectOne("select * from price_list where id = $file->price_id");
             if($get_file_prop){
                 $paper_type = DB::selectOne("select * from papers_type where id = $get_file_prop->paper_type");
                 $paper_size = DB::selectOne("select * from papers_size where id = $get_file_prop->paper_id");
                 $printer_color = DB::selectOne("select * from printer_color where id = $get_file_prop->printer_color");
                 $printer_method = DB::selectOne("select * from printer_method where id = $get_file_prop->printer_method");
                 $paper_slice = DB::selectOne("select * from papers_slice where id = $get_file_prop->paper_slice");
                 $printer_type = DB::selectOne("select * from printer_type where id = $get_file_prop->printer_type");

                 $prop = $paper_size->name.'-'.$paper_type->name.'-'.$printer_color->name.'-'.$printer_method->name.'-'.$printer_type->name.'-'.$paper_slice->name;
             }else{
                 $prop = 'لم يتم تحديد الخصائص بعد';
             }



            $filesarray[] =  array(
                 'number_of_pages' => $file->number_of_pages,
                 'file' => $file->file,
                 'id' =>$file->id,
                 'prop' => $prop,
                 'total' => $file->total,
                 'quantity' => $file->quantity

             );
         }
         $data["covers"][] = array(
             'id' => $cover->cover_type,
             'name' =>$cover->name,
             'photo' =>$cover->photo,
              'custom_product_id' => $cover->custom_product,
             'files' => $filesarray,
         );
        }

        $get_carts =DB::select("select p.id as c_id from `carts`
        as c left join custom_products as p on
        c.product_id = p.id   where c.type = '1' and c.user_id = '".Auth::id()."' ");
        $files = [];
        foreach ($get_carts as $cart) {
            $files[] = $cart->c_id;
        }
       $files = implode("','",$files);
       $files = "'$files'";
       if($files != ""){
        $data["custom_products"] = DB::select("select * from custom_products_files
        where custom_product in ($files) and cover_type = 0 ");

       }else{
        $data["custom_products"] = [];
       }


        if (!$data["products"] && !$data["custom_products"]) {
            return redirect()->back()->with('error', 'السلة فارغة');
        }

        foreach ($data["products"] as $product) {
            $total_price += $product->quantity * $product->price;
        }
         $get_total = DB::selectOne("select SUM(total) as total from  custom_products_files where custom_product in ($files)");
        if ($get_total) {
            $total_price += $get_total->total;
        }
        $data["total_price"] = $total_price;
        return view('site.cart.cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $quantity = $request->post('quantity') ?? 1;
        $productId = $request->post('product_id');
        $type = $request->post('type') ?? 0;
        $userId = Auth::id();
        $ip = $request->ip();
        $checkCart = DB::selectOne("select * from carts where `user_id` = '$userId' and `product_id` = '$productId' ");
        if ($checkCart) {
            $quantity = $checkCart->quantity + $quantity;
            DB::update("update carts set quantity = '$quantity' where product_id = '$productId' and user_id = '$userId' and `id` = '$checkCart->id' ");
            $data["message"] = "تم تحديث السلة";
        } else {
            DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
            VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");
            $data["message"] = "تم الاضافة الي السلة";
        }
        $carts = DB::select("select * from carts  where user_id = '" . Auth::id() . "'");

        if ($type == 1) {
            DB::update("update custom_products set complete = 1 where id = $productId");
        }

        return response()->json(['success' => '1', 'total' => count($carts), 'data' =>  $data]);
    }

    public function remove_from_cart(Request $request)
    {
        $key = $request->post('key');
        $userId = Auth::id();
        $checkCart = DB::selectOne("select * from carts where `user_id` = '$userId' and `id` = '$key' ");
        if ($checkCart) {
            DB::delete("delete from carts where key = '$key'");
        }

        return redirect()->back()->with('success', __('public.deleted'));
    }


    public function update_cart(Request $request)
    {
        foreach ($request->post['quantity'] as $key => $value) {
            $this->update($key, $value);
        }
        return redirect()->back()->with('success', __('public.updated_success'));
    }
    public function  update($key, $quantity)
    {
        // $key = $request->post('key');
        // $quantity = $request->post('quantity');

        $userId = Auth::id();
        $checkCart = DB::selectOne("select * from carts where `user_id` = '$userId' and `id` = '$key' ");
        if ($checkCart) {
            DB::update("update carts set quantity = '$quantity'  where key = '$key'");
        }
    }

    public function myCartsForOrder($user_id)
    {
        $data = [];
        $carts = DB::select("select p.product_name ,p.price, c.quantity , c.product_id , c.type  , c.id  from `carts` as c left join products as p on c.product_id = p.id  where c.user_id = '" . $user_id . "' ");
        $data['cart_total'] = count($carts);
        foreach ($carts as $cart) {
            $data["products"][] = array(
                'product_name' => $cart->product_name,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'type' => $cart->type,
                'cart_id' => $cart->id,
                'total' => $cart->quantity * $cart->price,

            );
        }

        return $data;
    }


    public function getCartTotal($userId)
    {
        $data = [];
        $total = 0;
        $carts = DB::select("select c.user_id ,p.price  , c.quantity from `carts` as c left join products as p on c.product_id = p.id   where c.user_id = '" . $userId . "' ");
        foreach ($carts as $cart) {
            $total = $total + ($cart->price * $cart->quantity);
        }
        return $total;
    }


    public function destroy(Request $request)
    {
        $key = $request->post('key');
        $userId = Auth::id();
        $checkCart = DB::selectOne("select * from carts where `user_id` = '$userId' and `id` = '$key' ");
        if ($checkCart) {
            DB::update("DELETE FROM `carts` WHERE  `id` = '$key'");
            $carts = DB::select("select * from carts  where user_id = '" . Auth::id() . "'");

            return response()->json(['success' => '1', 'total' => count($carts), 'message' =>  'تم تعديل السلة']);
        }


        $carts = DB::select("select * from carts  where user_id = '" . Auth::id() . "'");

        return response()->json(['success' => '0', 'total' => count($carts), 'message' =>  'يةجد شئ خطا  ']);
    }

    public function coupon(Request $request)
    {

        $json = array();
        $coupon = $request('coupon');


        if (isset($coupon)) {
            $coupon = $request('coupon');
        } else {
            $coupon = '';
        }

        $coupon_info = $this->model_extension_total_coupon->getCoupon($coupon);

        if (empty($this->request->post['coupon'])) {
            $json['error'] = $this->language->get('error_empty');

            unset($this->session->data['coupon']);
        } elseif ($coupon_info) {
            $this->session->data['coupon'] = $this->request->post['coupon'];

            $this->session->data['success'] = $this->language->get('text_success');

            $json['redirect'] = $this->url->link('checkout/cart');
        } else {
            $json['error'] = $this->language->get('error_coupon');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
