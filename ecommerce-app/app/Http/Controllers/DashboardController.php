<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $sortAlphabet = $request->input('sort-alphabet');
        $sortPrice = $request->input('sort-price');
        $sortRating = $request->input('sort-rating');
        $filterCategory = $request->input('category');
        $search = $request->input('search');

        // Check if multiple sorting options are selected at once
        $sortingOptionsSelected = array_filter([$sortAlphabet, $sortPrice, $sortRating]);
        if (count($sortingOptionsSelected) > 1) {
            // Redirect back with an error message
            return redirect('/dashboard')->with('error', 'Please select only one sorting option at a time.');
        }

        // Filter by category
        if ($filterCategory) {
            $products = DB::table('products')->where('product_category_id', $filterCategory)->get();
        }

        if ($search)
        {
            $products = DB::table('products')->where('name', 'LIKE', '%' . $search . '%')->get();
        }
        
        switch (true) {
            case $sortAlphabet === 'az':
                $products = Product::orderBy('name', 'ASC')->get();
                break;
            case $sortAlphabet === 'za':
                $products = Product::orderBy('name', 'DESC')->get();

                break;
            case $sortPrice === 'low-high':
                $products = Product::orderBy('price', 'ASC')->get();
                break;
            case $sortPrice === 'high-low':
                $products = Product::orderBy('price', 'DESC')->get();
                break;
            // them truong rating khi lay data sp
            // case $sortRating === 'low-high':
            //     $query->orderBy('rating', 'asc');
            //     break;
            // case $sortRating === 'high-low':
            //     $query->orderBy('rating', 'desc');
            //     break;
        }

        return view('dashboard', [
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search)
        {
            $products = DB::table('products')->where('name', $search)->get();
            return view('dashboard', [
                'products' => $products,
            ]);
        }

        $products = Product::all();
        return view('dashboard', [
            'products' => $products,
        ]);
    }
}
