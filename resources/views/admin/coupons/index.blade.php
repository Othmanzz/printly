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
                            <h2 class="content-header-title float-left mb-0"> {{__('public.coupons')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('coupons')}}"> {{__('public.coupons')}} </a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-coupon')}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('public.coupons')}}</h4>
            </div>

     
            <div class="card-content">


                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                      <th scope="col">{{__('public.code')}}</th>

                            <th scope="col">{{__('public.status')}}</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($coupons)
                        @foreach($coupons as $coupon)
                            <tr>
                                <th scope="row">{{$coupon->id}}</th>
                                <td>{{$coupon->name}}</td>
                                <td>{{$coupon->code}}</td>
                                <td></td>

                                <td><a href="{{route('edit-coupon', ['id' =>$coupon->id ])}}">{{__("public.edit")}}</a></td>
                                <td><a href="{{route('delete-coupon', ['id' =>$coupon->id ])}}">{{__("public.delete")}}</a></td>

                            </tr>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
