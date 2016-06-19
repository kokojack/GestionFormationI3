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
		$training = formationDisponible($_SESSION['email']);
		
		
		if ($training == "VIDE" )
			echo "PAS DE FORMATIONS DISPONIBLES POUR LE MOMENT <br><hr width='50%' /><br><br><br>";
		else
			{
				$i = 0;
				$disponibles = formationDisponible($_SESSION['email']);
				while ($i < sizeof($disponibles)){?>
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
				echo '<hr width="100%" />';
			}
		?>
		
		<H1>Les formations suivantes ne sont plus ouvertes</H1>
		
		<?php 
		
		
		if (formationIndisponible($_SESSION['email']) == "VIDE" )
			echo "PAS DE FORMATIONS INDISPONIBLES POUR LE MOMENT";
		else
			{
				$i = 0; 
				$result = formationIndisponible($_SESSION['email']);
				while ($i < sizeof($result))
				{
					echo '<hr width="30%" />';
					echo 'Formateur : '.$result[$i]['prestaFormation'].'<br><br>';
					echo 'Date de formation : '.$result[$i]['dateFormation'].'<br><br>';
					echo 'Durée de formation : '.$result[$i]['dureeFormation'].' jour (s) <br><br>';
					echo 'Adresse de formation : '.$result[$i]['lieuFormation'].'<br><br>';
					echo 'crédits de formation : '.$result[$i]['creditFormation'].'<br><br>';
					echo 'intitulé de formation : '.$result[$i]['contenuFormation'].'<br><br><br><br>';
					$i++;
				}
			}
			?>
		
		
	</body>
</html>