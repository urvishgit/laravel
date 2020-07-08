@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Casestudy</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($casestudy)
                  <div class="card-body w-100 float-left">
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <h2 class="card-title">{{$casestudy->title}}</h2>
                    </div>
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Category</div>
                        <div class="col-10 float-left">{{$casestudy->category->title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Description</div>
                        <div class="col-10 float-left">{{$casestudy->description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Content</div>
                        <div class="col-10 float-left">{{ strip_tags($casestudy->content) }}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Image</div>
                        <div class="col-10 float-left"><img src="{{asset('storage/'.$casestudy->image)}}" alt="{{$casestudy->title}}" class="img-fluid" /></div>
                    </div>  
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Casestudy Date</div>
                        <div class="col-10 float-left">{{$casestudy->casestudy_date}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Casestudy By</div>
                        <div class="col-10 float-left">{{$casestudy->casestudy_by}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">company</div>
                        <div class="col-10 float-left">{{$casestudy->company}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">company_url</div>
                        <div class="col-10 float-left"><a href="{{$casestudy->company_url}}" target="_blank">{{$casestudy->company_url}}</a></div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Company Logo</div>
                        <div class="col-10 float-left"><img src="{{asset('storage/'.$casestudy->company_logo)}}" alt="{{$casestudy->company}}" class="img-fluid" /></div>
                    </div>                 
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Title</div>
                        <div class="col-10 float-left">{{$casestudy->seo_title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Description</div>
                        <div class="col-10 float-left">{{$casestudy->seo_description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Status</div>
                        <div class="col-10 float-left">
                            @if($casestudy->status == 1)
                                Published
                            @else 
                                Unpublish
                            @endif
                        </div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Published At</div>
                        <div class="col-10 float-left">{{$casestudy->published_at}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Slug</div>
                        <div class="col-10 float-left">{{$casestudy->slug}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Created By</div>
                        <div class="col-10 float-left">{{$casestudy->createdBy->name}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Last Updated By</div>
                        <div class="col-10 float-left">{{$casestudy->lastUpdatedBy->name}}</div>
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
