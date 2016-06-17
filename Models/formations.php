<?php
include_once 'initDB.php';

function formationDisponible(){
	$pdo = initDB();
	$format = "yyyy-mm-dd";
	$date = date($format);
	$sql = "select numFormation, prestaFormation, dateFormation, dureeFormation, lieuFormation, creditFormation, contenuFormation from f_formation where dateFormation > CURDATE() order by dateFormation";
	//$sql = "call formationDisponible()";
	$stmt = $pdo->prepare ( $sql );
	$stmt->bindParam(':dateFormation', $date);
	if ($stmt->execute () === false)
		$retour = "	ERREUR DE REQUETE";
	else {
		$tab = $stmt->fetchAll();
		if (! empty ( $tab ))
			$retour = $tab;
		else
			$retour = "VIDE";
	}
	return $retour;
}

function formationIndisponible()
{
	$pdo = initDB();
	$format = "yyyy-mm-dd";
	$date = date($format);
	$sql = "select numFormation, prestaFormation, dateFormation, dureeFormation, lieuFormation, creditFormation, contenuFormation from f_formation where dateFormation < CURDATE() order by dateFormation";
	$stmt = $pdo->prepare ( $sql );
	$stmt->bindParam(':dateFormation', $date);
	if ($stmt->execute () === false)
		$retour = "	ERREUR DE REQUETE";
		else {
			$tab = $stmt->fetchAll();
			if (! empty ( $tab ))
				$retour = $tab;
			else
					$retour = "VIDE";
		}
		return $retour;
}

function findUserByMail ($mail)
{
	$pdo = initDB();
	$sql = "select numUtilisateur from f_utilisateur where mailUtilisateur = (:lemail)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lemail', $mail);
	$stmt->execute();
	$retour = $stmt->fetch();
	return $retour;
}
function choixFormation($numformation, $mail)
{
	$pdo = initDB();
	$numUtilisateur = findUserByMail($mail)[0];
	$sql = "INSERT INTO `kmomokenfack`.`f_choisirformation` (`numUtilisateur`, `numFormation`, `statutFormation`, `chefResponsable`) VALUES (':numUtilisateur', ':numFormation', 'En Attente', 'koko.christ@M2L.com')";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':numUtilisateur', $numUtilisateur);
	$stmt->bindParam(':numFormation', $numformation);
	if ($stmt->execute()=== true)
		$retour = " Formation choisie";
	else 
		$retour = " IMPOSSIBLE";
	return $retour;
}
	?>