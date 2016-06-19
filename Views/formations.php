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
			<input type ="submit" name="retour" value="retour � ma page">
		<form>

		<H1>Les formations suivantes sont encore ouvertes</H1>

		
		<?php 
		$disponibles = formationDisponible($mail);
		
		
		if ($disponibles == "VIDE" )
			echo "PAS DE FORMATIONS DISPONIBLES POUR LE MOMENT <br><hr width='50%' /><br><br><br>";
		else
			{
				$i = 0;
				while ($i < sizeof($disponibles)){?>
				<form action="#" method="POST">
				<?php 
				echo '<hr width="30%" />';
				echo 'Formateur : '.$disponibles[$i]['prestaFormation'].'<br><br>';
				echo 'Date de formation : '.$disponibles[$i]['dateFormation'].'<br><br>';
				echo 'Dur�e de formation : '.$disponibles[$i]['dureeFormation'].' jour (s) <br><br>';
				echo 'Adresse de formation : '.$disponibles[$i]['lieuFormation'].'<br><br>';
				echo 'cr�dits de formation: '.$disponibles[$i]['creditFormation'].'<br><br>';
				echo 'intitul� de formation : '.$disponibles[$i]['contenuFormation'].'<br><br>';
				$_SESSION['num'] = $disponibles[$i]['numFormation'];
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
		
		$indisponibles = formationIndisponible($mail);
		
		if ($indisponibles == "VIDE" )
			echo "PAS DE FORMATIONS INDISPONIBLES POUR LE MOMENT";
		else
			{
				$j = 0; 
				while ($j < sizeof($indisponibles))
				{
					echo '<hr width="30%" />';
					echo 'Formateur : '.$indisponibles[$j]['prestaFormation'].'<br><br>';
					echo 'Date de formation : '.$indisponibles[$j]['dateFormation'].'<br><br>';
					echo 'Dur�e de formation : '.$indisponibles[$j]['dureeFormation'].' jour (s) <br><br>';
					echo 'Adresse de formation : '.$indisponibles[$j]['lieuFormation'].'<br><br>';
					echo 'cr�dits de formation : '.$indisponibles[$j]['creditFormation'].'<br><br>';
					echo 'intitul� de formation : '.$indisponibles[$j]['contenuFormation'].'<br><br><br><br>';
					$j++;
				}
			}
			?>
		
		
	</body>
</html>