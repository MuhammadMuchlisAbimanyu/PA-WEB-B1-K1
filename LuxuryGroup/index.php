<?php

    require('koneksi.php');

    $resultEvent = mysqli_query($conn, "SELECT * FROM tb_jenisevent");
    $resultClient = mysqli_query($conn, "SELECT * FROM tb_client");

    $event = [];
    $client = [];

    while($rowEvent= mysqli_fetch_assoc($resultEvent)){
        $event[] = $rowEvent;
    }

    while($rowClient = mysqli_fetch_assoc($resultClient)){
        $client[] = $rowClient;
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
    <section class='header-index'>
        <nav class="nav-index">
            <a href='index.php' class="nav-title"> <img src='image/logo.png'> </a>
            <div class='nav-links' id="navLinks">
                <img src="image/cancel.png" id="icon-cancel" onclick="hideMenu()">
                <ul>
                    <!-- <span class="icon-side-bar"><i class='bx bx-home'></i></span> -->
                    <li class="nav-bar"><a href='index.php' class="nav-title">Beranda</a></li>
                    <li class="nav-bar"><a href='#slide-about' class="nav-title">Tentang Kami</a></li>
                    <li class="nav-bar"><a href='#slide-service' class="nav-title">Layanan</a></li>
                    <li class="nav-bar"><a href='#slide-client' class="nav-title">Klien Kami</a></li>
                    <li class="nav-bar"><a href='#slide-contact' class="nav-title">Kontak</a></li>
                    <li>
                        <div class="nav-row">
                            <div class="nav-col-reg">
                                <a href='register.html' class="button-register">Daftar</a>
                            </div>
                            <div class="nav-col-log">
                                <a href='login.html' class="button-login">Masuk</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-bar"><img src="image/sun.png" id="icon-theme"></li>
                </ul>
            </div>
            <img src="image/bar.png" id="icon-bar" onclick="showMenu()">
        </nav>
        <div class='content-index'>
            <h1>SATU MOMEN UNTUK KENANGAN ABADI</h1>
            <p>Dengan team yang profesional <b> Luxury Group </b> siap membantu anda <br> membuat acara yang meyenangkan dan tak terlupakan.</p>
            <a href='login.html' class='button-index'>Selengkapnya</a>
        </div> 
    </section>

    <section class='about'>
        <p id="slide-about"></p>
        <h1 class="title">TENTANG KAMI</h1>
        <p id="about-top"></p>  
        <div class='about-row'>
            <div class='about-col' id="mockup">
            </div>
            <div class='about-col'>
                <p class="about-content"><b> Luxury Group </b> adalah penyedia layanan jasa event organizer (EO) profesional di Samarinda yang berfokus pada kualitas dan kepuasan klien. Kami berpengalaman dalam merancang dan menyelenggarakan acara untuk kegiatan corporate seperti family gathering, seminar, acara sekolah atau perkuliahan, hingga acara sosial seperti pernikahan atau pesta keluarga dengan dokumentasi yang sangat lengkap. Berbagai kegiatan baik telah kami rancang dengan konsep yang unik baik indoor maupun outdoor seperti outbound untuk mempererat tali persaudaraan antar karyawan atau menyelenggarakan bazaar untuk mengenalkan produk Anda kepada khalayak luas.</p> <br>
                <p class="about-content">Mengapa anda harus memilih <b> Luxury Group </b> sebagai event organizer untuk acara Anda? Karena kami membuka ruang diskusi bersama klien sehingga segala ide, masukan, bahkan koreksi dalam rangka menyelenggarakan sebuah acara yang memuaskan klien. Tim event organizer <b> Luxury Group </b> memiliki jiwa kreatif, solid, inovatif, dan telah berpengalaman membantu banyak klien untuk merancang berbagai acara dengan konsep yang baru, segar, dan unik sehingga tidak akan dapat dilupakan untuk selamanya. Didukung oleh keahlian dan pengalaman, jasa event organizer (EO) kami juga memiliki konsep video dan foto aerial yang akan membuat dokumentasi acara Anda menjadi lebih menarik, bahkan kami dapat menyediakan 180° dan 360° photobooth yang siap memanjakan tamu undangan. Bersama kami, “One Moment for Everlasting Memories” bukan lagi sekedar impian. Let’s Bring the Fun Out with <b> Luxury Group </b> !</p>
            </div>
        </div>
        <p id="about-bottom"></p>  
    </section>

    <section class='service'>
        <p id="slide-service"></p>
        <h1 class="title">LAYANAN KAMI</h1>
        <p id="service-top"></p>  
        <div class='service-row'>
            <?php foreach ($event as $tb_jenisevent): ?>
            <div class='service-col'>
                <div class="service-container">
                    <p class="service-content"><a href="login.html"><img src="img-event/<?php echo $tb_jenisevent['gambar'] ?>" class="service-image" loading="lazy"></a></p>
                    <p class="service-sub-title"><b><?php echo $tb_jenisevent['kategori'] ?></b></p>        
                </div>
            </div>
            <?php endforeach; ?> 
        <p id="service-bottom"></p>    
    </section>

    <section class='client'>
        <p id="slide-client"></p>
        <h1 class="client-title">KLIEN KAMI</h1>
        <p id="client-top"></p>
        <div class='client-row'>
            <?php foreach ($client as $tb_client): ?>
            <div class='client-col'>
                <p class="client-content"><img src="img-client/<?php echo $tb_client['logo_client'] ?>" class="client-image" loading="lazy"></p>
            </div>
            <?php endforeach; ?> 
        </div>
    </section>

    <section class="footer">
        <p id="slide-contact"></p>
        <div class='contact-row'>
            <div class='contact-col'>
                <h1 class="footer-title">Perusahaan</h1>
                <p class="footer-sub-title"><a href="#slide-about" class="footer-sub-title">Tentang Kami</a></p>
                <p class="footer-sub-title"><a href="#slide-service" class="footer-sub-title">Layanan Kami</a></p>
            </div>
            <div class='contact-col'>
                <h1 class="footer-title">Kontak</h1>
                <p class="footer-sub-title">luxurygroup@gmail.com</p>
                <p class="footer-sub-title">+62-821-6167-6921</p>
                <a href=""><i class='bx bxl-facebook'></i></a>           
                <a href=""><i class='bx bxl-instagram'></i></a>           
                <a href=""><i class='bx bxl-twitter'></i></a>
            </div>
            <div class='contact-col'>
                <h1 class="footer-title">Alamat</h1>
                <p class="footer-sub-title">Jl. Berdua, Sempaja Selatan, Kecamatan Samarinda Utara, Kota Samarinda, Kalimantan Timur 75242</p>
            </div>
        </div>
        <!-- <p id="contact-bottom"></p> -->
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>