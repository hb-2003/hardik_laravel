@extends('user.dashboard.layouts')
@section('title', 'Notification Setting')

@section('css')
@endsection

@section('style')
@endsection

@section('dashboard')
<div class="setting-form">
    <div class="user-data full-width">
        <div class="about-left-heading">
            <h3>Notification Setting</h3>
        </div>
        <div class="noti-sting1">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="noti-all-st">
                        <ul>
                            <li>
                                <div class="noti-st">
                                    <div class="noti-left-t">
                                        Message alert on screen
                                    </div>
                                    <div class="noti-right-b">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-st">
                                    <div class="noti-left-t">
                                        Activity on my posts
                                    </div>
                                    <div class="noti-right-b">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-st">
                                    <div class="noti-left-t">
                                        Someone follows me
                                    </div>
                                    <div class="noti-right-b">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-st">
                                    <div class="noti-left-t">
                                        Update from Goeveni
                                    </div>
                                    <div class="noti-right-b">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                            <label class="custom-control-label" for="customSwitch4"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-st">
                                    <div class="noti-left-t">
                                        Hide my profile from search engine
                                    </div>
                                    <div class="noti-right-b">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                            <label class="custom-control-label" for="customSwitch5"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
