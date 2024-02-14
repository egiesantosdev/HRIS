<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<style>
    .bg-bessy-gradient{
        height:100%;
        z-index: 100;
        /* background-color: #20356a; */
        background-image: url("<?=base_url()?>/public/assets/media/auth/bg4.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    /* .bg-blur{
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(7px);
    } */
</style>
<div class="bg-bessy-gradient">
    <div class="container-fluid bg-blur">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4 d-flex flex-column justify-content-center" style="height:100vh;">
                <div class="card border shadow" style="">
                    <div class="card-header pt-4">
                        <div class="row w-100">
                            <div class="col-6 offset-3">
                                <img src="<?=base_url()?>/public/assets/media/logos/bessy-logo.svg" alt="" class="" style="min-height:50px;">
                            </div>
                        </div>
                        <h4 class="w-100 text-center rounded text-white mt-2 p-1" style="background-color:#184f8c;">
                            Account Registration
                        </h4>
                    </div>
                    <div class="card-body" style="overflow: auto;">
    
                        <?= view('Myth\Auth\Views\_message_block') ?>
    
                        <form action="<?= base_url().route_to('register') ?>" method="post" class="h-100" style="overflow: auto;">
                            <?= csrf_field() ?>
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="">
                                    <div class="form-group mb-3">
                                        <label for="email"><?=lang('Auth.email')?></label>
                                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                               name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" required>
                                        <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                    </div>
            
                                    <div class="form-group mb-3">
                                        <label for="username"><?=lang('Auth.username')?></label>
                                        <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" required>
                                    </div>
            
                                    <div class="separator my-2"></div>
            
                                    <div class="form-group mb-3">
                                        <label for="password"><?=lang('Auth.password')?></label>
                                        <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off" required>
                                    </div>
            
                                    <div class="form-group mb-3">
                                        <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                                        <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off" required>
                                    </div>    
                                </div>
    
                                <div class="d-flex flex-column align-items-center">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" required>
                                        <label class="form-check-label text-dark" for="flexCheckIndeterminate">
                                            I agree with the <a href="#" data-bs-toggle="modal" data-bs-target="#terms-and-conditions-modal">Terms and Conditions</a>.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block "><?=lang('Auth.register')?></button>
                                </div>
                            </div>
                        </form>
    
                        <!-- <hr> -->
                    </div>
                    <div class="card-footer">
                        <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= base_url().route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="terms-and-conditions-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terms and Conditions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            include 'terms_and_conditions.php';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="mx-auto btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
