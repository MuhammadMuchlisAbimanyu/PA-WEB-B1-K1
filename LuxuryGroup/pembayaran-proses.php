<?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "customer")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id=$id");

    $event = [];

    while ($row = mysqli_fetch_assoc(($result))){
        $event[] = $row;
    }

    $jenisevent = $event[0];

    if (isset($_POST['bayar'])){
        $namafile = htmlspecialchars($_POST["nama"]);
        $gambar = $_FILES["gambar"]["name"];
        $no_rekening = htmlspecialchars($_POST['no_rekening']);

        $x = explode(".", $gambar);
        $extensi = strtolower(end($x));
        $gambar_baru = "Bukti Pembayaran.$namafile.(id-pemesanan=$id).$extensi";
        $temp = $_FILES["gambar"]["tmp_name"];

        if (move_uploaded_file($temp, 'img-pembayaran/'. $gambar_baru)){
            $query = mysqli_query($conn, "UPDATE tb_pemesanan SET no_rekening = '$no_rekening', bukti_pembayaran = '$gambar_baru', status = 'Sudah Dibayar' WHERE id = '$id'");
            if ($query) {
                echo "
                    <script>
                        alert('Bukti Pembayaran Anda Berhasil Dikirim...');
                        document.location.href = 'customer-riwayat-pemesanan.php';
                    </script>
                ";
            } else {
                echo error_log($query);
            }
        }
        else{
            echo "
                <script>
                    alert('Bukti Pembayaran Anda Gagal Dikirim...');
                    document.location.href = 'customer-riwayat-pemesanan.php';
                </script>
            ";
        }
    }
?><?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "customer")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id=$id");

    $event = [];

    while ($row = mysqli_fetch_assoc(($result))){
        $event[] = $row;
    }

    $jenisevent = $event[0];

    if (isset($_POST['bayar'])){
        $namafile = htmlspecialchars($_POST["nama"]);
        $gambar = $_FILES["gambar"]["name"];
        $no_rekening = htmlspecialchars($_POST['no_rekening']);

        $x = explode(".", $gambar);
        $extensi = strtolower(end($x));
        $gambar_baru = "Bukti Pembayaran.$namafile.(id-pemesanan=$id).$extensi";
        $temp = $_FILES["gambar"]["tmp_name"];

        if (move_uploaded_file($temp, 'img-pembayaran/'. $gambar_baru)){
            $query = mysqli_query($conn, "UPDATE tb_pemesanan SET no_rekening = '$no_rekening', bukti_pembayaran = '$gambar_baru', status = 'Sudah Dibayar' WHERE id = '$id'");
            if ($query) {
                echo "
                    <script>
                        alert('Bukti Pembayaran Anda Berhasil Dikirim...');
                        document.location.href = 'customer-riwayat-pemesanan.php';
                    </script>
                ";
            } else {
                echo error_log($query);
            }
        }
        else{
            echo "
                <script>
                    alert('Bukti Pembayaran Anda Gagal Dikirim...');
                    document.location.href = 'customer-riwayat-pemesanan.php';
                </script>
            ";
        }
    }
?>