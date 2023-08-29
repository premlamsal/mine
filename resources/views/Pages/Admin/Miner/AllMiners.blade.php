@section('PageTitle', 'Admin Home')

@extends('Pages.Admin.Layouts.default')
@section('adminContent')

    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Miner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Miners</li>
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
                                        <th>Image</th>
                                        <th>Miner Name</th>
                                        <th>Coin Code</th>
                                        <th>Plans</th>
                                        <th>WithDrawal Limit</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($miners as $miner)
                                        <tr>
                                            <th><img src="{{ Storage::url('imger/' . $miner->image) }}"
                                                    style="width:40px;height:40px" class="" />
                                            </th>
                                            <th>{{ $miner->miner_name }}</th>
                                            <th>{{ $miner->coin_code }}</th>
                                            <th>Plans</th>
                                            <th>{{ $miner->min_withdraw_limit }} - {{ $miner->max_withdraw_limit }}</th>
                                            <th>
                                                <a class="btn btn-warning text-white"
                                                    href="{{ route('admin.edit.miner', ['id' => $miner->id]) }}">
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
