<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    static function storeImage(Request $request, string $path)
    {
        $path = $request->file('photo')->store('public/' . $path);
        return substr($path, strlen('public/'));
    }
}