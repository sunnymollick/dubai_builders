<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="text-center">App Settings</h5>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td width="40%">App Name</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->app_name }}</td>
                            </tr>
                            <tr>
                                <td width="40%">App Logo</td>
                                <td width="10%">:</td>
                                <td width="100%"><img src="{{ asset($setting->app_logo) }}" alt=""></td>
                            </tr>
                            <tr>
                                <td width="40%">Email</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->email }}</td>
                            </tr>
                            <tr>
                                <td width="40%">Address</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->address }}</td>
                            </tr>
                            <tr>
                                <td width="40%">Primary Contact</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->phone_1 }}</td>
                            </tr>
                            <tr>
                                <td width="40%">Secondary Contact</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->phone_2 }}</td>
                            </tr>
                            <tr>
                                <td width="40%">Opening Time</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->opening_time }}</td>
                            </tr>
                            <tr>
                                <td width="40%">Footer Text</td>
                                <td width="10%">:</td>
                                <td width="100%">{{ $setting->footer_text }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
