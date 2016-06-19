<?php
/*
 * Couche Controllers
 */
require_once 'Models/interfaceUser.php';

$nom = findLastNameByMail($mail);
$prenom = findFirstNameByMail($mail);
$credit = findCreditByMail($mail);
$jours = findJoursByMail($mail);
$statut = findStatutByMail($mail);

//-----------------Session l'historique des formations-----------------
if (isset($_POST['lockStory'])){
	unset($_SESSION['h']);
}
if (isset($_POST['openStory']))
{
	if (isset ( $_SESSION ['h'] )) {
		unset ( $_SESSION ['h'] );
	}
	else {
		$_SESSION ['h'] = 1;
	}
}
if (isset($_SESSION['h'])){
	$historique = findHistoriqueByMail($mail);
		if (gettype ( $historique ) == array ()) {
			foreach ( $$historique as $val4 ) {
				$tab = array (
					prestafomation => $val4 [1],
					dateformation => $val4 [2],
					dureeformation => $val4 [3],
					lieuformation => $val4 [4],
					creditformation => $val4 [5],
					contenuformation => $val4 [6]
			);
		}
	} 
		else {
			$tab = $historique;
	}
}


//-----------------Session pour les formations choisies-----------------
if (isset($_POST['closeTraining'])){
	unset($_SESSION['t']);
}
if (isset($_POST['openTraning']))
{
	if (isset ( $_SESSION ['t'] )) {
		unset ( $_SESSION ['t'] );
	}
	else {
		$_SESSION ['t'] = 1;
	}
}
if (isset($_SESSION['t']))
{
	unset($_SESSION['t']);
	$formation = findFormationByMail($mail);
	//header('location:index.php?page=Controllers/formations.php');
	echo 'Display formations';
}


//-----------------Session pour le choix de formations -----------------
if (isset($_POST['chooseTraining']))
{
	if (isset($_SESSION['ct']))
	{
// 		unset($_SESSION['ct']);
		header('location:index.php?page=Controllers/formations.php');
//		$training = formationDisponible();
	}
	else 
		$_SESSION['ct'] = 1;
}
if (isset($_POST['finishChoose']))
{
	unset($_SESSION['ct']);
}

require_once 'Views/interfaceUser.php';
?>
