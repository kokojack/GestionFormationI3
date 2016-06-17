<?php
/*
 * Couche Controllers
 */
//require_once 'C:/DEV/php/phpProjects/EasyPHP-DevServer-14.1VC9/data/localweb/projects/GestionFormationI3/Models/formations.php';
require_once 'Models/formations.php';
session_start();

	if (isset($_POST['choisir']))
	{
			extract($_POST);
			$mail = $_SESSION['email'];
			$num = $_SESSION['num'];
			echo choixFormation($num, $mail);
	}
	
	if (isset($_POST['retour']))
	{
		echo $_SESSION['email'];
		header('location:index.php?page=Controllers/interfaceUser.php');
	}
require_once 'Views/formations.php';
//require_once 'C:/DEV/php/phpProjects/EasyPHP-DevServer-14.1VC9/data/localweb/projects/GestionFormationI3/Views/formations.php';

?>



