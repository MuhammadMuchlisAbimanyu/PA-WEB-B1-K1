<?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "admin")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');
    
    if (isset($_POST['tambah'])){
        $namafile = htmlspecialchars($_POST["kategori"]);
        $gambar = $_FILES["gambar"]["name"];
        $kategori = htmlspecialchars($_POST['kategori']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $harga = htmlspecialchars($_POST['harga']);

        $x = explode(".", $gambar);
        $extensi = strtolower(end($x));
        $gambar_baru = "$namafile.$extensi";
        $temp = $_FILES["gambar"]["tmp_name"];

        if (move_uploaded_file($temp, 'img-event/'. $gambar_baru)){
            $query = mysqli_query($conn, "INSERT INTO tb_jenisevent VALUES ('', '$gambar_baru', '$kategori', '$deskripsi', '$harga')");
            if ($query) {
                echo "
                    <script>
                        alert('Data Berhasil Ditambahkan...');
                        document.location.href = 'admin-jenis-event.php';
                    </script>
                ";
            } else {
                echo error_log($query);
            }
        }
        else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan...');
                    document.location.href = 'admin-jenis-event.php';s
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
    <title>Luxury Group</title>
    <link rel='icon' href='image/icon/logo.ico'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class='user-header-index'>
        <nav class="user-nav-index">
            <img src='image/logo.png'>
            <div class='user-nav-links' id="navLinks">
                <img src="image/cancel.png" id="user-icon-cancel" onclick="hideMenu()">
                <ul>
                    <li class="user-nav-bar"><a href='admin-akun-user.php' class="user-nav-title">Kelola Akun User</a></li>
                    <li class="user-nav-bar"><a href='admin-jenis-event.php' class="user-nav-title">Kelola Jenis Acara</a></li>
                    <li class="user-nav-bar"><a href='admin-client.php' class="user-nav-title">Kelola Klien</a></li>
                    <li class="user-nav-bar"><a href='admin-pemesanan.php' class="user-nav-title">Kelola Pemesanan</a></li>
                    <li class="user-nav-bar"><a href='admin-pembayaran.php' class="user-nav-title">Lihat Pembayaran</a></li>
                    <li class="user-nav-bar"><img src="image/sun.png" id="icon-theme"></li>
                    <li class="user-nav-bar"><a href='logout.php' class="user-nav-title">Keluar</a></li>
                </ul>
            </div>
            <img src="image/bar.png" id="user-icon-bar" onclick="showMenu()">
        </nav>
        <div class="form-order-container">
            <div class="form-order">
                <h1 class="form-order-title">INPUT DATA JENIS ACARA</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <p class="form-order-sub-title">Nama Acara</p>
                    <input class="form-order-element" type="text" name="kategori" required>
                    <p class="form-order-sub-title">Gambar Produk</p>
                    <input class="form-order-element" type="file" name="gambar" accept="image/jpg, image/png, image/webp" required>
                    <p class="form-order-sub-title">Harga</p>
                    <input class="form-order-element" type="number" name="harga" required>
                    <p class="form-order-sub-title">Deskripsi</p>
                    <textarea class="form-order-element" type="text" name="deskripsi" required></textarea>
            <div class="form-button-order">
                <a href="admin-jenis-event.php" class='back-button-order'>Kembali</a>
                <input class='button-input' type='submit' name="tambah" value='Tambah'></a>
                </form>                      
            </div>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>