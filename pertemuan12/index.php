<?php require "function.php";?>

<?php $mahasiswa = query("SELECT * FROM daftar_mahasiswa");
if (isset($_POST["tombolCari"])>0) {
    $mahasiswa = cari($_POST["keyword"]);
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Admin</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">tambah data mahasiswa</a>
<br><br>


<form action="" method = "post" >
    <label for="keyword">Masukan Sesuai Keywoard</label>
    <br>
    <input type="text" name = keyword id = "keyword" size = "40" autofocus placeholder = "Masukan Keywoard Pencarian..." autocomplete = "off" >
    <br>
    <button type = "submit" name = "tombolCari">Cari!</button>
    <br>

</form>
<br>
<table border = "1" cellpadding = "10" cellspacing = "0">

    <tr>
        <th>No.</th>
        <th>Id.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

   <?php 
    $i = 1;
    foreach($mahasiswa as $baris):
    ?>
    <tr>
        <td>
            <?= $i; ?>
        </td>
        <td>
            <?=$baris["id"]; ?>

        </td>
        <td>
            <a href="hapus.php?id=<?=$baris["id"] ?>"onclick = "return confirm('yakin');">Hapus</a> ||
            <a href="ubah.php?id=<?=$baris["id"] ?>">Ubah</a>
        </td>
        <td>
            <img src="img/<?php echo "gambar.jpg" ?>" width = "50" >
        </td>
        <td><?= $baris["nim"]; ?></td>
        <td><?= $baris["nama"]; ?></td>
        <td><?= $baris["email"]; ?></td>
        <td><?= $baris["jurusan"]; ?></td>
    </tr>
    <?php $i++ ?>

    <?php endforeach; ?>


</table>    
</body>
</html>
