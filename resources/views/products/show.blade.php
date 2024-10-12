@extends('layouts.template')

@section('content')
    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm mt-3 mb-3">Kembali</a>
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-header">
            {{ $product->product_name }}
        </div>
        <div class="card-body">
            @if ($product->product_image)
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" width="150" class="mb-3">
            @endif
            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
            <p><strong>Harga Retail:</strong> ${{ number_format($product->retail_price, 2) }}</p>
            <p><strong>Harga Wholesale:</strong> ${{ number_format($product->wholesale_price, 2) }}</p>
            <p><strong>Asal:</strong> {{ $product->origin }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong>Dibuat pada:</strong> {{ $product->created_at->format('d M Y H:i') }}</p>
            <p><strong>Diupdate pada:</strong> {{ $product->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <a class="btn btn-primary mt-3 mb-5" href="{{ route('products.index') }}">Kembali</a>
@endsection
