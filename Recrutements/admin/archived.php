<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: ../');
	die();
}

require('../files/bdd.php');

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

<html ng-app>
<head>
	<meta charset="UTF-8">
	<title>TCorp - requête(Admin)</title>
	<link rel="stylesheet" href="../css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body ng-controller="requestsCtrl">
<?php require_once 'files/navadmin.php'; ?>
<center>
<div class="container">
	<h1>Toutes les requêtes sont disponibles ici.</h1>

	<div class="form-inline">
		<select class="form-control" ng-model="search.poste">
			<option value="">Tous</option>
			<option value="constructeur">Constructeur</option>
			<option value="terraformeur">Terraformeur</option>
			<option value="redstoneur">Redstoneur</option>
			<option value="graphiste">Graphiste</option>
			<option value="scénariste">Scénariste</option>
			<option value="développeur web">Développeur Web</option>
			<option value="développeur mod">Développeur Mod</option>
		</select>
		</select>
	</div>

	<h1>{{notRequests}}</h1>
	<div ng-repeat="request in requests | filter:search:strict">
		<hr>
		<h2>{{request.pseudo}}</h2>
		<p>
			<b>Postule pour:</b> {{request.poste}} <b>le</b> {{request.date}} <b>à</b> {{request.heure}} <br>
			<b>Age:</b> {{request.age}} ans <br>
			<b>Micro:</b> {{request.micro}} <br>
			<b>Minecraft Acheté:</b> {{request.minecraft}} <br>
			<b>Expérience sur Minecraft:</b> {{request.exp}} <br>
			<b>Description de son expérience:</b> <br>
			{{request.exp_desc}} <br><br>
			<b>Disponibilité:</b> {{request.dispo}} <br>
			<b>Motivation:</b> {{request.motiv}} <br><br>
			<b>Scénario:</b> {{request.scenar}} <br><br>
			<b>Screenshots:</b> {{request.screen}} <br>
			<b>Capacités:</b> {{request.other}} <br>
			<b>Plugins utilisés: {{request.plug}} <br>
			<b>Création:</b> {{request.crea}} <br>
			<b>Vidéo:</b> {{request.video}} <br>
			<b>Contact:</b> <br>
			<b>Skype:</b> {{request.skype}} <br>
			<b>E-mail:</b> {{request.mail}} <br>
		</p>
		<a href="unarchive.php?id={{request.id}}"><button class="btn btn-success">Désarchiver</button></a>
		<a href="delete.php?id={{request.id}}&mail={{request.mail}}&pseudo={{request.pseudo}}"><button class="btn btn-danger">Supprimer</button></a>
		<a href="spam.php?id={{request.id}}&mail={{request.mail}}&pseudo={{request.pseudo}}"><button class="btn btn-warning">SPAM</button></a>
	</div>

	</div>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
<script>
	function requestsCtrl($scope) {
		$scope.requests = <?= $requests; ?>;
		if($scope.requests.length == 0) {
			$scope.notRequests = "Aucune requête n'est à traiter.";
		}
	}
</script>

</body>
</html>