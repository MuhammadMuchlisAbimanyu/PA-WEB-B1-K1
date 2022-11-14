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

    $result = mysqli_query($conn, "SELECT * FROM tb_client WHERE id = $id");
    $client = [];
    $data = mysqli_fetch_assoc($result);

    while ($row = mysqli_fetch_assoc(($result))){
        $client[] = $row;
    }

    $nama_client = $client[0];

    if (isset($_POST['ubah'])){
        $namafile = htmlspecialchars($_POST["nama_client"]);
        $gambar = htmlspecialchars($_FILES["logo_client"]["name"]);
        $nama_client = htmlspecialchars($_POST['nama_client']);

        if($gambar != "") {
            $x = explode(".", $gambar);
            $extensi = strtolower(end($x));
            $gambar_baru = "$namafile.$extensi";
            $temp = $_FILES["logo_client"]["tmp_name"];

            if (move_uploaded_file($temp, 'img-client/' . $gambar_baru)){
                $query = mysqli_query($conn, "UPDATE tb_client SET nama_client = '$nama_client', logo_client = '$gambar_baru' WHERE id = '$id'");
                if ($query) {
                    echo "
                        <script>
                            alert('Data Berhasil Diubah...');
                            document.location.href = 'admin-client.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Data Gagal Diubah...');
                            document.location.href = 'admin-client.php';
                        </script>
                    ";
                }
            }
            else{
                echo "
                    <script>
                        alert('Data Gagal Diubah...');
                        document.location.href = 'admin-client.php';
                    </script>
                ";
            }
        } else {
            $query = mysqli_query($conn, "UPDATE tb_client SET nama_client = '$nama_client' WHERE id = '$id'");
                if ($query) {
                    echo "
                        <script>
                            alert('Data Berhasil Diubah...');
                            document.location.href = 'admin-client.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Data Gagal Diubah...');
                            document.location.href = 'admin-client.php';
                        </script>
                    ";
                }
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
                <h1 class="form-order-title">UPDATE DATA KLIEN</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <p class="form-order-sub-title">Nama Klien</p>
                    <input class="form-order-element" type="text" name="nama_client" value="<?php echo $data['nama_client']; ?>" required>
                    <p class="form-order-sub-title">Logo Klien</p>
                    <input class="form-order-element" type="file" name="logo_client" accept="image/jpg, image/png, image/webp">
                    <i style="float:left;font-size:11px;color:red;">Abaikan Apabila Logo Klien Tidak Dirubah</i>
            <div class="form-button-order">
                <a href="admin-client.php" class='back-button-order'>Kembali</a>
                <input class='button-input' type='submit' name="ubah" value='Ubah'></a>
                </form>                      
            </div>
        </div>
    </section>

    <script type='text/javascript' src='js/script.js'></script>
</body>
</html>