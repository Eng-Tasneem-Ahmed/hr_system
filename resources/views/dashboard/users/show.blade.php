@extends("dashboard.layout.master")
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">


  <div class="row">

    <div class=" col-6 mb-5">
      <div class="card">
        <div class="card-body text-center">

          <div class="mx-auto mb-3">
            <img src="{{ $user->photo?displayImage($user->photo):displayImage('users/user.jpg') }}" alt="Avatar Image"
              class="rounded-circle w-px-100">
          </div>
          <h5 class="mb-1 card-title">{{ $user->name }}</h5>
          <span>{{ $user->department->name }}</span>
          <div class="text-center">
            <a href="{{ route('dashboard.users.edit',$user->id) }}"
              class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user-plus me-1"></i>Edit</a>
          </div>



        </div>
      </div>
    </div>
    <div class=" col-6">
      <!-- About User -->
      <div class="card mb-4">
        <div class="card-body">
          <small class="text-muted text-uppercase">About</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Full
                Name:</span> <span>{{ $user->name }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                class="fw-medium mx-2">Username:</span> <span>{{ $user->username }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                class="fw-medium mx-2">Status:</span> <span class="{{$user->deleted_at?'text-danger':'text-info' }}">{{
                $user->deleted_at?'Deactive':'Active' }}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                class="fw-medium mx-2">Role:</span> <span>Developer</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span
                class="fw-medium mx-2">Branch:</span> <span>{{ $user->branch->name }}</span></li>
          </ul>
          <small class="text-muted text-uppercase">Contacts</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                class="fw-medium mx-2">Contact:</span> <span>{{ $user->phone }}</span></li>

            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                class="fw-medium mx-2">Email:</span> <span>{{ $user->email??'not found' }}</span></li>
          </ul>

        </div>
      </div>
      <!--/ About User -->
    </div>

     <!-- Basic Bootstrap Table -->
     <div class="col-12 mt-3">
      <div class="card">
        <h5 class="card-header">Vacations</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>From</th>
                <th>To</th>
                <th>Status</th>
                <th>Type</th>
                <th>Note</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="vacation">
              @foreach ($user->vacations as $vacation )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{$vacation->from}}</td>
                <td> {{$vacation->to?$vacation->to:"one day"}}</td>
                <td> <span class="badge {{ $vacation->status->color() }}">{{ $vacation->status->name }}</span></td>
                <td> <span class="badge {{ $vacation->type->color() }}">{{ $vacation->type->name }}</span></td>
                <td>{{ $vacation->not?$vacation->note:"no note" }}</td>

              </tr>
              @endforeach

            </tbody>
          </table>


        </div>
      </div>
     </div>
      <!--/ Basic Bootstrap Table -->

  </div>
</div>
@endsection