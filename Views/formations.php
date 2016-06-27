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
		<div id="center">
			<H1>Les formations suivantes sont encore ouvertes</H1>
		</div>
		
		<?php 
		$disponibles = formationDisponible($mail);
		
		
		if ($disponibles == "VIDE" )
		{
			echo '<div align="center">';
			echo 'PAS DE FORMATIONS DISPONIBLES POUR LE MOMENT'; 
			echo '<br><br><br></div><hr width="50%" /><br><br><br>';
		}
		else 
			{
				$i = 0;
				echo '<div align="center">';
				while ($i < sizeof($disponibles)){?>
				<div class="intitule" class="scroll">
				<form action="#" method="POST">
				<?php 
				echo '<hr width="30%" />';
				echo 'Formateur : '.$disponibles[$i]['prestaFormation'].'<br><br>';
				echo 'Date de formation : '.$disponibles[$i]['dateFormation'].'<br><br>';
				echo 'Durée de formation : '.$disponibles[$i]['dureeFormation'].' jour (s) <br><br>';
				echo 'Adresse de formation : '.$disponibles[$i]['lieuFormation'].'<br><br>';
				echo 'crédits de formation: '.$disponibles[$i]['creditFormation'].'<br><br>';
				echo 'intitulé de formation : '.$disponibles[$i]['contenuFormation'];
				$_SESSION['num'] = $disponibles[$i]['numFormation'];
				?>
				<input type="submit" name="choisir" value="choisir cette formation">
				</form>
				</div>
				<?php
				$i++;
				}
				echo '</div>';
				echo '<hr width="100%" />';
			}
		?>
		<div id="center">
			<H1>Les formations suivantes ne sont plus ouvertes</H1>
		</div>
		
		<?php 
		
		$indisponibles = formationIndisponible($mail);
		
		if ($indisponibles == "VIDE" )
			echo 'PAS DE FORMATIONS INDISPONIBLES POUR LE MOMENT';
		else
			{
				$j = 0; 
				echo '<div align="center">';
				while ($j < sizeof($indisponibles))
				{?>
					<div  class="intitule"> 
<!-- 					id="libelle" -->
					<?php 
					echo '<hr width="30%" />';
					echo 'Formateur : '.$indisponibles[$j]['prestaFormation'].'<br><br>';
					echo 'Date de formation : '.$indisponibles[$j]['dateFormation'].'<br><br>';
					echo 'Durée de formation : '.$indisponibles[$j]['dureeFormation'].' jour (s) <br><br>';
					echo 'Adresse de formation : '.$indisponibles[$j]['lieuFormation'].'<br><br>';
					echo 'crédits de formation : '.$indisponibles[$j]['creditFormation'].'<br><br>';
					echo 'intitulé de formation : '.$indisponibles[$j]['contenuFormation'].'<br>';
					?>
					</div>
					<?php 
					$j++;
				}
				echo '</div>';
			}
			?>
			
	</body>
</html>