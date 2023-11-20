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
</head>
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- my style -->
<link rel="stylesheet" href="style.css">
<!-- font google -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <section class="login d-flex ">
        
        <div class="login-left ">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Selamat Datang</h1>
                        <p>Selamat Datang dan Isi Username Dan Password</p>      
                    </div>                
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukan Username">
                                <div id="emailHelp" class="form-text">kami tidak akan menyebarkan email ini kesiapapun</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                            </div>
                            <?php if (isset($error)):?>
                                <p style = "color: red; text-align:center;" id="wrongpwd">Username atau Password salah</p>
                            <?php endif; ?>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember" >Ingatakan Saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">User Login</button>
                        </form>
                            <span>Belum Punya akun? <a href="registrasi.php" class="text-decoration-none">Daftar Disini</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-right ">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100 " src="img/foto.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100 " src="img/IMG_4536.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100 " src="img/" alt="Third slide">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>
    </section>

</a>
</body>
</html>