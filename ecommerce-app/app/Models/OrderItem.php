<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class OrderItem extends Model
{
    use HasFactory;

    public function userReview(): HasOne
    {
        return $this->hasOne(UserReview::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'product_id');
    }

    public $incrementing = false;

    protected $keyType = 'string';

    public static function booted(): void
    {
        static::creating(function (OrderItem $orderItem) {
            $orderItem->id = Str::uuid();
        });
    }
}
