<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Source;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('assets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $source = Source::select(['id', 'title', 'time', 'color'])->get();

        $startDay = Carbon::parse($request->data)->startOfDay();
        $endDay = Carbon::parse($request->data)->endOfDay();

        $assets = Asset::with('source')
            ->whereBetween('date', [$startDay, $endDay])
            ->get();

        $interval = CarbonInterval::minutes(60)
            ->toPeriod($startDay, $endDay)
            ->toArray();

        $workTime = collect($interval)->map(function($time) {
            return $time->format('H:i');
        });

        $expectedTime = collect();

        foreach ($assets as $asset) {
            $durationInHours = Carbon::parse($asset->source->time)->hour;

            $startTime = $asset->date;
            $endTime = $asset->date->addHours(--$durationInHours);

            $assetInterval = CarbonInterval::minutes(60)
                ->toPeriod($startTime, $endTime)
                ->toArray();

                collect($assetInterval)->each(function($time) use (&$expectedTime) {
                    $expectedTime->push($time->format('H:i'));
                });
        }

        return view('assets.create', compact(
            'source',
            'workTime',

        ));
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
