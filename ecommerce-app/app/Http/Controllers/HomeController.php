<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct()
    {

    }
    
    public function index()
    {
        $products = Product::with('userReviews')
            ->withAvg('userReviews', 'rating')
            ->withCount('userReviews')
            ->get()
            ->sortByDesc(['trendRating']);

        return view('home', [
            'user' => Auth::user(),
            'products' => $products,
        ]);
    }
}
