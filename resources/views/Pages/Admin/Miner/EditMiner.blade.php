@section('PageTitle', 'Edit New Miner')

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
                        <li class="breadcrumb-item active" aria-current="page">Edit Miner</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary">Settings</button>
                    <button type="button"
                        class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="fs-3 text-warning"><ion-icon name="warning-sharp" role="img" class="md hydrated"
                                    aria-label="warning sharp"></ion-icon>
                            </div>
                            <div class="ms-3">
                                <div class="text-warning"> {!! implode('', $errors->all('<div>:message</div>')) !!}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row ">

            <div class="col-md-6">
                <div class="card ">




                    <div class="card-header">
                        <h6 class="mb-0 ">Edit Miner</h6>
                    </div>
                    <div class="card-body">



                        <form method="POST" action="{{ route('admin.update.miner') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Miner Name:</label>
                                <input type="hidden" class="form-control" name="miner_id" value="{{ $miner->id }}">
                                <input type="text" class="form-control" placeholder="Bitcoin" name="miner_name"
                                    value="{{ $miner->miner_name }}">
                                @if ($errors->has('miner_name'))
                                    <div class="text-danger">{{ $errors->first('miner_name') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Coin Name:</label>
                                <input type="text" class="form-control" placeholder="BTC" name="coin_code"
                                    value="{{ $miner->coin_code }}">
                                @if ($errors->has('coin_code'))
                                    <div class="text-danger">{{ $errors->first('coin_code') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Min WithDrawal Limit:</label>
                                <input type="text" class="form-control" placeholder="10" name="min_withdraw_limit"
                                    value="{{ $miner->min_withdraw_limit }}">
                                @if ($errors->has('min_withdraw_limit'))
                                    <div class="text-danger">{{ $errors->first('min_withdraw_limit') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Max WithDrawal Limit:</label>
                                <input type="text" class="form-control" placeholder="1000" name="max_withdraw_limit"
                                    value="{{ $miner->max_withdraw_limit }}">
                                @if ($errors->has('max_withdraw_limit'))
                                    <div class="text-danger">{{ $errors->first('max_withdraw_limit') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">

                                <img src="{{ Storage::url('imger/' . $miner->image) }}" style="width:100px;height:100px"
                                    class="" />
                            </div>
                            <div class="mb-3">


                                <label class="form-label">Image:</label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end page content-->
    </div>
@stop
