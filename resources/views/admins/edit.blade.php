@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Admins</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="text-muted">
                            Edit Admin
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="/admins" class="btn btn-light-primary font-weight-bolder btn-sm">Go Back</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Admin</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="/admins/{{ $admin->id }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Name:</label>
                                        <input name="name" value="{{ $admin->name }}" type="text" class="form-control" placeholder="Enter name" />
                                        <span class="form-text text-muted">Please enter name</span>
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email:</label>
                                        <input required name="email" value="{{ $admin->email }}" type="email" class="form-control" placeholder="Enter email address" />
                                        <span class="form-text text-muted">Please enter email address</span>
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if (Auth::user()->email != $admin->email)
                                        <div class="col-lg-6">
                                            <label>Status:</label>
                                            <div class="checkbox-list">
                                                <label class="checkbox">
                                                    <input type="radio" value="Active" name="status" required {{($admin->status) == 'Active' ? 'checked' : ''}}/>
                                                    <span></span>Active
                                                </label>
                                                <label class="checkbox">
                                                    <input type="radio" value="Inactive" name="status" required {{($admin->status) == 'Inactive' ? 'checked' : ''}}/>
                                                    <span></span>Inactive
                                                </label>
                                            </div>
                                            <span class="form-text text-muted">Please select status</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                        <a href="/admins" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
@endsection
