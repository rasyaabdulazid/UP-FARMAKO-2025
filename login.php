<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login - Ticketing Kereta Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
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
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
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

        .btn-outline-light {
            border-radius: 1rem;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-outline-light.bg-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-outline-light.bg-danger:hover {
            background-color: #c0392b;
        }

        .login-form {
            padding: 2rem;
        }

        /* Responsive Styling */
        @media (max-width: 576px) {
            .card {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="font-weight-light my-4">Login</h3>
                                </div>
                                <div class="login-form">
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $email = $_POST['email'];
                                        $password = md5($_POST['password']);

                                        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
                                        $cek = mysqli_num_rows($data);

                                        if ($cek > 0) {
                                            session_start();
                                            $_SESSION['user'] = mysqli_fetch_array($data);
                                            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php";</script>';
                                        } else {
                                            echo '<div class="alert alert-danger text-center">Email atau Password salah</div>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Email" required>
                                            <label for="inputEmail"><i class="bi bi-envelope"></i> Email</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required>
                                            <label for="inputPassword"><i class="bi bi-lock"></i> Password</label>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                                            <a class="btn btn-outline-light bg-danger" href="register.php">Belum punya akun? Register</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
