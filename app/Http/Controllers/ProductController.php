<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        ProductResource::collection($products);

        return response()
            ->json([
                'data' => $products->all(),
                'currentPage' => $products->currentPage(),
                'lastPage' => $products->lastPage(),
            ]);
    }

    public function show(Product $product, Request $request): View|JsonResponse
    {
        if($request->wantsJson()) {

            return response()
                ->json(
                    new ProductResource($product)
                );
        }

        return view(
            'products.show',
             compact('product'),
        );
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()
            ->json($product);
    }
}
