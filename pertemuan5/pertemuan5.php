<?php 
$mahasiswa = [
    ["Rayhan Raya Farabi", "1202210082", "S1 Sistem Informasi", "rayhanraya54@gmail.com"],
    ["Nadya Sri Andriani", "1202213060", "S1 Sistem Informasi", "rapfa@gmail.com"],
]
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <?php foreach ($mhs as $mhsw): ?>
            <li><?php echo $mhsw;  ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach;  ?>


</body>
</html>