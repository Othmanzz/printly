@extends('layouts.app')

@section('content')
    </header>
      <!--Start Page Content-->
      <div class="page-content orders-page">
        <div class="container">
            <div class="blue-layout">
                <div class="blue-title text-center">
                    <h2>طلباتى</h2>
                </div>


                <div class="table-responsive">
                    <table class="table table-2">
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center">
                                    <span class="gray-color bold opacity-05"> {{$order["date"]}}</span>
                                    <h4 class="pink-color mt-3"> {{$order["order_id"]}} #</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;"> حالة الطلب</span>
                                    <h4 class="mt-3"> {{$order["status"]}}</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;"> عدد الملفات</span>
                                    <h4 class="mt-3"> {{$order["number_of_printed_file"]}} ملفات</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;"> عدد المنتجات</span>
                                    <h4 class="mt-3"> {{$order["number_of_products"]}} منتج</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;"> إجمالي السعر</span>
                                    <h4 class="mt-3"> {{$order["total"]}} ريـال</h4>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('show-order',['id'=>$order["order_id"]])}}" class="btn btn-primary btn-md">تفاصيل الطلب</a>
                                </td>
                                <td class="text-center">
                                    <button class="edit"><i class="fas fa-edit"></i> <br> <span class="small gray-color">تعديل</span></button>
                                    <button class="delete mx-4"><i class="fas fa-trash-alt"></i>  <br> <span class="small gray-color">حذف</span></button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--End-->
@endsection
