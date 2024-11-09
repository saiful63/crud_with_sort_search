@extends('layout.app')

@section('content')


<div class="container">
    <div class="card w-50 center">
       <div class="card-header">Update a product</div>
       <div class="card-body">
        <form action="{{ url('/products/'.$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" class="form-control m-2"  value="{{ $product->id }}">
            <input type="hidden" name="prev_image" class="form-control m-2"  value="{{ $product->image }}">
            <input type="text" name="product_id" class="form-control m-2"  value="{{ $product->product_id }}">
            <input type="text" name="name" class="form-control m-2" value="{{ $product->name }}">
            <input type="text" name="description" class="form-control m-2" value="{{ $product->description }}">
          <input type="text" name="price" class="form-control m-2" value="{{ $product->price }}">
           <input type="text" name="stock" class="form-control m-2" value="{{ $product->stock }}">
           <input type="file" name="image" class="form-control m-2">
           <input type="submit" value="Update product">
        </form>
       </div>
    </div>
</div>

@endsection
