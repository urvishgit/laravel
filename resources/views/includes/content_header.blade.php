<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  	@if($title)
    	<h1 class="h2">{{$title}}</h1>
    @endif

    <div class="btn-toolbar mb-2 mb-md-0">

      @if($search)
          <div class="input-group float-left mr-3">
            <label for="q" class="col-3 col-form-label">Search</label>
            <input type="text" class="form-control" placeholder="For search just start type" name="q" id="q">
          </div>
      @endif
    
        <div class="btn-group mr-2">
        	@if($route)
          	<a class="btn btn-outline-secondary" href="{{route($route)}}">Add</a>
          @endif
        </div>
    </div>
  </div>
</div>