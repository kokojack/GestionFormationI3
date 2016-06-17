<?php
/*
 * couche Views
 */
?>

<!DOCTYPE HTML>
<html>
<head>
<title>CONNEXION</title>
<link href="Css/indexCss.css" style="text/css" rel="stylesheet">
<meta lang="fr">
</head>

<body>

		<?php echo '<div align="center">';?>
		<form action="#" method="POST">
		<fieldset>
			<legend> CONNEXION M2LFORMATIONS</legend>
			<h4>IDENTIFIANT:</h4>
			<input type="text" name="mail"
				placeHolder="nom.prenom@M2L.com" required
				pattern="[A-Za-z0-9._-]+\.[A-Za-z0-9._-]+@M2L\.[a-z]{2,6}"
				title="prenom.nom@M2L.com">
			<h4>MOT DE PASSE:</h4>
			<input type="password" name="mdp" placeHolder="MajusculeMinusculeChiffre"
				required pattern="[A-Z]+[a-z]+[0-9]+"
				title="Mdp10"> <br>
			<h4>
				<input type="submit" name="submit" value="connexion"> <a
					href="index.php"> <input type="button" value="Annuler">
				</a>
			</h4>
			<!-- TODO création de la page backUpPassword -->
			<h4>
				<a href="backUpPassWord.php"> Mot de passe oublié? </a>
			</h4>
		</fieldset>
	</form>
		<?php echo '</div>';?>
		</body>
</html>