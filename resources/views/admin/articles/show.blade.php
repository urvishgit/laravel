@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Article</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($article)
                  <div class="card-body w-100 float-left">
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <h2 class="card-title">{{$article->title}}</h2>
                    </div>
                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Category</div>
                        <div class="col-10 float-left">{{$article->category->title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Tags</div>
                        <div class="col-10 float-left"></div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Description</div>
                        <div class="col-10 float-left">{{$article->description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Content</div>
                        <div class="col-10 float-left">{{ strip_tags($article->content) }}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Image</div>
                        <div class="col-10 float-left"><img src="{{asset('storage/'.$article->image)}}" alt="{{$article->title}}" class="img-fluid" /></div>
                    </div>                    
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Title</div>
                        <div class="col-10 float-left">{{$article->seo_title}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">SEO Description</div>
                        <div class="col-10 float-left">{{$article->seo_description}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Status</div>
                        <div class="col-10 float-left">
                            @if($article->status == 1)
                                Published
                            @else 
                                Unpublish
                            @endif
                        </div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Published At</div>
                        <div class="col-10 float-left">{{$article->published_at}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Slug</div>
                        <div class="col-10 float-left">{{$article->slug}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Created By</div>
                        <div class="col-10 float-left">{{$article->createdBy->name}}</div>
                    </div>
                    <div class="col-12 float-left py-2 pl-0 row-striped">
                        <div class="col-2 float-left">Last Updated By</div>
                        <div class="col-10 float-left">{{$article->lastUpdatedBy->name}}</div>
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
