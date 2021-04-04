<?php
if (!isset($_SESSION)) {
   session_start();
}

if (!isset($_SESSION["user"])) {
   echo "<script>alert('Silahkan Login');</script>";
   echo "<script>location='login.php';</script>";
}

$koneksi = new mysqli("localhost", "root", "", "desa");
?>


<?php include 'navbar.php'; ?>

<!-- Post -->
<div class="container">
   <div class="row form-pengajuan">
      <div class="col-md-8">
         <!-- <div class="card border-left-primary">
            <div class="card-body"> -->
         <!-- Nested Row within Card Body -->
         <h4 class="panel-title"><i class="fa fa-user"></i> Form Pengajuan</h4>
         <hr style="border: 1px solid #000;">
         <div class="row">
            <div class="col-md-6">
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Pilih No KTP Pengaju :</label>
                     <select name="pilihnoktp" id="pilihnoktp" class="form-control" onchange='changeValue(this.value)' required>
                        <option value="">Pilih No KTP</option>
                        <?php

                        $id_kk = $_SESSION['user']['table_join'];

                        $query = "SELECT * FROM warga WHERE id_kk='$id_kk'";
                        $ambil = $koneksi->query($query);
                        $jsArray = "var prdName = new Array();\n";
                        while ($perktp = $ambil->fetch_assoc()) {
                           $ket = "";

                           if (isset($_POST['pilihnoktp'])) {
                              $ambildata = trim($_POST['pilihnoktp']);

                              if ($ambildata == $perktp['id']) {
                                 $ket = "selected";
                              }
                           }

                        ?>
                           <option <?php echo $ket; ?> value="<?php echo $perktp["id"]; ?>">
                              <?php echo $perktp["no_ktp"]; ?> (<?php echo $perktp['nama_warga'] ?>)
                           </option>
                           <?php

                           $jsArray .= "prdName['" . $perktp['id'] . "'] = 
                              {
                              id:            '" . addslashes($perktp['id']) . "',
                              no_ktp:        '" . addslashes($perktp['no_ktp']) . "',
                              nama_warga:    '" . addslashes($perktp['nama_warga']) . "',
                              agama:         '" . addslashes($perktp['agama']) . "',
                              tempat_lahir:  '" . addslashes($perktp['tempat_lahir']) . "',
                              tgl_lahir:     '" . addslashes($perktp['tgl_lahir']) . "',
                              gol_darah:     '" . addslashes($perktp['gol_darah']) . "',
                              warga_negara:  '" . addslashes($perktp['warga_negara']) . "',
                              pendidikan:    '" . addslashes($perktp['pendidikan']) . "',
                              pekerjaan:     '" . addslashes($perktp['pekerjaan']) . "',
                              status_nikah:  '" . addslashes($perktp['status_nikah']) . "',
                              jenis_kelamin: '" . addslashes($perktp['jenis_kelamin']) . "',
                              ayah:  '" . addslashes($perktp['ayah']) . "',
                              ibu:  '" . addslashes($perktp['ibu']) . "'};\n";
                           ?>

                        <?php }; ?>
                     </select>
                  </div>
               </form>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <h6 class="panel-title mt-4 font-weight-bold">Detail Nama Pengaju
                  <hr style="border: 1px solid #000;">
               </h6>
            </div>
         </div>
         <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">

               <div class="row">
                  <div class="col-md">
                     <div class="form-group">
                        <label for="">No KTP </label>
                        <input type="text" readonly class="form-control" name="no_ktp" id="no_ktp">
                     </div>
                     <div class="form-group">
                        <label for="">Nama Lengkap </label>
                        <input type="text" readonly class="form-control" name="nama_warga" id="nama_warga">
                     </div>
                     <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" readonly class="form-control" name="agama" id="agama">
                     </div>
                     <div class="form-group">
                        <label for="">Tempat Lahir </label>
                        <input type="text" readonly class="form-control" name="tempat_lahir" id="tempat_lahir">
                     </div>
                     <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" readonly class="form-control" name="tgl_lahir" id="tgl_lahir">
                     </div>
                     <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" readonly class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                     </div>
                     <div class="form-group">
                        <label for="">Ibu</label>
                        <input type="text" readonly class="form-control" name="ibu" id="ibu">
                     </div>
                  </div>
                  <div class="col-md">
                     <div class="form-group">
                        <label for="">Golongan Darah </label>
                        <input type="text" readonly class="form-control" name="gol_darah" id="gol_darah">
                     </div>
                     <div class="form-group">
                        <label for="">Warga Negara </label>
                        <input type="text" readonly class="form-control" name="warga_negara" id="warga_negara">
                     </div>
                     <div class="form-group">
                        <label for="">pendidikan</label>
                        <input type="text" readonly class="form-control" name="pendidikan" id="pendidikan">
                     </div>
                     <div class="form-group">
                        <label for="">Pekerjaan </label>
                        <input type="text" readonly class="form-control" name="pekerjaan" id="pekerjaan">
                     </div>
                     <div class="form-group">
                        <label for="">Status Nikah</label>
                        <input type="text" readonly class="form-control" name="status_nikah" id="status_nikah">
                     </div>
                     <div class="form-group">
                        <label for="">Ayah</label>
                        <input type="text" readonly class="form-control" name="ayah" id="ayah">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <h6 class="panel-title font-weight-bold">Pemilihan Pengajuan
                        <hr style="border: 1px solid #000;">
                     </h6>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Pilih Surat Pengajuan :</label>
                        <select name="pilihjsurat" id="" class="form-control">
                           <option value="">Pilih Surat Ajuan</option>
                           <?php
                           $ambil = $koneksi->query("SELECT * FROM jenis_surat");
                           while ($pecah = $ambil->fetch_assoc()) {

                           ?>
                              <option value="<?php echo $pecah["id"]; ?>"><?php echo $pecah["nama"]; ?></option>

                           <?php }; ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Keperluan Surat</label>
                        <input type="text" name="keperluan_surat" id="" class="form-control" required>
                     </div>
                  </div>
               </div>

               <button class="btn btn-primary" name="ajukan"> <i class="fa fa-save"></i> Ajukan</button>
               <input type="hidden" name="id_warga" class="id_warga">
            </form> <!-- /.form-->

            <?php
            if (isset($_POST['ajukan'])) {

               $id_jenissurat = $_POST["pilihjsurat"];
               $id_warga = $_POST["id_warga"];
               $keperluan_surat = $_POST["keperluan_surat"];

               $query = "INSERT INTO surat (jenis_surat_id,user_id,rt_ttd,rw_ttd,kades_ttd,camat_ttd,keperluan_surat) VALUE('$id_jenissurat','$id_warga','0','0','0','0','$keperluan_surat')";
               $koneksi->query($query);
               echo "<script>alert('Pengajuan Berhasil Di Kirim')</script>";
               echo "<script>location='index.php';</script>";
            } else {
            }


            ?>

         </div> <!-- /.panel-body -->

         <!-- </div>
         </div> -->
      </div>
      <div class="col-md-4">
         <h4 class="">Pencarian</h4>
         <hr style="border: 1px solid #000;">
         <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Sesuatu..." aria-label="Search">
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
         </form>
         <h4 class="mt-3">Recent Post</h4>
         <hr style="border: 1px solid #000;">
         <a href="" class="text-decoration-none font-weight-light text-justify " style="font-size: 14px;"><label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
         <a href="" class="text-decoration-none font-weight-light text-justify" style="font-size: 14px;"> <label for="" class="fas fa-chevron-right"></label> Repellendus quas doloremque odit, amet quis, quam temporibus voluptatibus animi, </a>
         <hr style="border: 1px solid rgba(0, 0, 0, 0.125); margin: 7px 0 7px 0;">
      </div>
   </div>
</div>
<!-- Post END -->

<script type="text/javascript">
   <?php echo $jsArray; ?>

   function changeValue(id) {
      document.getElementById('no_ktp').value = prdName[id].no_ktp;
      document.getElementById('nama_warga').value = prdName[id].nama_warga;
      document.getElementById('agama').value = prdName[id].agama;
      document.getElementById('tempat_lahir').value = prdName[id].tempat_lahir;
      document.getElementById('tgl_lahir').value = prdName[id].tgl_lahir;
      document.getElementById('gol_darah').value = prdName[id].gol_darah;
      document.getElementById('warga_negara').value = prdName[id].warga_negara;
      document.getElementById('pendidikan').value = prdName[id].pendidikan;
      document.getElementById('pekerjaan').value = prdName[id].pekerjaan;
      document.getElementById('status_nikah').value = prdName[id].status_nikah;
      document.getElementById('jenis_kelamin').value = prdName[id].jenis_kelamin;
      document.getElementById('ayah').value = prdName[id].ayah;
      document.getElementById('ibu').value = prdName[id].ibu;
      $(".id_warga").val(prdName[id].id);

   };
</script>

<?php include 'footer.php'; ?>