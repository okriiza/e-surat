<!-- Page Heading -->
<!-- <a href="index.php?halaman=tambahwarga" class="btn btn-primary mb-4">Tambah Ketua RT</a> -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahketuart">
   Tambah Camat
</button>

<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DATA Camat</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kepala Desa</th>
                  <th>Nama Desa</th>
                  <th>Tanda Tangan</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tbody>
               <?php
               $nomor = 1; ?>
               <?php $ambil = $koneksi->query("SELECT * FROM kades"); ?>
               <?php while ($pecah = $ambil->fetch_assoc()) {; ?>
                  <tr>
                     <td align="center"><?php echo $nomor; ?></td>
                     <td><?php echo $pecah['nama_kades']; ?></td>
                     <td><?php echo $pecah['nama_desa']; ?></td>
                     <td>
                        <img src="<?php echo $pecah['ttdimg']; ?>"></td>
                     <td>

                        <p><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahkepaladesa<?php echo $pecah['id']; ?>">
                              <i class="fas fa-edit"></i> Edit
                           </button>
                           <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuskepaladesa<?php echo $pecah['id']; ?>">
                              <i class="fas fa-edit"></i> Hapus
                           </button></<a>
                     </td>
                  </tr>

                  <!-- Tambah Data Ketua RT -->
                  <div class="modal fade" id="tambahkepaladesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Ketua RT</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="panel-body">
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label for="">No RT </label>
                                       <input type="text" class="form-control form-control-user" name="nort">
                                    </div>
                                    <div class="form-group">
                                       <label for="">Tanda Tangan </label>
                                       <div id="signature"></div><br />
                                       <input type='button' id='click' value='click'>
                                       <textarea id='output' name="img"></textarea><br />
                                       <input type="submit" value="Upload" />
                                    </div>

                                 </form>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END Tambah DATA KETUA RT -->

                  <!-- Ubah Data Ketua RT -->
                  <div class="modal fade" id="ubahkepaladesa<?php echo $pecah['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Ketua RT</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="panel-body">
                                 <form action="" method="post" enctype="multipart/form-data">

                                    <?php
                                    $id = $pecah['id'];
                                    $ambil = $koneksi->query("SELECT * FROM kades WHERE id='$id'");
                                    $pecah = $ambil->fetch_assoc();

                                    // echo "<pre>";
                                    // print_r($pecah);
                                    // echo "</pre>";

                                    ?>
                                    <div class="form-group">
                                       <label for="">Nama Kades </label>
                                       <input type="text" class="form-control form-control-user" name="nort" value="<?php echo $pecah['nama_kades']; ?>">
                                    </div>
                                    <div class="form-group">
                                       <label for="">Nama Desa </label>
                                       <input type="text" class="form-control form-control-user" name="nort" value="<?php echo $pecah['nama_desa']; ?>">
                                    </div>
                                    <div class="form-group">
                                       <label for="">Tanda Tangan </label>
                                       <img src="../img/tanda_tangan<?php echo $pecah['ttdimg']; ?>" width="200">
                                    </div>
                                    <div class="form-group">
                                       <label for="">Ubah Tanda Tangan</label>
                                       <input type="file" name="foto" class="form-control">
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END UBAH DATA KETUA RT -->

                  <?php $nomor++; ?>
               <?php }; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>