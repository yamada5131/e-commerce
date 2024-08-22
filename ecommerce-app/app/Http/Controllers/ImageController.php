<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    static function storeImage(Request $request)
    {
        $path = $request->file('photo')->store('public/profile');
        return substr($path, strlen('public/'));
    }
}
