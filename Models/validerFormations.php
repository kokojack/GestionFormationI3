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
			FROM f_formation f, f_validerformation vf
			WHERE u.numUtilisateur = vf.numUtilisateur
			AND f.dateFormation >= CURDATE
			AND cf.chefResponsable = (:lechef);
			AND cf.numFormarion = f.numFormation
			AND cf.statutFormation = 'En Attente'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lechef', $numchef);
	if ($stmt->execute() == false)
		$retour = "VIDE";
	else
		$retour= $stmt->fetchAll();
	return $retour;
}
function formationValidee ($numFormation, $numUtilisateur)
{
	$pdo = initDB();
	$sql = "DELETE * FROM validerformation vf
			WHERE numUtilisateur = (:lutilisateur)
			AND numFormation = (:laformation)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lutilisatuer', $numUtilisateur);
	$stmt->bindParam(':laformation', $numFormation);
	if ($stmt->execute() == false)
		$retour = "ERREUR SYNTAXE SQL";
	else 
		$retour = "OK";
	return $retour;
}