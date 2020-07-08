@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    {{ isset($tag)  ? 'Edit tag' : 'Create tag' }}
                </h5>
                <form class="p-4" name="tag" id="tag" method="POST" action="{{ isset($tag) ? route('admin.tags.update', $tag->id) : route('admin.tags.store') }}">
                    @csrf
                    @if(isset($tag))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($tag) ? $tag->title : ''}}">
                        <input type="hidden" name="id" id="id" value="{{ isset ($tag) ? $tag->id : 0 }}" />
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.tags.check-slug')}}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="type">Description*</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ isset ($tag) ? $tag->description : ''}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="slug">Slug*</label>
                        <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ isset ($tag) ? $tag->slug : '' }}">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if(isset ($tag))

                        <div class="form-row">

                        @if($tag->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created by" value="{{$tag->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($tag->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last updated by</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last updated by" value="{{$tag->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($tag) && $tag->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($tag)  ? 'Edit tag' : 'Add tag' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
