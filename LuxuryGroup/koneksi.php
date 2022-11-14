<?php 
    $conn = mysqli_connect("localhost", "root", "", "db_luxury");

    if (!$conn) {
        die("Gagal terhubung ke database" . mysqli_connect_error());
    }
?>