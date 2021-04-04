<a href="index.php?halaman=tambahketuart" class=" btn btn-primary btn-icon-split btn-sm mb-4"> <span class="icon text-white-50">
      <i class="fas fa-user-plus"></i>
   </span>
   <span class="text">Tambah Ketua RT</span>
</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DATA KETUA RT</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>NO RT</th>
                  <th>Nama RT</th>
                  <th>Tanda Tangan</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $nomor = 1; ?>
               <?php $ambil = $koneksi->query("SELECT * FROM rt"); ?>
               <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
                  <tr>
                     <td align="center"><?php echo $nomor; ?></td>
                     <td><?php echo $pecah['no_rt']; ?></td>
                     <td><?php echo $pecah['nama_rt']; ?></td>
                     <td>
                        <img src="<?php echo $pecah['ttdimg']; ?>" width="100" height="100"></td>
                     <td>
                        <p><a href="index.php?halaman=ubahketuart&id=<?php echo $pecah['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah </a>
                           <a href="index.php?halaman=hapusketuart&id=<?php echo $pecah['id']; ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Hapus</a></p>
                     </td>
                  </tr>
                  <?php $nomor++; ?>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>