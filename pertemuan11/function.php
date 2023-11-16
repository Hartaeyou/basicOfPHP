pertemuan11<?php 
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

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM daftar_mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($ubahdata){
    global $conn;
    $id = $ubahdata['id'];
    $nim = htmlspecialchars($ubahdata["nim"]);
    $nama = htmlspecialchars($ubahdata["nama"]);
    $jurusan = htmlspecialchars($ubahdata["jurusan"]);
    $email = htmlspecialchars($ubahdata["email"]);
    $gambar = htmlspecialchars($ubahdata["gambar"]);

    $updatequery= "UPDATE daftar_mahasiswa SET
    nama = '$nama',
    nim = '$nim',
    jurusan = '$jurusan',
    email = '$email',
    gambar = '$gambar'
    WHERE id = '$id'";

    mysqli_query($conn,$updatequery);

    return mysqli_affected_rows($conn);

}
?>