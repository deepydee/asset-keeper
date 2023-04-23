<?php

namespace App\Http\Controllers;

use App\Actions\FormCreateAssetAction;
use App\DTO\FormCreateAssetData;
use App\Http\Requests\CreateAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'assets' => Asset::all(),
                ]
            ]);

            // return response()->json([
            //     'status' => 'failed',
            //     'massage' => 'bad request',
            // ], 400);
        }

        return view('assets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(
        CreateAssetRequest $request,
        FormCreateAssetAction $action): View {

            $dto = FormCreateAssetData::fromRequest($request);

            return view('assets.create', $action->execute($dto));
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
    public function show(string $id)
    {
        //
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
