<?php
require __DIR__ . '/config.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin'])) {
    require __DIR__ . '/ab-list-admin.php';
} else {
    require __DIR__ . '/ab-list-no-admin.php';
}
