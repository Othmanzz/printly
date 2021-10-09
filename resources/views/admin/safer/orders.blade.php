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
                            <h2 class="content-header-title float-left mb-0">الطلبات</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('safer_orders')}}">الطلبات</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الاوردرات</h4>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-error">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card-content">
                <form  class="form-search" action="{{route(Route::current()->getName())}}" method="GET" >
                    <div class="form-group">
                        <input type="text" name='s' class="form-control" />
                        <input type="date" name='from' class="form-control date" placeholder="من" />
                        <input type="date" name='to' class="form-control date" placeholder="الي" />

                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                    </div>
                </form>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.profit')}}</th>
                            <th scope="col">{{__('public.address')}}</th>

                            <th scope="col">{{__('public.date')}}</th>
                       </tr>
                        </thead>
                        <tbody>
                          @if($orders)
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{App\Http\Controllers\OrderController::get_address($order->address)}}</td>

                                <td>{{$order->created_at}}</td>

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
