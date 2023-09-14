@section('PageTitle', 'User Dashboard')

@extends('layouts.default')
@section('content')
    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    @include('Pages/User.Partials.LeftDashNav')

                </div>
                <div class="col-lg-10">
                    <div class="dashboard-content-box">
                        <div class="dashboard-box">
                            <div class="dashboard-stats-boxes mt-4">
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">flash_on
                                        </span></div>
                                    <div class="stats-holder">
                                        <div class="small-stats-title">
                                            Referral Power

                                        </div>
                                        <div class="small-stats-body">0.00 KH/s</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">share
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Total Referral</div>
                                        <div class="small-stats-body">400</div>

                                    </div>


                                </div>

                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">qr_code_scanner
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Referral Code</div>
                                        <div class="small-stats-body">xyxankjknk</div>
                                    </div>

                                </div>

                            </div>

                            <div class="dashboard-under-content mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="welcome-message-box">
                                            <div class="welcome-head">

                                                <div class="welcome-message text-primary">
                                                    Referral Scheme
                                                </div>
                                            </div>

                                            <div class="welcome-para text-center">
                                                Refer your friends and earn mining power on their first purchase.


                                            </div>
                                        </div>
                                    </div>
                                    <div class="invitation-container mt-4">
                                        <div class="referral-box">
                                            <div class="referral-label">
                                                Invite you Friends:
                                            </div>
                                            <div class="referral-link">
                                                http://localhost:8000/registration?ref={{ auth()->user()->unique_user_id }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="middle-box-container" style="margin-top: 4em">
                                                <div class="middle-box-inside-box">


                                                </div>

                                            </div>
                                        </div>




                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@stop
