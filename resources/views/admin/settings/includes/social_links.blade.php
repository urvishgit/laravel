<div class="col-12">
    <div class=" card border-top-0 rounded-top-0">
        <div class="col-10 m-auto">
            <div class="row my-5">
                <div class="w-100">
                    <form action="{{ route('admin.settings.update') }}" class="w-100" method="POST" role="form">
                        @csrf
                        <h3>Social Links</h3>
                        <hr>
                        <div class="w-100">
                            <div class="form-group">
                                <label class="control-label" for="social_facebook">Facebook profile</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Facebook profile link"
                                    id="social_facebook"
                                    name="social_facebook"
                                    value="{{ config('settings.social_facebook') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="social_twitter">Twitter profile</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Twitter profile link"
                                    id="social_twitter"
                                    name="social_twitter"
                                    value="{{ config('settings.social_twitter') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="social_instagram">Instagram profile</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Instagram profile link"
                                    id="social_instagram"
                                    name="social_instagram"
                                    value="{{ config('settings.social_instagram') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="social_linkedin">LinkedIn profile</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Linkedin profile link"
                                    id="social_linkedin"
                                    name="social_linkedin"
                                    value="{{ config('settings.social_linkedin') }}"
                                />
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
