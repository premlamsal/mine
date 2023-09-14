@section('PageTitle', 'Payment')
@extends('layouts.default')
@section('content')
    <!-- Confirm Payment Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        {{-- <i class="bi bi-person-circle display-1 text-light"></i> --}}
                        <h1 class="text-primary">Confirm the Payment</h1>
                    </div>
                    <form method="post" action="{{ route('process.payment') }}">
                        @csrf
                        <div class="col-md-12 offset-md-3"
                            style="margin:auto; background: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                            <div class="panel-heading">
                                <h1>Pay with cryptocurrency</h1>
                                <p style="font-style: italic;">to <strong> {{ $username }}</strong></p>
                            </div>
                            <hr>
                            <form>
                                <label for="amount">Amount {{ $rcurrency }}</label>
                                <h1>{{ $result['result']['amount'] }} {{ $rcurrency }}</h1>
                                <hr>
                                <a href="{{ $result['result']['status_url'] }}" class="btn btn-success btn-block">Pay
                                    Now</a>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- confirm payment End -->
@stop
