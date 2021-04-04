<a href="index.php?halaman=tambahwarga" class="btn btn-primary btn-icon-split btn-sm mb-4"> <span class="icon text-white-50">
    <i class="fas fa-user-plus"></i>
  </span>
  <span class="text">Tambah Data</span>
</a>


<button type="button" class="btn btn-primary btn-icon-split mb-4 btn-sm" data-toggle="modal" data-target="#staticBackdrop">
  <span class="icon text-white-50">
    <i class="fas fa-user-plus"></i>
  </span>
  <span class="text-white mr-2 ml-1 mt-1"> Import Excel </span>
</button>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DATA WARGA</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>No KTP</th>
            <th>Nama</th>
            <th>Agama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Gol Darah</th>
            <th>Warga Negara</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Status Nikah</th>
            <th>Jenis Kelamin</th>
            <th>Ayah</th>
            <th>Ibu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php $ambil = $koneksi->prepare("SELECT * FROM warga");
          $ambil->execute();
          $hasil = $ambil->get_result();
          ?>
          <?php if ($hasil->num_rows === 0); ?>
          <?php
          while ($pecah = $hasil->fetch_assoc()) {; ?>
            <tr>
              <td align="center"><?php echo $nomor; ?></td>
              <td><?php echo $pecah['no_ktp']; ?></td>
              <td><?php echo $pecah['nama_warga']; ?></td>
              <td><?php echo $pecah['agama']; ?></td>
              <td><?php echo $pecah['tempat_lahir']; ?></td>
              <td><?php echo $pecah['tgl_lahir']; ?></td>
              <td><?php echo $pecah['gol_darah']; ?></td>
              <td><?php echo $pecah['warga_negara']; ?></td>
              <td><?php echo $pecah['pendidikan']; ?></td>
              <td><?php echo $pecah['pekerjaan']; ?></td>
              <td><?php echo $pecah['status_nikah']; ?></td>
              <td><?php echo $pecah['jenis_kelamin']; ?></td>
              <td><?php echo $pecah['ayah']; ?></td>
              <td><?php echo $pecah['ibu']; ?></td>
              <td>
                <p><a href="index.php?halaman=ubahwarga&id=<?php echo $pecah['id']; ?>" placeholder="edit" class="btn btn-success btn-circle"><i class="fas fa-edit"></i> </a></p>
                <p></p><a href="index.php?halaman=hapuswarga&id=<?php echo $pecah['id']; ?>" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i></a></p>
              </td>
            </tr>
            <?php $nomor++; ?>
          <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Import Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="importexcel.php">
          Pilih File:
          <input name="filepegawai" type="file" required="required">
          <!-- <input name="upload" type="submit" value="Import"> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upload" class="btn btn-primary">Import Data</button>
      </div>
      </form>
    </div>
  </div>
</div>