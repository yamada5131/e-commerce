<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['*'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'shopping_cart_items', 'shopping_cart_id', 'product_id');
    }

    public $incrementing = false;

    protected $keyType = 'string';

    public static function booted(): void
    {
        static::creating(function (ShoppingCart $shoppingCart) {
            $shoppingCart->id = Str::uuid();
        });
    }
}
