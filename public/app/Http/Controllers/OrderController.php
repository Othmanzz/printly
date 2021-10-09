<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class OrderController extends Controller
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
        //
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
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $payment_method = $request->post('payment_method') ?? 'wallet';
        $address = $request->post('address') ?? 'EGYPT';
        $city = $request->post('city') ?? '';
        $zone = $request->post('zone') ?? '';
        $currency = $request->post('currency') ?? 'SAR';
        $orderId = 0;

        $cart = new CartController();
        $get_products = $cart->myCartsForOrder(Auth::id());
        $total = $cart->getCartTotal(Auth::id());
        $user = ProfileController::getUser(Auth::id());
        if ($get_products["cart_total"] > 0) {
            // ready to create order
            DB::insert("insert into orders (`name`,`total`,`user_id`,`payment_method` , `address`,`zone`,`city` ,`currency`,`created_at`,`updated_at`)
            VALUES ('$user->name' , '$total' , '" . Auth::id() . "','$payment_method' ,'$address','$zone','$city','$currency','$created_at','$updated_at') ");
            $orderId =  DB::getPdo()->lastInsertId();

            foreach ($get_products["products"] as $product) {
                DB::insert("insert into `orders_products` (`product_id`,`type`,`order_id` ,`quantity` , `total`)
                  VALUES ('" . $product["product_id"] . "' ,'" . $product["type"] . "','$orderId' , '" . $product["quantity"] . "' , '" . $product["total"] . "')");
                DB::delete("delete from carts where product_id = '" . $product["product_id"] . "' and user_id = '" . Auth::id() . "'");
            }
        }
        if(in_array($payment_method , ["cod" , "pranch_payment"])){
            return redirect('/myorders');
        }
        return redirect('/checkout/' . $orderId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $data = [];
        $get_order = DB::selectOne("select * from orders where id = '$orderId' and user_id = '" . Auth::id() . "'");
        if (!$get_order) {
            return view(404);
        }
        $data["order_custom_products"] = DB::select("select * from `orders_products` as op left join custom_products as p on op.product_id = p.id where op.type = 1 and op.order_id =  '$id'");

        $data["order_products"] = DB::select("select * from orders_products where order_id = '$get_order->id' ");

        return view('site.orders.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public static function add_order_history($orderId, $comment = '')
    {
        $get_order = DB::selectOne("select u.name , u.email , o.id ,o.user_id from orders as o left join users as u on o.user_id = u.id where o.id = '$orderId'");
        if (!$get_order) {
            return null;
        }
        if ($comment == "" || empty($comment)) {
            $comment = "تم تغير حالة الطلب الي " . OrderController::getOrderStatus($orderId);
        }
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        DB::insert("insert into order_history (`order_id`, `comment` ,`created_at` , `updated_at`)
       VALUES ('$orderId', '$comment' , '$created_at','$updated_at')");
        MailController::html_email($get_order->name, $get_order->email, 'تحديث الطلب', $comment);
    }



    public static function getOrderStatus($id)
    {

        $order_status = DB::selectOne("select o.status , os.name , os.id from orders as o left join order_status as os on o.status = os.id where o.id = '$id'");
        return isset($order_status) ? $order_status->name : '';
    }
}
