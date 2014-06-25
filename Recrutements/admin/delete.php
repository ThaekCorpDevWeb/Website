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
	//$req = $bdd->query('DELETE FROM candidatures WHERE id='. $_GET['id']);

$pseudo = $_GET['pseudo'];
$emailc = $_GET['mail'];

# Instantiate the client.
$mgClient = new Mailgun('key-8xww9sch40dkhwx3ers-x3h1sbf-evf0');
$domain = "sandboxbc285505010c458b805fbd1031182f98.mailgun.org";

$message = "\n";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'ThaekCorp <postmaster@thaekcorp.com>',
                        'to'      => '' . $pseudo . ' <' . $emailc . '>',
                        'subject' => 'Réponse Candidatures',
                        'text'    => "Bonjour et merci d'avoir postulé à la ThaekCorp." . $message . $message . "Nous vous informons que, malheureusement, votre candidature n'a pas été retenue," . $message . " mais vous remercions pour l'intérêt porté au projet." . $message . $message . "En vous souhaitant une bonne continuation," . $message . $message . "L'équipe."));
	
	$req = $bdd->query('UPDATE candidatures SET suppr=1 WHERE id='. $_GET['id']);
	header('Location: index.php');
}

?>