@extends('layouts.template')

@section('content')
    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm mt-3 mb-3">Kembali</a>
    <h1>Edit Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="product_name">Nama Produk:</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"
                placeholder="Nama Produk" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" placeholder="Deskripsi Produk">{{ $product->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="retail_price">Harga Retail:</label>
            <input type="number" step="0.01" name="retail_price" value="{{ $product->retail_price }}"
                class="form-control" placeholder="Harga Retail" required>
        </div>

        <div class="form-group mb-3">
            <label for="wholesale_price">Harga Wholesale:</label>
            <input type="number" step="0.01" name="wholesale_price" value="{{ $product->wholesale_price }}"
                class="form-control" placeholder="Harga Wholesale" required>
        </div>

        <div class="form-group mb-3">
            <label for="origin">Asal (2 Karakter):</label>
            <input type="text" name="origin" value="{{ $product->origin }}" class="form-control" placeholder="Asal"
                maxlength="2" required>
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"
                placeholder="Quantity" min="0" required>
        </div>

        <div class="form-group mb-3">
            <label for="product_image">Gambar Produk:</label>
            @if ($product->product_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" width="100">
                </div>
            @endif
            <input type="file" name="product_image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
@endsection
