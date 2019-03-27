<!DOCTYPE html>
<html lang="en">
<head>
    <title>ChopTaPhoto BOUTIQUE</title>
    <!-- for-mobile-apps -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
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
    <!--fonts-->
    <!--//fonts-->
</head>
    <body>
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
                            <p class="logo_w3l_agile_caption">Votre boutique</p>
                        </a></h3>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <div class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item menu__item--active"><a href="../index.php" class="menu__link">Home</a></li>
                            <li><a href="products.php" class="menu__link">Produits</a></li>
                            <li><a href="cart.php" class="menu__link"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-light">0</span></a></li>
                                                 <li><a href="resa.php" class="menu__link">Vos Réservations</a></li>
                            <?php
                                  if(isset($_SESSION['username'])){
                                    echo '<li ><a href="account.php" class="menu__link">Mon Compte</a></li>';
                                    echo '<li ><a href="logout.php" class="menu__link">Déconnexion</a></li>';
                                  }
                                  else{
                                    echo '<li ><a href="login.php" class="menu__link">Connexion</a></li>';
                                  }
                            ?>
                            <li><a href="../index.php#contact" class="menu__link">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>
    <script src="../js/easy-responsive-tabs.js"></script>
    <script>
        $(document).ready(function() {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });


            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };

            /*$().UItoTop({
                easingType: 'easeOutQuart'
            });*/
        });

    </script>

