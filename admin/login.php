<?php
session_start();
// koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "desa");

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Desa Sebrang - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sb-admin-2.css">

</head>

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login text-center">
                <div class="welcome" style="margin-top: 170px;">
                  <label for="" class=" text-white" style="font-size: 24px; font-weight: 500;">
                    Selamat Datang Di Desa Sebrang kecamatan sebrang
                  </label>
                  <img src="../assets/img/logo/696px-Bandung_coa.png" width="100" height="100">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter username..." name="user">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass">
                    </div>
                    <div class="form-group text-center">
                      <img src="captcha.php" alt="gambar" />
                    </div>
                    <div class="form-group">
                      <input name="kodecaptcha" class="form-control form-control-user" value="" maxlength="5" placeholder="Input Kan code Di atas">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <?php
                    if (isset($_POST['login'])) {
                      $username = mysqli_real_escape_string($koneksi, $_POST['user']);
                      $password = mysqli_real_escape_string($koneksi, md5($_POST['pass']));
                      $query = "SELECT * FROM user WHERE username='$username' AND 
                      password='$password' AND jabatan<>'5'";
                      $ambil = $koneksi->query($query);
                      $akunyangcocok = $ambil->num_rows;
                      // print($query);
                      // die();
                      if ($akunyangcocok == 1 && $_SESSION["code"] == $_POST["kodecaptcha"]) {
                        $_SESSION['admin'] = $ambil->fetch_assoc();
                        echo "<div class='alert alert-info'> Login Sukses</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                      } else {
                        echo "<div class='alert alert-danger'> Login Gagal <br> Kode Captcha Salah</div>";
                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                      }
                    }
                    ?>
                    <button class="btn btn-primary btn-user btn-block" name="login">Login</button>
                    <hr>

                  </form>


                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>