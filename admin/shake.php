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
                    <form action="" id="form-hadiah" class="show">
                        <center>
                            <h4>Pilih Hadiah</h4>
                        </center>
                        <div class="form-group">
                            <select name="" id="hadiah" class="form-control" onchange="switchHadiah()">
                                <option value="0">Pilih</option>
                                <?php
                                    $sql = "SELECT * FROM tb_hadiah";
                                    $query = $con->query($sql);
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?= $row['id_hadiah'] ?>" nama="<?= $row['nama_hadiah'] ?>"><?= $row['nama_hadiah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>

                    <!-- shake -->
                    <center>
                        <h4>Undian Pemenang <div id="nama_hadiah"></div></h4>
                    </center>
                    <form method="POST" id="form-member">
                        <div class="form-group">
                            <input type="text" name="winner_box" class="form-custom" id="kdmember"  placeholder="xxx-xxxx Nama Member">
                        </div>
                        
                        <!-- hidden form -->
                        <input type="hidden" name="kdmember" class="kdmember">
                        <input type="hidden" name="id_hadiah" class="hadiah">
                    </form>
                    <button class="btn btn-warning btn-block btn-lg shake" onclick="showWinner()">Shake</button>
                    <div id="btn-hadiah" class="hide">
                        <center>
                            <br>
                            <button class="btn btn-primary" onclick="switchBtn()">Pilih Hadiah</button>
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