@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Module</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($module)
                  <div class="card-body w-100 float-left">
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <h2 class="card-title">{{$module->title}}</h2>
                    </div>
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Display name</div>
                        <div class="col-10 float-left">{{$module->display_name}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Description</div>
                        <div class="col-10 float-left">{{$module->description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Icon</div>
                        <div class="col-10 float-left"><i class="{{$module->icon}}"></i></div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Route</div>
                        <div class="col-10 float-left">{{$module->route}}</div>
                    </div>                    

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Trash</div>
                        <div class="col-10 float-left">
                            @if($module->trash == 1)
                                Yes
                            @else 
                                No
                            @endif
                        </div>
                    </div>                    
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Trash route</div>
                        <div class="col-10 float-left">{{$module->trash_route}}</div>
                    </div>  

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Order</div>
                        <div class="col-10 float-left">{{$module->order}}</div>
                    </div>  
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Is this module is only for administrator</div>
                        <div class="col-10 float-left">
                            @if($module->is_administrator_module == 1)
                                Yes
                            @else 
                                No
                            @endif
                        </div>
                    </div>    

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Status</div>
                        <div class="col-10 float-left">
                            @if($module->status == 1)
                                Published
                            @else 
                                Unpublish
                            @endif
                        </div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Published At</div>
                        <div class="col-10 float-left">{{$module->published_at}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Slug</div>
                        <div class="col-10 float-left">{{$module->slug}}</div>
                    </div>
                    <div class="col-12 float-left py-3"><a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
