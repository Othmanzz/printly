<?php

namespace App\Http\Controllers;

use App\Models\PrintMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintManController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('printman');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $get_order = DB::select("select * from orders  order by id desc");
        // if (!$get_order) {
        //     return view(404);
        // }
        $data["order_route"] = 'printorders';
        $data["show_order_route"] = 'show_printporder';
        $data["orders"] = $get_order;
        return view('admin.orders.orders', $data);
    }

    public function show($id)
    {
        $data = [];
        $get_order = DB::selectOne("select * from orders where `id` = '$id' ");
        if (!$get_order) {
            return view(404);
        }
        $data["order_route"] = 'printorders';
        $data["show_order_route"] = 'show_rporder';
        $data["change_order_status"] = 'printchange_order_status';
        $data["admin"] = false;

        $data["order"] = $get_order;
        $data['user'] = ProfileController::getUser($get_order->user_id);
        $data["order_status"] = DB::select("select * from order_status order by id desc");
        $data["order_history"] = DB::select("select *  from order_history where order_id = $id order by id desc");
        $data["order_custom_products"] = DB::select("select * from `orders_products` as op left join custom_products as p on op.product_id = p.id where op.type = 1 and op.order_id =  '$id'");
        $data["order_stickers_products"] = DB::select("select * from `orders_products` as op left join stickers_products as p
        on op.product_id = p.id left join stickers_paper_prices as sp on p.price_id = sp.id where op.type = 2 and op.order_id =  '$id'");

        $data["order_personal_card_products"] = DB::select("select * from `orders_products` as op left join personal_cards_products as p
        on op.product_id = p.id left join personal_cards_prices as sp on p.price_id = sp.id where op.type = 3 and op.order_id =  '$id'");

        $data["order_posters_products"] = DB::select("select * from `orders_products` as op left join posters_products as p
        on op.product_id = p.id left join posters_size as sp on p.price_id = sp.id where op.type = 5 and op.order_id =  '$id'");

        $data["order_rollups_products"] = DB::select("select * from `orders_products` as op left join rollups_products  as p
        on op.product_id = p.id left join rollups_size  as sp on p.price_id = sp.id where op.type = 5 and op.order_id =  '$id'");

        $data["order_products"] = DB::select("select * from `orders_products` as op left join products as p on op.product_id = p.id where op.order_id =  '$id'");
        return view('admin.orders.show', $data);
    }

    public function change_order_status($id, Request $request)
    {
        $status = $request->post('status') ?? 1;
        $comment = $request->post('comment') ?? '';

        $order = DB::selectOne("select id from orders where id = '$id' ");
        if ($order) {
            DB::update("update orders set `status` = '$status' where `id` = '$id' ");
               OrderController::add_order_history($id , $comment);
        }

        return redirect()->back()->with('success', __('public.sent_done'));
    }
}
