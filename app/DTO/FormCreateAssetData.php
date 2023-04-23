<?php

namespace App\DTO;

use App\Http\Requests\CreateAssetRequest;
use Spatie\LaravelData\Data;

class FormCreateAssetData extends Data
{
    public function __construct(
        public string $date,
    ) {}

    public static function fromRequest(CreateAssetRequest $request): self
    {
        $data = $request->validated();

        return new self($data['date']);
    }
}
