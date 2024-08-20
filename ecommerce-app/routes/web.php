<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Simulated product data
$products = [
    1 => [
        'name' => 'Cup',
        'description' => 'Beautiful and elegant cup.',
        'price' => '$15.00',
        'rating' => 4,
        'ratings_count' => 150,
        'image' => 'https://plus.unsplash.com/premium_photo-1668972393852-4c1adf9687c3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y3VwfGVufDB8fDB8fHww',
    ],
    2 => [
        'name' => 'Hanger',
        'description' => 'Stylish and modern hanger.',
        'price' => '$12.00',
        'rating' => 5,
        'ratings_count' => 200,
        'image' => 'https://plus.unsplash.com/premium_photo-1677838847509-0828c90e2848?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aGFuZ2VyfGVufDB8fDB8fHww',
    ],
    3 => [
        'name' => 'Fan',
        'description' => 'Cool breeze with modern design.',
        'price' => '$25.00',
        'rating' => 3,
        'ratings_count' => 85,
        'image' => 'https://images.unsplash.com/photo-1528293064916-02c0435e416d?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZmFufGVufDB8fDB8fHww',
    ],
];

// Simulated feedback data
$feedbacks = [
    1 => [
        ['text' => 'Great cup, very sturdy and looks amazing!', 'rating' => 5],
        ['text' => 'Good quality but a bit expensive.', 'rating' => 4],
    ],
    2 => [
        ['text' => 'The hanger is very strong and durable.', 'rating' => 5],
        ['text' => 'Stylish design but not as strong as expected.', 'rating' => 3],
    ],
    3 => [
        ['text' => 'The fan works well but is a bit noisy.', 'rating' => 3],
        ['text' => 'Keeps me cool during hot days, worth the price.', 'rating' => 4],
    ],
];

// Dashboard route with authentication middleware
Route::get('/dashboard', function () use ($products) {
    return view('dashboard', ['products' => $products]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route to display individual product details with feedback
Route::get('/product/{id}', function ($id) use ($products, $feedbacks) {
    // Check if the product exists
    if (!isset($products[$id])) {
        abort(404); // Return a 404 error if the product doesn't exist
    }

    $product = $products[$id];
    $productFeedbacks = $feedbacks[$id] ?? [];

    return view('product.show', ['product' => $product, 'feedbacks' => $productFeedbacks]);
})->name('product.show');

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

require __DIR__.'/auth.php';
