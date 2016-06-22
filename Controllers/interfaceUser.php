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
	unset($_SESSION['h']);
	$historique = findHistoriqueByMail($mail);		
}
//----------------------------------FIN------------------------------------------------------------------//

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
	echo 'Display formations';
}
//----------------------------------FIN------------------------------------------------------------------//

//-----------------Session pour le choix de formations -----------------
if (isset($_POST['chooseTraining']))
{
	if (isset($_SESSION['ct']))
	{
// 		unset($_SESSION['ct']);
		header('location:index.php?page=Controllers/formations.php');
	}
	else 
		$_SESSION['ct'] = 1;
}
if (isset($_POST['finishChoose']))
{
	unset($_SESSION['ct']);
}
//-----------------------------------FIN--------------------------------------------------------------//

//----------------Session pour la validation de formations ---------------------
if (isset($_POST['toCheck']))
{
	if (isset($_SESSION['tc']))
	{
		//unset($_SESSION['tc']);
		header('location: index.php?page=Controllers/validerFormations.php');
	}
	else 
	{
		$_SESSION['ct'] = 1;
		header('location: index.php?page=Controllers/validerFormations.php');
	}
}
if (isset($_POST['finishCheck']))
	unset($_SESSION['tc']);
//----------------------------------FIN------------------------------------------------------------------//
	
	
	
	
	
require_once 'Views/interfaceUser.php';
?>
