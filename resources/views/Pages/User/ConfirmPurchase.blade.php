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
                            <div class="confirm-payment-container">
                                <h4 style="color: var(--primary)">Please confirm the payment</h4>
                                <form method="post">
                                    @csrf
                                    <div class="col-md-6 offset-md-3" style="margin:auto;  padding: 20px; color:white">
                                        <div class="panel-heading">
                                            <h1 style="color: white">Pay with cryptocurrency</h1>
                                            <p style="font-style: italic; color:white">to <strong>
                                                    {{ $username }}</strong></p>
                                        </div>
                                        <hr>
                                        <form>
                                            <label for="amount" style="color: white">Amount {{ $rcurrency }}</label>
                                            <h1 style="color:var(--primary)">{{ $result['result']['amount'] }}
                                                {{ $rcurrency }}</h1>
                                            <hr>

                                            <div class="pay-to">
                                                <label>
                                                    Tranfer {{ $result['result']['amount'] }} {{ $rcurrency }} to
                                                    following BITCOIN
                                                    ADDRESS
                                                </label>
                                                <div class="para text-primary">
                                                    {{ $result['result']['address'] }}
                                                </div>


                                            </div>

                                            <hr>

                                            <a href="{{ $result['result']['status_url'] }}"
                                                class="btn btn-primary btn-block" style="color: white">Pay
                                                Now with External Link</a>
                                        </form>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 End -->
    @stop

    @push('script')
        <script>
            let amount = document.getElementById('purchase_amount');

            let power_get = document.getElementById('power_get');


            let purchase_amount_val;

            purchase_amount_val = purchase_amount.value;

            power_get.textContent = (purchase_amount_val * (1 / 3.05)).toFixed(2) + ' TH / s'


            amount.addEventListener("input", (event) => {

                purchase_amount_val = event.target.value;
                power_get.textContent = purchase_amount_val * (1 / 3.05) + ' TH / s'


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
