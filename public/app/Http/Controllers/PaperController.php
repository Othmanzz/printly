<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaperController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        $data['papers'] = DB::select("select * from papers_size order by id desc");
        return view('admin.paper.index' ,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function  create_paper_price(){
         $data = [];
        $data['papers_type'] =  DB::select("select * from papers_type  order by id desc");
        $data['printer_color'] =  DB::select("select * from printer_color   order by id desc");
        $data['printer_type'] =  DB::select("select * from printer_type   order by id desc");
        $data['printer_method'] =  DB::select("select * from printer_method   order by id desc");
        $data['papers_slice'] =  DB::select("select * from papers_slice   order by id desc");

        return view('admin.paper.add_paper_price' ,$data);
     }
    public function create()
    {
        $data = [];
        $data['papers_type'] =  DB::select("select * from papers_type  order by id desc");
        $data['printer_color'] =  DB::select("select * from printer_color   order by id desc");
        $data['printer_type'] =  DB::select("select * from printer_type   order by id desc");
        $data['printer_method'] =  DB::select("select * from printer_method   order by id desc");
        $data['papers_slice'] =  DB::select("select * from papers_slice   order by id desc");

        return view('admin.paper.add_paper' ,$data);
    }

    public function store_paper(Request $request){

        // $table->string("type");
        // $table->string("printer_type");
        // $table->string("printer_color");
        // $table->string("printer_method");
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_size,name',
            'type' => 'required',
            'printer_type' => 'required',
            'printer_color' => 'required',
            'printer_method' => 'required',
            'papers_slice' => 'required',


        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            'type.required' => __('public.filed_required'),
            'printer_type.required' => __('public.filed_required'),
            'printer_color.required' => __('public.filed_required'),
            'printer_method.required' => __('public.filed_required'),
            'papers_slice.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post("name");
        $type = $request->post("type");
        $printer_type = $request->post("printer_type");
        $printer_color = $request->post("printer_color");
        $printer_method = $request->post("printer_method");
        $papers_slice = $request->post("papers_slice");

        $type = implode(",",$type);
        $printer_type = implode(",",$printer_type);
        $printer_color = implode(",",$printer_color);
        $printer_method = implode(",",$printer_method);

        $papers_slice = implode(",",$papers_slice);

        DB::insert("insert into `papers_size` (`name`,`paper_type`,`printer_type`,`printer_color`,`printer_method` ,`papers_slice`, `created_at`  , `updated_at`)
         VALUES ('" . $name . "' ,'$type','$printer_type','$printer_color','$printer_method','$papers_slice','$created_at', '$updated_at' ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }


    public function papers_type(){
        $data = [];
        $data['papers_type'] = DB::select("select * from papers_type  order by id desc");
        return view('admin.paper.papers_type' ,$data);
    }

    public function add_paper_type(){
        $data = [];

        return view('admin.paper.add_paper_type' ,$data);
    }


    public function store_paper_type(Request $request){
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_type,name',
            // 'name_ar' => 'required|unique:papers_type,name',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);

        DB::insert("insert into `papers_type` (`name` ,   `created_at`  , `updated_at`) VALUES ('" . $request->post('name') . "' ,'$created_at', '$updated_at' ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function cover_types()
    {
        $data = [];
        $data['cover_types'] = DB::select("select * from cover_type order by id desc");
        return view('admin.paper.cover_types' ,$data);
    }
    public function paper_slices()
    {
        $data = [];
        $data['paper_slices'] = DB::select("select * from papers_slice order by id desc");
        return view('admin.paper.paper_slices' ,$data);
    }
    public function create_cover_type()
    {
        $data = [];

        return view('admin.paper.add_cover_type',$data);
    }

    public function create_paper_slices()
    {
        $data = [];

        return view('admin.paper.add_paper_slice',$data);
    }
    public function store_cover_type(Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:cover_type,name',
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'price' => 'required',


        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'price.required' => __('public.filed_required'),

            'name.unique' => __('public.already_exsist'),
            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $photo = $request->file('photo');
        $price = $request->post('price');

        $input = '';
        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/cover_type/';
            $photo->move($destinationPath, $input);
        }else{
            $input = '';
        }
        DB::insert("insert into `cover_type` (`name` ,`price`, `photo`,  `created_at`  , `updated_at`)
         VALUES ('" . $request->post('name') . "' ,$price,'$input','$created_at', '$updated_at' ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }

    public function store_paper_slice(Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_slice,name',
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $photo = $request->file('photo');
        $input = '';
        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/papers_slice/';
            $photo->move($destinationPath, $input);
        }else{
            $input = '';
        }
        DB::insert("insert into `papers_slice` (`name` , `photo`,  `created_at`  , `updated_at`) VALUES ('" . $request->post('name') . "' ,'$input','$created_at', '$updated_at' ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }


    public function edit_cover_type($id)
    {
        $data = [];
        $data['cover_type'] = DB::selectOne("select * from `cover_type` where `id` ='$id' ");
        if(!$data['cover_type']){
        return view(404);
        }
        return view('admin.paper.edit_cover_type' ,$data);
    }

    public function edit_paper_slice($id)
    {
        $data = [];
        $data['paper_slice'] = DB::selectOne("select * from `papers_slice` where `id` ='$id' ");
        if(!$data['paper_slice']){
        return view(404);
        }
        return view('admin.paper.edit_paper_slice' ,$data);
    }

    public function update_cover_type($id ,Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:cover_type,name,' . $id,
            'price' => 'required',

        ];
        $rules_messages = [
            'price.required' => __('public.filed_required'),

            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $photo = $request->file('photo');
       $name = $request->post('name');
       $price = $request->post('price');

        $input = '';
        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/cover_type/';
            $photo->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("update  `cover_type`  set `price` = $price , `name` = '$name' , `photo` = '$input',  `created_at` = '$created_at'  , `updated_at` = '$updated_at' where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.added_success'));
    }

    public function update_paper_slice($id ,Request $request)
    {
        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_slice,name,' . $id,
            // 'name_ar' => 'required|unique:papers_type,name',

        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $photo = $request->file('photo');
       $name = $request->post('name');

        $input = '';
        if (isset($photo)) {
            $input = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = base_path() . '/uploads/papers_slice/';
            $photo->move($destinationPath, $input);
        }else{
            $input = $request->post('old_photo');
        }
        DB::insert("update  `papers_slice`  set `name` = '$name' , `photo` = '$input',  `created_at` = '$created_at'  , `updated_at` = '$updated_at' where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.added_success'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy_cover_type($id)
    {
        DB::delete("delete  from `cover_type` where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.deleted_success'));

    }

    public function destroy_paper_slice($id)
    {
        DB::delete("delete  from `papers_slice` where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.deleted_success'));

    }

    public function destroy_price_list($id){
        DB::delete("delete  from `price_list` where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.deleted_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [] ;
        $data["paper"] = DB::selectOne("select * from papers_size where id = '$id' ");

        if(!$data["paper"]){
            return view(404);
        }
        $data['papers_type'] =  DB::select("select * from papers_type  order by id desc");
        $data['printer_color'] =  DB::select("select * from printer_color   order by id desc");
        $data['printer_type'] =  DB::select("select * from printer_type   order by id desc");
        $data['printer_method'] =  DB::select("select * from printer_method   order by id desc");
        $data['papers_slice'] =  DB::select("select * from papers_slice   order by id desc");

        return view('admin.paper.edit-paper',$data);
    }

    public function update_paper($id , Request $request){


        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_size,name,'.$id,
            'type' => 'required',
            'printer_type' => 'required',
            'printer_color' => 'required',
            'printer_method' => 'required',
            'papers_slice' => 'required',


        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            'type.required' => __('public.filed_required'),
            'printer_type.required' => __('public.filed_required'),
            'printer_color.required' => __('public.filed_required'),
            'printer_method.required' => __('public.filed_required'),
            'papers_slice.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post("name");
        $type = $request->post("type");
        $printer_type = $request->post("printer_type");
        $printer_color = $request->post("printer_color");
        $printer_method = $request->post("printer_method");
        $papers_slice = $request->post("papers_slice");

        $type = implode(",",$type);
        $printer_type = implode(",",$printer_type);
        $printer_color = implode(",",$printer_color);
        $printer_method = implode(",",$printer_method);
        $papers_slice = implode(",",$papers_slice);


        DB::update("update  `papers_size` set  `name` = '$name',`paper_type` = '$type',`printer_type` = '$printer_type',
        `printer_color` = '$printer_color',`printer_method` ='$printer_method' ,`papers_slice`='$papers_slice' ,
        `created_at` = '$created_at'  , `updated_at` = '$updated_at' where `id` = '$id' ");
        return redirect()->back()->with('success', __('public.update_success'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Paper $paper)
    {
        DB::delete("delete  from `papers_size` where `id` = '$id'");
        return redirect()->back()->with('success', __('public.deleted_success'));

    }



    public function paper_price_list($id, Request $request){
        $data = [];
        $data['id'] = $id;
        $data['papers_price'] = DB::select("select * from price_list where paper_id = $id  order by id desc");
        return view('admin.paper.paper_price_list' ,$data);
    }


    public function create_price_list($id ,Request $request){


            $data = [] ;
            $paper = DB::selectOne("select * from papers_size where id = '$id' ");

            if(!$paper){
                return view(404);
            }
            $data['id'] = $id;
            $data["paper"] = $paper;
            $data['papers_type'] =  DB::select("select * from papers_type where id in ($paper->paper_type)  order by id desc");
            $data['printer_color'] =  DB::select("select * from printer_color where id in ($paper->printer_color)   order by id desc");
            $data['printer_type'] =  DB::select("select * from printer_type where id in ($paper->printer_type)  order by id desc");
            $data['printer_method'] =  DB::select("select * from printer_method  where id in ($paper->printer_method)  order by id desc");
            $data['papers_slice'] =  DB::select("select * from papers_slice  where id in ($paper->papers_slice)  order by id desc");
         return view('admin.paper.add_price_list',$data);
    }

    public function store_price_list($id, Request $request){

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_size,name,'.$id,
            'type' => 'required',
            'printer_type' => 'required',
            'printer_color' => 'required',
            'printer_method' => 'required',
            'price' => 'required|integer|min:1',
            'papers_slice' => 'required|integer|min:1',


        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            'type.required' => __('public.filed_required'),
            'printer_type.required' => __('public.filed_required'),
            'printer_color.required' => __('public.filed_required'),
            'printer_method.required' => __('public.filed_required'),
            'price.required' => __('public.filed_required'),
            'paper_slice.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post("name");
        $price = intval($request->post("price"));
        $type = $request->post("type");
        $printer_type = $request->post("printer_type") ?? 0;
        $printer_color = $request->post("printer_color") ?? 0 ;
        $printer_method = $request->post("printer_method") ?? 0;
        $paper_slice = $request->post("papers_slice") ?? 0;
       $checkPrice = DB::selectOne("select * from  `price_list` where `paper_id` = '$id' and
        `paper_type` = '$type' and `printer_type` = '$printer_type' and `printer_color` = '$printer_color'
        and `printer_method` = '$printer_method' and  `paper_slice` = '$paper_slice' ");
        if($checkPrice){
            return redirect()->back()->with('error', __('public.price_already_exist'));

        }

        DB::insert("INSERT INTO `price_list`(`name`, `paper_id`,`paper_type`, `printer_type`,
         `printer_method`, `printer_color`, `paper_slice`, `created_at`, `updated_at`, `price`)
          VALUES ('$name' , '$id' ,'$type', '$printer_type' , '$printer_method' ,'$printer_color' ,
           '$paper_slice' , '$created_at' , '$updated_at' , $price ) ");
        return redirect()->back()->with('success', __('public.added_success'));
    }

    public function edit_price_list($id, Request $request){
        $data = [];
        $data['id'] = $id;
        $data = [] ;
        $data["paper_list"] = DB::selectOne("select * from price_list  where id = '$id'");


        if(!$data['paper_list']){
            return view(404);
        }
        $paper = DB::selectOne("select * from papers_size where id = '".$data["paper_list"]->paper_id."' ");

        $data['id'] = $id;
        $data["paper"] = $paper;
        $data['papers_type'] =  DB::select("select * from papers_type where id in ('$paper->paper_type')  order by id desc");
        $data['printer_color'] =  DB::select("select * from printer_color where id in ('$paper->printer_color')   order by id desc");
        $data['printer_type'] =  DB::select("select * from printer_type where id in ('$paper->printer_type')  order by id desc");
        $data['printer_method'] =  DB::select("select * from printer_method  where id in ('$paper->printer_method')  order by id desc");
        $data['papers_slice'] =  DB::select("select * from papers_slice  where id in ('$paper->papers_slice')  order by id desc");

        return view('admin.paper.edit_paper_list' ,$data);
    }
    public function update_price_list($id, Request $request){

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $rules = [
            'name' => 'required|unique:papers_size,name,'.$id,
            'type' => 'required',
            'printer_type' => 'required',
            'printer_color' => 'required',
            'printer_method' => 'required',
            'price' => 'required|integer|min:1',
            'papers_slice' => 'required|integer|min:1',


        ];
        $rules_messages = [
            'name.required' => __('public.filed_required'),
            'name.unique' => __('public.already_exsist'),
            'type.required' => __('public.filed_required'),
            'printer_type.required' => __('public.filed_required'),
            'printer_color.required' => __('public.filed_required'),
            'printer_method.required' => __('public.filed_required'),
            'price.required' => __('public.filed_required'),
            'paper_slice.required' => __('public.filed_required'),

            // 'name_ar.required' => __('public.filed_required'),
            // 'name_ar.exists' => __('public.already_exsist'),
        ];
        $request->validate($rules, $rules_messages);
        $name = $request->post("name");
        $price = intval($request->post("price"));
        $type = $request->post("type");
        $printer_type = $request->post("printer_type") ?? 0;
        $printer_color = $request->post("printer_color") ?? 0 ;
        $printer_method = $request->post("printer_method") ?? 0;
        $paper_slice = $request->post("papers_slice") ?? 0;
        $get_paper_id = DB::selectOne("select paper_id from `price_list`  where id = '".$id."' ");
        $checkPrice = DB::selectOne("select * from  `price_list` where `paper_id` = '$$get_paper_id->paper_id' and
        `paper_type` = '$type' and `printer_type` = '$printer_type' and `printer_color` = '$printer_color'
        and `printer_method` = '$printer_method' and  `paper_slice` = '$paper_slice' and id != $id");
        if($checkPrice){
            return redirect()->back()->with('error', __('public.price_already_exist'));

        }

        DB::update("UPDATE  `price_list` set `paper_type` = '$type' ,`name` = '$name', `paper_id` = '$id',
         `printer_type` = '$type', `printer_method` = '$printer_method', `printer_color` = '$printer_color',
          `paper_slice`= '$paper_slice', `created_at` = '$created_at', `updated_at` = '$updated_at',
          `price` = '$price' where `id` = '$id'");
        return redirect()->back()->with('success', __('public.added_success'));
    }
}
