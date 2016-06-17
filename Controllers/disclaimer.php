<?php

require_once 'Models/disclaimer.php';

function lireCookie() {
	if (isset ( $_COOKIE ['disc'] ))
		return $_COOKIE ['disc'];
	else
			return 1;
}
function envoyerCookie($rep) {
	if ($rep == 'oui'){
		$_COOKIE ['disc'] = $rep;
		setcookie ('disc', $rep, time () + 60 * 60 * 24 * 30 );
	}
	elseif ($rep == 'non')
	{
		$_COOKIE['disc'] = $rep;
		setcookie('disc', $rep, time()+ 60 * 60 * 24 * 30 );
	}
	else 
	{
		unset($_COOKIE['disc']);
	}
}

if (isset($_POST['discYes']))
{
	envoyerCookie($_POST['discYes']);
}
elseif (isset($_POST['discNo']))
{
	envoyerCookie($_POST['discNo']);
}

if (lireCookie()!= 1)
{
	if (lireCookie()== "oui")
	{
		envoyerCookie('oui');
		header('location:index.php?page=Controllers/registration.php');	
	}
	elseif (lireCookie()== "non")
	{
		envoyerCookie('non');
		header('location:index.php?page=Controllers/aurevoir.php');
	}
 	else 
 		header('location:index.php?page=Controllers/404.php');
}
else {
	require_once 'Views/disclaimer.php';
}
?>