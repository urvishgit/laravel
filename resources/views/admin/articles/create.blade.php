@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($article)  ? 'Edit news article' : 'Create news article' }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="p-4" name="article" id="article" method="POST" enctype="multipart/form-data" action="{{ isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.store') }}">
                    @csrf
                    @if(isset($article))
                        @method('PUT')
                    @endif
                    
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="category_id">Category*</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    @if ( old('category_id') == $category->id )
                                        <option value="{{ $category->id }}"selected>{{ $category->title }}</option>
                                    @else
                                        <option value="{{ $category->id }}" {{ isset ($article) && $article->category_id == $category->id ? 'selected': ''}}>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="form-group col-md-6">
                            <label for="tags">Tags*</label>
                            <select class="form-control tag-selector" id="tags" name="tags[]" multiple="multiple">
                                <option value="-1">Select article tags</option>
                                @foreach($tags as $tag)
                                    @if(Request::old('tags'))
                                        @if ( in_array($tag->id ,Request::old('tags')))
                                            <option value="{{ $tag->id }}"selected>{{ $tag->title }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $tag->id }}" {{ isset ($article) && $article->hasTag($tag->id) ? 'selected' : ''}}>{{ $tag->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($article) ? $article->title : old('title') }}">
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.articles.check-slug')}}" />
                        <input type="hidden" name="id" id="id" value="{{ isset ($article) ? $article->id : 0 }}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" row="10" id="description" name="description" placeholder="Description">{{ isset ($article) ? $article->description : old('description')}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" row="10" id="content-ckeditor" name="content" placeholder="Content*">{{ isset ($article) ? $article->content : old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image" value="{{ old('image')}}">
                      <label class="custom-file-label" for="customFile">Choose image*</label>
                    </div>
                    @if(isset($article) && $article->image)
                      <div class="col-12 pl-0 float-left">
                            <div class="col-12 col-md-4 pl-0 py-3">
                                <img title="{{$article->name}}" alt="{{$article->name}}" src="{{ asset('storage/'.$article->image) }}" class="img-fluid" />
                            </div>
                        </div>
                      @endif
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-group pt-3">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="SEO Title" value="{{ isset ($article) ? $article->seo_title : old('seo_title') }}">
                    </div>
                    @error('seo_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" row="10" id="seo_description" name="seo_description" placeholder="SEO Description">{{ isset ($article) ? $article->seo_description : old('seo_description')}}</textarea>
                    </div>
                    @error('seo_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 pt-3">
                            <label for="published_at">Publish At*</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="published_at" name="published_at" placeholder="Publish at" value="{{ isset ($article) ? $article->published_at : old('published_at')}}" />
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
                            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ isset ($article) ? $article->slug : '' }}">
                            @error('slug')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                    </div>

                    @if(isset ($article))

                        <div class="form-row">

                        @if($article->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created By" value="{{$article->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($article->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last Updated By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last Updated By" value="{{$article->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($article) && $article->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($article)  ? 'Edit article' : 'Add article' }}</button>
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