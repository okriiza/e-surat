<?php

// mengambil data berdasarkan no ktp
$ambil = $koneksi->query("SELECT * FROM warga WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// delete data berdasarkan no ktp
$koneksi->query("DELETE FROM warga WHERE id='$_GET[id]'");
echo "<script>alert('Data Warga Terhapus');</script>";
echo "<script>location='index.php?halaman=warga';</script>";
