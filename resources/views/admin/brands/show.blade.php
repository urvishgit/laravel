@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Brand</h5>
                @if($brand)
                  <div class="card-body">
                    <h5 class="card-title">{{$brand->title}}</h5>
                    <p class="card-text">{{$brand->description}}</p>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
