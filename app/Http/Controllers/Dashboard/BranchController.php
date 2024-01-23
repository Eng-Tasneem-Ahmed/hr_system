<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Dashboard\BranchRequest;

class BranchController extends Controller
{
    function index()
    {
        confirmDelete('delete', 'are you sure to delete?');
        $branches = Branch::withTrashed()->latest()->paginate(10, ['id', 'name','location','deleted_at']);

        return view('dashboard.branches.index', compact('branches'));
    }


    function create()
    {
        return view('dashboard.branches.create');
    }

    function store(BranchRequest $request)
    {
        $branch = branch::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        if ($branch) {
            Alert::success('success', 'branch stored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return to_route('dashboard.branches.index');
    }
    function edit(branch $branch)
    {
        return view('dashboard.branches.edit', compact('branch'));
    }

    function update(BranchRequest $request, branch $branch)
    {
        $updated =  $branch->update([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        if ($updated) {
         
            Alert::success('success', 'branch updated successfully');
        } else {
            Alert::error('error', 'failed');
        }

        return redirect()->back();
    }
    function destroy(branch $branch)
    {
        if($branch->delete()){
            Alert::success('success', 'branch deleted successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }
    function restore($id)
    {
        $branch=Branch::withTrashed()->find($id);
        if($branch->restore()){
            Alert::success('success', 'branch restored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }




}
