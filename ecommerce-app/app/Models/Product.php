<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'qty_in_stock',
        'category_id',
        'price',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(ShoppingCart::class, "shopping_cart_items", 'product_id', 'shopping_cart_id');
    }
}
