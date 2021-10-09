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
                            <h2 class="content-header-title float-left mb-0">التذاكر</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('tickets')}}">التذاكر</a>
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
                <h4 class="card-title">التذاكر</h4>
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


                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.message')}}</th>
                            <th scope="col">{{__('public.date')}}</th>


                            <th scope="col">{{__('public.show')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if($tickets)
                        @foreach($tickets->items() as $ticket)
                            <tr>
                                <th scope="row">{{$ticket->id}}</th>
                                <td>{{App\Http\Controllers\ProfileController::get_user_info($ticket->company_id)->name}}</td>

                                <td>{{$ticket->message}}</td>
                                <td>{{$ticket->created_at}}</td>

                                <td><a href="{{route('show_ticket', ['id' =>$ticket->id ])}}">{{__("public.show")}}</a></td>

                            </tr>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                    {{ $tickets->links() }}

                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
