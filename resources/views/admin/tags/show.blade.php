@extends('../layouts.admin')

@section('admin.content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Tag</h5>
                @if($tag)
                  <div class="card-body">
                    <h5 class="card-title">{{$tag->title}}</h5>
                    <p class="card-text">{{$tag->description}}</p>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
