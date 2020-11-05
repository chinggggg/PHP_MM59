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
    $a = [
        [
            'name' => 'Tom',
            'age' => '19',
            'gender' => 'male'

        ],
        [
            'name' => 'Ivy',
            'age' => '33',
            'gender' => 'female'
        ],
        [
            'name' => 'Peter',
            'age' => '13',
            'gender' => 'male'
        ],


    ];

    print_r($a);



    echo '<br><br>';

    foreach ($a[0] as $k => $v) {
        echo "$k : $v <br>";
    }

    ?>
    </pre>
    <table>

        <tr>
            <th>姓名</th>
            <th>年齡</th>
            <th>性別</th>
        </tr>
        <?php foreach ($a as $item) : ?>
            <tr>
                <td>
                    <?= $item['name'] ?>
                </td>
                <td>
                    <?= $item['age'] ?>
                </td>
                <td>
                    <?= $item['gender'] ?>
                </td>
            </tr>
        <?php endforeach ?>




    </table>



</body>

</html>