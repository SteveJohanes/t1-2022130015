@extends('layouts.template')

@section('content')
    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm mt-3 mb-3">Kembali</a>
    <h1>Tambah Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="product_name">Nama Produk:</label>
            <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" placeholder="Deskripsi Produk"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="retail_price">Harga Retail:</label>
            <input type="number" step="0.01" name="retail_price" class="form-control" placeholder="Harga Retail"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="wholesale_price">Harga Wholesale:</label>
            <input type="number" step="0.01" name="wholesale_price" class="form-control" placeholder="Harga Wholesale"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="origin">Origin (2 Karakter):</label>
            <input type="text" name="origin" class="form-control" placeholder="Asal" maxlength="2" required>
        </div>

        <div class="form-group mt-3">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="0" required>
        </div>

        <div class="form-group mt-3">
            <label for="product_image">Gambar Produk:</label>
            <input type="file" name="product_image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success mb-5 mt-3">Submit</button>
    </form>
@endsection
