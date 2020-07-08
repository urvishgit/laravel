<div class="col-12">
    <div class=" card border-top-0 rounded-top-0">
        <div class="col-10 m-auto">
            <div class="row my-5">
                <div class="w-100">
                    <form action="{{ route('admin.settings.update') }}" class="w-100" method="POST" role="form">
                        @csrf
                        <h3>Footer &amp; SEO</h3>
                        <hr>
                        <div class="w-100">
                            <div class="form-group">
                                <label class="control-label" for="footer_copyright_text">Footer copyright text</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Footer copyright text"
                                    id="footer_copyright_text"
                                    name="footer_copyright_text"
                                >{{ config('settings.footer_copyright_text') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="seo_meta_title">SEO meta title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Seo meta title for site"
                                    id="seo_meta_title"
                                    name="seo_meta_title"
                                    value="{{ config('settings.seo_meta_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="seo_meta_description">SEO meta description</label>
                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Seo meta description for site"
                                    id="seo_meta_description"
                                    name="seo_meta_description"
                                >{{ config('settings.seo_meta_description') }}</textarea>
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
