<?php
// coucheMod
include_once 'Models/initDB.php';

function counter() {
	$pdo = initDB ();
	$sql = "select count(*) from f_utilisateur";
	$stmt = $pdo->prepare ( $sql );
	
	if ($stmt->execute () === false) {
		$retour = "ERREUR DE COUNT";
	} 
	else {
		$tab = $stmt->fetch ();
		foreach ( $val as $tab )
			$retour = $val;
	}
	return $retour;
}
function checkChief($emailchef) {
	$pdo = initDB ();
	$sql = "select * from f_utilisateur where mailUtilisateur = (:mail) and chefUtilisateur = 'Je suis chef'";
	$stmt = $pdo->prepare ( $sql );
	$stmt->bindParam ( ':mail', $emailchef );
	if ($stmt->execute () === true) {
		$tab = $stmt->fetch ();
		if (! empty ( $tab ))
			$retour = true;
// 		else
// 			$retour = false;
	} 
	else {
		$retour = false;
	}
	
	return $retour;
}
function addUser($nom, $prenom, $pass, $mail, $chef) {
	$pdo = initDB ();
	$numUtilisateur = counter ();

			$sql = "insert into f_utilisateur
					(numUtilisateur, nomUtilisateur, prenomUtilisateur,passeUtilisateur, mailUtilisateur, chefUtilisateur)
					Values (:lenum, :lenom, :leprenom, :lepass, :lemail, :lechef)
					";
			$stmt = $pdo->prepare ( $sql );
			$stmt->BindParam ( ':lenum', $numUtilisateur );
			$stmt->BindParam ( ':lenom', $nom );
			$stmt->BindParam ( ':leprenom', $prenom );
			$stmt->BindParam ( ':lepass', $pass );
			$stmt->BindParam ( ':lemail', $mail );
			$stmt->BindParam ( ':lechef', $chef );
			
		if ($stmt->execute () === false) {
			echo "ERREUR DE CREATION : CONTACTEZ ADMINISTRATEUR";
		}
	}
// }