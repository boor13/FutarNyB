<?php

session_start();

require_once 'config.php';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db->set_charset('utf8');

// Aktuális lap kiválasztása:
$page = 'kezdolap';
if (isset($_GET['q'])) {
    $page = $_GET['q'];
}

// Aktuális lap betöltése:
switch ($page) {
    case 'kezdolap':
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    case 'bemutatkozas':
        include('controllers/introductionPage.php');
        include('views/introductionPage.php');
        break;
    case 'kereses':
        include ('controllers/keresesPage.php');
        include('views/keresesPage.php');
        break;
    case 'kapcsolat':
        include('controllers/contactPage.php');
        include('views/contactPage.php');
        break;
    case 'belepes':
        include('controllers/belepPage.php');
        include('views/belepPage.php');
        break;
    case 'regisztracio':
        include('controllers/regPage.php');
        include('views/regPage.php');
        break;
    case 'csomag':
        include ('controllers/packetPage.php');
        include('views/packetPage.php');
        break;
    case 'szalit':
        include('controllers/szalitPage.php');
        include('views/szalitPage.php');
        break;
    case 'kijelentkezes':
	session_unset();
    include('controllers/belepPage.php');
    include('views/belepPage.php');
    break; 
    default:
        $pageTitle = "Oldal nem található";
        include('views/404Page.php');
    
}

$db->close();
