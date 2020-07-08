@if(count($modules) > 0)
  @foreach($modules as $module)
    <div class="card-body w-100 float-left row-striped">
      <div class="col-11 float-left pl-0">
        <div class="col-3 pl-0 float-left">
          <a href="{{ route('admin.modules.show', $module->id) }}">{{$module->title}}</a>
        </div>
        <div class="col-3 float-left">
          {{$module->route }}
        </div>
        <div class="col-2 float-left">
          @if($module->trash == 1)
          Yes
          @else
            No
          @endif
        </div>
        <div class="col-2 float-left">
          @if($module->status == 1)
            <a href="{{ route('admin.modules.changeStatus', $module->id) }}" class="btn p-1" title="Make Unpublish"><i class="far fa-check-square"></i></a>
          @else
            <a href="{{ route('admin.modules.changeStatus', $module->id) }}" class="btn p-1" title="Make Publish"><i class="far fa-square"></i></a>
          @endif
        </div>
        <div class="col-2 float-left">
          {{$module->updated_at}}
        </div>
      </div>
      <div class="col-1 float-left px-0  text-right">

          @if(!$module->trashed())
            <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn p-1" title="Edit"><i class="fa fa-edit"></i></a>
            
            <span class="float-right">
              <form method="POST" action="{{ route('admin.modules.destroy', $module->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn p-1" type="submit" title="Trash"><i class="far fa-trash-alt"></i></button>
              </form>
            </span>
          @else
            <span class="float-right pl-1">
              <button class="btn p-1 delete-record" data-toggle="modal" data-target="#deleteModal" data-delete-url="/admin/modules/{{ $module->id }}" type="button" title="Delete"><i class="far fa-trash-alt"></i></button>
            </span>

            <span class="float-right">
              <form method="POST" action="{{ route('admin.restore.module', $module->id) }}">
                @csrf
                @method('PUT')
                <button class="btn p-1" type="submit" title="Restore"><i class="fas fa-trash-restore"></i></button>
              </form>
            </span>
          @endif
      </div>
    </div>
  @endforeach
  <div class="w-100 p-4 d-flex justify-content-center">
    <div class="float-left col p-0">
      <a href="{{route('admin.modules.export')}}" class="btn btn-outline-secondary" title="Export to csv"><i class="fas fa-file-download"></i>&nbsp;&nbsp;Export to csv</a>
    </div>
    <div class="float-right">
      {{ $modules->links('../admin.includes.admin_pagination') }}
    </div>
  </div>
@else
  <div class="card-body w-100">
    <div class="col-12">
      <h3 class="text-center">No module yet.</h3>
    </div>
  </div>
@endif