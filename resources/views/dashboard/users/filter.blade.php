
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