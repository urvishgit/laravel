@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    {{ isset($category)  ? 'Edit category' : 'Create category' }}
                </h5>
                <form class="p-4" name="category" id="category" method="POST" action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}">
                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($category) ? $category->title : ''}}">
                        <input type="hidden" name="id" id="id" value="{{ isset ($category) ? $category->id : 0 }}" />
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.categories.check-slug')}}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="type">Type*</label>
                        <select class="form-control" id="type" name="type">
                            <option value="">Select category type</option>
                            <option value="article" {{ isset ($category) && $category->type == 'article' ? 'selected' : '' }}>Article</option>
                            <option value="casestudy" {{ isset ($category) && $category->type == 'casestudy' ? 'selected' : '' }}>Casestudy</option>
                            <option value="team" {{ isset ($category) && $category->type == 'team' ? 'selected' : '' }}>Team</option>
                            <option value="product" {{ isset ($category) && $category->type == 'product' ? 'selected' : '' }}>Product</option>
                        </select>
                    </div>
                    @error('type')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="type">Description*</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ isset ($category) ? $category->description : ''}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ isset ($category) ? $category->slug : '' }}">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if(isset ($category))

                        <div class="form-row">

                        @if($category->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created by" value="{{$category->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($category->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last updated by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last updated by" value="{{$category->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($category) && $category->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($category)  ? 'Edit category' : 'Add category' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
