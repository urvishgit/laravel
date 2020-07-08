@if(session()->has('success'))
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-12 pt-4">
            <div class="alert alert-success">
                {{ session()->get('success')}}      
            </div>
        </div>
    </div>
</div>
@endif

@if(session()->has('error'))
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-12 pt-4">
            <div class="alert alert-danger">
                {{ session()->get('error')}}      
            </div>
        </div>
    </div>
</div>
@endif