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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-box ">
                                        <p>Hello, {{ auth()->user()->name }} You can change settings over here for your
                                            pereference</p>

                                        <form method="POST" action="{{ route('user.update.settings') }}">
                                            @csrf
                                            <div class="input-group-custom">
                                                <label>Default Currency </label>
                                                <select class="currency-select" name="active_currency">
                                                    @if (auth()->user()->active_currency == 'usd')
                                                        <option value="usd" selected>USD</option>
                                                        <option value="btc">BTC</option>
                                                    @elseif (auth()->user()->active_currency == 'btc')
                                                        <option value="usd">USD</option>
                                                        <option value="btc" selected>BTC</option>
                                                    @else
                                                        <option value="usd">USD</option>
                                                        <option value="btc">BTC</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>

                                        </form>
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
