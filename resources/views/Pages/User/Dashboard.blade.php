@section('PageTitle', 'User Dashboard')

@extends('layouts.default')
@section('content')
    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
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
                                            Mining Power

                                        </div>
                                        <div class="small-stats-body">6.00 TH/s</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">monetization_on
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Your Earning</div>
                                        <div class="small-stats-body">10.5 USD</div>

                                    </div>


                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">local_mall
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Purchase Power</div>
                                        <div class="small-stats-body">6.00 TH/s</div>

                                    </div>


                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">ios_share
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Referral Power</div>
                                        <div class="small-stats-body">0.00 KH/s</div>
                                    </div>

                                </div>

                            </div>
                            <div class="invitation-container mt-4">
                                <div class="referral-box">
                                    <div class="referral-label">
                                        Invite you Friends:
                                    </div>
                                    <div class="referral-link">
                                        http://localhost:8000/register?ref='premlamsal'
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-under-content mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="welcome-message-box">
                                            <div class="welcome-head">
                                                <div class="icon">
                                                    <span class="material-icons orange600">sentiment_very_satisfied
                                                    </span>
                                                </div>
                                                <div class="welcome-message text-primary">
                                                    Hello {{ auth()->user()->name }}
                                                </div>
                                            </div>

                                            <div class="welcome-para">
                                                It is a long established fact that a reader will be distracted by the
                                                readable
                                                content of a page when looking at its layout. The point of using Lorem Ipsum
                                                is that
                                                it has a more-or-less normal distribution of letters, as opposed to using
                                                'Content
                                                here, content here', making it look like readable English.
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
