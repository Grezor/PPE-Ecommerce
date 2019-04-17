<?php
	if(session_id() == '' || !isset($_SESSION)){session_start();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Resort Inn a Hotel Category Flat Bootstrap Responsive  Website Template | Home :: W3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!-- custom -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->
</head>
<body>

<!-- header -->
    <div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
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
                    <nav class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Accueil</a></li>
                            <li class="menu__item"><a href="#gallery" class="menu__link scroll">Galerie</a></li>
                            <?php
                              if(isset($_SESSION['username'])){
                                echo '<li><a href="boutique/products.php" class="menu__link">Produits</a></li>';
                                echo '<li><a href="boutique/resa.php" class="menu__link">Mes Réservations</a></li>';
                                echo '<li><a href="boutique/cart.php" class="menu__link"><i class="fa fa-shopping-cart"></i> Panier <span class="badge badge-light">0</span></a></li>';
                              }else{
                                echo '<li class="menu__item"><a href="#rooms" class="menu__link scroll">Produits</a></li>';
                                echo '<li class="menu__item"><a href="#about" class="menu__link scroll">A propos</a></li>';
                              }
                            ?>
                            <li class="menu__item"><a href="#contact" class="menu__link scroll">Contact</a></li>
                            <li class="menu__item"><a href="#" id="petitPote" class="menu__link">Login</a>
                                <div class="guiguiMainDD">
                                <?php
                                      if(isset($_SESSION['username'])){
                                        echo '<button class="btn"><a href="boutique/logout.php">Deconnexion</a></button>';
                                        echo '<button class="btn"><a href="boutique/account.php">Paramêtres</a></button>';
                                      }
                                      else{
                                        echo '<button class="btn"><a href="boutique/login.php">Connexion</a></button>';
                                      }
                                ?>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>

        </div>
    </div>
<!-- //header -->
		<!-- banner -->
	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h4>ChopTa<span>Photo</span></h4>
                                    <h3>Nous savons ce qui vous plait!!!</h3>
                                    <p>Bienvenu</p>
                                    <div class="agileits_w3layouts_more menu__item">
                                        <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Ensavoir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3layouts-banner-top w3layouts-banner-top1">
                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h4>ChopTaPhoto</h4>
                                    <h3>Pour des Evenements amicaux & familiaux</h3>
                                    <p>Venez & Capturez votre moment</p>
                                    <div class="agileits_w3layouts_more menu__item">
                                        <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
						</div>
					</li>
					<li>
                        <div class="w3layouts-banner-top w3layouts-banner-top1">
                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h4>ChopTaPhoto</h4>
                                    <h3>Pour des Evenements amicaux & familiaux</h3>
                                    <p>Venez & Capturez votre moment</p>
                                    <div class="agileits_w3layouts_more menu__item">
                                        <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
	</div>	

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Choptaphoto<span></span></h4>
										<img src="images/1.jpg" alt=" " class="img-responsive">
										<h5>We know what you love</h5>
										<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
									</div>
								</div>
							</div>
						</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-3 book-form-left-w3layouts">
	<h2>RESERVATION ?</h2>
</div>
<div class="col-md-9 book-form">
			   <form action="#" method="post">
					<div class="fields-w3ls form-left-agileits-w3layouts ">
							<p>Type de Bornes</p>
							<select class="form-control">
								<option>Prenium Familiale</option>
								<option>Prenium</option>
								<option>Econmique Familiale</option>
								<option>Economique</option>
							</select>
					</div>
					<div class="fields-w3ls form-date-w3-agileits">
						        <p>Date de début</p>
									<input  id="datepicker1" name="Text" type="text" value="Select Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="fields-w3ls form-date-w3-agileits">
						        <p>Date de fin</p>
									<input  id="datepicker2" name="Text" type="text" value="Select Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
					
					<div class="form-left-agileits-submit">
						  <input id="check_dispo" type="submit" value="Voir les disponibilité">
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
</div>

<style>
    .book-form input[type=submit] {
    background: #ffce14;
    color: #fff;
    position: absolute;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){


        function toTimestamp(strDate){
           var datum = Date.parse(strDate);
           return datum/1000;
        }

        $('#check_dispo').on('click' , function(e){
            e.preventDefault();
            
            var dateDebut = $('#datepicker1').val();            
            var dateFin = $('#datepicker2').val();
            console.log(dateDebut, dateFin);

            $.post( "boutique/API_ecommerce" , { req_api : "get_borneDispoEntreDeuxDate" , date_debut : dateDebut , date_fin : dateFin  } , function(data){
                console.log(data);
                let result = JSON.parse(data);

                console.log(result);
            })           
        })
    })
</script>
<!-- banner-bottom -->
	<div class="banner-bottom">
        <div class="container">
            <div class="agileits_banner_bottom">
                <h3><span>Profiter d'une expérience Particulière</span> Grace a nos services:</h3>
            </div>
            <div class="w3ls_banner_bottom_grids">
                <ul class="cbp-ig-grid">
                    <li>
                        <div class="w3_grid_effect">
                            <span class="cbp-ig-icon "><img src="./images/livraison.jpg" style="width:60px;height:55px"></span>
                            <h4 class="cbp-ig-title">Livraison sous 24h, 7/7 jour</h4>
                            <span class="cbp-ig-category"> ChopTaPhoto</span>
                        </div>
                    </li>
                    <li>
                        <div class="w3_grid_effect">
                            <span class="cbp-ig-icon "><img src="./images/impression.jpg" style="width:60px;height:55px"></span>
                            <h4 class="cbp-ig-title">Impression Rapide</h4>
                            <span class="cbp-ig-category">ChopTaPhoto</span>
                        </div>
                    </li>
                    <li>
                        <div class="w3_grid_effect">
                            <span class="cbp-ig-icon w3_users"></span>
                            <h4 class="cbp-ig-title">Divers</h4>
                            <span class="cbp-ig-category"> ChopTaPhoto</span>
                        </div>
                    </li>
                    <li>
                        <div class="w3_grid_effect">
                            <span class="cbp-ig-icon w3_ticket"></span>
                            <h4 class="cbp-ig-title">Controle par Wifi</h4>
                            <span class="cbp-ig-category"> ChopTaPhoto</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- //banner-bottom -->

<!--sevices-->
 <div class="about-wthree" id="about">
        <div class="container">
            <div class="ab-w3l-spa">
                <h3 class="title-w3-agileits title-black-wthree">Que savoir sur CHOPTAPHOTO</h3>
                <p class="about-para-w3ls">Chopta<span>Photo</span> est une entreprise dynamique qui permet a tout un chacun de réaliser des prises de Photo rapide grace a nos technicien qui font pour eux: repérage, réglages techniques (lumière, cadrage, mise au point, vitesse…) afin que leurs photo soient parfaites. Suivant les évenements et la destination des photos,ChopTaPhoto vous accompagnera dans vos joies comme tristesses, car nous savons ce dont vous avez besoin</p>
                <img src="images/about.jpg" class="img-responsive" alt="Hair Salon">
                <div class="w3l-slider-img">
                    <img src="images/a1.jpg" class="img-responsive" alt="Hair Salon">
                </div>
                <div class="w3ls-info-about">
                    <h4>Chop Ta Photo !</h4>
                    <p>car on est jamais mieux servi que par sois même.</p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //about -->
    <!--sevices-->
    <div class="advantages">
        <div class="container">
            <div class="advantages-main">
                <h3 class="title-w3-agileits">Nos services</h3>
                <div class="advantage-bottom">
                    <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
                        <div class="advantage-block ">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <h4>Réserver, payer Après!</h4>
                            <p>la joie ne se fait pas attendre, ChopTa<span>Photo</span> au coeur de vos émotions.</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Efficace et discret</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>Différents modes de paiement</p>

                        </div>
                    </div>
                    <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
                        <div class="advantage-block">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4> De 24 heure a plus </h4>
                            <p>N'attendez pas pour essayer ! ChopTaPhoto égaillera vos événements en famille et entre amis !</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>24H de suivi durant vos évenements.</p>
                            <p><i class="fa fa-check" aria-hidden="true"></i>24/24H, 7/7J Notre équipe est a votre disposition.</p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!--//sevices-->
    <!-- team -->

    <!-- <div class="team" id="team">
        <div class="container">
            <h3 class="title-w3-agileits title-black-wthree">Notre équipe:</h3>
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>

                    </li>
                    <li>
                        <img src="images/franck.jpg" class="img-responsive" style="width:110px;height60;" />
                    </li>
                    <li>
                        <img src="images/geoffrey.jpg" alt=" " class="img-responsive" style="width:100px;height60;" />
                    </li>
                    <li>
                        <img src="images/stan.JPG" alt=" " class="img-responsive" style="width:100px;height60;" />
                    </li>

                </ul>
                <div class="resp-tabs-container">
                    <div class="tab1">
                        <div class="col-md-6 team-img-w3-agile">
                        </div>
                        <div class="col-md-6 team-Info-agileits">
                            <h4>Franck Olivier Azzibrouck Azziley</h4>
                            <span>Co-Founder</span>
                            <p>Etudiant en deuxiene année BTS en services informatiques à efficcom-lille</p>
                            <div class="social-bnr-agileits footer-icons-agileinfo">
                                <ul class="social-icons3">
                                    <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                                    <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                                    <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
                                    <li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tab2">
                        <div class="col-md-6 team-img-w3-agile">
                        </div>
                        <div class="col-md-6 team-Info-agileits">
                            <h4>Geoffrey DUPLESSI</h4>
                            <span>Co-Founder</span>
                            <p>Etudiant en deuxiene année BTS en services informatiques</p>
                            <div class="social-bnr-agileits footer-icons-agileinfo">

                                <ul class="social-icons3">
                                    <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                                    <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                                    <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
                                    <li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tab3">
                        <div class="col-md-6 team-img-w3-agile">
                        </div>
                        <div class="col-md-6 team-Info-agileits">
                            <h4>Stanislas delgrange</h4>
                            <span>Co-Founder</span>
                            <p>Etudiant en deuxiene année BTS en services informatiques</p>
                            <div class="social-bnr-agileits footer-icons-agileinfo">
                            
<ul class="social-icons3">
    <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
    <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
    <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
    <li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
</ul>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
-->
    <!-- //team -->
    <!-- Gallery -->
    <section class="portfolio-w3ls" id="gallery">
        <h3 class="title-w3-agileits title-black-wthree">Notre Galerie</h3>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>

        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g5.jpg" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g6.jpg" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g6.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g6.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g9.jpg" class="swipebox"><img src="images/g9.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>

        <div class="col-md-3 gallery-grid gallery1">
            <a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/" style="height:220px;">
                <div class="textbox">
                    <h4>ChopTaPhoto</h4>
                    <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>

        <div class="clearfix"> </div>
    </section>

<!-- //gallery -->
	 <!-- rooms & rates -->
      <div class="plans-section" id="rooms">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Rooms And Rates</h3>
						<div class="priceing-table-main">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r1.jpg" alt=" " class="img-responsive" />
							<h4>Deluxe Room</h4>
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									
								     </ul>
							</div>
							<div class="price-selet">	
								<h3><span>$</span>320</h3>					
								<a href="boutique/products.php">Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid ">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r2.jpg" alt=" " class="img-responsive" />
							<h4>Luxury Room</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
									<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>220</h3>
								<a href="boutique/products.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid lost">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r3.jpg" alt=" " class="img-responsive" />
							<h4>Guest House</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>180</h3>
								<a href="boutique/products.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
							<img src="images/r4.jpg" alt=" " class="img-responsive" />
							<h4>Single Room</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span> 150</h3>
								<a href="boutique/products.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// rooms & rates -->
<!-- contact -->
    <section class="contact-w3ls" id="contact">
        <div class="container">
            <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
                <div class="contact-agileits">
                    <h4>Pour rester informer sur nos Progressions</h4>
                    <p class="contact-agile2">C'est par ici</p>
                    <form method="post" name="sentMessage" id="contactForm">
                        <div class="control-group form-group">

                            <label class="contact-p1">Nom:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">téléphone:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required>
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            <p class="help-block"></p>

                        </div>


                        <input type="submit" name="sub" value="Send Now" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
                <h4>Contacter nous:</h4>
                <p class="contact-agile1"><strong>Phone :</strong>0780759649</p>
                <p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">EgocentricAreTheWorst@gmail.co<m/a></p>
                <p class="contact-agile1"><strong>Address :</strong> 6 place antoine tacque</p>

                <div class="social-bnr-agileits footer-icons-agileinfo">
                    <ul class="social-icons3">
                        <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                        <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                        <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>

                    </ul>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.3163076432083!2d3.0323134157376015!3d50.62124057949927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d56d0498e283%3A0xcc5ee6a6102b77dc!2s6+Place+Antoine+Tacq%2C+59000+Lille!5e0!3m2!1sfr!2sfr!4v1552771629938"></iframe>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
<!-- /contact -->
			<div class="copy">
		        <p>© 2017 Resort Inn . All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
		    </div>
<!--/footer -->

<!-- ////////////////////////////////////////////////////////////////////////////////////  -->
<!-- HERE START CUSTOM JS / JQUERY -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#petitPote')
        .on('click' , function(){
            // DD is for " dropDown" sa correspond au menu de connexion
            $('.guiguiMainDD').slideToggle("fast");
        })
        .on('blur' , function(){
            $('.guiguiMainDD').slideToggle("fast");
        });
        /*additional event need be set on $document cause seems to be load after enntiere page loading */
        /* https://stackoverflow.com/questions/8290180/jquery-blur-not-working*/




        // Ici on va récupéré le nombre dlement dans le panier du client grace a son id

            $.post( 'boutique/API_ecommerce.php' , { req_api : 'get_userPanierByID' } , function(data){
                let panier = JSON.parse(data);
                
                if(panier.length !== 0){
                    $('.badge-light').text(panier.length);
                }else{
                    $('.badge-light').hide();
                }
            })

    })
</script>



<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>	
<!-- /contact form -->	
<!-- Calendar -->
		<script src="js/jquery-ui.js"></script>
		<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
				});
		</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
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
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>