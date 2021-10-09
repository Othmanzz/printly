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
                            <h2 class="content-header-title float-left mb-0"> {{__("public.price_list")}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('paper-price-list',['id'=>$id])}}"> {{__("public.price_list")}}</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-price-list',['id'=>$id])}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('public.price_list') }}</h4>
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

                <form  class="form-search" action="{{route(Route::current()->getName(),['id'=>$id])}}" method="GET" >
                    <div class="form-group">
                        <input type="text" name='s' class="form-control" />


                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                    </div>
                </form>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.price')}}</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($papers_price)
                        @foreach($papers_price as $paper_price)
                            <tr>
                                <th scope="row">{{$paper_price->id}}</th>
                                <td class="editable_name" el_id="{{$paper_price->id}}" table="price_list">{{$paper_price->name}}</td>
                                <td class="editable_price" el_id="{{$paper_price->id}}">{{$paper_price->price}}</td>

                                <td><a href="{{route('edit-price-list', ['id' =>$paper_price->id ])}}">{{__("public.edit")}}</a></td>
                                <td><a href="{{route('delete-price-list', ['id' =>$paper_price->id ])}}">{{__("public.delete")}}</a></td>

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

