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
                            <h2 class="content-header-title float-left mb-0">انواع التغليف</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('cover_types')}}">انواع التغليف</a>
                                    </li>
                                    {{-- <li class="breadcrumb-item active"><a href="{{route('add-category')}}">{{ __('public.add') }}</a>
                                    </li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">


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
                    '{{__("public.faild_job_job")}}',

    "",
    'error'
    );
    });
            </script>
            @endif


            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('update-cover-type' , ['id'=>$cover_type->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $cover_type->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('public.photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"  autocomplete="photo" autofocus>
                               <input type="hidden" name="old_photo" value="{{$cover_type->photo}}" />
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('public.price_for_page') }}</label>
                             <div class="col-md-6">
                                <input id="price_type" @if ($cover_type->price_type == 1) checked  @endif type="checkbox" class="form-control" name="price_type" value="1" >
                            </div>
                        </div>
 <div class="form-group row">
    <div class="box-tools ">
        <button type="button" onclick="addChoice();" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
    </div>
    <?php $image_row = 1; ?>
                             <div class="col-md-6">
                               <table class="table">
							   <thead>
							   <tr><th>صفحة من</th> <th>الي</th><th>السعر</th><th>حذف</th></tr>
							   </thead>
							   <tbody class="images_box">
							   @foreach($cover_price as $c)
							   <tr id="image-row{{$image_row}}">
							   <td><input class="form-control" type="text" value="{{$c->star_from}}" name="from[]"/></td>
							   <td><input class="form-control"  type="text" value="{{$c->end_to}}" name="to[]"/></td>
							   <td><input  class="form-control"  type="text" value="{{$c->price}}" name="price[]"/></td>
                               <td><button type="button" onclick="removed('{{$image_row}}')" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-minus-circle"></i></button></td>

							   </tr>
                               <?php $image_row = $image_row +1; ?>
							   @endforeach

							   </tbody>
							   </table>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script>


        var image_row = <?=$image_row?>;
        function addChoice() {
       if($("#price_type:checked").val() != 1){

            $('.images_box').append('<tr id="image-row' + image_row + '"> <td><input class="form-control"  type="text" name="from[]"/></td>'+
            '<td><input class="form-control"  type="text" name="to[]"/></td>'+
            '<td><input class="form-control"  type="text" name="price[]"/></td>'+
            '<td><button type="button" onclick="removed('+image_row+')" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-minus-circle"></i></button></td>'+
            '</tr>');

            image_row++;
        }}

        function removed(num){
                   if($("#price_type:checked").val() != 1){
          if($('#image-row' + num).remove()){
            image_row = image_row-1;

          }
      }
        }

addChoice();

</script>
@endsection
