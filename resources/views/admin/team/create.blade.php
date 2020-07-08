@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($team)  ? 'Edit team member' : 'Create team member' }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="p-4" name="team" id="team" method="POST" enctype="multipart/form-data" action="{{ isset($team) ? route('admin.team.update', $team->id) : route('admin.team.store') }}">
                    @csrf
                    @if(isset($team))
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
                                        <option value="{{ $category->id }}" {{ isset ($team) && $team->category_id == $category->id ? 'selected': ''}}>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                    </div>

                    <div class="form-group">
                        <label for="title">Name*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="{{ isset ($team) ? $team->title : old('title') }}">
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.team.check-slug')}}" />
                        <input type="hidden" name="id" id="id" value="{{ isset ($team) ? $team->id : 0 }}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" row="10" id="description" name="description" placeholder="Description">{{ isset ($team) ? $team->description : old('description')}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="content">Content*</label>
                        <textarea class="form-control" row="10" id="content-ckeditor" name="content" placeholder="Content*">{{ isset ($team) ? $team->content : old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image" value="{{ old('image')}}">
                      <label class="custom-file-label" for="customFile">Choose image*</label>
                    </div>
                    @if(isset($team) && $team->image)
                      <div class="col-12 pl-0 float-left">
                            <div class="col-12 col-md-4 pl-0 py-3">
                                <img title="{{$team->name}}" alt="{{$team->name}}" src="{{ asset('storage/'.$team->image) }}" class="img-fluid" />
                            </div>
                        </div>
                      @endif
                    @error('image')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row pt-3">

                        <div class="form-group col-6">
                            <label for="title">Job title*</label>
                            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job title" value="{{ isset ($team) ? $team->job_title : old('job_title') }}">
                            @error('job_title')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="title">Email*</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ isset ($team) ? $team->email : old('email') }}">
                            @error('email')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="title">Telephone</label>
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="Telephone" value="{{ isset ($team) ? $team->tel : old('tel') }}">
                        </div>
                        @error('tel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-6">
                            <label for="title">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ isset ($team) ? $team->mobile : old('mobile') }}">
                        </div>
                        @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="title">Address</label>
                            <textarea class="form-control" row="4" id="address" name="address" placeholder="Address">{{ isset ($team) ? $team->address : old('address')}}</textarea>
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group col-6">
                            <label for="title">Linked in</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linked in profile url" value="{{ isset ($team) ? $team->linkedin : old('linkedin') }}">
                        </div>
                        @error('linkedin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    
                    <div class="form-group pt-3">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="SEO title" value="{{ isset ($team) ? $team->seo_title : old('seo_title') }}">
                    </div>
                    @error('seo_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" row="10" id="seo_description" name="seo_description" placeholder="SEO description">{{ isset ($team) ? $team->seo_description : old('seo_description')}}</textarea>
                    </div>
                    @error('seo_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 pt-3">
                            <label for="published_at">Publish At*</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="published_at" name="published_at" placeholder="Publish at" value="{{ isset ($team) ? $team->published_at : old('published_at')}}" />
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
                            <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ isset ($team) ? $team->slug : '' }}">
                            @error('slug')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(isset ($team))

                        <div class="form-row">

                        @if($team->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created by" value="{{$team->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($team->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last Updated By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last updated by" value="{{$team->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($team) && $team->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($team)  ? 'Edit team member' : 'Add team member' }}</button>
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