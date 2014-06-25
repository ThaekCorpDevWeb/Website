<?php
session_start();

require('../files/bdd.php');

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}

$message ="";

if(isset($_POST['lastpw'])) {

	$req = $bdd->prepare('SELECT * FROM ref_users WHERE username=:username');
	$req->execute([
		"username" => $_SESSION['username'],
	]);
	$user = $req->fetchAll();
	$lastpw = hash('sha256', $_POST['lastpw']);

	if($lastpw == $user[0]->password) {
		if($_POST['password'] == $_POST['passConf']) {
			$q = $bdd->prepare('UPDATE ref_users SET password=:password WHERE username=:username');
			$q->execute([
				'password' => hash('sha256', $_POST['password']),
				'username' => $_SESSION['username'],
			]);
			header('Location: index.php');
		} else {
			$message =  '<center><span class="label label-danger">Votre mot de passe n"est pas bien confirmé!</span>';
		}
	} else {
		$message = '<center><span class="label label-danger">Votre mot de passe actuel est incorrect !</span></center>';
	}

}
$query = $bdd->query("SELECT COUNT(*) AS nb_messages FROM candidatures");
$mail = $query->fetch(PDO::FETCH_OBJ);
$nb_mess = $mail->nb_messages + 14;
$co = $bdd->query("SELECT COUNT(*) AS nb_candid FROM candidatures WHERE suppr=0 AND archived=0");
$candid = $co->fetch(PDO::FETCH_OBJ);
$nbr_candid = $candid->nb_candid;
$q = $bdd->query('SELECT * FROM candidatures WHERE archived=1 AND suppr=0 ORDER BY id DESC');
$requests = json_encode($q->fetchAll());
$emailc = $q->fetch();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Changer mon mot de passe</title>
	<link rel="stylesheet" href="../css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php require_once 'files/navadmin.php'; ?>
<div class="container">
	<strong><?= $message ?></strong>

	<form action="#" method="POST">
		<div class="form-group">
			<input type="password" class="form-control" name="lastpw" placeholder="Mot de passe actuelle" required/>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Mot de passe" required/>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="passConf" placeholder="Confirmation" required/>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success">
		</div>
	</form>
	</div>
</body>
</html>