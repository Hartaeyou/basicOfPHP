<?php 
if (isset($_POST["submit"])){
    if (($_POST["username"] =="Farabi" && $_POST["password"] == "1234")) {
        header("Location: admin.php");
        exit;
    }
    else {
        $error =  true;
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Admin</h1>

    <?php if (isset($error)): ?>
        <p style = "color : pink; font: calibri; font-style: italic;" >Username atau password salah</p>
    <?php endif; ?>

    <ul>
        <form action=""method = "post">
            <li>
                <label for="username">Username</label>
                <br>
                <input type="text" name = "username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id = "password">
            </li>
            <button type = "submit" name = "submit">Login</button>
        </form>
    </ul>
    </form>
</body>
</html>