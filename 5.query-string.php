<?php

// isset() 判斷變數有沒有設定
// intval() 把字串轉換成整數
// floatval() 浮點數 


//http://127.0.0.1/php-class/query-string.php?age=20
$age =  ($_GET['age']) ? ($_GET['age']) : 0;        
echo $age;
