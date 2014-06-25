<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}
	

require('../files/bdd.php');

require '../vendor/autoload.php';
use Mailgun\Mailgun;

if(isset($_GET['id'])) {

	$q = $bdd->query('SELECT * FROM candidatures');
	$requests = $q->fetchAll();
	$trequest;

	$error = true;
	foreach ($requests as $k => $request) {
		if($request->id == $_GET['id']) {
			$trequest = $request;
			$error = false;

	$error1 = true;
	foreach ($requests as $k => $request1) {
		if($request1->mail == $_GET['mail']) {
			$trequest = $request;
			$error = false;
		}
	}
}
}

	if($error) {
		die('Requete introuvable');
	}
	$req = $bdd->query('DELETE FROM candidatures WHERE id='. $_GET['id']);
	header('Location: index.php');
}

?>