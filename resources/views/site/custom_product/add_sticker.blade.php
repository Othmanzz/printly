@extends('layouts.app')
@section('content')
    <div class="app-content content">

        <div class="card">


            @if(session()->has('success'))
            <script>
                $(document).ready(function () {

                Swal.fire(
    '{{__("public.good_job")}}',
    "{{ session()->get('success') }}",
    'success'
    );
                });
            </script>

            @endif
            @if(session()->has('error') || $errors->any())
            {{-- @dd($errors); --}}
            <script>
            $(document).ready(function () {
                Swal.fire(
                    '{{__("public.faild_job_job")}}',

                    "{{ session()->get('error') }}",
    'error'
    );
    });
            </script>
            @endif

            {{-- @dd($errors); --}}

            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('create-sticker')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                <input id="price" type="hidden" class="form-control @error('price') is-invalid @enderror" name="price_id" value="1" required autocomplete="price" autofocus>

                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="note" type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" required autocomplete="quantity" autofocus>

                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="quantity" autofocus>

                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_size') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="paper_size"  >
                                    <optgroup label="{{__('public.papers_size')}}">


                                    @foreach($stickers_paper_shape as $size )
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('paper_size')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_shape') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="paper_shape"  >
                                    <optgroup label="{{__('public.papers_shape')}}">


                                    @foreach($stickers_paper_size as $shape )
                                        <option value="{{$shape->id}}">{{$shape->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('paper_shape')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.papers_type') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="paper_type"  >
                                    <optgroup label="{{__('public.papers_type')}}">


                                    @foreach($stickers_paper_type as $type )
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                @error('paper_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
