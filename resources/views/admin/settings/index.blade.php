@extends('../admin.layouts.admin')

@section('admin.content')

@include('admin.includes.content_header', ['title' => 'Settings', 'route' => '', 'search' => false])

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#general">General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#site_logo">Site Logo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#footer_seo">Footer & SEO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#social_links">Social Links</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#analytics">Analytics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#payments">Payments</a>
        </li>
      </ul>
    </div>
    
    <div class="tab-content w-100">
      <div class="tab-pane active" id="general">
        @include('admin.settings.includes.general')
      </div>
      <div class="tab-pane fade" id="site_logo">
        @include('admin.settings.includes.logo')
      </div>
      <div class="tab-pane fade" id="footer_seo">
        @include('admin.settings.includes.footer_seo')
      </div>
      <div class="tab-pane fade" id="social_links">
        @include('admin.settings.includes.social_links')
      </div>
      <div class="tab-pane fade" id="analytics">
        @include('admin.settings.includes.analytics')
      </div>
      <div class="tab-pane fade" id="payments">
        @include('admin.settings.includes.payments')
      </div>
    </div>
        
  </div>
</div>
@endsection