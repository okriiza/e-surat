<?php

session_start();
// koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "desa");
// mengamankan admin
if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login terlebih dahulu !');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desa Sebrang </title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <script src='js/jquery-3.0.0.js' type='text/javascript'></script>

</head>

<body id="page-top">
    <style>
        #signature {
            width: 300px;
            height: 200px;
            border: 1px solid black;
        }
    </style>

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Desa Sebrang</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Keterangan Penduduk
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users "></i>
                    <span>
                        Penduduk
                    </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Penduduk:</h6>
                        <a class="collapse-item" href="index.php?halaman=ketuart">Ketua RT</a>
                        <a class="collapse-item" href="index.php?halaman=ketuarw">Ketua RW</a>
                        <!-- <a class="collapse-item" href="index.php?halaman=camat">Camat</a> -->
                        <a class="collapse-item" href="index.php?halaman=kepaladesa">Kepala Desa</a>
                        <a class="collapse-item" href="index.php?halaman=warga">Warga</a>
                        <a class="collapse-item" href="index.php?halaman=kartukeluarga">Kartu Keluarga</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=surat">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat Masuk</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->



                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->



                    </ul>

                </nav>
                <div class="container-fluid">

                    <?php
                    if (isset($_GET["halaman"])) {
                        if ($_GET["halaman"] == "warga") {
                            include 'warga.php';
                        } elseif ($_GET["halaman"] == "kartukeluarga") {
                            include 'kartukeluarga.php';
                        } elseif ($_GET["halaman"] == "tambahwarga") {
                            include 'tambahwarga.php';
                        } elseif ($_GET["halaman"] == "logout") {
                            include 'logout.php';
                        } elseif ($_GET["halaman"] == "hapuswarga") {
                            include 'hapuswarga.php';
                        } elseif ($_GET["halaman"] == "ubahwarga") {
                            include 'ubahwarga.php';
                        } elseif ($_GET["halaman"] == "tambahkeluarga") {
                            include 'tambahkeluarga.php';
                        } elseif ($_GET["halaman"] == "ubahkeluarga") {
                            include 'ubahkeluarga.php';
                        } elseif ($_GET["halaman"] == "hapuskeluarga") {
                            include 'hapuskeluarga.php';
                        } elseif ($_GET["halaman"] == "detailakun") {
                            include 'detailakun.php';
                        } elseif ($_GET["halaman"] == "buatakun") {
                            include 'buatakun.php';
                        } elseif ($_GET["halaman"] == "surat") {
                            include 'surat.php';
                        } elseif ($_GET["halaman"] == "ketuart") {
                            include 'ketuart.php';
                        } elseif ($_GET["halaman"] == "ketuarw") {
                            include 'ketuarw.php';
                        } elseif ($_GET["halaman"] == "camat") {
                            include 'camat.php';
                        } elseif ($_GET["halaman"] == "kepaladesa") {
                            include 'kepaladesa.php';
                        } elseif ($_GET["halaman"] == "tambahketuart") {
                            include 'tambahketuart.php';
                        } elseif ($_GET["halaman"] == "tambahketuarw") {
                            include 'tambahketuarw.php';
                        } elseif ($_GET["halaman"] == "tambahcamat") {
                            include 'tambahcamat.php';
                        } elseif ($_GET["halaman"] == "tambahkepaladesa") {
                            include 'tambahkepaladesa.php';
                        } elseif ($_GET["halaman"] == "ubahketuart") {
                            include 'ubahketuart.php';
                        } elseif ($_GET["halaman"] == "ubahketuarw") {
                            include 'ubahketuarw.php';
                        } elseif ($_GET["halaman"] == "ubahcamat") {
                            include 'ubahcamat.php';
                        } elseif ($_GET["halaman"] == "ubahkepaladesa") {
                            include 'ubahkepaladesa.php';
                        } elseif ($_GET["halaman"] == "hapusketuart") {
                            include 'hapusketuart.php';
                        } elseif ($_GET["halaman"] == "hapusketuarw") {
                            include 'hapusketuarw.php';
                        } elseif ($_GET["halaman"] == "hapuscamat") {
                            include 'hapuscamat.php';
                        } elseif ($_GET["halaman"] == "hapuskepaladesa") {
                            include 'hapuskepaladesa.php';
                        } elseif ($_GET["halaman"] == "akunuserkeluarga") {
                            include 'akunusekeluargar.php';
                        } elseif ($_GET["halaman"] == "ubahakunuserkeluarga") {
                            include 'ubahakunuserkeluarga.php';
                        } elseif ($_GET["halaman"] == "hapusakunuserkeluarga") {
                            include 'hapusakunuserkeluarga.php';
                        } elseif ($_GET["halaman"] == "tambahakunuserkeluarga") {
                            include 'tambahakunuserkeluarga.php';
                        } elseif ($_GET["halaman"] == "test") {
                            include 'test.php';
                        } elseif ($_GET["halaman"] == "confirm_surat") {
                            include 'confirm_surat.php';
                        } elseif ($_GET["halaman"] == "importexcel") {
                            include 'importexcel.php';
                        }
                    } else {
                        include 'home.php';
                    }

                    ?>

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php?halaman=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="signature_pad-master/js/signature_pad.js"></script>
    <script>
        $(document).ready(function() {
            var signaturePad = new SignaturePad(document.getElementById('signature-pad'));
            $(".submit").click(function() {
                // var id = $("this").data('id');
                // var idAttr = $("this").attr('data-id');
                // alert("ID NYA " + id);
                // alert("ID NYA " + idAttr);
                var data = signaturePad.toDataURL('image/png');
                $(".img").val(data);
                // if (id) {
                //     $(".form" + id).submit();
                // } else {
                $(".form").submit();
                // }
            });
        });
    </script>
    <script>
    </script>

</body>

</html>