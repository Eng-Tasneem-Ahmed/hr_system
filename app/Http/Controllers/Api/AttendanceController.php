<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class AttendanceController extends Controller
{


    function attendance(Request $request)
    {

        $userIp = $request->attributes->get('user_ip');
    $networkDetails = $request->attributes->get('network_details');
    $latitude = $request->attributes->get('latitude');
    $longitude = $request->attributes->get('longitude');
    $city = $request->attributes->get('city');
        return response()->json([
           "ip"=>$userIp,
           "city"=>$city
        ]);
        // $attendance=Attendance::create([
        //     'user_id'=>Auth::id(),
        //     "latitude"=>

        // ]);
    }


    function leave()
    {
    }
}
