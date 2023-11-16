<?php 
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
    $nim = $data["nim"];
    $nama = $data["nama"];
    $jurusan = $data["jurusan"];
    $email = $data["email"];
    $gambar = $data["gambar"];

    $insertQuery = "INSERT INTO daftar_mahasiswa 
                    VALUES
                    ('','$nama','$nim','$jurusan','$email','$gambar')";
                    
    mysqli_query($conn,$insertQuery);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM daftar_mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
?>