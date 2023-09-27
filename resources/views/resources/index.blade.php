@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Resource Management</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/admin/documents" class="text-muted">Resources</a>
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
                <a href="/admin/documents/create" class="btn btn-light-primary font-weight-bolder btn-sm">Add
                    Resource</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Todo Files-->
            <div class="d-flex flex-row">
                <!--begin::List-->
                <div class="flex-row-fluid d-flex flex-column ml-lg-8">
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Row-->
                        <div class="row">
                            @foreach ($records as $record)
                                <!--begin::Col-->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b card-stretch">
                                        <div class="card-header border-0">
                                            <h3 class="card-title"></h3>
                                            <div class="card-toolbar">
                                                <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                                    title="Quick actions" data-placement="left">
                                                    <a href="#"
                                                        class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-hor"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                        <!--begin::Navigation-->
                                                        <ul class="navi navi-hover py-5">
                                                            <li class="navi-item">
                                                                <span class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2-document"></i>
                                                                    </span>
                                                                    <span class="navi-text">Total Resource</span>
                                                                    <span class="navi-link-badge">
                                                                        <span
                                                                            class="label label-light-danger label-rounded font-weight-bold">{{ $record->reviews->count() }}</span>
                                                                    </span>
                                                                </span>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="/admin/documents/{{ $record->id }}"
                                                                    class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2-user"></i>
                                                                    </span>
                                                                    <span class="navi-text">View Reviews</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="/admin/documents/{{ $record->id }}/delete"
                                                                    class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2-trash"></i>
                                                                    </span>
                                                                    <span class="navi-text">Delete Resource</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!--end::Navigation-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center">
                                                @if (pathinfo($record->path, PATHINFO_EXTENSION) === 'pdf')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/download.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'png')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/png.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'docx' || pathinfo($record->path, PATHINFO_EXTENSION) === 'docx')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/docx.png" />\
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'jpg' || pathinfo($record->path, PATHINFO_EXTENSION) === 'jpeg')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/png.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'zip')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/zip.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'psd')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/psd.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'xml')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/xml.png" />
                                                    </a>
                                                @elseif (pathinfo($record->path, PATHINFO_EXTENSION) === 'html')
                                                    <a href="{{ $record->path }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/html.png" />
                                                    </a>
                                                @elseif (isset($record->link))
                                                    <a href="{{ $record->link }}" target="_blank">
                                                        <img alt="" class="max-h-65px"
                                                            src="/assets/media/extensions/link_icon.png" />
                                                    </a>
                                                @endif
                                                <!--begin: Title-->
                                                <a href="{{ isset($record->path) ? $record->path : $record->link }}"
                                                    target="_blank"
                                                    class="text-dark-75 font-weight-bold mt-15 font-size-lg">
                                                    {{ $record->name . '.' . pathinfo($record->path, PATHINFO_EXTENSION) }}
                                                </a>
                                                <!--end: Tite-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end:: Card-->
                                </div>
                                <!--end::Col-->
                            @endforeach

                        </div>
                    </div>
                </div>
                <!--end::List-->
            </div>
            <!--end::Todo Files-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('scripts')
    <script src="/assets/js/pages/custom/employee/list-datatable9cd7.js?v=7.1.5"></script>
@endsection
