<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/../css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/../css/all.min.css">
    <link rel="stylesheet" href="/../plugins/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/../plugins/owlcarousel/owl.theme.default.css">
    <link rel="stylesheet" href="/../css/pretty-checkbox.min.css">
    <link rel="stylesheet" href="/../plugins/aos/aos.css">
    <link rel="stylesheet" href="/../plugins/steps/jquery.steps.css">
    <link rel="stylesheet" href="/../plugins/dropzone/dropzone.css">
    <link rel="stylesheet" href="/../plugins/fileinput/fileinput.css">
    <link rel="stylesheet" href="/../css/main.css">
    <link rel="stylesheet" href="/../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">
    <script src="../../../app-assets/js/core/libraries/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
    <title>برنتلي</title>
</head>
<style>
    .disable-div {
    pointer-events: none;
}

    #snackbar {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
    }
    </style>
<body>
    @if(session()->has('success'))
    <script>
        $(document).ready(function () {

        Swal.fire(
'{{__("public.good_job")}}',
"{{ session()->get('success') }}",
'success'
);
        });
    </script>

    @endif
    @if(session()->has('error') || $errors->any())
    {{-- @dd($errors); --}}
    <script>
    $(document).ready(function () {
        Swal.fire(
           "{{ session()->get('error') }}",

           "{{ session()->get('error') }}",

'error'
);
});
    </script>
    @endif
{{-- <?php
// $ip = $_SERVER["REMOTE_ADDR"];
// $browser =App\Http\Controllers\ProfileController::getBrowser();
// $os =App\Http\Controllers\ProfileController::getOs();
// DB::insert("insert into visits (`ip` , `browser` , ``) VALUES ()");


?> --}}
    <!--start offcanvas menu-->
    <div class="offcanvas text-center">
        <div class="offcanvas-body">


<?php $wallet = DB::selectOne("select * from wallets where user_id ='".Auth::id()."'"); ?>
@guest
@if (Route::has('login'))
<a class="btn btn-secondary" href="{{ route('login') }}">
    تسجيل الدخول
</a>
@endif
@else
            <div class="user">
                <div class="flex-container  mb-3">
                    <div class="user-image"><img src="{{URL::to('/')}}/img/user.png"></div>
                    <div class="user-details">
                        <h5 class="user-name">{{ Auth::user()->name }}</h5>
                       @if($wallet) <p>رصيدك :<span>{{$wallet->amount}} ريال</span></p>@endif
                    </div>
                </div>
                <a href="{{route('orders')}}" class="btn btn-primary mb-3">طلباتى</a>
            </div>
@endguest

            <ul class="list-unstyled">
                <li class="semibold"><a href="/">الرئيسية</a></li>
                <li class="semibold"><a href="#">اطلب طباعتك</a></li>
                <li class="semibold"><a href="#">المتجر</a></li>
                <li class="semibold"><a href="#">قائمة الأمنيات</a></li>
                <li class="semibold"><a href="#"> انضم كسفير</a></li>
                <li class="light"><a href="#">طلب مجاني</a></li>
                <li class="light"><a href="#">أفرع برلنتى</a></li>
                <li class="light"><a href="#">عن برلنتى</a></li>
                <li class="light"><a href="#"> سياسة التوصيل والأستلام</a></li>
                <li class="light"><a href="#"> تواصل معنا</a></li>
            </ul>
            <ul class="list-inline mt-3 mb-3">
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
             <!-- Right Side Of Navbar -->
                @guest
                @if (Route::has('login'))
                <a class="btn btn-secondary" href="{{ route('login') }}">
                    تسجيل الدخول
                </a>
                @endif
                @else

                <a class="btn btn-secondary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                     تسجيل الخروج

                        </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                @endguest
        </div>
    </div>
    <!--end-->

    <!--start wrapper-->
    <div class="wrapper" id="app">
      <!--Start Header-->
      <header>
        <nav class="navbar navbar-expand navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{URL::to('/')}}/img/logo.png" alt="logo"></a>

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto d-md-inline d-sm-none d-none">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fab fa-snapchat-ghost"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item ms-5 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{URL::to('/')}}/img/icons/cart.png" alt="cart" style="min-width: 30px;">
                                <span class="badge"></span>
                            </a>
                            <?php
                             $get_carts = \Illuminate\Support\Facades\DB::select("select p.id as c_id from `carts`
                                 as c left join custom_products as p on
                                 c.product_id = p.id   where c.type = '1' and c.user_id = '".Auth::id()."' and p.id != null");

                                 $get_carts_for_products = \Illuminate\Support\Facades\DB::select("select c.id as c_id , p.image , p.id , c.quantity , p.product_name , p.price from `carts` as c left join products as p on
                     c.product_id = p.id where c.type = '0' and c.user_id = '".Auth::id()."' ");
                            ?>
                            <div class="dropdown-menu cart" aria-labelledby="navbarDropdown">
                                @if(count($get_carts) > 0 || count($get_carts_for_products) > 0)
                                @if(count($get_carts) > 0 )
                                <h5 class="pink-color">الملفات</h5>
                                <?php

                                 $files = [];
                                 foreach ($get_carts as $cart) {
                                     $files[] = $cart->c_id;
                                 }
                                $files = implode("','",$files);
                                $files = "'$files'";

                                if($files != ""){
                                 $get_files = \Illuminate\Support\Facades\DB::select("select * from custom_products_files
                                 where custom_product in ($files)  ");

                                                     foreach ($get_files as $file) {

                                                 ?>
                                <table class="table table-2">
                                    <tbody>

                                        <tr>
                                            <td><img src="{{URL::to('/')}}/img/icons/pdf.png"></td>
                                            <td class="text-center">
                                                <input class="mb-2 number" type="number" value="{{$file->quantity}}" min="1">
                                                <h6><a href="#" class="pink-color">{{$file->file}} </a></h6>
                                                <span>{{$file->total}} ريال</span>
                                            </td>
                                            <td>
                                                <button class="delete delete_file_cart" file_id="{{$file->id}}" custom="{{$file->custom_product}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <?php }}
                                ?>
@endif

@if(count($get_carts_for_products) > 0 )
                                <h5 class="pink-color">المنتجات</h5>
                                <table class="table table-2">
                                    <tbody>
                                        <?php

                                         foreach ($get_carts_for_products as $cart) {
                                             # code...
                                     ?>
                                        <tr>
                                            <td><img src="{{base_path().'/uploads/products/'.$cart->image}}"></td>
                                            <td class="text-center">
                                                <input class="mb-2 number" type="number" value="{{$cart->quantity}}" min="1">
                                                <h6><a href="#" class="pink-color"> {{$cart->product_name}}</a></h6>
                                                <span>{{$cart->price * $cart->quantity}} ريال</span>
                                            </td>
                                            <td>
                                                <button onclick="cart.remove({{$cart->c_id}})" class="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }
                                        ?>
                                    </tbody>
                                </table>
@endif
                                <div class="text-center buttons">
                                    {{-- <a href="./checkout.html" class="btn secondary-btn">الدفع</a> --}}
                                    <a href="/cart" class="btn main-btn">السلة</a>
                                </div>
                                @else
                                <p class="text-center pink-color larger">السلة فارغة</p>

                                @endif
                            </div>

                        </li>
                        <li class="nav-item ms-3 d-md-inline d-sm-none d-none">

                            @if (!Auth::id())
            <a href="{{ route('login') }}" class="btn btn-default">تسجيل دخول</a>


                @else
                <a class="user-name nav-link large" href="{{route('profile')}}">
                    {{ Auth::user()->name }} <img src="{{URL::to('/')}}/img/icons/user.png">  </a>
@endif


                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link open-sidebar">
                                <div class="bars">
                                    <span class="bar-item"></span>
                                    <span class="bar-item"></span>
                                    <span class="bar-item"></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>



            @yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="logo mb-4">
                    <img class="lazy" data-src="{{URL::to('/')}}/img/footer-logo.png">
                </div>
                <ul class="list-inline socials mb-4">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fas fa-paper-plane"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
                <div class="row">
                    <div class="col-6">
                        <a href="#"><img class="lazy" src="{{URL::to('/')}}/img/store1.png"></a>
                    </div>
                    <div class="col-6">
                        <a href="#"><img class="lazy" src="{{URL::to('/')}}/img/store2.png"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3">
                <ul class="list-unstyled">
                    <li><a href="#">مین برنتلي؟</a></li>
                    <li><a href="#">أفرع برنتلي</a></li>
                    <li><a href="#">الشروط و الأحكام</a></li>
                    <li><a href="#">تواصل معنا</a></li>
                </ul>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-5">
                <p>برنتلي تقدم خدمات طباعة اوراقك وملفاتك اونلاين بجودة عالية و بأفضل الاسعار المنافسة مع توفير خدمة التوصيل لجميع مناطق المملكة</p>
                <p><img src="{{URL::to('/')}}/img/icons/placeholder.png"> جدة - حي السليمانية - شارع عبدالقدوس الأنصاري مركز الواحات التجاري - مكتبة برنتلي</p>
                <p>للدعم الفني أو الشكاوى، يمكنك التواصل معنا عبر<br>
                    <a href="maito:hello.printly.sa@gmail.com">hello.printly.sa@gmail.com</a>/ <a href="mailto:printly.sa@gmail.com">printly.sa@gmail.com</a><br> <a href="tel:0549872083">0549872083</a>
                </p>
            </div>
        </div>
    </div>
</footer>

</div>

<div class="preloader">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
</div>
<!--end-->

<script src="/../js/jquery-3.1.1.min.js "></script>
<script src="/../js/bootstrap.bundle.min.js "></script>
<script src="/../plugins/jquery.lazy.min.js "></script>
<script src="/../plugins/bootstrap-input-spinner.js "></script>
<script src="/../plugins/owlcarousel/owl.carousel.min.js "></script>
<script src="/../plugins/aos/aos.js "></script>
<script src="/../plugins/steps/jquery.steps.min.js "></script>
<script src="/../plugins/dropzone/dropzone.js "></script>
<script src="/../plugins/fileinput/fileinput.js "></script>
<script src="/../js/main.js "></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

<div id="snackbar"></div>

</body>
<!-- loader -->
  <div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                               <div class="modal-header">

    </div>
                              <div class="modal-body">
                                <h3 class="text-center">جاري التحميل  .......</h3>
    </div>
                            </div>
                        </div>
                    </div>
</html>
<script>

    var cart = {
        'add': function(product_id, quantity , type) {
            $.ajax({
                url: '/addToCart',
                type: 'post',
                headers:{ 'Authorization': 'Bearer ' + $('meta[name=csrf-token]').attr("content"),},
                data: '_token={{csrf_token()}}'+'&type='+type+'&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer" + " " + $('meta[name=csrf-token]').attr("content"));
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {
                    $('.alert-dismissible, .text-danger').remove();

                    if (json['redirect']) {
                        location = json['redirect'];
                    }

                    if (json['success']) {
                        $('#app').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json["data"].message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                        // Need to set timeout otherwise it wont update the total
                        setTimeout(function () {
                            $('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
                        }, 100);

                        $('html, body').animate({ scrollTop: 0 }, 'slow');

                        $('#cart > ul').load('index.php?route=common/cart/info ul li');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var res = JSON.parse(xhr.responseText);
                    console.log(res);
                    if(res.message == "Unauthenticated."){
                      window.location = '/login';
                    }else{
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                }
            });
        },
        'update': function(key, quantity) {
            $.ajax({
                url: 'edit_cart',
                type: 'post',
                data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                beforeSend: function() {
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {
                    // Need to set timeout otherwise it wont update the total
                    setTimeout(function () {
                        $('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
                    }, 100);


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        },
        'remove': function(key) {
            $.ajax({
                url: '/remove_from_cart',
                type: 'post',
                data: '_token={{csrf_token()}}'+'&key=' + key,
                dataType: 'json',
                beforeSend: function() {
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {
                    // Need to set timeout otherwise it wont update the total
                if(json['success']){
                    location.reload();
                }else{
                    $('#app').parent().before('<div class="alert alert-danger alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    }

    var wishlist = {
        'add': function(product_id, quantity , type) {
            $.ajax({
                url: '/addToWishlist',
                type: 'post',
                headers:{ 'Authorization': 'Bearer ' + $('meta[name=csrf-token]').attr("content"),},
                data: '_token={{csrf_token()}}'+'&type='+type+'&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer" + " " + $('meta[name=csrf-token]').attr("content"));
                    $('#wishlist > button').button('loading');
                },
                complete: function() {
                    $('#wishlist > button').button('reset');
                },
                success: function(json) {
                    $('.alert-dismissible, .text-danger').remove();

                    if (json['redirect']) {
                        location = json['redirect'];
                    }

                    if (json['success']) {
                        $('#app').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json["data"].message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                        // Need to set timeout otherwise it wont update the total
                        setTimeout(function () {
                            $('#wishlist > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
                        }, 100);

                        $('html, body').animate({ scrollTop: 0 }, 'slow');

                        $('#wishlist > ul').load('index.php?route=common/cart/info ul li');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var res = JSON.parse(xhr.responseText);
                    console.log(res);
                    if(res.message == "Unauthenticated."){
                      window.location = '/login';
                    }else{
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                }
            });
        },
        'update': function(key, quantity) {
            $.ajax({
                url: 'edit_wishlist',
                type: 'post',
                data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                beforeSend: function() {
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {
                    // Need to set timeout otherwise it wont update the total
                    setTimeout(function () {
                        $('#cart > button').html('<span id="cart-total"><img src="catalog/view/theme/default/image/icon-cart.png"> ' + json['total'] + '</span>');
                    }, 100);


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        },
        'remove': function(key) {
            $.ajax({
                url: '/remove_from_cart',
                type: 'post',
                data: '_token={{csrf_token()}}'+'&key=' + key,
                dataType: 'json',
                beforeSend: function() {
                    $('#cart > button').button('loading');
                },
                complete: function() {
                    $('#cart > button').button('reset');
                },
                success: function(json) {
                    // Need to set timeout otherwise it wont update the total
                if(json['success']){
                    location.reload();
                }else{
                    $('#app').parent().before('<div class="alert alert-danger alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    }
    </script>
<script src="./plugins/jquery.validate.min.js"></script>
