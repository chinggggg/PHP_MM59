<?php
session_start();
unset($_SESSION['user']);
header('Location: 16.index_lognin.php');
