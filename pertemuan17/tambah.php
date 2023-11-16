<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require "function.php";
if (isset($_POST["submit"])){
    if (tambah($_POST)>0){
        echo "<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<style>
    body {
        background-color: #ffefcb;
    }
</style>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method = "post" enctype = "multipart/form-data">
    <ul>
        <li>
           <label for="nama">Masukan Nama</label>
           <br>
           <input type="text" name ="nama" id = "nama" required>
        </li>
        <li>
            <label for="nim">Masukan NIM</label>
            <br>
            <input type="text" name = "nim" id = "nim" required>
        </li>
        <li>
            <label for="jurusan">Masukan Jurusan</label>
            <br>
            <input type="text" name = "jurusan" id = "jurusan" required>
        </li>
        <li>
            <label for="email">Masukan email</label>
            <br>
            <input type="text" name = "email" id = "email" required >
        </li>
        <li>
            <label for="gambar">Masukan gambar</label>
            <br>
            <input type="file" name = "gambar" id = "gambar">
            <p style="font-size:65%; font-weight:bold; color: red;" >
            File Harus jpg, png, jpeg atau gif <br>
            File Tidak Melebihi Dari 2 MB
            </p>
           
        </li>
        <br>
        <button type = "submit" name="submit" >Tambahkan Data</button>
    </ul>

    </form>
<a href="index.php">Kembali Ke halaman utama</a>

</body>
</html>