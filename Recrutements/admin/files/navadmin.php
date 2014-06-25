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
        <li><a href="index.php">Candidatures reçues</a></li>
        <li><a href="archived.php">Candidatures archivés</a></li>
        <li><a>Candidatures reçues: <i class="fa fa-thumbs-up"></i> <?php echo $nb_mess; ?></a></li>
        <li><a>Candidatures non-traitées: <i class="fa fa-thumbs-down"></i><?php echo $nbr_candid; ?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="changepassword.php">Changer mon mot de passe</a></li>
        <li><a href="addAdmin.php">Ajouter un admin</a></li>
        <li><a href="logout.php">Se déconnecter</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>