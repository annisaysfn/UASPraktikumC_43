<?php
//Include koneksi database
include './config.php';

//Menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$no_ktp = $_POST['no_ktp'];
$no_telp = $_POST['no_telp'];
$tahun_masuk = $_POST['tahun_masuk'];

//Menginput data ke database
mysqli_query($koneksi, "insert into karyawan (nama, no_ktp, no_telp, tahun_masuk) values('$nama','$no_ktp','$no_telp','$tahun_masuk')");
//Mengembalikan ke halaman awal
include 'home.php';