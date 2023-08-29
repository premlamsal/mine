@section('PageTitle', 'Admin Home')

@extends('Pages.Admin.Layouts.default')
@section('adminContent')

    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Plan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Plans</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">

            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Miner</th>
                                        <th>Price</th>
                                        <th>Speed</th>
                                        <th>Period</th>
                                        <th>Return/Day</th>
                                        <th>Maintenance</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <th>{{ $plan->title }}
                                            </th>
                                            <th>{{ $plan->miner->miner_name }}</th>
                                            <th>{{ $plan->price }}</th>
                                            <th>{{ $plan->speed }} {{ $plan->speed_unit }}</th>
                                            <th>{{ $plan->period }} {{ $plan->period_time }}</th>
                                            <th>{{ $plan->return_amount_per_day }}</th>
                                            <th>{{ $plan->maintenance_cost }} %</th>
                                            <th>

                                                @if ($plan->status)
                                                    <div class="bg-success text-white text-center"
                                                        style="border-radius: 10px"> Active</div>
                                                @else
                                                    <div class="bg-danger text-white text-center br-10"
                                                        style="border-radius: 10px"> Not Active</div>
                                                @endif
                                            </th>
                                            <th>
                                                <a class="btn btn-warning text-white"
                                                    href="{{ route('admin.edit.plan', ['id' => $plan->id]) }}">
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger" href="#">
                                                    Delete
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- end page content-->
    </div>
@stop
