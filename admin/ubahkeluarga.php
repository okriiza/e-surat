<?php
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$ambil = $koneksi->query("SELECT * FROM kk 
LEFT JOIN rt ON rt.id = kk.rt_id  
LEFT JOIN rw ON rw.id = kk.rw_id
WHERE kk.id='$id'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>


<h1 class="h3 mb-2 text-gray-800">Ubah Data Keluarga</h1>
<p>Mengubah Data Keluarga</p>

<div class="card border-left-primary">
    <div class="card-body">
        <!-- Nested Row within Card Body -->
        <h3 class="panel-title"><i class="fa fa-user"></i> Ubah Data Keluarga</h3>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No KK </label>
                            <input type="number" class="form-control form-control-user" name="kk" value="<?php echo $pecah['no_kk']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kepala Kelurga </label>
                            <input type="text" class="form-control" name="kepala" value="<?php echo $pecah['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">rt</label>
                            <input type="text" class="form-control" name="rt" value="<?php echo $pecah['no_rt']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">rw</label>
                            <input type="text" class="form-control" name="rw" value="<?php echo $pecah['no_rw']; ?>">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kelurahan/Desa </label>
                            <input type="text" class="form-control" name="kelurahan" value="<?php echo $pecah['kelurahan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan </label>
                            <input type="text" class="form-control" name="kecamatan" value="<?php echo $pecah['kecamatan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="kabupaten" value="<?php echo $pecah['kabupaten']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Pos </label>
                            <input type="text" class="form-control" name="kodepos" value="<?php echo $pecah['kodepos']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi </label>
                            <input type="text" class="form-control" name="provinsi" value="<?php echo $pecah['provinsi']; ?>">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" name="ubah"> <i class="fa fa-save"></i> Ubah Data</button>
            </form>
            <!-- /.form-->
            <?php
            if (isset($_POST['ubah'])) {
                $koneksi->query("UPDATE kk SET no_kk='$_POST[kk]',nama='$_POST[kepala]',alamat='$_POST[alamat]',rt='$_POST[rt]',rw='$_POST[rw]',kelurahan='$_POST[kelurahan]',kecamatan='$_POST[kecamatan]',kabupaten='$_POST[kabupaten]',kodepos='$_POST[kodepos]',provinsi='$_POST[provinsi]' WHERE id='$_GET[id]'");
                echo "<script>alert('Data Keluarga telah diubah')</script>";
                echo "<script>location='index.php?halaman=kartukeluarga';</script>";
            }

            ?>
        </div> <!-- /.panel-body -->
    </div>
</div>