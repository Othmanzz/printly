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
                            <h2 class="content-header-title float-left mb-0">{{__('public.papers')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('papers')}}">{{__('public.papers')}}</a>
                                    </li>

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
                    <form method="POST" action="{{ route('edit-paper',['id'=>$paper->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $paper->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_type') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control type" name="type[]" multiple="multiple" >
                                    <optgroup label="{{__('public.papers_type')}}">


                                    @foreach($papers_type as $type )
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('papers_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.printer_type') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control printer_type" name="printer_type[]" multiple="multiple" >
                                    <optgroup label="{{__('public.printer_type')}}">


                                    @foreach($printer_type as $type )
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('printer_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.printer_color') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control printer_color" name="printer_color[]" multiple="multiple" >
                                    <optgroup label="{{__('public.printer_color')}}">


                                    @foreach($printer_color as $type )
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('printer_color')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.printer_method') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control printer_method" name="printer_method[]" multiple="multiple" >
                                    <optgroup label="{{__('public.printer_method')}}">


                                    @foreach($printer_method as $type )
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('printer_method')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="papers_slice" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_slice') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control papers_slice" name="papers_slice[]" multiple="multiple" >
                                    <optgroup label="{{__('public.papers_slice')}}">


                                    @foreach($papers_slice as $paper_slice )
                                        <option value="{{$paper_slice->id}}">{{$paper_slice->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('papers_slice')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						    <div class="form-group row">
                            <label for="covers" class="col-md-4 col-form-label text-md-right">{{ __('public.covers') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control covers" name="covers[]" multiple="multiple" >
                                    <optgroup label="{{__('public.covers')}}">


                                    @foreach($covers as $cover )
                                        <option value="{{$cover->id}}">{{$cover->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('covers')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        $(document).ready(function(){


$(".type").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->paper_type)))?>).trigger("change");
$(".printer_method").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->printer_method)))?>).trigger("change");
$(".printer_color").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->printer_color)))?>).trigger("change");
$(".printer_type").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->printer_type)))?>).trigger("change");
$(".papers_slice").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->papers_slice)))?>).trigger("change");
$(".covers").select2().val(<?=json_encode(array_map('intval', explode(',', $paper->covers)))?>).trigger("change");

});
    </script>
@endsection
