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
                                    <li class="breadcrumb-item"><a href="{{route('stickers-price-list')}}">{{__('public.price_list')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('add-stickers-price-list')}}">{{ __('public.add') }}</a>
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
                    <form method="POST" action="{{ route('add-rollup-size')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('public.price_per_page') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
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
