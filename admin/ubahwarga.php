<?php
$id = mysqli_real_escape_string($koneksi, $_GET["id"]);

$ambil = $koneksi->query("SELECT * FROM warga WHERE id='$id'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>


<h1 class="h3 mb-2 text-gray-800">Ubah Data Warga</h1>
<p>Mengubah Data Warga</p>

<div class="card border-left-primary">
    <div class="card-body">
        <!-- Nested Row within Card Body -->

        <h3 class="panel-title"><i class="fa fa-user"></i> Ubah Data Warga</h3>

        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">No KTP </label>
                            <input type="number" class="form-control form-control-user" name="ktp" value="<?php echo $pecah['no_ktp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap </label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_warga']; ?>">
                        </div>
                        <label for="">Kepala Keluarga</label>
                        <?php $kepala = $pecah['is_kepala_keluarga']; ?>
                        <div class="form-group form-control">
                            <label for=""><input type="radio" value="1" name="kepala" <?php echo ($kepala == '1') ? "checked" : "" ?>> Ya</label>
                            <label for=""><input type="radio" value="0" name="kepala" <?php echo ($kepala == '0') ? "checked" : "" ?>> Bukan</label>
                        </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <?php $agama = $pecah['agama']; ?>
                            <select name="agama" id="" class="form-control">
                                <option value="">Pilih Agama</option>
                                <option <?php if ($agama == 'Islam') {
                                            echo "selected";
                                        } ?> value='Islam'>Islam</option>
                                <option <?php if ($agama == 'Kristen') {
                                            echo "selected";
                                        } ?> value='Kristen'>Kristen</option>
                                <option <?php if ($agama == 'Katolik') {
                                            echo "selected";
                                        } ?> value='Katolik'>Katolik</option>
                                <option <?php if ($agama == 'Hindu') {
                                            echo "selected";
                                        } ?> value='Hindu'>Hindu</option>
                                <option <?php if ($agama == 'Budha') {
                                            echo "selected";
                                        } ?> value='Budha'>Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir </label>
                            <input type="text" class="form-control" name="temlahir" value="<?php echo $pecah['tempat_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgllahir" value="<?php echo $pecah['tgl_lahir']; ?>">
                        </div>
                        <label for="">Jenis Kelamin </label>
                        <?php $jk = $pecah['jenis_kelamin']; ?>
                        <div class="form-group form-control">

                            <?php
                            // membuat input radio otomatis checked sesuai data dari database
                            if ($jk == "Laki-laki") {
                                echo '<label><input type="radio" name="kelamin" value="Laki-laki" checked="checked"> Laki-laki </label>
                                            <label><input type="radio" name="kelamin" value="Perempuan"> Perempuan</label><br><br>';
                            } else if ($jk == "Perempuan") {
                                echo '<label><input type="radio" name="kelamin" value="Laki-laki"> Laki-laki </label>
                                        <label><input type="radio" name="kelamin" value="Perempuan" checked="checked"> Perempuan </label><br><br>';
                            } else {
                                echo '<label><input type="radio" name="kelamin" value="Laki-laki"> Laki-laki </label>
                                        <label><input type="radio" name="kelamin" value="Perempuan"> Perempuan</label><br><br>';
                            }
                            ?>

                        </div>
                        <div class="form-group">
                            <label for="">Golongan Darah </label>
                            <?php $gd = $pecah['gol_darah']; ?>
                            <select name="goldarah" id="" class="form-control">
                                <option value="">Pilih Golongan Darah</option>
                                <option <?php if ($gd == 'A') {
                                            echo "selected";
                                        } ?> value="A">A</option>
                                <option <?php if ($gd == 'B') {
                                            echo "selected";
                                        } ?> value="B">B</option>
                                <option <?php if ($gd == 'AB') {
                                            echo "selected";
                                        } ?> value="AB">AB</option>
                                <option <?php if ($gd == 'O') {
                                            echo "selected";
                                        } ?> value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Warga Negara </label>
                            <input type="text" class="form-control" name="warganegara" value="<?php echo $pecah['warga_negara']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" value="<?php echo $pecah['pendidikan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan </label>
                            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $pecah['pekerjaan']; ?>">
                        </div>
                        <label for="">Status Nikah</label>
                        <?php $kawin = $pecah['status_nikah']; ?>
                        <div class="form-group form-control">
                            <label for=""><input type="radio" value="Belum Menikah" name="nikah" <?php echo ($kawin == 'Belum Menikah') ? "checked" : "" ?>> Belum Menikah</label>
                            <label for=""><input type="radio" value="Menikah" name="nikah" <?php echo ($kawin == 'Menikah') ? "checked" : "" ?>> Menikah</label>
                        </div>

                        <div class="form-group">
                            <label for="">Pekerjaan </label>
                            <input type="text" class="form-control" name="ayah" value="<?php echo $pecah['ayah']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan </label>
                            <input type="text" class="form-control" name="ibu" value="<?php echo $pecah['ibu']; ?>">
                        </div>
                        <br>
                        <button class="btn btn-primary" name="ubah"> <i class="fa fa-save"></i> Ubah Data</button>
                    </div>
                </div>
            </form> <!-- /.form-->

            <?php

            if (isset($_POST['ubah'])) {
                $koneksi->query("UPDATE warga SET no_ktp='$_POST[ktp]',nama_warga='$_POST[nama]',agama='$_POST[agama]',tempat_lahir='$_POST[temlahir]',tgl_lahir='$_POST[tgllahir]',gol_darah='$_POST[goldarah]',warga_negara='$_POST[warganegara]',pendidikan='$_POST[pendidikan]',pekerjaan='$_POST[pekerjaan]',status_nikah='$_POST[nikah]',jenis_kelamin='$_POST[kelamin]',ayah='$_POST[ayah]',ibu='$_POST[ibu]',is_kepala_keluarga='$_POST[kepala]' WHERE id='$_GET[id]'");
                echo "<script>alert('Data Warga telah diubah')</script>";
                echo "<script>location='index.php?halaman=warga';</script>";
            }

            ?>

        </div> <!-- /.panel-body -->

    </div>
</div>