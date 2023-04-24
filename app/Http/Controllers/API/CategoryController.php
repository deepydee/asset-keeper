<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private const PER_PAGE = 10;

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Category::paginate(self::PER_PAGE);
        $collection = CategoryResource::collection($products);

        return response()
            ->json([
                'data' => $collection->all(),
                'currentPage' => $collection->currentPage(),
                'lastPage' => $collection->lastPage(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $category = Category::create($request->all());

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        return response()
            ->json(
                new CategoryResource($category)
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $category->update($request->all());

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(true);
    }
}
