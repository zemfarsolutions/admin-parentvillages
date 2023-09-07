@extends('layouts.app')

@section('title', 'View Applicants Form')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Application Details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="/scholarships" class="text-muted">Scholarship</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/applicants" class="text-muted">Applicant Details</a>
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
                <a href="/applicants" class="btn btn-light-primary font-weight-bolder btn-sm">Go back</a>
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
                                <h1 class="display-4 font-weight-boldest mb-10">Application Details</h1>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <span class="d-flex flex-column align-items-md-end opacity-70">
                                        <span class="font-weight-bold">{{ $userapplication->user->name }}</span>
                                    </span>
                                    <span class="d-flex flex-column align-items-md-end opacity-70">
                                        <span>{{ $userapplication->user->email }}</span>
                                        <span>{{ $userapplication->phone }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="border-bottom w-100"></div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center py-5 px-8 py-md-5 px-md-0">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between pt-6">
                                <h6 class="display-7 font-weight-boldest mb-5">Scholarship Information</h6>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Short Description</span>
                                    <span class="opacity-70">{{ $userapplication->scholarship->short_description }}</span>
                                </div>
                            </div>
                          
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Description</span>
                                    <span class="opacity-70">{{ $userapplication->scholarship->full_description  }}</span>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Event Time</span>
                                    <span class="opacity-70">{{ $userapplication->scholarship->event_date }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Dead Line</span>
                                    <span class="opacity-70">{{ $userapplication->scholarship->deadline }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                </div>
                            </div>
                            <div class="border-bottom w-100 mt-5"></div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between pt-6">
                                <h6 class="display-7 font-weight-boldest mb-5">Personal Information</h6>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Name</span>
                                    <span class="opacity-70">{{ $userapplication->name }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Email</span>
                                    <span class="opacity-70">{{ $userapplication->email }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Date</span>
                                    <span class="opacity-70">{{ $userapplication->date }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Address</span>
                                    <span class="opacity-70">{{ $userapplication->address }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Appartment</span>
                                    <span class="opacity-70">{{ $userapplication->appartment }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">City</span>
                                    <span class="opacity-70">{{ $userapplication->city }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">State / Province</span>
                                    <span class="opacity-70">{{ $userapplication->state }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Postal Code</span>
                                    <span class="opacity-70">{{ $userapplication->postal_code }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">High School</span>
                                    <span class="opacity-70">{{ $userapplication->high_school }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Plan</span>
                                    <span class="opacity-70">{{ $userapplication->plan }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header border-0">
                                            <h3 class="card-title"></h3>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog"></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center">
                                                <!--begin: Icon-->
                                                @if (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'pdf')
                                                    <img alt="" class="max-h-55px" src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'png')
                                                    <img alt="" class="max-h-55px" src="https://static.thenounproject.com/png/4147238-200.png" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'docx')

                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'jpg' || pathinfo($userapplication->path, PATHINFO_EXTENSION) === 'jpeg')
                                                    <img alt="" class="max-h-55px" src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/jpg.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'zip')
                                                    <img alt="" class="max-h-55px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/zip.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'psd')
                                                    <img alt="" class="max-h-55px"
                                                        src="https://png.pngtree.com/png-vector/20220611/ourmid/pngtree-adobe-photoshop-psd-ps-icon-png-image_4952703.png" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'xml')
                                                    <img alt="" class="max-h-55px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'html')
                                                    <img alt="" class="max-h-55px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                @endif
                                                <!--begin: Title-->
                                                <a href="https://pvportal.wetestlink.com/public/assets/media/{{ $userapplication->award_letter }}" target="_blank"
                                                    class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ 'Award letter' . '.' . pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) }}</a>    
                                                <!--end: Tite-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end:: Card-->
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b card-stretch">
                                        <div class="card-header border-0">
                                            <h3 class="card-title"></h3>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center">
                                                <!--begin: Icon-->
                                                @if (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'pdf')
                                                    <img alt="" class="max-h-65px"
                                                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'png')
                                                    <img alt="" class="max-h-65px"
                                                        src="	https://static.thenounproject.com/png/4147238-200.png" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'docx')

                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'jpg' || pathinfo($userapplication->path, PATHINFO_EXTENSION) === 'jpeg')
                                                    <img alt="" class="max-h-65px"
                                                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/jpg.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'zip')
                                                    <img alt="" class="max-h-65px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/zip.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'psd')
                                                    <img alt="" class="max-h-65px"
                                                        src="https://png.pngtree.com/png-vector/20220611/ourmid/pngtree-adobe-photoshop-psd-ps-icon-png-image_4952703.png" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'xml')
                                                    <img alt="" class="max-h-65px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'html')
                                                    <img alt="" class="max-h-65px"
                                                        src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                @endif
                                                <!--begin: Title-->
                                                <a href="{{ $userapplication->transcript_letter }}" target="_blank"
                                                    class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ 'Transcript letter' . '.' . pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) }}</a>    
                                                <!--end: Tite-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end:: Card-->
                                </div>

                            </div>
                        </div>
                        <!-- Guardians Information Start-->
                        <div class="col-md-9">
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <h6 class="display-7 font-weight-boldest mb-5">Guardians Information</h6>
                            </div>
                            @foreach ($userapplication->guardians as $guardian)
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class=" font-weight-boldest mb-5">{{$loop->iteration}} ) Guardian Details</h6>
                                </div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Name</span>
                                        <span class="opacity-70">{{ $guardian->name }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Email</span>
                                        <span class="opacity-70">{{ $guardian->email }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Phone</span>
                                        <span class="opacity-70">{{ $guardian->phone }}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Address</span>
                                        <span class="opacity-70">{{ $guardian->address }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <label class="font-weight-bold">Guardian's Highest level of :</label>
                                        <div class="timeline-label">
                                            @if ($guardian->high_school_diploma !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">High School Diploma</span>
                                                    </div>
                                                </div>    
                                            @endif
                                            @if ($guardian->associate_degree !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">Associate Degree</span>
                                                    </div>
                                                </div>    
                                            @endif
                                            @if ($guardian->bachelor_degree !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">Bachelor Degree</span>
                                                    </div>
                                                </div>    
                                            @endif
                                            @if ($guardian->master_degree !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">Master Degree</span>
                                                    </div>
                                                </div>    
                                            @endif
                                            @if ($guardian->doctoral_degree !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">Doctoral Degree</span>
                                                    </div>
                                                </div>    
                                            @endif
                                            @if ($guardian->none !== 0)
                                                <div class="timeline-item d-flex">
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-success fs-1"></i>
                                                    </div>
                                                    <div class="timeline-content pl-2">
                                                        <span class="fw-bold text-gray-800 ps-3">None</span>
                                                    </div>
                                                </div>    
                                            @endif              
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column flex-root"></div>
                                </div>
                                <div class="border-bottom w-100 mt-5"></div>
                            @endforeach
                          
                        </div>
                        <!-- Guardians Information End-->

                        <!-- Reference Information Start-->
                        <div class="col-md-9">
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <h6 class="display-7 font-weight-boldest mb-5">References Information</h6>
                            </div>
                            @foreach ($userapplication->references as $refernce)
                                <div class="d-flex justify-content-between pt-5">
                                    <h6 class=" font-weight-boldest mb-5">{{$loop->iteration}} ) Refernce Details</h6>
                                </div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Name</span>
                                        <span class="opacity-70">{{ $refernce->name }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Email</span>
                                        <span class="opacity-70">{{ $refernce->email }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Phone</span>
                                        <span class="opacity-70">{{ $refernce->phone }}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Relation</span>
                                        <span class="opacity-70">{{ $refernce->relation }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Relation Years</span>
                                        <span class="opacity-70">{{ $refernce->length }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root"></div>
                                </div>
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b card-stretch">
                                            <div class="card-header border-0">
                                                <h3 class="card-title"></h3>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center">
                                                    <!--begin: Icon-->
                                                    @if (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'pdf')
                                                        <img alt="" class="max-h-65px"
                                                            src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'png')
                                                        <img alt="" class="max-h-65px"
                                                            src="	https://static.thenounproject.com/png/4147238-200.png" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'docx')
    
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'jpg' || pathinfo($userapplication->path, PATHINFO_EXTENSION) === 'jpeg')
                                                        <img alt="" class="max-h-65px"
                                                            src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/jpg.svg" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'zip')
                                                        <img alt="" class="max-h-65px"
                                                            src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/zip.svg" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'psd')
                                                        <img alt="" class="max-h-65px"
                                                            src="https://png.pngtree.com/png-vector/20220611/ourmid/pngtree-adobe-photoshop-psd-ps-icon-png-image_4952703.png" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'xml')
                                                        <img alt="" class="max-h-65px"
                                                            src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                    @elseif (pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) === 'html')
                                                        <img alt="" class="max-h-65px"
                                                            src="	https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/html.svg" />
                                                    @endif
                                                    <!--begin: Title-->
                                                    <a href="{{ $userapplication->letter }}" target="_blank"
                                                        class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ 'Reference Letter' . '.' . pathinfo($userapplication->award_letter, PATHINFO_EXTENSION) }}</a>    
                                                    <!--end: Tite-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:: Card-->
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                    </div>
                                </div>
                                <div class="border-bottom w-100 mt-5"></div>
                            @endforeach
                          
                        </div>
                        <!-- Reference Information End-->
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
