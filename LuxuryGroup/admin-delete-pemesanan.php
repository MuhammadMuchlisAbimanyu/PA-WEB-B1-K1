<?php 
    session_start();
 
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if(!empty($username) && ($role == "admin")) {
        
    }else{
        header("Location: login.html");
    }
    
    require('koneksi.php');

    $id = $_GET['id'];

    # Delete Gambar Di Folder
    $delete_data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id = '$id'");
    $row = mysqli_fetch_array($delete_data);

    $bukti_pembayaran = $row['bukti_pembayaran'];
    $delete = "img-pembayaran/$bukti_pembayaran";

    if(file_exists($delete)){
        unlink($delete);
    }

    $result = mysqli_query($conn, "DELETE FROM tb_pemesanan WHERE id = $id");

    if ( $result ) {
        echo"
            <script>
                alert('Pesanan Berhasil Dihapus...');
                document.location.href = 'admin-pemesanan.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Pesanan Gagal Dihapus...');
                document.location.href = 'admin-pemesanan.php';
            </script>
        ";
    }
?>