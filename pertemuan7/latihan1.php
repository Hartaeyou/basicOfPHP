<?php 
$mahasiswa = [
    ["nama" => "Rayhan Raya Farabi", 
    "nim" => "1202210082", 
    "jurusan" => "S1 Sistem Informasi", 
    "email" => "rayhanraya54@gmail.com",
    "gambar" => "foto1.jpg"],
    
    ["nama" =>"Nadya Sri Andriani", 
    "nim" => "1202213060", 
    "jurusan" =>" S1 Sistem Informasi",
    "email" =>  "rapfa@gmail.com",
    "gambar" => "foto2.jpg"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<p>Klik lah salah satu dari nama dibawah ini</p>
<ul>
    <?php foreach($mahasiswa as $mhsw): ?>
        <li>
            <a href="latihan2.php?nama=<?=$mhsw["nama"]?>&nim=<?=$mhsw["nim"];?>&jurusan=<?=$mhsw["jurusan"];?>&email=<?=$mhsw["email"];?>&gambar=<?=$mhsw["gambar"];?>"><?= $mhsw["nama"]?></a>
        </li>
    <?php endforeach ; ?>


</ul>
</html>