<h1 class="h3 mb-2 text-gray-800">Data Keluarga</h1>
<p>Menambahkan Data Keluarga</p>

<?php
if (isset($_POST['save'])) {
    // $warga = $_POST['warga'];
    // $ktp = $_POST['ktp'];

    $query = "INSERT INTO kk (no_kk,nama,alamat,rt_id,rw_id,kades_id,kelurahan,kecamatan,kabupaten,kodepos,provinsi) VALUE('$_POST[kk]','$_POST[kepala]','$_POST[alamat]','$_POST[rt_id]','$_POST[rw_id]','$_POST[kades_id]','$_POST[kelurahan]','$_POST[kecamatan]','$_POST[kabupaten]','$_POST[kodepos]','$_POST[provinsi]')";
    mysqli_query($koneksi, $query);

    $kk_id = $koneksi->insert_id;
    $password = md5($_POST['username']);
    $query2 = "INSERT INTO user (username,password,jabatan,table_join) VALUE ('$_POST[username]','$password','5','$kk_id')";
    mysqli_query($koneksi, $query2);

    $ktp = $_POST['ktp'];
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $temlahir = $_POST['temlahir'];
    $tgllahir = $_POST['tgllahir'];
    $goldarah = $_POST['goldarah'];
    $warganegara = $_POST['warganegara'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];
    $nikah = $_POST['nikah'];
    $kelamin = $_POST['kelamin'];
    $ayah = $_POST['ayah'];
    $ibu = $_POST['ibu'];
    $kepalakel = $_POST['kepalakel'];

    $index = 0;
    foreach ($_POST['ktp'] as $ktpwarga) {
        $ktpval = $ktpwarga;
        $namaval = $nama[$index];
        $agamaval = $agama[$index];
        $temlahirval = $temlahir[$index];
        $tgllahirval = $tgllahir[$index];
        $goldarahval = $goldarah[$index];
        $warganegaraval = $warganegara[$index];
        $pendidikanval = $pendidikan[$index];
        $pekerjaanval = $pekerjaan[$index];
        $nikahval = $nikah[$index];
        $kelaminval = $kelamin[$index];
        $ayahval = $ayah[$index];
        $ibuval = $ibu[$index];
        $kepalaval = $kepalakel[$index];


        $query1 = "INSERT INTO warga (id_kk,no_ktp,nama_warga,agama,tempat_lahir,tgl_lahir,gol_darah,warga_negara,pendidikan,pekerjaan,status_nikah,jenis_kelamin,ayah,ibu,is_kepala_keluarga) VALUE('$kk_id','$ktpval', '$namaval', '$agamaval', '$temlahirval', '$tgllahirval', '$goldarahval', '$warganegaraval', '$pendidikanval', '$pekerjaanval', '$nikahval', '$kelaminval', '$ayahval', '$ibuval', '$kepalaval')";
        mysqli_query($koneksi, $query1);
        $index++;
    }

    echo "<div class='alert alert-info'> Data Berhasil Di Simpan ! </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kartukeluarga'>";
}

?>

<div class="card border-left-primary">
    <div class="card-body">
        <!-- Nested Row within Card Body -->

        <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Keluarga</h3>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No KK </label>
                            <input type="number" required class="form-control form-control-user no_kk" name="kk">
                        </div>
                        <div class="form-group">
                            <label for="">Kepala Keluarga</label>
                            <input type="text" required class="form-control" name="kepala">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" required class="form-control" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi </label>
                            <input type="text" required class="form-control" name="provinsi">
                        </div>
                        <div class="form-group">
                            <label for="">Password<b class="text-danger text-sm mt-2">*</b>
                            </label>
                            <input type="password" required class="form-control" required name="password">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">RT </label>
                            <select name="rt_id" class="form-control ">
                                <option value="">Pilih RT</option>
                                <?php $ambil = $koneksi->query("SELECT * FROM rt"); ?>
                                <?php while ($pecah = $ambil->fetch_assoc()) {; ?>

                                    <option value="<?php echo $pecah['id']; ?>"><?php echo $pecah['nama_rt']; ?></option>
                                <?php }; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">RW</label>
                            <select name="rw_id" class="form-control ">
                                <option value="">Pilih RW</option>
                                <?php $ambil = $koneksi->query("SELECT * FROM rw"); ?>
                                <?php while ($pecah = $ambil->fetch_assoc()) {; ?>

                                    <option value="<?php echo $pecah['id']; ?>"><?php echo $pecah['nama_rw']; ?></option>
                                <?php }; ?>
                            </select>

                        </div>
                        <div class="form-group ">
                            <label for="">Kades</label>
                            <select name="kades_id" class="form-control ">
                                <option value="">Pilih Kades</option>
                                <?php $ambil = $koneksi->query("SELECT * FROM kades"); ?>
                                <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
                                    <option value="<?php echo $pecah['id']; ?>"><?php echo $pecah['nama_kades']; ?></option>
                                <?php }; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Kelurahan/Desa </label>
                            <input type="text" required class="form-control" name="kelurahan">
                        </div>

                        <br>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Kecamatan </label>
                            <input type="text" required class="form-control" name="kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="">kabupaten/Kota </label>
                            <input type="text" required class="form-control" name="kabupaten">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="text" required class="form-control" name="kodepos">
                        </div>
                        <div class="form-group">
                            <label for="">Username </label>
                            <input type="text" class="form-control username" readonly name="username">
                        </div>

                        <br>
                    </div>
                </div>


                <h4>Input Anggota Keluarga</h4>
                <hr />
                <div class="control-group mb-3">
                    <button class="btn btn-success btn-sm" type="button" id="btn-tambah-form">
                        <i class="fas fa-plus"></i> Tambah Anggota Keluarga
                    </button>
                    <button class="btn btn-danger btn-sm" type="button" id="btn-reset-form"> <i class="fas fa-undo"></i> Reset</button>
                    <p class="text-danger text-sm mt-2">
                        <b>*Masukkan Kepala Keluarga Terlebih dahulu</b>
                    </p>
                </div>

                <div class="row control-group mb-3">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <input type="number" class="form-control " name="ktp[]" placeholder="No KTP" />
                        </div>
                        <div class="form-group form-control ">
                            <label for=""><input type="radio" value="1" name="kepalakel[0]" /> Kepala
                                Keluarga</label>
                            <label for=""><input type="radio" value="0" name="kepalakel[0]" /> Bukan</label>
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="nama[]" placeholder="Nama Lengkap" />
                        </div>
                        <div class="form-group ">
                            <select name="agama[]" class="form-control ">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="temlahir[]" placeholder="Tempat Lahir" />
                        </div>
                        <div class="form-group ">
                            <input type="date" required class="form-control " name="tgllahir[]" placeholder="Tanggal Lahir" />
                        </div>
                        <div class="form-group ">
                            <select name="goldarah[]" class="form-control ">
                                <option value="">Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="warganegara[]" placeholder="Warga Negara " />
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="pendidikan[]" placeholder="Pendidikan" />
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="pekerjaan[]" placeholder="Pekerjaan" />
                        </div>
                        <div class="form-group form-control ">
                            <label for=""><input type="radio" value="Belum Menikah" name="nikah[0]" /> Belum
                                Menikah</label>
                            <label for=""><input type="radio" value="Menikah" name="nikah[0]" />
                                Menikah</label>
                        </div>
                        <div class="form-group form-control ">
                            <label for=""><input type="radio" value="Laki-laki" name="kelamin[0]" /> Laki
                                Laki</label>
                            <label for=""><input type="radio" value="Perempuan" name="kelamin[0]" />
                                Perempuan</label>
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="ayah[]" placeholder="Nama Ayah" />
                        </div>
                        <div class="form-group ">
                            <input type="text" required class="form-control " name="ibu[]" placeholder="Nama Ibu" />
                        </div>
                    </div>
                </div>
                <div id="insert-form"></div>

                <!-- Kita buat textbox untuk menampung jumlah data form -->
                <input type="hidden" id="jumlah-form" value="0" />
                <button class="btn btn-primary btn-sm" name="save"><i class="fa fa-save"></i> Simpan</button>
            </form> <!-- /.form-->

        </div> <!-- /.panel-body -->
    </div>
</div>
<script>
    $(document).ready(function() {
        // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function() {
            // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append(

                "<h4>Anggota Keluarga " +
                nextform +
                "</h4>" +
                "<hr>" +
                "<div class='row control-group mb-3'>" +
                "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<input type='text' class='form-control' required  name='ktp[]' placeholder='No KTP' />" +
                "</div>" +
                "<div class='form-group form-control'>" +
                "<label for=''><input type='radio' value='1' name='kepalakel[" + nextform + "]' /> Kepala Keluarga</label> " +
                "<label for=''><input type='radio' value='0' name='kepalakel[" + nextform + "]' /> Bukan</label> " +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='nama[]' placeholder='Nama Lengkap'/>" +
                "</div>" +
                "<div class='form-group'>" +
                "<select name='agama[]' class='form-control'>" +
                "<option value=''>Pilih Agama</option>" +
                "<option value='Islam'>Islam</option>" +
                "<option value='Kristen'>Kristen</option>" +
                "<option value='Katolik'>Katolik</option>" +
                "<option value='Hindu'>Hindu</option>" +
                "<option value='Budha'>Budha</option>" +
                "</select>" +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='temlahir[]' placeholder='Tempat Lahir' />" +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='date' required  class='form-control' name='tgllahir[]' placeholder='Tanggal Lahir' />" +
                "</div>" +
                "<div class='form-group'>" +
                "<select name='goldarah[]' class='form-control'>" +
                "<option value=''>Pilih Golongan Darah</option>" +
                "<option value='A'>A</option>" +
                "<option value='B'>B</option>" +
                "<option value='AB'>AB</option>" +
                "<option value='O'>O</option>" +
                "</select>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='warganegara[]' placeholder='Warga Negara' />" +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='pendidikan[]' placeholder='Pendidikan' />" +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='pekerjaan[]' placeholder='Pekerjaan' />" +
                "</div>" +
                "<div class='form-group form-control'>" +
                "<label for=''><input type='radio' value='Belum Menikah' name='nikah[" + nextform + "]' /> Belum Menikah</label>" +
                "<label for=''><input type='radio' value='Menikah' name='nikah[" + nextform + "]' /> Menikah</label>" +
                "</div>" +
                "<div class='form-group form-control'>" +
                "<label for=''><input type='radio' value='Laki-laki' name='kelamin[" + nextform + "]' /> Laki Laki</label>" +
                "<label for=''><input type='radio' value='Perempuan' name='kelamin[" + nextform + "]' /> Perempuan</label>" +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' required  class='form-control' name='ayah[]' placeholder='Nama Ayah' />" +
                "</div>" +
                "<div class='form-group '>" +
                "<input type='text' required  class='form-control' name='ibu[]' placeholder='Nama Ibu' />" +
                "</div>" +
                "</div>" +
                "</div>"
            );
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
        });

        $(".no_kk").keyup(function() {
            var kk_val = $(this).val();
            $(".username").val(kk_val);
        });
    });
</script>