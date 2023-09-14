@extends('layouts.app')

@section('title', 'Resources')

@section('content')
   <!--begin::Subheader-->
   <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">Intake Details</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Intakes</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Intake Details</a>
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
            {{-- <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Download</a> --}}
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
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 mt-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">Intake Details</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">

                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    <span class="font-weight-bold">{{ $admin->name }}</span>
                                </span>
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    {{-- <span>{{ $intake->email }}</span> --}}
                                    {{-- <span>{{ $intake->phone }}</span> --}}
                                </span>
                            </div>
                        </div>
                        {{-- <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <h6 class="display-7 font-weight-boldest mb-5">Personal Information</h6>
                        </div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Language</span>
                                <span class="opacity-70">{{ $intake->language }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Gender</span>
                                <span class="opacity-70">{{ $intake->gender }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Age</span>
                                <span class="opacity-70">{{ $intake->age }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Street Address</span>
                                <span class="opacity-70">{{ $intake->address_1 }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Street Address Line 2</span>
                                <span class="opacity-70">{{ $intake->address_2 }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">City.</span>
                                <span class="opacity-70">{{ $intake->city }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">State / Province</span>
                                <span class="opacity-70">{{ $intake->state }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Postal Code</span>
                                <span class="opacity-70">{{ $intake->postal_code }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- end: Invoice header-->
              
                <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

