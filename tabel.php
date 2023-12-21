<?php 

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
}
require 'controller.php';

$username = $_GET['username'];

$data = "SELECT db_login.username, db_siswa.username, db_siswa.nis, db_siswa.jurusan, db_siswa.rayon, db_siswa.gambar
        FROM db_siswa 
        INNER JOIN db_login WHERE id.db_login = id.db_siswa and username = '$username'
        ";
    $query = mysqli_query($conn, $data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    img {
        width: 250px;
    }
    div {
        text-align: center;
    }
</style>
<body>
<div>
<a href="logout.php">Keluar</a>
    <a href="input-data.php">tambah data</a>
    <?php echo"<h1>Hallo! Selamat Datang," . $_SESSION['username'] . "!" . "</h1>"; ?>
    <?php
     while ($student = mysqli_fetch_array($query))
     { ?>
    <ul>
        <li><p>Nama : <?php echo $student["username"] ?></p></li>
        <li><p>Nis: <?php echo $student["nis"] ?></p></li>
        <li><p>Rombel: <?php echo $student["jurusan"] ?></p></li>
        <li><p><?php echo $student["rayon"] ?></p></li>
        <td><a href="<?php echo $student['gambar']?>"target="_blank"><img src="img/<?php echo $student['gambar'];?>"></a></td>
    </ul>
    <?php }?>
</div>
</body>
</html>