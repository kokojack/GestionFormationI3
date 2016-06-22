
<!DOCTYPE HTML>
<html>
<head>
<title>M2l Formations</title>
<link href="Css/indexCss.css" style="text/css" rel="stylesheet">
</head>
<body>
<?php

/*
 * L'entête de la page
 */
$entete = "Controllers/entete.php";
if (file_exists ( $entete ))
	$page = $entete	;
else
	$page = "Controllers/404.php";

ob_start ();
require $page;
$contenu = ob_get_contents ();
ob_end_clean ();
echo $contenu;



/*
 * Corps de la page
 */
require_once 'Models/initDB.php';

if (isset ( $_GET ['page'] )) {
	
	if ($_GET['page'] == 'Controllers/registration.php') 
	{
		if (isset($_COOKIE['disc']))
			require_once $_GET ['page'];
		else 
			require_once 'Controllers/404.php';
	}
	elseif ($_GET['page'] == 'Controllers/aurevoir.php')
	{
		if (isset($_COOKIE['disc']))
			require_once $_GET['page'];
		else
			require_once 'Controllers/404.php';
	}
	elseif ($_GET['page'] == 'Controllers/disclaimer.php')
	{
		unset($_COOKIE['disc']);
		require_once 'Controllers/disclaimer.php';
	}
	elseif($_GET['page'] == 'Controllers/inscription.php')
	{
		if (isset($_COOKIE['disc']))
			require_once $_GET['page'];
		else
			require_once 'Controllers/404.php';
	}
	elseif ($_GET['page']== 'Controllers/connexion.php')
	{
		if (isset($_COOKIE['disc']))
			require_once $_GET['page'];
		else 
			require_once 'Controllers/404.php';
	}
	elseif($_GET['page'] == 'Controllers/interfaceUser.php')
	{
		if (isset($_COOKIE['disc'])){
			session_start();
			$mail = $_SESSION['email'];
			require_once $_GET['page'];
		}
			
			else
				require_once 'Controllers/404.php';
	}
	elseif ($_GET['page'] == 'Controllers/formations.php')
	{
		require_once $_GET['page'];
	}
	elseif ($_GET['page'] == 'Controllers/validerFormation.php')
	{
		require_once 'Controllers/validerFormations.php';
	}
	
	if (isset($_GET['page']))
		echo $_GET ['page'].'<br>';
	
	echo $_COOKIE['disc'].'<br>';
} 
else 
{
	if (isset($_GET['page']))
		echo $_GET ['page'].'<br>';
	require_once 'Controllers/disclaimer.php';
}





/*
 * Le pieds de page
 */
$pieds = "Controllers/pieds.php";
if (file_exists ( $pieds ))
	$page = $pieds;
else
	$page = "Controllers/404.php";

ob_start ();
require $page;
$contenu = ob_get_contents ();
ob_end_clean ();

echo $contenu;
?>

</body>
</html>