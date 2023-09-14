@section('PageTitle', 'Add New Plan')

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
                        <li class="breadcrumb-item active" aria-current="page">Add New Plan</li>
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
            <div class="col-md-8">
                <div class="card ">




                    <div class="card-header">
                        <h6 class="mb-0 ">Add Plan</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create.plan') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label class="form-label">Miner :</label>
                                        <select class="form-control" name="miner_id">

                                            @foreach ($miners as $miner)
                                                <option value="{{ $miner->id }}">
                                                    {{ $miner->miner_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('plan_name'))
                                            <div class="text-danger">{{ $errors->first('miner_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Title :</label>
                                        <input type="text" class="form-control" placeholder="" name="title">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price :</label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" name="price"
                                                aria-label="price" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    @if ($errors->has('price'))
                                        <div class="text-danger">{{ $errors->first('price') }}</div>
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label">Return Amount Type :</label>
                                        <select name="return_amount_type" class="form-control">
                                            <option value="fixed">
                                                Fixed
                                            </option>
                                            <option value="random">
                                                Random
                                            </option>
                                        </select>
                                        @if ($errors->has('return_amount_type'))
                                            <div class="text-danger">{{ $errors->first('return_amount_type') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Return Amount Per day :</label>
                                        <input type="text" class="form-control" placeholder=""
                                            name="return_amount_per_day">
                                        @if ($errors->has('return_amount_per_day'))
                                            <div class="text-danger">{{ $errors->first('return_amount_per_day') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Speed :</label>




                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input type="text" class="form-control" placeholder="" name="speed">
                                                @if ($errors->has('speed'))
                                                    <div class="text-danger">{{ $errors->first('speed') }}</div>
                                                @endif
                                            </div>
                                            <select class="form-control" id="inputGroupSelect01" name="speed_unit">
                                                <option value="hash/s">hash/s</option>
                                                <option value="mhash/s">mhash/s</option>
                                                <option value="ghash/s">ghash/s</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Period :</label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input type="text" class="form-control" placeholder="" name="period">
                                                @if ($errors->has('period'))
                                                    <div class="text-danger">{{ $errors->first('period') }}</div>
                                                @endif
                                            </div>
                                            <select class="form-control" id="inputGroupSelect01" name="period_time">
                                                <option value="day">Day</option>
                                                <option value="month">Month</option>
                                                <option value="year">Year</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="mb-3">

                                        <label class="form-label">Maintenance Cost :</label>

                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" placeholder=""
                                                name="maintenance_cost" aria-label="price"
                                                aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                        @if ($errors->has('maintenance_cost'))
                                            <div class="text-danger">{{ $errors->first('maintenance_cost') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Features : </label>
                                    <input type="text" class="form-control" data-role="tagsinput"
                                        placeholder="Hit Enter after one keyword" name="features">
                                    @if ($errors->has('features'))
                                        <div class="text-danger">{{ $errors->first('features') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description :</label>
                                    <textarea class="form-control"name="description"></textarea>
                                    @if ($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
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
