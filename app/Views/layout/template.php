<!DOCTYPE html>
<html lang="en" ng-app="apps">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Buku Induk Siswa</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('template/assets/img/favicon.ico')?>">
    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url()?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="icon" type="image/ico" href="<?= base_url()?>/favicon">
    <!-- SweetAlert -->
    <script src="<?= base_url()?>/template/assets/SweetAlert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/SweetAlert/sweetalert2.min.css">

    <link rel="stylesheet" href="<?= base_url()?>/template/node_modules/select2/dist/css/select2.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>/template/assets/css/components.css">

    <script src="<?= base_url()?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>/libs/loading/dist/loadingoverlay.min.js"></script>




</head>

<body>
    <!-- <div class="ring">
        LOADING
    </div> -->
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                    </ul>
                    <div class="search-element">

                    </div>
                </form>
                <ul class="navbar-nav navbar-right">


                    <li class="dropdown"><a href="" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url()?>/template/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= session()->get('nama')?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('Authentication/logout');?>"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url('home')?>">BUKU INDUK SISWA</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url('home')?>">BIS</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/menu'); ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <?= $this->renderSection('content'); ?>

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Design By Ahmad Farhan Maulana</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url()?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url()?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url()?>/template/assets/js/stisla.js"></script>


    <script src="<?= base_url()?>/template/assets/SweetAlert/sweet.js"></script>
    <!-- <script>
    Swal.fire('Any fool can use a computer')
  </script> -->
    <!-- Template JS File -->
    <script src="<?= base_url()?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url()?>/template/assets/js/custom.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url()?>/template/node_modules/chart.js/dist/Chart.min.js"></script>
    <!-- chart -->
    <script src="<?= base_url()?>/template/node_modules/select2/dist/js/select2.full.min.js"></script>

    <script src="<?=base_url()?>/libs/angular/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js"
        integrity="sha512-JkCv2gG5E746DSy2JQlYUJUcw9mT0vyre2KxE2ZuDjNfqG90Bi7GhcHUjLQ2VIAF1QVsY5JMwA1+bjjU5Omabw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.30/angular-ui-router.min.js"
        integrity="sha512-HdDqpFK+5KwK5gZTuViiNt6aw/dBc3d0pUArax73z0fYN8UXiSozGNTo3MFx4pwbBPldf5gaMUq/EqposBQyWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-animate/1.8.2/angular-animate.min.js"
        integrity="sha512-jZoujmRqSbKvkVDG+hf84/X11/j5TVxwBrcQSKp1W+A/fMxmYzOAVw+YaOf3tWzG/SjEAbam7KqHMORlsdF/eA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?=base_url()?>/js/apps.js"></script>
    <script src="<?=base_url()?>/js/services/helper.services.js"></script>
    <script src="<?=base_url()?>/js/services/auth.services.js"></script>
    <script src="<?=base_url()?>/js/services/admin.services.js"></script>
    <script src="<?=base_url()?>/js/services/message.services.js"></script>
    <script src="<?=base_url()?>/js/controllers/admin.controllers.js"></script>

    <script src="<?=base_url()?>/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>/libs/swangular/swangular.js"></script>
    <script src="<?=base_url()?>/libs/angular-datatables/dist/angular-datatables.min.js"></script>
    <script src="<?=base_url()?>/libs/angular-locale_id-id.js"></script>
    <script src="<?=base_url()?>/libs/input-mask/angular-input-masks-standalone.min.js"></script>
    <script src="<?=base_url()?>/libs/jquery.PrintArea.js"></script>
    <script src="<?=base_url()?>/libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
    <script src="<?=base_url()?>/libs/loading/dist/loadingoverlay.min.js"></script>
    <script src="<?=base_url()?>/libs/calendar/main.min.js"></script>
    <script src="<?=base_url()?>/libs/calendar/locales-all.min.js"></script>
    <script src="<?=base_url()?>/libs/angularjs-currency-input-mask/dist/angularjs-currency-input-mask.min.js">
    </script>
    <script>
    $.LoadingOverlay("show");
    </script>


</body>

</html>