<?php
    $db_host ="localhost:3306";
    $db_user ="root";
    $db_pass ="";
    $db_name ="kuliah";

    $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    mysqli_select_db($koneksi, $db_name);
?>