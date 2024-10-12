<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $totalQuantity = Product::sum('quantity');
        $mostExpensiveProduct = Product::orderBy('retail_price', 'desc')->first();
        $highestQuantityProduct = Product::orderBy('quantity', 'desc')->first();

        return view('home', compact('totalQuantity', 'mostExpensiveProduct', 'highestQuantityProduct'));
    }
}
