<?php

namespace App\Http\Requests\Api;

use App\Enums\VacationType;
use App\Http\Requests\Api\BaseFormRequest;


class StoreVacationRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            "from" => "required|date_format:Y-m-d|after:today",
            "to" => "nullable|date|after:from",
            "note" => "nullable|string",
            "type" => "required|in:".VacationType::getValues(),

        ];
    }
}
