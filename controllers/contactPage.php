<?php

$pageTitle = "Kapcsolat";

// oldal tartalmának betöltése adatbázisból:

$query = "SELECT * FROM `pages` WHERE `id`='kapcsolat'";
$result = $db->query($query);
if ($db->errno) {
  die($db->error);
}

// kiszedem az eredményből az 1db sort:
$page = $result->fetch_array();


// Üzenetküldés feldolgozása:
if (isset($_POST['contactSubmit'])) {
  
  $name = $_POST['contactName'];
  $email = $_POST['contactEmail'];
  $message = $_POST['contactMessage'];
  
  $emailmessage = "Üzenet a weboldalról:\n\n";
  $emailmessage .= "Feladó neve: $name\n";
  $emailmessage .= "email címe: $email\n";
  $emailmessage .= "\nÜzenet:\n\n";
  $emailmessage .= $message;
  
  mail('gazdag.andras@gmail.com', 'PHPPortál üzenet', $emailmessage);
  
}
