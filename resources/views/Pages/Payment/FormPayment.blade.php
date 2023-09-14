@section('PageTitle', 'Payment')
@extends('layouts.default')
@section('content')
    <!-- Payment Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">
                        {{-- <i class="bi bi-person-circle display-1 text-light"></i> --}}
                        <h1 class="text-primary">Payment</h1>
                    </div>
                    <form method="post" action="{{ route('process.payment') }}">
                        @csrf

                        <div class="form-group mt-2">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" />
                            @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="d-grid mx-auto mt-4">
                            <button type="submit" class="btn btn-primary">Process</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- payment End -->
@stop
