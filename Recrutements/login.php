<?php 
session_start();
require('files/bdd.php');
if(isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = hash('sha256', $_POST['password']);

	$q = $bdd->query('SELECT * FROM ref_users');
	$users = $q->fetchAll();

	$error = true;

	foreach ($users as $k => $user) {
		if($user->username == $username && $user->password == $password) {
			$error = false;
		}
	}
	if(!$error) {
		$_SESSION['username'] = $username;
		header('Location: admin');
	} else {
		echo('Pseudo ou mot de passe incorrect !');
	}
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>TCorp - Login</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<?php require_once 'files/navbar.php'; ?>
<div class="pager">
		<h1>Se connecter</h1>
		<form class="form-inline" method="POST" action="#">
			<div class="form-group">
				<input class="form-control" type="text" name="username" required/>
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" required/>
			</div>
			<div class="form-group">
				<input class="form-control btn btn-success" type="submit" value="Se connecter"/>
			</div>
		</form>
	</div>
</body>
</html>