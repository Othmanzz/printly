<!DOCTYPE html>
<html class="loading" lang="{{app()->getLocale()}}" @if(app()->getLocale() == "en") data-textdirection="ltr" @else data-textdirection="rtl" @endif>
<!-- BEGIN: Head-->
<head>
    <?php
 $get_user = DB::selectOne("select * from users where id ='".Auth::id()."'");
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="saad">
    <meta name="keywords" content="saad">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="saad">
    <title>برنتلي  </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/custom-ejad/all.min.css">
    <link rel="stylesheet" href="https://zulns.github.io/w3css/w3.css" />


    <!-- BEGIN: Vendor CSS-->
    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors-rtl.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors-rtl.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether-theme-arrows.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/shepherd-theme-default.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/pages/dashboard-analytics.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/pages/card-analytics.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/plugins/tour/tour.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/custom-rtl.css">
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/custom-ejad/custom-rtl.css">

    @else
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether-theme-arrows.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/shepherd-theme-default.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-analytics.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/tour/tour.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/custom-ejad/custom-ltr.css">
    @endif
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="../../../css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">
    <script src="../../../app-assets/js/core/libraries/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
    <!-- END: Custom CSS-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      rel="stylesheet"
      href="../../../app-assets/css/hijir_css.css"
    />
     <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/rtl.css">
      <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <style>
        .customer-message {
  border-bottom: 1px solid #e3e6f0;
  padding-bottom: 10px;
  padding-top: 10px
}

.customer-message:hover {
  background-color: #f8f9fc
}

.customer-message a .message-title {
  padding-right: 1.3rem;
  padding-left: 1.3rem
}

.customer-message a .message-time {
  padding-right: 1.3rem;
  padding-left: 1.3rem
}

.customer-message a:hover {
  text-decoration: none
}
.topbar .dropdown-list .dropdown-item .text-truncate {
      max-width: 13.375rem
  }
  .topbar .dropdown-list .dropdown-item .text-truncate {
  max-width: 10rem
}

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
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

    "",
    'error'
    );
    });
            </script>
            @endif
<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                <a class="navbar-brand" href="/admin">
                    <div class="brand-logo">
                        <img class="img-fluid" src="../../../app-assets/images/logo/logo.png"  />
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                </div>
                <ul class="nav navbar-nav float-right">


                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                  <?php   $notifications =  \Illuminate\Support\Facades\DB::select("select * from notifications where user_id = '".Auth::id()."' and `read`  = 0 order by id desc limit 15 ");
                    ?>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up"><?=count($notifications)?></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white"><?=count($notifications)?> {{__('public.new')}}</h3><span class="notification-title">{{__('public.notifications')}}</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                <?php

                                  foreach ($notifications as $notification){
                                ?>
                                <a class="d-flex justify-content-between" href="{{$notification->route}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">{{__(''.$notification->content)}}</h6>
                                        </div><small>
                                            <time class="media-meta" datetime="<?=$notification->created_at?>"><?=$notification->created_at?></time></small>
                                    </div>
                                </a>
                            <?php } ?>
                            </li>

                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="{{route('notifications')}}">{{__('public.notifications')}}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}} </span>
                       </div><span> @if($get_user->photo)<img class="round" src="{{'/uploads/photos/users/'.$get_user->photo}}" alt="avatar" height="40" width="40">@else <img class="round" src="{{'/app-assets/images/avatar.png'}}" alt="avatar" height="40" width="40"> @endif</span> 
                    </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          
                            <a class="dropdown-item" href="{{route('profile')}}"><i class="feather icon-user"></i>{{__('public.profile')}}</a>
            

                
                            <div class="dropdown-divider"></div>  <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        تسجيل الخروج

                        </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                        </div> 
                    </li>
                    

                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">{{ __('public.printly') }}</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" style="column-count:2 " >
                <li class="dropdown nav-item"  data-menu="dropdown"><a class="dropdown-toggle nav-link" href="/" data-toggle="dropdown"><i class="feather icon-home"></i><span data-i18n="Dashboard">{{ __('public.main_department') }}</span></a>
                    <ul class="dropdown-menu"  style="column-count: 1;"  >


               @if($get_user->type == 1)
               <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الأدمن</a>
                   <ul class="dropdown-menu" style="column-count:1">

                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الأوراق</a>
                        <ul class="dropdown-menu" style="column-count:1">
                            <li data-menu=""><a class="dropdown-item" href="{{route('papers')}}" data-toggle="dropdown" data-i18n="Details">الأوراق</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('paper-types')}}" data-toggle="dropdown" data-i18n="Details">انواع الورق</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('paper_slices')}}" data-toggle="dropdown" data-i18n="Details">تخطيط الورق</a>
                            </li>

                            <li data-menu=""><a class="dropdown-item" href="{{route('cover_types')}}" data-toggle="dropdown" data-i18n="Details">انواع التغليف</a>
                            </li>
                        </ul>
                    </li>
 <!--  <li data-menu=""><a class="dropdown-item" href="{{route('coupons')}}" data-toggle="dropdown" data-i18n="Details">اكواد الخصم </a>
                               </li> -->
                       {{-- <li data-menu=""><a class="dropdown-item" href="{{route('add-paper')}}" data-toggle="dropdown" data-i18n="Details">اضافة ورق جديد</a>
                       </li> --}}

                       <li data-menu=""><a class="dropdown-item" href="{{route('tickets')}}" data-toggle="dropdown" data-i18n="Details">التذاكر</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('blogs')}}" data-toggle="dropdown" data-i18n="Details">المدونة</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('country')}}" data-toggle="dropdown" data-i18n="Details">المدن</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('area')}}" data-toggle="dropdown" data-i18n="Details">المناطق</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('categories')}}" data-toggle="dropdown" data-i18n="Details">الاقسام</a>
                       </li>

                       <li data-menu=""><a class="dropdown-item" href="{{route('products')}}" data-toggle="dropdown" data-i18n="Details">المنتجات</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('add-user')}}" data-toggle="dropdown" data-i18n="Details">اضافة مستخدم</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('users',['type'=>0])}}" data-toggle="dropdown" data-i18n="Details">المستخدمين</a>
                       </li>
                         <li data-menu=""><a class="dropdown-item" href="{{route('users',['type'=>1])}}" data-toggle="dropdown" data-i18n="Details">المشرفين  </a>
                       </li>
                         <li data-menu=""><a class="dropdown-item" href="{{route('users',['type'=>2])}}" data-toggle="dropdown" data-i18n="Details">النشرين  </a>
                       </li>
  <li data-menu=""><a class="dropdown-item" href="{{route('users',['type'=>3])}}" data-toggle="dropdown" data-i18n="Details">المندوبين </a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('users' , ['type'=>4])}}" data-toggle="dropdown" data-i18n="Details">عمال الطباعة</a>
                       </li>
                         <li data-menu=""><a class="dropdown-item" href="{{route('users' , ['type'=>5])}}" data-toggle="dropdown" data-i18n="Details">عمال التغليف  </a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('users' , ['type'=>6])}}" data-toggle="dropdown" data-i18n="Details">السائقين    </a>
                       </li>
                        <li data-menu=""><a class="dropdown-item" href="{{route('users' , ['type'=>7])}}" data-toggle="dropdown" data-i18n="Details">السفراء    </a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('users' , ['type'=>2])}}" data-toggle="dropdown" data-i18n="Details"> الناشرين</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('banners')}}" data-toggle="dropdown" data-i18n="Details">البانرات</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('branchs')}}" data-toggle="dropdown" data-i18n="Details">الفروع</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('faqs')}}" data-toggle="dropdown" data-i18n="Details">الأسئلة الشائعة</a>
                       </li>
                       <li data-menu=""><a class="dropdown-item" href="{{route('aorders')}}" data-toggle="dropdown" data-i18n="Details">الطلبات</a>
                       </li>



                       <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الملصقات</a>
                        <ul class="dropdown-menu" style="column-count:1">
                            <li data-menu=""><a class="dropdown-item" href="{{route('stickers-paper-type')}}" data-toggle="dropdown" data-i18n="Details">انواع الورق</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('stickers-paper-size')}}" data-toggle="dropdown" data-i18n="Details">احجام الورق</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('stickers-paper-shape')}}" data-toggle="dropdown" data-i18n="Details">اشكال الورق</a>
                            </li>

                            <li data-menu=""><a class="dropdown-item" href="{{route('stickers-price-list')}}" data-toggle="dropdown" data-i18n="Details">قائمة الأسعار</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الكروت الشخصية</a>
                        <ul class="dropdown-menu" style="column-count:1">
                            <li data-menu=""><a class="dropdown-item" href="{{route('personal_cards-card-type')}}" data-toggle="dropdown" data-i18n="Details">انواع الورق</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('personal_cards-card-size')}}" data-toggle="dropdown" data-i18n="Details">احجام الورق</a>
                            </li>


                            <li data-menu=""><a class="dropdown-item" href="{{route('personal_cards-price-list')}}" data-toggle="dropdown" data-i18n="Details">قائمة الأسعار</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers"> الرول اب</a>
                        <ul class="dropdown-menu" style="column-count:1">

                            <li data-menu=""><a class="dropdown-item" href="{{route('rollups-size')}}" data-toggle="dropdown" data-i18n="Details">احجام الرول اب</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">البوسترات</a>
                        <ul class="dropdown-menu" style="column-count:1">

                            <li data-menu=""><a class="dropdown-item" href="{{route('posters-size')}}" data-toggle="dropdown" data-i18n="Details">احجام  البوسترات</a>
                            </li>
                        </ul>
                    </li>
                   </ul>

               </li>
               <li data-menu=""><a class="dropdown-item" href="{{route('settings')}}" data-toggle="dropdown" data-i18n="Details"> الاعدادات</a>
               </li>


                   @endif

                   @if($get_user->type == 2)
                   <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الأدمن</a>
                       <ul class="dropdown-menu" style="column-count:1">

                           <li data-menu=""><a class="dropdown-item" href="{{route('products')}}" data-toggle="dropdown" data-i18n="Details">المنتجات</a>
                           </li>


                       </ul>
                   </li>
                       @endif

                       @if($get_user->type == 3)
                       <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الأدمن</a>
                           <ul class="dropdown-menu" style="column-count:1">

                               <li data-menu=""><a class="dropdown-item" href="{{route('reporders')}}" data-toggle="dropdown" data-i18n="Details">الطلبات</a>
                               </li>
 

                           </ul>
                       </li>
                           @endif

                           @if($get_user->type == 4)
                           <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="papers">الأدمن</a>
                               <ul class="dropdown-menu" style="column-count:1">

                                   <li data-menu=""><a class="dropdown-item" href="{{route('printorders')}}" data-toggle="dropdown" data-i18n="Details">الطلبات</a>
                                   </li>


                               </ul>
                           </li>
                               @endif

            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->


        <div class="app-content content content-body">
            @yield('content')
        </div>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span>
            COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="#" target="_blank">#</a> - All rights Reserved.
        </span>
        <!--<span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>-->
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/shepherd.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<script src="../../../app-assets/js/scripts/components.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="../../../app-assets/js/scripts/hijir.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<!-- END: Page JS-->
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/js/scripts/forms/select/form-select2.js"></script>
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="../../../js/axios/dist/axios.min.js"></script>
    <script src="{{URL::to('/')}}/plugins/double-click-editable/jquery.editable.min.js"></script>

</body >
<!-- END: Body-->

</html>
<script type="text/javascript">


    $(function () {
        $("#hijri-date-input").hijriDatePicker({
        locale:"ar-sa",
        hijri: true,
        viewMode: 'months',
        showClose: true,
        showClear: true,
        showTodayButton: true,
        useCurrent:false,

    });
          $("#ministry_joined_date").hijriDatePicker({
        locale:"ar-sa",
        hijri: true,
        viewMode: 'months',
        showClose: true,
        showClear: true,
        showTodayButton: true,
        useCurrent:false,

    });
    });
</script>
<script>
// $("#email").on('change',function(){

//   var val = $("#email").val();
// val = val.split('@')[0];
//   final = val + '@moh.gov.sa';
//   $("#email").val('');

//   $("#email").val(final);
// })
    document.querySelector(".phone").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }

        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.target.value.length > 9 || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});

        document.querySelector(".civil_registry").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }

        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.target.value.length > 9 || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});

        document.querySelector(".job_number").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }

        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.target.value.length > 10 || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});

    </script>


<script>

    (  function pollNo()  {
     setTimeout(function(){
         url  = '/noti_json';
          let config = {
     headers: {
       'Authorization': 'Bearer ' + $('meta[name=token]').attr("content"), //the token is a variable which holds the token
        //the token is a variable which holds the token
     }
   }


      axios({
      method: 'post',
      url : url ,
      data : {token :  $('meta[name=csrf-token]').attr("content")},
      headers : {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     })
     .then(function (response) {

         if(response.data.success == "1"){
      var notifs = response.data.data.notifications;
      for(var item in notifs)
      {

        toastr.info(''+notifs[item].content, { "progressBar": true });

      }

      }else{
          console.log("Notification system not working");
      }
        pollNo();
     })
     .catch(function (error) {
       console.log(error);
        console.log("Notification system not working");
       pollNo();

     });
   }, 3000);
               })();

  //     var source = new EventSource("/ph_app/AjaxHandler/Notification/NotificationEvent.php");
  // source.onmessage = function(event) {


  //   console.log(event.data);
  // };

  // source.onerror = function(error){
  //   console.log(error);
  // }


  </script>
 <script>
    $('.editable_price').editable({
      callback : function( data ) {
          console.log(data);
          var el_id = $(data.$el[0]).attr('el_id');
        console.log('Stopped editing ' + data.$el[0] );
        if( data.content ){
        $.ajax({
            url: "/admin/papers/update_price_for_price_list/" + el_id,
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr(
                    "content"
                ),
                price: data.content,

            },
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"] == "1") {


Swal.fire(
'{{__("public.good_job")}}',
json.message,
'success'
);

                }
            },
            error: function(
                xhr,
                ajaxOptions,
                thrownError
            ) {
                //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    };
}
});

$('.editable_name').editable({
      callback : function( data ) {
          console.log(data);
          var table = $(data.$el[0]).attr('table');
          var el_id = $(data.$el[0]).attr('el_id');

        console.log('Stopped editing ' + data.$el[0] );
        if( data.content ){
        $.ajax({
            url: "/admin/papers/update_name_for_paper/" + el_id,
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr(
                    "content"
                ),
                name: data.content,
                table: table,

            },
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"] == "1") {


Swal.fire(
'{{__("public.good_job")}}',
json.message,
'success'
);

                }
            },
            error: function(
                xhr,
                ajaxOptions,
                thrownError
            ) {
                //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    };
}
});
        </script>
<script>
    CKEDITOR.replace('desc');
</script>