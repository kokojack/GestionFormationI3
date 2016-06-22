<?php
/*
 * Couche Views
 */

?>
<!DOCTYPE HTML>
<html>
<head>
<title> VALIDER LES FORMATIONS</title>
<meta charset="utf8">
<link type="text/css" rel="stylesheet" href="Css/indexCss.css">
</head>
<body>

<form action="#" method="post">
	<input type ="submit" name="retour" value="retour à ma page">
<form>


<H1>Les formations suivantes sont en Attente</H1>


<?php 
	$enAttente = validerFormation($mail);
	
	if ($enAttente == "VIDE")
		echo "PAS DE FORMATION POUR LE MOMENT";
	else
	{ 
		$i = 0;
		while ($i <= sizeof($enAttente))
		{?>
			<form action="#" method="POST">
			<?php
			echo '<hr width="30%" />';
			echo "Utilisateur : ".$enAttente[$i]['prenomUtilisateur']." ".$enAttente[$i]['nomUtilisateur'];
			echo "/n";
			echo "Formation : ".$enAttente[i]['dateFormation'].$enAttente[i]['contenuFormation'].$enAttente[i]['dureeFormation'].
				$enAttente[i]['creditFormation'];
			echo "/n";
			$_SESSION['numFormation'] = $enAttente[$i]['numFormation'];
			?>
			<input type="submit" name="valider" value="valider cette formation">
			</form>
			<?php 
				echo '<br><br><br>';
				$i++;
				}
				echo '<hr width="100%" />';
	}
?>











</body>
</html>