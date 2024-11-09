@extends('layout.app')

@section('content')


<div class="container">
    <div class="card w-50 center">
       <div class="card-header">Create a product</div>
       <div class="card-body">
        <form action="{{ url('/products') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_id" class="form-control m-2"  placeholder="Enter product id">
            <input type="text" name="name" class="form-control m-2" placeholder="Enter name">
            <input type="text" name="description" class="form-control m-2" placeholder="Enter description">
          <input type="text" name="price" class="form-control m-2" placeholder="Enter price">
          <input type="text" name="stock" class="form-control m-2" placeholder="Enter stock">
          <input type="file" name="image" class="form-control m-2">
          <button type="submit">Submit</button>
        </form>
       </div>
    </div>
</div>

@endsection
