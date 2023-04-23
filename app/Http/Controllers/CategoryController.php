<?php

namespace App\Http\Controllers;

use App\Contracts\ProductRepositoryContract;
use App\Http\Resources\CategoryProductResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        private ProductRepositoryContract $productRepository,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all()->toTree();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {
        $products = $this->productRepository->byCategory($category);

        // $repo = App::make(ProductRepositoryContract::class);
        // $repo = App::make(ProductRepository::class);
        // $repo = App::call(ProductRepository::class, 'method');
        // можно и так вызывать класс из контейнера зависимостей

        if($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => CategoryProductResource::collection($products),
            ]);
        }

        return view(
            'categories.show',
            compact(
                'products'
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
