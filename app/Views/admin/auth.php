<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>
    <?= $this->include('part/PartCSS') ?>
    <?= $this->include('part/GtagsManager') ?>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url(); ?>/assets/img/logo.png" alt="logo" width="250">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= route_to('auth-admin') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="username" class="form-control" name="USERNAME" tabindex="1" onkeyup="this.value = this.value.toUpperCase()" autofocus required>
                                        <div class="invalid-feedback">
                                            Username anda masih kosong!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="PASSWORD" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Password anda masih kosong!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla <?= date('Y') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?= $this->include('part/PartJS') ?>
    <script>
        <?php if (session()->getFlashData('pesan')) : ?>
            swal('Gagal', '<?= session()->getFlashData('pesan'); ?>', 'warning', {
                buttons: false,
                timer: 1200,
            });
        <?php endif ?>
    </script>
</body>

</html>