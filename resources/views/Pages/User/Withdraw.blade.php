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
                {{-- {{ auth()->user()->name }} --}}
                <div class="col-lg-10">
                    <div class="dashboard-content-box">
                        <div class="dashboard-box">
                            <div class="dashboard-stats-boxes mt-4">
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">flash_on
                                        </span></div>
                                    <div class="stats-holder">
                                        <div class="small-stats-title">
                                            Min Payout

                                        </div>
                                        <div class="small-stats-body">0.00001 BTC</div>

                                    </div>

                                </div>
                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">monetization_on
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">Total Paid Out</div>
                                        <div class="small-stats-body">
                                            {{ \App\Custom\Helpers\CustomCurrency::convertCurrency($withdraws_total_amount, auth()->user()->currency, auth()->user()->active_currency) }}
                                        </div>

                                    </div>


                                </div>

                                <div class="dashboard-stats">
                                    <div class="icon"><span class="material-icons orange600">ios_share
                                        </span></div>
                                    <div class="stats-holder">

                                        <div class="small-stats-title">No. of Payouts</div>
                                        <div class="small-stats-body">{{ $withdraws_total }}</div>
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
                                                    Hello {{ auth()->user()->name }}, Transfer your Mined Bitcoins
                                                </div>
                                            </div>

                                            <div class="welcome-para">
                                                Send any amount of Bitcoins of your choice to your personal Bitcoin wallet
                                                address. Of course, it is assumed that you already have your own Bitcoin
                                                address. You can easily create one anywhere within a few seconds. (Consult a
                                                search engine of your choice for detailed help.)


                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="middle-box-container" style="margin-top: 4em">
                                                <div class="middle-box-inside-box">
                                                    <div class="custom-heading">
                                                        <h5 class="tex-primary" style="color:white"> Cash Out Your Mined
                                                            Bitcoins
                                                        </h5>
                                                    </div>
                                                    <div class="description-box">
                                                        <div class="d1">

                                                        </div>
                                                        <div class="d2">

                                                            Before you pay out please check the correctness of your Bitcoin
                                                            wallet address again.
                                                            Due to the way Bitcoin technology works, the withdrawal process
                                                            is irrevocable.
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
                                                            Cash Out
                                                        </div>
                                                        <div class="mt-5">
                                                            Your Earnings:
                                                            {{ \App\Custom\Helpers\CustomCurrency::convertCurrency(auth()->user()->balance, 'usd', auth()->user()->active_currency) }}


                                                        </div>

                                                        <form method="post" action="{{ route('user.withdraw.process') }}">
                                                            @csrf
                                                            <div class="mt-5 mb-3">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Amount" name="with_draw_amount">
                                                                        @if ($errors->has('with_draw_amount'))
                                                                            <div class="text-danger">
                                                                                {{ $errors->first('with_draw_amount') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <select class="form-control" id="inputGroupSelect01"
                                                                        name="currency">
                                                                        <option value="btc">btc</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Wallet Address"
                                                                        name="wallet_address" />
                                                                    @if ($errors->has('wallet_address'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('wallet_address') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="mt-5">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Withdraw</button>

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

                            <div class="withdraw-footer-table-container mt-4">
                                <div class="withdraw-table">
                                    <table>

                                        <thead>
                                            <tr>
                                                <th> Date</th>
                                                <th> Wallet Address</th>
                                                <th> Amount</th>
                                                <th> Currency</th>
                                                <th> Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdraws as $withdraw)
                                                <tr>
                                                    <td data-label="Date">{{ $purchase->created_at }}</td>
                                                    <td data-label="WithDraw Amount">{{ $purchase->amount }}</td>
                                                    <td data-label="Wallet Address">{{ $purchase->wallet_address }}</td>
                                                    <td data-label="Currency">{{ $purchase->currency_type }}</td>
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
        </style>
    @endpush
