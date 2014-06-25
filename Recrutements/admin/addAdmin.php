<?php
	session_start();

	if(!isset($_SESSION['username'])) {
		header('Location: ../');
	}

	require('../files/bdd.php');
	require('Class.php');

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
	<title>Ajouter un administrateur</title>
	<link rel="stylesheet" href="../css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php require_once 'files/navadmin.php'; ?>
<div class="pager">
		<h1>Ajouter un admin</h1>
		<form class="form-inline" method="POST" action="#">
			<div class="form-group">
				<input class="form-control" type="text" name="username" placeholder="Nom d'utilisateur" required/>
			</div>
			<div class="form-group">
				<input class="form-control btn btn-success" type="submit" value="Générer !"/>
			</div>
		</form>
	</div>
<?php 
if(isset($_POST['username'])) {

		$class = new Cl();
		$pass = $class->generate();
		$password = hash('sha256', $pass);

		$q = $bdd->prepare('INSERT INTO 	
			ref_users(username, password)
			VALUES(?, ?)
		');
		$q->execute([
			$_POST['username'],
			$password
		]);
		echo "<center>Le mot de passe de " . $_POST['username'] . ": ". $pass . "</center>";
	}	
 ?>
</body>
</html>