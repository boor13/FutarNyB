<?php

$pageTitle = "Csomagok kezelése";


//munkatárs kigyűjtése:
$query = "SELECT id,name FROM `users`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}


$query = "SELECT csomagok.*,feladok.nev AS felado_nev,szalitasi_pontok.megnevezes,szalitasi_pontok.varos FROM `csomagok` JOIN feladok JOIN szalitasi_pontok "
        . "ON csomagok.felado_id=feladok.id AND csomagok.szallitasi_pont_id=szalitasi_pontok.id WHERE csomagok.id=".$_GET['id'];
$csomag = $db->query($query)->fetch_assoc();
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

