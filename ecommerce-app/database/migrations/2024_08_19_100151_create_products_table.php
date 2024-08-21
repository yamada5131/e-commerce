<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use Illuminate\Support\Str;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('qty_in_stock')->default(0);
            $table->foreignIdFor(ProductCategory::class);
            $table->decimal('price', 10, 2); // Added price field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
