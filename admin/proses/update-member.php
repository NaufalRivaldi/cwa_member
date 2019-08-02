<?php
    include "../../koneksi.php";
    include "../cek_login.php";

    $id_hadiah = $_POST['id_hadiah'];
    $kdmember = $_POST['kdmember'];

    $file = "../json/member.json";
    $member = file_get_contents($file);
    $data = json_decode($member, true);

    // cari data sesuai dengan kd member, lalu ubah valuenya jadi id hadiah yang sudah di POST
    foreach($data as $key => $a){
        if($a['kdmember'] === $kdmember){
            $data[$key]['id_hadiah'] = $id_hadiah;
        }
    }

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    $member = file_put_contents($file, $jsonfile);

    // show data
    $kode = $kdmember;
    $kode = str_replace('-', '', $kode);
    $sql = "SELECT nm_member FROM member WHERE kdmember LIKE '%".(int)$kode."%' LIMIT 1";
    $query = $con->query($sql);
    while($row = mysqli_fetch_array($query)){
        echo $kdmember." - ".$row['nm_member'];
    }
?>