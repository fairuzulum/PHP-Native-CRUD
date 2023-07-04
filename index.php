<?php

require_once 'functions.php';


if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('Data Berhasil Ditambah');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data Gagal Ditambah');
            document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP NATIVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .table tr th {
            text-align: center;
        }

        .table tr td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addMahasiswa">
            Tambah Data
        </button>
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
                foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td>
                            <a class="btn btn-success" href="">Ubah</a> |
                            <a class="btn btn-danger" href="delete.php?id=<?= $mhs['id'] ?>" onclick="confirm('Yakin?');">Hapus</a>
                        </td>
                        <td><img src="img/<?= $mhs['gambar']; ?>" width="50" alt="<?= $mhs['gambar']; ?>" ></td>
                        <td><?= $mhs['nrp']; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['email']; ?></td>
                        <td><?= $mhs['jurusan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="text" name="nrp" class="form-control" id="nrp" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="text" name="gambar" class="form-control" id="gambar" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar</label>
                            <input class="form-control" name="gambar" type="file" id="formFile">
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>