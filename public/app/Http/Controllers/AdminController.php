<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];

        return view('admin.home', $data);
    }

    public function users(Request $request)
    {
        $data = [];
        $type = $request->get("type");

        if(!is_numeric($type)){
            $type = '!=1';
        }else{
            $type = '='.$type;
        }

        $data["users"] = DB::select("select * from users where  type $type ");
        return view('admin.users.index', $data);
    }
    public function add_user()
    {
        $data = [];

        return view('admin.users.add', $data);
    }
    public function show_user($id)
    {
        $data = [];
        $data["user"] = DB::selectOne("select * from users where id = $id and type != 1 ");
        if (!$data["user"]) {
            return view(404);
        }
        return view('admin.users.edit', $data);
    }

    public function orders()
    {
        $data = [];
        $get_order = DB::select("select * from orders order by id desc");
        if (!$get_order) {
            return view(404);
        }
        $data["order_route"] = 'aorders';
        $data["show_order_route"] = 'show_aorder';
        $data["orders"] = $get_order;
        return view('admin.orders.orders', $data);
    }

    public function show_order($id)
    {
        $data = [];
        $get_order = DB::selectOne("select * from orders where `id` = '$id'");
        if (!$get_order) {
            return view(404);
        }
        $data["order_route"] = 'aorders';
        $data["show_order_route"] = 'show_aporder';
        $data["change_order_status"] = 'achange_order_status';
        $data["representatives"] = DB::select("select id , name from users where type = 3 order by id desc");
        $data["order_history"] = DB::select("select *  from order_history where order_id = $id order by id desc");

        $data["order"] = $get_order;
        $data["admin"] = true;
        $data['user'] = ProfileController::getUser($get_order->user_id);
        $data["order_status"] = DB::select("select * from order_status order by id desc");
        $data["order_products"] = DB::select("select * from `orders_products` as op left join products as p on op.product_id = p.id where op.type = 0 and op.order_id =  '$id'");
        $data["order_custom_products"] = DB::select("select * from `orders_products` as op left join custom_products as p on op.product_id = p.id where op.type = 1 and op.order_id =  '$id'");
        $data["order_stickers_products"] = DB::select("select * from `orders_products` as op left join stickers_products as p
         on op.product_id = p.id left join stickers_paper_prices as sp on p.price_id = sp.id where op.type = 2 and op.order_id =  '$id'");

         $data["order_personal_card_products"] = DB::select("select * from `orders_products` as op left join personal_cards_products as p
         on op.product_id = p.id left join personal_cards_prices as sp on p.price_id = sp.id where op.type = 3 and op.order_id =  '$id'");

         $data["order_posters_products"] = DB::select("select * from `orders_products` as op left join posters_products as p
         on op.product_id = p.id left join posters_size as sp on p.price_id = sp.id where op.type = 5 and op.order_id =  '$id'");

         $data["order_rollups_products"] = DB::select("select * from `orders_products` as op left join rollups_products  as p
         on op.product_id = p.id left join rollups_size  as sp on p.price_id = sp.id where op.type = 5 and op.order_id =  '$id'");


        return view('admin.orders.show', $data);
    }

    public function store_user(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'unique:users,email',
            'phone' => ['required', 'string', 'min:8'],

            // 'name_ar' => 'required|unique:papers_type,name',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'email.exists' => __('public.already_exsist'),
            'phone.required' => __('public.filed_required'),
            'phone.min' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post('name');
        $email = $request->post('email');
        $phone = $request->post('phone');
        $type = $request->post('type');

        $password = $request->post('password');
        $password = Hash::make($password);


        DB::update("insert into  users  (`name` , `email` , `type` , `phone` , `password` ) VALUES
         ('$name' , '$email' , '$type' , '$phone' ,'$password') ");

        return redirect()->back()->with('success', __('public.update_success'));
    }

    public function update_user($id, Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'unique:users,email,' . $id,
            'phone' => ['required', 'string', 'min:8'],

            // 'name_ar' => 'required|unique:papers_type,name',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'email.exists' => __('public.already_exsist'),
            'phone.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post('name');
        $email = $request->post('email');
        $phone = $request->post('phone');
        $type = $request->post('type');

        $password = $request->post('password');
        if (isset($password)) {
            $password = Hash::make($password);
            DB::update("update users set password = '$password'  where `id` = $id");
        }


        DB::update("update users set `name` = '$name' , `type` = '$type', `email` = '$email' ,`phone` = '$phone' where `id` = $id");

        return redirect()->back()->with('success', __('public.update_success'));
    }

    public function banners()
    {
        $data = [];
        $data["banners"] = DB::select("select * from banners order by id desc ");
        return view('admin.banners.index', $data);
    }

    public function create_banner()
    {
        $data = [];

        return view('admin.banners.add', $data);
    }


    public function store_banner(Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required',
            'link' => 'required',
            'photo' => 'required',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'link.required' => __('public.filed_required'),
            'photo.required' => __('public.filed_required'),

        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post('name');
        $link = $request->post('link');


        $photo = $request->file('photo');
        $input = '';
        if ($photo) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/banners/';
            $photo->move($destinationPath, $input);
        }

        DB::insert("insert into `banners` (`name` , `link`,`photo` ,  `created_at`  , `updated_at`)
        VALUES ('$name','$link','$input',  '$created_at', '$updated_at' ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }


    public function edit_banner($id)
    {
        $data = [];
        $data["banner"] = DB::selectOne("select * from `banners` where `id` = '$id'");

        if (!$data["banner"]) {
            return view(404);
        }

        return view('admin.banners.edit', $data);
    }

    public function update_banner($id, Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required',
            'link' => 'required',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'link.required' => __('public.filed_required'),

        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post('name');
        $link = $request->post('link');
        $photo = $request->file('photo');
        $input = '';
        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/banners/';
            $photo->move($destinationPath, $input);
        } else {
            $input = $request->post('old_image');
        }

        DB::insert("update `banners` set `name` ='$name', `link` = '$link',`photo` = '$input' ,
        `created_at` = '$created_at' , `updated_at` = '$updated_at'
         where id = $id ");
        return redirect()->back()->with('success', __('public.updated_success'));
    }


    public function assgined_to($id, Request $request)
    {
        $represnt_id = $request->post('rep_id') ?? 0;
        $order = DB::selectOne("select id from orders where id = '$id' ");
        if ($order) {
            DB::update("update orders set `represnt_id` = '$represnt_id' where `id` = '$id' ");
        }

        return redirect()->back()->with('success', __('public.sent_done'));
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
