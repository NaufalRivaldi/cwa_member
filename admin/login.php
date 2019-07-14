<?php
    include "../koneksi.php";
    session_start();

    $username = addslashes(trim($_POST['username']));
    $password = addslashes(trim($_POST['password']));

    if($username == "it" && $password == "1sampai9"){
        $_SESSION['user'] = $username;
        header('Location:dashboard.php');
    }else{
        header('Location:index.php');
    }
?>