<?php
    require('koneksi.php');

    if(isset($_POST['daftar'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);
        $nama = htmlspecialchars($_POST['nama']);
        $akun_dibuat = date("l, d-m-y H:i:s");
        $alamat = htmlspecialchars($_POST['alamat']);
        $email = htmlspecialchars($_POST['email']);
        $no_telp = htmlspecialchars($_POST['no_telp']);
        $role = 'customer';
        
        if($password === $cpassword) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

            if(mysqli_fetch_assoc($result)) {
                echo"
                <script>
                    alert('Username Telah Digunakan...');
                    document.locaion.href = 'register.html';
                </script>";
                require('register.html');
            } else {
                $sql = "INSERT INTO tb_user VALUES ('', '$username', '$password', '$nama', '$akun_dibuat','$alamat', '$email', '$no_telp', '$role')";
                $result = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn) > 0) {
                    echo"
                    <script>
                        alert('Registrasi Berhasil...');
                        document.location.href = 'login.html';
                    </script>";
                } else {
                    echo"
                    <script>
                        alert('Registrasi Gagal...');
                        document.location.href = 'register.html';
                    </script>";
                }
            }
        } else {
            echo"
            <script>
                alert('Password Yang Anda Masukkan Tidak Sama...');
                document.location.href = 'register.html';
            </script>";
        }
    }
?>