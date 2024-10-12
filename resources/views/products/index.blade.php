@extends('layouts.template')

@section('title', 'Daftar Produk')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-primary btn-sm mt-3">Kembali</a>
    <div class="mt-4 p-5 bg-light rounded">

        <h1>Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mt-3">Tambah Produk</a>
    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga Retail</th>
                        <th scope="col">Harga Wholesale</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="text-decoration-none">{{ $product->product_name }}</a>
                            </td>
                            <td>{{ Str::limit($product->description, 50, '...') }}</td>
                            <td>Rp {{ number_format($product->retail_price, 2, ',', '.') }}</td>
                            <td>Rp {{ number_format($product->wholesale_price, 2, ',', '.') }}</td>
                            <td>{{ $product->origin }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada produk ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>
    </div>
@endsection
