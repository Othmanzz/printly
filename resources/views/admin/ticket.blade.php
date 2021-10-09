@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

          </div>

          <div class="text-center">


        <div class="card">




            <div class="card-content">
                <div class="card-body">

                    @foreach($message as $m)
					@if($m->type == 1)
					<p style="text-align:left; ">{{$m->message}}</p>
				@else
										<h3 style="text-align:right; " >{{$m->message}}</h3>

				@endif
					@endforeach
                   <div class="col-lg-12" >
                    <form action="{{route('send_message',['id'=>$ticket->id])}}" method="post">
                           @csrf
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('public.message')}}</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>

                     <div class="col-md-3" style="padding-top: 50px">
                        <input type="submit" class="btn btn-success" value="{{__('public.send')}}" />
                    </div>
                    </div>
                    </form>
                   </div>

                </div>
            </div>
        </div>
   </div>
@endsection
