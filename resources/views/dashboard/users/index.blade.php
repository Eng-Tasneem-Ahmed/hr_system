@extends('dashboard.layout.master')
@section('style')
<meta name="csrf-token" content="{!! csrf_token() !!}">
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  
  <div class="row my-2">
    <div class=" col-12 text-end">
      <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-lg px-5">Add</a>
    </div>
  </div>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Employees</h5>
<form  method="POST" id="filter">
  @csrf
  <div class="row px-2 pb-3 align-items-end">

  <div class="mt-2 mb-3 col-md-3">
    <label class="form-label" for="basic-default-fullname"> Name</label>
    <input type="text" class="form-control" id="basic-default-fullname"
        value="{{ old('name')??''}}" name="name">
    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
  <div class="mt-2 mb-3 col-md-3">
    <label for="largeSelect" class="form-label">Debartment</label>
    <select id="largeSelect" class="form-select " name="department_id">
      <option value="{{ null }}">select department</option>
        @foreach ($departments as $department )
        <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
        @error('department_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>
<div class="mt-2 mb-3 col-md-3">
    <label for="largeSelect" class="form-label">Branch</label>
    <select id="largeSelect" class="form-select " name="branch_id">
      <option value="{{ null }}">select branch</option>
        @foreach ($branches as $branch )
        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
        @endforeach
        @error('branch_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>
<div class="mt-2 mb-3 col-md-3">
  <button type="submit" class="btn btn-dark py-3 w-100">Search</button>
</div>
</div>
</form>
    

    
    <div class="table-responsive ">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th> Photo</th>
            <th> Name</th>
            <th> Username</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="users">
          @foreach ($users as $user )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ $user->photo?displayImage($user->photo):displayImage('users/user.jpg') }}" alt="photo"  style="width: 4rem ;height:4rem"> </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td class="d-flex justify-content-between align-items-center">
              <form action="{{ route('dashboard.users.edit',$user->id) }}" mathod="post">
                @csrf
                @method('put')

                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
              <a href="{{route('dashboard.users.show',$user->id) }}" class="btn btn-dark">Show</a>
              @if(!$user->deleted_at)
              <a data-confirm-delete="true" href="{{ route('dashboard.users.destroy',$user->id) }}"
                class="btn btn-danger">Delete</a>
              @else

              <a href="{{ route('dashboard.users.restore',$user->id) }}" class="btn btn-warning">Restore</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="float-end me-5">
        {{ $users->links() }}
      </div>

    </div>
  </div>
  <!--/ Basic Bootstrap Table -->



</div>



@endsection


@section('script')
  


<script>
  $(document).ready(function () {
    console.log('ready')
    $("#filter").submit(function(e)
        {
            e.preventDefault();
            var formData  = new FormData(jQuery('#filter')[0]);
            
             console.log(formData);
            $.ajax({
                url:"{{route('dashboard.users.filter')}}",
                type:"POST",
                data:formData,
                contentType: false,
                processData: false,
                success:function(dataBack)
                {
                   $("#users").html(dataBack);

                }, error: function (xhr, status, error) 
                {
                
                    console.log(xhr.responseJSON.errors);
                   
                }
            })

        })
});

</script>
@endsection