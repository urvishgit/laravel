@extends('admin.layouts.admin')

@section('admin.content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to CMS admin area {{auth()->user()->name}}.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
