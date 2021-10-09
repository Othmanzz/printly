@extends('layouts.app')

@section('content')
</header>
<div class="page-content login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1  col-md-6 align-self-center">
                <div class="pink-layout">
                    <div class="text-center pt-4 pb-5">
                        <h2 class="h1">حساب جديد</h2>
                    </div>
                    <form class="myform" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="fullname"><img class="mx-3" src="./img/icons/login/user.png"> الإسم</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="f1" placeholder="ادخل اسمك هنا ..." >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><img class="mx-3" src="./img/icons/login/email.png">  البريد الألكترونى</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"  id="m1" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ادخل البريد الإلكترونى هنا ...">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone"><img class="mx-3" src="./img/icons/login/phone-call1.png">  رقم الجوال <span class="gray-color medium">(لابد ان يكون به واتساب)</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text"  id="p3" placeholder="ادخل رقم الجوال هنا ..." name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone"><img class="mx-3" src="./img/icons/login/phone-call2.png"> رقم جوال أخر </label>
                            <input class="form-control @error('phone2') is-invalid @enderror" type="text" name="phone2"  value="{{ old('phone2') }}"  id="p4" placeholder="ادخل رقم الجوال هنا ...">
                            @error('phone2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><img class="mx-3" src="./img/icons/login/lock.png"> كلمة المرور</label>
                            <span class="view-pass"> <a href="javascript:void(0)"> <i class="fas fa-eye"></i> </a> </span>
                            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password"  id="p1" placeholder="ادخل كلمة المرور هنا ...">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><img class="mx-3" src="./img/icons/login/lock.png">  تأكيد كلمة المرور</label>
                            <span class="view-pass"> <a href="javascript:void(0)"> <i class="fas fa-eye"></i> </a> </span>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" required name="password_confirmation" required autocomplete="new-password"  id="p2" placeholder="تاكيد كلمة المرور">
                            @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="d-grid gap-2 mb-5">
                            <button class="btn secondary-btn" type="submit">إنشاء حساب</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1  col-md-6 align-self-center mb-5">
                <h2 class="mb-4"><a href="{{route('login')}}" class="pink-color">هل لديك حساب ؟</a></h2>
                <a href="{{route('login')}}" class="btn btn-default">تسجيل الدخول</a>
            </div>
        </div>
    </div>
</div>

@endsection
