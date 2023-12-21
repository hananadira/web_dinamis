<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
}
 
header("Location: tabel.php")
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang!</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <?php echo"<h1>Hallo! Selamat Datang," . $_SESSION['username'] . "!" . "</h1>"; ?>
            <div>
            <a href="logout.php">Keluar</a>
            </div>
        </form>
    </div>
     
</body>
</html>