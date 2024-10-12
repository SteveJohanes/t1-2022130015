@extends('layouts.template')

@section('content')
    <h1>Dashboard</h1>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 pb-4">
                <div class="card-header">Total Quantity Products</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalQuantity }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @if ($mostExpensiveProduct)
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Produk Termahal</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $mostExpensiveProduct->product_name }}</h5>
                        <p class="card-text">Harga Retail: ${{ number_format($mostExpensiveProduct->retail_price, 2) }}</p>
                    </div>
                </div>
            @else
                <p>Tidak ada produk termahal.</p>
            @endif
        </div>

        <div class="col-md-4">
            @if ($highestQuantityProduct)
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Produk dengan Quantity Terbanyak</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $highestQuantityProduct->product_name }}</h5>
                        <p class="card-text">Quantity: {{ $highestQuantityProduct->quantity }}</p>
                    </div>
                </div>
            @else
                <p>Tidak ada produk dengan quantity terbanyak.</p>
            @endif
        </div>
    </div>
@endsection
