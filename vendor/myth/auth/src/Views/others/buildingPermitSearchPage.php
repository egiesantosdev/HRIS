<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class = "mb-0" id = "home">
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(<?= base_url()?>/public/assets/media/svg/illustrations/landing.svg)">
        <!--begin::Header-->
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s; top: 0px;">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center justify-content-between">
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-equal">
                        <!--begin::Mobile menu toggle-->
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2hx">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Mobile menu toggle-->
                        <!--begin::Logo image-->
                        <!-- <a href="../../demo1/dist/landing.html">
                            <img alt="Logo" src="<?= base_url()?>/public/assets/media/logos/landing.svg" class="logo-default h-25px h-lg-30px">
                            <img alt="Logo" src="<?= base_url()?>/public/assets/media/logos/landing-dark.svg" class="logo-sticky h-20px h-lg-25px">
                        </a> -->
                        <!--end::Logo image-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::Menu wrapper-->
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How it Works</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Applications Progress</a>
                                    <!--end::Menu link-->
                                </div>
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="<?= base_url()?>/searchResult" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Search</a>
                                    <!--end::Menu link-->
                                </div>
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Toolbar-->
                    <div class="flex-equal text-end ms-1">
                        <!-- <span></span> -->
                        <!-- <a href="../../demo1/dist/authentication/layouts/basic/sign-in.html" class="btn btn-success">Search Application</a> -->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->
        <!--begin::Landing hero-->
        <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-5 pt-10 pt-lg-20">
                <!--begin::Title-->
                <h2 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Track your building application with
                <br>
                <span style="background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size: 65px">
                    <span id="kt_landing_hero_text">City of Baliwag</span>
                </span>
                <br>
                </h2>
                <!--end::Title-->
                <!--begin::Action-->
                
                <!-- <a href="../../demo1/dist/index.html" class="btn btn-primary">Try Metronic</a> -->
                <!--end::Action-->
            </div>
            <div class = "mx-10 w-lg-50  pb-15 d-flex flex-center">
                <button class = "btn btn-primary btn-lg w-lg-50 w-sm-100 fw-bold">Search Application</button>
                <!-- <div class="input-group input-group-solid bg-transparent w-100 mb-2" style = "background-color: transparent !important">
                    <input type="text" class="form-control form-control-transparent px-8 py-5 border border-white bg-transparent fw-semibold fs-4 text-white" placeholder="BALIWAG-BP-0000001"/>
                    <span class="input-group-text bg-transparent px-5" id="basic-addon2">
                        <i class="fa fa-search"><span class="path1"></span><span class="path2"></span></i>
                    </span>
                </div>
                <small class = "text-muted ">Type your building application number here.</small> -->
            </div>
            
            <!--end::Heading-->
            <!--begin::Clients-->
            <div class="d-flex flex-center flex-wrap position-relative px-5">
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Fujifilm" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/fujifilm.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Vodafone" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="KPMG International" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/kpmg.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Nasa" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/nasa.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Aspnetzero" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/aspnetzero.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="AON - Empower Results" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/aon.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Hewlett-Packard" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/hp-3.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Truman" data-kt-initialized="1">
                    <img src="<?= base_url()?>/public/assets/media/svg/brand-logos/truman.svg" class="mh-30px mh-lg-40px" alt="">
                </div>
                <!--end::Client-->
            </div>
            <!--end::Clients-->
        </div>
        <!--end::Landing hero-->

        
    </div>
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<div class="mb-n10 mb-lg-n20 z-index-2">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Heading-->
        <div class="text-center mb-17">
            <!--begin::Title-->
            <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How it Works</h3>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="fs-5 text-muted fw-bold">Tracking your application made
            <br>easy and simple</div>
            <!--end::Text-->
        </div>
        <!--end::Heading-->
        <!--begin::Row-->
        <div class="row w-100 gy-10 mb-md-20">
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="<?=base_url()?>/public/assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="">
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bold text-dark">Building Application Number</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-semibold fs-6 fs-lg-4 text-muted">Building Application Number is indicated on your 
                    <br>printed materials given by the 
                    <br>office</div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="<?=base_url()?>/public/assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="">
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bold text-dark">See Search Result</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-semibold fs-6 fs-lg-4 text-muted">After searching,
                    <br>results will be provided to
                    <br>another tab</div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="<?=base_url()?>/public/assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="">
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bold text-dark">Track your application</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-semibold fs-6 fs-lg-4 text-muted">The history of your application
                    <br>will be shown to the
                    <br>screen</div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
        </div>

        <div class="tns tns-default" style="direction: ltr">
    <!--begin::Slider-->
    <div
        data-tns="true"
        data-tns-loop="true"
        data-tns-swipe-angle="false"
        data-tns-speed="1500"
        data-tns-autoplay="true"
        data-tns-autoplay-timeout="18000"
        data-tns-controls="true"
        data-tns-nav="false"
        data-tns-items="1"
        data-tns-center="false"
        data-tns-dots="false"
        data-tns-prev-button="#kt_team_slider_prev1"
        data-tns-next-button="#kt_team_slider_next1"
        class = "mt-10">

            <!--begin::Item-->
            <div class="text-center px-5 py-5">
                <img src="<?= base_url()?>/public/assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
            </div>
            <!--end::Item-->
            <div class="text-center px-5 py-5">
                <img src="<?= base_url()?>/public/assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
            </div>
            <div class="text-center px-5 py-5">
                <img src="<?= base_url()?>/public/assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
            </div>
            <div class="text-center px-5 py-5">
                <img src="<?= base_url()?>/public/assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt=""/>
            </div>
        </div>
        <!--end::Slider-->

        <!--begin::Slider button-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1" aria-controls="tns1" tabindex="-1" data-controls="prev">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
            <span class="svg-icon svg-icon-3x">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </button>
        <!--end::Slider button-->

        <!--begin::Slider button-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1" aria-controls="tns1" tabindex="-1" data-controls="next">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
            <span class="svg-icon svg-icon-3x">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </button>
    </div>
    </div>
    <!--end::Container-->
</div>


<div class="mt-sm-n10 mt-20">
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
        </svg>
    </div>
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    <div class="pb-15 pt-18 landing-dark-bg">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                <!--begin::Title-->
                <h3 class="fs-2hx text-white fw-bold mb-5">Better Application Monitoring</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="fs-5 text-gray-700 fw-bold">With just few clicks
                <br>your application is monitored</div>
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Statistics-->
            <div class="d-flex flex-center">
                <!--begin::Items-->
                <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('<?= base_url()?>/public/assets/media/svg/misc/octagon.svg')">
                        <!--begin::Symbol-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="mb-0">
                            <!--begin::Value-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                <div class="min-w-70px counted" data-kt-countup="true" data-kt-countup-value="700" data-kt-countup-suffix="+" data-kt-initialized="1">700+</div>
                            </div>
                            <!--end::Value-->
                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">Ongoing Applications</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-270px w-270px h-lg-300px w-lg-300px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('<?= base_url()?>/public/assets/media/svg/misc/octagon.svg')">
                        <!--begin::Symbol-->
                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="mb-0">
                            <!--begin::Value-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                <div class="min-w-70px counted" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="K+" data-kt-initialized="1">80K+</div>
                            </div>
                            <!--end::Value-->
                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">Approved Applications</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('<?= base_url()?>/public/assets/media/svg/misc/octagon.svg')">
                        <!--begin::Symbol-->
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="mb-0">
                            <!--begin::Value-->
                            <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                <div class="min-w-70px counted" data-kt-countup="true" data-kt-countup-value="35" data-kt-countup-suffix="M+" data-kt-initialized="1">35M+</div>
                            </div>
                            <!--end::Value-->
                            <!--begin::Label-->
                            <span class="text-gray-600 fw-semibold fs-5 lh-0">For Payment</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->
            </div>
            <!--end::Statistics-->
            <!--begin::Testimonial-->
            <!-- <div class="fs-2 fw-semibold text-muted text-center mb-3">
            <span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about it in a
            <br>
            <span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
            <span class="fs-1 lh-1 text-gray-700">“</span></div> -->
            <!--end::Testimonial-->
            <!--begin::Author-->
            <!-- <div class="fs-2 fw-semibold text-muted text-center">
                <a href="../../demo1/dist/account/security.html" class="link-primary fs-4 fw-bold">Marcus Levy,</a>
                <span class="fs-4 fw-bold text-gray-600">KeenThemes CEO</span>
            </div> -->
            <!--end::Author-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
        </svg>
    </div>
    <!--end::Curve bottom-->
</div>


<div class = "mt-20">
    <div class="container">
        <!--begin::Row-->
        <div class="row py-10 py-lg-20">
            <!--begin::Col-->
            <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                <!--begin::Block-->
                <div class="rounded border-dashed border-primary p-9 mb-10 bg-light-primary">
                    <!--begin::Title-->
                    <h2 class="text-gray-800">Do you have any other concerns?</h2>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <span class="fw-normal fs-4 text-gray-700">Email us to
                    <a href="https://keenthemes.com/support" class="text-gray opacity-50 text-hover-primary">baliwag_support@baliwag.gov.ph</a></span>
                    <!--end::Text-->
                </div>
                <!--end::Block-->
                <!--begin::Block-->
                
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-6 ps-lg-16">
                <!--begin::Navs-->
                <div class="d-flex justify-content-center">
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold flex-column me-20">
                        <!--begin::Subtitle-->
                        <h4 class="fw-bold text-gray-400 mb-6">More for Building Application</h4>
                        <!--end::Subtitle-->
                        <!--begin::Link-->
                        <a href="https://keenthemes.com/faqs" class="text-gray opacity-50 fs-5 mb-6">FAQ</a>
                        <!--end::Link-->
                        <!--begin::Link-->
                        <a href="https://preview.keenthemes.com/html/metronic/docs" class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Application Requirements</a>
                        
                    </div>
                    <!--end::Links-->
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold flex-column ms-lg-20">
                        <!--begin::Subtitle-->
                        <h4 class="fw-bold text-gray-400 mb-6">Stay Connected</h4>
                        <!--end::Subtitle-->
                        <!--begin::Link-->
                        <a href="https://www.facebook.com/keenthemes" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                        </a>
                        <!--end::Link-->
                        <!--begin::Link-->
                        <!-- <a href="https://github.com/KeenthemesHub" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                        </a> -->
                        <!--end::Link-->
                        <!--begin::Link-->
                        <!-- <a href="https://twitter.com/keenthemes" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                        </a> -->
                        <!--end::Link-->
                        <!--begin::Link-->
                        <!-- <a href="https://dribbble.com/keenthemes" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                        </a> -->
                        <!--end::Link-->
                        <!--begin::Link-->
                        <a href="https://www.instagram.com/keenthemes" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                        </a>
                        <a href="https://www.instagram.com/keenthemes" class="mb-6">
                            <img src="<?=base_url()?>/public/assets/media/svg/brand-logos/youtube-play.svg" class="h-20px me-2" alt="">
                            <span class="text-gray opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
                        </a>
                        <!--end::Link-->
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Navs-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
</div>

<div class="mb-0 mt-10">
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    <div class="landing-dark-bg">
        
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                <!--begin::Copyright-->
                <div class="d-flex align-items-center order-2 order-md-1">
                    <!--begin::Logo-->
                    <!-- <a href="../../demo1/dist/landing.html">
                        <img alt="Logo" src="assets/media/logos/landing.svg" class="h-15px h-md-20px">
                    </a> -->
                    <!--end::Logo image-->
                    <!--begin::Logo image-->
                    <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">© <?= date('Y')?> City of Baliwag | City Information and Communication Technology Office</span>
                    <!--end::Logo image-->
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                    <li class="menu-item">
                        <a href="https://baliwag.gov.ph" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item mx-5">
                        <a href="#" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="#" target="_blank" class="menu-link px-2">Others</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Wrapper-->
</div>





<?= $this->endSection() ?>