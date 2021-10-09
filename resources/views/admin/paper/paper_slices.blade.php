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
                            <h2 class="content-header-title float-left mb-0"> تخطيط الورق</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('paper_slices')}}"> تخطيط الورق</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-paper-slice')}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('public.categories') }}</h4>
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


                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                    </div>
                </form>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>


                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($paper_slices)
                        @foreach($paper_slices as $paper_slice)
                            <tr>
                                <th scope="row">{{$paper_slice->id}}</th>
                                <td>{{$paper_slice->name}}</td>

                                <td><a href="{{route('edit-paper-slice', ['id' =>$paper_slice->id ])}}">{{__("public.edit")}}</a></td>

                                <td><a href="{{route('delete-paper-slice', ['id' =>$paper_slice->id ])}}">{{__("public.delete")}}</a></td>


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
