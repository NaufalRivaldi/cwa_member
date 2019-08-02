<?php
    include "../../koneksi.php";
    include "../cek_login.php";

    $sql = "SELECT kdmember, nm_member, total_point FROM member";
    $query = $con->query($sql);
    while($row = mysqli_fetch_array($query)){
        $idx = $row['total_point'];
        for($i=0; $i<$idx; $i++){
            $data[] = array(
                'kdmember' => setKode($row['kdmember']),
                'nm_member' => $row['nm_member'],
                'id_hadiah' => 0
            );
        }
    }

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents('../json/member.json', $jsonfile);
    $_SESSION['flash'] = "Data Telah Update";
    header('Location:../setting.php');

    // function
    function setKode($kode){
        $kode2 = substr($kode, -4,4);
        $kode1 = str_replace($kode2, '', $kode);
        
        if(strlen($kode1) == 1){
            $kode1 = "00".$kode1;
        }else if(strlen($kode1) == 2){
            $kode1 = "0".$kode1;
        }else if(strlen($kode1) == 3){
            $kode1 = $kode1;
        }

        return $kode1."-".$kode2;
    }
?>