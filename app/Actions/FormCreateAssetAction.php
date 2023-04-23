<?php

namespace App\Actions;

use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormCreateAssetAction
{
    public function __construct(
        protected SourceRepository $sourceRepository,
        protected AssetRepository $assetRepository,
        protected WorkTimeService $workTimeService,
    ) {}

    public function execute(Request $request): array
    {
        $source = $this->sourceRepository->getAll();

        $startDay = Carbon::parse($request->data)->startOfDay();
        $endDay = Carbon::parse($request->data)->endOfDay();

        $assets = $this->assetRepository->getForDay($startDay, $endDay);

        $workTime = $this->workTimeService
            ->generateIntervalForDay($startDay, $endDay);

        $expectedTime = $this->workTimeService
            ->generateDurationIntervalAssets($assets);

        $workTime = $workTime->diff($expectedTime);

        return compact('source', 'workTime');
    }
}
