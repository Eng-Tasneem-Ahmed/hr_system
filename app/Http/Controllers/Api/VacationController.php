<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacation;
use App\Enums\VacationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreVacationRequest;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{


    function  store(StoreVAcationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $vacation = Vacation::create($data);
        if ($vacation) {
            return responseSuccessMessage("vacation send successfully");
        } else {
            return responseErrorMessage("vacation not send ");
        }
    }
}
