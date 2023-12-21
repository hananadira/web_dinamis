<?php
    require 'controller.php';
 
    $id = $_GET["id"];
    $student = query("SELECT * FROM db_siswa WHERE id = $id")[0];
    if ( isset ($_POST["submit"])) {
     if ( ubahData( $_POST ) > 0) {
         echo "<script>
             alert('data berhasil diubah');
             document.location.href ='index.php?page=tabel';
             </script>
             ";
     }else {
         echo "<script>
         alert('data berhasil dihapus');
         document.location.href ='index.php?page=tabel';
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
        <input type="hidden" name="id" value="<?= $student["id"] ?>"></br>
         <label>Nama : </label></br>
         <input type="text" name="nama" value="<?= $student["nama"] ?>"></br>
         <label>Nis : </label></br>
         <input type="number" name="nis" value="<?= $student["nis"] ?>"></br>
         <label>jurusan : </label></br>
         <input type="text" name="jurusan" value="<?= $student["jurusan"] ?>"></br>
         <label>Rayon : </label></br>
         <input type="text" name="rayon" value="<?= $student["rayon"] ?>"></br>
         <label>foto : </label></br>
            <input type="file" name="gambar" required=""><br>
            <button type="submit">simpan perubahan</button>
 
         <button type="submit" name="submit">Kirim</button>
     </form>
 </body>
 </html>
