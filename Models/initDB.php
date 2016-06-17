<?php
/********************CREATION DU PDO**********************************/
function initDB() {
	$user = 'root';
	$pass = '';
	$host = 'localhost';
	$port = '3306';
	$base = 'kmomokenfack';
	$dsn = "mysql:$host;port=$port;dbname=$base";
	try {
		$pdo = new PDO ( $dsn, $user, $pass );
	} catch ( PDOException $e ) {
		$msg = 'ERREUR DE CONNEXION AVEC LA BASE DE DONNEES';
		die ( $msg );
	}
	return $pdo;
}

function initDB1() {
 	try {
		 $pdo = new PDO("mysql.m2l.local;dbname=kmomokenfack","kmomokenfack","wx5njF0A", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	} catch ( PDOException $e ) {
		$msg = 'ERREUR DE CONNEXION AVEC LA BASE DE DONNEES';
		die ( $msg );
	}
	return $pdo;
}
?>