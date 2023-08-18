@section('PageTitle', 'Login')
@extends('layouts.default')
@section('content')
    <!-- Login Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="bi bi-person-circle display-1 text-primary"></i>
                        <h1 class="">Login</h1>
                    </div>
                    <form method="post" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">Signin</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@stop
