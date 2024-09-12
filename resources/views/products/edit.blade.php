@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit product form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock Quantity</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" class="form-control-file">

                <!-- Display the existing image if there is one -->
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="150">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
