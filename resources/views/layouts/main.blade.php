<!DOCTYPE html>
<!--
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jampack - Admin CRM Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description"
        content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap." />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap Dropify CSS -->
    <link href="{{ asset('backend/vendors/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker CSS -->
    <link href="{{ asset('backend/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <!-- Data Table CSS -->
    <!-- Data Table CSS -->
    <link href="{{ asset('backend/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/vendors/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />

   
    <!-- CSS -->
    <link href="{{ asset('backend/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    @stack('style-alt')
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="navbar" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
            <div class="container-fluid">
                <!-- Start Nav -->
                <div class="nav-start-wrap flex-fill">
                    <!-- Brand -->
                    <a class="navbar-brand d-xl-flex d-none flex-shrink-0" href="{{ route('dashboard.index') }}">
                        <img class="brand-img img-fluid" src="{{ asset('backend/dist/img/brand-sm.svg') }}"
                            alt="brand" />
                        <img class="brand-img img-fluid" src="{{ asset('backend/dist/img/Jampack.svg') }}"
                            alt="brand" />
                    </a>
                    <!-- /Brand -->
                    <button
                        class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span
                            class="icon"><span class="feather-icon"><i
                                    data-feather="align-left"></i></span></span></button>

                    <!-- Navbar Nav -->
                    <div class="hk-menu">
                        <!-- Brand -->
                        <div class="menu-header d-xl-none">
                            <span>
                                <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                                    <img class="brand-img img-fluid" src="{{ asset('backend/dist/img/brand-sm.svg') }}"
                                        alt="brand" />
                                    <img class="brand-img img-fluid" src="{{ asset('backend/dist/img/Jampack.svg') }}"
                                        alt="brand" />
                                </a>
                                <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                                    <span class="icon">
                                        <span class="svg-icon fs-5">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="10" y1="12" x2="20" y2="12">
                                                </line>
                                                <line x1="10" y1="12" x2="14" y2="16">
                                                </line>
                                                <line x1="10" y1="12" x2="14" y2="8">
                                                </line>
                                                <line x1="4" y1="4" x2="4" y2="20">
                                                </line>
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </span>
                        </div>
                        <!-- /Brand -->

                        @include('layouts.navbar')

                    </div>
                    <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
                    <!-- /Navbar Nav -->

                </div>
                <!-- /Start Nav -->

                <!-- End Nav -->
                <div class="nav-end-wrap">
                    <!-- Search -->
                    <form class="dropdown navbar-search me-2">
                        <div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation
                            data-bs-auto-close="outside">
                            <a href="#"
                                class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span
                                    class="icon"><span class="feather-icon"><i
                                            data-feather="search"></i></span></span></a>
                            <div class="input-group d-xl-flex d-none">
                                <span class="input-affix-wrapper input-search affix-border">
                                    <input type="text" class="form-control  bg-transparent"
                                        data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
                                    <span class="input-suffix"><span>/</span>
                                        <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                        <span class="spinner-border spinner-border-sm input-loader text-primary"
                                            role="status">
                                            <span class="sr-only">Loading...</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="dropdown-menu p-0">
                            <!-- Mobile Search -->
                            <div class="dropdown-item d-xl-none bg-transparent">
                                <div class="input-group mobile-search">
                                    <span class="input-affix-wrapper input-search">
                                        <input type="text" class="form-control" placeholder="Search..."
                                            aria-label="Search">
                                        <span class="input-suffix">
                                            <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                            <span class="spinner-border spinner-border-sm input-loader text-primary"
                                                role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <!--/ Mobile Search -->
                            <div data-simplebar class="dropdown-body p-2">
                                <h6 class="dropdown-header">Recent Search
                                </h6>
                                <div class="dropdown-item bg-transparent">
                                    <a href="#" class="badge badge-pill badge-soft-secondary">Grunt</a>
                                    <a href="#" class="badge badge-pill badge-soft-secondary">Node JS</a>
                                    <a href="#" class="badge badge-pill badge-soft-secondary">SCSS</a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Help
                                </h6>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
                                                <span class="initial-wrap">
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-corner-down-right"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            How to setup theme?
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
                                                <span class="initial-wrap">
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-corner-down-right"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            View detail documentation
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Users
                                </h6>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ asset('backend/dist/img/avatar3.jpg') }}" alt="user"
                                                    class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Sarah Jone
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded">
                                                <span class="initial-wrap">J</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Joe Jackson
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ asset('backend/dist/img/avatar4.jpg') }}" alt="user"
                                                    class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Maria Richard
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-xl-flex d-none"><a href="#"><u>Search all</u></a>
                            </div>
                        </div>
                    </form>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <div class="dropdown dropdown-notifications">
                                <a href="#"
                                    class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret"
                                    data-bs-toggle="dropdown" data-dropdown-animation role="button"
                                    aria-haspopup="true" aria-expanded="false"><span class="icon"><span
                                            class="position-relative"><span class="feather-icon"><i
                                                    data-feather="bell"></i></span><span
                                                class="badge badge-success badge-indicator position-top-end-overflow-1"></span></span></span></a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <h6 class="dropdown-header px-4 fs-6">Notifications<a href="#"
                                            class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"><span
                                                class="icon"><span class="feather-icon"><i
                                                        data-feather="settings"></i></span></span></a>
                                    </h6>
                                    <div data-simplebar class="dropdown-body  p-2">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-rounded avatar-sm">
                                                        <img src="{{ asset('backend/dist/img/avatar2.jpg') }}"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Morgan Freeman accepted your
                                                            invitation to join the team</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-success">Collaboration</span>
                                                            <div class="notifications-time">Today, 10:14 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div
                                                        class="avatar  avatar-icon avatar-sm avatar-success avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i
                                                                    data-feather="inbox"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">New message received from Alan
                                                            Rickman</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Today, 7:51 AM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div
                                                        class="avatar  avatar-icon avatar-sm avatar-pink avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i
                                                                    data-feather="clock"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">You have a follow up with
                                                            Jampack Head on Friday, Dec 19 at 9:30 am</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Yesterday, 9:25 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset('backend/dist/img/avatar3.jpg') }}"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Application of Sarah Williams
                                                            is waiting for your approval</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Today 10:14 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset('backend/dist/img/avatar10.jpg') }}"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Winston Churchil shared a
                                                            document with you</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-violet">File Manager</span>
                                                            <div class="notifications-time">2 Oct, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div
                                                        class="avatar  avatar-icon avatar-sm avatar-danger avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i
                                                                    data-feather="calendar"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Last 2 days left for the
                                                            project to be completed</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-orange">Updates</span>
                                                            <div class="notifications-time">14 Sep, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer"><a href="#"><u>View all notifications</u></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown ps-2">
                                <a class=" dropdown-toggle no-caret" href="#" role="button"
                                    data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    <div class="avatar avatar-rounded avatar-xs">
                                        <img src="{{ asset('backend/dist/img/avatar12.jpg') }}" alt="user"
                                            class="avatar-img">
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="p-2">
                                        <div class="media">
                                            <div class="media-head me-2">
                                                <div class="avatar avatar-primary avatar-sm avatar-rounded">
                                                    <span class="initial-wrap">Hk</span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="dropdown">
                                                    <a href="#"
                                                        class="d-block dropdown-toggle link-dark fw-medium"
                                                        data-bs-toggle="dropdown" data-dropdown-animation
                                                        data-bs-auto-close="inside">{{ Auth::user()->name }}</a>
                                                </div>
                                                <div class="fs-7">{{ Auth::user()->email }}</div>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                                        class="d-block fs-8 link-secondary">Sign
                                                        Out</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </li>
                    </ul>
                </div>
                <!-- /End Nav -->
            </div>
        </nav>
        <!-- /Top Navbar -->

        @yield('content')
    </div>
    <!-- /Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>

    <!-- barcode -->

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FeatherIcons JS -->
    <script src="{{ asset('backend/dist/js/feather.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('backend/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('backend/vendors/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Repeater JS -->
    <script src="{{ asset('backend/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <!-- Data Table JS -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/dataTables-data.js') }}"></script>


    <!-- Daterangepicker JS -->
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/dist/js/daterangepicker-data.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/select2-data.js') }}"></script>

    <!-- Dropify JS -->
    <script src="{{ asset('backend/vendors/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/rating.js') }}"></script>
    <script src="{{ asset('backend/dist/js/dropify-data.js') }}"></script>

    <!-- Rating JS -->
    <script src="{{ asset('backend/dist/js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/contact-data.js') }}"></script>

    <!-- Tinymce JS -->
    <script src="{{ asset('backend/vendors/tinymce/tinymce.min.js') }}"></script>

    <!-- Init JS -->
    <script src="{{ asset('backend/dist/js/init.js') }}"></script>
    <script src="{{ asset('backend/dist/js/create-invoice-data.js') }}"></script>

    <!-- Sweetalert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('script-alt')
</body>

</html>
