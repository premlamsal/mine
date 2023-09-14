@section('PageTitle', 'Admin Home')

@extends('Pages.Admin.Layouts.default')
@section('adminContent')

    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Users</li>
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
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}
                                            </th>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>{{ $user->created_at }}</th>
                                            <th>

                                                @if ($user->status)
                                                    <div class="bg-success text-white text-center"
                                                        style="border-radius: 10px"> Active</div>
                                                @else
                                                    <div class="bg-danger text-white text-center br-10"
                                                        style="border-radius: 10px"> Not Active</div>
                                                @endif
                                            </th>
                                            <th>
                                                <a class="btn btn-warning text-white" href="#">
                                                    Edit
                                                </a>
                                                {{-- <a class="btn btn-warning text-white"
                                                href="{{ route('admin.edit.user', ['id' => $user->id]) }}">
                                                Edit
                                            </a> --}}
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
