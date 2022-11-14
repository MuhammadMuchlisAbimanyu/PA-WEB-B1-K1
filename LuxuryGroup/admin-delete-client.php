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

    # Delete Gambar Di Folder
    $delete_data = mysqli_query($conn, "SELECT * FROM tb_client WHERE id = '$id'");
    $row = mysqli_fetch_array($delete_data);

    $gambar = $row['logo_client'];
    $delete = "img-client/$gambar";

    if(file_exists($delete)){
        unlink($delete);
    }

    $result = mysqli_query($conn, "DELETE FROM tb_client WHERE id = $id");

    if ( $result ) {
        echo"
            <script>
                alert('Data Berhasil Dihapus...');
                document.location.href = 'admin-client.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Data Gagal Dihapus...');
                document.location.href = 'admin-client.php';
            </script>
        ";
    }
?>