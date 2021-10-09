<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function myOrders()
    {
        $data = [];

        $data["orders"] = DB::select("select * from `orders` where `user_id` = '" . Auth::id() . "' ");

        return view('site.profile.myorder');
    }


    public static function getUser($userId)
    {
        return DB::selectOne("select * from `users` where `id` = '$userId'");
    }

    public static function getWalletBalance()
    {
         $wallet = DB::selectOne("select * from `wallets` where `user_id` = '".Auth::id()."'");
         if($wallet){
            return $wallet->amount;

         }
         return 0;
    }

     public function edit(){
         $data  =[];

         $data["user"] = DB::selectOne("select * from `users` where `id` = '".Auth::id()."'");
         return view('site.profile.edit',$data);
     }
    public function update_profile(Request $request)
    {
        $email = $request->post('email');
        $name = $request->post('name');
        $phone = $request->post('phone');
        $gender = $request->post('gender');
        $country = $request->post('country');

        $old_password = $request->post('old_password');
        $new_password = $request->post('new_password');

        if(isset($name)){
            DB::update("update `users` set  `name` = '$name' where id = '" . Auth::id() . "' ");

        }
        if(isset($country)){
            DB::update("update `users` set  `country` = '$country' where id = '" . Auth::id() . "' ");

        }
        if(isset($gender)){
            DB::update("update `users` set  `gender` = '$gender' where id = '" . Auth::id() . "' ");

        }

        if(isset($email)){
           $check_email = DB::selectOne("select email , id from users where email = '$email' and id != '".Auth::id()."' ");
             if($check_email){
                return redirect()->back()->with('error', __('public.email_exsist'));

             }
            DB::update("update `users` set `email` = '$email'  where id = '" . Auth::id() . "' ");

        }

        if(isset($phone)){
            $check_phone = DB::selectOne("select phone , id from users where phone = '$phone' and id != '".Auth::id()."' ");
              if($check_phone){
                 return redirect()->back()->with('error', __('public.phone_exsist'));

              }
             DB::update("update `users` set `email` = '$email'  where id = '" . Auth::id() . "' ");

         }
        if (isset($new_password)) {
            if (Hash::check($old_password, Auth::User()->password)) {
                $new_password = Hash::make($new_password);
                DB::update("update `users` set `password` = '$new_password' where id = '" . Auth::id() . "' ");
            } else {
                return redirect()->back()->with('error', __('public.password_not_match'));
            }
        }

        return redirect()->back()->with('success', __('public.update_success'));

    }
}
