<?php

require_once 'functions.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP NATIVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $mahasiswa = query("SELECT * FROM mahasiswa");
                foreach( $mahasiswa as $mhs ) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td>
                        <a href="">Ubah</a> |
                        <a href="">Hapus</a>
                    </td>
                    <td><img src="img/<?= $mhs['gambar']; ?>" width="50" alt="<?= $mhs['gambar'] ;?>"></td>
                    <td><?= $mhs['nrp']; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['email']; ?></td>
                    <td><?= $mhs['jurusan']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>