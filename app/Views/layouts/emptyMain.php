<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baliwag eService System</title>
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

    <!-- third party css -->
    <link href="<?= base_url()?>/public/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />

    <!-- SWEETALERT2 -->
    <link href="<?= base_url()?>/public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />

    <!-- icons -->
    <link href="<?= base_url()?>/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>/public/assets/plugins/custom/cropper/cropper.bundle.css" rel="stylesheet" type="text/css" />
    

    <link href="<?= base_url()?>/public/assets/css/my-custom.css" rel="stylesheet" type="text/css" />

    <?= $this->renderSection('css'); ?>
</head>

<body class="" data-layout-mode="horizontal" data-sidebar-size="default" data-sidebar-color="light"
    data-layout-width="fluid" data-layout-menu-position="fixed" data-sidebar-showuser="false" data-topbar-color="dark"
    data-new-gr-c-s-check-loaded="14.1062.0" data-gr-ext-installed="">

    <!-- <div class="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    
                </div>
            </div>
        </div>
    </div> -->
    <?= $this->renderSection('content'); ?>

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

    <!-- DataTables js -->
    <script src="<?= base_url()?>/public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url()?>/public/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    
    <script src="<?=base_url()?>/public/assets/plugins/custom/cropper/cropper.bundle.js"></script>

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
    </script>

    <?= $this->renderSection('javascript'); ?>
</body>

</html>