<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index(Product $product): JsonResponse
    {
        $data = [];
        $attributes = $product->attributes;

        foreach ($attributes as $attribute) {
            $data[$attribute->title] = $attribute->pivot->value;
        }

        return response()
            ->json($data);
    }

    public function store(Request $request, Product $product): JsonResponse
    {
        $attribute = $product->attributes()
            ->create($request->all());

        return response()
            ->json($attribute);
    }
}
