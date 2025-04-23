<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kereta Api</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Global Styles */
        body {
            background:rgb(15, 132, 140);
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .navbar {
            background: rgba(2, 12, 16, 0.6);
            box-shadow: 0px 4px 10px rgba(3, 128, 186, 0.3);
        }
        .sb-sidenav {
            background: rgb(19, 65, 68);
        }
        .sb-nav-link-icon {
            color: #fff;
        }
        footer {
            background-color: rgb(249, 249, 249);
            color: #fff;
            text-align: center;
            padding: 15px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Sidebar Hover Effects */
        .sb-sidenav-menu .nav-link:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .sb-sidenav-menu .nav-link {
            transition: 0.3s;
            color: #fff;
        }

        .card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.27);
            transition: 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }

        /* Button Hover Effect */
        .btn-primary {
            background-color: #3498db;
            border: none;
            transition: 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }

        .sb-sidenav-footer {
            color: #fff;
            font-size: 14px;
            text-align: center;
            padding: 10px;
        }

        /* Gradient Background */
        .card-header {
            background: linear-gradient(45deg,rgb(19, 93, 143), #8e44ad);
            color: white;
            text-align: center;
            padding: 15px;
        }

        /* Form Styles */
        .form-control {
            border-radius: 1rem;
            box-shadow: 0px 2px 6px rgba(12, 62, 76, 0.41);
        }

        /* Container Styles */
        .container-fluid {
            padding-top: 30px;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="index.php">TIKETING</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">HALAMAN UTAMA</div>
                        <a class="nav-link" href="?">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <?php if ($_SESSION['user']['role'] != 'user'): ?>
                            <a class="nav-link" href="?page=kereta">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kereta
                            </a>
                            <a class="nav-link" href="?page=jadwal">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Jadwal
                            </a>
                            <a class="nav-link" href="?page=verifikasi">
                                <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                                Verifikasi & Validasi
                            </a>
                            <a class="nav-link" href="?page=laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Laporan
                            </a>
                        <?php else: ?>
                            <a class="nav-link" href="?page=pemesanan">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pesan Tiket
                            </a>
                            <a class="nav-link" href="?page=pembayaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Pembayaran
                            </a>
                        <?php endif; ?>

                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk Sebagai:</div>
                    <?= $_SESSION['user']['role']; ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php
                        // Menentukan halaman default berdasarkan role
                        if (!isset($_GET['page'])) {
                            $page = ($_SESSION['user']['role'] == 'admin') ? 'admin_home' : 'home';
                        } else {
                            $page = $_GET['page'];
                        }

                        // Include halaman yang tersedia, jika tidak ada tampilkan 404
                        if (file_exists($page . '.php')) {
                            include $page . '.php';
                        } else {
                            include '404.php';
                        }
                    ?>
                </div>
            </main>
            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-muted">© <?= date("Y"); ?> Tiketing</div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
