<div class="col-12">
    <div class=" card border-top-0 rounded-top-0">
        <div class="col-10 m-auto">
            <div class="row my-5">
                <div class="w-100">
                    <form action="{{ route('admin.settings.update') }}" class="w-100" method="POST" role="form">
                        @csrf
                        <h3>Site Logo</h3>
                        <hr>
                        <div class="w-100 float-left">
                            <div class="col-12 px-0 float-left">
                                <div class="col-3 pl-0 float-left">
                                    @if (config('settings.site_logo') != null)
                                        <img src="{{ asset('storage/'.config('settings.site_logo')) }}" id="logoImg" title="{{config('settings.site_title')}}" alt="{{config('settings.site_title')}}" style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                                <div class="col-9 pr-0 float-left">
                                    <div class="form-group">
                                        <label class="control-label">Site logo</label>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="site_logo" name="site_logo" value="{{ old('site_logo')}}">
                                          <label class="custom-file-label" for="customFile">Choose site logo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 pt-3 float-left">
                            <div class="col-12 px-0 float-left">
                                <div class="col-3 pl-0 float-left">
                                    @if (config('settings.site_favicon') != null)
                                        <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                                <div class="col-9 pr-0 float-left">
                                    <div class="form-group">
                                        <label class="control-label">Site Favicon</label>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="site_favicon" name="site_favicon" value="{{ old('site_favicon')}}">
                                          <label class="custom-file-label" for="customFile">Choose site favicon</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 float-left mt-2 text-right">
                            <button class="btn btn-primary" type="submit">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    