@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Team member</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($team)
                  <div class="card-body w-100 float-left">
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <h2 class="card-title">{{$team->title}}</h2>
                    </div>
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Category</div>
                        <div class="col-10 float-left">{{$team->category->title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Description</div>
                        <div class="col-10 float-left">{{$team->description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Content</div>
                        <div class="col-10 float-left">{{ strip_tags($team->content) }}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Image</div>
                        <div class="col-10 float-left"><img src="{{asset('storage/'.$team->image)}}" alt="{{$team->title}}" class="img-fluid" /></div>
                    </div>   

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Job Title</div>
                        <div class="col-10 float-left">{{$team->job_title}}</div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Email</div>
                        <div class="col-10 float-left">@if($team->email)<a href="mailto:{{$team->email}}">{{$team->email}}</a>@endif</div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Telephone</div>
                        <div class="col-10 float-left">@if($team->tel)<a href="tel:{{$team->tel}}">{{$team->tel}}</a>@endif</div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Mobile</div>
                        <div class="col-10 float-left">@if($team->mobile)<a href="tel:{{$team->mobile}}">{{$team->mobile}}</a>@endif</div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Address</div>
                        <div class="col-10 float-left">{{$team->address}}</div>
                    </div>

                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Linked in</div>
                        <div class="col-10 float-left">@if($team->linkedin)<a href="{{$team->linkedin}}" target="_blank">{{$team->linkedin}}</a>@endif</div>
                    </div>                 
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Title</div>
                        <div class="col-10 float-left">{{$team->seo_title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Description</div>
                        <div class="col-10 float-left">{{$team->seo_description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Status</div>
                        <div class="col-10 float-left">
                            @if($team->status == 1)
                                Published
                            @else 
                                Unpublish
                            @endif
                        </div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Published At</div>
                        <div class="col-10 float-left">{{$team->published_at}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Slug</div>
                        <div class="col-10 float-left">{{$team->slug}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Created By</div>
                        <div class="col-10 float-left">{{$team->createdBy->name}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Last Updated By</div>
                        <div class="col-10 float-left">{{$team->lastUpdatedBy->name}}</div>
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
