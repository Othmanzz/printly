@extends('layouts.admin')
@section('content')

	<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{__('public.notifications')}}</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>{{__('public.id')}}</th>
                         <th>{{__('public.name')}}</th>

                        <th>{{__('public.date')}}</th>
                        <th>{{__('public.show')}}</th>

                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                          <th>{{__('public.id')}}</th>
                                                <th>{{__('public.name')}}</th>

                        <th>{{__('public.date')}}</th>
                        <th>{{__('public.show')}}</th>
                      </tr>
                    </tfoot>
                    <tbody>
					@foreach($notifications as $no)
                      <tr>
                        <td scope="row">{{$no->id}}</td>
                                <td>{{$no->content}}</td>
                                <td>{{$no->created_at}}</td>

                                <td><a href="{{$no->route}}">{{__("public.show")}}</a></td>

                      </tr>
					  @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

@endsection
