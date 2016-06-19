<?php
/*
 * Couche Controllers
 */
//require_once 'C:/DEV/php/phpProjects/EasyPHP-DevServer-14.1VC9/data/localweb/projects/GestionFormationI3/Models/formations.php';
require_once 'Models/formations.php';

session_start();
$mail = $_SESSION['email'];

	if (isset($_POST['choisir']))
	{
			extract($_POST);
			$num = $_SESSION['num'];
// 			var_dump( $num);
// 			var_dump($mail);
// 			var_dump(findUserByMail($mail));
// 			var_dump(addValiderFormation($num, findUserByMail($mail)));
// 			var_dump(choixFormation($num, $mail));
			echo '<center><h4>'.choixFormation($num, $mail).'</h4></center>';
	}
	
	if (isset($_POST['retour']))
	{
		echo $_SESSION['email'];
		header('location:index.php?page=Controllers/interfaceUser.php');
	}
require_once 'Views/formations.php';
//require_once 'C:/DEV/php/phpProjects/EasyPHP-DevServer-14.1VC9/data/localweb/projects/GestionFormationI3/Views/formations.php';

?>



