<?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "admin")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id=$id");
    $event = [];

    $data = mysqli_fetch_assoc($result);

    while ($row = mysqli_fetch_assoc(($result))){
        $event[] = $row;
    }

    $jenisevent = $event[0];

    if (isset($_POST['tambah'])){
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $no_telp = htmlspecialchars($_POST['no_telp']);

        $query = mysqli_query($conn, "UPDATE tb_pemesanan SET tanggal = '$tanggal', alamat = '$alamat', no_telp = '$no_telp' WHERE id = '$id'");
        if ($query) {
            echo "
                <script>
                    alert('Data Berhasil Diubah...');
                    document.location.href = 'admin-pemesanan.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Diubah...');
                    document.location.href = 'admin-pemesanan.php';
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
                <h1 class="form-order-title">UPDATE DATA PEMESANAN</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                <p class="form-order-sub-title">Tanggal Acara</p>
                    <input class="form-order-element" name='tanggal' type="date" value="<?php echo $data['tanggal']; ?>" required>
                    <p class="form-order-sub-title">Lokasi Acara</p>
                    <input class="form-order-element" name='alamat' type="text" value="<?php echo $data['alamat']; ?>" placeholder="Masukkan lokasi acara..."                               required>
                    <p class="form-order-sub-title">Nomor Telepon</p>
                    <input class="form-order-element" name='no_telp' type="number" value="<?php echo $data['no_telp']; ?>" placeholder="Masukkan nomor telepon..."                          required>
            <div class="form-button-order">
                <a href="admin-pemesanan.php" class='back-button-order'>Kembali</a>
                <input class='button-order' type='submit' name="tambah" value='Ubah'></a>
                </form>                      
            </div>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>