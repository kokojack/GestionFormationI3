<?php
/*
 * Couche Views
 */
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>FORMATIONS OUVERTES</title>
	<link href="Css/indexCss.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<form action="#" method="post">
			<input type ="submit" name="retour" value="retour à ma page">
		<form>

		<H1>Les formations suivantes sont encore ouvertes</H1>

		
		<?php 
		$training = formationDisponible();
		
		
		if ($training == "VIDE" )
			echo "Pas de formation disponible pour le moment";
		else
			{
				$i = 0;
				while ($i < sizeof(formationDisponible())){?>
				<form action="#" method="POST">
				<?php 
				echo '<hr width="30%" />';
				echo 'Formateur : '.$training[$i]['prestaFormation'].'<br><br>';
				echo 'Date de formation : '.$training[$i]['dateFormation'].'<br><br>';
				echo 'Durée de formation : '.$training[$i]['dureeFormation'].' jour (s) <br><br>';
				echo 'Adresse : '.$training[$i]['lieuFormation'].'<br><br>';
				echo 'crédits : '.$training[$i]['creditFormation'].'<br><br>';
				echo 'intitulé de formation : '.$training[$i]['contenuFormation'].'<br><br>';
				$_SESSION['num'] = $training[$i]['numFormation'];
				?>
				<input type="submit" name="choisir" value="choisir cette formation">
				</form>
				<?php 
				echo '<br><br><br>';
				$i++;
				}
			}
		?>
		
		<H1>Les formations suivantes ne sont plus ouvertes</H1>
		
		<?php 
		
		
		if (formationIndisponible() == "VIDE" )
			echo "Pas de formation disponible pour le moment";
		else
			{
				$i = 0; 
				while ($result = formationIndisponible() and $i < sizeof(formationIndisponible()))
				{
					echo '<hr width="30%" />';
					echo 'Formateur : '.$result[$i]['prestaFormation'].'<br><br>';
					echo 'Date de formation : '.$result[$i]['dateFormation'].'<br><br>';
					echo 'Durée de formation : '.$result[$i]['dureeFormation'].' jour (s) <br><br>';
					echo 'Adresse : '.$result[$i]['lieuFormation'].'<br><br>';
					echo 'crédits : '.$result[$i]['creditFormation'].'<br><br>';
					echo 'intitulé de formation : '.$result[$i]['contenuFormation'].'<br><br><br><br>';
					$i++;
				}
			}
			?>
		
		
	</body>
</html>