@extends('dashboard.layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y"> 
  
    <div class="card">
    <div class="row justify-content-between align-items-center card-header " >
  <div class="col-6"><h5>roles</h5></div>
  <div class="col-6 text-end">
<a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary btn-lg">Add</a>
</div> 
</div>
    
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th> Name</th>
            
        
              <th >Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0" id="role">
           @foreach ($roles as $role )

           <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
           
            
            
            <td class="">
              <form action="{{ route('dashboard.roles.edit',$role->id) }}" mathod="post">
                  @csrf
                  @method('put')

                  <button type="submit" class="btn btn-info">Edit</button>
              </form>
            
            </td>
          </tr>
               

           @endforeach
          
          
            
          </tbody>
        </table>

    

      </div>
    </div>
    <!--/ Basic Bootstrap Table -->

   
   
  </div>

     

@endsection

