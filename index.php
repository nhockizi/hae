<?php
session_start();
require_once('connection.php');

if (isset($_GET['controller'])) {
    $controller = ($_GET['controller'] != '') ? $_GET['controller'] : 'pages';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'pages';
    $action = 'index';
}
require_once('routes.php');
