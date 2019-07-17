<?php
    include "../../koneksi.php";
    include "../cek_login.php";
    $no = 1;
    $sql1 = 'INSERT INTO tb_pemenang VALUES';
    $sql2 = '';

    // delete row table
    $con->query('DELETE FROM tb_pemenang');
    
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

    $file = "../json/member.json";
    $member = file_get_contents($file);
    $data = json_decode($member, true);
    foreach($data as $key => $a){
        if(isset($data[$key+1])){
            if($data[$key+1]['kdmember']!=$a['kdmember'] && $a['id_hadiah'] != 0){
                $sql2 = $sql2."('','".$a['kdmember']."','".$a['nm_member']."','".gethadiah($a['id_hadiah'])."'),";
            }
        }
    }

    $fullsql = $sql1.substr($sql2,0,-1);
    $query = $con->query($fullsql);
    if($query){
        $_SESSION['flash'] = "Data Telah Update";
        echo "<script>location.href='../pemenang.php';</script>";
    }else{
        echo"gagal";
    }
?>