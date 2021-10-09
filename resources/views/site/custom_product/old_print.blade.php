@extends('layouts.app')

@section('content')

</header>

  <!--start page content-->
  <div class="page-content">
    <div class="container">
        <!--Start Form-->
        <form>
            <input type="hidden" value="{{csrf_token()}}" id="token" name="token" />

           <input type="hidden" value="{{$custom_product_id}}" id="custom_product_id" name="custom_product_id" />
           <input type="hidden" value="0" id="uploaded" name="uploaded" />

            <div class="wizard">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                            <a id="wizard-t-0" href="#step1" aria-controls="wizard-p-0">
                                <span><img src="./img/icons/upload.png"></span> ارفع ملفاتك
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" aria-selected="false">
                            <a id="wizard-t-1" href="#step-2" aria-controls="wizard-p-1">
                                <span><img src="./img/icons/calendar.png "></span> اختر خصائص الطباعة
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" aria-selected="true">
                            <a id="wizard-t-2" href="#step-3" aria-controls="wizard-p-2">
                                <span><img src="./img/icons/cover.png "></span> انتقل إلى مرحلة التغليف
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false">
                            <a id="wizard-t-3" href="#step-4" aria-controls="wizard-p-3">
                                <span><img src="./img/icons/pay.png "></span> إتمام الدفع
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



            <!--Start Step 2-->
            <div class="step-1" id="step-1">
                <div class="pink-layout">
                    <div class="title blue-title text-center">
                        <h2>ارفع ملفاتك</h2>
                    </div>
                    <div class="upload-layout mb-4">
                        <div class="cell">
                            <input type="hidden" required class="uploaded" />
                            <input class="input-b1" id="input-b1"  type="file" multiple="multiple" data-browse-on-zone-click="true">
                        </div>
                        {{-- <span class="cell">او</span>
                        <a href="#" class="google-drive cell">
                            <img src="./img/icons/google-drive.png">
                            <p>أرفع من درايف</p>
                        </a> --}}
                        {{-- <div class="cell">
                            <div class="btn-group-vertical btn-upload">
                                 <a class="btn classic-btn" data-bs-toggle="modal" data-bs-target="#preview"> <img src="./img/icons/preview.png"> معاينة</a>
                               <a href="#" class="btn classic-btn"> <img src="./img/icons/trash.png"> حـذف</a>
                                <a class="btn classic-btn" data-bs-toggle="modal" data-bs-target="#file"> <img src="./img/icons/file.png"> تقسيم الملف</a>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">
                                        <span class="pink-color">للتوضيح </span> أنواع و أحجام الورق للطباعة
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="mx-auto d-block" src="./img/paper.png ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade file-modal" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">
                                        <span class="pink-color">تقسيم الملفات </span>
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <div class="image">
                                                <img src="./img/page.png">
                                                <span class="number">0</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="image">
                                                <img src="./img/page.png">
                                                <span class="number">1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <input type="number" class="form-control" value="0">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" value="1">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-lg split_file">
                                        <i class="fas fa-plus-circle"></i> إضافة تقسيم
                                    </a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn classic-btn btn-lg"> <span class="badge"></span> دمج الملفات المقسمة </button>
                                    <button class="btn main-btn btn-lg">تقسيم الملفات</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="larger light ">
                            <i class="fas fa-exclamation-circle yellow-color "></i>
                            <span class="pink-color semibold ">للتوضيح</span> في حالة واجهت أي مشكلة في رفع الملفات تواصل معنا على الرقم 0549872083
                        </p>
                        <p class="larger light ">
                            <i class="fas fa-exclamation-circle yellow-color "></i>
                            <span class="pink-color semibold ">ملاحظة</span> ملاحظة حجم الملف المسموح 100 MB
                        </p>
                        <p class="larger light ">
                            <i class="fas fa-exclamation-circle yellow-color "></i>
                            <span class="pink-color semibold ">ملحوظة هامة</span> برجاء الإنتظار حتي يتم إستكمال رفع الملف وإظهار تنبيه بذلك
                        </p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="file-container ">
                        <div class="table-responsive">
                            <table class="table table-2">
                                <thead class="light-blue-bg">
                                    <tr>

                                        <td style="min-width: 125px;">اسم الملف</td>
                                        <td>الصفحات</td>
                                        <td style="min-width: 125px;">الأوامر</td>
                                    </tr>
                                </thead>
                                <tbody class="spliter_container">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="file-loading">
                        <input class="input-b2" id="input-24" name="input24[]" type="file" multiple data-browse-on-zone-click="true">
                    </div> --}}
                </div>
            </div>
            <div class="set_prop_c">

                <div class="step-2" id="step-2">
                    <h3>
                        <span><img src="./img/icons/calendar.png "></span> اختر خصائص الطباعة
                    </h3>

                        <div class="pink-layout ">
                            <div class="title blue-title text-center ">
                                <h2>قائمة ملفاتك</h2>
                            </div>

                            <div class="mb-4 ">
                                <div class="upload-layout ">

                                    <div class="check-all mb-2">
                                        <div class="clearfix">
                                            <h3 class="float-start pink-color"> قم بتحديد الملفات لإختيار الخصائص :</h3>
                                            <div class="float-end">
                                                <div class="pretty p-default p-smooth p-round">
                                                    <input type="checkbox" id="checkAll">
                                                    <div class="state p-warning">
                                                        <label class="large">تحديد الكل</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="file-container">
                                          <div class="step-2">
                                            <div class="table-responsive">

                                                <table class="table table-2">
                                                    <thead class="light-blue-bg">
                                                        <tr>
                                                            <td></td>
                                                            <td></td>

                                                            <td>الكمية</td>
                                                            <td style="min-width: 125px;">اسم الملف</td>
                                                            <td>الصفحات</td>
                                                            <td style="min-width: 125px;">الأوامر</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="files_container">

                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                        {{-- <div class="file-loading">
                                            <input class="input-b2" id="input-24" name="input24[]" type="file" multiple data-browse-on-zone-click="true">
                                        </div> --}}
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-10 offset-lg-2">
                                            <div class="flex">
                                                <p>أو</p>
                                                <a href="#" class="google-drive">
                                                    <span class="light"> <img src="./img/icons/google-drive-sm.png"> ارفع من درايف </span>
                                                </a>
                                                <div class=" btn-upload">
                                                    <a href="#" class="btn classic-btn"> <img src="./img/icons/preview.png"> معاينة</a>
                                                    <a href="#" class="btn classic-btn"> <img src="./img/icons/trash.png"> حـذف</a>
                                                    <a href="#" class="btn classic-btn"> <img src="./img/icons/file.png"> تقسيم الملف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                            </div>

                            <div>
                                <p class="larger light ">
                                    <i class="fas fa-exclamation-circle yellow-color "></i>
                                    <span class="pink-color semibold ">للتوضيح</span> في حالة واجهت أي مشكلة في رفع الملفات تواصل معنا على الرقم 0549872083
                                </p>
                            </div>
                        </div>

                        <div class="yellow-layout  ">
                            <div class="title blue-title text-center ">
                                <h2>خصائص الطباعة</h2>
                            </div>

                            <div class="mb-4 ">
                                <h3 class="pink-color mb-4 ">
                                    <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> حجم الورق
                                </h3>
                                <div class="radio-container style-1 ">
                                    @foreach ($papers_size as $size)
                                    <div class="pretty p-icon p-toggle p-smooth p-plain paper_size">
                                        <input type="radio" class="paper_size_v"  checked value="{{$size->id}}" name="paper_size" />
                                        <div class="state ">
                                            <span class="icon ">{{$size->name}}</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                            <div class="mb-4 ">
                                <h3 class="pink-color mb-4 ">
                                    <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> نوع الورق
                                </h3>
                                <div class="radio-container style-1 paper_type">
                                    @foreach ($papers_type as $type)
                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" value="{{$type->id}}" class="paper_type_v" checked name="paper_type" />
                                        <div class="state ">
                                            <span class="icon ">{{$type->name}}</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="mb-4 ">
                                <div class="row ">
                                    <div class="col-sm-6 ">
                                        <h3 class="pink-color mb-4 ">
                                            <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> لون الطباعة
                                        </h3>
                                        <div class="radio-container style-1 printer_color">
                                            @foreach ($printer_color as $type)
                                        @if($type->id == "1")
                                            <div class="pretty p-icon p-toggle p-smooth p-plain black-white ">
                                                <input type="radio" value="{{$type->id}}" class="printer_color_v" checked name="printer_color" />
                                                <div class="state ">
                                                    <span class="icon "> {{$type->name}} </span>
                                                    <label></label>
                                                </div>
                                            </div>
                                            @else

                                            <div class="pretty p-icon p-toggle p-smooth p-plain colors  ">
                                                <input type="radio" value="{{$type->id}}" class="printer_color_v" checked name="printer_color" />
                                                <div class="state ">
                                                    <span class="icon ">{{$type->name}}</span>
                                                    <label></label>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach


                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-6 ">
                                        <h3 class="pink-color mb-4 ">
                                            <i class="fas fa-exclamation-circle yellow-color mx-2 "></i>جوانب الطباعة
                                        </h3>
                                        <div class="radio-container style-1 printer_type">
                                            @foreach ($printer_type as $type)
                                            <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                                <input type="radio" value="{{$type->id}}" class="printer_type_v" checked name="printer_type" />
                                                <div class="state ">
                                                    <span class="icon ">{{$type->name}}</span>
                                                    <label></label>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 ">
                                <h3 class="pink-color mb-4 ">
                                    <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> تخطيط الصفحة
                                </h3>
                                <div class="radio-container style-2 paper_slice ">
                                    @foreach ($papers_slice as $paper_slice)


                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" value="{{$paper_slice->id}}" class="paper_slice_v" checked name="paper_slice" />
                                        <div class="state ">
                                            <span class="icon">
                                                <img src="{{'/uploads/papers_slice/'.$paper_slice->photo}}">
                                            </span>
                                            <label></label>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="mb-4  price_slider">
                                <h3 class="pink-color mb-4 "><i class="fas fa-exclamation-circle yellow-color "></i> تحديد الصفحات</h3>
                                <div class="range mb-4 ">
                                    <input class="form-control from" name="from"  type="text " placeholder="من ">
                                    <span>:</span>
                                    <input class="form-control to" name="to" type="text " placeholder="الى ">
                                </div>
                                <p class="larger light "> <span class="pink-color semibold ">فضلا</span> التأكد من أن رقم الصفحة المحدد هو رقم الصفحة في الملف وليس رقم الصفحة في الكتاب </p>
                            </div>
                        </div>

                        <div class="result-price mb-4 ">
                            <div class="row ">
                                <div class="col-md-8 ">
                                    <table class="table ">
                                        <tbody>
                                            <td>إجمالـــــي السعـــــر</td>
                                            <td class="text-end pink-color total_price "> </td>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn btn-primary btn-lg set_prop"  type="button">تأكيد الخصائص</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>




                        <div class="step-3" id="step-3">

                        <div class="row title-group text-center">
                            <div class="col-sm-6">
                                <div class="blue-title">
                                    <h2>قائمة الملفات</h2>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="title">
                                    <h2> <a href="#"><i class="fas fa-plus-circle"></i> أضف تغليف</a></h2>
                                </div>
                            </div> --}}
                        </div>

                        <div class="file-container mb-4">
                            <div class="table-responsive">
                                <table class="table table-2">
                                    <thead class="light-blue-bg">
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="pretty p-default p-smooth p-round">
                                                    <input type="checkbox" id="checkAll">
                                                    <div class="state p-warning">
                                                        <label>تحديد الكل</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="min-width: 125px;">اسم الملف</td>

                                            <td>الصفحات</td>
                                        </tr>
                                    </thead>
                                    <tbody class="covers_files_container">


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="blue-layout ">
                            <div class="mb-5">
                                <h3 class="pink-color mb-2 ">
                                    <i class="fas fa-exclamation-circle yellow-color "></i> خيارات التغليف
                                </h3>
                                <p class="mx-4 larger"> لمعرفة أسعار التغليف أضغط <a href="#" class="yellow-color">هنا !</a> </p>
                            </div>
                            <div class="radio-container style-3 covers_radios">
                                @foreach ($covers as $type)


                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" value="{{$type->id}}" class="cover_id" name="cover_id" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="{{'/ /cover_type/'.$type->photo}}">
                                            <span>{{$type->name}}</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            <h3 class="pink-color mb-5 ">
                                <i class="fas fa-exclamation-circle yellow-color "></i> جهة التغليف
                            </h3>

                            <div class="radio-container style-3 style-4">
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio"  value="3" name="cover_side" class="cover_side" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/cover1.png ">
                                            <span>عربى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio"  value="3" name="cover_side" class="cover_side" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/cover2.png ">
                                            <span>أنجليزى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" value="3" name="cover_side" class="cover_side" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/cover3.png ">
                                            <span>من اعلى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blue-title text-center">
                            <h2>قائمة التغليفات</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-1">
                                <thead class="light-blue-bg">
                                    <tr>
                                        <td class="text-center">التغليف</td>
                                        <td>الملفات</td>
                                        <td colspan="3">الأوامر</td>
                                    </tr>
                                </thead>
                                <tbody class="covers_files">
                                    {{-- <tr>
                                        <td class="text-center">
                                            <img src="./img/9.png">
                                            <p>سلك بلاستيك</p>
                                        </td>

                                        <td class="no-padding" colspan="3">
                                            <div class="flex-container">
                                                <div class="accordion">
                                                    <a class="collapsed h4" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample">ملف رقم 1</a>
                                                    <div class="collapse" id="collapse1">
                                                        ألوان - A4 - ورق عادي
                                                        <br> تغليف بلاستيك- وجهين
                                                    </div>
                                                </div>
                                                <button class="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            <div class="flex-container">
                                                <div class="accordion">
                                                    <a class="collapsed h4" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample">ملف رقم 1</a>
                                                    <div class="collapse" id="collapse2">
                                                        ألوان - A4 - ورق عادي
                                                        <br> تغليف بلاستيك- وجهين
                                                    </div>
                                                </div>
                                                <button class="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>

                                        <td>
                                            <button class="file-remove gray-color larger">
                                                <i class="fas fa-times-circle"></i> <br> إزالة التغليف
                                            </button>
                                        </td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                        <div class="result-price mb-4 ">
                            <div class="row ">
                                <div class="col-md-8 ">
                                    <table class="table ">
                                        <tbody>
                                            <td>إجمالـــــي السعـــــر</td>
                                            <td class="text-end pink-color total_price"> </td>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn btn-primary btn-lg set_cover" type="button "> تأكيد الخصائص للتغليف</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


  <div class="set_prop_c">

            <div class="step-4" id="step-4">
             <div class="clearfix">
                <div class="text-end">
                    <button class="btn main-btn btn-lg px-5 complete_print"  type="button">إتمام الطلب </button>
                </div>
            </div>
            </div>
                </div>
        </form>
    </div>
</div>
<!--end-->


@endsection
