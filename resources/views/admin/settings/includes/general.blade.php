<div class="col-12">
    <div class=" card border-top-0 rounded-top-0">
        <div class="col-10 m-auto">
            <div class="row my-5">
                <div class="w-100">
                    <form action="{{ route('admin.settings.update') }}" class="w-100" method="POST" role="form">
                        @csrf
                        <h3>General Settings</h3>
                        <hr>
                        <div class="w-100">
                            <div class="form-group">
                                <label class="control-label" for="site_name">Site Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Site name"
                                    id="site_name"
                                    name="site_name"
                                    value="{{ config('settings.site_name') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="site_title">Site Title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Site title"
                                    id="site_title"
                                    name="site_title"
                                    value="{{ config('settings.site_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="default_email_address">Default Email Address</label>
                                <input
                                    class="form-control"
                                    type="email"
                                    placeholder="Store/Site default email address"
                                    id="default_email_address"
                                    name="default_email_address"
                                    value="{{ config('settings.default_email_address') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="currency_code">Currency Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Store currency code"
                                    id="currency_code"
                                    name="currency_code"
                                    value="{{ config('settings.currency_code') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="currency_symbol">Currency Symbol</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Store currency symbol"
                                    id="currency_symbol"
                                    name="currency_symbol"
                                    value="{{ config('settings.currency_symbol') }}"
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