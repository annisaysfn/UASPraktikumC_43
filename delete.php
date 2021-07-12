<?php
//Include koneksi database
include 'config.php';

//Menangkap data id yang dikirim dari url
$id = $_GET['id'];

//Menghapus data database
mysqli_query($koneksi, "delete from karyawan where id='$id'");
//Mengembalikan ke halaman awal
header("location:home.php");