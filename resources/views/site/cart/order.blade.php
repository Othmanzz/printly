@extends('layouts.app')

@section('content')
</header>
   <!--Start Page Content-->
    <div class="page-content order-details-page">
        <div class="container">
            <div class="blue-layout">
                <div class="blue-title text-center">
                    <h2>تفاصيل الطلب</h2>
                </div>

                <br>

                <div class="mt-5">
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">تاريخ الطلب</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$order->created_at}}</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">رقم الطلب</h4>
                        </div>
                        <div class="col-md-7">
                            <h4 class="pink-color">{{$order->id}} #</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">حالة الطلب</h4>
                        </div>
                        <div class="col-md-7">
                         @if($order->delivered == 1)   <h4 class="green-color">تم التوصيل</h4> @else <h4 class="red-color">لم يتم التوصيل بعد  </h4> @endif
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">عدد الملفات</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$number_of_files}} ملفات</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">مبلغ الطباعة</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{($order->total - $order->delivery_price)}} ريال</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">مبلغ التوصيل</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$order->delivery_price}} ريال</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">المبلغ الكلي</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$order->total}} ريال</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">طريقة الدفع</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$payment_method}}</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-1">
                            <h4 class="gray-color opacity-05">التفاصيل</h4>
                        </div>
                        <div class="col-md-7">
                            <h4>{{$order->note}} </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pink-layout">
                <div class="pink-title text-center">
                    <h2>ملفات الطلب</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-1">

                        <thead class="light-pink-bg">
                            <tr>
                                <td>اسم الملف </td>
                                <td>التفاصيل</td>
                                <td>السعر</td>
                                <td>عدد النسخ</td>
                                <td>الإجمالي</td>
                                <td>معاينة</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order_custom_products as $item)


                            <tr>
                                <td>
                                    <h5> {{$item->preview_name}}</h5>
                                </td>

                                <td class="no-padding">
                                    <div class="flex-container">
                                        <div class="accordion">
                                            <a class="collapsed h5" data-bs-toggle="collapse" href="#collapse{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">                                               {{App\Http\Controllers\CartController::get_file_prop($item->id)}}
                                            </a>
                                            <div class="collapse" id="collapse{{$item->id}}">
                                               {{App\Http\Controllers\CartController::get_file_prop($item->id)}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <h4>{{$item->total}} <span class="large">ريال</span></h4>
                                </td>
                                <td>
                                    <h4>{{$item->quantity}}</h4>
                                </td>
                                <td>
                                    <h4>{{$item->total}} <span class="large">ريال</span></h4>
                                </td>
                                <td>
                                    <a class="file-remove gray-color" download href="{{URL::to('/')}}/uploads/custom_product_file/{{$item->file}}">
                                        <img src="/../img/icons/order/criminal-record.png" alt="">
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix">
                <div class="float-end">
                    <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        قيم الخدمة
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content px-5">
                        <div class="modal-header">
                            <h5 class="modal-title pink-color bold" id="exampleModalLabel">قيم الخدمة</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route("add_order_review",["id"=>$order->id])}}" method="post">
@csrf
                        <div class="modal-body">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h3>قيم الطباعة</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rating">
                                            <input type="radio" value="1" name="print_rate" class="star-1" id="star-1">
                                            <label class="star-1" for="star-1"></label>
                                            <input type="radio" value="2" name="print_rate" class="star-2" id="star-2">
                                            <label class="star-2" for="star-2"></label>
                                            <input type="radio" value="3" name="print_rate" class="star-3" id="star-3">
                                            <label class="star-3" for="star-3"></label>
                                            <input type="radio" value="4" name="print_rate" class="star-4" id="star-4">
                                            <label class="star-4" for="star-4"></label>
                                            <input type="radio" value="5" name="print_rate" class="star-5" id="star-5">
                                            <label class="star-5" for="star-5"></label>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h3>قيم التغليف</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rating">
                                            <input type="radio" value="1" name="cover_rate" class="star-1" id="star-6">
                                            <label class="star-1" for="star-6"></label>
                                            <input type="radio"  value="2" name="cover_rate" class="star-2" id="star-7">
                                            <label class="star-2" for="star-7"></label>
                                            <input type="radio" value="3" name="cover_rate" class="star-3" id="star-8">
                                            <label class="star-3" for="star-8"></label>
                                            <input type="radio" value="4" name="cover_rate" class="star-4" id="star-9">
                                            <label class="star-4" for="star-9"></label>
                                            <input type="radio" value="5" name="cover_rate" class="star-5" id="star-10">
                                            <label class="star-5" for="star-10"></label>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h3>قيم الإستلام</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rating">
                                            <input type="radio" value="1" name="recieved_rate" class="star-1" id="star-11">
                                            <label class="star-1" for="star-11"></label>
                                            <input type="radio" value="2" name="recieved_rate" class="star-2" id="star-12">
                                            <label class="star-2" for="star-12"></label>
                                            <input type="radio" value="3" name="recieved_rate" class="star-3" id="star-13">
                                            <label class="star-3" for="star-13"></label>
                                            <input type="radio" value="4" name="recieved_rate" class="star-4" id="star-14">
                                            <label class="star-4" for="star-14"></label>
                                            <input type="radio" value="5" name="recieved_rate" class="star-15" id="star-15">
                                            <label class="star-5" for="star-9"></label>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h3>قيم التوصيل</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rating">
                                            <input type="radio" value="1" name="delever_rate" class="star-1" id="star-16">
                                            <label class="star-1" for="star-16"></label>
                                            <input type="radio" value="2" name="delever_rate" class="star-2" id="star-17">
                                            <label class="star-2" for="star-17"></label>
                                            <input type="radio" value="3" name="delever_rate" class="star-3" id="star-18">
                                            <label class="star-3" for="star-18"></label>
                                            <input type="radio" value="4" name="delever_rate" class="star-4" id="star-19">
                                            <label class="star-4"  for="star-19"></label>
                                            <input type="radio" value="5" name="delever_rate" class="star-5" id="star-20">
                                            <label class="star-5" for="star-20"></label>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="pink-color mb-3 h3">اخبرنا إذا كان لديك ملاحظات </label>
                                    <textarea class="form-control" name="notes" rows="6" placeholder="اكتب ملاحظاتك هنا "></textarea>
                                </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn main-btn btn-md">تأكيد التقييم </button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-->

    @endsection
