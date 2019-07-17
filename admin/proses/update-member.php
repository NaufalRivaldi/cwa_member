<?php
    include "../../koneksi.php";
    include "../cek_login.php";

    $id_hadiah = $_POST['id_hadiah'];
    $kdmember = $_POST['kdmember'];

    echo $id_hadiah.$kdmember;

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
?>