<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "desa");
?>

<?php include 'navbar.php'; ?>

<!-- Login Form -->
<div class="container">

   <!-- Outer Row -->
   <div class="row justify-content-center mt-5">
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
                        <img src="assets/img/logo/696px-Bandung_coa.png" width="100" height="100">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di halaman Login <b>Desa Sebrang</b></h1>
                        </div>
                        <form class="user" method="post">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan NIK ..." name="username">
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                           </div>
                           <div class="form-group text-center">
                              <img src="admin/captcha.php" alt="gambar" />
                           </div>
                           <div class="form-group">
                              <input name="kodecaptcha" class="form-control form-control-user" value="" maxlength="5" placeholder="Input Kan code Di atas">
                           </div>
                           <?php

                           if (isset($_POST['login'])) {
                              $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
                              $password = mysqli_real_escape_string($koneksi, md5($_POST["password"]));
                              $query = " SELECT * FROM user WHERE username='$username' AND 
                              password='$password' AND jabatan='5' ";
                              $ambil = $koneksi->query($query);
                              $yangcocok = $ambil->num_rows;
                              if ($yangcocok == 1 && $_SESSION["code"] == $_POST["kodecaptcha"]) {
                                 $akun = $ambil->fetch_assoc();
                                 $_SESSION['user'] = $akun;
                                 echo "<div class='alert alert-info'> Login Sukses</div>";
                                 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                              } else {
                                 echo "<div class='alert alert-danger'> Login Gagal <br> Kode Captcha Salah</div>";
                                 echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                              }
                           }
                           ?>

                           <button class="btn btn-primary btn-user btn-block" name="login">Login</button> <br>
                           <small class="text-danger text-sm mt-2">
                              *Untuk Mendapatkan Akun, bisa WA NO ini : 08975562154714
                           </small>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Akhir Login Form -->









   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->

   <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   </body>

   </html>