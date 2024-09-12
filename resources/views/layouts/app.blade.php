<!DOCTYPE html>
<html>

<head>
    @php
       /* $domains = ['opportal.sha.kerala.gov.in', '61.0.248.21', '10.5.69.181', '127.0.0.1'];
        if (!in_array($_SERVER['SERVER_NAME'], $domains)) {
            return false;
            exit();
        }
          $host = request()->getHost();
        if($host != 'opportal.sha.kerala.gov.in' && $host != '61.0.248.21' && $host != '10.5.69.181' && $host != '127.0.0.1'){
			return false;exit();
		}  */
    @endphp
    <?php
    if (session()->has('style_status')) {
        $style_status = session()->get('style_status');
    } else {
        $style_status = 'aone';
    }
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="Description" content="SC/ST" />
    <meta name="Author" content="" />
    <!-- Title -->
    <title>SC/ST</title>
    <!--- Favicon --->
    <link rel="icon" href="{{ asset('img//favicon.png') }}" type="image/x-icon" />
    <!-- Bootstrap css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" id="style" />
    <!--- Style css --->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" />
    <!--- Icons css --->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
    <!--- Animations css --->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <!-- Switcher css -->
    <link href="{{ asset('css/switcher.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />

    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script>

	{{-- toster script --}}
	<script src="{{ asset('js/toastr.js') }}"></script>


    <link href="{{ asset('css/selectize.bootstrap3.min.css') }}" rel="stylesheet" />


    @if ($style_status == 'aminus')
        <link href="{{ asset('css/style-min.css') }}" rel="stylesheet" type="text/css" />
    @elseif($style_status == 'aone')
        <link href="{{ asset('css/style-one.css') }}" rel="stylesheet" type="text/css" />
    @elseif($style_status == 'aplus')
        <link href="{{ asset('css/style-plus.css') }}" rel="stylesheet" type="text/css" />
    @endif


</head>

<body class="main-body app sidebar-mini ltr">

    <div class="horizontalMenucontainer">
        <!-- Switcher -->

        <!-- End Switcher -->
        <!-- Loader -->

        @if (auth()->check() && auth()->user()->role == 'User')
            <div class="modal fade" id="user-modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content country-select-modal border-0">
                        <div class="modal-header offcanvas-header">
                            <h6 class="modal-title">Please Update Bank Details</h6><button aria-label="Close"
                                class="btn-close" data-bs-dismiss="modal" type="button"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body p-5">
                            <form id="userForm">
                                @csrf

                                <div class="text-center">
                                    {{-- <h5>Bank Details</h5> --}}
                                    <div class="row pb-4">
                                        <div class="col-md-4">
                                            <label>Bank Name * </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="bank_name" id="bank_name"
                                                required>
                                            <span class="text-danger error-message" id="error-bank_name"></span>
                                        </div>

                                    </div>
                                    <div class="row pb-4">
                                        <div class="col-md-4">
                                            <label>Account Number * </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="account_no" id="account_no"
                                                required>
                                            <span class="text-danger error-message" id="error-account_no"></span>
                                        </div>

                                    </div>
                                    <div class="row pb-4">
                                        <div class="col-md-4">
                                            <label>IFSC Code *</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="ifsc_code" id="ifsc_code"
                                                required>

                                            <span class="text-danger error-message" id="error-ifsc_code"></span>
                                        </div>

                                    </div>
                                    <div class="row pb-4">
                                        <div class="col-md-4">
                                            <label>Passbook (Pdf/Image Max Size :2 MB) *</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control" name="passbook" id="passbook"
                                                required>
                                            <span class="text-danger error-message" id="error-passbook"></span>
                                        </div>

                                    </div>

                                </div>
                                <input type="hidden" value="{{ auth()->user()->id }}" name="requestId"
                                    id="requestId">

                                <div class="text-center">
                                    <button type="button"
                                        class="btn btn-primary mt-4 mb-0 me-2">Submit</button>
                                    <button class="btn btn-default mt-4 mb-0" type="Reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div id="global-loader">
            <img src="{{ asset('img/loader.gif') }}" class="loader-img" alt="Loader" width="250" />
        </div>
        <!-- /Loader -->
        <!-- page -->
        <div class="page custom-index">
            <!-- main-header -->
            

            <!-- /main-header -->
            <!-- main-sidebar -->
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="sticky is-expanded" style="margin-bottom:0px;">
                <aside class="app-sidebar ps ps--active-y open">
                    <div class="main-sidebar-header active">
                        <a href="index.html" class="header-logo">
                            <img src="{{ asset('/images_new/logo.png') }}" class="logo-11" />
                        </a>
                    </div>
                    <div class="main-sidemenu is-expanded">
                        <div class="main-sidebar-loggedin">
                            <div class="user-info text-center w-100">
                                <h6 class="mb-0 text-dark">{{ Auth::user()->name }}</h6>

                                <label class="btn btn-success">{{ Auth::user()->role }}</label>

                            </div>

                        </div>
                        @if (Auth::user()->role == 'User')
                            <div>

                                <a class="nav-link text-center m-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                                    class="fe fe-power"> </i>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </div>
                        @endif
                        @if (Auth::user()->role != 'User')
                        <div class="sidebar-navs">
                            <ul class="nav nav-pills-circle" style="padding-left: 30px;">
                                
                                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Settings" aria-describedby="tooltip365540">
                                    <a class="nav-link text-center m-2" href="{{ route('password') }}">
                                        <i class="fe fe-settings fe-spin"> </i>
                                    </a>
                                </li>

                                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Followers">
                                    <a class="nav-link text-center m-2" href="{{ route('profile') }}">
                                        <i class="fe fe-user"> </i>
                                    </a>
                                </li>
                                
                                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Logout">

                                    <a class="nav-link text-center m-2" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fe fe-power"> </i>

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>



                                </li>
                            </ul>
                        </div>
                        @endif
                        <div class="slide-left disabled active is-expanded d-none" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg>
                        </div>
                        <ul class="side-menu" style="margin-right: 0px;">
                            <li class="slide">
                                <a class="side-menu__item {{ \Request::route()->getName() == 'home.index' || \Request::route()->getName() == 'home' ? 'active' : '' }}"
                                    href="{{ url('home') }}">
                                    <i class="side-menu__icon fe fe-airplay"> </i>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            </li>
                            @if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin' || Auth::user()->role == 'TEO' )
                                @if (Auth::user()->role == 'Super Admin')
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'users.index' || \Request::route()->getName() == 'users.create' || \Request::route()->getName() == 'users.edit' ? 'active' : '' }}"
                                            href="{{ url('users') }}">
                                            <i class="side-menu__icon fe fe-users"> </i>
                                            <span class="side-menu__label">Users</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'roles.index' || \Request::route()->getName() == 'roles.create' || \Request::route()->getName() == 'roles.edit' ? 'active' : '' }}"
                                            href="{{ url('roles') }}">
                                            <i class="side-menu__icon fe fe-file-plus"> </i>
                                            <span class="side-menu__label">Role</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'districts.index' || \Request::route()->getName() == 'districts.create' || \Request::route()->getName() == 'districts.edit' ? 'active' : '' }}"
                                            href="{{ url('districts') }}">
                                            <i class="side-menu__icon fe fe-users"> </i>
                                            <span class="side-menu__label">Districts</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'taluks.index' || \Request::route()->getName() == 'taluks.create' || \Request::route()->getName() == 'taluks.edit' ? 'active' : '' }}"
                                            href="{{ url('taluks') }}">
                                            <i class="side-menu__icon fas fa-city"> </i>
                                            <span class="side-menu__label">Taluks</span>

                                        </a>

                                    </li>
                                     <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'tdo.index' || \Request::route()->getName() == 'teo.create' || \Request::route()->getName() == 'teo.edit' ? 'active' : '' }}"
                                            href="{{ url('po-tdo') }}">
                                            <i class="side-menu__icon fas fa-city"> </i>
                                            <span class="side-menu__label">PO/TDO </span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'teo.index' || \Request::route()->getName() == 'teo.create' || \Request::route()->getName() == 'teo.edit' ? 'active' : '' }}"
                                            href="{{ url('teo') }}">
                                            <i class="side-menu__icon fas fa-city"> </i>
                                            <span class="side-menu__label">TEO</span>

                                        </a>

                                    </li>
                                   
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'scheme_amount.index' || \Request::route()->getName() == 'scheme_amount.create' || \Request::route()->getName() == 'scheme_amount.edit' ? 'active' : '' }}"
                                            href="{{ url('scheme_amount') }}">
                                            <i class="side-menu__icon fas fa-money-bill-wave"> </i>
                                            <span class="side-menu__label">Scheme Amounts</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'institution.index' || \Request::route()->getName() == 'institution.create' || \Request::route()->getName() == 'institution.edit' ? 'active' : '' }}"
                                            href="{{ url('institution') }}">
                                            <i class="side-menu__icon fas fa-city"> </i>
                                            <span class="side-menu__label">Institution</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'settings.index' ? 'active' : '' }}"
                                            href="{{ url('settings') }}">
                                            <i class="side-menu__icon fe fe-settings"> </i>
                                            <span class="side-menu__label">Settings</span>

                                        </a>

                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'silder_catrgory.index' ? 'active' : '' }}"
                                            href="{{ url('slidercategories') }}">
                                            <i class="side-menu__icon fe fe-layers"> </i>
                                            <span class="side-menu__label">Sliders</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'gallery.index' ? 'active' : '' }}"
                                            href="{{ url('gallery_category') }}">
                                            <i class="side-menu__icon fe fe-package"> </i>
                                            <span class="side-menu__label">Gallery</span>

                                        </a>

                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item {{ \Request::route()->getName() == 'newslist.index' ? 'active' : '' }}"
                                            href="{{ url('newslist') }}">
                                            <i class="side-menu__icon fe fe-menu"> </i>
                                            <span class="side-menu__label">News</span>

                                        </a>

                                    </li>
                                @endif
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'ChildFinanceList' ? 'active' : '' }}"
                                        href="{{ url('ChildFinanceList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Child Finance Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'couplefinanciaexamApplicationListlList' ? 'active' : '' }}"
                                        href="{{ url('examApplicationList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Exam Applications</span>

                                    </a>

                                </li>

                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'couplefinancialList' ? 'active' : '' }}"
                                        href="{{ url('couplefinancialList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Couple Financial Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'motherChildSchemeList' ? 'active' : '' }}"
                                        href="{{ url('motherChildSchemeList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Mother Child Protection Scheme
                                            Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'marriageGrantList' ? 'active' : '' }}"
                                        href="{{ url('marriageGrantList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Marriage Grant Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'houseGrantApplications' ? 'active' : '' }}"
                                        href="{{ url('houseGrantApplications') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">House Scheme Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'adminTuitionFeeList' ? 'active' : '' }}"
                                        href="{{ route('adminTuitionFeeList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Tuition Fee Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'adminStudentFundList' ? 'active' : '' }}"
                                        href="{{ route('adminStudentFundList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Medical /Engineering Student Fund Scheme
                                            Applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'singleEarnerList' ? 'active' : '' }}"
                                        href="{{ route('singleEarnerList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Proving death of sole earner applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'anemiaFinanceList' ? 'active' : '' }}"
                                        href="{{ route('anemiaFinanceList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Sickle-cell anemia patients finance
                                            applications</span>

                                    </a>

                                </li>
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'studentAwardList' ? 'active' : '' }}"
                                        href="{{ route('studentAwardList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Student Award applications</span>
                                    </a>
                                </li>
                                <li
                                    class="slide {{ \Request::route()->getName() == 'adminItiFundList' ? 'active' : '' }}">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'adminItiFundList' ? 'active' : '' }}"
                                        href="{{ route('adminItiFundList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">ITI Student Fund Scheme Applications</span>

                                    </a>

                                </li>
                            @elseif(Auth::user()->role == 'Principal')
                                <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'adminInstitutionList' ? 'active' : '' }}"
                                        href="{{ route('adminInstitutionList') }}">
                                        <i class="side-menu__icon fe fe-menu"> </i>
                                        <span class="side-menu__label">Scholarship for students <br>in ITI/Training
                                            Centers</span>

                                    </a>

                                </li>
                            @endif

                            @if (Auth::user()->role == 'User')
                                {{-- <li class="slide">
                                    <a class="side-menu__item {{ \Request::route()->getName() == 'user-profile' ? 'active' : '' }}"
                                        href="{{ url('user-profile') }}">
                                        <i class="side-menu__icon fe fe-users"> </i>
                                        <span class="side-menu__label">Profile Details</span>

                                    </a>

                                </li> --}}

                                {{-- <li class="slide">
										<a class="side-menu__item {{ ((\Request::route()->getName() == 'application-forms')) ? 'active' : '' }}"  href="{{url('application-forms')}}">
											<i class="side-menu__icon fe fe-users"> </i>
											<span class="side-menu__label">Application Forms</span>

										</a>

									</li> --}}
                            @endif

                            @if (auth::user()->role === 'Clerk')
                            
                                @include('layouts.clerk_app')
                                @elseif ( Auth::user()->role == 'JS' || Auth::user()->role == 'SEO')
                                @include('layouts.js_seo_app')
                                @elseif ( Auth::user()->role == 'ATDO' || Auth::user()->role == 'APO')
                                @include('layouts.apo_atdo_app')
                              @elseif ( Auth::user()->role == 'TDO' || Auth::user()->role == 'PO')
                            @include('layouts.po_tdo_app')
                            {{-- Directorate --}}
                            @elseif ( Auth::user()->role == 'Directorate Clerk')
                            @include('layouts.dc_app')
                            @elseif ( Auth::user()->role == 'Directorate JS' || Auth::user()->role == 'Directorate SEO')
                            @include('layouts.d_jsseo_app')
                            @elseif ( Auth::user()->role == 'Directorate AD')
                            @include('layouts.d_ad_app')
                            @elseif ( Auth::user()->role == 'Directorate JD')
                            @include('layouts.d_jd_app')
                            {{-- Secreteriate --}}
                            @elseif ( Auth::user()->role == 'Secretariat Asst')
                            @include('layouts.s_ass_app')
                            @elseif ( Auth::user()->role == 'Secretariat SO')
                            @include('layouts.s_so_app')
                            @elseif ( Auth::user()->role == 'Secretariat US')
                            @include('layouts.s_us_app')
                            @elseif ( Auth::user()->role == 'Secretariat AS')
                            @include('layouts.s_as_app')
                            @elseif ( Auth::user()->role == 'Secretariat ACS')
                            @include('layouts.s_acs_app')
                            @elseif ( Auth::user()->role == 'Minister Office')
                            @include('layouts.mo_app')
                              @endif


                        </ul>
                        <div class="slide-right" id="slide-right">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 652px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 515px;"></div>
                    </div>
                </aside>
            </div>

            <!-- main-sidebar -->
            @yield('content')

            <!-- /main-content -->
            <div class="sidebar sidebar-right sidebar-animate ps ps--active-y">
                <div class="panel panel-primary card mb-0">
                    <div class="panel-body tabs-menu-body p-0 border-0">
                        <ul class="Date-time">
                            <li class="time">
                                <h1 class="animated">10:52</h1>
                                <p class="animated">Monday, August 22nd 2022</p>
                            </li>
                        </ul>
                        <div class="card-body latest-tasks">
                            <h3 class="events-title">
                                <span>Events For Week </span>
                            </h3>
                            <div class="event">
                                <div class="Day">Monday 20 Jan</div>
                                <a href="javascript:void(0);">No Events Today</a>
                            </div>
                            <div class="event">
                                <div class="Day">Tuesday 21 Jan</div>
                                <a href="javascript:void(0);">No Events Today</a>
                            </div>
                            <div class="event">
                                <div class="Day">Wednessday 22 Jan</div>
                                <div class="tasks">
                                    <div class="task-line primary">
                                        <a href="javascript:void(0);" class="label"> XML Import &amp; Export </a>
                                        <div class="time">12:00 PM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input checked="" type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="tasks">
                                    <div class="task-line danger">
                                        <a href="javascript:void(0);" class="label"> Connect API to pages </a>
                                        <div class="time">08:00 AM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="event">
                                <div class="Day">Thursday 23 Jan</div>
                                <div class="tasks">
                                    <div class="task-line success">
                                        <a href="javascript:void(0);" class="label"> Create Wireframes </a>
                                        <div class="time">06:20 PM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="event">
                                <div class="Day">Friday 24 Jan</div>
                                <div class="tasks">
                                    <div class="task-line warning">
                                        <a href="javascript:void(0);" class="label"> Test new features in tablets
                                        </a>
                                        <div class="time">02: 00 PM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="tasks">
                                    <div class="task-line teal">
                                        <a href="javascript:void(0);" class="label"> Design Evommerce </a>
                                        <div class="time">10: 00 PM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="tasks mb-0">
                                    <div class="task-line purple">
                                        <a href="javascript:void(0);" class="label"> Fix Validation Issues </a>
                                        <div class="time">12: 00 AM</div>
                                    </div>
                                    <div class="checkbox">
                                        <label class="check-box">
                                            <label class="ckbox">
                                                <input type="checkbox" />
                                                <span> </span>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex pagination wd-100p">
                                <a href="javascript:void(0);">Previous</a>
                                <a href="javascript:void(0);" class="ms-auto">Next</a>
                            </div>
                        </div>
                        <div class="card-body border-top border-bottom">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a class="" href="">
                                        <i class="dropdown-icon mdi mdi-message-outline fs-20 m-0 leading-tight"> </i>
                                    </a>
                                    <div>Inbox</div>
                                </div>
                                <div class="col-4 text-center">
                                    <a class="" href="">
                                        <i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"> </i>
                                    </a>
                                    <div>Settings</div>
                                </div>
                                <div class="col-4 text-center">
                                    <a class="" href="">
                                        <i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"> </i>
                                    </a>
                                    <div>Sign out</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 652px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 438px;"></div>
                </div>
            </div>
            <!--/Sidebar-right-->
            <!-- Footer opened -->

            <div class="main-footer ht-45">


                <div class="container-fluid pd-t-0-f ht-100p">
                    <span>
                        Copyright © 2024 <a href="javascript:void(0);" class="text-primary"></a>. Designed with by <a
                            href="javascript:void(0);"> Kawika Technologies </a> All rights reserved.
                    </span>
                </div>
            </div>
            <!-- Footer closed -->
        </div>
        <!-- page closed -->
        <!--- Back-to-top --->
        <a href="#top" id="back-to-top" style="display: block;">
            <i class="las la-angle-double-up"> </i>
        </a>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/datepicker.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/ionicons.js') }}"></script>
        <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/chart.flot.sampledata.js') }}"></script>
        <script src="{{ asset('js/eva-icons.min.js') }}"></script>
        <script src="{{ asset('js/moment.js') }}"></script>
        <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/p-scroll.js') }}"></script>
        <script src="{{ asset('js/sidemenu.js') }}"></script>
        <script src="{{ asset('js/sticky.js') }}"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script src="{{ asset('js/sidebar-custom.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/index.js') }}"></script>
        <script src="{{ asset('js/themecolor.js') }}"></script>
        <script src="{{ asset('js/swither-styles.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/switcher.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

        {{-- toster script  --}}
        <script src="{{ asset('js/toastr.js') }}"></script>

        <script>
            $(function() {
                $("#datepicker").datepicker();
                $("#to_datepicker").datepicker();
            });
            $(document).ready(function() {
                /*$('#example').DataTable(
        $()


            	);*/
                $('#example1').DataTable();


            });
        </script>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Dilip Kumar (36) - Arogya kiranam </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="eva eva-close-outline header-icons">
                                <g data-name="Layer 2">
                                    <g data-name="close">
                                        <rect width="24" height="24" transform="rotate(180 12 12)"
                                            opacity="0"></rect>
                                        <path
                                            d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z">
                                        </path>
                                    </g>
                                </g>
                            </svg></button>
                    </div>
                    <div class="modal-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Aadhar Id</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Ration Card No:</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Scheme Id</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Email Id</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Appoiment Date </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Aadhar Id</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13">Provisional Diagnosis </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Medicines </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Miscellaneous </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Amount for Provisional Diagnosis </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Amount for Medicines </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Amount for Miscellaneous </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-contain">
                                        <h6 class="mb-1 tx-13"> Miscellaneous </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-grouped"> 986643456 </div>
                                </td>
                            </tr>



                            </tbody>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>




    </div>
    <div class="main-navbar-backdrop"></div>
</body>

</html>

<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="{{ asset('js/toastr.js') }}"></script>

{{-- <script>
    @if (auth()->check() && auth()->user()->role == 'User')
        @if (auth()->user()->bank_name == null && auth()->user()->account_no == null && auth()->user()->passbook == null)

            $(document).ready(function() {
                $('#user-modal').modal('show');
            });
        @endif
    @endif
</script> --}}
<script type="text/javascript">
    function userUpdate() {
        var id = $('#requestId').val();
        var passbookInput = $("#passbook")[0];
        var passbookFile = passbookInput.files[0];
        var formData = new FormData($("#userForm")[0]); // Create FormData object from the form

        // Validate all required fields
        if (validateForm()) {
            // Add passbook to formData if it exists
            if (passbookFile) {
                formData.append('passbook', passbookFile);
            }
            formData.append('id', id);



            $.ajax({

                url: "{{ route('userBankDetails.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,


                success: function(response) {

                    toastr.success(response.success, 'Success!')
                    $('#user-modal').modal('hide');
                    $('#success_message').fadeIn().html(response.success);
                    setTimeout(function() {
                        $('#success_message').fadeOut("slow");
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    window.location.reload();

                }
            });
        }
    }

    function validateForm() {
        var isValid = true;

        // Reset error messages
        $('.error-message').html('');

        // Validate each required field
        $('#userForm [required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                var fieldName = $(this).attr('name');
                $('#error-' + fieldName).html(fieldName + ' is required.');
            }
        });

        // Display general error message in the #errorMessages div
        // $('#errorMessages').html(isValid ? '' : 'Please fill in all required fields.');

        return isValid;
    }
    $(document).ready(function() {
        $('#user-modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        //     $.ajax({

        // 	  url: "{{ route('userData.status') }}",
        // 	  type: "POST",
        // 		  data: {

        // 			  "_token": "{{ csrf_token() }}"
        // 		  },
        // 	  success: function(response) {
        // 		//alert(response.user);
        // 		if(response.user =="user"){

        // 			$('#requestId').val(response.user_data._id);
        // 			//alert(response.data);
        // 			if(response.data == "not-exist"){
        // 				$('#user-modal').modal('show');
        // 			}
        // 			else{
        // 				$('#user-modal').modal('hide');
        // 			}
        // 		}
        // 		else{
        // 			$('#user-modal').modal('hide');
        // 		}


        // 	  }
        //   })

        $('.aminus').on('click', function() {
            //alert("aminus");
            let url = "{{ route('changeStatus') }}";
            window.location.href = url + "?status=aminus";
        });
        $('.aone').on('click', function() {
            //alert("aone");
            let url = "{{ route('changeStatus') }}";
            window.location.href = url + "?status=aone";
        });
        $('.aplus').on('click', function() {
            //alert("aplus");
            let url = "{{ route('changeStatus') }}";
            window.location.href = url + "?status=aplus";
        });
    });
</script>
