@extends('backend.layouts.defaults')
@section('title')
Profile
@endsection
@section('content')

    <!--breadcrumb-->
    <div
        class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.index') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Admin Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex flex-column align-items-center text-center">
                                <img
                                    src="{{asset('backend')}}/images/avatars/admin.png"
                                    alt="Admin"
                                    class="rounded-circle p-1 bg-primary"
                                    width="110">
                                <div class="mt-3">
                                    <h4>{{ $admin_info -> name}}</h4>
                                    <p
                                        class="text-secondary mb-1">Owner & CEO</p>
                                    <p class="text-muted font-size-sm">
                                        {{ $admin_info->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{ route('admin.editProfile') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div
                                        class="col-sm-9 text-secondary">
                                        <input type="text"
                                            class="form-control" name="name"
                                            value="{{ $admin_info -> name}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div
                                        class="col-sm-9 text-secondary">
                                        <input type="text"
                                            class="form-control" name="email"
                                            value="{{ $admin_info -> email}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div
                                        class="col-sm-9 text-secondary">
                                        <input type="text"
                                            class="form-control" name="password"
                                            value="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary px-4"
                                        >Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
