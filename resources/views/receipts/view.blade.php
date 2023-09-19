@extends('layouts.app')

@section('title', 'View Receipts')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Receipts Details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Receipts</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Receipts Details</a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">View Receipt Images</h3>
                                </div>

                                <div class="card-body">
                                    <div id="images">
                                        @foreach ($images as $image)
                                            <img src="/{{ $image->path }}" width="200px" alt="Picture 1">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center py-5 px-8 py-md-5 px-md-0">
                        <div class="col-md-9">
                        </div>
                    </div>
                    <!-- end: Invoice body-->
                    <!-- end: Invoice-->
                </div>
            </div>
            <!-- end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection


@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.4/viewer.css"
        integrity="sha512-b94fU39uRUf9usNHmk4XELfdbrkV2qxLwc+QFTbcaZ1KmOQgPQHJLsh5ZadocguSh/cPBClAChSY6L408GGmjg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.4/viewer.js"
        integrity="sha512-xFhwJZh3jKSCty1/n+IofvQTSSME9cTJQEOKKnSkRISbX07aZvEgNcJRjldqu+B8ZoXGxmIfOHmTMRDCIbnCQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        console.log(document.getElementById('images'))
        const gallery = new Viewer(document.getElementById('images'));
    </script>
@endsection
