<?php 
session_start();
if($_SESSION['status']!="sudah_login"){
header("location:index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <title>PT Sawit Bahagia</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PT Sawit Bahagia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="home.php">Tambah Data Karyawan</a>
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container data-karyawan mt-5">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
        Tambah Data
        </button>

        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="create.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Tambah Data Karyawan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="noktp" class="form-label">Nomor KTP</label>
                                <input type="text" class="form-control" id="noktp" placeholder="Masukkan Nomor KTP" name="no_ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="notelp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelp" placeholder="Masukkan Nomor Telepon" name="no_telp" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tahunmasuk" class="form-label">Tahun Masuk</label>
                                <input type="date" class="form-control" id="tahunmasuk" placeholder="Masukkan Tahun Masuk" name="tahun_masuk" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped" id="tabelKaryawan">
            <thead>
                <tr>
                    <th scope="col">No. </th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor KTP</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $no = 1;
                $karyawan = mysqli_query($koneksi, "select * from karyawan");
                while ($data = mysqli_fetch_array($karyawan)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['no_ktp']; ?></td>
                        <td><?php echo $data['no_telp']; ?></td>
                        <td><?php echo $data['tahun_masuk']; ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">DETAIL</a>
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data karyawan ini?')">HAPUS</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        });
    </script>
</body>

</html>