<?php
session_start();
require_once '../config.php';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db->set_charset('utf8');
// Aktuális lap kiválasztása:
$page = 'login';
if(isset($_GET['q'])){
    $page = $_GET['q'];
}
// Aktuális lap betöltése:
switch ($page){
    case 'login';
        include('controllers/loginPage.php');
        include('views/loginPage.php');
        break;
    default:
        $pageTitle = "login";
        include('views/loginPage.php');
}
$db->close();

