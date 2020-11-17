<?php
session_start();

unset($_SESSION['admin']);
header('Location: ab-list.php');
