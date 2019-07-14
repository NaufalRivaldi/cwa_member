<?php
    include "../koneksi.php";
    include "cek_login.php";
    $no = 1;
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- head -->
        <?php require "head.php"; ?>
        <style>
            body{
                background:white;
            }
        </style>
    </head>
    <body>
        <!-- konten -->
        <?php require "navbar.php" ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <fieldset>
                        <legend>Tambah Hadiah</legend>
                        <form method="POST" action="proses/hadiah.php">
                            <div class="form-group">
                                <label for="nama_hadiah">Nama Hadiah</label>
                                <input type="text" name="nama_hadiah" class="form-control col-6" id="nama_hadiah">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </fieldset>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        List Data Hadiah
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Hadiah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM tb_hadiah";
                                    $query = $con->query($sql);
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nama_hadiah'] ?></td>
                                    <td><a href="proses/hadiah.php?id=<?= $row['id_hadiah'] ?>" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- JS -->
        <?php require "js.php" ?>
        <?php require "../modal.php" ?>
    </body>
</html>