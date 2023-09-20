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
                                        <div class="small-stats-body">{{ $total_referral_power }}</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">share
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Total Referral</div>
                                        <div class="small-stats-body">{{ $total_referral }}</div>

                                    </div>


                                </div>

                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">qr_code_scanner
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Referral Code</div>
                                        <div class="small-stats-body">{{ auth()->user()->unique_user_id }}</div>
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
                                                {{ url('') }}/registration?ref={{ auth()->user()->unique_user_id }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="middle-box-container" style="margin-top: 4em">
                                                <div class="middle-box-inside-box">

                                                    <div class="referrals-footer-table-container mt-4">
                                                        <div class="referrals-table">
                                                            <table>

                                                                <thead>
                                                                    <tr>
                                                                        <th> Date</th>
                                                                        <th> User Referred</th>
                                                                        <th> Mining Power</th>
                                                                        <th> Commission</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($referrals as $referral)
                                                                        <tr>
                                                                            <td data-label="Date">
                                                                                {{ $referral->created_at }}</td>
                                                                            </td>
                                                                            <td data-label="Referred User">
                                                                                {{ $referral->referredUser->name }}</td>
                                                                            </td>

                                                                            <td data-label="Mining Power">
                                                                                {{ $referral->referral_purchased_power }}

                                                                                {{ $referral->referral_purchased_power_unit }}
                                                                            </td>
                                                                            <td data-label="Commission">

                                                                                {{ $referral->referral_commision_power }}
                                                                                {{ $referral->referral_commision_power_unit }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
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
        </div>
    </div>
    <!-- 404 End -->
@stop

@push('style')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #000;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #222;
        }

        @media (max-width: 768px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                display: none;
            }

            table tr {
                margin-bottom: 10px;
                display: block;
                border: 1px solid #333;
            }

            table td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
            }
        }
    </style>
@endpush
