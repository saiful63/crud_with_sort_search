@extends('layout.app')

@section('content')


<div class="container">
    <div class="card w-50 center">
       <div class="card-header">View a product</div>
       <div class="card-body">
        <form>
            <input type="text" name="product_id" class="form-control m-2"  value="{{ $product->product_id }}">
            <input type="text" name="name" class="form-control m-2" value="{{ $product->name }}">
            <input type="text" name="description" class="form-control m-2" value="{{ $product->description }}">
          <input type="text" name="price" class="form-control m-2" value="{{ $product->price }}">
           <input type="text" name="stock" class="form-control m-2" value="{{ $product->stock }}">
           <input type="text" name="image" class="form-control m-2" value="{{ $product->image }}">
           
        </form>
       </div>
    </div>
</div>

@endsection
