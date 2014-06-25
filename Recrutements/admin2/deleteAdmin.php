<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}

require('../files/bdd.php');

if(isset($_GET['id'])) {

	$req = $bdd->prepare('SELECT * FROM ref_users WHERE id=:id');
	$req->execute([
		'id' => $_GET['id'],
	]);

	$user = $req->fetchAll();

	if(isset($user[0])) {
		$req = $bdd->prepare('DELETE FROM ref_users WHERE id=:id');
		$req->execute([
			'id' => $_GET['id'],
		]);
		header('Location: ListAdmins.php');
	} else {
		die('Utilisateur introuvable');
	}

} else {
	die('Utilisateur introuvable');
}

?>