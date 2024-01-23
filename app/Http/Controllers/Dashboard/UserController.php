<?php

namespace App\Http\Controllers\Dashboard;

use App\Filters\Dashboard\User\BranchFilter;
use App\Filters\Dashboard\User\DepartmentFilter;
use App\Models\User;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pipeline\Pipeline;
use RealRashid\SweetAlert\Facades\Alert;
use App\Filters\Dashboard\User\NameFilter;
use App\Http\Requests\Dashboard\User\StoreUserRequest;
use App\Http\Requests\Dashboard\User\UpdateUserRequest;

class UserController extends Controller
{
    function index()
    {
        confirmDelete('delete', 'are you sure to delete?');
        $users = User::withTrashed()->latest()->paginate(10, ['id', 'name', 'photo', 'username', 'deleted_at']);
        $branches = getModel(Branch::class, ['id', 'name']);
        $departments = getModel(Department::class, ['id', 'name']);
        return view('dashboard.users.index', compact('users', 'departments', 'branches'));
    }


    function create()
    {
        $branches = getModel(Branch::class, ['id', 'name']);
        $departments = getModel(Department::class, ['id', 'name']);
        return view('dashboard.users.create', compact('departments', 'branches'));
    }

    function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        // dd($data);
        $data['photo'] = $request->hasFile("photo") ? uploadImage($request->photo, User::PATH) : null;
        $data['front_id_card_photo'] = uploadImage($request->front_id_card_photo, User::PATH);
        $data['back_id_card_photo'] = uploadImage($request->back_id_card_photo, User::PATH);
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if ($user) {
            Alert::success('success', 'user stored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return to_route('dashboard.users.index');
    }
    function show($id)
    {
        $user = User::with([
            "vacations" => function ($query) {
                $query->latest();
            },
            'department' => function ($query) {
                $query->withTrashed();
            }, 
            'branch' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->withTrashed()
        ->find($id);
    
        return view('dashboard.users.show', compact('user'));
    }
    function edit(User $user)
    {
        $branches = getModel(Branch::class, ['id', 'name']);
        $departments = getModel(Department::class, ['id', 'name']);
        return view('dashboard.users.edit', compact('user', 'departments', 'branches'));
    }

    function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();
        $data['photo'] = $request->hasFile("photo") ? uploadImage($request->photo, User::PATH) : $user->photo;
        $data['front_id_card_photo'] = $request->hasFile("front_id_card_photo") ? uploadImage($request->front_id_card_photo, User::PATH) : $user->front_id_card_photo;
        $data['back_id_card_photo'] = $request->hasFile("back_id_card_photo") ? uploadImage($request->back_id_card_photo, User::PATH) : $user->back_id_card_photo;
        if ($user->update($data)) {

            Alert::success('success', 'user updated successfully');
        } else {
            Alert::error('error', 'failed');
        }

        return redirect()->back();
    }
    function destroy(User $user)
    {

        if ($user->delete()) {
            Alert::success('success', 'user deleted successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }
    function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user->restore()) {
            Alert::success('success', 'user restored successfully');
        } else {
            Alert::error('error', 'failed');
        }
        return redirect()->back();
    }


    // public function filter(Request $request)
    // {

    //     // dd($request->department_id);

    //     $query = User::query();

    //     if ($request->department_id) {
    //             // $query->whereHas('department', function ($q) use ($request) {
    //             //     $q->where('id', $request->department_id);
    //             // });
    //             $query->where('department_id','=',$request->department_id);
    //         }

    //     if ($request->branch_id) {
    //         $query->whereHas('branch', function ($q) use ($request) {
    //             $q->where('id', $request->branch_id);
    //         });
    //     }
    //     if ($request->name) {

    //         $query->where('name', 'like', '%' . $request->name . '%');

    //     }

    //     $users = $query->latest()->get();

    //   dd( $users);
    // }

    function filter()
    {
        $users = app(Pipeline::class)
            ->send(User::query())
            ->through([

                NameFilter::class,
                DepartmentFilter::class,
                BranchFilter::class,
            ])
            ->thenReturn()
            ->withTrashed()
            ->latest()
            ->paginate()
            ->withQueryString();
        dd($users);
    }
}
