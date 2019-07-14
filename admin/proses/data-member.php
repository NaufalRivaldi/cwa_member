<?php
    include "../../koneksi.php";
    include "../cek_login.php";

    $date = date('Y-m-d');

    $sql = "SELECT k.kdmember, m.nm_member FROM kemungkinan k INNER JOIN member m ON k.kdmember = m.kdmember";
    $query = $con->query($sql);
    while($row = mysqli_fetch_array($query)){
        $data[] = array(
            'kdmember' => $row['kdmember'],
            'nm_member' => $row['nm_member'],
            'id_hadiah' => 0
        );
    }

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents('../json/'.$date.'@member.json', $jsonfile);
    header('Location:../setting.php');
?>