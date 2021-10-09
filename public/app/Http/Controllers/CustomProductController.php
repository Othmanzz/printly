<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CustomProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CustomProductController extends Controller
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
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        DB::delete("delete from custom_products where user_id = '".Auth::id()."' and `complete` = 0 ");

        DB::insert("insert into custom_products (`user_id` , `created_at` , `updated_at`)
        VALUES ('".Auth::id()."' , '$created_at' , '$updated_at') ");
        $custom_product_id = DB::getPdo()->lastInsertId();
        $data = [];
        $data["papers_type"] = DB::select("select * from papers_type order by id desc ");
        $data["papers_size"] = DB::select("select * from papers_size order by id desc ");
        $data["papers_slice"] = DB::select("select * from papers_slice order by id desc ");
        $data["printer_color"] = DB::select("select * from printer_color order by id desc ");
        $data["printer_type"] = DB::select("select * from printer_type order by id desc ");
        $data["printer_method"] = DB::select("select * from printer_method order by id desc ");
        $data["covers"] = DB::select("select * from cover_type order by id desc ");
       $data["custom_product_id"] = $custom_product_id;
        return view('site.custom_product.print' ,$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload_file_custom_product($id ,Request $request){


        $photo = $request->file('file_data');
        $input = '';

        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/custom_product_file/';
            $photo->move($destinationPath, $input);
        }else{
            $input = '';
        }
        if(DB::insert("insert into `custom_products_files` (`custom_product`,`file`,`price`,`number_of_pages` ,`cover_side`)
         VALUES ('$id','$input','0','".$this->count(base_path().'/uploads/custom_product_file/'.$input)."','0') ")){
            return [
                'message' => 'تم التحميل'
            ];
        }else{
            return [
                'error' => 'خطا في التحميل'
            ];
        }



    }

    public function set_prop($id ,Request $request){
        $get_file = DB::selectOne("select price_id ,cover_price , number_of_pages , custom_product from custom_products_files where id = $id ");

         $from = $request->post('from') ?? 0;
         $to = $request->post('to') ?? $get_file->number_of_pages;
         $quantity = $request->post('quantity') ?? 1;

        $get_price = DB::selectOne("select * from  `price_list` where
         `paper_id` = '".$request->post("paper_size")."' and
         (
         `paper_type` = '".$request->post("paper_type")."'
          and `printer_type` = '".$request->post("printer_type")."' or
         `printer_method` = '".$request->post("printer_method")."' or
          `printer_color` = '".$request->post("printer_color")."' or
           `paper_slice` = '".$request->post("paper_slice")."' )");
          if($get_price){

                DB::update("update custom_products_files set `quantity`='$quantity', `from` = '$from' , `to` = '$to' ,
                `price` = $get_price->price,  total = 0 , price_id = '$get_price->id' where id = $id");

                $get_file = DB::selectOne("select price_id, cover_price, quantity ,number_of_pages , custom_product ,price from custom_products_files where id = $id ");

                $total = ($get_file->cover_price + ($get_file->price * $get_file->number_of_pages ) ) * $get_file->quantity;
                DB::update("update custom_products_files set  total = $total  where id = $id");
                $total_price = DB::selectOne("select SUM(total) as total_price from
                custom_products_files where custom_product = '$get_file->custom_product'");


                $get_file_prop = DB::selectOne("select * from price_list where id = $get_file->price_id");
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


                return response()->json(['success' => '1','prop'=>$prop, 'message' =>  "تم تحديد الخصائص" , "total"=>$total_price->total_price]);

          }

          return response()->json(['success' => '0', 'message' =>  "لم يتم تحديد الخصائص"]);


    }
    public function set_cover($id ,Request $request){
        $get_file = DB::selectOne("select quantity,total ,number_of_pages , custom_product , price from custom_products_files where id = $id ");

         $cover_id = $request->post('cover_id') ?? 0;
         $cover_side = $request->post('cover_side') ?? 0;

        $get_price = DB::selectOne("select * from  `cover_type` where
         `id` = '".$request->post("cover_id")."' ");
         $done = 0;
          if($get_price){

                DB::update("update custom_products_files set
                `cover_type` = '$cover_id' , `cover_side` = '$cover_side' , cover_price = $get_price->price
                 where id = $id");
                 $get_file = DB::selectOne("select cover_price , quantity,total ,number_of_pages , custom_product , price from custom_products_files where id = $id ");

                 $total = ($get_price->price + ($get_file->price * $get_file->number_of_pages ) ) * $get_file->quantity;
                DB::update("update custom_products_files set  total = $total  where id = $id");

                $total_price = DB::selectOne("select SUM(total) as total_price from
                custom_products_files where custom_product = '$get_file->custom_product'");
$done = 1;
          }


          $data["covers"] = [];

           $covers = DB::select("select * from cover_type as c left join custom_products_files as f on c.id = f.cover_type where f.custom_product = $get_file->custom_product");
           foreach($covers as $cover){
            $files = DB::select("select * from `custom_products_files` where custom_product = $get_file->custom_product and cover_type = $cover->cover_type ");
            $filesarray= '';

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
                $filesarray  .= '<div class="flex-container">
                <div class="accordion">
                    <a class="collapsed h4" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample">'.$file->file.'</a>
                    <div class="collapse" id="collapse1">
                        '.$prop.'
                    </div>
                </div>
                <button class="delete delete_file" file_id="'.$file->id.'" type="button">
                    <i class="fas fa-trash-alt " ></i>
                </button>
            </div>

            ';


                // array(
                //     'number_of_pages' => $this->count(base_path().'/uploads/custom_product_file/'.$file->file),
                //     'file' => $file->file,
                //     'id' =>$file->id,
                //     'price' => $file->file,
                //     'prop' => $prop,

                // );
            }
            $data["covers"][] = array(
                'id' => $cover->cover_type,
                'name' =>$cover->name,
                'files' => $filesarray,
            );
           }
if($done){
    return response()->json(['success' => '1', 'message' =>  "تم تحديد الخصائص" , "total"=>$total_price->total_price , 'data'=>$data]);

}

          return response()->json(['success' => '0', 'message' =>  "لم يتم تحديد الخصائص", 'data'=>$data]);


    }

    public function has_per($custom_product_id){
         $check = DB::selectOne("select * from custom_products where `id` = '$custom_product_id' and `user_id` = '".Auth::id()."'");
         if($check){
             return true;
         }
         return false;
    }

    public function delete_file(Request $request){
        $custom_product_id = $request->post('custom_product');
        $file_id = $request->post('file_id');

        if(!$this->has_per($custom_product_id)){
            return response()->json(['success' => '0', 'message' =>  "خطا"]);

        }

        DB::delete("delete from custom_products_files where custom_product = $custom_product_id and id = $file_id");

        $data = [];
        $data["files"] = [];
         $files = DB::select("select * from `custom_products_files` where custom_product = $custom_product_id ");
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

            $data["files"][] = array(
                'number_of_pages' => $this->count(base_path().'/uploads/custom_product_file/'.$file->file),
                'file' => $file->file,
                'id' =>$file->id,
                'price' => $file->file,
                'prop' => $prop,

            );
        }



        return response()->json(['success' => '1','message'=>'تم حذف الملف', 'data' =>  $data]);

    }
    public function delete_cover(Request $request){
        $data  = [];
        $custom_product_id = $request->post('custom_product');

        if(!$this->has_per($custom_product_id)){
            return response()->json(['success' => '0', 'message' =>  "خطا"]);

        }
        $cover_id = $request->post('cover_id');
        $get_file = DB::select("select * from  custom_products_files where cover_type  = $cover_id and custom_product = $custom_product_id");
foreach($get_file as $file){
    //update_price
    DB::update("update  custom_products_files set total = (total - $file->cover_price) , cover_price = 0 , cover_type = 0,cover_side = 0 where id  = $file->id ");




}

        $covers = DB::select("select * from cover_type as c left join custom_products_files as f on c.id = f.cover_type where f.custom_product =  $custom_product_id");
        foreach($covers as $cover){
         $files = DB::select("select * from `custom_products_files` where custom_product =  $custom_product_id and cover_type = $cover->cover_type ");
         $filesarray= '';

         foreach($files as $file){
             $get_file_prop = DB::selectOne("select * from price_list where id = $file->price_id");
             if($get_file_prop){
                 $paper_type = DB::selectOne("select name from papers_type where id = $get_file_prop->paper_type");
                 $paper_size = DB::selectOne("select name from papers_size where id = $get_file_prop->paper_id");
                 $printer_color = DB::selectOne("select name from printer_color where id = $get_file_prop->printer_color");
                 $printer_method = DB::selectOne("select name from printer_method where id = $get_file_prop->printer_method");
                 $paper_slice = DB::selectOne("select name from papers_slice where id = $get_file_prop->paper_slice");
                 $printer_type = DB::selectOne("select name from printer_type where id = $get_file_prop->printer_type");

                 $prop = $paper_size->name.'-'.$paper_type->name.'-'.$printer_color->name.'-'.$printer_method->name.'-'.$printer_type->name.'-'.$paper_slice->name;
             }else{
                 $prop = 'لم يتم تحديد الخصائص بعد';
             }
             $filesarray  .= '<div class="flex-container">
             <div class="accordion">
                 <a class="collapsed h4" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample">'.$file->file.'</a>
                 <div class="collapse" id="collapse1">
                     '.$prop.'
                 </div>
             </div>
             <button class="delete delete_file" file_id="'.$file->id.'" type="button">
                 <i class="fas fa-trash-alt " ></i>
             </button>
         </div>

         ';


             // array(
             //     'number_of_pages' => $this->count(base_path().'/uploads/custom_product_file/'.$file->file),
             //     'file' => $file->file,
             //     'id' =>$file->id,
             //     'price' => $file->file,
             //     'prop' => $prop,

             // );
         }
         $data["covers"][] = array(
             'id' => $cover->cover_type,
             'name' =>$cover->name,
             'files' => $filesarray,
         );
        }
        return response()->json(['success' => '1', 'message' =>  " تم الحذف  ", 'data'=>$data]);

    }

    function count($path) {
        $pdf = file_get_contents($path);
        $number = preg_match_all("/\/Page\W/", $pdf, $dummy);
        return $number;
      }



    public function get_uploaded_files($id , Request $request){
        $data = [];
        $data["files"] = [];
         $files = DB::select("select * from `custom_products_files` where custom_product = $id ");
        foreach($files as $file){
            $get_file_prop = DB::selectOne("select * from price_list where id = $file->price_id");
            if($get_file_prop){
                $paper_type = DB::selectOne("select name from papers_type where id = $get_file_prop->paper_type");
                $paper_size = DB::selectOne("select name from papers_size where id = $get_file_prop->paper_id");
                $printer_color = DB::selectOne("select name from printer_color where id = $get_file_prop->printer_color");
                $printer_method = DB::selectOne("select name from printer_method where id = $get_file_prop->printer_method");
                $paper_slice = DB::selectOne("select name from papers_slice where id = $get_file_prop->paper_slice");
                $printer_type = DB::selectOne("select name from printer_type where id = $get_file_prop->printer_type");

                $prop = $paper_size->name.'-'.$paper_type->name.'-'.$printer_color->name.'-'.$printer_method->name.'-'.$printer_type->name.'-'.$paper_slice->name;
            }else{
                $prop = 'لم يتم تحديد الخصائص بعد';
            }

            $data["files"][] = array(
                'number_of_pages' => $this->count(base_path().'/uploads/custom_product_file/'.$file->file),
                'file' => $file->file,
                'id' =>$file->id,
                'price' => $file->file,
                'prop' => $prop,

            );
        }



        return response()->json(['success' => '1', 'data' =>  $data]);

    }

    public function get_prop($id){
        $data  = [];
        $get_file_prop = DB::selectOne("select * from price_list where id = $id");
        if($get_file_prop){
            $data["paper_type"] = DB::select("select * from papers_type where id = $get_file_prop->paper_type");
            $data["printer_color"] = DB::select("select * from printer_color where id = $get_file_prop->printer_color");
            $data["printer_method"] = DB::select("select * from printer_method where id = $get_file_prop->printer_method");
            $data["paper_slice"] = DB::select("select * from papers_slice where id = $get_file_prop->paper_slice");
            $data["printer_type"] = DB::select("select * from printer_type where id = $get_file_prop->printer_type");
            return response()->json(['success' => '1', 'data' =>  $data]);

        }

        return response()->json(['success' => '0', 'data' =>  $data]);





    }
    public function store(Request $request)
    {

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'papers_type' => 'required',
            'papers_size' => 'required',
            'papers_slice' => 'required',
            'printer_color' => 'required',
            'printer_type' => 'required',
            'printer_method' => 'required',
            'cover_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'file' => 'required',

            // 'name_ar' => 'required|unique:papers_type,name',

        ];
        $rules_messages = [
            'papers_type.required' => __('public.filed_required'),
            'papers_size.required' => __('public.filed_required'),
            'papers_slice.required' => __('public.filed_required'),
            'printer_color.required' => __('public.filed_required'),
            'printer_type.required' => __('public.filed_required'),
            'printer_method.required' => __('public.filed_required'),
            'cover_type.required' => __('public.filed_required'),
            'from.required' => __('public.filed_required'),
            'to.required' => __('public.filed_required'),
            'file.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $userId = Auth::id();
        $papers_type = $request->post('papers_type');
        $papers_size = $request->post('papers_size');
        $papers_slice = $request->post('papers_slice');
        $printer_color = $request->post('printer_color');
        $printer_type = $request->post('printer_type');
        $printer_method = $request->post('printer_method');
        $cover_type = $request->post('cover_type');
        $from = $request->post('from');
        $to = $request->post('to');
        $price_id = $request->post('price_id');
        $file = $request->file('file');
        $input = '';
        if ($file) {
            $input = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/custom_products/';
            $file->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("insert into `custom_products` (`user_id`,`papers_type`,
        `papers_size`,`papers_slice`,`printer_color`,`printer_type`,
        `printer_method`,`cover_type`,`from`,`to`,`price_id`,`file`)
         VALUES ('$userId','$papers_type','$papers_size','$papers_slice','$printer_color','$printer_method',
         '$cover_type','$from','$to','$price_id','$input')");
         // add to the cart
         $productId =  DB::getPdo()->lastInsertId();
         $quantity = 1;
          $ip = $request->ip();
          $type = 1; // this for the printed files

         DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
         VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");



    }

    public function create_sticker(Request $request)
    {
        $data  = [];
        $data["stickers_paper_shape"] = DB::select("select * from stickers_paper_shape order by id desc");
        $data["stickers_paper_size"] = DB::select("select * from stickers_paper_size order by id desc");
        $data["stickers_paper_type"] = DB::select("select * from stickers_paper_type order by id desc");

        return view('site.custom_product.add_sticker',$data);
    }


    public function get_sticker_price(Request $request){
      $shape = $request->post('shape');
      $type = $request->post('type');
      $size = $request->post('size');

      // getting the price
      $prices = DB::selectOne("select * from stickers_paper_prices where `paper_type` = '$type' and `paper_size` = '$size' and `paper_shape` = '$shape'");
       if($prices){
        return response()->json(['success' => '1', 'price' => $prices->price, 'message' =>  '' , 'price_id'=>$prices->id]);

       }

       return response()->json(['success' => '0', 'message' => 'لا يوجد سعر متاح']);

    }

    public function get_poster_price(Request $request){

        $size = $request->post('size');

        // getting the price
        $prices = DB::selectOne("select * from posters_size where `id` = '$size' ");
         if($prices){
          return response()->json(['success' => '1', 'price' => $prices->price, 'message' =>  '' , 'price_id'=>$prices->id]);

         }

         return response()->json(['success' => '0', 'message' => 'لا يوجد سعر متاح']);

      }
      public function get_rollup_price(Request $request){

        $size = $request->post('size');

        // getting the price
        $prices = DB::selectOne("select * from rollups_size where `id` = '$size' ");
         if($prices){
          return response()->json(['success' => '1', 'price' => $prices->price, 'message' =>  '' , 'price_id'=>$prices->id]);

         }

         return response()->json(['success' => '0', 'message' => 'لا يوجد سعر متاح']);

      }

      public function get_personal_card_price(Request $request){

      $type = $request->post('type');
      $size = $request->post('size');

      // getting the price
      $prices = DB::selectOne("select * from personal_cards_prices where `card_type` = '$type' and `card_size` = '$size'");
       if($prices){
        return response()->json(['success' => '1', 'price' => $prices->price, 'message' =>  '' , 'price_id'=>$prices->id]);

       }

       return response()->json(['success' => '0', 'message' => 'لا يوجد سعر متاح']);

      }

    public function add_sticker_product(Request $request)
    {

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'price_id' => 'required',

            'file' => 'required',


        ];
        $rules_messages = [
            'price_id.required' => __('public.filed_required'),

            'file.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $userId = Auth::id();
        $quantity = $request->post('quantity');
        $note = $request->post('note');

        $price_id = $request->post('price_id');
        $file = $request->file('file');
        $input = '';
        if ($file) {
            $input = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/stickers/';
            $file->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("insert into `stickers_products` (`user_id`,`price_id`,`file`,`quantity`,`note`,`created_at` , `updated_at`)
         VALUES ('$userId','$price_id','$input','$quantity','$note','$created_at','$updated_at')");

         $productId =  DB::getPdo()->lastInsertId();
          $ip = $request->ip();
          $type = 2; // this for the stickers

         DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
         VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");

    }


    public function create_personal_card(Request $request)
    {
        $data  = [];
        $data["personal_cards_size"] = DB::select("select * from personal_cards_size order by id desc");
        $data["personal_cards_type"] = DB::select("select * from personal_cards_type order by id desc");
        dd($data);

        return view('site.custom_product.add_personal_card',$data);
    }

    public function add_personal_card_product(Request $request)
    {

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'price_id' => 'required',

            'file' => 'required',


        ];
        $rules_messages = [
            'price_id.required' => __('public.filed_required'),

            'file.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $userId = Auth::id();
        $quantity = $request->post('quantity');
        $note = $request->post('note');

        $price_id = $request->post('price_id');
        $file = $request->file('file');
        $input = '';
        if ($file) {
            $input = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/personal_cards_products/';
            $file->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("insert into `personal_cards_products` (`user_id`,`price_id`,`file`,`quantity`,`note`,`created_at` , `updated_at`)
         VALUES ('$userId','$price_id','$input','$quantity','$note','$created_at','$updated_at')");


         $productId =  DB::getPdo()->lastInsertId();
          $ip = $request->ip();
          $type = 3; // this for the personal card

         DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
         VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");
    }

public function add_custom_product_to_cart($id){
}
    public function create_rollup(Request $request)
    {
        $data  = [];
        $data["rollups_size"] = DB::select("select * from rollups_size  order by id desc");
        dd($data);

        return view('site.custom_product.add_rollup',$data);
    }

    public function add_rollup_product(Request $request)
    {

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'price_id' => 'required',

            'file' => 'required',


        ];
        $rules_messages = [
            'price_id.required' => __('public.filed_required'),

            'file.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $userId = Auth::id();
        $quantity = $request->post('quantity');
        $note = $request->post('note');

        $price_id = $request->post('price_id');
        $file = $request->file('file');
        $input = '';
        if ($file) {
            $input = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/rollups_products/';
            $file->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("insert into `rollups_products` (`user_id`,`price_id`,`file`,`quantity`,`note`,`created_at` , `updated_at`)
         VALUES ('$userId','$price_id','$input','$quantity','$note','$created_at','$updated_at')");

         $productId =  DB::getPdo()->lastInsertId();
          $ip = $request->ip();
          $type = 4; // this for the rollup

         DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
         VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");

    }



    public function create_poster(Request $request)
    {
        $data  = [];
        $data["posters_size"] = DB::select("select * from  posters_size order by id desc");
       dd($data);
        return view('site.custom_product.add_poster',$data);
    }
    public function add_poster_product(Request $request)
    {

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'price_id' => 'required',

            'file' => 'required',


        ];
        $rules_messages = [
            'price_id.required' => __('public.filed_required'),

            'file.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $userId = Auth::id();
        $quantity = $request->post('quantity');
        $note = $request->post('note');

        $price_id = $request->post('price_id');
        $file = $request->file('file');
        $input = '';
        if ($file) {
            $input = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/posters_products/';
            $file->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("insert into `posters_products` (`user_id`,`price_id`,`file`,`quantity`,`note`,`created_at` , `updated_at`)
         VALUES ('$userId','$price_id','$input','$quantity','$note','$created_at','$updated_at')");
         $productId =  DB::getPdo()->lastInsertId();
          $ip = $request->ip();
          $type = 5; // this for the poster

         DB::insert("insert into carts (`user_id`,`product_id`,`quantity`,`ip` , `type`)
         VALUES ('$userId','$productId','$quantity','$ip' ,'$type') ");


    }
}
