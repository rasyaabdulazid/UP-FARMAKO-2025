<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            font-family: 'Arial', sans-serif;
        }

        #layoutAuthentication {
            height: 100vh;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: #2a5298;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            padding: 15px 0;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: #2a5298;
            border: none;
            border-radius: 1rem;
            padding: 10px 20px;
            width: 100%;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #1e3c72;
        }

        .btn-danger {
            background: #e74c3c;
            border-radius: 1rem;
            padding: 10px 20px;
            width: 100%;
            text-align: center;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        /* Responsive Styling */
        @media (max-width: 576px) {
            .card {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="font-weight-light my-4">Registrasi</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $password = md5($_POST['password']);
                                        $role = 'user'; // Force jadi user, admin tidak bisa daftar sendiri

                                        $insert = mysqli_query($koneksi, "INSERT INTO user (nama, email, password, role) VALUES('$nama','$email','$password','$role')");

                                        if ($insert) {
                                            echo '<script>alert("Selamat, registrasi berhasil! Silakan login."); location.href="login.php";</script>';
                                        } else {
                                            echo "<script>alert('Gagal registrasi, silakan coba lagi');</script>";
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama">
                                            <label>Nama Lengkap</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" required name="email" placeholder="Masukkan Email">
                                            <label>Email</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" type="password" required placeholder="Masukkan Password">
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <!-- Role tidak ditampilkan, default langsung user -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <a class="btn btn-danger" href="login.php">Sudah Punya Akun? Login</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
