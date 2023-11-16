<?php

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar php week 6</title>
  </head>
  <style>
    .kotak {
        width: 30px;
        height: 30px;
        background-color : pink;
        text-align: center;
        line-height: 30px;
        margin: 3px;
        float: left
     }
  </style>
  <body>

<?php 
$angka = [1,2,3,4,5,6,7,8,9,10]
?>
<?php foreach ( $angka as $angkas): ?>
    <div class = "kotak"><?php echo $angkas ?></div>
<?php endforeach;?>



  </body>
  </html>