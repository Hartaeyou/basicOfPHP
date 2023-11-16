<?php 
require "function.php";
session_start();
// cek cookie
if (isset($_COOKIE["id"]) and isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    
    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE users_id = $id ");
    $row = mysqli_fetch_assoc($result);
    if($_COOKIE["key"] === hash("whirlpool",$row["username"])){
        $_SESSION['login']=true;
  
    }
}

if (isset($_COOKIE["login"])){
        $_SESSION["login"] = true;   
}

if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit();

}
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn , "SELECT * FROM users WHERE username = '$username' ");
    
// cek username
    if (mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password , $row["password"])){
            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            // cek remember me
            if (isset($_POST["Remember"])){
                setcookie('id', $row["users_id"], time()+60);
                setcookie('key', hash('whirlpool', $_POST["username"]), time()+60);
            }
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label, input {
            display :inline;
        }
        body {
            background-color : #ffefcb
        }
        
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if (isset($error)):?>
        <p style = "color: red; font-style: italic;">Username / Paswwoord salah</p>
    <?php endif; ?>
    <form action="" method = "post">
        <ul>
        <li>
            <label for="username">Username</label><br>
            <input type="text" name = "username" id = "username">
        </li>
        <li>
            <label for="password">Password</label><br>
            <input type="password" name = "password" id = "password">
        </li>
        <li>
            <input type="Checkbox" name = "Remember" id = "remember">
            <label for="remember">Remember me</label>
        </li>
        <button type = "submit" name = "login">User Login</button>
        </ul>
    </form>

<p style = "color: red; font-style:bold;">Belom Login?</p>
<a href="registrasi.php"><button>Registrasi</button>
</a>
</body>
</html>