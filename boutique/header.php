<!DOCTYPE html>
<html lang="en">
<head>
    <title>ChopTaPhoto</title>
    <!-- for-mobile-apps -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="../css/foundation.css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />

    <!-- //for-mobile-apps -->
    
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/chocolat.css" type="text/css" media="screen">
    <link rel='stylesheet' href="../css/easy-responsive-tabs.css" />

    <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript" src="../js/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery_3.3.1.js"></script>
    <script src="../js/easy-responsive-tabs.js"></script>
    <script src="../js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
    <!--fonts-->
    <!--//fonts-->
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.ddUser').on('click' , function(){
                $('.guiguiMainDD').slideToggle("fast");
            })


            // Ici on va récupéré le nombre dlement dans le panier du client grace a son id

            $.post( 'API_ecommerce.php' , { req_api : 'get_userPanierByID' } , function(data){
                let panier = JSON.parse(data);
                
                if(panier.length !== 0){
                    $('.badge-light').text(panier.length);
                }else{
                    $('.badge-light').hide();
                }
            })


            //$('.badge-light').text()==='0'?$('.badge-light').hide():$('.badge-light').show();



        })
    </script>
    <div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-center">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h3><a class="navbar-brand" href="../index.php">Choptaphoto <br>
                            <p class="logo_w3l_agile_caption">Garder un souvenir</p>
                        </a></h3>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <div class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item menu__item--current"><a href="../index.php" class="menu__link">Accueil</a></li>
                            <li class="menu__item"><a href="../index.php#gallery" class="menu__link scroll">Gallerie</a></li>
                            <?php
                              if(isset($_SESSION['username'])){
                                echo '<li><a href="products.php" class="menu__link">Produits</a></li>';
                                echo '<li><a href="resa.php" class="menu__link">Mes Réservations</a></li>';
                                echo '<li><a href="cart.php" class="menu__link"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-light">0</span></a></li>';
                              }else{
                                echo '<li class="menu__item"><a href="../index.php#rooms" class="menu__link scroll">Produits</a></li>';
                                echo '<li class="menu__item"><a href="../index.php#about" class="menu__link scroll">A propos</a></li>';
                              }
                            ?>
                            <li class="menu__item"><a href="../index.php#contact" class="menu__link scroll">Contact</a></li>
                           
                            <?php // si l'utilisateur n'est pas admin, il n'affiche pas la partie admin
                                 if (isset($_SESSION['auth'])): ?>
                                    <li class="nav-item "><a class="nav-link" href="logout.php">Se deconnecter</a></>
                                 <!-- Si la personnes est un admin alors il a le mennu admin -->
                              
                                 <?php else: ?>
                                 <li class="nav-item">
                              
                          </li>
                              <?php endif; ?>
                            <!-- <li class="menu__item"><a href="login2.php">Connexion</a>
                                <div class="guiguiMainDD">
                                <?php
                                     // if(isset($_SESSION['username'])){
                                     //   echo '<button class="btn"><a href="logout.php">Deconnexion</a></button>';
                                     //   echo '<button class="btn"><a href="account.php">Paramêtres</a></button>';
                                    //  }

                                ?>
                                </div>
                            </a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>
    
