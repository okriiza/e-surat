<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Ajuan</h1>
<!-- <a href="index.php?halaman=tambahwarga" class="btn btn-primary mb-4">Tambah Data</a> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DATA SURAT AJUAN</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>No KTP</th>
                  <th>Nama Pengaju</th>
                  <th>Jenis Surat</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Keperluan Surat</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tbody>
               <?php $nomor = 1; ?>
               <?php $query = "SELECT *,surat.id as surat_id,surat.created as tgl_now FROM surat LEFT JOIN warga on warga.id = surat.user_id LEFT JOIN
                jenis_surat ON jenis_surat.id = surat.jenis_surat_id"; ?>
               <?php $ambil = $koneksi->query($query); ?>
               <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
                  <tr>
                     <td align="center"><?php echo $nomor; ?></td>
                     <td><?php echo $pecah['no_ktp']; ?></td>
                     <td><?php echo $pecah['nama_warga']; ?></td>
                     <td><?php echo $pecah['nama']; ?></td>
                     <?php $tanggal = $pecah['tgl_now'];
                     $tanggal = date('Y-m-d', strtotime($pecah['tgl_now'])); ?>
                     <td><?php echo $tanggal; ?></td>
                     <td><?php echo $pecah['keperluan_surat']; ?></td>
                     <td class="text-center" width="200px">
                        <p>
                           <?php if ($pecah['jenis_surat_id'] == '1') {
                              $halaman = 'skck';
                           } else if ($pecah['jenis_surat_id'] == '2') {
                              $halaman = 'sktm';
                           } ?>
                           <a href="<?php echo $halaman ?>.php?id=<?php echo $pecah['surat_id']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Lihat Surat</a>

                           <?php
                           $disable = False;
                           if ($_SESSION['admin']['jabatan'] == '2') {
                              $confirm_type = 'rt';
                              // if ($pecah['no_rt'] != $_SESSION['admin']) {
                              //    # code...
                              // }
                           } else if ($_SESSION['admin']['jabatan'] == '3') {
                              $confirm_type = 'rw';
                              if ($pecah['rt_ttd'] == '0') {
                                 $disable = True;
                              }
                           } else if ($_SESSION['admin']['jabatan'] == '4') {
                              $confirm_type = 'kades';
                              if ($pecah['rw_ttd'] == '0') {
                                 $disable = True;
                              }
                           }
                           ?>
                           <?php if ($disable == False) { ?><a href="index.php?halaman=confirm_surat&id=<?php echo $pecah['surat_id']; ?>&confirm_type=<?php echo $confirm_type ?>" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Setuju</a><?php } ?>
                           <!-- <a href="" class="btn btn-warning btn-sm"><i class="fas fa-times"></i> Tidak</a> -->
                        </p>
                     </td>
                  </tr>
                  <?php $nomor++; ?>
               <?php }; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>