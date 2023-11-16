<?php 
require "function.php";

$id = $_GET['id'];

if (isset($_POST["submit"])) {
    if (ubah($_POST)>0){
        echo "<script>
        alert('Data Berhasil Di Ubah');
        document.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data Gagal Diubah');
        document.location.href = 'index.php';
        </script>";
    }
}
$mahasiswa = query("SELECT * FROM daftar_mahasiswa WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Update Data</h1>
    <p>Ubah Data Hingga Benar Atas Nama <?= $mahasiswa["nama"]; ?></p>
    
        <form action="" method = "post" enctype = "multipart/form-data">
        <ul>
            <li>
                <input type="hidden" name = "id" value ="<?= $mahasiswa["id"]; ?>">
                <input type="hidden" name = "gambarlama" value ="<?= $mahasiswa["gambar"]; ?>">
            </li>
            <li>
                <label for="nama">Masukan Nama</label>
                <br>
                <input type="text" name ="nama" id = "nama" required
                value = "<?= $mahasiswa["nama"]?>">
            </li>
            <li>
                <label for="nim">Masukan NIM</label>
                <br>
                <input type="text" name = "nim" id = "nim" required
                value = "<?= $mahasiswa["nim"]?>">
            </li>
            <li>
                <label for="jurusan">Masukan Jurusan</label>
                <br>
                <input type="text" name = "jurusan" id = "jurusan" required
                value = "<?= $mahasiswa["jurusan"]?>">
            </li>
            <li>
                <label for="email">Masukan email</label>
                <br>
                <input type="text" name = "email" id = "email" required
                value = "<?= $mahasiswa["email"]?>" >
            </li>
            <li>
                <label for="gambar">Masukan gambar</label>
                <br>
                <img src="img/<?= $mahasiswa["gambar"]; ?>" width = "75">
                <br>
                <input type="file" name = "gambar" id = "gambar">
            </li>
            <br>
            <button type = "submit" name="submit"  >Ubah Data</button>
        </ul>
</body>
</html>
