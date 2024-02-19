@extends('dashboard.layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="card">

<div class="row justify-content-between align-items-center card-header " >
  <div class="col-6"><h5>Departments</h5></div>
  <div class="col-6 text-end">
<a href="{{ route('dashboard.departments.create') }}" class="btn btn-primary btn-lg">Add</a>
</div> 
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th> Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="department">
          @foreach ($departments as $department )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $department->name }}</td>
            <td class="d-flex justify-content-between align-items-center">
              <form action="{{ route('dashboard.departments.edit',$department->id) }}" mathod="post">
                @csrf
                @method('put')

                <button type="submit" class="btn btn-info">Edit</button>
              </form>
              @if(!$department->deleted_at)
              <a data-confirm-delete="true" href="{{ route('dashboard.departments.destroy',$department->id) }}"
                class="btn btn-danger">Delete</a>
              @else

              <a href="{{ route('dashboard.departments.restore',$department->id) }}" class="btn btn-warning">Restore</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="float-end me-5">
        {{ $departments->links() }}
      </div>

    </div>
  </div>
  <!--/ Basic Bootstrap Table -->



</div>



@endsection