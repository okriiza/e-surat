<?php
//buat koneksi dengan MySQL
$link = new mysqli('localhost', 'root', '', 'desa');

$id_surat = $_GET['id'];
$confirm_type = $_GET['confirm_type'];
if ($confirm_type == 'rt') {
   $query = "UPDATE surat set rt_ttd = '1' WHERE id = '$id_surat'";
} else if ($confirm_type == 'rw') {
   $query = "UPDATE surat set rw_ttd = '1' WHERE id = '$id_surat'";
} else if ($confirm_type == 'kades') {
   $query = "UPDATE surat set kades_ttd = '1' WHERE id = '$id_surat'";
}
// print_r($query);
// die();


mysqli_query($link, $query);
//tampilkan hasil
// header("location:index.php?halaman=ketuart");
echo "<script>alert('Berhasil Konfirmasi Surat')</script>";
echo "<script>location='index.php?halaman=surat';</script>";
