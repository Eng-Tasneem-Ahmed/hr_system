@extends('dashboard.layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Vacation</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="row justify-content-end ">
      <div class="col-lg-3 col-sm-6 col-12">

        <div class="demo-inline-spacing">

        </div>
      </div>
    </div>

    <h5 class="card-header">Vacation</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th> Name</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
            <th>Type</th>
            <th>Note</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="vacation">
          @foreach ($vacations as $vacation )

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td> <a href="{{ route('dashboard.users.show',$vacation->user_id) }}">{{ $vacation->user->name}}</a></td>

            <td> {{$vacation->from}}</td>
            <td> {{$vacation->to?$vacation->to:"one day"}}</td>
            <td> <span class="badge {{ $vacation->status->color() }}">{{ $vacation->status->name }}</span></td>
            <td> <span class="badge {{ $vacation->type->color() }}">{{ $vacation->type->name }}</span></td>
            <td>{{ $vacation->not?$vacation->note:"no note" }}</td>
            <td class="d-flex justify-content-between align-items-center">
              <a href="{{ route('dashboard.vacations.accept',$vacation->id) }}" class="btn btn-success">Accept</a>
              <a href="{{ route('dashboard.vacations.reject',$vacation->id) }}" class="btn btn-danger">Reject</a>
            </td>
          </tr>


          @endforeach



        </tbody>
      </table>

      <div class="float-end me-5">
        {{ $vacations->links() }}
      </div>

    </div>
  </div>
  <!--/ Basic Bootstrap Table -->



</div>



@endsection