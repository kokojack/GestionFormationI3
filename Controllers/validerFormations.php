<?php
/*
 * Couche Controllers
 */

require_once 'Models/validerFormations.php';

session_start();
$mail = $_SESSION['email'];
if (isset($_SESSION['numFormation']))
	$num = $_SESSION['numFormation'];


if (isset($_POST['valider']))
{
	extract($_POST);
				var_dump($num);
				var_dump($mail);
	// 			var_dump(findUserByMail($mail));
	// 			var_dump(addValiderFormation($num, findUserByMail($mail)));
	// 			var_dump(choixFormation($num, $mail));
	echo '<center><h4>'.formationValidee($num, $mail).'</h4></center>';
}

if (isset($_POST['retour']))
{
	echo $_SESSION['email'];
	header('location:index.php?page=Controllers/interfaceUser.php');
}



require_once 'Views/validerFormations.php';
?>