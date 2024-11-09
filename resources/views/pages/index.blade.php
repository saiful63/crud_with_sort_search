@extends('layout.app')

@section('content')

<div class="container">
    <div class="card w-80 center">
       <div class="card-header d-flex">
        <p>Listing of Product</p>
        <form action="{{ url('products') }}" method="get" class="ms-auto d-flex">
            <input type="search" name="search" class="me-1">
            <input type="submit" value="search">
        </form>

       </div>
       <div class="card-body">
        <div class="d-flex">
            <a href="{{ url('/products/create') }}">Create product</a>
            <form action="{{ url('/products') }}" class="ms-auto d-flex">
                <select name="sort" class="me-1">
                    <option value="">Select one</option>
                    <option value="Sort Name A-Z">Sort Name A-Z</option>
                    <option value="Sort Name Z-A">Sort Name Z-A</option>
                    <option value="Sort Price Low-High">Sort Price Low-High</option>
                    <option value="Sort Price High-Low">Sort Price High-Low</option>
                </select>
                <input type="submit" value="Sort">
            </form>
        </div>



        <table class="table">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><img src="{{ asset('image/'.$product->image) }}" width="100px" height="50px"></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ url('/products/'.$product->id) }}" class="me-2">View</a>
                            <a href="{{ url('/products/'.$product->id.'/edit') }}"class="me-1">Edit</a>
                            <form action="{{ url('/products/'.$product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>


                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <div>
            {{ $products->links() }}
        </div>
       </div>
    </div>
</div>

@endsection
