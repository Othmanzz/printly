@extends('layouts.app')

@section('content')

</header>

  <!--start page content-->
  <div class="page-content">
    <div class="container">
        <!--Start Form-->
        <form onsubmit="return false;">
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
                               <div class="pretty p-default p-smooth p-round">
                                                    <input type="checkbox" id="checkAll3">
                                                    <div class="state p-warning">
                                                        <label>تحديد الكل</label>
                                                    </div>
                                                </div>
                            <input type="hidden" required class="uploaded" />
                            <input class="input-b1" id="input-b1"  type="file" multiple="multiple" data-browse-on-zone-click="true">
                        </div>
                        <span class="cell">او</span>
                        <a href="#" class="google-drive cell">
                            <img src="./img/icons/google-drive.png">
                            <p>أرفع من درايف</p>
                        </a>
                        <div class="cell">
                            <div class="btn-group-vertical btn-upload">
                                <a class="btn classic-btn preview_button" > <img src="./img/icons/preview.png"> معاينة</a>
                              <a class="btn classic-btn delete_file_up"> <img src="./img/icons/trash.png"> حـذف</a>
                                <a class="btn classic-btn show_splite_file2"  > <img src="./img/icons/file.png"> تقسيم الملف</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
      <h5 class="modal-title" id="kvFileinputModalLabel"></h5>
      <span class="kv-zoom-title kzt" title=""></span>
      <div class="kv-zoom-actions"><button type="button" class="d-none btn-kv-toggleheader" title="Toggle header" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="bi-arrows-expand"></i></button><button type="button" class="d-none btn-kv-fullscreen" title="Toggle full screen" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="bi-arrows-fullscreen"></i></button><button type="button" class="d-none btn-kv-borderless" title="Toggle borderless mode" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="bi-arrows-angle-expand"></i></button><button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary btn-kv-close" title="Close detailed preview" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button></div>
    </div>
                              <div class="modal-body">
      <div class="floating-buttons"></div>
      <div class="kv-zoom-body file-zoom-content krajee-default"><span class="kv-spacer"></span>

 <object class="kv-preview-data file-preview-pdf file-zoom-detail fd" title="1629024648.pdf" data="" type="application/pdf" style="width: 100%; height: 100%; position: relative; min-height: 480px;">
<div class="file-preview-other">
<span class="file-other-icon"><i class="bi-file-earmark-fill"></i></span>
</div>
</object>
</div>
<button type="button" class="d-none btn-kv-prev" title="View previous file" style="display: none;"><i class="bi-chevron-left"></i></button> <button type="button" class="d-none btn-kv-next" title="View next file" style="display: none;"><i class="bi-chevron-right"></i></button>
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
                                                <span class="number">1</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="image">
                                                <img src="./img/page.png">
                                                <span class="number">2</span>
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
                                    <div class="clearfix checkbox-hidden">
                                        <div class="float-end">
                                            <div class="pretty p-default p-has-focus">
                                                <input type="radio" value="1" class="cover_files_state" name="cover_files_state" />
                                                <div class="state">
                                                    <label class="btn btn-primary">دمج الملفات</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>                                    <button class="btn main-btn btn-lg">تقسيم الملفات</button>
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
				<div class="spliter_container">
				</div>

            </div>
            <div class="set_prop_c">

                <div class="step-2" id="step-2">
                    <h3>
                        <span><img src="./img/icons/calendar.png "></span> اختر خصائص الطباعة
                    </h3>

                        {{-- <div class="pink-layout ">
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
                                    {{-- </div> --}}
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
                                {{-- </div>

                            </div>

                            <div>
                                <p class="larger light ">
                                    <i class="fas fa-exclamation-circle yellow-color "></i>
                                    <span class="pink-color semibold ">للتوضيح</span> في حالة واجهت أي مشكلة في رفع الملفات تواصل معنا على الرقم 0549872083
                                </p>
                            </div>
                        </div>  --}}

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
                                        <input type="radio" class="paper_size_v"   value="{{$size->id}}" name="paper_size" />
                                        <div class="state ">
                                            <span class="icon ">{{$size->name}}</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
<div class="prop_con" >
                            <div class="mb-4 ">
                                <h3 class="pink-color mb-4 ">
                                    <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> نوع الورق
                                </h3>
                                <div class="radio-container style-1 paper_type">


                                </div>
                            </div>

                            <div class="mb-4 ">
                                <div class="row ">
                                    <div class="col-sm-6 ">
                                        <h3 class="pink-color mb-4 ">
                                            <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> لون الطباعة
                                        </h3>
                                        <div class="radio-container style-1 printer_color">



                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-6 ">
                                        <h3 class="pink-color mb-4 ">
                                            <i class="fas fa-exclamation-circle yellow-color mx-2 "></i>جوانب الطباعة
                                        </h3>
                                        <div class="radio-container style-1 printer_type">


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 ">
                                <h3 class="pink-color mb-4 ">
                                    <i class="fas fa-exclamation-circle yellow-color mx-2 "></i> تخطيط الصفحة
                                </h3>
                                <div class="radio-container style-2 paper_slice">


                                </div>
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
                                               <td>الكمية</td>

                                            <td>الصفحات</td>
                                            <td colspan="3">الأوامر</td>

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


                            </div>

                            <h3 class="pink-color mb-5 ">
                                <i class="fas fa-exclamation-circle yellow-color "></i> جهة التغليف
                            </h3>

                            <div class="radio-container style-3 style-4">
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio"  value="1" name="cover_side" checked="checked" class="cover_side" />
                                    <div class="state">
                                        <p class="icon">
                                            <img src="./img/cover1.png ">
                                            <span>عربى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio"  value="2" name="cover_side" class="cover_side" />
                                    <div class="state">
                                        <p class="icon">
                                            <img src="./img/cover2.png ">
                                            <span>أنجليزى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" value="3" name="cover_side" class="cover_side" />
                                    <div class="state">
                                        <p class="icon">
                                            <img src="./img/cover3.png ">
                                            <span>من اعلى</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="cover_files_state_container">
                            <div class="clearfix checkbox-hidden">
                                <div class="float-end">
                                    <div class="pretty p-default p-has-focus">
                                        <input  type="radio" value="1" class="cover_files_state" name="cover_files_state" />
                                        <div class="state">
                                            <label class="btn btn-primary">دمج الملفات</label>
                                        </div>
                                    </div>
                                    <div class="pretty p-default p-has-focus">
                                        <input  type="radio" value="2" class="cover_files_state" name="cover_files_state" />
                                        <div class="state">
                                            <label class="btn secondary-btn">ملفات منفصلة</label>
                                        </div>
                                    </div>
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
                                        <td style="min-width: 500px;">الملفات</td>

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
<script src="/../js/jquery-3.1.1.min.js "></script>

<script src="/../plugins/fileinput/fileinput.js "></script>

<script>
    $(document).ready(function() {
    'use strict';
    var custom_product_id = $("#custom_product_id").val();

    $(".input-b1 ").fileinput({
    uploadUrl: "/upload_file_custom_product/"+custom_product_id,
    showUpload: false,
    showRemove: false,
    showBrowse: true,
    showClose: false,
    uploadExtraData:{'_token':$('meta[name=csrf-token]').attr("content")},
    deleteExtraData:{'_token':$('meta[name=csrf-token]').attr("content"),'custom_product':custom_product_id},
    browseLabel: 'تصفح ملفاتك',
    autoReplace:false,
    allowedFileExtensions:['pdf','pptx','doc','ppt','docx'],
                 slugCallback: function(filename) {
               return filename.replace('(', '_').replace(']', '_');
             },
    initialPreviewFileType: 'image',
    previewFileExtSettings: {
    'doc': function(ext) {
        return ext.match(/(doc|docx)$/i);
    },
    'pdf': function(ext) {
        return ext.match(/(pdf|pdf)$/i);
    },
    'ppt': function(ext) {
        return ext.match(/(ppt|pptx)$/i);
    }
},
    fileTypeSettings: {
    image: function(vType, vName) {
        return (typeof vType !== "undefined") ? vType.match('image.*') && !vType.match(/(tiff?|wmf)$/i) : vName.match(/\.(gif|png|jpe?g)$/i);
    },
    html: function(vType, vName) {
        return (typeof vType !== "undefined") ? vType == 'text/html' : vName.match(/\.(htm|html)$/i);
    },
    office: function (vType, vName) {
        return vType.match(/(word|excel|powerpoint|office)$/i) ||
            vName.match(/\.(docx?|xlsx?|pptx?|pps|potx?)$/i);
    },
    gdocs: function (vType, vName) {
        return vType.match(/(word|excel|powerpoint|office|iwork-pages|tiff?)$/i) ||
            vName.match(/\.(rtf|docx?|xlsx?|pptx?|pps|potx?|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$/i);
    },
    text: function(vType, vName) {
        return typeof vType !== "undefined" && vType.match('text.*') || vName.match(/\.(txt|md|nfo|php|ini)$/i);
    },
    video: function (vType, vName) {
        return typeof vType !== "undefined" && vType.match(/\.video\/(ogg|mp4|webm)$/i) || vName.match(/\.(og?|mp4|webm)$/i);
    },
    audio: function (vType, vName) {
        return typeof vType !== "undefined" && vType.match(/\.audio\/(ogg|mp3|wav)$/i) || vName.match(/\.(ogg|mp3|wav)$/i);
    },
    flash: function (vType, vName) {
        return typeof vType !== "undefined" && vType == 'application/x-shockwave-flash' || vName.match(/\.(swf)$/i);
    },
    object: function (vType, vName) {
        return true;
    },
    other: function (vType, vName) {
        return true;
    },
},
    showCaption: false,
    elPreviewStatus: false,
    initialPreview: <?=json_encode($urls)?>,
    initialPreviewConfig: <?=json_encode($files)?>,
    ajaxDeleteSettings : {
        'headers': {"X-CSRFToken": $('meta[name=csrf-token]').attr("content")},
    },
    msgZoomModalHeading: '',
    dropZoneTitle: '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
    dropZoneClickTitle: '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
    removeTitle: true,
    deleteUrl: "/delete_file",
    uploadAsync:true,
    maxFileCount: 100,
    initialPreviewAsData: true,

    overwriteInitial: false,

}).on('fileloadederror', function(event, file, previewId, fileId, index, reader) {

});
$(".show_splite_file").on("click", function() {
        var id = $(this)
            .closest("div.file-preview-frame")
            .find("button.kv-file-remove")
            .attr("data-key");
        $("#file" + id).modal("show");
    });
    })
</script>
@endsection
