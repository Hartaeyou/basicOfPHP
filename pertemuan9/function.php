<?php 
// $conn = mysqli_connect("localhost:3308","root", "", "belajarphp");

$conn = mysqli_connect("localhost:3308","root", "", "belajarphp");
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows; 
}

function tambah($data){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $insertQuery = "INSERT INTO daftar_mahasiswa 
                    VALUES
                    ('','$nama','$nim','$jurusan','$email','$gambar')";
                    
    mysqli_query($conn,$insertQuery);

    return mysql_affected_rows($conn);
}

?>