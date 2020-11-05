<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $age = $_GET['age'] ?? 0;
    $age = intval($age);
    ?>

    <?php if ($age >= 18) : ?>
        <img src="imgs/cat01.jpg" alt="">
        <p>老貓</p>

    <?php else : ?>
        <img src="imgs/cat02.jpg" alt="">
        <p>小貓</p>
    <?php endif ?>

</body>

</html>