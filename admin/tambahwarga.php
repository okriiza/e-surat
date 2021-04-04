<h1 class="h3 mb-2 text-gray-800">Data Warga</h1>
<p>Menambahkan Data Warga</p>

<?php
$koneksi = new mysqli('localhost', 'root', '', 'desa');

if (isset($_POST['save'])) {
    // $koneksi->query("INSERT INTO warga (no_ktp,nama_warga,agama,tempat_lahir,tgl_lahir,gol_darah,warga_negara,pendidikan,pekerjaan,status_nikah,jenis_kelamin,ayah,ibu) VALUE('$_POST[ktp]','$_POST[nama]','$_POST[agama]','$_POST[temlahir]','$_POST[tgllahir]','$_POST[goldarah]','$_POST[warganegara]','$_POST[pendidikan]','$_POST[pekerjaan]','$_POST[nikah]','$_POST[kelamin]','$_POST[ayah]','$_POST[ibu]') ");

    $tgllahir = $_POST['tgllahir'];
    $tgl = date("Y-m-d", strtotime($tgllahir));
    $stmt = $koneksi->prepare("INSERT INTO warga (no_ktp,nama_warga,agama,tempat_lahir,tgl_lahir,gol_darah,warga_negara,pendidikan,pekerjaan,status_nikah,jenis_kelamin,ayah,ibu,id_kk) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('isssssssssssss', $_POST['ktp'], $_POST['nama'], $_POST['agama'], $_POST['temlahir'], $tgl, $_POST['goldarah'], $_POST['warganegara'], $_POST['pendidikan'], $_POST['pekerjaan'], $_POST['nikah'], $_POST['kelamin'], $_POST['ayah'], $_POST['ibu'], $_POST['id_kk']);
    $stmt->execute();

    echo "<div class='alert alert-info'> Data Berhasil Di Simpan ! </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=warga'>";
}

?>

<div class="card border-left-primary">
    <div class="card-body">
        <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Warga</h3>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <?php $ambil = $koneksi->query("SELECT * FROM kk"); ?>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Kepala Keluarga</label>
                            <select name="id_kk" id="" class="form-control">
                                <option value="">Pilih Kepala Keluarga</option>
                                <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
                                    <option value="<?php echo $pecah['id']; ?>"><?php echo $pecah['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">No KTP </label>
                            <input type="number" required class="form-control form-control-user" name="ktp">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap </label>
                            <input type="text" required class="form-control" name="nama">
                        </div>
                        <!-- <label for="">Kepala Keluarga</label>
                        <div class="form-group form-control">
                            <label for=""><input type="radio" value="1" name="kepala"> Ya</label>
                            <label for=""><input type="radio" value="0" name="kepala"> Bukan</label>
                        </div> -->
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="form-control">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir </label>
                            <input type="text" required class="form-control" name="temlahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" required class="form-control" name="tgllahir">
                        </div>
                        <label for="">Jenis Kelamin </label>
                        <div class="form-group form-control">
                            <label for=""><input type="radio" value="Laki-laki" name="kelamin"> Laki Laki</label>
                            <label for=""><input type="radio" value="Perempuan" name="kelamin"> Perempuan</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Golongan Darah </label>
                            <select name="goldarah" id="" class="form-control">
                                <option value="">Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Warga Negara </label>
                            <input type="text" required class="form-control" name="warganegara">
                        </div>
                        <div class="form-group">
                            <label for="">pendidikan</label>
                            <input type="text" required class="form-control" name="pendidikan">
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan </label>
                            <input type="text" required class="form-control" name="pekerjaan">
                        </div>
                        <label for="">Status Nikah</label>
                        <div class="form-group form-control">
                            <label for=""><input type="radio" value="Belum Menikah" name="nikah"> Belum Menikah</label>
                            <label for=""><input type="radio" value="Menikah" name="nikah"> Menikah</label>
                        </div>
                        <div class="form-group">
                            <label for="">Ayah </label>
                            <input type="text" required class="form-control" name="ayah">
                        </div>
                        <div class="form-group">
                            <label for="">Ibu </label>
                            <input type="text" required class="form-control" name="ibu">
                        </div>
                        <br>
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" name="save"> <i class="fa fa-save"></i> Tambah Data</button>
            </form> <!-- /.form-->
        </div> <!-- /.panel-body -->
    </div>
</div>