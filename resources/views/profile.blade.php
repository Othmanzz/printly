@extends('layouts.app')

@section('content')
</header>
<!--End-->

<div class="page-content account-page">
    <div class="container">
        <div class="blue-layout">
            <div class="title blue-title text-center">
                <h2>حسابى</h2>
            </div>
            <form class="myform"  action="{{ route('update_customer')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <figure class="upload-photo text-center mb-5">
                                <img  @if($user->photo != "" ) src="{{URL::to("/")}}/uploads/users/{{$user->photo}}" @else src="{{URL::to("/")}}/img/user2.png" @endif class="img-responsive" alt="">
                                <figcaption>
                                    <div class="file-upload">
                                        <div class="file-select">
                                            <div class="file-select-button" id="fileName"><i class="fas fa-camera"></i></div>
                                            <div class="file-select-name" id="noFile">ID#{{$user->id}}</div>
                                            <input type="file" name="photo" id="chooseFile">
                                            <input type="hidden" value="{{$user->photo}}" name="old_photo" >


                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullname"><img class="me-3" src="./img/icons/login/user.png"> الإسم</label>
                            <input class="form-control" type="text" name="name" id="f1" placeholder="ادخل اسمك هنا ..." required value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone"><img class="me-3" src="./img/icons/login/phone-call1.png">  رقم الجوال </label>
                            <input class="form-control" type="text" name="phone" id="p1" placeholder="ادخل رقم الجوال هنا ..." value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="email"><img class="me-3" src="./img/icons/login/email.png">  البريد الألكترونى</label>
                            <input class="form-control" type="email" name="email" id="m1" placeholder="ادخل البريد الإلكترونى هنا ..." value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="email"><img class="me-3" src="./img/icons/order/exclamation.png">طالب جامعى</label>
                            <div class="radio-container style-1 ">
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" @if($user->student == 1) checked @endif value="1" name="radio2">
                                    <div class="state ">
                                        <span class="icon ">نعم</span>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio"  @if($user->student == 0) checked @endif value="0" name="radio2">
                                    <div class="state ">
                                        <span class="icon ">لا</span>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  offset-md-2">
                        <h3 class="pink-color">رصيد المحفظة :</h3>
                        <p class="price gray-color bold">{{$wallet->amount}} <span>ر.س</span></p>
                        <a href="{{route('wallet')}}" class="account-btn"><i class="fas fa-cog"></i> ادارة الرصيد</a>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label><img class="me-3" src="./img/icons/order/exclamation.png">اسم الجامعة</label>
                                <input class="form-control" type="text" name="universty" id="u1" placeholder="ادخل اسم الجامعة هنا ..." required value="{{$user->universty}} ">
                            </div>
                            <div class="form-group col-md-4">
                                <label><img class="me-3" src="./img/icons/order/exclamation.png">الكلية</label>
                                <input class="form-control" type="text" name="college" id="u2" placeholder="ادخل اسم الكلية هنا ..." required value="{{$user->college}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label><img class="me-3" src="./img/icons/order/exclamation.png">التخصص</label>
                                <input class="form-control" type="text" name="specialist" id="u2" placeholder="ادخل اسم التخصص هنا ..." required value="{{$user->specialist}} ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix">
                    <div class="float-end mt-4">
                        <button type="button" class="btn btn-border btn-lg me-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            تحديث كلمة المرور
                        </button>
                        <input type="submit" class="btn btn-primary btn-lg mb-3" value="تحديث">
                    </div>
                </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title pink-color" id="exampleModalLabel">تحديث كلمة المرور</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form  class="myform" id="form1" method="POST" action="{{ route('update_password')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label for="password"><img class="me-3" src="{{URL::to('/')}}/img/icons/login/lock.png">  كلمة المرور الحالية</label>
                                        <span class="view-pass"> <a href="#"> <i class="fas fa-eye"></i> </a> </span>
                                        <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="p1" placeholder="ادخل كلمة المرور هنا ..." value="">
                                        @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><img class="me-3" src="{{URL::to('/')}}/img/icons/login/lock.png">  كلمة المرور الجديدة</label>
                                        <span class="view-pass"> <a href="#"> <i class="fas fa-eye"></i> </a> </span>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="p1" placeholder="ادخل كلمة المرور هنا ..." value="">
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password2"><img class="me-3" src="{{URL::to('/')}}/img/icons/login/lock.png">  تأكيد كلمة المرور الجديدة</label>
                                        <span class="view-pass"> <a href="#"> <i class="fas fa-eye"></i> </a> </span>
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="p2" placeholder="ادخل كلمة المرور هنا ..." value="">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn main-btn mb-4" value="تأكيد التحديث">
                            </div>
                        </form>

                        <div class="result hidden">
                            <div class="col-md-8 offset-md-2">
                                <div class="text-center mt-5">
                                    <img src="./img/icons/login/tick1.png">
                                    <h5 class="mt-3">تم تعيين كلمة المرور بنجاح</h5>
                                    <a href="#" class="btn btn-primary mt-5 mb-4">الملف الشخصى</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
