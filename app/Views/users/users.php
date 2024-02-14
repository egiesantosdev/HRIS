<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" id = "add-user-btn" class="btn btn-primary btn-sm waves-effect waves-light float-right"><span class = "ri-user-add-line"></span> Add User</button>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">

                        <div class = "btn-actions-container">
                            
                        </div>

                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <div class = "table-responsive">

                            <table class = "table table-hover table-rounded border align-middle gs-7 gy-5 my-0" id = "data-table" style = "width: 100%">
                                <thead class = "text-primary fw-bold border-bottom border-gray-200">
                                    <tr>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Department Name</th>
                                        <!-- <th>Status</th> -->
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <th class="filterhead"></th>
                                        <!-- <th class="filterhead"></th> -->
                                        <th class=""></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="user-form-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-right">
        <div class="modal-content" id = "modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                
                <form role="form" id = "" class="needs-validation user-form form fv-plugins-bootstrap5 fv-plugins-framework form-vessel" method = "POST" novalidate>
                    
                    <div class="mb-13 text-center ">
                        <!--begin::Title-->
                        <h1 class="mb-3 modal-title">Set First Target</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5 ">If you are experiencing problem, please contact
                        <a href="#" class="fw-bold link-primary">System Administrator</a>.</div>
                        <!--end::Description-->
                    </div>
                    
                    <div class="separator separator-dashed my-10"></div>
                    
                    <input type="hidden" class="form-control form-control-sm" id="user_id" name = "user_id">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="mb-8 text-left">
                                <!--begin::Title-->
                                <h3 class="mb-3">Account Information</h3>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="w-100 mb-5">
                                <label class="d-flex align-items-center fs-6 fw-semibold ">
                                    <span class="">Email: </span>
                                
                                </label>
                                <input type="email" class="form-control form-control-solid w-100 fw-bold" placeholder="Enter Email" name="email" id = "email" value = "@baliwag.gov.ph" required>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-1">Username</label>
                                <input type="text" class="form-control form-control-solid fw-bold" placeholder="Enter Username" name="username" id = "username" required>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-1">Department</label>
                                <select name="dept_id" id="dept_id" class = "form-select form-select-solid" required>
                                    <option value = "" selected disabled>Select Department</option>
                                    <?php foreach ($departments as $department) : ?>
                                        <option value="<?= $department->dept_id ?>"><?= $department->dept_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-1">Role</label>
                                <select class="form-select form-select-solid" id="role" name = "role" aria-label="Floating label select example" required>
                                    <option value = "" selected disabled>Select Role</option>

                                    <?php foreach ($roles as $role) : ?>
                                        <option value="<?= $role->role_id ?>"><?= $role->role_description ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="mb-8 text-left">
                                <!--begin::Title-->
                                <h3 class="mb-3">Personal Information</h3>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-2">Firstname</label>
                                <input type="text" class="form-control form-control-solid" id="firstname" name = "firstname" placeholder="Enter Firstname" required>
                            </div>
                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-2 optional">Middlename</label>
                                <input type="text" class="form-control form-control-solid" id="middlename" name = "middlename" placeholder="Enter Middlename" required>
                            </div>
                            <div class="w-100 mb-5">
                                <label class="fs-6 fw-semibold mb-2">Lastname</label>
                                <input type="text" class="form-control form-control-solid" id="lastname" name = "lastname" placeholder="Enter Lastname" required>
                            </div>
                            <div class="w-50 mb-5">
                                <label class="optional fs-6 fw-semibold mb-2">Birthdate</label>
                                <input type="date" class="form-control form-control-solid" id="birthdate" name = "birthdate" placeholder="Enter Birthdate" required> 
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="mb-8 text-left">
                                <!--begin::Title-->
                                <h3 class="mb-3">Account Actions</h3>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex" >
                                <div class="col-md-4 col-lg-4 col-xxl-4 me-2" id = "reset-password">
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-gray-500 d-flex text-start p-6 h-100 hover-elevate-up" data-kt-button="true">
                                        <span class="ms-5">
                                            <span class="fs-4 fw-bold mb-1 d-block">Reset Password</span>
                                            <span class="fw-semibold fs-7 text-gray-600">Account password will be set to default password.</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xxl-4 me-2 active-container" id = "user-status">
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary border-gray-500 d-flex text-start p-6 h-100 hover-elevate-up" data-kt-button="true">
                                        <span class="ms-5">
                                            <span class="fs-4 fw-bold mb-1 d-block" id = "user-status-text">Deactivate Account</span>
                                            <span class="fw-semibold fs-7 text-gray-600">Deactivate the current user account.</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xxl-4 me-2 ban-container" id="ban-user">
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-danger btn-hover-light-danger border-danger d-flex text-start p-6 h-100 hover-elevate-up" data-kt-button="true">
                                        <span class="ms-5">
                                            <span class="fs-4 fw-bold mb-1 d-block ban-text">Ban Account</span>
                                            <span class="fw-semibold fs-7 text-gray-600">Completely ban the user from using the system.</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="mb-8 text-left">
                            </div>
                        </div>
                        <div class="col-md-9  p-0">
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 px-5 py-5 py-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-2hx me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="currentColor"/>
                                        <path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold fs-7">
                                        <h6 class="fw-bold"> Reminders</h6>
                                        <div class=" text-gray-700">Newly created accounts are using default password that is set by System Administrator.
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-3 ">
                            <div class="mb-8 text-left">
                            </div>
                        </div>
                        <div class="col-md-9 p-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light-danger me-3 w-100" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary form-btn w-100 btn-vessel">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="text-right">

                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>
<?= $this->section('css'); ?>
      <link rel="stylesheet" href="<?=base_url()?>/public/">                          
<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>

<!-- third party js -->
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
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/vfs_fonts.js"></script>

<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/public/assets/js/users/users.js"></script>

<script>
    let dataTables;
    $(document).ready(function () {

        let _dataTablesObj;
        var target = document.querySelector("#modal-content");
        let blockElement = new KTBlockUI(target, {
            overlayClass: 'bg-blur bg-opacity-25'
        });

        dataTables = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: current_url + '/getUsers',
            responsive: true,
            createdRow: function (row, data, rowIndex) {
                if(data['active'] != 1){
                    $(row).addClass('bg-light-danger');
                }
            },
            columns: [{
                    data: 'email',
                    render: function (data, display, row) {
                        return  `<div class="symbol symbol-50px me-2ddd">
                                    <img src = "${base_url}/public/assets/media/avatars/${row.user_photo?row.user_photo:'default-avatar.png'}" class="ms-5 me-8">
                                </div>
                            ${data}`
                    }
                },
                {
                    data: 'username'
                },
                {
                    data: 'firstname'
                },
                {
                    data: 'lastname'
                },
                {
                    data: 'dept_name',
                },
                {
                    data: 'actions',
                    orderable: false,
                }
            ],
            initComplete: function (settings, json) {
                var indexColumn = 0;

                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");

                    $(input).attr('placeholder', 'Search')
                        .addClass('form-control form-control-sm')
                        .appendTo($('.filterhead:eq(' + indexColumn + ')').empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });

                    indexColumn++;


                });

                _dataTablesObj = json.data;
            }
        });

        $(document).on('click', '#add-user-btn', function () {

            $('#user-form-modal').modal('show');
            $('.modal-title').text('Add New System User');
            $('.form-vessel').trigger('reset');
            $('.form-vessel').attr('id', 'add-user');
            // confirm(
            //     'Wait!', 
            //     'Are you sure you want to update this record?', 
            //     'warning',
            //     '<?= base_url()?>/users/addUser',
            //     $(this).serialize()
            // );
        });

        $(document).on('submit', '#add-user', async function () {

            event.preventDefault();

            confirm(
                'Wait!',
                'Are you sure you want to add this record?', 
                'warning',
                '<?= base_url()?>/users/addUser',
                $(this).serialize(),
                function(data){
                    if(!data.error){
                        successAlert('Yey!', data.message, 'info');
                        dataTables.ajax.reload();
                    }
                    else{
                        errorAlert('Oop!', data.message, 'error');
                    }
                }
            );
        });

        
        $(document).on('click', '.edit-btn', async function  () {
            let filteredObj = await filterObject(_dataTablesObj, 'user_id', this.dataset.id)
            sendToForm(filteredObj[0]);
            
            blockElement.block();
            $('.form-vessel').attr('id', 'edit-user');
            $('.modal-title').text('Update User');
            $('.btn-vessel').text('Update');
            
            setTimeout(() => {
                blockElement.release();
                toastr.success('User Found');
            }, 1000);
            
            $('#user-form-modal').modal('show');
        });

        $(document).on('submit', '#edit-user', async function () {
            event.preventDefault();
            confirm(    
                'Wait!',
                'Are you sure you want to update this record?', 
                'question',
                '<?= base_url()?>/users/updateUser',
                $(this).serialize(),
                function(data){
                    if(!data.error){
                        successAlert('Yey!', data.message, 'info');
                        dataTables.ajax.reload();
                        $('#user-form-modal').modal('hide');
                    }
                    else{
                        errorAlert('Oop!', data.message, 'error');
                    }
                }
            );
        });

        $(document).on('click', '#reset-password', function(){
            let userId = $('#user_id').val();

            confirm(    
                'Wait!',
                'Are you sure you want to reset this <span class = "fw-bold">user\'s password</span>?', 
                'question',
                '<?= base_url()?>/users/resetUserPassword/'+userId,
                {},
                function(data){
                    if(!data.error){
                        successAlert('Yey!', data.message, 'info');
                        dataTables.ajax.reload();
                        $('#user-form-modal').modal('hide');
                    }
                    else{
                        errorAlert('Oop!', data.message, 'error');
                    }
                }
            );
        });

    });
</script>
<?= $this->endSection(); ?>