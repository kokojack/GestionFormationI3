<?php
/*
 * Couche Controllers
 */

require_once 'Models/aurevoir.php';

if (isset($_POST['annuler']))
{
	header('location:index.php?page=Controllers/disclaimer.php');
}
else 
{
	require_once 'Views/aurevoir.php';
}
?>