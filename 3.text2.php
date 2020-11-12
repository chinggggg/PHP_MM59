<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $a = 123;

    $b = '66';

    # echo $a + $b;
    # =189 php只做數字相加，有文字會看成0 ＆會警告

    echo "hello $b ~~<br>";
    
    #這個不行
    echo 'hello $b ~~<br>';

    echo "hello {$b}123 ~~<br>";
    echo "hello ${b}123 ~~<br>";

    echo 'hello' . $b . '123 ~~<br>';

    # \n換行 只在js \\ == 會顯示一個\ 跳脫表示法
    # \\

    

    ?>
    
    

</body>

</html>