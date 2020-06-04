
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="public/bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/bootstrap/css/shop-homepage.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be78ca4593.js" crossorigin="anonymous"></script>
    <title>
       Les petits délices
    </title>
</head>
<header>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php?action=accueil">ISIWEB4SHOP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php
                    if(isset($_SESSION['customer_id'])){
                        echo"        <div class=' col-lg-4'>
                                     <span class=\"navbar-text text-uppercase \">
                                        ".$_SESSION['firstname']." ".$_SESSION['lastname']."
                                     </span>
                                     </div>";
                    }

                    if(!(isset($_SESSION['SESS_ORDERNUM']))) {
                        $_SESSION['NbPanier'] =0;
                    }
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=accueil">Accueil
                                
                            </a>
                        </li>
                        <?php
                        if(!(isset($_SESSION['admin_id']))){
                           echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='index.php?action=panier'>Panier <span class='badge'>(".$_SESSION['NbPanier'].")</span></a>
                            </li>";
                        }
                        else{
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='index.php?action=adminP'>Liste des produits</a>
                            </li>\";
                            <li class='nav-item'>
                                <a class='nav-link' href='index.php?action=adminC'>Liste des commandes</a>
                            </li>";
                        }
                            ?>
                        <li class="nav-item">
                        <?php if(isset($_SESSION['customer_id']) || isset($_SESSION['admin_id'])){
                        echo"<a class='nav-link' href='index.php?action=logout'> Se deconnecter </a>";
                        } else{
                        echo"<a class='nav-link' href='index.php?action=login'> Se connecter </a>
                             </li>";
                        }?>

                        <li class="nav-item" ><a  class="nav-link" href="index.php?action=registered"> S'inscrire </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</header>
</html>
