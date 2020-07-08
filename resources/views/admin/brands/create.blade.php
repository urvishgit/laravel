@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    {{ isset($brand)  ? 'Edit brand' : 'Create brand' }}
                </h5>
                <form class="p-4" name="brand" id="brand" method="POST" enctype="multipart/form-data" action="{{ isset($brand) ? route('admin.brands.update', $brand->id) : route('admin.brands.store') }}">
                    @csrf
                    @if(isset($brand))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($brand) ? $brand->title : ''}}">
                        <input type="hidden" name="id" id="id" value="{{ isset ($brand) ? $brand->id : 0 }}" />
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.brands.check-slug')}}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    

                    <div class="form-group">
                        <label for="type">Description*</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ isset ($brand) ? $brand->description : ''}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="slug">Logo</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="logo" name="logo" value="{{ old('logo')}}">
                              <label class="custom-file-label" for="customFile">Choose logo*</label>
                            </div>
                            @if(isset($brand) && $brand->logo)
                              <div class="col-12 pl-0 float-left">
                                    <div class="col-12 col-md-4 pl-0 py-3">
                                        <img title="{{$brand->title}}" alt="{{$brand->title}}" src="{{ asset('storage/'.$brand->logo) }}" class="img-fluid" />
                                    </div>
                                </div>
                              @endif
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ isset ($brand) ? $brand->slug : '' }}">
                        </div>
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if(isset ($brand))

                        <div class="form-row">

                        @if($brand->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created by" value="{{$brand->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($brand->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last updated by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last updated by" value="{{$brand->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($brand) && $brand->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($brand)  ? 'Edit brand' : 'Add brand' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
