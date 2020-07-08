@extends('../admin.layouts.admin')

@section('admin.content')

@include('admin.includes.content_header', ['title' => 'Casestudies', 'route' => 'admin.casestudies.create', 'search' => true])

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="w-100 card-header">
          <input type="hidden" name="order" id="order" value="">
          <input type="hidden" name="order-by" id="order-by" value="">
          <input type="hidden" name="page-no" id="page-no" value="">
          <input type="hidden" name="pagination-path" id="pagination-path" value="/{{Route::current()->Uri()}}">
          <div class="col-10 pl-0 float-left data-list">
            <div class="col-3 float-left pl-0 data-ordering" data-order="" data-order-by="title">Title</div>
            <div class="col-2 float-left data-ordering" data-order="" data-order-by="category.title">Category</div>
            <div class="col-2 float-left data-ordering" data-order="" data-order-by="createdBy.name">Created By</div>
            <div class="col-2 float-left data-ordering" data-order="" data-order-by="status">Status</div>
            <div class="col-3 float-left data-ordering" data-order="" data-order-by="updated_at">Last updated at</div>
          </div>
          <div class="col-2 float-left pr-0 text-right">Action</div>
        </div>
        <div class="w-100" id="data">
          @include('admin.casestudies.data', ['casestudies' => $casestudies])
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.includes.admin_delete_model', ['title' => 'Casestudy'])
@endsection