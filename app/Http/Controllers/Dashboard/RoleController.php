<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Dashboard\Role\StoreRoleRequest;
use App\Http\Requests\Dashboard\Role\UpdateRoleRequest;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view("dashboard.roles.index", compact("roles"));
    }

    function create()
    {
        
        $permissions = Permission::get(['id', 'name']);
        return view("dashboard.roles.create", compact("permissions"));
    }
    public function store(StoreRoleRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // dd($data['permissions']);
       DB::transaction(function()use ($data){
        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web',]);
        $role->syncPermissions($data['permissions']);
       });
        Alert::success('success', 'Role stored successfully');
        return redirect()->route("dashboard.roles.index");
    }

    function edit(Role $role)
    {
        $role->load("permissions");
        $permissions = Permission::get(['id', 'name']);
        return view("dashboard.roles.edit", compact("role","permissions"));
    }
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        DB::transaction(function()use ($data,$role){
        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions']);
        });
        Alert::success('success', 'Role updated successfully');
        return back();
    }
}
