<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php
// menghubungkan dengan koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'desa');
// menghubungkan dengan library excel reader
include "import/excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']);
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {

   // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
   $noktp     = $data->val($i, 1);
   $nama   = $data->val($i, 2);
   $agama  = $data->val($i, 3);
   $tempat_lahir  = $data->val($i, 4);
   $tgl_lahir  = $data->val($i, 5);
   $gol_darah  = $data->val($i, 6);
   $warga_negara  = $data->val($i, 7);
   $pendidikan  = $data->val($i, 8);
   $pekerjaan  = $data->val($i, 9);
   $status_nikah  = $data->val($i, 10);
   $jenis_kelamin  = $data->val($i, 11);
   $ayah  = $data->val($i, 12);
   $ibu  = $data->val($i, 13);




   if ($noktp != "" && $nama != "" && $agama != "" && $tempat_lahir != "" && $tgl_lahir != "" && $gol_darah != "" && $warga_negara != "" && $pendidikan != "" && $pekerjaan != "" && $status_nikah != "" && $jenis_kelamin != "" && $ayah != "" && $ibu != "") {
      // input data ke database (table data_pegawai)
      mysqli_query($koneksi, "INSERT into warga (no_ktp,nama_warga,agama,tempat_lahir,tgl_lahir,gol_darah,warga_negara,pendidikan,pekerjaan,status_nikah,jenis_kelamin,ayah,ibu) values('$noktp','$nama','$agama','$tempat_lahir','$tgl_lahir','$gol_darah','$warga_negara','$pendidikan','$pekerjaan','$status_nikah','$jenis_kelamin','$ayah','$ibu')");
      $berhasil++;
   }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
echo "<script>alert('Data Berhasil Di Import')</script>";
header("location:index.php?halaman=warga");
?>