<?php

    $host = "127.0.0.1" ;
    $user = "thoriq";
    $password = "ahmad";
    $database = "traningUjikom";
    
    $conn = mysqli_connect($host, $user, $password, $database);

    if(!$conn){
        die("coonection fail : " . mysqli_connect_error());
    }else{
        // echo "Koneksi Berhasil";
    }

?>