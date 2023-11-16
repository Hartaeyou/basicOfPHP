<?php 

require 'function.php';

if (isset($_POST["submitRegistrasi"])){
    if (registrasi($_POST)>0){
        echo "<script>
        alert('Anda Telah Melakukan Registrasi Anda Akan Menuju halaman Login');
        </script>";
    }
    else{
        echo mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
<h1>Halaman Registrasi</h1>
    <form action="" method ="post">
    <ul>
        <li>
            <label for="username">username</label>
            <input type="text" name = "username" id = "username" required>
        </li>
        <li>
            <label for="password">password</label>
            <input type="password" name = "password" id = "password" required>
        </li>
        <li>
            <label for="konfirmasiPassword">Konfirmasi Password</label>
            <input type="text" name = "konfirmasiPassword" id = "konfirmasiPassword" required>
        </li>
            <br>
            <button type = "submit" name ="submitRegistrasi" >Register</button>
    </ul>
</body>
</html>