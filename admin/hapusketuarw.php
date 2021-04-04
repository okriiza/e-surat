<?php

// mengambil data berdasarkan id
$ambil = $koneksi->query("SELECT * FROM rw WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$lokasitandatangan = $pecah['ttdimg'];
if (file_exists($lokasitandatangan)) {
   unlink($lokasitandatangan);
}

// delete data berdasarkan id
$koneksi->query("DELETE FROM rw WHERE id='$_GET[id]'");
echo "<script>alert('Data KetuaRW Terhapus');</script>";
echo "<script>location='index.php?halaman=ketuarw';</script>";
