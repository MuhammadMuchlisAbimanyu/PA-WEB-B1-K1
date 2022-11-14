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

    $result = mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");

    if ( $result ) {
        echo"
            <script>
                alert('Akun Berhasil Dihapus...');
                document.location.href = 'admin-akun-user.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Akun Gagal Dihapus...');
                document.location.href = 'admin-akun-user.php';
            </script>
        ";
    }
?>