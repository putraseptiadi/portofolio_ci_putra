<?= $this->extend("layouts/template"); ?>

<?= $this->section("content"); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h3 class="text-center">Login</h3>
        </div>
        <?php if (session()->getFlashdata('login_failed')) : ?>
            <div class="row">
                <div class="alert alert-danger col-lg-4 mx-auto" role="alert">
                    <?= session()->getFlashdata('login_failed'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-4 mx-auto">
            <form method="post" action="<?= base_url('login/proses-login') ?>">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control <?php if ($validation->hasError('email')) echo 'is-invalid' ?>" id="email" name="email" value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?php if ($validation->hasError('password')) echo 'is-invalid' ?>" id="password" name="password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
