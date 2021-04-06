@extends('layout')

@section('title', 'Products')

   <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form method="post" action="{{route('products.search')}}" role="search">
				    @csrf

                    <div class="input-group">
                        
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search product" id="term">
                        <a href="" class=" mt-1">
                            <span class="input-group-btn">
                                <input type="submit" value="Search" class="btn btn-success"/>

                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="container products">

        <div class="row">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="../public/uploads/{{ $product->photo }}" width="100" height="100">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
							<p><strong>Qty: </strong> {{ $product->qty }}</p>
                            <p><strong>Price: </strong> {{ $product->price }}</p>
                            <p class="btn-holder"><a href="{{ url('edit/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Edit</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>
                           <a href="{{ url('add') }}" class="btn btn-success" role="button">Add Product</a>

@endsection