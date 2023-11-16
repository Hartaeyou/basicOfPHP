<?php 
require "../function.php";
$keyword =$_GET['keyword'];
$query = "SELECT * FROM daftar_mahasiswa WHERE nama LIKE '%$keyword%' OR 
            id LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR
            email LIKE '%$keyword%' 
";
$mahasiswa=query($query);
?>
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
        <img src="img/<?php echo $baris["gambar"] ?>" width = "50" >
    </td>
    <td><?= $baris["nim"]; ?></td>
    <td><?= $baris["nama"]; ?></td>
    <td><?= $baris["email"]; ?></td>
    <td><?= $baris["jurusan"]; ?></td>
</tr>

<?php $i++ ?>

<?php endforeach; ?>

</table>