<div class="col-12">
    <div class=" card border-top-0 rounded-top-0">
        <div class="col-10 m-auto">
            <div class="row my-5">
                <div class="w-100">
                    <form action="{{ route('admin.settings.update') }}" class="w-100" method="POST" role="form">
                        @csrf
                        <h3>Analytics</h3>
                        <hr>
                        <div class="w-100">
                            <div class="form-group">
                                <label class="control-label" for="google_analytics">Google Analytics Code</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter google analytics code"
                                    id="google_analytics"
                                    name="google_analytics"
                                >{!! Config::get('settings.google_analytics') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook_pixels">Facebook Pixel Code</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter facebook pixel code"
                                    id="facebook_pixels"
                                    name="facebook_pixels"
                                >{{ Config::get('settings.facebook_pixels') }}</textarea>
                            </div>
                        </div>
                        <div class="w-100 mt-2 text-right">
                            <button class="btn btn-primary" type="submit">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
