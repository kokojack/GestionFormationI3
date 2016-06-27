 <?php
/*
 * Couche Views
 * <?= $chef ?>
 */
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Interface Utilisateur</title>
	<link href="Css/indexCss.css" type="text/css" rel="stylesheet">
	</head>
	<body>


<div id="libelle">
	<div class="scroll" class="intitule">
		<button>
		<b>
			<?= $nom." ".$prenom ?>
			</b> 
		</button>
		<br><br>
		
		<a href="index.php?page=Controllers/disclaimer.php">
			<button><i><b>Deconnexion</b></i></button>
		</a>
	</div>

	<div class="intitule">
<!-- //TODO  -->
<br>
		<button>
		<form action="#" method="POST">
			<input type="submit" name="openStory" value ="Mon Historique">	
		</form>
		</button>
	</div>

	<div class="intitule">
<!-- TODO  -->
<br>
		<button>
			<form action="#" method="POST">
				<input type="submit" name="openTraning" value ="Formations">	
			</form>
		</button>
	</div>

	<div class="intitule">
		<br>
<!-- //TODO  -->		
		<button>Recherche</button>
		<br> <br> <input type="text" name="recherche">
	</div>
	
	<div class="intitule">
		<P>Credits restants:
		<?= $credit?>
		</P>
		<P>Jours restants:
		<?= $jours?>
		</P>
	</div>
	<?php
	if ($statut == "Je suis chef") {
		?>
	<div class="intitule">
		<br>
		<button>
		<form action="#" method="POST">
			<input type="submit" name="toCheck" value ="Formations à valider">	
		</form>
		</button>
		<br>
	</div>
<?php
	}
	if (isset ( $formation )) {
		?>
<div class="intitule">
	<?php
		if (gettype ($formation) == array ()) {
			$j = 1;
			foreach ( $formation as $val ) {
				echo '<h5>'.$j .'- ' . $val.'<br>';
				$j ++;
			}
		}
		else
			echo '<br>' . $formation;
		?>
		<br>
		<form action="#" method="POST">
			<input type="submit" name="closeTraining" value ="Fermer">	
		</form>
	</div>
<?php }

	if (isset ( $historique )) {
		//var_dump($historique);
		?>
<div class="intitule">
	<?php
	if (gettype($historique) == "array") {
 		$i = 1;
		echo $i.'- '.$historique['contenuFormation'] . '<br>';
		$i++;	
	}
	else {
		echo $historique;
		
	}
		?>
		<br> 
		<form action="#" method="POST">
<!-- 		<a href="../FunctionPages/initMonHistorique.php"> -->
		<input type="submit" name="lockStory" value="Fermer">
<!-- 		</a> -->
		</form>
	</div>
<?php }?>
<div class="intitule">
<!-- <a href="index.php?page=Controllers/formations.php">  -->		
			<br>
			<button>
			<form action="#" method="POST">
				<input type="submit" name="chooseTraining" value="Choisir une formation">
			</form>
			</button>
		</a>
</div>
	<?php 
	if (isset($training))
	{
		echo '<div class="intitule">';
		if ($training == "VIDE" )
			echo "Pas de formation disponible pour le moment";
		else
			{
				foreach ($training as $key=>$value ){
					if ($key != 'numFormation')
						echo $key.'___'.$value;
				}
			}
		echo '</div>';
	}
 if ($statut == "Je suis chef"){?>
	<div class="intitule">
		<form action="#" method="POST">
		Email: <br><br>
		<input type="email" name="mail" placeHolder="nouvel.Admin@M2L.com" required>
		<br><br>
		<input type ="submit" name="givePower" value="NewAdmin">
		</form>
		<?php
		if (isset($_SESSION['power']))
			echo $_SESSION['power'];
		?>
	</div>
	<?php }?>
</div>

</body>
</html>