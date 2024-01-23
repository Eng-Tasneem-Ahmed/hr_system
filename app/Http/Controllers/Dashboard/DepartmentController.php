<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Dashboard\DepartmentRequest;

class DepartmentController extends Controller
{
    function index()
    {
        confirmDelete('delete', 'are you sure to delete?');
        $departments = Department::withTrashed()->latest()->paginate(10, ['id', 'name','deleted_at']);

        return view('dashboard.departments.index', compact('departments'));
    }


    function create()
    {
        return view('dashboard.departments.create');
    }

    function store(DepartmentRequest $request)
    {
        $department = Department::create([
            'name' => $request->name,
           
        ]);
        if ($department) {
            Alert::success('success', 'department stored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return to_route('dashboard.departments.index');
    }
    function edit(Department $department)
    {
        return view('dashboard.departments.edit', compact('department'));
    }

    function update(DepartmentRequest $request, Department $department)
    {
        $updated =  $department->update([
            'name' => $request->name,
          
        ]);
        if ($updated) {
            Alert::success('success', 'department updated successfully');
        } else {
            Alert::error('error', 'failed');
        }

        return redirect()->back();
    }
    function destroy(Department $department)
    {
        if($department->delete()){
            Alert::success('success', 'department deleted successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }
    function restore($id)
    {
        $department=Department::withTrashed()->find($id);
        if($department->restore()){
            Alert::success('success', 'department restored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }




}
