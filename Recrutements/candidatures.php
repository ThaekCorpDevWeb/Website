<?php
session_start();
require_once 'files/bdd.php';
 ?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Recrutements ThaekCorp</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="icon" type="image/png" href="favicon.png" />
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- Chargement CSS -->
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <?php require_once 'files/navbar.php'; ?>
<?php
  if(!isset($_GET['poste']))
  {
    include('./postes/$poste.php');
  }
  if(isset($_GET['poste']))
  {
    $poste= $_GET['poste'];
    if (!file_exists("./postes/$poste.php")) 
    {
    echo "</br></br></br></br></br></br></br><center><h1>Erreur 404 - Aucun poste de ce type disponible.</h1></center></br></br></br></br></br>"; 
    }
    else
    {
    $fileOK = "./postes/$poste.php";
    include($fileOK); 
    }

    }


?>

</body>
</html>