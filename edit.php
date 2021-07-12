<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>PT Sawit Bahagia</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Data Karyawan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div>
        <?php
        //memanggil file config.php
        include 'config.php';
        //Menangkap id yang dikirim melalui button edit di index.php
        $id = $_GET['id'];
        //Melakukan query untuk mendapatkan data mahasiswa berdasarkan $id
        $karyawan = mysqli_query($koneksi, "select * from karyawan where id='$id'");

        while ($data = mysqli_fetch_assoc($karyawan)){
        ?>
            <div class="container mt-5">
                <p><a href="index.php">Home</a> / Detail Karyawan / <?php echo $data['nama'] ?></p>
                <div class="card">
                    <div class="card-header">
                        <p class="fw-bold">Profil Karyawan</p>
                    </div>
                    <div class="card-body fw-bold">
                        <form method="post" action="update.php">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" value="<?php echo $data['nama']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="noktp" class="form-label">Nomor KTP</label>
                                <input type="text" class="form-control" id="noktp" placeholder="Masukkan Nomor KTP" name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="notelp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="<?php echo $data['no_telp']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tahunmasuk" class="form-label">Tahun Masuk</label>
                                <input type="text" class="form-control" id="tahunmasuk" placeholder="Masukkan Tahun Masuk" name="tahun_masuk" value="<?php echo $data['tahun_masuk']; ?>">
                            </div>

                            <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>

</html>