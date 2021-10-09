@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">الطلبات </h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{ __('public.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route(''.$order_route) }}">الاوردات </a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">


            @if (session()->has('success'))
                <script>
                    $(document).ready(function() {

                        Swal.fire(
                            '{{ __('public.good_job') }}',
                            "{{ session()->get('success') }}",
                            'success'
                        );
                    });

                </script>

            @endif
            @if (session()->has('error') || $errors->any())
                {{-- @dd($errors); --}}
                <script>
                    $(document).ready(function() {
                        Swal.fire(
                            '{{ __('public.faild_job_job') }}',

                            "",
                            'error'
                        );
                    });

                </script>
            @endif


            <div class="card-content">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>رقم الطلب</th>
                            <th>اسم العميل </th>
                            <th>رقم تلفون العميل </th>
                            <th> ايميل العميل </th>
                            <th>  طريقة الدفع </th>

                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$order->payment_method}}</td>

                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <th> عنوان الشحن</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->address}}</td>



                            </tr>
                        </tbody>
                    </table>
                    @if($order_custom_products)

                    <table class="table">
                        <thead>
                            <th> المنتج</th>
                            <th> السعر </th>
                            <th>الكمية</th>
                            <th> الاجمالي </th>


                        </thead>
                        <tbody>
                            @foreach ($order_products as $product)

                            <tr>

                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->total}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                    <div class="blue-layout cart-layout-1">
                        <div class="blue-title text-center">
                            <h2>قائمة ملفاتك</h2>
                        </div>
                        <div class="c-section-1">
                            <div class="table-responsive">
                                <table class="table table-1">
                                    <thead class="light-blue-bg">
                                        <tr>
                                            <td class="text-center">المجلد</td>
                                            <td>الملفات</td>
                                            <td >سعر الملف</td>
                                            <td>الإجمالي</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($covers as $cover)
                                         {{-- @dd($cover); --}}
                                         <?php $total_for_files = 0; ?>
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{URL::to('/').$cover["photo"]}}">
                                                <p> {{$cover["name"]}}</p>
                                            </td>

                                            <td class="no-padding" >
                                                @foreach ($cover["files"] as $file)
                                                <?php $total_for_files +=  $file->total ;?>
                                                <div class="flex-container">
                                                    <div class="accordion">
                                                        {{-- <input class="number" type="number" min="1" value="{{$file["quantity"]}}"> --}}

                                                        <a class="collapsed h4" data-bs-toggle="collapse" href="#collapse{{$file->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">  {{$file->file}}</a>
                                                        <div class="collapse" id="collapse{{$file->id}}">
                                                            {{-- {{$file->prop}} --}}
                                                        </div>
                                                    </div>


                                                </div>
                                                @endforeach


                                            </td>
                                            <td>  <p class="price pink-color">
                                                <span>{{$file->total}}</span> ريال
                                            </p></td>

                                            <td>
                                                <p class="price-total pink-color">
                                                    <span><?=$total_for_files + $cover["cover_price"]?></span> ريال
                                                </p>
                                            </td>

                                        </tr>
                                        <?php $total_for_files = 0; ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if($order_stickers_products)

                    <h3>الملصقات المراد طباعتها</h3>
                    <table class="table">
                        <thead>
                            <th> المنتج</th>
                            <th> السعر </th>
                            <th>الكمية</th>
                            <th> الاجمالي </th>


                        </thead>
                        <tbody>
                            @foreach ($order_stickers_products as $product)

                            <tr>

                                <td>{{$product->file}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price *  $product->quantity}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
          @if($order_personal_card_products)
                    <h3>الكروت الشخصية المراد طباعتها</h3>
                    <table class="table">
                        <thead>
                            <th> المنتج</th>
                            <th> السعر </th>
                            <th>الكمية</th>
                            <th> الاجمالي </th>


                        </thead>
                        <tbody>
                            @foreach ($order_personal_card_products as $product)

                            <tr>

                                <td>{{$product->file}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price *  $product->quantity}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                    @if($order_posters_products)
                    <h3> البوسترات المراد طباعتها</h3>
                    <table class="table">
                        <thead>
                            <th> المنتج</th>
                            <th> السعر </th>
                            <th>الكمية</th>
                            <th> الاجمالي </th>


                        </thead>
                        <tbody>
                            @foreach ($order_posters_products as $product)

                            <tr>

                                <td>{{$product->file}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price *  $product->quantity}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                    @if($order_rollups_products)
                    <h3> الرول اب المراد طباعتها</h3>
                    <table class="table">
                        <thead>
                            <th> المنتج</th>
                            <th> السعر </th>
                            <th>الكمية</th>
                            <th> الاجمالي </th>


                        </thead>
                        <tbody>
                            @foreach ($order_rollups_products as $product)

                            <tr>

                                <td>{{$product->file}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price *  $product->quantity}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
<h3>حالات الطلب</h3>
                    <table class="table">
                        <thead>
                            <th> التعليق</th>
                            <th> التاريخ </th>



                        </thead>
                        <tbody>
                            @foreach ($order_history as $order_h)

                            <tr>

                                <td>{{$order_h->comment}}</td>
                                <td>{{$order_h->created_at}}</td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                   <div class="col-md-3" >
                    <form action="{{route(''.$change_order_status,['id'=>$order->id])}}" method="post">
                        <div class="form-group">
                            <label>التعليق</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                        @csrf
                        <select class="form-control" name="status">
                            @foreach ($order_status as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>

                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-success" value="تاكيد" />
                    </form>
                   </div>
                   @if($admin)
                     <h3>الارسال الي مندوب ؟</h3>
                   <div class="col-md-3" >
                    <form action="{{route('assgined_to',['id'=>$order->id])}}" method="post">
                        @csrf
                        <select class="form-control select2" name="rep_id">
                            @foreach($representatives as $representative)
                            <option value="{{$representative->id}}">{{$representative->name}}</option>

                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-success" value="تاكيد" />
                    </form>
                   </div>
                   @endif
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
