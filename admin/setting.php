<?php
    include "../koneksi.php";
    include "cek_login.php";
    $no = 1;

    // readfolder
    $folder = "json/";
    if(is_dir($folder)){
        if($open = opendir($folder)){
            while(($file = readdir($open)) !== FALSE){
                if($file !== '.' && $file !== '..'){
                    $nf = explode('@', $file);
                    $tgl = $nf[0];
                    $nama_file = $file;
                }
            }
        }
    }

    //read tgl
    $sql = "SELECT last_updated FROM member limit 1";
    $query = $con->query($sql);
    while($data = mysqli_fetch_array($query)){
        $tgl_member = $data['last_updated'];
        $tgl_member = date('Y-m-d', strtotime($tgl_member));
    }

    // perbedaan tanggal
    $tgl_now = new DateTime();
    $tgl_last = new DateTime($tgl_member);
    $diff = $tgl_now->diff($tgl_last);
    $jml = $diff->days;

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
                        <legend>Set Data Json</legend>
                        <a href="proses/data-member.php" class="btn btn-success <?= ($jml > 0) ? 'disabled' : '' ?>">Update Data</a>
                        <?php if($jml > 0): ?>
                            <p class="text text-danger">Update data member pada web pesan terlebih dahulu!</p>
                        <?php endif; ?>
                    </fieldset>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        File Json
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Tgl Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nama_file; ?></td>
                                    <td><?= $tgl; ?></td>
                                </tr>
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