<h1 class="h3 mb-2 text-gray-800">Data RT</h1>
<p>Menambahkan Data RT</p>

<?php
//buat koneksi dengan MySQL
$link = new mysqli('localhost', 'root', '', 'desa');


if (isset($_POST['save'])) {

   // requires php5
   define('UPLOAD_DIR', 'img/tanda_tangan/');
   $nort = $_POST['nort'];
   $nama_rt = $_POST['namart'];
   $img = $_POST['img'];

   $username = $_POST['username'];
   $password = md5($_POST['password']);

   $img = str_replace('data:image/png;base64,', '', $img);
   $img = str_replace(' ', '+', $img);
   $data = base64_decode($img);
   $file = UPLOAD_DIR . uniqid() . '.png';
   $success = file_put_contents($file, $data);

   //insert ke database
   $query = "INSERT INTO rt (no_rt,nama_rt,ttd64,ttdimg) VALUES('$nort','$nama_rt','$img','$file')";
   mysqli_query($link, $query);
   $insert_id = $link->insert_id;

   $query2 = "INSERT INTO user (username,password,jabatan,table_join) VALUES('$username','$password','2','$insert_id')";
   mysqli_query($link, $query2);

   //tampilkan hasil
   // header("location:index.php?halaman=ketuart");
   echo "<script>alert('Data Berhasil Di Simpan')</script>";
   echo "<script>location='index.php?halaman=ketuart';</script>";
}




?>

<div class="card border-left-primary">
   <div class="card-body">
      <!-- Nested Row within Card Body -->
      <h3 class="panel-title"><i class="fa fa-user"></i> Tambah RT</h3>
      <div class="panel-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md">
                  <div class="form-group">
                     <label for="">No RT </label>
                     <input type="number" class="form-control form-control-user" name="nort">
                  </div>
                  <div class="form-group">
                     <label for="">Nama RT </label>
                     <input type="text" class="form-control form-control-user" name="namart">
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
                     <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                     <label for="">password </label>
                     <input type="password" class="form-control" name="password">
                  </div>
               </div>
            </div>
            <br>
            <button class="btn btn-primary submit btn-sm" name="save"> <i class="fa fa-save"></i> Tambah Data</button>
         </form> <!-- /.form-->
      </div><!-- /.panel-body -->
   </div>
</div>