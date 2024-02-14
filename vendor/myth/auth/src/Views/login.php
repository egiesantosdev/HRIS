<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<?php session()->set('redirect_url', base_url().route_to('dashboard'));?>
<style>
    .btn-primary{
        
    }
</style>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                
                    <form action="<?= base_url().route_to('login') ?>" method="post" class = "form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form">
                        <?= csrf_field() ?>
                        <div class="text-center">
                             <a href="../../demo1/dist/index.html" class="mb-0 mb-lg-12">
                                <!-- <img alt="Logo" src="<?= base_url()?>/public/assets/media/logos/blink-11.png" class="h-60px h-lg-75px h-l-75px"> -->
                                HRIS LOGO
                            </a>
                            <!--<h1 class="text-dark fw-bolder mb-3">Sign In</h1> -->
                            <!-- <div class="text-gray-500 fw-semibold fs-6">Your Social Accounts</div> -->
                        </div>
                        <!-- <div class="row g-3 mb-9">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= base_url()?>/public/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3">Sign in with Google</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= base_url()?>/public/assets/media/svg/brand-logos/facebook-4.svg" class="theme-light-show h-15px me-3">
                                <img alt="Logo" src="<?= base_url()?>/public/assets/media/svg/brand-logos/facebook-4.svg" class="theme-dark-show h-15px me-3">Sign in with Facebook</a>
                            </div>
                        </div> -->
                        <div class="separator separator-content my-8">
                            <span class="w-125px text-gray-500 fw-semibold fs-7">Sign In</span>
                        </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <div class="mb-2">
                                <?php if ($config->validFields === ['email']): ?>
                                    <div class="form-group">
                                        <!-- <label for="login"><?=lang('Auth.email')?></label> -->
                                        <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            name="login" placeholder="<?=lang('Auth.email')?>" value = "<?= set_value('login')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <!-- <label for="login"><?=lang('Auth.emailOrUsername')?></label> -->
                                        <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <div class="mb-2">
                                <!-- <label for="password" class="form-label"><?=lang('Auth.password')?></label> -->
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                                    <!-- <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2 d-none"></i>
                                        <i class="bi bi-eye fs-2"></i>
                                    </span> -->
                                    <div class="input-group-text hidden" data-password="false" id = "password-icon" onClick="changeIcon()">
                                        <span class="bi bi-eye-slash" id = "icon-cont"></span>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <?php if ($config->activeResetter): ?>
                                <a href="<?= base_url().route_to('forgot') ?>" class="text-muted float-end"><small><?=lang('Auth.forgotYourPassword')?></small></a>
                            <?php endif; ?>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <!-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                        <a href="<?= base_url()?>/register" class="link-primary">Sign up</a></div> -->
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <!-- <div class="d-flex flex-center flex-wrap px-5">
                <div class="d-flex fw-semibold text-primary fs-base">
                    <a href="../../demo1/dist/pages/team.html" class="px-5" target="_blank">Terms</a>
                    <a href="../../demo1/dist/pages/pricing/column.html" class="px-5" target="_blank">Plans</a>
                    <a href="../../demo1/dist/pages/contact.html" class="px-5" target="_blank">Contact Us</a>
                </div>
            </div> -->
            <!--end::Footer-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2 m-2 rounded border border-light-primary bg-light-primary" style="-background-image: url(<?= base_url()?>/public/assets/media/misc/auth-bg.png)">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <!-- <a href="../../demo1/dist/index.html" class="mb-0 mb-lg-12">
                    <img alt="Logo" src="<?= base_url()?>/public/assets/media/logos/blink-09.png" class="h-60px h-lg-75px mb-10">
                </a> -->
                <!--end::Logo-->
                <!--begin::Image-->
                <!-- <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="<?= base_url()?>/public/assets/media/misc/auth-screens.png" alt=""> -->
                <!--end::Image-->
                <!--begin::Title-->
                <!-- <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1> -->
                <!--end::Title-->
                <!--begin::Text-->
                <!-- <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
                <br>and provides some background information about
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                <br>work following this is a transcript of the interview.</div> -->
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>

<?= $this->endSection() ?>
<?= $this->section('javascript'); ?>

<script>

let passIcon = document.getElementById('password-icon');
let iconCont = document.getElementById('icon-cont');
let passInputField = document.querySelector('input[type="password"]');


function changeIcon(){

    if(passIcon.classList.contains('hidden')){

        passIcon.classList.remove('hidden');
        passIcon.classList.add('show');
        iconCont.className = 'ri-eye-line';
        
        passInputField.type = "text";
    }
    else{

        passIcon.classList.remove('show');
        passIcon.classList.add('hidden');
        iconCont.className = 'ri-eye-off-line';

        passInputField.type = "password";
    }

}

</script>
<?= $this->endSection() ?>
