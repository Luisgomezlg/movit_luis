<?php

/**
 * Created by PhpStorm.
 * User: INGFABIAN
 * Date: 25/08/2018
 * Time: 12:35 PM
 */
header('Access-Control-Allow-Origin: *');
header("HTTP/1.1 200");
error_reporting(E_ALL);
ini_set('display_errors', '1');

include '../buquen/model_movit.php';
$variable = "Hola mundo";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        echo json_encode($variable);
    }
}