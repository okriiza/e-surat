<form action="" method="post">
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
        <input type="text" class="form-control " name="ktp[]" placeholder="No KTP" />
      </div>
      <div class="form-group form-control ">
        <label for=""><input type="radio" value="1" name="kepalakel[]" /> Kepala
          Keluarga</label>
        <label for=""><input type="radio" value="0" name="kepalakel[]" /> Bukan</label>
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="nama[]" placeholder="Nama Lengkap" />
      </div>
      <div class="form-group ">
        <select name="agama[]" id="" class="form-control ">
          <option value="">Pilih Agama</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
        </select>
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="temlahir[]" placeholder="Tempat Lahir" />
      </div>
      <div class="form-group ">
        <input type="date" class="form-control " name="tgllahir[]" placeholder="Tanggal Lahir" />
      </div>
      <div class="form-group ">
        <select name="goldarah[]" id="" class="form-control ">
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
        <input type="text" class="form-control " name="warganegara[]" placeholder="Warga Negara " />
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="pendidikan[]" placeholder="Pendidikan" />
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="pekerjaan[]" placeholder="Pekerjaan" />
      </div>
      <div class="form-group form-control ">
        <label for=""><input type="radio" value="Belum Menikah" name="nikah[]" /> Belum
          Menikah</label>
        <label for=""><input type="radio" value="Menikah" name="nikah[]" />
          Menikah</label>
      </div>
      <div class="form-group form-control ">
        <label for=""><input type="radio" value="Laki-laki" name="kelamin[]" /> Laki
          Laki</label>
        <label for=""><input type="radio" value="Perempuan" name="kelamin[]" />
          Perempuan</label>
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="ayah[]" placeholder="Nama Ayah" />
      </div>
      <div class="form-group ">
        <input type="text" class="form-control " name="ibu[]" placeholder="Nama Ibu" />
      </div>
    </div>
  </div>
  <div id="insert-form"></div>
</form>
<!-- Kita buat textbox untuk menampung jumlah data form -->
<input type="hidden" id="jumlah-form" value="0" />


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
        "<input type='text' class='form-control' name='ktp[]' placeholder='No KTP' />" +
        "</div>" +
        "<div class='form-group form-control'>" +
        "<label for=''><input type='radio' value='1' name='kepalakel[]' /> Kepala Keluarga</label> " +
        "<label for=''><input type='radio' value='0' name='kepalakel[]' /> Bukan</label> " +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='text' class='form-control' name='nama[]' placeholder='Nama Lengkap'/>" +
        "</div>" +
        "<div class='form-group'>" +
        "<select name='agama[]'  class='form-control'>" +
        "<option value=''>Pilih Agama</option>" +
        "<option value='Islam'>Islam</option>" +
        "<option value='Kristen'>Kristen</option>" +
        "<option value='Katolik'>Katolik</option>" +
        "<option value='Hindu'>Hindu</option>" +
        "<option value='Budha'>Budha</option>" +
        "</select>" +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='text' class='form-control' name='temlahir[]' placeholder='Tempat Lahir' />" +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='date' class='form-control' name='tgllahir[]' placeholder='Tanggal Lahir' />" +
        "</div>" +
        "<div class='form-group'>" +
        "<select name='goldarah[]' id='' class='form-control'>" +
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
        "<input type='text' class='form-control' name='warganegara[]' placeholder='Warga Negara' />" +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='text' class='form-control' name='pendidikan[]' placeholder='Pendidikan' />" +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='text' class='form-control' name='pekerjaan[]' placeholder='Pekerjaan' />" +
        "</div>" +
        "<div class='form-group form-control'>" +
        "<label for=''><input type='radio' value='Belum Menikah' name='nikah[]' /> Belum Menikah</label>" +
        "<label for=''><input type='radio' value='Menikah' name='nikah[]' /> Menikah</label>" +
        "</div>" +
        "<div class='form-group form-control'>" +
        "<label for=''><input type='radio' value='Laki-laki' name='kelamin[]' /> Laki Laki</label>" +
        "<label for=''><input type='radio' value='Perempuan' name='kelamin[]' /> Perempuan</label>" +
        "</div>" +
        "<div class='form-group'>" +
        "<input type='text' class='form-control' name='ayah[]' placeholder='Nama Ayah' />" +
        "</div>" +
        "<div class='form-group '>" +
        "<input type='text' class='form-control' name='ibu[]' placeholder='Nama Ibu' />" +
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
  });
</script>