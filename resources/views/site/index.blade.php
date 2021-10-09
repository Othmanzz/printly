@extends('layouts.app')

@section('content')
            <div class="content text-center">
                <div class="container">
                    <h2 class="h1 mb-3" data-aos="zoom-in" data-aos-duration="1000">مكتبة برنتلى</h2>
                    <p class="mb-4">خدمات الطباعة والخدمات الطلابية</p>
                    <a href="{{route('custome-product')}}" class="btn btn-primary mb-4">
                        <img src="./img/icons/printer.png"> أطلب طباعتك
                    </a>
                    <ul class="list-inline">
                        <li class="list-inline-item mb-2">
                            <a href="#"><img class="lazy" data-src="./img/store1.png"></a>
                        </li>
                        <li class="list-inline-item mb-2">
                            <a href="#"><img class="lazy" data-src="./img/store2.png"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!--End-->
        <!--Start Services-->
        <div class="home-layout-1 home-layout">
            <div class="head-title text-center">
                <h2 class="h1">خدماتنا</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="h-section-1 text-center" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="500">
                            <div class="image mb-5">
                                <img class="lazy" data-src="./img/image1.png">
                            </div>
                            <h4><a href="./checkout.html">طباعة الأوراق</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="h-section-1 text-center" data-aos="fade-up" data-aos-duration="1000">
                            <div class="image mb-5">
                                <img class="lazy" data-src="./img/image2.png">
                            </div>
                            <h4><a href="#">مطبوعات اخري</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="h-section-1 text-center" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="1000">
                            <div class="image mb-5">
                                <img class="lazy" data-src="./img/image3.png">
                            </div>
                            <h4><a href="#">المنتجات</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-->
@if($home_banner)
              <!--Start Banner-->
              <div class="home-layout-2 home-layout" data-aos="fade-in" data-aos-duration="1000">
                <div class="container">
                    <div class="h-section-2 text-center">
                        <a href="{{$home_banner->link}}">
                            <img class="lazy" data-src="{{'/uploads/banners/'.$home_banner->photo}}">
                        </a>
                    </div>
                </div>
            </div>
            <!--End--
                @endif
  <!--Start Printers-->
  <div class="home-layout-3 home-layout">
    <div class="container">
        <div class="head-title text-center">
            <h2 class="h1">مطبوعات اخرى </h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="h-section-3 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="image mb-3">
                        <a href="#">
                            <img class="lazy" data-src="./img/1.png">
                            <span class="hidden h3">بوسترات<span/>
                        </a>
                    </div>
                    <h4><a href="#">بوسترات</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="h-section-3 text-center" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="500">
                    <div class="image mb-3">
                        <a href="#">
                            <img class="lazy" data-src="./img/2.png">
                            <span class="hidden h3">تغليف<span/>
                        </a>
                    </div>
                    <h4><a href="#">تغليف</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="h-section-3 text-center" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="1000">
                    <div class="image mb-3">
                        <a href="#">
                            <img class="lazy" data-src="./img/3.png">
                            <span class="hidden h3">بنرات<span/>
                        </a>
                    </div>
                    <h4><a href="#">بنرات</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="h-section-3 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1500">
                    <div class="image mb-3">
                        <a href="#">
                            <img class="lazy" data-src="./img/4.png">
                            <span class="hidden h3">ملصقات<span/>
                        </a>
                    </div>
                    <h4><a href="#">ملصقات</a></h4>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">
                مزيد من النتجات <i class="fas fa-chevron-left ms-1"></i>
            </a>
        </div>
    </div>
</div>
<!--End-->


        <!--Start Products-->
        <div class="home-layout-4 home-layout">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $x = 0; ?>
                    @foreach ($categories as $category)

                    <?php ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($x == 0) active @endif" id="x{{$category["id"]}}-tab" data-bs-toggle="tab" data-bs-target="#x{{$category["id"]}}" type="button" role="tab" aria-controls="x{{$category["id"]}}" aria-selected="true">{{$category["name"]}} </button>
                    </li>
                <?php $x++; ?>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    <?php $y = 0; ?>
                    @foreach ($categories as $category)
                    <div class="tab-pane fade @if($y == 0)  show active @endif" id="x{{$category["id"]}}" role="tabpanel" aria-labelledby="x{{$category["id"]}}-tab">
                        <div class="owl-carousel owl-theme owl-carousel-classic">
                            @foreach ($category["products"] as $product)
                        <div class="item">
                            <div class="h-section-4 mb-3">
                                <div class="new">
                                    <span>جديد</span>
                                </div>
                                <div class="image">
                                    <a href="#"><img src="{{'/uploads/products/'.$product->image}}"></a>
                                    <a href="#" class="btn"><img src="./img/icons/text-file.png" alt="file"> التفاصيل </a>

                                </div>
                                <div class="flex-container">
                                    <div class="text">
                                        <h5><a href="#">{{$product->product_name}}</a></h5>
                                        <p>{{$product->desc}}</p>
                                    </div>
                                    <div class="price"> ريال
                                        <p>{{$product->price}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity mb-3">
                                <label class="float-right">الكمية</label>
                                <input class="cart_q{{$product->id}} number" type="number" value="1" min="1">
                            </div>
                            <div class="buttons mb-3">
                                <a href="#"><img src="./img/icons/share.png"></a>
                                <div class="pretty-checkbox">
                                    <div class="pretty p-icon p-toggle p-plain">
                                        <input type="checkbox"  onclick="wishlist.add({{$product->id}}, 1 , 0)" />
                                        <div class="state p-on">
                                            <i class="icon fas fa-heart"></i>
                                            <label></label>
                                        </div>
                                        <div class="state p-off">
                                            <i class="icon far fa-heart"></i>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" onclick="cart.add({{$product->id}}, $('.cart_q{{$product->id}}').val() , 0)" class="btn add-to-cart">
                                    <img src="./img/icons/cart-sm.png">
                                    <span>أضف إلى السلة</span>
                                </a>
                            </div>
                        </div>
@endforeach
                    </div>
                    <?php $y++; ?>
                </div>
                @endforeach

            </div>
            @if(count($products) > 9)
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">
                    مزيد من النتجات <i class="fas fa-chevron-left ms-1"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
    <!--End-->
{{-- @foreach ($products as $product)
    <h3>{{$product->product_name}}</h3>
    <button class="btn btn-success" onclick="cart.add({{$product->product_id}}, 1 , 0)">add to cart</button>
    <button class="btn btn-success" onclick="wishlist.add({{$product->product_id}}, 1 , 0)">add to wishlist</button>

@endforeach

<h1>Carts</h1>
@foreach ($carts as $cart)
    <h3>{{$cart->product_name}}</h3>
    <button class="btn btn-success" onclick="cart.remove({{$cart->cart_id}})">add to cart</button>

@endforeach --}}


@endsection
