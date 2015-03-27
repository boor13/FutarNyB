<?php

$pageTitle = "Keresés";
if (isset($_POST['searchSubmit'])) {

    $where = '';

    $csKod = $_POST['csKod'];
    if (!empty($csKod))
        $where.= (!empty($where)) ? " AND azonosito LIKE '$csKod'" : "azonosito LIKE '$csKod'";



    $query = (!empty($where)) ? "SELECT * FROM `csomagok` WHERE $where" : "SELECT * FROM `csomagok`";
    $found = $db->query($query);

    if ($db->errno) {
        die($db->error);
    }

    $_SESSION['sresult'] = array();
    $c = 0;
    while ($csomagok = $found->fetch_array()) {
        $_SESSION['sresult'][$c]['cimzett_neve'] = $csomagok['cimzett_neve'];
        $_SESSION['sresult'][$c]['suly'] = $csomagok['suly'];
        $_SESSION['sresult'][$c]['szalitas_kezdete'] = $csomagok['szalitas_kezdete'];
        $_SESSION['sresult'][$c]['erkezes_ideje'] = $csomagok['erkezes_ideje'];
        $_SESSION['sresult'][$c]['atvetel_ideje'] = $csomagok['atvetel_ideje'];
    }


    header("Location: $HOST/?q=kereses");
    exit;
}
?>
