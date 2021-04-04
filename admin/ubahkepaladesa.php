<h1 class="h3 mb-2 text-gray-800">Data Kepala Desa</h1>
<p>Mengubah Data Kepala Desa</p>

<?php
//buat koneksi dengan MySQL
$koneksi = new mysqli('localhost', 'root', '', 'desa');


$id = mysqli_real_escape_string($koneksi, $_GET['id']);

//cek apakah koneksi dengan MySQL berhasil
$sql = "SELECT * FROM kades WHERE id='$id'";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//cek apakah koneksi dengan MySQL berhasil
$sql2 = "SELECT * FROM user WHERE table_join";
$result = mysqli_query($koneksi, $sql2);
$row2 = mysqli_fetch_array($result, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";


?>

<div class="card border-left-primary">
   <div class="card-body">
      <!-- Nested Row within Card Body -->
      <h3 class="panel-title"><i class="fa fa-user"></i> Ubah RW</h3>
      <div class="panel-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md">
                  <div class="form-group">
                     <label for="">Nama Kepala Desa </label>
                     <input type="text" class="form-control form-control-user" name="nama_kades" value="<?php echo $row['nama_kades']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="">Nama Desa </label>
                     <input type="text" class="form-control form-control-user" name="nama_desa" value="<?php echo $row['nama_desa']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="">Tanda Tangan</label> <br>
                     <input type="hidden" name="foto_lama" value="<?php echo $row['ttdimg']; ?>">
                     <img src="<?php echo $row['ttdimg']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="">Update Tanda Tangan </label>
                     <!-- Signature -->
                     <div id="signature">
                        <canvas id="signature-pad" class="signature-pad" width="300px" height="200px"></canvas>
                     </div>
                     <br />
                     <input type="hidden" name="img" class="img">
                  </div>
               </div>

               <div class="col-md">
                  <div class="form-group">
                     <label for="">Username </label>
                     <input type="text" class="form-control" name="username" value="<?php echo $row2['username']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="">password </label>
                     <input type="password" class="form-control" name="password" value="<?php echo $row2['password']; ?>">
                  </div>
               </div>
            </div>
            <br>
            <button class="btn btn-primary submit" name="ubah"> <i class="fa fa-save"></i> Tambah Data</button>
         </form> <!-- /.form-->
         <?php

         if (isset($_POST['ubah'])) {

            // requires php5
            define('UPLOAD_DIR', 'img/tanda_tangan/');
            $nama_kades = $_POST['nama_kades'];
            $nama_desa = $_POST['nama_desa'];
            $img = $_POST['img'];
            $foto_lama = $_POST['foto_lama'];

            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $success = file_put_contents($file, $data);

            //insert ke database
            // $query = "INSERT INTO rt (no_rt,nama_rt,ttd64,ttdimg) VALUES('$nort','$nama_rt','$img','$file')";
            if (!empty($img && $file)) {
               unlink($foto_lama);
               move_uploaded_file($file, $img);
               $query = "UPDATE kades SET nama_kades='$nama_kades',nama_desa='$nama_desa', ttd64='$img', ttdimg='$file' WHERE id='$_GET[id]'";
               mysqli_query($koneksi, $query);
            } else {
               $query = "UPDATE kades SET nama_kades='$nama_kades',nama_desa='$nama_desa' WHERE id='$_GET[id]'";
               mysqli_query($koneksi, $query);
            }

            $insert_id = $koneksi->insert_id;
            if (!empty($password)) {
               $query2 = "UPDATE user SET username='$username',jabatan='4',table_join='$insert_id' WHERE id='$_GET[id]'";
               mysqli_query($koneksi, $query2);
            } else {
               $query2 = "UPDATE user SET username='$username', password='$password',jabatan='4',table_join='$insert_id' WHERE id='$_GET[id]'";
               mysqli_query($koneksi, $query2);
            }

            //tampilkan hasil
            // header("location:index.php?halaman=ketuart");
            echo "<script>alert('Data Berhasil Di Simpan')</script>";
            echo "<script>location='index.php?halaman=kepaladesa';</script>";
         }

         ?>
      </div><!-- /.panel-body -->
   </div>
</div>