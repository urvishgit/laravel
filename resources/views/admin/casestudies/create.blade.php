@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($casestudy)  ? 'Edit casestudy' : 'Create casestudy' }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="p-4" name="casestudy" id="casestudy" method="POST" enctype="multipart/form-data" action="{{ isset($casestudy) ? route('admin.casestudies.update', $casestudy->id) : route('admin.casestudies.store') }}">
                    @csrf
                    @if(isset($casestudy))
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
                                        <option value="{{ $category->id }}" {{ isset ($casestudy) && $casestudy->category_id == $category->id ? 'selected': ''}}>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        


                    </div>

                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ isset ($casestudy) ? $casestudy->title : old('title') }}">
                        <input type="hidden" name="checkSlugUrl" id="checkSlugUrl" value="{{route('admin.casestudies.check-slug')}}" />
                        <input type="hidden" name="id" id="id" value="{{ isset ($casestudy) ? $casestudy->id : 0 }}" />
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" row="10" id="description" name="description" placeholder="Description">{{ isset ($casestudy) ? $casestudy->description : old('description')}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="content">Content*</label>
                        <textarea class="form-control" row="10" id="content-ckeditor" name="content" placeholder="Content">{{ isset ($casestudy) ? $casestudy->content : old('content') }}</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row pt-3">
                        <div class="form-group col-md-6">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image" value="{{ old('image')}}">
                              <label class="custom-file-label" for="customFile">Choose casestudy image*</label>
                            </div>
                            @if(isset($casestudy) && $casestudy->image)
                              <div class="col-12 pl-0 float-left">
                                    <div class="col-12 col-md-4 pl-0 py-3">
                                        <img title="{{$casestudy->name}}" alt="{{$casestudy->name}}" src="{{ asset('storage/'.$casestudy->image) }}" class="img-fluid" />
                                    </div>
                                </div>
                              @endif
                            @error('image')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="company_logo" name="company_logo" value="{{ old('company_logo')}}">
                              <label class="custom-file-label" for="customFile">Choose company logo</label>
                            </div>
                            @if(isset($casestudy) && $casestudy->company_logo)
                              <div class="col-12 pl-0 float-left">
                                    <div class="col-12 col-md-4 pl-0 py-3">
                                        <img title="{{$casestudy->company}}" alt="{{$casestudy->company_logo}}" src="{{ asset('storage/'.$casestudy->company_logo) }}" class="img-fluid" />
                                    </div>
                                </div>
                              @endif
                            @error('company_logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row pt-3">
                        <div class="form-group col-md-6">
                            <label for="casestudy_date">Casestudy date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="casestudy_date" name="casestudy_date" placeholder="Casestudy date" value="{{ isset ($casestudy) ? $casestudy->casestudy_date : old('casestudy_date')}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="casestudy_by">Casestudy by</label>
                            <input type="text" class="form-control" id="casestudy_by" name="casestudy_by" placeholder="Casestudy by" value="{{ isset ($casestudy) ? $casestudy->casestudy_by : old('casestudy_by') }}">
                        </div>
                        @error('casestudy_by')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-row pt-3">
                        <div class="form-group col-md-6">
                            <label for="company">Company</label>
                            <div class='input-group date' id='company'>
                                <input type='text' class="form-control" id="company" name="company" placeholder="Company" value="{{ isset ($casestudy) ? $casestudy->company : old('company')}}" />
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="company_url">Company url</label>
                            <input type="text" class="form-control" id="company_url" name="company_url" placeholder="Company url" value="{{ isset ($casestudy) ? $casestudy->company_url : old('company_url') }}">
                        </div>
                        @error('company_url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                    <div class="form-group pt-3">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="SEO title" value="{{ isset ($casestudy) ? $casestudy->seo_title : old('seo_title') }}">
                    </div>
                    @error('seo_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" row="10" id="seo_description" name="seo_description" placeholder="SEO description">{{ isset ($casestudy) ? $casestudy->seo_description : old('seo_description')}}</textarea>
                    </div>
                    @error('seo_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 pt-3">
                            <label for="published_at">Publish At*</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="published_at" name="published_at" placeholder="Publish at" value="{{ isset ($casestudy) ? $casestudy->published_at : old('published_at')}}" />
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
                            <input type="text" class="form-control" id="slug" name="slug" readonly placeholder="Slug" value="{{ isset ($casestudy) ? $casestudy->slug : '' }}">
                            @error('slug')
                                <div class="mt-3 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                    </div>

                    @if(isset ($casestudy))

                        <div class="form-row">

                        @if($casestudy->createdBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Created By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="created_by" name="created_by" placeholder="Created By" value="{{$casestudy->createdBy->name}}" />
                                </div>
                            </div>
                        @endif
                        
                        @if($casestudy->lastUpdatedBy->name)
                            <div class="form-group col-md-6 pt-3">
                                <label for="published_at">Last Updated By*</label>
                                <div class='input-group'>
                                    <input type='text' readonly="" class="form-control" id="last_updated_by" name="last_updated_by" placeholder="Last Updated By" value="{{$casestudy->lastUpdatedBy->name}}" />
                                </div>
                            </div>
                        @endif

                        </div>
                    @endif

                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($casestudy) && $casestudy->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($casestudy)  ? 'Edit casestudy' : 'Add casestudy' }}</button>
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