<?php
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "customer")) {
        
    }  else {
        header("Location: login.html");
    }
    
    require('koneksi.php');

    if(isset($_POST['pesan'])) {
        $kategori = htmlspecialchars($_POST['jenis_acara']);
        $harga = htmlspecialchars($_POST['biaya']);
        $nama_pemesan = htmlspecialchars($_POST['nama']);
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $alamat = htmlspecialchars($_POST['lokasi']);
        $no_telp = htmlspecialchars($_POST['no_telp']);
        if($_POST['note'] == NULL){
            $note = "-";
        }else{
            $note = htmlspecialchars($_POST['note']);
        }
        $no_rekening = "-";
        $bukti_pembayaran = "-";
        $status = "Belum Dibayar";
        
        $sql = "INSERT INTO tb_pemesanan VALUES ('', '$nama_pemesan', '$kategori', '$harga', '$alamat', '$tanggal','$no_telp', '$note', '$no_rekening', '$bukti_pembayaran', '$status')";
        $result = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) > 0) {
            echo"
            <script>
                alert('Pemesanan Berhasil...');
                document.location.href = 'customer-riwayat-pemesanan.php';
            </script>";
        }else{
            echo"
            <script>
                alert('Pemesanan Gagal...');
                document.location.href = 'customer.php';
            </script>";
            }
        }

?>