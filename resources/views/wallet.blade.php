@extends('layouts.app')

@section('content')
</header>
<!--End-->
</header>
<!--End-->

<div class="page-content account-pay-page">
    <div class="container">
        <div class="blue-layout">
            <div class="title blue-title text-center">
                <h2>إدارة الرصيد</h2>
            </div>

            <div class="text-center mb-4">
                <h3 class="pink-color">رصيد المحفظة :</h3>
                <p class="price gray-color bold">{{$wallet->amount}} <span>ر.س</span></p>
                <div>
                    <a href="#" class="account-btn blue-color larger"><i class="fas fa-plus"></i> ادارة الرصيد</a>
                    <span class="mx-2 larger">|</span>
                    <a class="gray-color larger" href="#"> سجل العمليات</a>
                </div>
            </div>

            <h3 class="pink-color mb-4 ">
                <img src="./img/icons/wallet.png">
                <span class="mx-4">طرق الدفع</span>
            </h3>
            <div class="radio-container style-5 row">
                <div class="col-md-3 col-sm-4">
                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                        <input type="radio" name="pay" value="2">
                        <div class="state ">
                            <p class="icon">
                                <img src="./img/icons/payment/credit-card.png ">
                                <span>تحويل بنكي</span>
                            </p>
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                        <input type="radio" name="pay" value="3">
                        <div class="state ">
                            <p class="icon">
                                <img src="./img/icons/payment/366497.png ">
                                <span>STC Pay</span>
                            </p>
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                        <input type="radio" name="pay">
                        <div class="state ">
                            <p class="icon">
                                <img src="./img/icons/payment/XMLID_34_.png ">
                                <span>Apple Pay</span>
                            </p>
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                        <input type="radio" name="pay" value="5">
                        <div class="state ">
                            <p class="icon">
                                <img src="./img/icons/payment/credit.png ">
                                <span>البطاقة الإتمانية</span>
                            </p>
                            <label></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pay-2 hidden">
                <div class="row">
                    <div class="col-md-6">
                        <img src="./img/icons/payment/1280px-NCB.svg.png" alt="">
                        <ul class="list-unstyled  mt-4">
                            <li class="mb-2"> <span class="pink-color bold"> اسم الحساب: </span> مؤسسـة اطبع الأوراق للدعاية والإعـلان</li>
                            <li class="mb-2"> <span class="pink-color bold"> رقم الحساب : </span> 61 7000 0012 2009</li>
                            <li class="mb-2"> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="./img/icons/payment/2560px-Al_Rajhi_Bank_Logo.svg.png" alt="">
                        <ul class="list-unstyled mt-4">
                            <li class="mb-2"> <span class="pink-color bold"> اسم الحساب: </span> مؤسسة سناء بنت مصطفى بن كمال الحداد</li>
                            <li class="mb-2"> <span class="pink-color bold"> رقم الحساب: </span> 61 7000 0012 2009</li>
                            <li class="mb-2"> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
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

            <div class="pay-5 hidden">
                <div class="form-group row align-items-center mb-4">
                    <div class="col-md-3 offset-md-1">
                        <label class="pink-color bold larger" for="pay-1"> رقم البطاقة</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="... رقم البطاقة">
                    </div>
                </div>
                <div class="form-group row align-items-center  mb-4">
                    <div class="col-md-3 offset-md-1">
                        <label class="pink-color bold larger" for="pay-1"> الأسم المدون فى البطاقة</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="... الأسم المدون فى البطاقة">
                    </div>
                </div>

                <div class="form-group row align-items-center  mb-4">
                    <div class="col-md-7 offset-md-4">
                        <div class="row">
                            <div class="col-6">
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="CVC">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
