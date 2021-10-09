@extends('layouts.app')

@section('content')


        </header>
        <!--End-->

        <!--start page content-->
        <div class="page-content">
            <div class="container">
                <!--Start Form-->
                <form id="wizard" action="./finished.html">


                    <!--Start Step 4-->
                    <h3>
                        <span><img src="./img/icons/pay.png "></span> إتمام الدفع
                    </h3>
                    <div class="step-4 ">
                        <div class="pink-layout">
                            <div class="title blue-title text-center ">
                                <h2>طريقة الإستلام</h2>
                            </div>
                            <div class="mt-5">
                                <div class="radio-container style-1 " style="justify-content: center;">
                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" name="delivered-case" value="1" checked>
                                        <div class="state ">
                                            <span class="icon ">التوصيل</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" name="delivered-case" value="2">
                                        <div class="state ">
                                            <span class="icon ">الإستلام من الفرع</span>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="delivered-case-1">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active first" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4 select-parent">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> المدينة</span> </label>
                                                    <select class="form-control city" name="city">
                                                    <option value="0">اسم مدينتك هنا ..</option>
                                                    @foreach ($city as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach


                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4 select-parent">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> الحى</span> </label>
                                                    <select class="form-control area ">
                                                    <option value="">اسم الحى هنا ..</option>

                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> الشارع</span> </label>
                                                    <input class="form-control street" type="text" placeholder="اكتب اسم الشارع هنا">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> تفاصيل أكثر</span> </label>
                                                    <input class="form-control more" type="text" placeholder="علامات مميزة أو رقم المجموعة السكنية">
                                                </div>
                                            </div>
                                            <div class="clearfix mb-5">
                                                <div class="text-end">
                                                    <a class="circle-btn add_address" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                        <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn first-tab" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان آخر</a>
                                            </div>
                                        </div>
                                        <div class="address_container" >

                                        </div>
                                        <div class="text-end">
                                            <a class="circle-btn " onclick="confrim_address()"  href="#"> <i class="fas fa-plus-circle"></i> تاكيد العنوان </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                        <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn first-tab" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان آخر</a>
                                            </div>
                                        </div>

                                        <div class="flex-div confirmed_address">

                                        </div>
                                        <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn  first-tab" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان آخر</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix mt-5">
                                    <div class="text-end">
                                        <a class="btn secondary-btn btn-lg next-tab  ">
                                             تاكيد العنوان </a>
                                    </div>
                                </div>
                            </div>

                            <div class="delivered-case-2 hidden">
                                @foreach ($branchs as $branch)


                                <div class="flex-div">
                                    <div style="width: 100px;" class="mb-2">
                                        <img src="{{URL::to('/')}}/img/logo-2.png">
                                    </div>
                                    <div>
                                        <p class="semibold larger"> {{$branch->name}}</p>

                                    </div>
                                    <div class="text-center">
                                        <div class="privacy">
                                            <a href="#" class="btn">سياسة الإستلام</a>
                                            <a href="#" class="btn">أوقات العمل</a>
                                        </div>
                                        <div class="location">
                                            <img src="./img/icons/location.png" alt="">
                                            <p class="light-pink-color semi-bold larger">موقع المكتبة</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="yellow-layout pay-details" style="display: none;">
                            <div class="title blue-title text-center ">
                                <h2>خيارات الدفع </h2>
                            </div>

                            <h3 class="pink-color mb-4 ">
                                <img src="./img/icons/invoice.png">
                                <span class="mx-4">فاتورة الطلب</span>
                            </h3>

                            <div class="bill mb-5">
                                <p class="larger semibold">
                                    <span class="blue-color">الأجمالي </span> {{$will_pay}} ريال
                                </p>
                                <p class="larger semibold">
                                    <span class="blue-color">السعر بعد الخصم</span> {{$after_discount}} ريال
                                </p>
                                <p class="larger semibold">
                                    <span class="blue-color">سعر التوصيل</span> {{$arrival_price}} ريال
                                </p>
                                <p class="larger semibold">
                                    <span class="blue-color">الإجمالي </span> {{$total }} ريال
                                </p>
                            </div>


                            <h3 class="pink-color mb-4 ">
                                <img src="./img/icons/wallet.png">
                                <span class="mx-4">فاتورة الطلب</span>
                            </h3>

                            <div class="radio-container style-5">
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="cod" class="pay_type" checked/>
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/cash.png ">
                                            <span>دفع نقدي</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="credit" class="pay_type" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/credit-card.png ">
                                            <span>تحويل بنكي</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="stc" class="pay_type" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/366497.png ">
                                            <span>STC Pay</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" class="pay_type" value="apple"  />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/XMLID_34_.png ">
                                            <span>Apple Pay</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                @if($hide_wallet == 0)
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" class="pay_type" name="pay" value="wallet" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/wallet.png ">
                                            <span>المحفظة</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="clearfix mt-5">
                                <div class="text-end">
                                    <a class="btn secondary-btn btn-lg pay">
                                         الدفع </a>
                                </div>
                            </div>
                            <p class="larger pay-1">
                                <i class="fas fa-exclamation-circle yellow-color"></i>
                                <span class="pink-color bold">طلبات التوصيل داخل جدة </span> في حالة قيمة ومبلغ طلبك أعلى من 150 ريال فلن يتم تأكيد الطلب حتى فضلاً تحويل جزء من المبلغ أو المبلغ كاملاً مسبقا
                            </p>

                            <div class="pay-2 hidden">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="./img/icons/payment/1280px-NCB.svg.png" alt="">
                                        <ul class="list-unstyled  mt-4">
                                            <li> <span class="pink-color bold"> اسم الحساب: </span> مؤسسـة اطبع الأوراق للدعاية والإعـلان</li>
                                            <li> <span class="pink-color bold"> رقم الحساب : </span> 61 7000 0012 2009</li>
                                            <li> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="./img/icons/payment/2560px-Al_Rajhi_Bank_Logo.svg.png" alt="">
                                        <ul class="list-unstyled mt-4">
                                            <li> <span class="pink-color bold"> اسم الحساب: </span> مؤسسة سناء بنت مصطفى بن كمال الحداد</li>
                                            <li> <span class="pink-color bold"> رقم الحساب: </span> 61 7000 0012 2009</li>
                                            <li> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="larger">
                                        <i class="fas fa-exclamation-circle yellow-color"></i>
                                        <span class="pink-color bold">فضلاً  </span> لمساعدتنا في تأكيد طلبك وتأكيد تحويل المبلغ فضلاً ادخل البيانات التالية
                                    </p>
                                </div>

                                <div class="row form-group mb-4 align-items-center">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">التحويل تم باسم</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="... التحويل تم باسم ">
                                    </div>
                                </div>

                                <div class="row form-group mb-4">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">صورة التحويل</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="input-b3" id="input-b3" type="file" multiple data-browse-on-zone-click="true">
                                    </div>
                                </div>

                                <div class="row form-group mb-4 align-items-center">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">رقم الحوالة (إن وجد)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="... رقم الحوالة ">
                                    </div>
                                </div>
                            </div>

                            <div class="pay-3 hidden">
                                <div class="form-group row align-items-center">
                                    <div class="col-md-3 offset-md-1">
                                        <label class="pink-color bold larger" for="pay-1">قم بإدخال رقم الجوال</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="pay-1" placeholder="... رقم الجوال">
                                    </div>
                                </div>
                            </div>


                            <div class="pay-4 hidden">

                            </div>
                            @if($hide_wallet == 0)

                            <div class="pay-5 hidden">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">رصيدك الحالي </p>
                                            <h2 class="pink-color bold">{{$wallet_amount}} <span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">سعر العملية </p>
                                            <h2 class="bold">{{$after_discount + $arrival_price }}<span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">متبقي بالمحفظة </p>
                                            <h2 class=" bold">{{$wallet_amount - ($after_discount + $arrival_price ) }} <span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endif
                        </div>

                    </div>
                    <!--End Step 4-->

                </form>
            </div>
        </div>

        <!--end-->
        @endsection

