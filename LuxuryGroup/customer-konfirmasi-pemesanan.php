<?php
    require 'koneksi.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id=$id");
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
                <h1 class="form-order-title">PESANAN ANDA</h1>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <form action="pembayaran-proses.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <p class="form-order-sub-title">Jenis Acara</p>
                        <input class="form-order-element" name='jenis_acara' type="text" value="<?php echo $row['kategori'] ?>" readonly>
                        <p class="form-order-sub-title">Biaya</p>
                        <input class="form-order-element" name='biaya' type="number" value="<?php echo $row['harga'] ?>" readonly>
                        <p class="form-order-sub-title">Nama Pemesan</p>
                        <input class="form-order-element" name='nama' type="text" value="<?php echo $row['nama_pemesan'] ?>" readonly>
                        <p class="form-order-sub-title">Tanggal Acara</p>
                        <input class="form-order-element" name='tanggal' type="date" value="<?php echo $row['tanggal'] ?>" readonly>
                        <p class="form-order-sub-title">Lokasi Acara</p>
                        <input class="form-order-element" name='lokasi' type="text" value="<?php echo $row['alamat'] ?>" readonly>
                        <p class="form-order-sub-title">Nomor Telepon</p>
                        <input class="form-order-element" name='no_telp' type="number" value="<?php echo $row['no_telp'] ?>" readonly>
                        <p class="form-order-sub-title">Note</p>
                        <textarea class="form-order-element" name="note" readonly><?php echo $row['note'] ?></textarea>
                <?php } ?>             
            </div>
        </div>
    </section>

    <section class='user-header-index'>
    <h1 class="form-order-title-pembayaran">PEMBAYARAN</h1>
        <div class="form-pembayaran-container">
            <div class="form-pembayaran">
                <div class="qr-code-container">
                    <img class="qris" src="image/qris.png" loading="lazy"><br>
                    <img class="qr-code" src="image/qr-code.jpg" loading="lazy"><br>
                    <img class="qris" src="image/bca.png" loading="lazy"><br>
                    <h2 class="rekening-top">2202910677</h2>
                    <h2 class="rekening-bottom">A/N Luxury Group</h2>
                    <p class="form-order-sub-title-dark">Bukti Pembayaran</p>
                    <input class="form-order-element" type="file" name="gambar" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                    <p class="form-order-sub-title-dark">No Rekening</p>
                    <input class="form-order-element" name='no_rekening' type="number" placeholder="Masukkan nomor rekening anda..." required>
                </div>
            </div>
        </div>
        <div class="form-button-order">
                <a href="customer-riwayat-pemesanan.php" class='back-button-order'>Kembali</a>
                <input class='button-order' type="submit" name="bayar" value="Konfirmasi">
            </form>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>