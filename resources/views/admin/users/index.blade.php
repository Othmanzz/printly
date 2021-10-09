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
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('users',['type'=>$type])}}">{{$title}}</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-user',['type'=>$type])}}">{{__('public.add')}}</a>
                            <a class="btn btn-success" href="{{route('export_users',['type'=>$type])}}">{{__('public.export')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$title}}</h4>
            </div>

            
            <div class="card-content">

                <form  class="form-search" action="{{route(Route::current()->getName(),['type'=>$type])}}" method="GET" >
                    <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name='s' placeholder="بحث" class="form-control" />
                    </div>
                     <div class="form-group col-md-3">
                       <label>ترتيب جسب الاعلي طلبا </label>
                      <input type="radio" name='sort' value="1" class="form-control" />
                  </div>
                   <div class="form-group col-md-3">
                 <label>ترتيب حسب الاأقل طلبا     </label>

                        <input type="radio" name='sort' value="2" class="form-control" />
                         <input type="hidden" name='type' value="{{$type}}" class="form-control" />
                     </div>
                     <div class="form-group col-md-1">
                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                  </div>
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
                          @if($users)
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>

                                <td><a href="{{route('show-user', ['id' =>$user->id ,'type'=>$type ])}}">{{__("public.edit")}}</a></td>
 <td><a href="{{route('delete-user', ['id' =>$user->id ,'type'=>$type ])}}">{{__("public.delete")}}</a></td>
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
