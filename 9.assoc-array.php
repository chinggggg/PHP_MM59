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
    $b = [
        'name' => 'daivd',
        'age' => '30'
    ];
    $a[] = 12;

    print_r($a);
    echo '<br><br>';
    var_dump($b);

    ?>
    </pre>

</body>

</html>