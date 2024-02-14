<?= $this->extend('layouts/emptyMain'); ?>
<?= $this->section('content'); ?>

<div class="position-absolute start-0">
    <div class="position-fixed w-100 h-100 d-flex align-items-end m-0" style="z-index: -10;">
        <div class="h-100 w-100 position-relative">
            <svg class="position-absolute opacity-25 bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#009ef7" fill-opacity="1" d="M0,128L60,154.7C120,181,240,235,360,245.3C480,256,600,224,720,176C840,128,960,64,1080,53.3C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
            <svg class="position-absolute opacity-25 bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#009ef7" fill-opacity="1" d="M0,160L60,160C120,160,240,160,360,181.3C480,203,600,245,720,266.7C840,288,960,288,1080,277.3C1200,267,1320,245,1380,234.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
            <svg class="position-absolute opacity-25 bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#009ef7" fill-opacity="1" d="M0,320L60,288C120,256,240,192,360,181.3C480,171,600,213,720,197.3C840,181,960,107,1080,112C1200,117,1320,203,1380,245.3L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-3 col-md-2 col-lg-1 m-auto">
                                <img src="<?=base_url()?>/public/assets/media/logos/bessy-mini-logo.png" alt="Baliwag eServices System logo" id="bessy-logo" class="theme-light-show img-fluid">
                                <img src="<?=base_url()?>/public/assets/media/logos/bessy-mini-logo.png" alt="Baliwag eServices System logo" id="bessy-logo" style="filter: grayscale(200%) invert(100%) brightness(1.2);" class="theme-dark-show img-fluid">
                            </div>
                        </div>
                        <h1 id="welcome-to" class="d-inline m-0">Welcome to <span style="color: #21366b;" class="theme-light-show">Baliwag eServices System</span> <span class="text-white theme-dark-show">Baliwag eServices System</span></h1>
                    </div>
                    <small class="text-muted d-block text-center pt-2 my-2 border-top">Before you can avail the online services of the Baliwag City Hall you must first fill your personal information</small>
                    <form action="" class="p-5" id="user-profile-form">
                        <div class="d-flex justify-content-center align-items-start mb-5">
                            <h3 class="text-gray-600">- -</h3> &nbsp; <h3 class="theme-light-show" style="color: #21366b;"> Personal Information Form </h3> <h3 class="text-white theme-dark-show"> Personal Information Form </h3> &nbsp; <h3 class="text-gray-600">- -</h3>
                        </div>
                        <div class="row g-0 g-md-2">
                            <div class="col-12 col-md-3">
                                <input type="number" name="user_id" class="d-none" value="<?=$userInformation->user_id?>" readonly>
                                <input type="text" name="user_photo" class="d-none" id="file-name">
                                <input type="file" id="user-photo" class="w-100" hidden="">
                                <label for="user-photo" class="d-block user-photo-hover pointer w-100 mb-5 text-center">
                                    <div class="p-2 border mx-auto d-inline-block bg-light rounded position-relative">
                                        <img src="<?=base_url()?>/public/assets/media/avatars/default-avatar.png" data-photo-name="" class="rounded img-fluid user-avatar" id="user-photo-preview" style="" alt="Profile picture">
                                        <div class="position-absolute w-100 h-100 top-0 start-0 bg-light bg-opacity-10 rounded d-flex justify-content-end align-items-end user-photo-hover-overlay">
                                            <div class="bg-light px-2 py-1 rounded">
                                                <i class="fas fa-pen"></i>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 col-md-9 row g-0 g-md-2 ps-0 ps-md-5">
                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="firstname" id="first-name" class="form-control form-control-lg form-control-solid" placeholder="First name" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="middlename" class="form-control form-control-lg form-control-solid" placeholder="Middle name">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="text" name="lastname" class="form-control form-control-lg form-control-solid" placeholder="Last name" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                <input type="text" name="suffix" class="form-control form-control-lg form-control-solid" placeholder="Suffix">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Birthdate</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container">
                                            <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Birthdate" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Contact Number</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <div class="input-group">
                                                <span class="input-group-text border-0">+63</span>
                                                <input type="text" name="contact_number" id="contact-number" class="form-control form-mask mask-contact-number form-control-lg form-control-solid" placeholder="900-000-0000" pattern="^9[0-9]{2}-[0-9]{3}-[0-9]{4}$" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sex</label>

                                    <div class="col-lg-8">
                                        <div class="fv-row fv-plugins-icon-container mb-3 mb-lg-0">
                                            <select class="form-select form-control form-control-solid" aria-label="Default select example" name="sex" required="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-0 gx-md-2 mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="province" required="">
                                                    <option value="" selected disabled>Province</option>
                                                    <?php foreach ($provinces as $key => $province):?>
                                                        <option value="<?=$province->provCode?>"><?= ucwords(strtolower($province->provDesc)) ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" id="city" required="" disabled>
                                                    <option value="" selected disabled>City/Municipality</option>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 fv-row fv-plugins-icon-container">
                                                <select class="form-select form-select-search form-control form-control-solid" aria-label="Default select example" name="brgy_id" id="brgy-id" required="" disabled>
                                                    <option value="" selected disabled>Barangay</option>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-4 order-lg-1 order-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="house_number" class="form-control form-control-lg form-control-solid" placeholder="House Number">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-lg-8 order-lg-2 order-1 fv-row fv-plugins-icon-container">
                                                <input type="text" name="street_name" class="form-control form-control-lg form-control-solid" placeholder="Street" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-12 text-end order-3">
                                                <small class="text-muted"><i class="fas fa-exclamation-circle "></i> Select your province first, then select your city / municipality and barangay</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?=base_url()?>/logout" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit Information</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>

<div class="modal fade" tabindex="1" id="my-profile-photo-crop-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 d-flex justify-content-center">
                <img src="" alt="" class="img-fluid rounded" id="my-profile-photo-crop-image">
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="crop-button">Save Photo</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/services/form-misc.js"></script>
<script>
    $(document).ready(function () {
        const cropper_modal = bootstrap.Modal.getOrCreateInstance(document.querySelector("#my-profile-photo-crop-modal"))
        let cropper, uploaded_filename;

        $("#province").change(function(){
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getCityMun/"+this.value,
                success: function (response) {
                    $("#city").html(`<option value="" selected disabled>City/Municipality</option>`).removeAttr("disabled");
                    $("#brgy-id").html(`<option value="" selected disabled>Barangay</option>`).attr("disabled", "");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#city").append(`<option value="${res.citymunCode}">${titleCase(res.citymunDesc)}</option>`)
                    });
                }
            });
        })

        $("#city").change(function(){
            $.ajax({
                type: "get",
                url: "<?=base_url()?>/UtilController/getBarangay/"+this.value,
                success: function (response) {
                    $("#brgy-id").html(`<option value="" selected disabled>Barangay</option>`).removeAttr("disabled");
                    const result = JSON.parse(response)
                    result.forEach(res => {
                        $("#brgy-id").append(`<option value="${res.id}">${titleCase(res.brgyDesc)}</option>`)
                    });
                }
            });
        })

        $("#user-profile-form").submit(function (e) { 
            e.preventDefault();
            $("#file-name").val($("#user-photo-preview")[0].dataset.photoName ? $("#user-photo-preview")[0].dataset.photoName : "");
            console.table($(this).serializeArray())
            pageLoader(true)
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>/users/addPublicUserInfo",
                data: $(this).serialize(),
                success: function (response) {
                    $.post(base_url + '/UtilController/moveUserAvatar/'+uploaded_filename)
                        .done(function(){
                            pageLoader(false)
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully Created",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result)=>{
                                location.reload();
                            })
                        }).fail(function() {
                            pageLoader(false)
                            Swal.fire({
                                icon: 'success',
                                title: "Account Successfully Created",
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result)=>{
                                location.reload();
                            })
                        })
                }
            })
        });

        $("#user-photo").on("change", function () {
            const image = document.querySelector("#my-profile-photo-crop-image");
            const [file] = this.files
            if(file.size / 1024 / 1024 < 5){
                if (file) {
                    image.src = URL.createObjectURL(file)
                }
    
                cropper = new Cropper(image, {
                    aspectRatio: 1 / 1,
                    dragMode: "move",
                    viewMode: 1,
                    background: false,
                    minContainerWidth: 450,
                    minContainerHeight: 420,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                });
                cropper.reset()
                cropper_modal.show();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: "File size must not exceed 5Mb",
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        })

        document.querySelector("#my-profile-photo-crop-modal").addEventListener('hidden.bs.modal', event => {
            if(cropper){
                cropper.destroy()
            }
        })

        $("#my-profile-photo-crop-modal #crop-button").click(function(){
            const cropped_image = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            pageLoader(true)
            $.ajax({
                type: "POST",
                url: base_url + '/UtilController/uploadUserAvatar/'+user_id,
                data: {'dataURL': cropped_image},
                success: (data)=>{
                    if(data){
                        console.log(data)
                        $("#user-photo-preview").attr("data-photo-name", data)
                        uploaded_filename = data;
                        $(".user-avatar").attr("src", base_url+"/public/assets/media/avatars/temp/"+data)
                        cropper_modal.hide();
                        pageLoader(false)
                    }else{
                        pageLoader(false)
                        Swal.fire({
                            icon: 'error',
                            title: "Image not uploaded",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                },
            });
        })
    });

    function titleCase(str) {
        str = str.toLowerCase().split(' ');
        for (var i = 0; i < str.length; i++) {
            str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
        }
        return str.join(' ');
    }
</script>
<?= $this->endSection(); ?>