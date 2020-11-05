<?php

echo PHP_VERSION;
echo '<br>';

# 檔案路徑
echo __DIR__;
echo '<br>';

# 檔案路徑+檔名
echo __FILE__;
echo '<br>';

# 這段話在第幾行
echo __LINE__;
echo '<br>';

# 自定義
define('IP', 3.145333);
echo IP;
