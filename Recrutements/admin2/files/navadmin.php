<header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                ThaekCorp
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo($_SESSION['username']); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="http://fc08.deviantart.net/fs71/f/2014/117/d/0/pp_patatteuh_et_hilde_by_armthebitch-d7ga9l1.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo($_SESSION['username']); ?>                                 
                                    </p>
                                </li>
                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                        <a href="changepssw.php">Changer le mot de passe</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="addadmin.php">Ajouter un admin</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="logout.php" class="btn btn-default btn-flat">Se déconnecter</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="http://fc08.deviantart.net/fs71/f/2014/117/d/0/pp_patatteuh_et_hilde_by_armthebitch-d7ga9l1.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Bienvenue, <?php echo($_SESSION['username']); ?></p>

                            <a><font color="green"><i class="fa fa-circle"></i> Online</font></a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="received.php">
                                <i class="fa fa-sign-in"></i> <span>Candidatures reçues</span>
                            </a>
                        </li>
                        <li>
                            <a href="archived.php">
                                <i class="fa fa-thumb-tack"></i> <span>Candidatures archivées</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>