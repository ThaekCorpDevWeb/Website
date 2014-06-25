<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}

require('../files/bdd.php');

$req = $bdd->query('SELECT * FROM ref_users');
$users = $req->fetchAll();	

?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Touts les admins</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Administration</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="archived.php">Tickets archivés</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="changepassword.php">Changer mon mot de passe</a></li>
        <li><a href="logout.php">Se déconnecter</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<center>
<div class="container">
	<div class="well">
		<?php foreach ($users as $k => $user): ?>
			<li><?= $user->username ?></li><br>
			<a href="deleteAdmin.php?id=<?= $user->id ?>"><button class="btn btn-danger">Supprimer l'utilisateur</button></a><br>
			<hr>
		<?php endforeach ?>
	</div>
</div>
</center>
</body>
</html>