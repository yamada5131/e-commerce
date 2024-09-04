<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderDetail extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function booted(): void
    {
        static::creating(function (OrderDetail $orderDetail) {
            $orderDetail->id = Str::uuid();
        });
    }
}
