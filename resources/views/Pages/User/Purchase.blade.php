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
                                            Purchase Power

                                        </div>
                                        <div class="small-stats-body">{{ $purchase_power }} {{ $purchase_power_unit }}</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">monetization_on
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Total Cost</div>
                                        <div class="small-stats-body">{{ $purchase_total_cost }}
                                            {{ $purchase_total_cost_unit }}</div>

                                    </div>


                                </div>

                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">ios_share
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">No. of Purchase</div>
                                        <div class="small-stats-body">{{ $purchase_total_number }}</div>
                                    </div>

                                </div>

                            </div>

                            <div class="dashboard-under-content mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="welcome-message-box">
                                            <div class="welcome-head">
                                                <div class="icon">
                                                    <span class="material-icons orange600">sentiment_very_satisfied
                                                    </span>
                                                </div>
                                                <div class="welcome-message text-primary">
                                                    Hello {{ auth()->user()->name }}, Mining Power tailored to you
                                                </div>
                                            </div>

                                            <div class="welcome-para">
                                                See all the statistics related to your purchases and acquire new mining
                                                power, perfectly tailored to you.
                                                Pay directly with Bitcoins or convert your account balance directly to new
                                                mining power.


                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="middle-box-container" style="margin-top: 4em">
                                                <div class="middle-box-inside-box">
                                                    <div class="custom-heading">
                                                        <h5 class="tex-primary" style="color:white">Purchase Mining Power
                                                        </h5>
                                                    </div>
                                                    <div class="description-box">
                                                        <div class="d1">

                                                            Minimum Purchase Price : 0.00000 BTC
                                                        </div>
                                                        <div class="d2">

                                                            Maxmimum Purchase Price : 5.0000 BTC
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="with-draw-box">
                                                    <div class="with-draw-box-inside">
                                                        <div class="text-primary mb-3">
                                                            Choose Your Price
                                                        </div>

                                                        <form method="post" action="{{ route('user.purchase.process') }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <div class="input-group mb-3">


                                                                    <div class="price-input-container">


                                                                        <input type="number" class="price-input"
                                                                            step="0.0001"
                                                                            min="{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(19.11, 'usd', auth()->user()->active_currency) }}"
                                                                            placeholder="Enter price" name="purchase_amount"
                                                                            id="purchase_amount"
                                                                            value="{{ \App\Custom\Helpers\CustomCurrency::convertCurrencyOne(19.11, 'usd', auth()->user()->active_currency) }}">



                                                                        @if ($errors->has('purchase_amount'))
                                                                            <div class="text-danger">
                                                                                {{ $errors->first('purchase_amount') }}
                                                                            </div>
                                                                        @endif
                                                                        <select class="currency-select" name="currency">
                                                                            <option
                                                                                value="{{ auth()->user()->active_currency }}">
                                                                                {{ auth()->user()->active_currency }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5">
                                                                    <div class="title-custom">
                                                                        Power you Purchase
                                                                    </div>
                                                                    <div id="power_get">
                                                                    </div>


                                                                </div>
                                                                <div class="mt-5">
                                                                    <label style="color: var(--primary)">Please Select
                                                                        Payment
                                                                        Method</label>
                                                                </div>
                                                                <div class="radio-button-container mt-3">

                                                                    <div class="radio-button">
                                                                        <input type="radio" id="pay-with-btc"
                                                                            name="payment_method" class="btc"
                                                                            value="btc">
                                                                        <label for="pay-with-btc">Pay with BTC</label>
                                                                    </div>
                                                                    <div class="radio-button">
                                                                        <input type="radio" id="pay-with-my-earning"
                                                                            name="payment_method" value="user_earning"
                                                                            checked>
                                                                        <label for="pay-with-my-earning">Pay with My
                                                                            Earning</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Purchase</button>

                                                                </div>
                                                                <div class="mt-5">
                                                                    <div class="error-message">

                                                                    </div>
                                                                </div>
                                                                <div class="mt-5">
                                                                    Your Earnings:
                                                                    {{ \App\Custom\Helpers\CustomCurrency::convertCurrency(auth()->user()->balance, 'usd', auth()->user()->active_currency) }}


                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="purchase-footer-table-container mt-4">
                                <div class="purchase-table">
                                    <table>

                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th> Payment Method</th>
                                                <th> Date</th>
                                                <th> Price</th>
                                                <th> Currency</th>
                                                <th> Mining Power</th>
                                                <th> Mining Unit</th>
                                                <th> Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchases as $purchase)
                                                <tr>
                                                    <td data-label="Transaction ID">{{ $purchase->transaction_id }}</td>
                                                    <td data-label="Payment Method">{{ $purchase->payment_method }}</td>
                                                    <td data-label="Date">{{ $purchase->created_at }}</td>
                                                    <td data-label="Price">{{ $purchase->price }}</td>
                                                    <td data-label="Currency">{{ $purchase->currency }}</td>
                                                    <td data-label="Mining Power">{{ $purchase->mining_power }}</td>
                                                    <td data-label="Mining Unit">{{ $purchase->mining_unit }}</td>
                                                    <td data-label="Status">{{ $purchase->status }}</td>
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

            .price-input-container {
                display: flex;
                align-items: center;
                justify-content: center;
                /* border: 1px solid #ccc; */
                /* border-radius: 4px; */
            }

            .price-input {
                padding: 10px;
                border: none;
                font-size: 16px;
                flex-grow: 1;
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            .currency-select {
                outline: none;
                padding: 10px;
                border: none;
                font-size: 16px;
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                background: none;
                /* Set the background color to grey */
                color: white;
                /* Set the text color to a dark grey */
            }

            .radio-button-container {
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            .radio-button {
                margin-right: 10px;
            }

            .radio-button input {
                display: none;
            }

            .radio-button label {
                cursor: pointer;
                padding: 5px 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .radio-button input:checked+label {
                background-color: var(--primary);
            }
        </style>
    @endpush

    @push('script')
        <script>
            let amount = document.getElementById('purchase_amount');

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


            // console.log(purchase_amount.value)

            purchase_amount_val = purchase_amount.value;


            power_get.textContent = ((purchase_amount_val / USD_to_BTC_rate) * (1 / 3.05)).toFixed(3) + ' TH / s'
            // console.log(purchase_amount_val / USD_to_BTC_rate);
            purchase_amount.addEventListener("input", (event) => {

                purchase_amount_val = event.target.value;
                // if (purchase_amount_val >= 0.000039) {
                // console.log(purchase_amount_val)

                // }

                // power_get.textContent = (purchase_amount_val * (1 / 3.05)).toFixed(2) + ' TH / s'
                power_get.textContent = ((purchase_amount_val / USD_to_BTC_rate) * (1 / 3.05)).toFixed(3) + ' TH / s'


            });



            // function getMessage() {
            //     $.ajax({
            //         type: 'POST',
            //         url: '/getmsg',
            //         data: '_token = <?php echo csrf_token(); ?>',
            //         success: function(data) {
            //             $("#msg").html(data.msg);
            //         }
            //     });
            // }

            function hello() {
                alert('hello')
            }
        </script>
    @endpush
