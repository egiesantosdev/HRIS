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
        <div class="d-flex flex-column flex-center w-100 min-h-250px min-h-lg-250px px-5">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-5 ">
                <!--begin::Title-->
                <h2 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Search
                <br>
                <span style="background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size: 65px">
                    <span id="kt_landing_hero_text">Building Application</span>
                </span>
                <br>
                </h2>
                <!--end::Title-->
                <!--begin::Action-->
                
                <!-- <a href="../../demo1/dist/index.html" class="btn btn-primary">Try Metronic</a> -->
                <!--end::Action-->
            </div>
        </div>
        <!--end::Landing hero-->
    </div>
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
        </svg>
    </div>

    <div class = "" style = "translate: 0px -140px">
        <div class="container mt-0 d-flex flex-center">
            <div class = "bg-white border p-10 w-100  shadow-sm rounded">
                <div class="row">
                    <div class="col-12">
                    <label for="" class = "form-label fw-bold text-gray-700 fs-4">Business Application Number:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11">
                        <input type="text" class = "form-control form-control-solid  border border-gray-400 form-control-lg mb-2 py-5 px-10 fw-bold fs-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 25%); color: transparent;
      -webkit-background-clip: text;
      background-clip: text;" placeholder = "">
                        <small class = "text-muted">Business application number is indicated on your printed application.</small>
                    </div>
                    <div class="col-1">
                        <button class = "btn btn-primary btn-lg w-100 py-6"><span class = "fa fa-search"></span></button>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
</div>
<div class="" style = "translate: 0px -100px">
    <!--begin::Container-->
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class = "w-100 px-8 py-8 mb-5 border-5 border-primary border-start border-hover-success rounded shadow-sm hover-elevate-up d-flex flex-column">
                    <span class = "fw-bold fs-2 mb-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" >BALIWAG-BP-00000001</span>
                    <span class = "fw-bold text-gray-600">Date of Application: <span class = "text-primary">January 28, 2023</span></span>
                    <span class = "fw-bold text-gray-600">Status: <span class = "text-primary">Approved</span></span>
                </div>
                <div class = "w-100 px-8 py-8 mb-5 border-5 border-primary border-start border-hover-success rounded shadow-sm hover-elevate-up d-flex flex-column">
                    <span class = "fw-bold fs-2 mb-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" >BALIWAG-BP-00000002</span>
                    <span class = "fw-bold text-gray-600">Date of Application: <span class = "text-primary">January 28, 2023</span></span>
                    <span class = "fw-bold text-gray-600">Status: <span class = "text-primary">Approved</span></span>
                </div>
                <div class = "w-100 px-8 py-8 mb-5 border-5 border-primary border-start border-hover-success rounded shadow-sm hover-elevate-up d-flex flex-column">
                    <span class = "fw-bold fs-2 mb-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" >BALIWAG-BP-00000003</span>
                    <span class = "fw-bold text-gray-600">Date of Application: <span class = "text-primary">January 28, 2023</span></span>
                    <span class = "fw-bold text-gray-600">Status: <span class = "text-primary">Approved</span></span>
                </div>
                <div class = "w-100 px-8 py-8 mb-5 border-5 border-primary border-start border-hover-success rounded shadow-sm hover-elevate-up d-flex flex-column">
                    <span class = "fw-bold fs-2 mb-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" >BALIWAG-BP-00000004</span>
                    <span class = "fw-bold text-gray-600">Date of Application: <span class = "text-primary">January 28, 2023</span></span>
                    <span class = "fw-bold text-gray-600">Status: <span class = "text-primary">Approved</span></span>
                </div>
                <div class = "w-100 px-8 py-8 mb-5 border-5 border-primary border-start border-hover-success rounded shadow-sm hover-elevate-up d-flex flex-column">
                    <span class = "fw-bold fs-2 mb-2" style = "background: linear-gradient(to right, #12CE5D 0%, #0c66ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" >BALIWAG-BP-00000005</span>
                    <span class = "fw-bold text-gray-600">Date of Application: <span class = "text-primary">January 28, 2023</span></span>
                    <span class = "fw-bold text-gray-600">Status: <span class = "text-primary">Approved</span></span>
                </div>
            </div>
            <div class="col-8" >
                <div class="border w-100 p-10 bg-white rounded" style="background-size: auto calc(50% + 10rem); background-repeat: no-repeat; background-position-x: 120%; background-position-y: 130%; background-image: url('<?= base_url()?>/public/assets/media/illustrations/sketchy-1/4.png')">
                    <div class="m-0">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-sm-center mb-5 border-gray-300 border-bottom-dashed pb-5">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-50px me-4">
                                <span class="symbol-label bg-primary">
                                    <i class="text-inverse-primary fs-1 lh-0 fonticon-ship"></i>
                                </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="text-gray-400 fs-6 fw-semibold">Process History</a>
                                    <span class="text-gray-800 fw-bold d-block fs-4">BALIWAG-BP-00000001</span>
                                </div>
                                <span class="badge badge-lg badge-light-success fw-bold my-2">Approved</span>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Timeline-->
                        <div class="timeline ms-10">
                            <div class="timeline-label">
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class = "d-flex flex-column">
                                        <div class="timeline-content m-0 fw-bold fs-4 ps-3 mb-2">
                                            Business Processing and Licensining Office
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Date Created:</span>
                                            <span class = "text-muted">January 28, 2023 1:43 PM</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Remarks:</span>
                                            <span class = "text-muted">None</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">By:</span>
                                            <span class = "text-muted">Egie Boy Santos</span>
                                        </div>
                                    </div>
                                    
                                    <!--end::Text-->
                                </div>
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class = "d-flex flex-column">
                                        <div class="timeline-content m-0 fw-bold fs-4 ps-3 mb-2">
                                            Business Processing and Licensining Office
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Date Created:</span>
                                            <span class = "text-muted">January 28, 2023 1:43 PM</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Remarks:</span>
                                            <span class = "text-muted">None</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">By:</span>
                                            <span class = "text-muted">Egie Boy Santos</span>
                                        </div>
                                    </div>
                                    
                                    <!--end::Text-->
                                </div>
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class = "d-flex flex-column">
                                        <div class="timeline-content m-0 fw-bold fs-4 ps-3 mb-2">
                                            Business Processing and Licensining Office
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Date Created:</span>
                                            <span class = "text-muted">January 28, 2023 1:43 PM</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Remarks:</span>
                                            <span class = "text-muted">None</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">By:</span>
                                            <span class = "text-muted">Egie Boy Santos</span>
                                        </div>
                                    </div>
                                    
                                    <!--end::Text-->
                                </div>
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class = "d-flex flex-column">
                                        <div class="timeline-content m-0 fw-bold fs-4 ps-3 mb-2">
                                            Business Processing and Licensining Office
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Date Created:</span>
                                            <span class = "text-muted">January 28, 2023 1:43 PM</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">Remarks:</span>
                                            <span class = "text-muted">None</span>
                                        </div>
                                        <div class="fw-mormal timeline-content m-0 ps-3 mb-2">
                                            <span class = "fw-bold text-gray-600">By:</span>
                                            <span class = "text-muted">Egie Boy Santos</span>
                                        </div>
                                    </div>
                                    
                                    <!--end::Text-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    <!--end::Container-->
</div>



<div class = "mb-0 landing-dark-bg">
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
        </svg>
    </div>
    <div class="container">
        <!--begin::Row-->
        <div class="row py-10 py-lg-20">
            <!--begin::Col-->
            <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                <!--begin::Block-->
                <div class="rounded border-dashed border-gray p-9 mb-10">
                    <!--begin::Title-->
                    <h2 class="text-light">Do you have any other concerns?</h2>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <span class="fw-normal fs-4 text-light">Email us to
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

<div class="mb-0 ">
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    
    <div class="landing-dark-bg border-gray-200 border-dashed-top">
        
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