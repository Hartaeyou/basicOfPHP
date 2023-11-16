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
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    // upload gambar

    $gambar = upload();
    if ($gambar == false){
        return false;
    }


    $insertQuery = "INSERT INTO daftar_mahasiswa 
                    VALUES
                    ('','$nama','$nim','$jurusan','$email','$gambar')";
                    
    mysqli_query($conn,$insertQuery);

    return mysqli_affected_rows($conn);
}
function upload (){

    $namaFile = $_FILES["gambar"]['name'];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]['error'];
    $tmpFile = $_FILES["gambar"]['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('Upload Gambar Terlebih Dahulu');
        </script>
        ";
    }
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
        alert('Silahkan Upload Gambar dengan file jpg, png, jpeg, gif');
        </script>";
        return false;
    }
    if ($ukuranFile > 2000000){
        echo "<script>
        alert('File Tidak Boleh Lebih dari 2 MB');
        </script>";
        return false;
    }
    // lolos pengecekan
    $namaFileAcak = uniqid(); 
    $namaFileAcak  .= '.' ; 
    $namaFileAcak .= $ekstensiGambar;
    move_uploaded_file($tmpFile , 'img/' . $namaFileAcak);
    return $namaFileAcak;
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
    $gambarlama = htmlspecialchars($ubahdata["gambarlama"]);
    if ($_FILES["gambar"]["error"]===4){
        $gambar = $gambarlama;
    }
    else{
        $gambar = upload();
    }
 

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
function cari($keyword) {
    global $conn;
    $querys = "SELECT * FROM daftar_mahasiswa WHERE nama LIKE '%$keyword%' OR 
    id LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    email LIKE '%$keyword%' 
    ";
    return query($querys);
    }

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $konfirmasiPassword = mysqli_real_escape_string($conn,$data["konfirmasiPassword"]);

    $result = "SELECT username FROM users WHERE username = '$username'";
    $results = mysqli_query($conn,$result);
    if (mysqli_fetch_assoc($results)){
        echo "<script>
        alert('Username Telah Ada Tolong Diganti Ke Username Lain')
        </script>";
        return false;
    }

    if ($password !== $konfirmasiPassword){
        echo "<script>
        alert('Konfirmasi Password tidak sesuai');
        </script>";
        return false;
    };
    // enkripsi pw
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $queryRegistrasi = "INSERT INTO users 
    VALUES ('' , '$username', '$password')";
    mysqli_query($conn, $queryRegistrasi);
    return mysqli_affected_rows($conn);
}   
?>