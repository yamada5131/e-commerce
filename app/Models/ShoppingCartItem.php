<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable = ['*'];

    public $incrementing = false;

    protected $keyType = 'string';

    public static function booted(): void
    {
        static::creating(function (ShoppingCartItem $shoppingCartItem) {
            $shoppingCartItem->id = Str::uuid();
        });
    }
}
