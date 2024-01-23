<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Vacation;
use Illuminate\Http\Request;
use App\Enums\VacationStatus;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VacationController extends Controller
{
    function index()
    {
        confirmDelete('delete', 'are you sure to delete?');
        $vacations = Vacation::with('user:id,name')->latest()->paginate(10, ['id', 'from', 'to', 'note', 'type', 'status', 'user_id']);

        return view('dashboard.vacations.index', compact('vacations'));
    }


    function accept(Vacation $vacation)
    {
        $vacation->update(["status" => VacationStatus::ACCEPTED]);
        Alert::success('success', 'vacation accepted successfully');
        return  redirect()->back();
    }
    function reject(Vacation $vacation)
    {
        $vacation->update(["status" => VacationStatus::REJECTED]);
        Alert::success('success', 'vacation rejected successfully');
        return  redirect()->back();
    }


    
}
