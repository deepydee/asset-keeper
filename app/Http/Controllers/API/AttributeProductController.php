<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeProductController extends Controller
{
    public function index(Attribute $attribute)
    {
        $products = $attribute->products;

        $data = [
            'attribute' => $attribute->title,
            'products' => $products,
        ];

        return response()
            ->json($data);
    }
}
