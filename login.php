<?php 
    include 'controller.php';
     
    error_reporting(0);
     
    session_start();
     
    if (isset($_SESSION['username'])) {
        header('Location: tabel.php');
    }else {

    
    if (isset($_POST['submit'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
     
        $sql = "SELECT * FROM db_login WHERE username='$username' AND password='$password' ";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
    
            $ceksesi = $_SESSION['username'];
            echo "$ceksesi";
            
            header("Location: tabel.php?username=$username");
        } else {
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
</head>
<body>
<div class="halaman">
	<h2>Silahkan Login</h2>
</div>
<center>
   <form action="" method="post">
        <h5>Username</h5>
        <input type="string" name="username">
        <br>
        <h5>Password</h5>
        <input type="password" name="password">
        <br>
        <br>
        <button name="submit">Masuk</button>
        <p>Anda belum punya akun? <a href="index.php?page=register">Sign Up</a></p>
   </form>
</center>
    
</body>
</html>