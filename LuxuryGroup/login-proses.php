<?php 
    session_start();
    
    require ('koneksi.php');
    
    if(isset($_POST['masuk'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $sql = "SELECT * FROM tb_user WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password']) && $username == $row['username'] ){
                $_SESSION['username'] = $username;
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['alamat'] = $row['alamat'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['no_telp'] = $row['no_telp'];
                $_SESSION['role'] = $row['role'];
                header("Location: admin.php");
                die();
            }else{
                echo '<script type="text/JavaScript">
                alert("Username atau Password yang anda masukkan salah, silahkan coba lagi...");
                window.Location.href="login.html";
                </script>' ;
                require('login.html');
            }

        }else{
            echo '<script type="text/JavaScript">
            alert("Username atau Password yang anda masukkan salah, silahkan coba lagi...");
            window.Location.href="login.html";
            </script>' ;
            require('login.html');
        }
    }
?>