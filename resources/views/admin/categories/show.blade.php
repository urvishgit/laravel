@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Category</h5>
                @if($category)
                  <div class="card-body">
                    <h5 class="card-title">{{$category->title}}</h5>
                    <p class="card-text">{{$category->description}}</p>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
