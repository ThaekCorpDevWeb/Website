<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}
	

require('../files/bdd.php');

if(isset($_GET['id'])) {

	$q = $bdd->query('SELECT * FROM candidatures');
	$requests = $q->fetchAll();
	$trequest;

	$error = true;
	foreach ($requests as $k => $request) {
		if($request->id == $_GET['id']) {
			$trequest = $request;
			$error = false;
		}
	}

	if($error) {
		die('Requete introuvable');
	}
	if($trequest->archived == 0) {
		die('Requete non archivé');
		return false;
	}
	$req = $bdd->query('UPDATE candidatures SET archived=0 WHERE id='. $_GET['id']);
	header('Location: index.php');
}

?>