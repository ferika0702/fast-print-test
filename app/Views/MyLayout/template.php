<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fast Print</title>

    <?= $this->include('MyLayout/css') ?>
</head>

<body class="sb-nav-fixed">

    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #0C5BC6;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= site_url('/beranda') ?>">
            <img src="<?= base_url('assets/logo/fastprint.jpeg') ?>" class="rounded-circle me-2" width="19%" alt="logo">
            <b> Fast Print </b>
        </a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url() ?>/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- NAVBAR -->


    <div id="layoutSidenav">
        <!-- SIDEBAR -->
        <?= $this->include('MyLayout/sidebar') ?>
        <!-- SIDEBAR -->


        <!-- CONTENT -->
        <div id="layoutSidenav_content">


            <?= $this->renderSection('content') ?>


            <footer class="py-2 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Fast Print 2023</div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- CONTENT -->
    </div>

</body>

</html>