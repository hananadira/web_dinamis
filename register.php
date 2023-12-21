<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

        $sql = "SELECT * FROM db_login WHERE username='$username'";
        $result = mysqli_query($server, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO db_login (username, password)
                    VALUES ('$username', '$password')";
            $result = mysqli_query($server, $sql);
            if ($result) {
                header("Location: index.php?page=login");
                echo "<script>alert('Selamat, pendaftaran berhasil!')</script>";
                $username = "";
                $_POST['password'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Username Sudah Terdaftar.')</script>";
        }
    
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar</title>
</head>

<body>
    <center>
        <div class="halaman">
            <form action="" method="POST">
                <h2>Sign Up</h2>
                <div>
                    <h5>Username</h5>
                    <input type="text" name="username">
                </div>
                <div>
                    <h5>Password</h5>
                    <input type="password" name="password">
                </div>
                <br>
                <br>
                <div>
                    <button name="submit">Daftar</button>
                </div>
                <p>Sudah memiliki akun? <a href="index.php?page=login">Login </a></p>
            </form>
        </div>
    </center>
</body>

</html>