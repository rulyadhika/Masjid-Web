<?= $this->extend($config->customViewLayout); ?>

<?= $this->section("pageInfo"); ?>
<title>Login - Masjid Assalam</title>
<?= $this->endSection(); ?>

<?= $this->section("contentSection"); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url(); ?>"><b>Masjid</b> Assalam</a> - <?= lang('Auth.loginTitle') ?>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <!-- badAttempt -->
            <?php if (session('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    Unable to log you in. Please check your credentials.
                </div>
                <!-- activation success -->
            <?php elseif (session('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('message'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>

                <?php if ($config->validFields === ['email']) : ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?php if (session('errors.login') || session('error')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?php if (session('errors.login') || session('error')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control <?php if (session('errors.password') || session('error')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <?php if ($config->allowRemembering) : ?>
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="customCheck" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                <label for="customCheck"><?= lang('Auth.rememberMe') ?></label>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                    </div>
                    <!-- /.col -->
                </div>

            </form>

            <?php if ($config->allowRegistration) : ?>
                <p class="mb-0">
                    <a href="<?= route_to('register') ?>" class="text-center"><?= lang('Auth.needAnAccount') ?></a>
                </p>
            <?php endif; ?>
            <?php if ($config->activeResetter) : ?>
                <p class="mb-1">
                    <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                </p>

            <?php endif; ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<?= $this->endSection(); ?>