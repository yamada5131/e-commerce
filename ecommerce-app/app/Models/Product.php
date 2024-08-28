<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function orderItems(): BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class);
    }

    public function userReviews(): HasManyThrough
    {
        return $this->hasManyThrough(UserReview::class, OrderItem::class);
    }
}




