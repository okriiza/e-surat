<?php

$ambil = $koneksi->query("SELECT * FROM t_kk WHERE id_kk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<h1 class="h3 mb-2 text-gray-800">Buat Akun Keluarga</h1>
<p>Membuat Akun Keluarga</p>

<div class="card border-left-primary">
   <div class="card-body">
      <!-- Nested Row within Card Body -->

      <h3 class="panel-title"><i class="fa fa-user"></i> Buat Akun Keluarga</h3>

      <div class="panel-body">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md">
                  <div class="form-group">
                     <label for="">No KK </label>
                     <input type="number" readonly class="form-control form-control-user" name="kk" value="<?php echo $pecah['no_kk']; ?>">
                  </div>
                  <div class="form-group">
                     <label for="">Password</label>
                     <input type="password" class="form-control form-contorl-user" name="password" value="">
                  </div>
               </div>
               <div class="col-md">
                  <div class="form-group">
                     <label for="">Nama Kepala Kelurga </label>
                     <input type="text" readonly class="form-control" name="kepala" value="<?php echo $pecah['kepala_keluarga']; ?>">
                  </div>
               </div>
            </div>
            <button class="btn btn-primary" name="ubah"> <i class="fa fa-save"></i> Buat Akun</button>
         </form> <!-- /.form-->

         <?php

         if (isset($_POST['ubah'])) {
            $koneksi->query("INSERT INTO t_user_keluarga (no_kk,password,nama_lengkap) VALUE ('$_POST[kk]','$_POST[password]','$_POST[kepala]')");
            echo "<script>alert('Akun Keluarga Telah Di Buat')</script>";
            echo "<script>location='index.php?halaman=detailakun';</script>";
         }

         ?>

      </div> <!-- /.panel-body -->

   </div>
</div>