<!DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset ="utf-8">
    <title>Rayhan Raya Farabi</title>
    <style>
        .warnaBaris {
            background-color: yellow
        }
    </style>
</head>
<body>

<table border="1" cellspacing = "0" cellpadding = "5">
    <?php for ( $i = 1; $i <= 3; $i++) : ?>
        <?php if ($i % 2 == 1)  : ?>
            <tr class = "warnaBaris">
        <?php else:  ?>
        <?php endif ?>

            <?php for ($j = 1; $j <=5 ; $j++) : ?>
                <td><?=  " $i, $j" ; ?> </td>
            <?php endfor ; ?>
        </tr>
    <?php endfor ; ?>

        <!-- // for ($i = 1; $i <= 3; $i++) {
        //     echo "<tr>";
        //     for ($j = 1; $j <=5 ; $j++){
        //         echo"<td> $i, $j</td>";
        //     }
        //     echo "</tr>";
        // } -->
    
</table>
</body>
</html>