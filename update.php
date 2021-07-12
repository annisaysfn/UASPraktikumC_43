<?php
//koneksi database
include './config.php';

//Menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$no_ktp = $_POST['no_ktp'];
$no_telp = $_POST['no_telp'];
$tahun_masuk = $_POST['tahun_masuk'];

//Menginput data ke database
mysqli_query($koneksi, "update karyawan set nama='$nama', no_ktp='$no_ktp', no_telp='$no_telp', tahun_masuk='$tahun_masuk' where id='$id'");
//Mengembalikan ke halaman awal
header("location:home.php");