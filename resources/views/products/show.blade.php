@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="card-body">
                <!-- Display Product Image -->
                @if ($product->image)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" width="300">
                    </div>
                @endif

                <p><strong>Description:</strong></p>
                <p>{{ $product->description }}</p>

                <p><strong>Price:</strong> ${{ $product->price }}</p>
                
                <p><strong>Stock Available:</strong> {{ $product->stock }}</p>
            </div>
            <div class="card-footer">
                <!-- Buttons to edit and delete the product -->
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                
                <!-- Delete button with confirmation -->
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                <!-- Back to product list -->
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
