<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->foreignIdFor(ShoppingCart::class);
            $table->foreignIdFor(Product::class);
            $table->integer('qty')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_items');
    }
};
