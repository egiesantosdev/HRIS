<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getenv('app.name')?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/public/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/public/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/public/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url()?>/public/site.webmanifest">
    <!-- App css -->
    <!-- <link href="<?= base_url()?>/public/assets/css/corporate/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url()?>/assets/css/corporate/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" /> -->
    <!-- <link href="<?= base_url()?>/public/assets/css/corporate/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="<?= base_url()?>/assets/css/corporate/app-green.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" /> -->
    <link href="<?= base_url()?>/public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url()?>/public/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>

    <!-- icons -->
    <link href="<?= base_url()?>/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/plugins/custom/cropper/cropper.bundle.css" rel="stylesheet" type="text/css" />
    

    <link href="<?= base_url()?>/public/assets/css/my-custom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <?= $this->renderSection('css'); ?>

</head>

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <style>
        .bg-blur{
            filter: blur(1px);
            backdrop-filter: blur(1px);
        }

        .optional:after{
            content: " (optional)";
            color: var(--kt-gray-400);
            font-weight: 400;
        }

        body.swal2-shown > [aria-hidden='true'] {
            transition: 0.1s filter;
            filter: blur(2px);
        }

        .swal2-modal{
            padding: 0px;
            overflow: hidden;
        }
    </style>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <?= $this->include('partials/header')?>

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <?= $this->include('partials/sidebar')?>

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                    <?= $this->renderSection('content'); ?>

                    <?= $this->include('partials/footer')?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url()?>/public/assets/libs/jquery/jquery.min.js"></script>

    <!-- PDFMake js -->
    <script src="<?= base_url()?>/public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/pdfmake/build/vfs_fonts.js"></script>

    <!-- App js -->
    <script src="<?= base_url()?>/public/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url()?>/public/assets/js/scripts.bundle.js"></script>

    <!-- Apex js-->
    <script src="<?= base_url()?>/public/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>

    <!-- JMask -->
    <script src="<?= base_url()?>/public/assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>

    <!-- SweetAlert2 js -->
    <script src="<?= base_url()?>/public/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- DATATABLES -->
    <script src="<?=base_url()?>/public/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    
    <script src="<?=base_url()?>/public/assets/plugins/custom/cropper/cropper.bundle.js"></script>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Custom js -->
    <script src="<?= base_url()?>/public/assets/js/my-custom.js"></script>
    <script src="<?= base_url()?>/public/assets/js/services/form-misc.js"></script>

    <script>
        document.onkeydown = function (e) {
            // disable F12 key
            if (e.keyCode == 123) {
                return false;
            }
        }
        const base_url = "<?=base_url()?>";
        const current_url = window.location.href.split('#')[0];
        const user_id = <?=$userInformation->user_id?>

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toastr-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "800",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

    </script>

    <?= $this->renderSection('javascript'); ?>
</body>

</html>