<?php
$koneksi = mysqli_connect("localhost", "ucp2pkw_yasfa", "Pkw2021", "ucp2pkw_karyawan43");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}