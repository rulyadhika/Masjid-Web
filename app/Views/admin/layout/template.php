<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title; ?></title>

    <link rel="icon" href="<?= base_url('asset/images/logo-masjid.png'); ?>">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/asset/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/asset/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- ck-content styles -->
    <link rel="stylesheet" href="/asset/plugins/ckeditor/src/content-styles.css" type="text/css">

    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url("asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>">
    <link rel="stylesheet"
        href="<?= base_url("asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>">

    <style>
        body {
            overflow-x: hidden;
            /* ckeditor */
            --ck-z-default: 100;
            --ck-z-modal: calc(var(--ck-z-default) + 999);
        }

        #word-count {
            padding: 10px 15px;
            margin: 15px 0;
            background: #FAFAFA;
            border-left: 5px #28A745 solid;
            box-shadow: 2px 2px 2px hsla(0, 0%, 0%, 0.1);
        }

        #word-count::before {
            content: 'Statistik Tulisan';
            display: block;
            font-weight: bold;
            font-size: 1em;
            margin-bottom: .2em;
        }

        #word-count .ck-word-count {
            display: flex;
        }

        #word-count .ck-word-count .ck-word-count__words {
            margin-right: 1em;
        }

        .page-item .page-link {
            color: #28A745 !important;
            box-shadow: none !important;
        }

        .page-item.active .page-link {
            color: white !important;
            background-color: #28A745 !important;
            border-color: #28A745 !important;
        }

        .badge.edit-btn,
        .badge.del-btn {
            cursor: pointer;
        }

        .badge.edit-btn:hover,
        .badge.del-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?= $this->include("admin/layout/topbar") ?>
        <?= $this->include("admin/layout/sidebar") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $menuTitle; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url("admin/index") ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?= $menuTitle; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if(session()->getFlashdata('pesan')) :?>
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-dark" role="alert">
                                <i class="fa fa-check-circle mr-1"></i> <?= session()->getFlashdata('pesan') ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php $this->renderSection("content") ?>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->include("admin/layout/footer") ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/asset/js/adminlte.min.js"></script>
    <!-- Swal 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- datatables -->
    <script src="<?= base_url("asset/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?= base_url("asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
    <script src="<?= base_url("asset/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>">
    </script>
    <script src="<?= base_url("asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>">
    </script>

    <?php $this->renderSection("pageScript") ?>
</body>

</html>