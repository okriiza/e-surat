<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Keluarga</h1>
<!-- <a href="index.php?halaman=tambahwarga" class="btn btn-primary mb-4">Tambah Data</a> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DATA Keluarga</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
            <tr>
               <th>No</th>
               <th>No NIK</th>
               <th>Nama</th>
               <th>Aksi</th>
            </tr>
         </thead>
         
         <tbody>
         <?php $nomor=1 ;?>
            <?php $ambil=$koneksi->query("SELECT * FROM t_kk") ;?>
            <?php while($pecah=$ambil->fetch_assoc()) { ;?>
               <tr>
                  <td align="center"><?php echo $nomor ;?></td>
                  <td><?php echo $pecah['no_kk'] ;?></td>
                  <td><?php echo $pecah['kepala_keluarga'];?></td>
                  <td>
                     <p><a href="index.php?halaman=buatakun&id=<?php echo $pecah['id_kk'] ;?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></p>
                  </td>
               </tr>
               <?php $nomor++ ;?>
               <?php } ;?>
            
         </tbody>
         </table>
      </div>
   </div>
</div>
