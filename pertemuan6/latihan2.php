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
    <title>Latihan 2 pertemuan 6</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhsw): ?>
        <ul>
            <li>
                <img src="img/<?php echo $mhsw["gambar"] ?>">
            </li>
            <li><?php echo $mhsw["nama"]; ?></li>
            <li><?php echo $mhsw["nim"]; ?></li>
            <li><?php echo $mhsw["jurusan"]; ?></li>
            <li><?php echo $mhsw["email"]; ?></li>
        </ul>
    <?php endforeach; ?>








</body>
</html>