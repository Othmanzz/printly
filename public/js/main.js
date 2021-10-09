$(document).ready(function() {
    'use strict';

    $('.lazy').lazy();

    $("input.number").inputSpinner();

    AOS.init({
        once: true
    });

    $('.open-sidebar').click(function() {
        $('.wrapper').toggleClass('active');
        $('.offcanvas').toggleClass('active');
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.offcanvas , .open-sidebar').length) {
            $('.wrapper').removeClass('active');
            $('.offcanvas').removeClass('active');
        }
    });

    $('.owl-carousel-classic').owlCarousel({
        items: 4,
        margin: 30,
        rtl: true,
        nav: true,
        navText: ['<i class="fas fa-angle-right"></i>', '<i class="fas fa-angle-left"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    var form = $('#wizard');
    var custom_product_id = $("#custom_product_id").val();
    form.steps({
        headerTag: 'h3',
        enableAllSteps: true,
        labels: {
            next: "اتمام رفع الملفات",
            finish: "اتمام الطلب"
        },
        onStepChanging: function() {
         load_files();
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, newIndex) {
            if (currentIndex == 1) {
                $('.wizard>.actions a').text('إتمام طلب الطباعة ')
            }
            if (currentIndex == 2) {
                $('.wizard>.actions a').text('إتمام الطلب ')
            }

            // $('.title-group .title h2 a').click(function() {
            //     $('#wizard').steps('next');
            // })
        },
        onFinished: function(event, currentIndex) {
            $.ajax({
                url: '/addToCart',
                type: 'post',
                headers:{ 'Authorization': 'Bearer ' + $('meta[name=csrf-token]').attr("content"),},
                data: '_token='+$('meta[name=csrf-token]').attr("content")+'&type='+1+'&product_id=' + custom_product_id + '&quantity=1' ,
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer" + " " + $('meta[name=csrf-token]').attr("content"));
                },
                complete: function() {
                },
                success: function(json) {


                    if (json['success']) {
                       location.reload();
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
            // form.submit();
        },
    });


    // checkbox
    $("#checkAll").click(function() {
        $('.kv-file-content input:checkbox').not(this).prop('checked', this.checked);
    });

    $(".table thead tr td .pretty input").click(function() {
        $('.table tbody tr td .pretty input:checkbox').not(this).prop('checked', this.checked);
    });

    // Fileinput bootstrap
    var files_p = [];


    function load_files(){
        return    $.ajax({
            url: '/get_uploaded_files/'+custom_product_id,
            type: 'post',
            data: '_token='+$('meta[name=csrf-token]').attr("content"),
            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json['success']){
                $('.files_container').html('');
                $('.spliter_container').html('');
                $('.covers_files_container').html('');

                json.data.files.forEach(element => {
                    files_p.push('/uploads/custom_product_file/'+element.file);
                    $('.files_container').append('<tr> <td class="collapsed" data-bs-toggle="collapse" href="#row'+element.id+'" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>'+
                    '</td>'+
                    '  <td>'+
                    '<div class="pretty p-default p-smooth p-round">'+
                    '   <input type="checkbox" value="'+element.id+'" class="filecheckbox" name="selectedFiles[]" id="checkAll">'+
                    '   <div class="state p-warning">'+
                    '       <label></label>'+
                    '   </div>'+
                    '</div>'+
                    '</td>'+
                    '<td><input type="text " value="'+element.quantity+'"></td>'+
                    '<td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '<td>'+
                       ' <button><i class="fas fa-edit "></i></button>'+
                     '   <button><i class="fas fa-trash-alt "></i></button>'+
                    '</td></tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td></tr>');

                    $(".covers_files_container").append('<tr> <td class="collapsed" data-bs-toggle="collapse" href="#row'+element.id+'" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>'+
                    '</td>'+
                    '  <td>'+
                    '<div class="pretty p-default p-smooth p-round">'+
                    '   <input type="checkbox" value="'+element.id+'" class="filecheckbox" name="selectedFiles[]" id="checkAll">'+
                    '   <div class="state p-warning">'+
                    '       <label></label>'+
                    '   </div>'+
                    '</div>'+
                    '</td>'+
                    '<td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '</tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td></tr>');

                    $('.spliter_container').append('<tr><td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '<td>'+
                       '<a class="btn classic-btn" data-bs-toggle="modal" data-bs-target="#file'+element.id+'"> <img src="./img/icons/file.png"> تقسيم الملف</a>'+
    '<div class="modal fade file-modal" id="file'+element.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                    ' <div class="modal-dialog" role="document">'+
                    '   <div class="modal-content">'+
                    '     <div class="modal-header">'+
                    '      <h3 class="modal-title" id="exampleModalLabel">'+
                    '         <span class="pink-color">تقسيم الملفات </span>'+
                    '     </h3>'+
                    '     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
                    '  </div>'+
                    '  <div class="modal-body">'+
                    '     <div class="row mb-4 file_parts_body'+element.id+'">'+

                    '      </div>'+
                    '     <div class="row mb-4">'+
                    '         <div class="col-6">'+
                    '          <input type="number"  class="form-control split_from_'+element.id+'" value="0">'+
                    '      </div>'+
                    '     <div class="col-6">'+
                    '         <input type="number" class="form-control split_to_'+element.id+'" value="1">'+
                    '      </div>'+
                    '   </div>'+
                    '   <a href="javascript:void(0)" file_id="'+element.id+'" class="btn btn-primary btn-lg split_file">'+
                    '       <i class="fas fa-plus-circle"></i> إضافة تقسيم'+
                    '    </a>'+
                    '  </div>'+
                    '  <div class="modal-footer">'+
                    '      <input type="checkbox" value="1" class="btn classic-btn btn-lg"> <span class="badge"></span> دمج الملفات المقسمة </input>'+
                    '      <button class="btn main-btn btn-lg split_confirm" file_id="'+element.id+'"  type="button">تقسيم الملفات</button>'+
                    '    </div>'+
                    '    </div>'+
                    '  </div>'+
                    ' </div>'+
                       '   <button><i class="fas fa-trash-alt delete_file" file_id="'+element.id+'" type="button"></i></button>'+
                       '</td></tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td> </tr>');
                    $(".split_confirm").on('click',function(){
                        var file_id = $(this).attr('file_id');
                        var from = $(".from_v_element_"+file_id);
                        var to = $(".to_v_element_"+file_id);
                        var from_array = [];
                        var to_array = [];
                        for(var i = 0 ; i < from.length ; i++){
                            from_array.push($(from[i]).val());
                        }
                        for(var i = 0 ; i < to.length ; i++){
                            to_array.push($(to[i]).val());
                        }
                          console.log(file_id);
                        console.log(from,to);

                        $.ajax({
                            url: '/split_file/'+file_id,
                            type: 'post',
                            data: {'_token':$('meta[name=csrf-token]').attr("content"),'from':from_array ,'to' :to_array },
                            dataType: 'json',

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                            if(json["success"] == "1"){
                                $("#file"+file_id).modal('hide');
                                   load_files();
                            }


                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });
                       });

                    $(".split_file").on('click',function(){
                        var file_id = $(this).attr('file_id');
                        var from = $(".split_from_"+file_id).val();
                        var to = $(".split_to_"+file_id).val();

                         $(".file_parts_body"+file_id).append('<div class="col-6">'+
                         '        <div class="image">'+
                         '           <img src="./img/page.png">'+
                         '           <span class="number">'+from+'</span>'+
                         '<input type="hidden" class="from_v_element_'+file_id+'" value="'+from+'" name="from_v_element_'+file_id+'[]" />'+
                         '        </div>'+
                         ' </div>'+
                         '        <div class="col-6">'+
                         '             <div class="image">'+
                         '                <img src="./img/page.png">'+
                         '                 <span class="number">'+to+'</span>'+
                         '<input type="hidden" class="to_v_element_'+file_id+'" value="'+to+'" name="to_v_element_'+file_id+'[]" />'+

                         '             </div>'+
                         '          </div>');
                       })
                });
            }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
if(custom_product_id > 0){
    load_files();
}
    $(".input-b1 ").fileinput({
        uploadUrl: "/upload_file_custom_product/"+custom_product_id,
        showUpload: false,
        showRemove: false,
        showBrowse: false,
        showClose: false,
        uploadExtraData:{'_token':$('meta[name=csrf-token]').attr("content")},
        allowedFileExtensions:['pdf','pptx','ppt','doc','docx'],
        showCaption: false,
        elPreviewStatus: false,
        msgZoomModalHeading: '',
        dropZoneTitle: '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
        dropZoneClickTitle: '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
        removeTitle: true,
        deleteUrl: "/delete_custom_product_file/",
        uploadAsync:true,

    }).on('fileuploaded', function(event, previewId, index, fileId) {

            // $("#input-b1").attr('required')

        // get all files
        $.ajax({
            url: '/get_uploaded_files/'+custom_product_id,
            type: 'post',
            data: '_token='+$('meta[name=csrf-token]').attr("content"),
            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json['success']){
                $('.files_container').html('');
                $('.spliter_container').html('');
                json.data.files.forEach(element => {
                    files_p.push('/uploads/custom_product_file/'+element.file);
                    $('.files_container').append('<tr> <td class="collapsed" data-bs-toggle="collapse" href="#row'+element.id+'" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>'+
                    '</td>'+
                    '  <td>'+
                    '<div class="pretty p-default p-smooth p-round">'+
                    '   <input type="checkbox" value="'+element.id+'" name="selectedFiles[]" class="filecheckbox" id="checkAll">'+
                    '   <div class="state p-warning">'+
                    '       <label></label>'+
                    '   </div>'+
                    '</div>'+
                    '</td>'+
                    '<td><input type="text" class="quantity'+element.id+'" value="1"></td>'+
                    '<td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '<td>'+

                       '   <button><i class="fas fa-trash-alt delete_file" file_id="'+element.id+'" type="button"></i></button>'+
                       '</td></tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td></tr>'
                    )
                    $('.spliter_container').append('<tr><td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '<td>'+
                       '<a class="btn classic-btn" data-bs-toggle="modal" data-bs-target="#file'+element.id+'"> <img src="./img/icons/file.png"> تقسيم الملف</a>'+
'<div class="modal fade file-modal" id="file'+element.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                    ' <div class="modal-dialog" role="document">'+
                    '   <div class="modal-content">'+
                    '     <div class="modal-header">'+
                    '      <h3 class="modal-title" id="exampleModalLabel">'+
                    '         <span class="pink-color">تقسيم الملفات </span>'+
                    '     </h3>'+
                    '     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
                    '  </div>'+
                    '  <div class="modal-body">'+
                    '     <div class="row mb-4 file_parts_body'+element.id+'">'+

                    '      </div>'+
                    '     <div class="row mb-4">'+
                    '         <div class="col-6">'+
                    '          <input type="number"  class="form-control split_from_'+element.id+'" value="0">'+
                    '      </div>'+
                    '     <div class="col-6">'+
                    '         <input type="number" class="form-control split_to_'+element.id+'" value="1">'+
                    '      </div>'+
                    '   </div>'+
                    '   <a href="javascript:void(0)" file_id="'+element.id+'" class="btn btn-primary btn-lg split_file">'+
                    '       <i class="fas fa-plus-circle"></i> إضافة تقسيم'+
                    '    </a>'+
                    '  </div>'+
                    '  <div class="modal-footer">'+
                    '      <input type="checkbox" value="1" class="btn classic-btn btn-lg"> <span class="badge"></span> دمج الملفات المقسمة </input>'+
                    '      <button class="btn main-btn btn-lg split_confirm" file_id="'+element.id+'"  type="button">تقسيم الملفات</button>'+
                    '    </div>'+
                    '    </div>'+
                    '  </div>'+
                    ' </div>'+
                       '   <button><i class="fas fa-trash-alt delete_file" file_id="'+element.id+'" type="button"></i></button>'+
                       '</td></tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td> </tr>');
                });

                $(".delete_file").on('click',function(){
                    var file_id = $(this).attr('file_id');
                    $.ajax({
                        url: '/delete_file',
                        type: 'post',
                        data: {'_token':$('meta[name=csrf-token]').attr("content"),
                        'file_id':file_id ,
                        'custom_product' :$('#custom_product_id').val() ,
                         },

                        dataType: 'json',

                        success: function(json) {
                            // Need to set timeout otherwise it wont update the total
                        if(json.success == "1"){

                //load the table
                $('.files_container').html('');
                                json.data.files.forEach(element => {
                                    files_p.push('/uploads/custom_product_file/'+element.file);
                                    $('.files_container').append('<tr> <td class="collapsed" data-bs-toggle="collapse" href="#row'+element.id+'" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>'+
                                    '</td>'+
                                    '  <td>'+
                                    '<div class="pretty p-default p-smooth p-round">'+
                                    '   <input type="checkbox" value="'+element.id+'" name="selectedFiles[]" class="filecheckbox" id="checkAll2">'+
                                    '   <div class="state p-warning">'+
                                    '       <label></label>'+
                                    '   </div>'+
                                    '</div>'+
                                    '</td>'+
                                    '<td><input type="text" class="quantity'+element.id+'" value="1"></td>'+
                                    '<td>'+element.file+'</td>'+
                                    '<td>'+element.number_of_pages+'</td>'+
                                    '<td>'+
                                       ' <button><i class="fas fa-edit "></i></button>'+
                                     '   <button><i class="fas fa-trash-alt delete_file" file_id="'+element.id+'" type="button"></i></button>'+
                                    '</td></tr>'+
                                    ' <tr class="collapse" id="row'+element.id+'">'+
                                    '<td colspan="5 " class=" text-start ">'+
                                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                                    '</td></tr>')
                                });
                        }


                        alert(json.message);

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                    return false;
                })
            }



            $(".split_confirm").on('click',function(){
                var file_id = $(this).attr('file_id');
                var from = $(".from_v_element_"+file_id);
                var to = $(".to_v_element_"+file_id);
                var from_array = [];
                var to_array = [];
                for(var i = 0 ; i < from.length ; i++){
                    from_array.push($(from[i]).val());
                }
                for(var i = 0 ; i < to.length ; i++){
                    to_array.push($(to[i]).val());
                }
                  console.log(file_id);
                console.log(from,to);

                $.ajax({
                    url: '/split_file/'+file_id,
                    type: 'post',
                    data: {'_token':$('meta[name=csrf-token]').attr("content"),'from':from_array ,'to' :to_array },
                    dataType: 'json',

                    success: function(json) {
                        // Need to set timeout otherwise it wont update the total
                    if(json["success"] == "1"){
                        $("#file"+file_id).modal('hide');
                           load_files();
                    }


                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
               });

            $(".split_file").on('click',function(){
                var file_id = $(this).attr('file_id');
                var from = $(".split_from_"+file_id).val();
                var to = $(".split_to_"+file_id).val();

                 $(".file_parts_body"+file_id).append('<div class="col-6">'+
                 '        <div class="image">'+
                 '           <img src="./img/page.png">'+
                 '           <span class="number">'+from+'</span>'+
                 '<input type="hidden" class="from_v_element_'+file_id+'" value="'+from+'" name="from_v_element_'+file_id+'[]" />'+
                 '        </div>'+
                 ' </div>'+
                 '        <div class="col-6">'+
                 '             <div class="image">'+
                 '                <img src="./img/page.png">'+
                 '                 <span class="number">'+to+'</span>'+
                 '<input type="hidden" class="to_v_element_'+file_id+'" value="'+to+'" name="to_v_element_'+file_id+'[]" />'+

                 '             </div>'+
                 '          </div>');
               })

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    }).on('fileuploaderror', function(event, data, msg) {
        console.log('File Upload Error', 'ID: ' + data.fileId + ', Thumb ID: ' + data.previewId);
    }).on('filebatchuploadcomplete', function(event, preview, config, tags, extraData) {
        console.log(event);
    }).on("filebatchselected",function(event,files){
        $(".input-b1 ").fileinput("upload");
    })

    var url1 = './img/book.png',
        url2 = './img/book.png';
    $(".input-b2").fileinput({
        uploadUrl: "./server/upload.php ",
        showUpload: false,
        showRemove: false,
        showClose: false,
        showCaption: false,
        browseLabel: 'تصفح ملفاتك',
        initialPreview: files_p,
        initialPreviewAsData: true,
        initialPreviewConfig: [{
            downloadUrl: url1,
            size: 930321,
            width: "120px",
            key: 1
        }, {
            downloadUrl: url2,
            size: 1218822,
            width: "120px",
            key: 2
        }],
        deleteUrl: "/site/file-delete",
        overwriteInitial: false,
        maxFileSize: 100,
        msgZoomModalHeading: '',
    });
    if($(".paper_size_v").val() > 0){
    $.ajax({
        url: '/get_prop/'+$(".paper_size_v").val(),
        type: 'post',
        data: '_token='+$('#token').val(),
        dataType: 'json',

        success: function(json) {
            // Need to set timeout otherwise it wont update the total
        if(json["success"] == "1"){
            $('.paper_type').html('');
            json.data.paper_type.forEach(element => {

                $('.paper_type').append('<div class="pretty p-icon p-toggle p-smooth p-plain ">'+
                '<input type="radio" value="'+element.id+'" name="paper_type" />'+
               ' <div class="state ">'+
                  '  <span class="icon ">'+element.name+'</span>'+
                  '  <label></label>'+
               ' </div>'+
          ' </div>')
            });
        }


        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}





    $(".paper_size_v").on('click',function(){
        if($('.filecheckbox').is(":checked")){
        $.ajax({
            url: '/get_prop/'+$(this).val(),
            type: 'post',
            data: '_token='+$('meta[name=csrf-token]').attr("content"),
            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json["success"] == "1"){
                $('.paper_type').html('');
                $('.printer_type').html('');
                $('.paper_slice').html('');
                json.data.paper_type.forEach(element => {

                    $('.paper_type').append('<div class="pretty p-icon p-toggle p-smooth p-plain ">'+
                    '<input type="radio" value="'+element.id+'" class="paper_type_v" checked name="paper_type" />'+
                   ' <div class="state ">'+
                      '  <span class="icon ">'+element.name+'</span>'+
                      '  <label></label>'+
                   ' </div>'+
              ' </div>')
                });
                json.data.printer_type.forEach(element => {

                    $('.printer_type').append('  <div class="pretty p-icon p-toggle p-smooth p-plain ">'+
                                        '<input type="radio" value="'+element.id+'" class="printer_type_v" checked name="printer_type" />'+
                                        '<div class="state ">'+
                                            '<span class="icon ">'+element.name+'</span>'+
                                            '<label></label>'+
                                      '  </div>'+
                                  ' </div>')
                                      });
                                      json.data.paper_slice.forEach(element => {

                                        $('.paper_slice').append('<div class="pretty p-icon p-toggle p-smooth p-plain ">'+
                                '<input type="radio" value="'+element.id+'" class="paper_slice_v" checked name="paper_slice" />'+
                                '<div class="state ">'+
                                    '<span class="icon">'+
                                        '<img src="/././uploads/papers_slice/'+element.photo+'">'+
                                    '</span>'+
                                    '<label></label>'+
                                '</div>'+
                            '</div>')
                                      });



            }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });





            }else{
                alert('رجاء اختيار ملف اولا');
            }


    })


function get_price(){
    $(".filecheckbox:checked").each(function(){
        $.ajax({
            url: '/set_prop/'+$(this).val(),
            type: 'post',
            data: {'_token':$('meta[name=csrf-token]').attr("content"),'paper_type':$('#paper_type').val() ,'paper_size' :$('#paper_size').val() },
            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json["success"] == "1"){
                    $('.total_price').text(json.total+'ريال');
                   alert(json.message);
            }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


}

$(".set_prop").on("click",function(){
    if($(".filecheckbox:checked").length > 0){
    $(".filecheckbox:checked").each(function(){
        var id = $(this).val();
        $.ajax({
            url: '/set_prop/'+$(this).val(),
            type: 'post',
            data: {'_token':$('#token').val(),
            'paper_type':$('.paper_type_v').val() ,
            'paper_size' :$('.paper_size_v').val() ,
            'printer_color' :$('.printer_color_v').val() ,
            'paper_slice' :$('.paper_slice_v').val() ,
            'from' :$('.from').val() ,
            'quantity' :$('.quantity'+$(this).val()).val() ,

            'to' :$('.to').val() ,
            'printer_method' :$('.printer_method_v').val() ,
            'printer_type' :$('.printer_type_v').val() },

            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json["success"] == "1"){
                $('.total_price').text(json.total+'ريال');

                $('.prop'+id).text(json.prop);
            }
            alert(json.message);


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
}else{
    alert("رجاء اختيار الملف اولا");
}


    return false
})

$(".set_cover").on("click",function(){
    if($(".filecheckbox:checked").length > 0){
    $(".filecheckbox:checked").each(function(){
        $.ajax({
            url: '/set_cover/'+$(this).val(),
            type: 'post',
            data: {'_token':$('meta[name=csrf-token]').attr("content"),
            'cover_id':$('.cover_id').val() ,
            'cover_side' :$('.cover_side').val() ,
             },

            dataType: 'json',

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
            if(json.success == "1"){
                $('.total_price').text(json.total+'ريال');


                //load the table
                $(".covers_files").html('');
                json.data.covers.forEach(function(element){

                    $(".covers_files").append('<tr>'+
                    '               <td class="text-center">'+
                    '                  <img src="'+element.photo+'">'+
                    '                  <p>'+element.name+' </p>'+
                    '              </td>'+
                    '              <td class="no-padding" colspan="3">'+
                             element.files+
                    '              </td>'+
                    '              <td>'+
                    '                  <button class="file-remove gray-color larger delete_cover" cover_id="'+element.id+'" type="button">'+
                    '                      <i class="fas fa-times-circle"></i> <br> إزالة التغليف '+
                    '                  </button>'+
                    '              </td>'+
                    '          </tr>')
                })
                $(".delete_cover").on('click',function(){
                    var cover_id = $(this).attr('cover_id');
                    $.ajax({
                        url: '/delete_cover',
                        type: 'post',
                        data: {'_token':$('meta[name=csrf-token]').attr("content"),
                        'cover_id':cover_id ,
                        'custom_product' :$('#custom_product_id').val() ,
                         },

                        dataType: 'json',

                        success: function(json) {
                            // Need to set timeout otherwise it wont update the total
                        if(json.success == "1"){

                //load the table
                $(".covers_files").html('');
                json.data.covers.forEach(function(element){

                    $(".covers_files").append('<tr>'+
                    '               <td class="text-center">'+
                    '                  <img src="'+element.photo+'">'+
                    '                  <p>'+element.name+' </p>'+
                    '              </td>'+
                    '              <td class="no-padding" colspan="3">'+
                             element.files+
                    '              </td>'+
                    '              <td>'+
                    '                  <button class="file-remove gray-color larger delete_cover" cover_id="'+element.id+'">'+
                    '                      <i class="fas fa-times-circle"></i> <br> إزالة التغليف '+
                    '                  </button>'+
                    '              </td>'+
                    '          </tr>')
                })
                        }


                        alert(json.message);

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                    return false;
                })
            }


            alert(json.message);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
}else{
    alert("رجاء اختيار الملف اولا");
}


    return false
});

$(".delete_file").on('click',function(){
    var file_id = $(this).attr('file_id');
    $.ajax({
        url: '/delete_file',
        type: 'post',
        data: {'_token':$('meta[name=csrf-token]').attr("content"),
        'file_id':file_id ,
        'custom_product' :$('#custom_product_id').val() ,
         },

        dataType: 'json',

        success: function(json) {
            // Need to set timeout otherwise it wont update the total
        if(json.success == "1"){

//load the table
$('.files_container').html('');
                json.data.files.forEach(element => {
                    files_p.push('/uploads/custom_product_file/'+element.file);
                    $('.files_container').append('<tr> <td class="collapsed" data-bs-toggle="collapse" href="#row'+element.id+'" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>'+
                    '</td>'+
                    '  <td>'+
                    '<div class="pretty p-default p-smooth p-round">'+
                    '   <input type="checkbox" value="'+element.id+'" name="selectedFiles[]" class="filecheckbox" id="checkAll2">'+
                    '   <div class="state p-warning">'+
                    '       <label></label>'+
                    '   </div>'+
                    '</div>'+
                    '</td>'+
                    '<td><input type="text" class="quantity'+element.id+'" value="1"></td>'+
                    '<td>'+element.file+'</td>'+
                    '<td>'+element.number_of_pages+'</td>'+
                    '<td>'+
                       ' <button><i class="fas fa-edit "></i></button>'+
                     '   <button><i class="fas fa-trash-alt delete_file" file_id="'+element.id+'" type="button"></i></button>'+
                    '</td></tr>'+
                    ' <tr class="collapse" id="row'+element.id+'">'+
                    '<td colspan="5 " class=" text-start ">'+
                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop'+element.id+'">'+element.prop+'</span>'+
                    '</td></tr>')
                });
        }


        alert(json.message);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
    return false;
})


$(".delete_cover").on('click',function(){
    var cover_id = $(this).attr('cover_id');
    $.ajax({
        url: '/delete_cover',
        type: 'post',
        data: {'_token':$('meta[name=csrf-token]').attr("content"),
        'cover_id':cover_id ,
        'custom_product' :$('#custom_product_id').val() ,
         },

        dataType: 'json',

        success: function(json) {
            // Need to set timeout otherwise it wont update the total
        if(json.success == "1"){

//load the table
$(".covers_files").html('');
json.data.covers.forEach(function(element){

    $(".covers_files").append('<tr>'+
    '               <td class="text-center">'+
    '                  <img src="./img/9.png">'+
    '                  <p>'+element.name+' </p>'+
    '              </td>'+
    '              <td class="no-padding" colspan="3">'+
             element.files+
    '              </td>'+
    '              <td>'+
    '                  <button class="file-remove gray-color larger delete_cover" cover_id="'+element.id+'">'+
    '                      <i class="fas fa-times-circle"></i> <br> إزالة التغليف '+
    '                  </button>'+
    '              </td>'+
    '          </tr>')
})
        }


        alert(json.message);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
    return false;
})


$(".delete_cover_cart").on('click',function(){
    var cover_id = $(this).attr('cover_id');
       $.ajax({
           url: '/delete_cover',
           type: 'post',
           data: {'_token':$('meta[name=csrf-token]').attr("content"),
           'cover_id':cover_id ,
           'custom_product' :$(this).attr('custom_product_id') ,
            },

           dataType: 'json',

           success: function(json) {
               // Need to set timeout otherwise it wont update the total
           if(json.success == "1"){
               location.reload();
           }
       }
   })

       });



//        $(".split_file").on('click',function(){

//         $(".filecheckbox:checked").each(function(){
//         var cover_id = $(this).attr('file_id');
//         $.ajax({
//             url: '/split_file',
//             type: 'post',
//             data: {'_token':$('meta[name=csrf-token]').attr("content"),
//             'cover_id':cover_id ,
//             'custom_product' :$(this).attr('custom_product_id') ,
//              },

//             dataType: 'json',

//             success: function(json) {
//                 // Need to set timeout otherwise it wont update the total
//             if(json.success == "1"){
//                 location.reload();
//             }
//         }
//     })
// })
//        })


$(".split_file").on('click',function(){
    var file_id = $(this).attr('file_id');
    var from = $(".split_from_"+file_id).val();
    var to = $(".split_to_"+file_id).val();

     $(".file_parts_body"+file_id).append('<div class="col-6">'+
     '        <div class="image">'+
     '           <img src="./img/page.png">'+
     '           <span class="number">'+from+'</span>'+
     '<input type="hidden" name="from_v_element_'+file_id+'" />'+
     '        </div>'+
     ' </div>'+
     '        <div class="col-6">'+
     '             <div class="image">'+
     '                <img src="./img/page.png">'+
     '                 <span class="number">'+to+'</span>'+
     '<input type="hidden" name="to_v_element_'+file_id+'" />'+

     '             </div>'+
     '          </div>');
   })
});


$(window).on('load', function() {
    $(".preloader").delay(3000).fadeOut("slow");
})





