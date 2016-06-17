<?php

require_once 'Models/registration.php';

	//extract($_POST);
	if (isset($_POST['inscript']))
		header('location: index.php?page=Controllers/inscription.php');
	elseif (isset($_POST['connect']))
		header('location: index.php?page=Controllers/connexion.php');

require_once 'Views/registration.php';

?>