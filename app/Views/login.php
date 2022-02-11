<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url()?>/template/node_modules/bootstrap-social/bootstrap-social.css">

    <script src="<?= base_url()?>/template/assets/SweetAlert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/SweetAlert/sweetalert2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url()?>/template/assets/img/logo.png" alt="logo" width="150"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div id="gagal" data-flash="<?= session()->getFlashdata('error'); ?>"></div>

                            <div class="card-body">
                                <?= form_open(base_url('process')) ?>
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1"
                                        required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>

                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-5 text-muted text-center">
                                    Belum punya akun ? <a href="<?= site_url('registrasi')?>">Registrasi</a>
                                </div>

                            </div>
                        </div>

                        <div class="simple-footer">
                            Copyright &copy; SENTRA KOMPUTER 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url()?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url()?>/template/assets/SweetAlert/sweet.js"></script>
    <script>
    var pesan = "<?= session()->getFlashdata('pesan') ?>";
    const swal = pesan.split(',');
    if (swal.length > 1) {
        if (swal[0] == 'Success') {
            Swal.fire({
                title: 'Success!',
                text: swal[1],
                icon: 'success'
            })
        } else {
            Swal.fire({
                title: 'Error!',
                text: swal[1],
                icon: 'error'
            })
        }
    }
    </script>
    <!-- Template JS File -->
    <script src="<?= base_url()?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url()?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>