<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ViewedProduct extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function booted(): void
    {
        static::creating(function (ViewedProduct $viewedProduct) {
            $viewedProduct->id = Str::uuid();
        });
    }
}
