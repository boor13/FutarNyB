<?php

$pageTitle = "Csomagok kezelése";

// users form feldolgozása:
if (isset($_POST['csomagSubmit'])) {

    $felado = $_POST['senders'];
    $vegpont = $_POST['vegpont'];
    $torekeny = $_POST['torekeny'];
    $szallito = $_POST['users'];
    $cimzett_neve = $_POST['cimzett_neve'];
    $suly = $_POST['suly'];
    $feladas_ideje = date('Y-m-d H:i:s');
    $azonosito = date('U');

    // db-be írás:
    $query = "INSERT INTO csomagok (felado_id, suly, cimzett_neve, szallitasi_pont_id, "
            . "feladas_ideje, torekeny, azonosito, szallito_id) "
            . "VALUES ($felado, $suly, '$cimzett_neve', $vegpont, "
            . "'$feladas_ideje', $torekeny, '$azonosito', $szallito);";
    $db->query($query);
    if ($db->errno) {
        die($db->error);
    }

    $_SESSION['msg'] = 'Csomag rögzítve.';

    header("Location: $HOST/?q=csomag");
    exit;
}


// Csomagok állapotának váltása:
if (isset($_GET['muv'])) {
    switch ($_GET['muv']) {
        case 'feladas':
            $ido = date('Y-m-d H:i:s');
            $csomag_id = $_GET['id'];
            $query = "UPDATE csomagok SET szalitas_kezdete='$ido' WHERE id=$csomag_id";
            $db->query($query);
            if ($db->errno) {
                die($db->error);
            }
            break;
        case 'megerkezett':
            $ido = date('Y-m-d H:i:s');
            $csomag_id = $_GET['id'];
            $query = "UPDATE csomagok SET erkezes_ideje='$ido' WHERE id=$csomag_id";
            $db->query($query);
            if ($db->errno) {
                die($db->error);
            }
            break;
        case 'atvetel':
            $ido = date('Y-m-d H:i:s');
            $csomag_id = $_GET['id'];
            $query = "UPDATE csomagok SET atvetel_ideje='$ido' WHERE id=$csomag_id";
            $db->query($query);
            if ($db->errno) {
                die($db->error);
            }
    }
    $_SESSION['msg'] = 'Csomag adatai módosítva.';

    header("Location: $HOST/?q=csomag");
    exit;
}

//munkatárs kigyűjtése:
$query = "SELECT id,name FROM `users`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}


$query = "SELECT csomagok.*,feladok.nev,szalitasi_pontok.megnevezes,szalitasi_pontok.varos FROM `csomagok` JOIN feladok JOIN szalitasi_pontok "
        . "ON csomagok.felado_id=feladok.id AND csomagok.szallitasi_pont_id=szalitasi_pontok.id ORDER BY csomagok.feladas_ideje DESC";
$csomagok = $db->query($query);
if ($db->errno) {
    die($db->error);
}


$users = array();
$c = 0;
while ($uData = $result->fetch_array()) {
    $users[$c]['id'] = $uData['id'];
    $users[$c]['name'] = $uData['name'];
    $c++;
}

//feladok kigyűjtése:
$query = "SELECT id,nev FROM `feladok`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}
//feladok kigyüjtése
$senders = array();
$c = 0;
while ($uData = $result->fetch_array()) {
    $senders[$c]['id'] = $uData['id'];
    $senders[$c]['nev'] = $uData['nev'];
    $c++;
}

//szállítási pont kigyűjtése:
$query = "SELECT id,varos,utcahaz,megnevezes FROM `szalitasi_pontok`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}

$vegpont = array();
$c = 0;
while ($uData = $result->fetch_array()) {
    $vegpont[$c]['id'] = $uData['id'];
    $vegpont[$c]['megnevezes'] = $uData['megnevezes'];
    $vegpont[$c]['cim'] = $uData['varos'] . ' ' . $uData['utcahaz'];
    $c++;
}


?>

