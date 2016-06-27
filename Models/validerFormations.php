<?php
/*
 * Couche Models
 */
include_once 'Models/initDB.php';

function findNumChef($mail)
{
	$pdo = initDB();
	$sql = "SELECT numUtilisateur
			FROM Utilisateur
			WHERE mailUtilisateur = (:lemail)
			AND statut = 'Je suis chef'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lemail', $mail);
	if ($stmt->execute() === false)
		$retour = "ERREUR SYNTAXE SQL";
	else 
	{
		$tab = $stmt->fetch();
		if (gettype($tab) == "array")
			if (!empty($tab))
				$retour = $tab[0];
			else 
				$retour = "CE CHEF N'EXISTE PAS";
	}
	return $retour;
}


function toValidate($mail)
{
	$numchef = findNumChef($mail);
	$pdo = initDB();
	$sql = "SELECT u.nomUtilisateur, u.prenomUtilisateur, f.contenuFormation, f.dureeFormation, f.creditFormation, 
			f.dateFormation, f.numFormation
			FROM f_formation f, f_validerformation vf, f_utilisateur u
			WHERE u.numUtilisateur = vf.numUtilisateur
			AND f.dateFormation > CURDATE()
			AND vf.chefResponsable = (:lechef)
			AND vf.numFormation = f.numFormation
			AND vf.statut = 'En Attente'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lechef', $mail);
	if ($stmt->execute() == false)
		$retour = "VIDE";
	else
		$retour= $stmt->fetchAll();
	return $retour;
}
function findUserByMail ($mail)
{
	$pdo = initDB();
	$sql = "select numUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lemail', $mail);
	if ($stmt->execute() == true)
		$retour = $stmt->fetch()[0];
		else
			$retour = 'UTILISATEUR INTROUVABLE';
			return $retour;
}
function formationValidee ($numFormation, $mailUtilisateur)
{
	$numUtilisateur = findUserByMail($mailUtilisateur);
	echo $numFormation;
	$pdo = initDB();
	//TODO voir s'il n'est pas mieux de faire un update set afin de garder l'historique des formations validées
	$sql = "DELETE FROM validerformation vf
			WHERE vf.numUtilisateur = (:lutilisateur)
			AND vf.numFormation = (:laformation)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lutilisateur', $numUtilisateur);
	$stmt->bindParam(':laformation', $numFormation);
	if ($stmt->execute() == false)
		$retour = "ERREUR SYNTAXE SQL";
	else 
		$retour = "OK";
	return $retour;
}