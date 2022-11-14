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

    $result = mysqli_query($conn, "SELECT * FROM tb_jenisevent WHERE id = '$id'");

    while($row = mysqli_fetch_assoc($result)){
        $kategori = $row;
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
            <div class='user-nav-links-form-order' id="navLinks">
                <img src="image/cancel.png" id="user-icon-cancel" onclick="hideMenu()">
                <ul>
                <li class="user-nav-bar"><a href='customer-pemesanan.php' class="user-nav-title">Pemesanan</a></li>
                    <li class="user-nav-bar"><a href='customer-riwayat-pemesanan.php' class="user-nav-title">Riwayat Pemesanan</a></li>
                    <li class="user-nav-bar"><img src="image/sun.png" id="icon-theme"></li>
                    <li class="user-nav-bar"><a href='logout.php' class="user-nav-title">Keluar</a></li>
                </ul>
            </div>
            <img src="image/bar.png" id="user-icon-bar" onclick="showMenu()">
        </nav>
        <div class="form-order-container">
            <div class="form-order">
                <h1 class="form-order-title">FORMULIR PEMESANAN</h1>
                <form action="pemesanan-proses.php" method="post">
                    <p class="form-order-sub-title">Jenis Acara</p>
                    <input class="form-order-element" name='jenis_acara' type="text" value="<?php echo $kategori['kategori'] ?>" readonly>
                    <p class="form-order-sub-title">Biaya</p>
                    <input class="form-order-element" name='biaya' type="number" value="<?php echo $kategori['harga'] ?>" readonly>
                    <p class="form-order-sub-title">Nama Pemesan</p>
                    <input class="form-order-element" name='nama' type="text" value="<?php echo $_SESSION['nama'] ?>" readonly>
                    <p class="form-order-sub-title">Tanggal Acara</p>
                    <input class="form-order-element" name='tanggal' type="date" required>
                    <p class="form-order-sub-title">Lokasi Acara</p>
                    <input class="form-order-element" name='lokasi' type="text" placeholder="Masukkan lokasi acara anda..." value="<?php echo $_SESSION['alamat'] ?>" required>
                    <p class="form-order-sub-title">Nomor Telepon</p>
                    <input class="form-order-element" name='no_telp' type="number" placeholder="Masukkan nomor telepon anda..." value="<?php echo $_SESSION['no_telp'] ?>" required>
                    <p class="form-order-sub-title">Note</p>
                    <textarea class="form-order-element" name="note"></textarea>
            <div class="form-button-order">
                <a href="customer-pemesanan.php" class='back-button-order'>Kembali</a>
                <!-- <input class='button-event' type='submit' value='Hubungi Kami'> -->
                <input class='button-order' type="submit" name="pesan" value="Pesan"> 
                </form>                      
            </div>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>