<?php

namespace App\Actions;

use App\DTO\FormCreateAssetData;
use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;

class FormCreateAssetAction
{
    public function __construct(
        protected SourceRepository $sourceRepository,
        protected AssetRepository $assetRepository,
        protected WorkTimeService $workTimeService,
    ) {}

    public function execute(FormCreateAssetData $data): array
    {
        $source = $this->sourceRepository->getAll();

        $startDay = Carbon::parse($data->date)->startOfDay();
        $endDay = Carbon::parse($data->date)->endOfDay();

        $assets = $this->assetRepository->getForDay($startDay, $endDay);

        $workTime = $this->workTimeService
            ->generateIntervalForDay($startDay, $endDay);

        $expectedTime = $this->workTimeService
            ->generateDurationIntervalAssets($assets);

        $workTime = $workTime->diff($expectedTime);

        return compact('source', 'workTime');
    }
}
