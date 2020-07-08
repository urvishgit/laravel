@if(count($users) > 0)
  @foreach($users as $user)
    <div class="card-body w-100 float-left row-striped">
      <div class="col-9 float-left pl-0">
        <div class="col-2 pl-0 float-left">
          <img src="{{ Gravatar::src($user->email)}}" width="40" height="40" alt="{{$user->name}}"></div>
        <div class="col-3 float-left">{{ucfirst($user->name)}}</div>
        <div class="col-3 float-left">{{ucfirst($user->role)}}</div>
        <div class="col-2 float-left">
          @if($user->email_varified_at)
            <span class="btn" title="Email Varified"><i class="fas fa-user-tag"></i></span>
          @else
            <span class="btn" title="Email Not Varified"><i class="fas fa-user-times"></i></span>
          @endif
        </div>
        <div class="col-2 float-left">
          @if($user->status == 1)
            <a href="{{ route('admin.users.changeStatus', $user->id) }}" class="btn p-1" title="Make Unpublish"><i class="far fa-check-square"></i></a>
          @else
            <a href="{{ route('admin.users.changeStatus', $user->id) }}" class="btn p-1" title="Make Publish"><i class="far fa-square"></i></a>
          @endif
        </div>
      </div>
      <div class="col-3 float-left px-0  text-right">
          @if( auth()->user()->isadmin() )
            @if(!$user->trashed())
              @if( auth()->user()->isadmin() == 'admin' && $user->role != 'administrator' )
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn p-1" title="Edit"><i class="fa fa-edit"></i></a>

                <span class="float-right">
                  <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn p-1" type="submit" title="Trash"><i class="far fa-trash-alt"></i></button>
                  </form>
                </span>

              @endif
              @if( auth()->user()->isadmin() == 'administrator')
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn p-1" title="Edit"><i class="fa fa-edit"></i></a>

                <span class="float-right">
                  <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn p-1" type="submit" title="Trash"><i class="far fa-trash-alt"></i></button>
                  </form>
                </span>
              @endif
            @else
              @if( auth()->user()->isadmin() == 'administrator')
                <span class="float-right pl-1">
                  <button class="btn p-1 delete-record" data-toggle="modal" data-target="#deleteModal" data-delete-url="/admin/users/{{ $user->id }}" type="button" title="Delete"><i class="far fa-trash-alt"></i></button>
                </span>
              @endif
              <span class="float-right">
                <form method="POST" action="{{ route('admin.restore.user', $user->id) }}">
                  @csrf
                  @method('PUT')
                  <button class="btn p-1" type="submit" title="Restore"><i class="fas fa-trash-restore"></i></button>
                </form>
              </span>
            @endif
          @endif
        
      </div>
    </div>
  @endforeach
  <div class="w-100 p-4 d-flex justify-content-center">
    <div class="float-left col p-0">
      <a href="{{route('admin.users.export')}}" class="btn btn-outline-secondary" title="Export to csv"><i class="fas fa-file-download"></i>&nbsp;&nbsp;Export to csv</a>
    </div>
    <div class="float-right">
      {{ $users->links('../admin.includes.admin_pagination') }}
    </div>
    
  </div>
@else
  <div class="card-body row">
    <div class="col-12">
      <h3 class="text-center">No User yet.</h3>
    </div>
  </div>
@endif