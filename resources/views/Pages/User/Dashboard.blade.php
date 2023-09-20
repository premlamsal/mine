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
                                            {{ \App\Custom\Helpers\CustomCurrency::prem() }}
                                        </div>
                                        <div class="small-stats-body">{{ auth()->user()->active_mining_power }}
                                            {{ auth()->user()->active_mining_power_unit }}</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">monetization_on
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Your Earning</div>
                                        <div class="small-stats-body">
                                            {{ \App\Custom\Helpers\CustomCurrency::convertCurrency(auth()->user()->balance, auth()->user()->currency, auth()->user()->active_currency) }}

                                        </div>

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
                                    <div class="icon"><span class="material-icons orange600">share
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
                                        http://localhost:8000/registration?ref={{ auth()->user()->unique_user_id }}
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-under-content mt-4">
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-box">
                                            <div class="form-section-input">

                                                <div style="">
                                                    <label class="label">Choose Your Price </label>
                                                </div>
                                                <div class="custom-input-group">
                                                    <div class="custom-input-group-prepend">
                                                        <input type="number" class="custom-form-control" step="0.0001"
                                                            min="{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(19.11, 'usd', auth()->user()->active_currency) }}"
                                                            placeholder="Amount" name="purchase_amount"
                                                            value="{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(19.11, 'usd', auth()->user()->active_currency) }}"
                                                            id="purchase_amount">

                                                    </div>
                                                    <select class="custom-form-control" id="inputGroupSelect01"
                                                        name="period_time">
                                                        <option value="{{ auth()->user()->active_currency }}">
                                                            {{ auth()->user()->active_currency }}
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="form-section-input">

                                                    <div class="title-custom">
                                                        Power you get
                                                    </div>
                                                    <div id="power_get">
                                                        1 TH/s
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-table-container">
                                            <div class="custom-table-box">
                                                <table class="custom-table">
                                                    <tr>
                                                        <th>Unit Costs</th>
                                                        <th>1 TH/s</th>
                                                        {{-- you can fetch from api like usd to usd --}}
                                                        <th>
                                                            {{ \App\Custom\Helpers\CustomCurrency::convertCurrency(3.05, auth()->user()->currency, auth()->user()->active_currency) }}

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>Hourly Profit</td>
                                                        <td>
                                                            <div id="hourly-profit-usd">0.00003 BTC</div>
                                                        </td>
                                                        <td>0.625 %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Daily Profit</td>
                                                        <td>
                                                            <div id="daily-profit-usd">0.00003 BTC</div>
                                                        </td>
                                                        <td>15 %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Weekly Profit</td>
                                                        <td>
                                                            <div id="weekly-profit-usd">0.00003 BTC</div>
                                                        </td>
                                                        <td>105 %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Monthly Profit</td>
                                                        <td>
                                                            <div id="monthly-profit-usd">0.00003 BTC</div>
                                                        </td>
                                                        <td>450 %</td>
                                                    </tr>
                                                    <tfoot>
                                                        <tr>
                                                            <td>Return on Investment</td>
                                                            <td></td>
                                                            <td>65 Days</td>
                                                        </tr>
                                                    </tfoot>
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
        <!-- 404 End -->
    @stop

    @push('style')
        <style>
            select#inputGroupSelect01 {
                background: none;
                color: white;
                border: 0;
                outline: none;
                margin-left: 1em;
            }
        </style>
    @endpush

    @push('script')
        <script>
            let purchase_amount = document.getElementById('purchase_amount');
            let power_get = document.getElementById('power_get');

            let purchase_amount_val;
            let curr =
                "{{ \App\Custom\Helpers\CustomCurrency::convertCurrency(auth()->user()->balance, auth()->user()->currency, auth()->user()->active_currency) }}"
            let USD_to_BTC_rate = 1; //1 default if there is no convertion for active currency
            let check_currency = "{{ auth()->user()->active_currency }}"
            if (check_currency === 'btc') {
                USD_to_BTC_rate =
                    "{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(1, 'USD', 'BTC') }}"
            }
            let temp = "{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(0.000703, 'btc', 'usd') }}";
            console.log(temp);
            //converting usd to btc we multiply usd* current rate btc


            let monthly_profit_usd = document.getElementById('monthly-profit-usd');
            let weekly_profit_usd = document.getElementById('weekly-profit-usd');
            let daily_profit_usd = document.getElementById('daily-profit-usd');
            let hourly_profit_usd = document.getElementById('hourly-profit-usd');

            // console.log(purchase_amount.value)

            purchase_amount_val = purchase_amount.value;

            // // console.log(purchase_amount_val)
            monthly_profit_usd.textContent = (purchase_amount_val * 4.5).toFixed(9); //405%

            weekly_profit_usd.textContent = (purchase_amount_val * 1.05).toFixed(9); //105%
            daily_profit_usd.textContent = (purchase_amount_val * 0.15).toFixed(9); //15%
            hourly_profit_usd.textContent = (purchase_amount_val * 0.00625).toFixed(9); //0.625%  

            power_get.textContent = ((purchase_amount_val / USD_to_BTC_rate) * (1 / 3.05)).toFixed(3) + ' TH / s'
            // console.log(purchase_amount_val / USD_to_BTC_rate);
            purchase_amount.addEventListener("input", (event) => {

                purchase_amount_val = event.target.value;
                // if (purchase_amount_val >= 0.000039) {
                // console.log(purchase_amount_val)
                monthly_profit_usd.textContent = (purchase_amount_val * 4.5).toFixed(9); //405%
                weekly_profit_usd.textContent = (purchase_amount_val * 1.05).toFixed(9); //105%
                daily_profit_usd.textContent = (purchase_amount_val * 0.15).toFixed(9); //15%
                hourly_profit_usd.textContent = (purchase_amount_val * 0.00625).toFixed(9); //0.625%
                // }

                // power_get.textContent = (purchase_amount_val * (1 / 3.05)).toFixed(2) + ' TH / s'
                power_get.textContent = ((purchase_amount_val / USD_to_BTC_rate) * (1 / 3.05)).toFixed(3) + ' TH / s'


            });
        </script>
    @endpush
