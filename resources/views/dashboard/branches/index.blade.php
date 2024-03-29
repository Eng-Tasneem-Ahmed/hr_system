@extends('dashboard.layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y"> 
  
    <div class="card">
    <div class="row justify-content-between align-items-center card-header " >
  <div class="col-6"><h5>Branches</h5></div>
  <div class="col-6 text-end">
<a href="{{ route('dashboard.branches.create') }}" class="btn btn-primary btn-lg">Add</a>
</div> 
</div>
    
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th> Name</th>
              <th>Location</th>
        
              <th >Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0" id="branch">
           @foreach ($branches as $branch )

           <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $branch->name }}</td>
           
            <td> {{$branch->location}}</td>
            
            <td class="d-flex justify-content-between align-items-center">
              <form action="{{ route('dashboard.branches.edit',$branch->id) }}" mathod="post">
                  @csrf
                  @method('put')

                  <button type="submit" class="btn btn-info">Edit</button>
              </form>
              @if(!$branch->deleted_at)
              <a  data-confirm-delete="true" href="{{ route('dashboard.branches.destroy',$branch->id) }}" class="btn btn-danger">Delete</a>
              @else
 
              <a   href="{{ route('dashboard.branches.restore',$branch->id) }}" class="btn btn-warning">Restore</a>
              @endif
            </td>
          </tr>
               

           @endforeach
          
          
            
          </tbody>
        </table>

       <div class="float-end me-5">
        {{ $branches->links() }}
       </div>

      </div>
    </div>
    <!--/ Basic Bootstrap Table -->

   
   
  </div>

     

@endsection

