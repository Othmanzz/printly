@extends('layouts.app')

@section('content')
</header>


<div class="page-content login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6 align-self-stretch">
                <div class="yellow-layout" style="height: 100%;">

                    <form id="form1" class="myform" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <br><br><br><br>
                        <div class="text-center pt-4">
                            <h2 class="h1 mb-3">هل نسيت كلمة المرور؟</h2>
                            <p class="large semibold">لإعادة ضبط كلمة المرور الرجاء ادخال البريد الإلكترونى المستخدم لتسجيل الدخول</p>
                        </div>
                        <div class="form-group">
                            <label for="email"><img class="mx-3" src="{{URL::to('/')}}/img/icons/login/email.png">  البريد الألكترونى</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  id="m1" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                        <div class="d-grid gap-2 mb-5">
                            <input class="btn secondary-btn" type="submit" value="استعادة كلمة المرور">
                        </div>
                    </form>

                    <div id="success" class="myform hidden">
                        <br><br><br><br>
                        <div class="text-center pt-4">
                            <div class="icon mb-5">
                                <img src="{{URL::to('/')}}/img/icons/login/tick2.png" alt="">
                            </div>
                            <h2 class=" mb-3">استكشف بريدك الإلكترونى</h2>
                            <p class="large semibold">تم ارسال لبريدك الإلكترونى رسالة تحتوى رابط <br> التأكيد اتبع الرابط لإعادة تعيين كلمة المرور</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 align-self-stretch">
                <div class="pink-layout" style="height: 100%;">
                    <div class="text-center pt-4 pb-5">
                        <h2 class="h1">تسجيل الدخول</h2>
                    </div>
                    <form class="myform" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email"><img class="mx-3" src="{{URL::to('/')}}/img/icons/login/email.png"> البريد الألكترونى</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="m1" required autocomplete="email" autofocus placeholder="ادخل البريد الإلكترونى هنا ...">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        </div>
                        <div class="form-group">
                            <label for="password"><img class="mx-3" src="{{URL::to('/')}}/img/icons/login/lock.png"> كلمة المرور</label>
                            <span class="view-pass"> <a href="#"> <i class="fas fa-eye"></i> </a> </span>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="p1" required autocomplete="current-password" placeholder="ادخل كلمة المرور هنا ...">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        </div>
                        <div class="custom clearfix">
                            <div class="float-start">
                                <div class="pretty p-default p-curve">
                                    <input type="checkbox"  {{ old('remember') ? 'checked' : '' }}/>
                                    <div class="state">
                                        <label>ذكرنى لاحقا</label>
                                    </div>
                                </div>
                            </div>
                            <a href="{ route('password.request') }}" class="float-end">استعادة كلمة المرور</a>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn secondary-btn" type="submit">تسجيل الدخول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
