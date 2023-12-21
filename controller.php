<?php
    $conn = mysqli_connect("localhost", "root", "", "db");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query); //menjalankan perintah
        $kotaks = [];
        while ($kotak = mysqli_fetch_assoc($result)) { //menghasilkan data array
            $kotaks[] = $kotak;
        }
        return $kotaks;
    }

    function tambahData($data) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $nis = htmlspecialchars($data["nis"]);
        $rombel = htmlspecialchars($data["jurusan"]);
        $rayon = htmlspecialchars($data["rayon"]);
        $foto= htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO db_siswa
                     VALUES
                 ('', '$nama', '$nis', '$jurusan', '$rayon', '$gambar')
                 ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete( $id ){
        global $conn;
        $delete = "DELETE FROM db_siswa WHERE id = $id";
        mysqli_query($conn, $delete);

        return mysqli_affected_rows ($conn);
    }

    function ubahData( $data ) {
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nis = htmlspecialchars($data["nis"]);
        $rombel = htmlspecialchars($data["rombel"]);
        $rayon = htmlspecialchars($data["rayon"]);
        $foto = htmlspecialchars($data["foto"]);

        $query = "UPDATE db_siswa SET 
                    nama = '$nama',
                    nis = '$nis',
                    jurusan = '$jurusan',
                    rayon = '$rayon',
                    gambar = '$gambar'
                    WHERE id = $id
                 ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function search($keyword){
        $query = "SELECT * FROM db_siswa 
        WHERE 
        nama LIKE '%$keyword%' OR
        nis LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        rayon LIKE '%$keyword%' 
    ";

// nama depan
//$
// nama LIKE '$keyword%'

        return query($query);
    }
?>