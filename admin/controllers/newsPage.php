<?php

$pageTitle = "Hírek rögzítése";

// login form feldolgozása:
if (isset($_POST['newsSubmit'])) {
  
	$newsTitle = $_POST['title'];
	$newsText = $_POST['text'];
	$newsDate = $_POST['date'];
        $newsDate = $_POST['lead'];
	
	echo "$newsTitle $newsDate <br> $newsText"; die();
	
	// db-be írás:
	
	
}

?>