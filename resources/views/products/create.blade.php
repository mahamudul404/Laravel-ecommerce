@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Product</h1>

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

        <!-- Product creation form -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock Quantity</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-success">Add Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
