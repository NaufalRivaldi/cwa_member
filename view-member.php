<?php
    include "koneksi.php";
    $kdmember = $_POST['kdmember'];
    $text = explode('-', $kdmember);

    if(!empty($text[1])){
        $sql = "SELECT * FROM member WHERE kdmember = '".(int)$text[0].$text[1]."'";
        $query = $con->query($sql);
        $jml = mysqli_num_rows($query);
        
        if($jml > 0){
            while($row = mysqli_fetch_array($query)){
                echo "
                <table class='table table-striped'>
                    <tr>
                        <td width='20%'>No Member</td>
                        <td width='5%'>:</td>
                        <td>".$text[0]."-".$text[1]."</td>
                    </tr>
                    <tr>
                        <td>Nama Member</td>
                        <td>:</td>
                        <td>".$row['nm_member']."</td>
                    </tr>
                    <tr>
                        <td>Lokasi Daftar</td>
                        <td>:</td>
                        <td>".$row['lokasi_daftar']."</td>
                    </tr>
                    <tr>
                        <td>Total Point</td>
                        <td>:</td>
                        <td>".$row['total_point']."</td>
                    </tr>
                    <tr>
                        <td>Last Update</td>
                        <td>:</td>
                        <td>".date('d F Y', strtotime($row['last_updated']))."</td>
                    </tr>
                </table>
                ";
            }
        }else{
            echo "
                <p>Nomer member salah atau tidak terdaftar.</p>
            ";
        }
    }else{
        echo "
                <p>Nomer member salah atau tidak terdaftar.</p>
            ";
    }
?>