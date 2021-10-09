<div class="card-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <form  class="form-search" action="{{route(Route::current()->getName())}}" method="GET" >
                    <div class="form-group">
                        <input type="text" name='search' class="form-control" />
                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($products->items() as $product)

          <h3>{{$product->product_name}}</h3>
          <h3>From {{$product->name}}</h3>

    @endforeach


    {{ $products->links() }}

</div>

