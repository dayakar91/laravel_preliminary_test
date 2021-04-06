@extends('layout')
@section('title', 'Edit Product')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <form action="{{route('product_update',$product->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Qty:</label>
                        <div class="col-sm-10">
                            <input type="text" name="qty" id="qty" class="form-control" value="{{$product->qty}}">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" >Price:</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" >Purchase Date:</label>
                        <div class="col-sm-10">
{{Form::date('pdate', \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $product->purchase_date))}}  

                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" >Image:</label>
        <input data-preview="#preview" name="input_img" type="file" id="imageInput">
        <img class="col-sm-6" id="preview"  src="">

                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Update Product" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
