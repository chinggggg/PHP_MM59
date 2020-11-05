<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <!-- <pre></pre>可以印出程式碼 多用於除錯 -->
    <pre>

    <?php
    $a = array(
        'name' => 'Tom',
        'age' => '19'
    );
    $b = [2, 4, 5, 73, 24, 25];

    print_r($a);
    echo '<br><br>';
    print_r($b);

    echo '<br><br>';

    foreach ($a as $k => $v) {
        echo "$k : $v <br>";
    }
    echo '<br><br>';

    foreach ($b as $k => $v) {
        echo "$k : $v <br>";
    }



    ?>
    </pre>

</body>

</html>