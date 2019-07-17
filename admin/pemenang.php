<?php
    include "../koneksi.php";
    include "cek_login.php";
    $no = 1;
    
    function getHadiah($id){
        $text = '';
        global $con;
        $sql = "SELECT * FROM tb_hadiah WHERE id_hadiah = $id";
        $query = $con->query($sql);
        while($row = mysqli_fetch_array($query)){
            $text = $row['nama_hadiah'];
        }

        return $text;
    }

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
                    <br>
                    <fieldset>
                        <legend>Update Data Ke Database</legend>
                        <a href="proses/post-member.php" class="btn btn-success">Update Data</a><br><br>
                        <?php if(!empty($_SESSION['flash'])): ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_SESSION['flash'] ?>
                                <?php unset($_SESSION['flash']) ?>
                            </div>
                        <?php endif ?>
                    </fieldset>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        Table Pemenang
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Member</th>
                                    <th>Nama</th>
                                    <th>Hadiah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $file = "json/member.json";
                                    $member = file_get_contents($file);
                                    $data = json_decode($member, true);
                                    foreach($data as $key => $a){
                                        if(isset($data[$key+1])){
                                            if($data[$key+1]['kdmember']!=$a['kdmember'] && $a['id_hadiah'] != 0){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['kdmember']; ?></td>
                                    <td><?= $a['nm_member']; ?></td>
                                    <td><?= gethadiah($a['id_hadiah']); ?></td>
                                </tr>
                                <?php }}} ?>
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