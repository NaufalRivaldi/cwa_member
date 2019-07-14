<?php
    include "../../koneksi.php";
    include "../cek_login.php";

    if($_POST){
        $nama_hadiah = $_POST['nama_hadiah'];
        $sql = "INSERT INTO tb_hadiah VALUES('','$nama_hadiah')";
        $query = $con->query($sql);

        if($query){
            echo "<script>location.href='../dashboard.php';</script>";
        }else{
            echo "salah";
        }
    }

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM tb_hadiah WHERE id_hadiah = '$id'";
        $con->query($sql);
        echo "<script>location.href='../dashboard.php';</script>";
    }
?>