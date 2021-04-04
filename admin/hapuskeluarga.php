<?php  

// mengambil data berdasarkan id kk
$ambil = $koneksi->query("SELECT * FROM kk WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// delete data berdasarkan id kk
$koneksi->query("DELETE FROM kk WHERE id='$_GET[id]'");
echo "<script>alert('Data Keluarga Terhapus');</script>";
echo "<script>location='index.php?halaman=kartukeluarga';</script>";
