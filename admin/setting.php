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
                        <legend>Set Data Json</legend>
                        <a href="proses/data-member.php" class="btn btn-success">Update Data</a>
                        <p class="text text-danger">Update data member pada web pesan terlebih dahulu!</p>
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
                                    <td></td>
                                    <td></td>
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