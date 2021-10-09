@extends('layouts.app')

@section('content')


</header>
<div class="page-content login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6 align-self-center mb-5">
                <div>
                    <h2><a href="#" class="pink-color">ليس لديك حساب ؟</a></h2>
                    <h2 class="mb-4">إنشاء حسابك الأن , يستغرق أقل من دقيقة.</h2>
                    <a href="{{route('register')}}" class="btn btn-default">إنشاء حساب</a>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 align-self-center">
                <div class="pink-layout">
                    <div class="text-center pt-4 pb-5">
                        <h2 class="h1">تسجيل الدخول</h2>
                    </div>
                    <form class="myform" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email"> <img class="mx-3" src="./img/icons/login/email.png">  البريد الألكترونى</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="m1" required autocomplete="email" autofocus placeholder="ادخل البريد الإلكترونى هنا ...">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><img class="mx-3" src="./img/icons/login/lock.png">   كلمة المرور</label>
                            <span class="view-pass"> <a href="javascript:void(0)"> <i class="fas fa-eye"></i> </a> </span>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="p1" required autocomplete="current-password" placeholder="ادخل كلمة المرور هنا ...">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="custom clearfix">
                            <div class="float-start">
                                <div class="pretty p-default p-curve">
                                    <input type="checkbox"  {{ old('remember') ? 'checked' : '' }}/>
                                    <div class="state">
                                        <label>ذكرنى لاحقا</label>
                                    </div>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <a class="float-end" href="{{ route('password.request') }}">
                                {{ __('public.forget_password') }}
                            </a>
                        @endif
                        </div>

                        <div class="d-grid gap-2 mb-5">
                            <button class="btn secondary-btn" type="submit">تسجيل الدخول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
