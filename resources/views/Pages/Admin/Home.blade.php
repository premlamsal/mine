@section('PageTitle', 'Admin Home')

@extends('Pages.Admin.Layouts.default')
@section('adminContent')
    <div class="page-header">
        <h3 class="page-title"> Admin Dashboard </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Typography</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="template-dashboard">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Miners</h6>
                                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span> 486</span>
                                            </h2>
                                            <p class="m-b-0">Miners<span class="f-right">351</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Plans</h6>
                                            <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span> 486</span></h2>
                                            <p class="m-b-0">Plans<span class="f-right">351</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Withdraw</h6>
                                            <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span> 486</span>
                                            </h2>
                                            <p class="m-b-0">Withdraw<span class="f-right">351</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Users</h6>
                                            <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span> 486</span>
                                            </h2>
                                            <p class="m-b-0">Users<span class="f-right"> 351</span></p>
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
@stop
