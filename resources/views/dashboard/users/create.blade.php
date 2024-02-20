@extends('dashboard.layout.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Employee</h5>

                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.users.store') }}" method="POST" class="row"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname"> Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('name')??'' }}" name="name">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname"> Username</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('username')??'' }}" name="username">
                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname"> Salary</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('salary')??'' }}" name="salary">
                            @error('salary')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname"> Phone</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('phone')??'' }}" name="phone">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label">Fron Id Card Photo</label>
                            <input class="form-control" type="file" id="formFile" name="front_id_card_photo">
                            @error('front_id_card_photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label">Back Id Card Photo</label>
                            <input class="form-control" type="file" id="formFile" name="back_id_card_photo">
                            @error('back_id_card_photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mt-2 mb-3 col-md-6">
                            <label for="largeSelect" class="form-label">Debartment</label>
                            <select id="largeSelect" class="form-select form-select-lg" name="department_id">
                                @foreach ($departments as $department )
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                                @error('department_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                        <div class="mt-2 mb-3 col-md-6">
                            <label for="largeSelect" class="form-label">Branch</label>
                            <select id="largeSelect" class="form-select form-select-lg" name="branch_id">
                                @foreach ($branches as $branch )
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                                @error('branch_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname"> Email <small class="text-info ">
                                    *(option)</small></label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('email')??'' }}" name="email">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label"> Photo <small class="text-info ">
                                    *(option)</small></label>
                            <input class="form-control" type="file" id="formFile" name="photo">
                            @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="basic-default-fullname"> Password</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('password')??'' }}" name="password">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      
                        <div class="mt-2 mb-3 col-md-6">
                            <label for="largeSelect" class="form-label">role</label>
                            <select id="largeSelect" class="form-select form-select-lg" name="role">
                                @foreach ($roles as $role )
                                <option value="{{ null }}">no role selected</option>
                                <option value="{{ $role->name}}">{{ $role->name }}</option>
                                @endforeach
                                @error('role')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary px-5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection