<?php
   require 'controller.php';

   if ( isset ($_POST["submit"])) {
    $fileName = $_FILES['gambar']['name'];
  // Simpan ke Database
  $sql = "INSERT INTO db_siswa (gambar) VALUES ('$fileName')";
  mysqli_query($conn, $sql);
  // Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 

    if ( tambahData( $_POST ) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href ='tabel.php';
            </script>
            ";
    }else {
        echo "<script>
        alert('data sudah pernah di tambahkan');
        document.location.href ='tabel.php';
        </script>
        ";
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Nama : </label></br>
        <input type="text" name="nama"></br>
        <label>Nis : </label></br>
        <input type="number" name="nis"></br>
        <label>Jurusan : </label></br>
        <input type="text" name="jurusan"></br>
        <label>Rayon : </label></br>
        <input type="text" name="rayon"></br>
        <label>Gambar : </label></br>
        <input type="file" name="gambar"></br>

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>