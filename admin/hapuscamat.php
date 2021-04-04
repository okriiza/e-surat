<?php

// mengambil data berdasarkan no ktp
$ambil = $koneksi->query("SELECT * FROM camat WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// delete data berdasarkan no ktp
$koneksi->query("DELETE FROM camat WHERE id='$_GET[id]'");
echo "<script>alert('Data camat Terhapus');</script>";
echo "<script>location='index.php?halaman=ketuart';</script>";
