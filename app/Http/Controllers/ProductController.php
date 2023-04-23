<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        return view(
            'products.show',
             compact('product'),
        );
    }
}
