<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Dashboard\Auth\UpdatePasswordRequest;

class ProfileController extends Controller
{

    function edit(){
        return view("dashboard.profile.update-password");
    }
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
      
        $user->update(['password'=> Hash::make($request->password)]);
        Alert::success('success', 'password updated  successfully');
        return redirect()->back();
    }
}
