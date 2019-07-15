<?php
    include "../koneksi.php";
    include "cek_login.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- head -->
        <?php require "head.php"; ?>
    </head>
    <body>
        <!-- konten -->
        <div class="wreaper">
            <div class="konten2">
                <center>
                    <img src="../img/logo.png" alt="logo-member" width="70%">
                </center>
                <div class="group">
                    <!-- pilih hadiah -->
                    <form action="" class="show">
                        <center>
                            <h4>Pilih Hadiah</h4>
                        </center>
                        <div class="form-group">
                            <select name="id_hadiah" id="" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                    $sql = "SELECT * FROM tb_hadiah";
                                    $query = $con->query($sql);
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?= $row['id_hadiah'] ?>"><?= $row['nama_hadiah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>

                    <!-- shake -->
                    <center>
                        <h4>Undian Pemenang</h4>
                    </center>
                    <form method="POST" id="form-member">
                        <div class="form-group">
                            <input type="text" name="winner_box" class="form-custom" id="kdmember"  placeholder="xxx-xxxx Nama Member">
                        </div>
                    </form>
                    <button class="btn btn-warning btn-block btn-lg shake" onclick="showWinner()">Shake</button>
                    <div class="hide">
                        <center>
                            <br>
                            <button class="btn btn-primary">Pilih Hadiah</button>
                        </center>
                    </div>
                    <input type="hidden" name="val" class="val" value="0">
                    <p class="copy-right">&copy; Copyright 2019 - Citra Warna. Design by Naufal Rivaldi</p>
                </div>
            </div>
        </div>
        
        <!-- JS -->
        <?php require "js.php" ?>
        <?php require "../modal.php" ?>
    </body>
</html>