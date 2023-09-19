@section('PageTitle', 'Register')

@extends('layouts.default')
@section('content')
    <!-- Register Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="bi bi-person-circle display-1 text-light"></i>
                        <h1 class="text-primary">Register</h1>
                    </div>
                    <form method="POST" action="{{ route('register.custom') }}">
                        @csrf



                        @if (isset($user_name))
                            <div class="referral-information">
                                <div class="referral-information mb-3">
                                    You are under referral of {{ $user_name }}
                                    <input type="hidden" class="form-control" name="ref_id" value="{{ $user_unique_id }}">
                                </div>
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                required autofocus>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email_address" class="form-control" name="email"
                                required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Bitcoin Address (Optional)" id="bitcoin_address"
                                class="form-control" name="bitcoin_address">
                            @if ($errors->has('bitcoin_address'))
                                <span class="text-danger">{{ $errors->first('bitcoin_address') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember Me</label>
                            </div>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@stop
