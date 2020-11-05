<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 50px;
            height: 50px;
            color: white;
            text-align: center;
            /* border: 1px solid #afa; */
        }
    </style>
</head>

<body>
    <table>
        <?php for ($i = 0; $i < 16; $i++) { ?>
            <tr>
                <?php for ($j = 0; $j < 16; $j++) :
                    printf('<td style="background-color: #%X0%X">', $i, $j);
                    echo $i;
                    echo '</td>';
                endfor ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>