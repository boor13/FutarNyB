<?php

$pageTitle = "Kezdőlap";

//rovatok kigyűjtése:
$query = "SELECT * FROM `tags`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$tags = array();
$c = 0;
while ($tagData = $result->fetch_array()) {
	$id = $tagData['id'];
	$tags[$id] = $tagData['description'];
	$c++;
}

// Hírek kiolvasása adatbázisból:
$query = "SELECT * FROM `news` WHERE published=1 ORDER BY date DESC, tag";
$news = $db->query($query);
if ($db->errno) {
  die($db->error);
}

?>