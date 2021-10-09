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
                            <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('users',['type'=>$type])}}">{{$title}}</a>
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
                    <form method="POST" action="{{ route('update-user',['id'=>$user->id , 'type'=>$type])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('public.email2') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('public.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="phone2" class="col-md-4 col-form-label text-md-right">{{ __('public.phone2') }}</label>

                            <div class="col-md-6">
                                <input id="phone2" type="phone" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ $user->phone2 }}" required autocomplete="phone2">

                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if($type == 7)
            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('public.code') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{old('code') }}" required autocomplete="code">

                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="safer_discount" class="col-md-4 col-form-label text-md-right">نسبة الخصم للسفير </label>

                <div class="col-md-6">
                    <input id="safer_discount" type="text" class="form-control @error('safer_discount') is-invalid @enderror" name="safer_discount" value="{{old('safer_discount') }}" required autocomplete="user_discount">

                    @error('safer_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_discount" class="col-md-4 col-form-label text-md-right">نسبة الخصم للعميل </label>

                <div class="col-md-6">
                    <input id="user_discount" type="text" class="form-control @error('user_discount') is-invalid @enderror" name="user_discount" value="{{old('user_discount') }}" required autocomplete="user_discount">

                    @error('user_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @endif
    @if($type == 0)
                        <div class="form-group row">
                            <label for="universty" class="col-md-4 col-form-label text-md-right">{{ __('public.universty') }}</label>

                            <div class="col-md-6">
                                <input id="universty" type="text" class="form-control @error('universty') is-invalid @enderror" name="universty" value="{{$customer->universty }}" required autocomplete="universty">

                                @error('universty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="collage" class="col-md-4 col-form-label text-md-right">{{ __('public.collage') }}</label>

                            <div class="col-md-6">
                                <input id="collage" type="text" class="form-control @error('collage') is-invalid @enderror" name="college" value="{{$customer->college }}" required autocomplete="collage">

                                @error('collage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="collage" class="col-md-4 col-form-label text-md-right">{{ __('public.specialist') }}</label>

                            <div class="col-md-6">
                                <input id="specialist" type="text" class="form-control @error('specialist') is-invalid @enderror" name="specialist" value="{{$customer->specialist }}" required autocomplete="specialist">

                                @error('specialist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('public.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('public.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                      <input type="hidden" name="type" value="{{$type}}">
                      @if($type == 3)
 <div class="form-group row">
                            <label for="profit" class="col-md-4 col-form-label text-md-right">نسبة الربح  </label>

                            <div class="col-md-6">
                                <input id="profit" value="{{$user->profit }}" type="number" class="form-control "  name="profit"  autocomplete="code">
                            </div>
                        </div>

                      @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
               <h3> {{ __('public.block') }}</h3>
               @if($user->block == 0)
                    <form method="POST" action="{{ route('block-user',['id'=>$user->id , 'type'=>$type])}}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group row">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('public.reason') }}</label>

                            <div class="col-md-6">
                                <input id="reason" type="password" class="form-control" name="reason"  autocomplete="reason">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="date_to" class="col-md-4 col-form-label text-md-right">حظر الي</label>

                            <div class="col-md-6">
                                <input id="date_to" type="date" class="form-control" name="date_to"  autocomplete="date_to">
                            </div>
                        </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.block') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                   <h3><a href="{{route('block-cancel',['id'=>$user->id])}}">الغاء الحظر </a></h3>
                    @endif
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
