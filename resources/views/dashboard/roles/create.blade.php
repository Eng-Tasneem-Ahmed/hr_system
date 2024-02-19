@extends('dashboard.layout.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Role</h5>

                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.roles.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname"> Role</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                value="{{ old('name')??'' }}" name="name">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="card-body">
                                <div class="row gy-3">
                                  <div class="col-md">
                                    <small class="text-light fw-medium d-block">Permissions</small>
                                    @foreach ($permissions as $permission)
                                    <div class="form-check form-check-inline mt-3">
                                       
                                        <input class="form-check-input" type="checkbox" id="{{ $permission->id }}" value="{{ $permission->name}}" name="permissions[]" {{ (is_array(old('permissions')) && in_array($permission->name, old('permissions'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                  
                                  </div>
                                 
                                </div>
                              </div>
                            @error('permissions')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
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