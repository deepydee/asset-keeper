<?php

namespace App\Services;

use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WorkTimeService
{
    public function generateIntervalForDay(
        string $startDay,
        string $endDay
    ): Collection {
        $interval = CarbonInterval::minutes(60)
            ->toPeriod($startDay, $endDay)
            ->toArray();

        return collect($interval)->map(function($time) {
            return $time->format('H:i');
        });
    }

    public function generateDurationIntervalAssets(Collection $assets): Collection
    {
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

            return $expectedTime;
        }
    }
}
