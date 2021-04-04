<a href="index.php?halaman=tambahkeluarga" class="btn btn-primary btn-icon-split mb-4 btn-sm">
  <span class="icon text-white-50">
    <i class="fas fa-user-plus"></i>
  </span>
  <span class="text">Tambah Data</span>
</a>

<!-- Button trigger modal -->

<!-- <a href="index.php?halaman=detailakun" class="btn btn-primary mb-4">Buat Akun</a> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Keluarga</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Kepala Keluarga</th>
            <th>Alamat</th>
            <th>rt</th>
            <th>rw</th>
            <th>kades</th>
            <th>Kelurahan/Desa</th>
            <th>Kecamatan</th>
            <th>Kabupaten/Kota</th>
            <th>Kode Pos</th>
            <th>Provinsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php $ambil = $koneksi->query("SELECT *,kk.id AS kk_id FROM kk LEFT JOIN rt ON rt.id = kk.rt_id LEFT JOIN rw ON rw.id = kk.rw_id LEFT JOIN kades ON kades.id = kk.kades_id"); ?>
          <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
            <tr>
              <td align="center"><?php echo $nomor; ?></td>
              <td><?php echo $pecah['no_kk']; ?></td>
              <td><?php echo $pecah['nama']; ?></td>
              <td><?php echo $pecah['alamat']; ?></td>
              <td><?php echo $pecah['no_rt']; ?></td>
              <td><?php echo $pecah['no_rw']; ?></td>
              <td><?php echo $pecah['nama_desa']; ?></td>
              <td><?php echo $pecah['kelurahan']; ?></td>
              <td><?php echo $pecah['kecamatan']; ?></td>
              <td><?php echo $pecah['kabupaten']; ?></td>
              <td><?php echo $pecah['kodepos']; ?></td>
              <td><?php echo $pecah['provinsi']; ?></td>
              <td class="text-center" width="200px">
                <p><a href="index.php?halaman=ubahkeluarga&id=<?php echo $pecah['kk_id']; ?>" class="btn btn-success btn-circle"><i class="fas fa-edit"></i> </a></p>
                <p><a href="index.php?halaman=hapuskeluarga&id=<?php echo $pecah['kk_id']; ?>" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a></p>
              </td>
            </tr>
            <?php $nomor++; ?>
          <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>