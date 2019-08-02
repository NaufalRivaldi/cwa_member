<?php
    include "koneksi.php";

    // lokasi daftar
    function cekLokasi($data){
        $list = array(
			"CW1" => "Citra Warna 1 Imam Bonjol",
			"CW2" => "Citra Warna 2 Imam Bonjol",
			"CW3" => "Citra Warna 3 Buluh Indah",
			"CW4" => "Citra Warna 4 Canggu",
			"CW5" => "Citra Warna 5 Teuku Umar Barat",
			"CW6" => "Citra Warna 6 Sunset Road",
			"CW7" => "Citra Warna 7 Gatot Subroto",
			"CW8" => "Citra Warna 8 Ubud",
			"CW9" => "Citra Warna 9 Mumbul Nusa Dua",
			"CA0" => "Citra Warna 10 Mahendradatha",
			"CA1" => "Citra Warna 11 Semabaung Gianyar",
			"CA2" => "Citra Warna 12 Kediri Tabanan",
			"CA3" => "Citra Warna 13 Panjer",
			"CA4" => "Citra Warna 14 Dalung",
			"CA5" => "Citra Warna 15 Singaraja",
			"CA6" => "Citra Warna 16 Tibubeneng",
			"CA7" => "Citra Warna 17 WR. Supratman",
			"CA8" => "Citra Warna 18 Waturenggong",
			"CA9" => "Citra Warna 19 Ahmad Yani",
			"CL1" => "Citra Warna Lombok 1"
		);

		if(isset($list[$data]))
			return $list[$data];
		return false;
    }

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
                        <td>".cekLokasi($row['lokasi_daftar'])."</td>
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