<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    public function userReview(): HasOne
    {
        return $this->hasOne(UserReview::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
