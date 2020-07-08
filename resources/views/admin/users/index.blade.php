@extends('../admin.layouts.admin')

@section('admin.content')

@if(auth()->user()->isAdmin())
  @include('admin.includes.content_header', ['title' => 'Users', 'route' => 'admin.users.create', 'search' => true, 'search_route' => 'admin.users.search'])
@else
  @include('admin.includes.content_header', ['title' => 'Users', 'route' => ''])
@endif

<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="w-100 card-header">
                <input type="hidden" name="order" id="order" value="">
                <input type="hidden" name="order-by" id="order-by" value="">
                <input type="hidden" name="page-no" id="page-no" value="">
                <input type="hidden" name="pagination-path" id="pagination-path" value="/{{Route::current()->Uri()}}">
                <div class="col-9 pl-0 float-left data-list">
                  <div class="col-2 float-left pl-0">Image</div>

                  <div class="col-3 float-left data-ordering" data-order="" data-order-by="name">Name</div>

                  <div class="col-3 float-left data-ordering" data-order="" data-order-by="role">Role</div>

                  <div class="col-2 float-left data-ordering" data-order="" data-order-by="email_verified_at">Varified</div>

                  <div class="col-2 float-left data-ordering" data-order="" data-order-by="status">Status</div>

                </div>
                <div class="col-3 float-left text-right">Action</div>
              </div>
              <div class="w-100" id="data">
                @include('admin.users.data', ['users' => $users])
              </div>

              
          </div>
      </div>
  </div>
</div>
@include('admin.includes.admin_delete_model', ['title' => 'User'])
@endsection