<?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "admin")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');

    if(isset($_POST['cari'])){
        $keyword =  $_POST['keyword'];
        $result = mysqli_query($conn, "SELECT * FROM tb_jenisevent WHERE kategori LIKE '%$keyword%'");
    }else{
        $result = mysqli_query($conn, "SELECT * FROM tb_jenisevent");
    }

    $event = [];

    while($row = mysqli_fetch_assoc($result)){
        $event[] = $row;
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
        <div class='content-index'>
            <h1 class="user-title">DATA JENIS ACARA</h1>
            <p class="user-sub-title">Menampilkan semua data jenis acara yang dapat dilakukan oleh Luxury Group. Nanti nya data ini akan ditampilkan sebagai layanan yang disediakan untuk customer. 
                Pada halaman ini, admin dapat mengelola pendataan ini mulai dari menambah, mengubah serta menghapus data klien</p>
        </div>
    </section>
    <section class="user-content">
        <div class="user-table-container">
            <div class="input-search">
                <a href="admin-input-event.php"><i class='bx bxs-add-to-queue'></i></a><br>
                <form action="" method='POST'>
                    <table>
                        <tr>
                            <td><a href="admin-jenis-event.php"><i class='bx bx-arrow-back' ></i></a></td>
                            <td><input class="search-form-element" type="text" name="keyword" placeholder="Cari Data..." required></td>
                            <td><button type='submit' name='cari'><i class='bx bx-search' ></i></button></td>
                        </tr>                
                    </table>    
                </form>
            </div>
            
            <table class="user-table">
                <tr>
                    <th class="user-title-table">No</th>
                    <th class="user-title-table-gambar">Gambar</th>
                    <th class="user-title-table">Kategori</th>
                    <th class="user-title-table">Deskripsi</th>
                    <th class="user-title-table">Harga</th>
                    <th class="user-title-table">Action</th>
                </tr>
                <?php $i = 1; foreach ($event as $tb_jenisevent): ?>
                <tr>
                    <td class="user-sub-title-table"><?php echo $i; ?></td>
                    <td class="user-sub-title-table-gambar">
                        <img src="img-event/<?= $tb_jenisevent['gambar']?>" loading="lazy"> <br> 
                        <!-- <?php echo $tb_jenisevent["gambar"]; ?> -->
                    </td>
                    <td class="user-sub-title-table-kategori"><?php echo $tb_jenisevent['kategori']; ?></td>
                    <td class="user-sub-title-table"><?php echo $tb_jenisevent['deskripsi']; ?></td>
                    <td class="user-sub-title-table"><?php echo $tb_jenisevent['harga']; ?></td>
                    <td class="user-sub-title-table"> 
                        <a href="admin-delete-event.php?id=<?php echo $tb_jenisevent["id"]; ?>" onclick="return confirm('Yakin ingin Menghapus data ini?')" role='button'><i class='bx bxs-trash-alt'></i></a>
                        <a href="admin-update-event.php?id=<?php echo $tb_jenisevent["id"]; ?>"> <i class='bx bxs-pencil'></i> </a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
            </table>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>