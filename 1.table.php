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
            border: 1px solid #afa;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <td style="background-color: #f2<?= $i ?>;"><?= $i ?></td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>