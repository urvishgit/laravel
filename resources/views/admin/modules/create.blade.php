@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($module)  ? 'Edit module' : 'Create module' }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="p-4" name="module" id="module" method="POST" enctype="multipart/form-data" action="{{ isset($module) ? route('admin.modules.update', $module->id) : route('admin.modules.store') }}">
                    @csrf
                    @if(isset($module))
                        @method('PUT')
                    @endif
                    
                    <div class="form-row">
                        
                        <div class="form-group col-6">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($module) ? $module->title : old('title') }}">
                            <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.modules.check-slug')}}" />
                            <input type="hidden" name="id" id="id" value="{{ isset ($module) ? $module->id : 0 }}" />
                            @error('title')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="title">Display Name*</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display name" value="{{ isset ($module) ? $module->display_name : old('display_name') }}">
                            @error('display_name')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" row="10" id="description" name="description" placeholder="Description">{{ isset ($module) ? $module->description : old('description')}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="icon">Icon*</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="{{ isset ($module) ? $module->icon : old('icon') }}">
                            @error('icon')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="title">Route*</label>
                            <input type="text" class="form-control" id="route" name="route" placeholder="Route" value="{{ isset ($module) ? $module->route : old('route') }}">
                            @error('route')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="w-100"><label for="trash">Trash*</label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trash" id="trash_yes" value="1"{{ isset ($module) && $module->trash == 1 || old('trash') == 1 ? 'checked': ''}}>
                                <label class="form-check-label pr-2" for="trash_yes">Yes</label>
                                <input class="form-check-input" type="radio" name="trash" id="trash_no" value="0"{{ isset ($module) && $module->trash == 0 || old('trash') == 0 ? 'checked': ''}}>
                                <label class="form-check-label" for="trash_no">No</label>
                            </div>
                            @error('trash')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-6">
                            <div class="form-group col-md-6 pl-0">
                                <div class="w-100"><label for="is_administrator_module">Is this administrator module?*</label></div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_administrator_module" id="is_administrator_module_yes" value="1"{{ isset ($module) && $module->is_administrator_module == 1 || old('is_administrator_module') == 1 ? 'checked': ''}}>
                                    <label class="form-check-label pr-2" for="is_administrator_module_yes">Yes</label>
                                    <input class="form-check-input" type="radio" name="is_administrator_module" id="is_administrator_module_no" value="0"{{ isset ($module) && $module->is_administrator_module == 0 || old('is_administrator_module') == 0 ? 'checked': ''}}>
                                    <label class="form-check-label" for="is_administrator_module_no">No</label>
                                </div>
                                @error('trash')
                                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="title">Trash Route*</label>
                            <input type="text" class="form-control" id="trash_route" name="trash_route" placeholder="Trash route" value="{{ isset ($module) ? $module->trash_route : old('trash_route') }}">
                            @error('trash_route')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category_id">Order*</label>
                            <input type="number" min="1" max="15" class="form-control" id="order" name="order" placeholder="Order" value="{{ isset ($module) ? $module->order : old('order') }}">
                            @error('order')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 pt-3">
                            <label for="published_at">Publish At*</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="published_at" name="published_at" placeholder="Publish at" value="{{ isset ($module) ? $module->published_at : old('published_at')}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @error('published_at')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 pt-3">
                            <label for="slug">Slug*</label>
                            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ isset ($module) ? $module->slug : '' }}">
                            @error('slug')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                    </div>

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($module) && $module->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($module)  ? 'Edit module' : 'Add module' }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection