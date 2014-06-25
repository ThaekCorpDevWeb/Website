<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}
	

require('../files/bdd.php');

if(isset($_GET['mail'])) {

	$q = $bdd->query('SELECT * FROM candidatures');
	$requests = $q->fetchAll();
	$trequest;

	$error = true;
	foreach ($requests as $k => $request) {
		if($request->mail == $_GET['mail']) {
			$trequest = $request;
			$error = false;
		}
	}

	echo $_GET['mail'];
}

?>