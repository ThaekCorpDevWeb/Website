<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: ../');
    die();
}
require_once '../files/bdd.php';
$q = $bdd->query('SELECT * FROM candidatures WHERE archived=0 AND suppr=0 ORDER BY id DESC');
$requests = json_encode($q->fetchAll());
$emailc = $q->fetch();
 ?>
<html ng-app>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black fixed" ng-controller="requestsCtrl">
        <!-- header logo: style can be found in header.less -->
        <?php require_once 'files/navadmin.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Candidatures
                        <small>Reçues</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a><i class="fa fa-dashboard"></i> Acceuil</a></li>
                        <li>Dashboard</li>
                        <li class="active">Candidatures reçues</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
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
        <a href="archive.php?id={{request.id}}"><button class="btn btn-success">Archiver/Accepté</button></a>
        <a href="delete.php?id={{request.id}}&mail={{request.mail}}&pseudo={{request.pseudo}}"><button class="btn btn-danger">Refuser</button></a>
        <a href="spam.php?id={{request.id}}&mail={{request.mail}}&pseudo={{request.pseudo}}"><button class="btn btn-warning">Spam</button></a>
    </div>

    </div>
</center>
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>     
        
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

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