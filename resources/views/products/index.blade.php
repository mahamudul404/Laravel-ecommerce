@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Products</h1>

        <!-- Button to Add New Product -->
        <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Add New Product</a>

        @if ($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                <p><strong>Price:</strong> ${{ $product->price }}</p>
                                <p><strong>Stock:</strong> {{ $product->stock }}</p>

                                <!-- View, Edit, Delete Buttons -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>

                    </div>

                @endforeach
            </div>

<div>
  {{ $products->links('pagination::bootstrap-5') }}
</div>

        @else
            <p class="text-center">No products available.</p>
        @endif
    </div>
@endsection
