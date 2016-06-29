<?php
/*
 * Couche Views
 */

?>
<!DOCTYPE HTML>
<html>
<head>
<title> VALIDER LES FORMATIONS</title>
<meta charset="fr">
<link type="text/css" rel="stylesheet" href="Css/indexCss.css">
</head>
<body>


<form action="#" method="post">
	<button>
	<input type ="submit" name="retour" value="retour à ma page">
	</button>
</form>


<div align="center">
<H1>Les formations suivantes sont en Attente</H1>
</div>

<?php 
	$enAttente = toValidate($mail);
	
	if ($enAttente == "VIDE")
	{
		echo '<div align="center">';
		echo "PAS DE FORMATION POUR LE MOMENT";
		echo '</div>';
	}
	else
	{ 
		$i = 0;
		while ($i < sizeof($enAttente))
		{?>
			<form action="#" method="POST">
			<div class="intitule">
			<?php
			//echo '<hr width="30%" />';
			echo "<center><b><u>Utilisateur : </u></b><br>".$enAttente[$i]['prenomUtilisateur']."  ".$enAttente[$i]['nomUtilisateur'];
			echo "<br>";
			echo "<b><u>Formation : </u></b><br> "
					.$enAttente[$i]['dateFormation']."<br>
					<b><u>Intitule : </u></b><br>"
					.$enAttente[$i]['contenuFormation']."<br>
					<b><u>durée : </u></b><br>"
					.$enAttente[$i]['dureeFormation']." Jours<br>
					<b><u>Crédits : </u></b><br>"
					.$enAttente[$i]['creditFormation']." Crédits";
			echo "<br>";
			echo $enAttente[$i]['numFormation'];
			$_SESSION['numFormation'] = $enAttente[$i]['numFormation'];
			echo "<br>";
			?>
			<input type="submit" name="valider" value="valider cette formation">
			</center>
			</form>
			</div>
			<?php 
				$i++;
				}
				//echo '<hr width="100%" />';
	}
?>











</body>
</html>