<?php 
if (!isset($_GET["nama"]) or
    !isset($_GET["nim"]) or
    !isset($_GET["jurusan"])or
    !isset($_GET["email"])or
    !isset($_GET["gambar"])
){
    header("Location: latihan1.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Detail mahasiswa</title>
</head>
<body>
    <h1>Biodata Mahasiswa atas nama <?= $_GET["nama"]; ?></h1>
    <ul>
        <img src="img/<?= $_GET["gambar"]; ?>">
        <li><?= $_GET["nama"] ?></li>
        <li><?= $_GET["nim"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
        <li><?= $_GET["email"]; ?></li>        
    </ul>
<a href="latihan1.php">Kembali ke menu awal</a>
</body>
</html>
