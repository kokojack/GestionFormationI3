<?php
/*
 * couche Controllers
 */
require_once 'Models/connexion.php';
session_start ();

//Vérification du pattern de connexion
function pattern($pattern, $variable, $nomVariable,$message, $count) {
	if (! isset ( $varaible ) || ! preg_match ( $pattern, $variable )) {
		$message = $message. "\nvotre " . $nomVariable . "est vide ou non conforme <br />";
		$count ++;
	}
}


//Si l'utilisateur se connecte
if (isset ( $_POST ['submit'] )) {
	extract ( $_POST );
	$i = 0;
	$mess = "";
	
	
	// mot de passe
	
	$patternMdp ='#[A-Z]+[a-z]+[0-9]+#';
	$nomVariable2 = 'password';
	pattern($patternMdp, $mdp, $nomVariable2, $mess, $i);
	// cryptage du mot de passe
	$pass = sha1 ( $mdp );
	
	// identifiant
	$id = $mail;
	$patternEmail = '#[A-Za-z0-9._-]+\.[A-Za-z0-9._-]+@M2L\.[a-z]{2,6}#';
	$nomVariable = 'adresse email';
	pattern ( $patternEmail, $mail, $nomVariable, $mess, $i );
	
// 	if (!connexion ( $id, $pass ) || $i > 0) {
// 		if (!connexion ( $id, $pass )) {
// 			echo 'Vérifiez vos informations de connexion'.connexion($id, $pass);
// 		} 
// 		else
// 			echo ("vous avez $i erreurs <br />");
// 			echo $mess;
// 	} 
// 	else 
// 	{
// 		$_SESSION ['email'] = $mail;
// 		header ( 'location: index.php?page=Controllers/interfaceUser.php' );
// 	}

	
	if (connexion($id, $pass))
	{
		$_SESSION['email'] = $mail;
		header('location:index.php?page=Controllers/interfaceUser.php');
	}
	elseif ($i>0)
	{
		echo ("vous avez $i erreurs <br />");
		echo $mess;
	}
	else 
	{
		echo '<center><h2>Vérifiez vos identifiants de connexion</h2></center>';
	}
}

//Si l'utilisateur vient de la page Inscription
if (isset($_SESSION['inscription'])){
	if($_SESSION['inscription'] == "ok") {
			echo '<div align="center">';
		echo "Félicitations, vous avez été rajouté à la communauté<br><br>";
		echo "Veuillez noter vos identifiants, ils ne vous seront plus communiqués explicitement 
				la prochaine fois<br>";
		echo "<br>Votre identifiant:   " . $_SESSION ['id'] . 
			"<br><br>Votre mot de passe:   " . $_SESSION ['pass'];
		echo "<br><br>votre chef:  " . $_SESSION ['chef'].'<br><br>';
			echo '</div>';
		unset ($_SESSION ['inscription']);
	}
}
require_once 'Views/connexion.php';