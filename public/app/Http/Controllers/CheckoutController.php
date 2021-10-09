<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function prepare_checkout($order_id){
        $get_order = DB::selectOne("select * from orders where id = '$order_id' and user_id = '".Auth::id()."'");
        if(!$get_order){
            return view(404);
        }
          if($get_order->payment_method == "wallet"){
            if(ProfileController::getWalletBalance() > $get_order->total){
                // ready to pay
                $payable = ProfileController::getWalletBalance() -  $get_order->total;
                DB::update("update wallets set `amount` = '$payable' where user_id = '".Auth::id()."' ");
                DB::update("update orders set `payment_confirm` = '1' where id = '".$order_id."' ");
              return view('site.payment_success');
            }else{
                // pay the rest using online bancking
            }
          }



        $url = "https://test.oppwa.com/v1/checkouts";
	$data = "entityId=8ac7a4ca7665015001766af3c96514a2" .
                "&amount=$get_order->total" .
                "&currency=$get_order->currency" .
                "&paymentType=DB".
                "&paymentBrand=MADA";


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Y2E3NjY1MDE1MDAxNzY2YWYzNmZhMDE0OTd8NU1aUUZGWG55Rg=='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
    $responseData = json_decode($responseData);
    $data = [];
    $data["checkoutId"] = $responseData->id;
    $data["shopperResultUrl"] = App::make('url')->to('/checkpayment/'.$order_id);
    if($data["checkoutId"]){
        DB::update("update orders set checkout_id = '".$data["checkoutId"]."' where id = '$order_id' ");
    }
	return view('site.checkout',$data);


    }


    public function check_payment($order_id){
        $get_order = DB::selectOne("select * from orders where id = '$order_id' and user_id = '".Auth::id()."'");
        if(!$get_order){
            return view(404);
        }
        $url = "https://test.oppwa.com/v1/checkouts/".$get_order->checkout_id."/payment";
	$url .= "?entityId=8ac7a4ca7665015001766af3c96514a2";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Y2E3NjY1MDE1MDAxNzY2YWYzNmZhMDE0OTd8NU1aUUZGWG55Rg=='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
    $responseData = json_decode($responseData);
    $data["result"] = $responseData->result;
	return $data;
    }

}
