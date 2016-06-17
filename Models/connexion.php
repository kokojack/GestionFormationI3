<?php
/*
 * couche Models
 */
include_once 'initDB.php';

function connexion ($mail, $pass){
	
	$pdo = initDB();
	$sql = "select count(*) from f_utilisateur where mailUtilisateur = (:lemail) and passeUtilisateur = (:lepass)";
	echo "Mon mail est -->".$mail.'<br>';
	echo "Mon passe est -->   ".$pass.'<br>';
	echo '<br>';
	echo sha1('Koko16').'<br>';
	
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':lemail', $mail);
	$stmt->bindParam(':lepass', $pass);
	
	if ($stmt->execute() === false)
	{
		$retour = "ERREUR DE LA REQUETE";
	}
	else
	{
		$tab = $stmt->fetch();
		if ($tab[0] == 1)
			$retour = true;
		else 
			$retour = false;
	}
	return $retour;
}
?>
