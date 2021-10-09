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
                                    <li class="breadcrumb-item"><a href="{{route('paper-price-list',['id'=>$paper_id])}}">{{__('public.price_list')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('add-price-list' , ['id'=>$paper_id])}}">{{ __('public.add') }}</a>
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

                    "{{ session()->get('error') }}",
    'error'
    );
    });
            </script>
            @endif


            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('update-price-list' , ['id'=>$id])}}" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $paper_list->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('public.price_per_page') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $paper_list->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price_extra" class="col-md-4 col-form-label text-md-right">شعر التكلفة</label>

                            <div class="col-md-6">
                                <input id="price_extra" type="text" class="form-control @error('price_extra') is-invalid @enderror" name="price_extra" value="{{ $paper_list->price_extra}}" required autocomplete="price_extra" autofocus>

                                @error('price_extra')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_type') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="type"  >
                                    <optgroup label="{{__('public.papers_type')}}">


                                    @foreach($papers_type as $type )
                                        <option value="{{$type->id}}" @if($paper_list->paper_type == $type->id) selected @endif>{{$type->name}}</option>
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

                                <select class="select2 form-control" name="printer_type"  >
                                    <optgroup label="{{__('public.printer_type')}}">


                                    @foreach($printer_type as $type )
                                        <option value="{{$type->id}}" @if($paper_list->printer_type == $type->id) selected @endif>{{$type->name}}</option>
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

                                <select class="select2 form-control" name="printer_color"  >
                                    <optgroup label="{{__('public.printer_type')}}">


                                    @foreach($printer_color as $type )
                                        <option value="{{$type->id}}" @if($paper_list->printer_color == $type->id) selected @endif>{{$type->name}}</option>
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

                                <select class="select2 form-control" name="printer_method"  >
                                    <optgroup label="{{__('public.printer_type')}}">


                                    @foreach($printer_method as $type )
                                        <option value="{{$type->id}}"  @if($paper_list->printer_method == $type->id) selected @endif>{{$type->name}}</option>
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

                                <select class="select2 form-control" name="papers_slice" >
                                    <optgroup label="{{__('public.papers_slice')}}">


                                    @foreach($papers_slice as $paper_slice )
                                        <option value="{{$paper_slice->id}}"  @if($paper_list->paper_slice == $paper_slice->id) selected @endif>{{$paper_slice->name}}</option>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
