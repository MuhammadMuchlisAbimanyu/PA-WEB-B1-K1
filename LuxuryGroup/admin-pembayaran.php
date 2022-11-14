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
        $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE nama_pemesan LIKE '%$keyword%'");
    }else{
        $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan");
    }

    $pembayaran = [];

    while($row = mysqli_fetch_assoc($result)){
        $pembayaran[] = $row;
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
            <h1 class="user-title">DATA PEMBAYARAN</h1>
            <p class="user-sub-title">Pada pendataan ini admin dapat melihat pembayaran yang telah dilakukan atau yang akan dilakukan oleh customer yang telah melakukan pemesanan</p>
        </div>
    </section>
    <section class="user-content">
        <div class="user-table-container">
            <div class="input-search">
                <a></a><br>
                <form action="" method='POST'>
                    <table>
                        <tr>
                            <td><a href="admin-akun-user.php"><i class='bx bx-arrow-back' ></i></a></td>
                            <td><input class="search-form-element" type="text" name="keyword" placeholder="Cari Data..." required></td>
                            <td><button type='submit' name='cari'><i class='bx bx-search' ></i></button></td>
                        </tr>                
                    </table>    
                </form>
            </div>
            
            <table class="user-table">
                <tr>
                    <th class="user-title-table">No</th>
                    <th class="user-title-table">Nama Pemesan</th>
                    <th class="user-title-table">Jenis Acara</th>
                    <th class="user-title-table-none">Harga</th>
                    <th class="user-title-table">No Rekening</th>
                    <th class="user-title-table">Bukti Pembayaran</th>
                    <th class="user-title-table">Status</th>
                </tr>
                <?php $i = 1; foreach ($pembayaran as $tb_pembayaran): ?>
                <tr>
                    <td class="user-sub-title-table"><?php echo $i; ?></td>
                    <td class="user-sub-title-table-center"><?php echo $tb_pembayaran['nama_pemesan']; ?></td>
                    <td class="user-sub-title-table-center"><?php echo $tb_pembayaran['kategori']; ?></td>
                    <td class="user-sub-title-table-none"><?php echo $tb_pembayaran['harga']; ?></td>
                    <td class="user-sub-title-table"><?php echo $tb_pembayaran['no_rekening']; ?></td>
                    <td class="user-sub-title-table-gambar-pembayaran">
                        <?php if($tb_pembayaran['bukti_pembayaran'] == '-'){
                            echo "-";
                        }else{ ?>
                            <img src="img-pembayaran/<?= $tb_pembayaran['bukti_pembayaran']?>" loading="lazy">
                        <?php } ?>
                    </td>
                    <td class="user-sub-title-table-center"><?php echo $tb_pembayaran['status']; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
            </table>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>