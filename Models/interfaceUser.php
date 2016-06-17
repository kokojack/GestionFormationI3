<?php
/*
 * Couche Models
 */
include_once 'initDB.php';

function initRequete ($req, $mail)
{
	$pdo = initDB();
	$sql = $req;
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lemail', $mail);
	return $stmt;
}
function findFirstNameByMail ( $mail )
{
	$req = "select prenomUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "UTILISATEUR NON EXISTANT";
	}
	else {
		$retour = $stmt->fetch()[0];
	}
	return $retour;
}
function findLastNameByMail ($mail)
{
	$req = "select nomUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "UTILISATEUR NON EXISTANT";
	}
	else {
		$retour = $stmt->fetch()[0];
	}
	return $retour;
}

function findChefByMail ($mail){
	$req = "select chefUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "ERREUR";
	}
	else {
		$tab = $stmt->fetch();
		if ($tab[0] === "Je suis chef")
			$retour = "ADMINISTRATEUR";
			else
				$retour = "CHEF:\n".$tab[0];
	}
	return $retour;
}

function findHistoriqueByMail ($mail)
{
	$req = "select * from f_choisirformation cf, utilisateur u
			where cf.numutilisateur = u.numutilisateur
			and u.mailutilisateur = (:lemail) and statutFormation = 'effectuée'";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "PAS D'HISTORIQUE";
	}
	else {
		$retour = $stmt->fetch();
	}
	return $retour;
}

function findCreditByMail ($mail)
{
	$req = "select credits from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "ERREUR DE CREDITS";
	}
	else {
		$retour = $stmt->fetch()[0];
	}
	return $retour;
}

function findJoursByMail($mail)
{
	$req = "select joursUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "ERREUR DE JOURS";
	}
	else {
		$retour = $stmt->fetch()[0];
	}
	return $retour;
}

function findStatutByMail($mail)
{
	$req = "select chefUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);

	if ($stmt->execute() === false)
	{
		$retour = "ERREUR DE STATUT";
	}
	else {
		$tab = $stmt->fetch();
		$retour = $tab[0];
	}
	return $retour;
}
function findFormationByMail ($mail)
{
	$req = "select * from f_choisirFormation where mailUtilisateur = (:lemail)";
	$stmt = initRequete($req, $mail);
	if ($stmt === false)
		$retour = "ERREUR DE FORMATION";
		else{
			$tab = $stmt->fetch();
			if (empty($tab))
				$retour = "Vous n'avez pas encore choisi de formation";
				else
					$retour = $tab;
		}
		return $retour;
		header('location: ../ShowPages/maPage.php');
}
//TODO implémenter la fonction
function askPower ($mail)
{

}

function formationDisponible(){
	$pdo = initDB();
	$format = "yyyy-mm-dd";
	$date = date($format);
	$sql = "select * from f_formation where dateFormation < CURDATE()";
	$stmt = $pdo->prepare ( $sql );
	$stmt->bindParam(':dateFormation', $date);
	if ($stmt->execute () === false)
		$retour = "	ERREUR DE REQUETE";
		else {
			$tab = $stmt->fetch ();
			if (! empty ( $tab ))
				$retour = $tab;
				else
					$retour = "VIDE";
		}
		return $retour;
}

?>
