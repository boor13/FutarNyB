<?php

$pageTitle = "Regisztráció";

//jogosultságok kigyűjtése:
$query = "SELECT * FROM `rights`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$rights = array();
$c = 0;
while ($uData = $result->fetch_array()) {
	$rights[$c]['id'] = $uData['id'];
	$rights[$c]['description'] = $uData['description'];
	$c++;
}

// users form feldolgozása:
if (isset($_POST['usersSubmit'])) {
  
	$userName = $_POST['uname'];
	$userPass = crypt($_POST['upass']);
	$userRealName = $_POST['uname'];
	$userEmail = $_POST['email'];
        $userActive =0;
	
        
	// db-be írás:
	$query = "INSERT INTO users (uname, upass, name, email, aktiv) VALUES "
                . "('$userName', '$userPass', '$userRealName', '$userEmail', '$userActive');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Sikeres regisztráció.';
		
	header("Location: $HOST/?q=regisztracio");
	exit;
}

?>
