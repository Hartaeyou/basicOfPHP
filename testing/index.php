<?php 
if ($_GET["username1"]){
    echo "muncul";
}
else {
    echo "gamuncul";
}
var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cuman Belajar</h1>
    <form action="" method = "get">
        <label for="username1">Input 1</label>
        <input type="text" name = "username1" id = "username1">
        <button type="submit" name = "username"></button>

    </form>
</body>
</html>