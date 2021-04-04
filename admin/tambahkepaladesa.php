<h1 class="h3 mb-2 text-gray-800">Data Kepala Desa</h1>
<p>Menambahkan Data Kepala Desa</p>

<?php
//buat koneksi dengan MySQL
$link = new mysqli('localhost', 'root', '', 'desa');

if (isset($_POST['save'])) {

   // requires php5
   define('UPLOAD_DIR', 'img/tanda_tangan/');
   $nama_kades = $_POST['nama_kades'];
   $nama_desa = $_POST['nama_desa'];
   $img = $_POST['img'];

   $username = $_POST['username'];
   $password = md5($_POST['password']);

   $img = str_replace('data:image/png;base64,', '', $img);
   $img = str_replace(' ', '+', $img);
   $data = base64_decode($img);
   $file = UPLOAD_DIR . uniqid() . '.png';
   $success = file_put_contents($file, $data);

   //insert ke database
   $query = "INSERT INTO kades (nama_kades,nama_desa,ttd64,ttdimg) VALUES('$nama_kades','$nama_desa','$img','$file')";
   mysqli_query($link, $query);
   $insert_id = $link->insert_id;

   $query2 = "INSERT INTO user (username,password,jabatan,table_join) VALUES('$username','$password','4','$insert_id')";
   mysqli_query($link, $query2);

   //tampilkan hasil
   // header("location:index.php?halaman=ketuart");
   echo "<script>alert('Data Berhasil Di Simpan')</script>";
   echo "<script>location='index.php?halaman=kepaladesa';</script>";
}
?>

<div class="card border-left-primary">
   <div class="card-body">
      <!-- Nested Row within Card Body -->
      <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Kepala Desa</h3>
      <div class="panel-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md">
                  <div class="form-group">
                     <label for="">Nama Kepala Desa </label>
                     <input type="text" required class="form-control form-control-user" name="nama_kades">
                  </div>
                  <div class="form-group">
                     <label for="">Nama Desa </label>
                     <input type="text" required class="form-control form-control-user" name="nama_desa">
                  </div>
                  <div class="form-group">
                     <label for="">Tanda Tangan </label>
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
                     <input type="text" required class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <label for="">password </label>
                     <input type="password" required class="form-control" name="password">
                  </div>
               </div>
            </div>
            <br>
            <button class="btn btn-primary submit" name="save"> <i class="fa fa-save"></i> Tambah Data</button>
         </form> <!-- /.form-->
      </div><!-- /.panel-body -->
   </div>
</div>