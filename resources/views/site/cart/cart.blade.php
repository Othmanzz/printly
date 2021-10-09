@extends('layouts.app')

@section('content')
    </header>

    <!--start page content-->
    <div class="page-content">
        <div class="container">
            <div class="blue-layout cart-layout-1">
                <div class="blue-title text-center">
                    <h2>قائمة ملفاتك</h2>
                </div>
                <div class="c-section-1">
                    <div class="table-responsive">
                       @if($covers)
                        <table class="table table-1">
                            <thead class="light-blue-bg">
                                <tr>
                                    <td style="width: 60px;">الكمية</td>
                                    <td class="text-center">المجلد</td>
                                    <td>الملفات</td>
                                    <td style="min-width: 130px">سعر الملف</td>
                                    <td>حذف</td>
                                    <td>الإجمالي</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($covers as $cover)

                                    <?php $total_for_files = 0; ?>
                                    <tr>
                                        <td id="quantity_total{{$cover['id']}}"></td>
                                        <td class="text-center">
                                            <img src="{{ '/uploads/cover_type/' . $cover['photo'] }}">
                                            <p> {{ $cover['name'] }}</p>
                                        </td>
                                       <?php $total_quantity = 0; ?>
                                        <td class="no-padding" colspan="3">
                                            @foreach ($cover['files'] as $file)
                                                <?php $total_for_files += $file['total']; ?>
                                                <div class="flex-container">
                                                    <div class="accordion">
                                                        {{-- <input class="number" type="number" min="1" value="{{$file["quantity"]}}"> --}}

                                                        <a class="collapsed h4" data-bs-toggle="collapse"
                                                            href="#collapse{{ $file['id'] }}" role="button"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            {{ $file['file'] }}</a>
                                                        <div class="collapse" id="collapse{{ $file['id'] }}">
                                                            {{ $file['prop'] }}
                                                        </div>
                                                    </div>
                                                    <p class="price pink-color">
                                                        <span>{{ $file['total'] }}</span> ريال
                                                    </p>
                                                    <button class="delete delete_file_cart" file_id="{{ $file['id'] }}"
                                                        custom="{{ $cover['custom_product_id'] }}" type="button">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                                <?php $total_quantity = $total_quantity + $file["quantity"] ?>
                                            @endforeach



                                        </td>
                                        <script>

                                            document.getElementById("quantity_total"+<?=$cover['id']?>).innerHTML = <?=$total_quantity?>;

                                        </script>
                                        <td>
                                            <p class="price-total pink-color">
                                                <span><?= $total_for_files + $cover["cover_price"] ?></span> ريال
                                            </p>
                                        </td>
                                        <td>
                                            <button class="file-remove gray-color delete_cover_cart" type="button" custom_product_id="{{ $cover['custom_product_id'] }}" cover_id="{{ $cover['m_cover_id'] }}">
                                                <i class="fas fa-times-circle"></i> حذف المجلد
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $total_for_files = 0; ?>
                                    @endforeach

                                </tbody>
                            </table>
                            @endif

                        </div>
                    </div>
                </div>








    @if ($products)

    <div class="pink-layout cart-layout-2">
                    <div class="pink-title text-center">
                        <h2>قائمة المنتجات</h2>
                    </div>
                    <div class="c-section-2">
                        <div class="table-responsive">
                            <table class="table table-2">
                                <thead class="light-pink-bg">
                                    <tr>
                                        <td style="width: 150px;" class="text-center">الكمية </td>
                                        <td class="text-center">المنتج</td>
                                        <td style="min-width: 300px; width:300px" class="text-right">تفاصيل المنتج</td>
                                        <td class="text-center" style="min-width: 130px">سعر الملف</td>
                                        <td class="text-center" style="min-width: 130px">حذف ملف</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)

                                    <tr>
                                        <td class="text-center"><input class="number" type="number" min="1" value="{{ $product->quantity }}"></td>
                                        <td class="text-center"><img src="./img/10.png"></td>
                                        <td class="text-right">
                                            <h3 class="mb-2 gray-color">{{ $product->product_name }}</h3>
                                            <p class="small gray-color"> {{ $product->desc }}</p>
                                        </td>
                                        <td class="text-center"><b class="price h4">{{ $product->quantity * $product->price }} ريـال</b></td>
                                        <td class="text-center"><button  onclick="cart.remove({{ $product->c_id }})" class="delete"><i class="fas fa-trash-alt"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                <div class="yellow-layout cart-layout-3">
                    <div class="yellow-title text-center">
                        <h2>تفاصيل الأسعار</h2>
                    </div>

                    <div class="c-section-3">
                        <h2 class="pink-color mb-4">
                            <img class="mx-2" src="./img/icons/coupon.png"> كوبون خصم
                        </h2>

                        <div class="row mb-5">
                            <div class="col-lg-4 col-sm-6">
                                <div class="">
                                    <input type="text" class="sale-coupon col-md-5 code"   ></input>
                                    <input type="hidden" class="form-control total" value="{{ $total_price }}"  ></input>

                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-1 col-sm-6">
                                <div class="d-grid gap-2">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-lg use_code">إستخدام</a>
                                </div>
                            </div>
                        </div>

                        <h2 class="pink-color mb-4">
                            <img class="mx-2" src="./img/icons/coupon.png"> اخبرنا إذا كان لديك ملاحظات على الطب
                        </h2>

                        <div class="row">
                            <div class="col-lg-6">
                                <textarea rows="9" class="form-control mb-3 note" placeholder="أكتب ملاحظاتك هنا"></textarea>
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="./img/icons/bill.png">
                                            </td>
                                            <td>
                                                <h4> السعر قبل الخصم :</h4>
                                            </td>
                                            <td>
                                                <p>{{ $total_price }} ريال</p>
                                            </td>
                                        </tr>
                                        <tr class="pink-color">
                                            <td>
                                                <img src="./img/icons/bill.png">
                                            </td>
                                            <td>
                                                <h4> السعر قبل الخصم :</h4>
                                            </td>
                                            <td>
                                                <p class="after_discount">{{ $total_price }} ريال</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="mt-4 text-center">
                                    <a href="javascript::void(0)" class="btn main-btn btn-lg go_checkout">إتمام الطلب</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="cart-layout-empty blue-layout text-center">
                    <div class="icon">
                        <img src="./img/icons/empty-cart.png">
                    </div>
                    <div class="text">
                        <b>حقيبة التسوق الخاصة بكِ فارغة حالياً</b>
                        <br> !تعرّف على تشكيلتنا أضيف ما يناسبكِ إلى حقيبتك الآن
                    </div>

                    <div class="mt-5 text-center">
                        <a href="#" class="btn main-btn btn-lg">تصفح منتجاتنا</a>
                    </div>
                </div>-->

            </div>
        </div>
        <!--end-->


@endsection
