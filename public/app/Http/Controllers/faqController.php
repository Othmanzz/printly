<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\faqs;

class faqcontroller extends Controller
{



  public function index()
  {
   //
   $data = faqs::orderBy('id','desc')->get();
   return view('admin.faqs.index',['title' => trans('admin.faqsControl') , 'data' => $data ]);

  } 

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
       {
        //
        return view('admin.faqs.add',['title' => trans('admin.addfaq')]);
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
        $messages = [
                    'question_en'   => trans('admin.question_en'),
                    'question_ar'   => trans('admin.question_en'),
                    'answer_en'     => trans('admin.answer_en'),
                    'answer_ar'     => trans('admin.answer_ar'),
                    ];
        $data = $this->validate(request(),
        [
          'question_en'   => "required|min:20",
          'question_ar'   => "required|min:20",
          'answer_en'     => "required|min:20",
          'answer_ar'     => "required|min:20",
          ],[],$messages);
         
          $op =  faqs::create($data);
          $add_op_faild = trans('admin.add_op_faild');
          $add_op_succ  = trans('admin.add_op_succ');
          if($op){
            session()->flash('message',$add_op_succ);
          }else{
            session()->flash('error_message',$add_op_faild);
          }
          return redirect(aurl('FAQS'));

    }

    

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET Offer data.......
        $page_data = faqs::findorfail($id);
        $title = trans('admin.edit');
        return view('admin.faqs.edit',['page_data' => $page_data , 'title' => $title]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
          //
          $messages = [
            'question_en'   => trans('admin.question_en'),
            'question_ar'   => trans('admin.question_en'),
            'answer_en'     => trans('admin.answer_en'),
            'answer_ar'     => trans('admin.answer_ar'),
            ];
$data = $this->validate(request(),
[
  'question_en'   => "required|min:20",
  'question_ar'   => "required|min:20",
  'answer_en'     => "required|min:20",
  'answer_ar'     => "required|min:20",
  ],[],$messages);

   

 		$process = faqs::where('id', $id)->update($data);
      if($process){
      session()->flash('message', trans('admin.updated_record'));
    }else{
      session()->flash('error_message', trans('admin.updated_record_error'));
    }
        return redirect(aurl('FAQS'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $id = request('id');
        $succ_op   = trans('admin.del.op_succ');
        $failed_op = trans('admin.del.op_faild');
          $deletion_op = faqs::find($id)->delete();
          if($deletion_op){
            session()->flash('message',$succ_op);
          }else{
            session()->flash('error_message',$failed_op);
          }

        return redirect(aurl('FAQS'));

    }





}