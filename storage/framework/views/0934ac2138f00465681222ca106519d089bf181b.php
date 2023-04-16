<?php
   $logo= \App\Models\Utility::get_file('uploads/logo/');

    $company_logo = \App\Models\Utility::GetLogo();

    $setting = App\Models\Utility::colorset();
    if ($setting['color']) {
        $color = $setting['color'];
    }
    else{
        $color = 'theme-3';
    }
?>

 
    <!-- 
<html lang="en"  dir="<?php echo e($setting['SITE_RTL'] == 'on'?'rtl':''); ?>">
  
  <head>
   
    <link rel="icon" href="<?php echo e($logo.'/favicon.png'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>" />
   
    <?php if($setting['SITE_RTL']=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout']=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>
 
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('landing/css/landing.css')); ?>" />
  </head>

 
          
          <img src="<?php echo e($logo.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-light.png')); ?>" alt="logo" />
        </a>
    
              <a class="btn btn-light ms-2 me-1" href="<?php echo e(route('login')); ?>">Login</a>
            </li>

            <?php if(App\Models\Utility::getValByName('signup_button') == 'on'): ?>
            <li class="nav-item">
              <a class="btn btn-light ms-2 me-1" href="<?php echo e(route('register')); ?>">Register</a>
            </li>
            <?php endif; ?>
 
  
          
 
 
 
</html>
 -->

<!DOCTYPE html>
<!-- OLMO - Software, App, SaaS & Startup Landing Pages Pack design by DSAThemes (http://www.dsathemes.com) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">


	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="DSAThemes"/>	
		<meta name="description" content="OLMO - Software, App, SaaS & Startup Landing Pages Pack"/>
		<meta name="keywords" content="Responsive, HTML5, DSAThemes, One Page, Landing, Software, Mobile App, SaaS, Startup, Creative, Freelancers, Digital Product">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
  		<!-- SITE TITLE -->
		<title>StoreLancer - La solution idéale pour créer une boutique en ligne professionnelle</title>
							
		<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="storage/uploads/logo/favicon.png" type="image/x-icon">
		<link rel="icon" href="storage/uploads/logo/favicon.png" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="storage/uploads/logo//favicon.png">
		<link rel="apple-touch-icon" sizes="120x120" href="storage/uploads/logo//favicon.png">
		<link rel="apple-touch-icon" sizes="76x76" href="storage/uploads/logo//favicon.png">
		<link rel="apple-touch-icon" href="storage/uploads/logo//favicon.pngg">
		<link rel="icon" href="storage/uploads/logo//favicon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="public/style/css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="public/style/css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="public/style/css/menu.css" rel="stylesheet">	
		<link id="effect" href="public/style/css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="public/style/css/magnific-popup.css" rel="stylesheet">	
		<link href="public/style/css/owl.carousel.min.css" rel="stylesheet">
		<link href="public/style/css/owl.theme.default.min.css" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="public/style/css/animate.css" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		<link href="public/style/css/style.css" rel="stylesheet"> 
		
		<!-- RESPONSIVE CSS -->
		<link href="public/style/css/responsive.css" rel="stylesheet">

	</head>



	<body>




		<!-- PRELOADER SPINNER
		============================================= -->	
		<div id="loading" class="stateblue-loading">
			<div id="loading-center">
				<div id="loading-center-absolute">
					<div class="object" id="object_one"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_three"></div>
					<div class="object" id="object_four"></div>
				</div>
			</div>
		</div>




		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HEADER
			============================================= -->
			<header id="header" class="header tra-menu navbar-dark">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	  	
				    	<span class="smllogo"><img src="storage/uploads/logo/logo-dark.png" alt="mobile-logo"/></span>
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- HEADER LOGO -->
	    					<div class="desktoplogo"><a href="#hero-6" class="logo-black"><img src="storage/uploads/logo/logo-dark.png" alt="header-logo"></a></div>
	    					<div class="desktoplogo"><a href="#hero-6" class="logo-white"><img src="storage/uploads/logo/logo-white.png" alt="header-logo"></a></div>


	    					<!-- MAIN MENU -->
	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list nav-stateblue-hover">
 
	            							<li aria-haspopup="true"><a href="#features-8">Pourquoi Storelancer?</a></li>

						          	<!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="#projects-2">Modèles</a></li>


						          	<!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="#pricing-2">Tarification</a></li>


								    <!-- HEADER BUTTON -->
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="<?php echo e(route('login')); ?>" class="btn btn-stateblue tra-grey-hover last-link">Connexion</a>
								    </li> 
                                    <?php if(App\Models\Utility::getValByName('signup_button') == 'on'): ?>
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="<?php echo e(route('register')); ?>" class="btn btn-stateblue tra-grey-hover last-link">S'inscrire</a>
								    </li> 
								    <?php endif; ?>
									<!-- HEADER SOCIAL LINKS 													
									<li class="nl-simple white-color header-socials ico-20 clearfix" aria-haspopup="true">
										<span><a href="#" class="ico-facebook"><span class="flaticon-facebook"></span></a></span>
										<span><a href="#" class="ico-twitter"><span class="flaticon-twitter"></span></a></span>
										<span><a href="#" class="ico-instagram"><span class="flaticon-instagram"></span></a></span>
										<span><a href="#" class="ico-dribbble"><span class="flaticon-dribbble"></span></a></span>	
									</li> -->	


	        					</ul>
	        				</nav>	<!-- END MAIN MENU -->


	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->




			<!-- HERO-6
			============================================= -->	
			<section id="hero-6" class="hero-section division">
				<div class="container">	
					<div class="row d-flex align-items-center">


						<!-- HERO TEXT -->
						<div class="col-lg-6">
							<div class="hero-6-txt">
								
								<!-- Title -->
								<h2 class="h2-md">Commencez à vendre en ligne gratuitement</h2>

								<!-- Text -->
								<p class="p-lg">StoreLancer est une solution tout-en-un de constructeur de boutique en ligne ingénieusement conçue pour augmenter les visiteurs et les conversions tout en stimulant les ventes.
								</p> 

								<!-- HERO QUICK FORM -->
								<form id="email-form" class="quick-form shadow-form" action="/register" method="GET">
                                  <?php echo csrf_field(); ?>
									<!-- Form Inputs -->	
									<div class="input-group">
										<input type="email" id="email" name="email" class="form-control email" placeholder="Your email address" autocomplete="off" required>
										<span class="input-group-btn form-btn">
											<button type="submit" class="btn btn-md btn-stateblue black-hover submit">Let's Go</button>
										</span>										
									</div>	
								</form>		

							</div>
						</div>	<!-- END HERO TEXT -->


						<!-- HERO IMAGE -->
						<div class="col-lg-6">	
							<div class="hero-6-img text-center">				
								<img class="img-fluid" src="public/style/images/img-06.png" alt="hero-image">
							</div>
						</div>
						

					</div>    <!-- End row --> 	
				</div>	   <!-- End container --> 	


				<!-- WAVE SHAPE BOTTOM -->	
				<div class="wave-shape-bottom">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 215"><path fill="#ffffff" fill-opacity="1" d="M0,128L120,149.3C240,171,480,213,720,208C960,203,1200,149,1320,122.7L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
				</div>


			</section>	<!-- END HERO-6 -->	




			<!-- FEATURES-8
			============================================= -->
			<section id="features-8" class="wide-60 features-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title title-01 mb-70">		

								<!-- Title -->	
								<h2 class="h2-md">Votre boutique en ligne gratuite est à quelques clics seulement</h2>	

								<!-- Text -->	
								<p class="p-xl">Rejoignez des centaines de milliers de petites entreprises qui font confiance à StoreLancer E-commerce pour vendre en ligne
								</p>
									
							</div>	
						</div>
					</div>


					<!-- FEATURES-8 WRAPPER -->	
			 		<div class="fbox-8-wrapper text-center">
			 			<div class="row row-cols-1 row-cols-md-3">


 


		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-8 mb-40 wow fadeInUp">

									<!-- Image -->
									<div class="fbox-img bg-whitesmoke-gradient">
										<img class="img-fluid" src="public/style/images/img-22.png" alt="feature-icon" />
									</div>

									<!-- Title -->
									<h5 class="h5-md">Créez des vitrines magnifiques</h5>
											
									<!-- Text -->
									<p class="p-lg">Choisissez l'un de nos modèles magnifiquement conçus, axés sur les conversions, aucune expérience en codage n'est requise.
									</p>

		 						</div>
		 					</div>

		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-8 mb-40 wow fadeInUp">

									<!-- Image -->
									<div class="fbox-img bg-whitesmoke-gradient">
										<img class="img-fluid" src="public/style/images/img-24.png" alt="feature-icon" />
									</div>

									<!-- Title -->
									<h5 class="h5-md">Fonctionnalités conçues pour favoriser l'évolution</h5>
											
									<!-- Text -->
									<p class="p-lg">Explosez votre chiffre d'affaires avec des centaines de fonctionnalités conçues pour augmenter les visiteurs et développer vos ventes. 
									</p>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-8 mb-40 wow fadeInUp">

									<!-- Image -->
									<div class="fbox-img bg-whitesmoke-gradient">
										<img class="img-fluid" src="public/style/images/img-21.png" alt="feature-icon" />
									</div>

									<!-- Title -->
									<h5 class="h5-md">Prêt pour mobile</h5>
											
									<!-- Text -->
									<p class="p-lg">Chaque modèle est compatible avec les mobiles, votre boutique aura donc un aspect formidable, peu importe l'appareil que votre client utilise.
									</p>

		 						</div>
		 					</div>
 


				 		</div>  <!-- End row -->	
				 	</div>	<!-- END FEATURES-8 WRAPPER -->	


				</div>	   <!-- End container -->		
			</section>	<!-- END FEATURES-8 -->	




			<!-- CONTENT-3
			============================================= -->
			<section id="content-3" class="bg-snow content-3 wide-60 content-section division">
				<div class="container">


					<!-- TOP ROW -->
					<div class="top-row pb-50">
						<div class="row d-flex align-items-center">


							<!-- IMAGE BLOCK -->
							<div class="col-md-5 col-lg-6">
								<div class="img-block left-column wow fadeInRight">
									<img class="img-fluid" src="public/style/images/img-09.png" alt="content-image">
								</div>
							</div>


							<!-- TEXT BLOCK -->	
							<div class="col-md-7 col-lg-6">
								<div class="txt-block right-column wow fadeInLeft">

									<!-- Section ID -->	
					 				<span class="section-id txt-upcase">Totalement optimisé</span>

									<!-- Title -->	
									<h2 class="h2-xs">Réaliser plus de ventes</h2>

									<!-- Text -->	
									<p class="p-lg">Nous vous proposons une solution de commerce électronique complète, tout-en-un, hébergée, qui comprend tout ce dont vous avez besoin pour vendre en ligne. <br />
									Notre puissant constructeur de magasins en ligne et notre suite robuste d'outils de gestion des stocks vous permettront de concevoir votre magasin, de vendre des téléchargements numériques, 
									de suivre les ventes et plus encore, le tout depuis le logiciel de gestion des produits de votre site.
									</p>

									<!-- Text -->	
 	

								</div>
							</div>	<!-- END TEXT BLOCK -->	


						</div>
					</div>	<!-- END TOP ROW -->


					<!-- BOTTOM ROW -->
					<div class="bottom-row">
						<div class="row d-flex align-items-center">


							<!-- TEXT BLOCK -->	
							<div class="col-lg-6 order-last order-lg-2">
								<div class="txt-block slim-column left-column wow fadeInRight">

									<!-- TEXT BOX -->	
									<div class="txt-box mb-20">

										<!-- Title -->	
										<h5 class="h5-lg">Améliorer son taux de conversion</h5>

										<!-- Text -->	
										<p class="p-lg">Obtenez accès à des outils de marketing de vente au détail en ligne tels que des réductions, des coupons, des offres de groupe, des offres quotidiennes, 
										et plus encore pour vous aider à transformer les acheteurs hésitants en clients payants, ainsi que des outils d'analyse pour une précieuse vision du comportement des clients.  

										</p>

									</div>

									<!-- TEXT BOX -->	
									<div class="txt-box">

										<!-- Title -->	
										<h5 class="h5-lg">Maximisez vos ventes<br /> grâce au marketing par e-mail intégré</h5>

										<!-- List -->	
										<p class="p-lg">
                                             Fidélisez vos clients existants et développez votre base de clients avec notre marketing par e-mail intégré. 
                                             Augmentez vos ventes en personnalisant vos offres pour répondre aux besoins de vos clients et les inciter à acheter plus souvent.
                                             Avec notre solution de commerce électronique tout-en-un, il est facile de faire croître votre entreprise.
												</p>
									 
									 

									</div>	<!-- END TEXT BOX -->

								</div>
							</div>	<!-- END TEXT BLOCK -->	


							<!-- CB WRAPPER -->
							<div class="col-lg-6 order-first order-lg-2">
								<div class="cb-wrapper">

									<!-- CB HOLDER -->	
									<div class="cb-holder wow fadeInLeft">

										<!-- CB BOX #1 -->
										<div class="cb-single-box">
											<p class="p-lg cb-header">Nouveaux clients</p>
											<h2 class="h2-title-xs statistic-number"><sup>+</sup><span class="count-element">784</span></h2>
											<p class="p-md mt-5 ico-10">
												<span class="green-color"><span class="flaticon-"></span> 4.6%</span> Par rapport aux 7 derniers jours
											</p>		
										</div>

										<hr class="divider">

										<!-- CB BOX #2 -->
										<div class="cb-single-box">
										 
												 
													<p class="p-md">Avec notre solution de commerce électronique, vous pouvez suivre facilement vos résultats par rapport aux 7 derniers jours pour mesurer la croissance de votre base de nouveaux clients. </p>
					 
										</div>

										<!-- CB BOX #3 -->
										<div class="cb-single-box cb-box-rounded bg-green white-color mt-25">
											<h4 class="h4-lg">98.245</h4>
											<p class="p-lg">Boostez votre chiffre d'affaires.</p>
										</div>

									</div>	<!-- END CB HOLDER -->	


									<!-- CB SHAPE -->
									<div class="cb-shape-1">
										<img class="img-fluid" src="public/style/images/bg-shape-1.png" alt="content-image">
									</div>

									<!-- CB SHAPE -->
									<div class="cb-shape-2">
										<img class="img-fluid" src="public/style/images/bg-shape-2.png" alt="content-image">
									</div>


								</div>	
							</div>	<!-- END CB WRAPPER -->	


						</div>
					</div>	<!-- END BOTTOM ROW -->


				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-3 -->




			<!-- CONTENT-10
			============================================= -->
			<section id="content-10" class="content-10 wide-100 content-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-8">
							<div class="section-title title-02 mb-60">			

								<!-- Section ID -->	
					 			<span class="section-id txt-upcase">Convertissez plus</span>	

								<!-- Title -->	
								<h2 class="h2-xs">Apprenez les secrets du marketing en ligne avec notre formation en E-Marketing</h2>		

							</div>	
						</div>
					</div>


			 		<!-- IMAGE BLOCK -->
			 		<div class="row">
						<div class="col">
							<div class="img-block text-center video-preview wow fadeInUp">

								<!-- Play Icon --> 
								<a class="" href="/login">				
									<div class="video-btn video-btn-xl bg-pink ico-90">	
										<div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
									</div>
								</a>

								<!-- Preview Image --> 
			 					<img class="img-fluid" src="public/style/images/eteaching.jpg" alt="video-preview">

							</div>
						</div>
					</div>


				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-10 -->




			<!-- FEATURES-4
			============================================= -->
			<section id="features-4" class="pb-60 features-section division">
				<div class="container">


					<!-- FEATURES-4 WRAPPER -->
					<div class="fbox-4-wrapper">
						<div class="row row-cols-1 row-cols-md-2">


							<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="fbox-ico-center ico-65">
											<span class="flaticon-dashboard"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md"> Envoi de courriels promotionnels pour promouvoir des produits et services.</h5>
									</div>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="fbox-ico-center ico-65">
											<span class="flaticon-pantone"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md">Publicité en ligne (Google Ads, Facebook Ads, etc.)</h5>
									</div>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="fbox-ico-center ico-65">
											<span class="flaticon-folder-3"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md">Marketing de contenu (blogs, vidéos, infographies, etc.)</h5>
									</div>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #4 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="fbox-ico-center ico-65">
											<span class="flaticon-resize"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md">Marketing sur les réseaux sociaux (création et gestion de comptes, publicité, etc.)</h5>
									</div>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #5 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="fbox-ico-center ico-65">
											<span class="flaticon-share"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md">Optimisation pour les moteurs de recherche (SEO)</h5>

									</div>

		 						</div>
		 					</div>	


		 					<!-- FEATURE BOX #6 -->
		 					<div class="col">
		 						<div class="fbox-4 pc-25 mb-40 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="fbox-ico">
		 								<div class="ico-65">
											<span class="flaticon-layers"></span>
										</div>
									</div>

									<!-- Text -->
									<div class="fbox-txt">
		
										<!-- Title -->
										<h5 class="h5-md">Marketing d'influence (collaboration avec des influenceurs pour promouvoir des produits ou services)</h5>
						 

									</div>

		 						</div>
		 					</div>	


		 				</div>
					</div>    <!-- END FEATURES-4 WRAPPER -->


				</div>     <!-- End container --> 	
			</section>	<!-- END FEATURES-4 -->




			<!-- STATISTIC-1
			============================================= -->
			<div id="statistic-1" class="bg-01 pt-70 pb-70 statistic-section division">
				<div class="container white-color">


					<!-- STATISTIC-1 WRAPPER -->
					<div class="statistic-1-wrapper">
						<div class="row justify-content-md-center row-cols-1 row-cols-md-3">


							<!-- STATISTIC BLOCK #1 -->
							<div id="sb-1-1" class="col">							
								<div class="statistic-block wow fadeInUp">	

									<!-- Digit -->
									<h2 class="h2-xl statistic-number"><span class="count-element">28</span>%</h2>

									<!-- Text -->
									<h5 class="h5-lg">Plus de ventes</h5>

									<!-- Text -->
									<p class="p-lg">Enim nullam tempor at sapien gravida donec a blandit integer posuere porta
									   justo velna
									</p>

								</div>								
							</div>


							<!-- STATISTIC BLOCK #2 -->
							<div id="sb-1-2" class="col">							
								<div class="statistic-block wow fadeInUp">	

									<!-- Digit -->
									<h2 class="h2-xl statistic-number"><span class="count-element">54</span>%</h2>

									<!-- Text -->
									<h5 class="h5-lg">Taux de conversion plus élevé</h5>

									<!-- Text -->
									<p class="p-lg">Enim nullam tempor at sapien gravida donec a blandit integer posuere porta
									   justo velna
									</p>

								</div>								
							</div>


							<!-- STATISTIC BLOCK #3 -->
							<div id="sb-1-3" class="col">							
								<div class="statistic-block wow fadeInUp">	

									<!-- Digit -->
									<h2 class="h2-xl statistic-number"><span class="count-element">36</span>%</h2>

									<!-- Text -->
									<h5 class="h5-lg">Réduction de l'abandon</h5>

									<!-- Text -->
									<p class="p-lg">Enim nullam tempor at sapien gravida donec a blandit integer posuere porta
									   justo velna
									</p>

								</div>								
							</div>


						</div>
					</div>	<!-- END STATISTIC-1 WRAPPER -->


				</div>	 <!-- End container -->		
			</div>	 <!-- END STATISTIC-1 -->	




			<!-- CONTENT-6
			============================================= -->
			<section id="content-6" class="content-6 wide-60 content-section division">
			 	<div class="container">
			 		<div class="row d-flex align-items-center">


 
 
 
 
 
 
 
 
<div class="built-in-payment-gateway">
    <div class="div-block-403">
        <h3 class="h3-heading">
           
            Acceptez n'importe quel paiement avec les 15 passerelles de paiement les plus populaires
        </h3>
        <p class="bodytext build _2">
            Accepter des paiements en ligne est essentiel pour toute entreprise qui souhaite offrir une expérience d'achat fluide et facile à ses clients. 
            En utilisant les 15 passerelles de paiement les plus populaires, vous pouvez être sûr que vous offrez un large éventail d'options de paiement à vos clients,
            augmentant ainsi les chances qu'ils achètent vos produits ou services. 
            <br />
            <b>  Voici les passerelles de paiement intégrées :</b>  COD ,Bank Transfer, Stripe, Paypal, Paystack, Flutterwave, Razorpay, Paytm, Mercado Pago, Mollie, Skrill, CoinGate, PaymentWall, Telegram, Whatsapp.
        </p>
        <img
            src="https://assets.website-files.com/6080fab40473f72690bcbd17/6213a6de72643966fb0fe05d_card%20.png"
            loading="lazy"
            width="503"
            srcset="
                https://assets.website-files.com/6080fab40473f72690bcbd17/6213a6de72643966fb0fe05d_card%20-p-500.png  500w,
                https://assets.website-files.com/6080fab40473f72690bcbd17/6213a6de72643966fb0fe05d_card%20-p-800.png  800w,
                https://assets.website-files.com/6080fab40473f72690bcbd17/6213a6de72643966fb0fe05d_card%20.png       1006w
            "
            sizes="(max-width: 479px) 90vw, 100vw"
            alt=""
            class="image-164"
        />
        <img src="../public/style/images/payment/secureby.png" loading="lazy" width="455" alt="" class="image-158" />
    </div>
    <img src="../public/style/images/payment/stripe.png" loading="lazy" width="174" alt="" class="image-153" />
    <img src="../public/style/images/payment/skrill.png" loading="lazy" width="174" alt="" class="image-154" />
    <img src="../public/style/images/payment/paystack.png" loading="lazy" width="174" alt="" class="image-174" />
    <img src="../public/style/images/payment/paypal.png" loading="lazy" width="174" alt="" class="image-155" />
    <img src="../public/style/images/payment/coingate.png" loading="lazy" width="174" alt="" class="image-156" />
    <img src="../public/style/images/payment/mollie.png" loading="lazy" width="174" alt="" class="image-157" />
</div>

 
 
 
 
 
 
 
 
 
 


					</div>     <!-- End row -->
			 	</div>      <!-- End container -->
			</section>	 <!-- END CONTENT-6 -->




			<!-- PROJECTS-2
			============================================= -->
			<section id="projects-2" class="pb-60 projects-section division wide-60">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title title-01 mb-70">		

								<!-- Title -->	
								<h2 class="h2-md">Thèmes premium pour chaque industrie</h2>	

								<!-- Text -->	
								<p class="p-xl">Sélectionnez parmi une large gamme de modèles de site web conçus par des professionnels, tous adaptés aux mobiles, optimisés pour les moteurs de recherche et hautement personnalisables - et tous complètement gratuits.
								</p>
									
							</div>	
						</div>
					</div>


					<!-- PROJECTS-2 WRAPPER -->
					<div class="row">	
						<div class="col gallery-items-list">
							<div class="masonry-wrap grid-loaded">


								<!-- PROJECT #1 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-1.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>

			 					</div>	<!-- END PROJECT #1 -->


								<!-- PROJECT #2 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-2.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>

			 					</div>	<!-- END PROJECT #2 -->
			 					
			 					
								<!-- PROJECT #3 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-3.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>

			 					</div>	<!-- END PROJECT #3 -->
			 					
			 					
								<!-- PROJECT #4 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-4.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>
			 					</div>	<!-- END PROJECT #4 -->
			 					
			 					
								<!-- PROJECT #5 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-5.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>
			 					</div>	<!-- END PROJECT #5 -->
			 					
								<!-- PROJECT #6 -->
			 					<div class="project-details masonry-image">

		 							<!-- Image -->
					 				<div class="project-preview rel">
						 				<div class="hover-overlay"> 	<div class="image-wrap-h">  
											<img class="img-fluid" src="public/style/images/home-6.jpg" alt="project-preview" />
											<div class="item-overlay"></div></div>
										</div>
									</div>

			 					</div>	<!-- END PROJECT #6 -->			 					
			 					
			 					

		 					</div>
						</div>
					</div>	<!-- END PROJECTS-1 WRAPPER -->


					<!-- MORE PROJECTS -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn mt-20">
								<a href="/login/" class="btn btn-stateblue tra-grey-hover">Voir plus de designs</a>
							</div>
						</div>
					</div>	<!-- END DOWNLOAD BUTTON -->	


				</div>	   <!-- End container -->	
			</section>	<!-- END PROJECTS-2 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">
 
 
			<!-- TESTIMONIALS-4
			============================================= -->
			<section id="reviews-4" class="rel reviews-section division wide-60">


				<!-- SECTION TITLE -->	
				<div class="container">
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title title-01 mb-60">		

								<!-- Title -->	
								<h2 class="h2-md">Les avis de nos clients</h2>	
									
							</div>	
						</div>
					</div>
				</div>


				<div class="reviews-4-holder">
					<div class="container">
						<div class="row">

							<!-- TESTIMONIALS CAROUSEL -->
							<div class="col-md-12">					
								<div class="owl-carousel owl-theme reviews-4-wrapper">

							
									<!-- TESTIMONIAL #1 -->
									<div class="review-4">


										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">J'ai adoré utiliser ce créateur de boutique en ligne ! C'est facile à utiliser et j'ai pu personnaliser tout ce dont j'avais besoin pour mon magasin. 
											Recommandé à tous les entrepreneurs !		   
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user988.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Aziz Derkawi</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>	
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #1 -->
							
							
									<!-- TESTIMONIAL #2 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">Ce créateur de boutique en ligne est vraiment simple et intuitif. J'ai apprécié l'expérience de magasinage et de commande. Mon entreprise en ligne est en train de se développer rapidement grâce à cela !			   
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user989.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Karim Sabiri</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #2 -->
							
							
									<!-- TESTIMONIAL #3 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">Ce créateur de boutique en ligne est rapide et facile à utiliser. J'ai pu ajouter tous mes produits en un rien de temps, et j'ai déjà commencé à recevoir des commandes !
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user990.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Omar Ben Zekri</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #3 -->


									<!-- TESTIMONIAL #4 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">Je suis très satisfait de mon expérience avec ce créateur de boutique en ligne. 
											Je trouve que c'est simple et pratique pour créer et gérer ma boutique en ligne, et j'ai également reçu un excellent service client.
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user985.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Sofia D</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #4 -->
									
									
									<!-- TESTIMONIAL #5 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">Je suis très heureux d'utilisé ce créateur de boutique en ligne pour mon entreprise. Il est facile à utiliser et à personnaliser, et j'ai été impressionné par la variété des fonctionnalités offertes. 
											Je le recommande vivement à tous ceux qui cherchent à créer leur propre magasin en ligne.
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user991.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Hakim Bennis</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #5 -->
									
									
									<!-- TESTIMONIAL #6 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">J'ai essayé plusieurs créateurs de boutique en ligne avant de trouver celui-ci, et je suis tellement heureux que je l'ai fait. Il est facile à utiliser et offre de nombreuses fonctionnalités utiles. 
											Mon magasin en ligne a l'air professionnel et mes clients adorent le parcourir."		   
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user992.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Dounia</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #6 -->
									
									
									<!-- TESTIMONIAL #7 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">Ce créateur de boutique en ligne a vraiment tout ce dont j'ai besoin pour gérer mon entreprise en ligne.
											Je peux facilement ajouter des produits, gérer les commandes et suivre les stocks. Je suis très satisfait de mon expérience et je le recommande vivement.
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user993.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Ikram Mehdaoui</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #7 -->


									<!-- TESTIMONIAL #8 -->
									<div class="review-4">

										<!-- Text -->
										<div class="review-4-txt">

											<!-- Text -->
											<p class="p-lg">J'ai été agréablement surpris par la facilité d'utilisation de ce créateur de boutique en ligne. Je ne suis pas très doué en technologie, mais j'ai pu créer une boutique en ligne professionnelle en quelques minutes seulement.
											Je suis très satisfait de mon expérience et je le recommande à tous ceux qui cherchent à créer leur propre magasin en ligne.
											</p>

											<!-- Testimonial Author -->
											<div class="author-data clearfix">

												<!-- Testimonial Avatar -->
												<div class="review-avatar">
													<img src="public/style/images/users/user994.jpeg" alt="review-avatar">
												</div>
															
												<!-- Testimonial Author -->
												<div class="review-author">

													<h6 class="h6-xl">Ilyas Derdari</h6>

													<!-- Rating -->
													<div class="review-rating ico-15 yellow-color">
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
														<span class="flaticon-star-1"></span>
													</div>

												</div>	

											</div>	<!-- End Testimonial Author -->

										</div>	<!-- End Text -->

									</div>	<!-- END TESTIMONIAL #8 -->

								
								</div>
							</div>	<!-- END TESTIMONIALS CAROUSEL --> 


						</div>	
					</div>     <!-- End container -->
				</div>


			</section>	<!-- END TESTIMONIALS-4 -->
 
			<!-- DIVIDER LINE -->
			<hr class="divider">




			<!-- CONTENT-7
			============================================= -->
			<section id="content-7" class="content-7 wide-60 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">

								
						<!-- TEXT BLOCK -->		
						<div class="col-md-6 order-last order-md-2">
							<div class="txt-block left-column wow fadeInLeft">

 	

								<!-- Title -->	
								<h2 class="h2-xs">Des fonctionnalités intuitives pour des résultats puissants</h2>

								<!-- List -->	
								<ul class="simple-list">

									<li class="list-item">
										<p class="p-lg">Notre application de création de boutique vous fournit tout ce dont vous avez besoin pour commencer à vendre en ligne, de la gestion des stocks au traitement des paiements et plus encore.
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg">De la promotion aux outils d'optimisation mobile, notre application a tout ce dont vous avez besoin pour réussir dans le monde concurrentiel du commerce électronique.
										</p>
									</li>

								</ul>
 

							</div>	
						</div>	<!-- END TEXT BLOCK -->		


						<!-- IMAGE BLOCK -->	
						<div class="col-md-6 order-first order-md-2">
							<div class="content-7-img wow fadeInRight">
								<img class="img-fluid" src="public/style/images/dashboard-05.png" alt="content-image">
							</div>	
						</div>


					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-7 -->




			<!-- FAQs-2
			============================================= -->
			<section id="faqs-2" class="pb-60 faqs-section division">				
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title title-01 mb-80">		

								<!-- Title -->	
								<h2 class="h2-md">Vous avez des questions ? Regardez ici</h2>	

								<!-- Text -->	
								<p class="p-xl">Notre centre d'aide en ligne est là pour vous aider à répondre à toutes vos questions
								</p>
									
							</div>	
						</div>
					</div>


					<!-- FAQs-2 QUESTIONS -->	
					<div class="faqs-2-questions">
						<div class="row row-cols-1 row-cols-lg-2">
						

							<!-- QUESTIONS HOLDER -->
							<div class="col">
								<div class="questions-holder pr-15">


									<!-- QUESTION #1 -->
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Comment fonctionne StoreLancer ?</h5>

										<!-- Answer -->
										<p class="p-lg">StoreLancer permet de créer sa propre boutique en ligne en utilisant des modèles de conception prédéfinis et des outils de personnalisation. 
										La plateforme offre des fonctionnalités pour la gestion des produits, des commandes et des paiements, ainsi que des analyses de ventes et une intégration avec les réseaux sociaux.
										</p>

									</div>	


									<!-- QUESTION #2 -->					
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Quelles sont les fonctionnalités clés de StoreLancer ?</h5>

										<!-- Answer -->
										<p class="p-lg">StoreLancer propose des fonctionnalités telles que la gestion des produits, la gestion des commandes, les paiements en ligne, les livraisons, les taxes et une personnalisation de la boutique en ligne.
										</p>

									</div>


									<!-- QUESTION #3 -->					
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Est-ce que StoreLancer m'aidera à réaliser des ventes ?</h5>

										<!-- Answer -->
	                                 	<p class="p-lg">À StoreLancer nous fournissons des ressources et un soutien pour apprendre aux utilisateurs comment faire de la publicité pour leurs produits de manière efficace et commencer à réaliser des ventes.
												</p>
										 

									</div>


								</div>
							</div>	<!-- END QUESTIONS HOLDER -->


							<!-- QUESTIONS HOLDER -->
							<div class="col">
								<div class="questions-holder pl-15">

								
									<!-- QUESTION #4 -->					
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Avez-vous un essai gratuit ?</h5>

										<!-- Answer -->
										<p class="p-lg">Chez StoreLancer, nous offrons un plan gratuit pour tester notre application et ses fonctionnalités.
										</p>

									</div>

										
									<!-- QUESTION #5 -->
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Est-ce que StoreLancer peut aider à obtenir l'approbation des passerelles de paiement ? </h5>

										<!-- Answer -->
										<p class="p-lg"> Nous travaille en étroite collaboration avec les fournisseurs de passerelles de paiement, et Notre équipe de support peut vous aider à comprendre les exigences et à vous guider dans le processus.
										</p>
 

									</div>


									<!-- QUESTION #6 -->
									<div class="question wow fadeInUp">

										<!-- Question -->
										<h5 class="h5-md">Comment StoreLancer gère-t-il les stocks pour les boutiques en ligne ?</h5>

										<!-- Answer -->
									   <p class="p-lg">StoreLancer offre plusieurs fonctionnalités pour gérer les stocks des boutiques en ligne, y compris le suivi des niveaux de stock, 
									   la gestion des variantes de produits, des importations par lots et des notifications de stock faible.</p>
										 
									</div>


								</div>
							</div>	<!-- END QUESTIONS HOLDER -->


						</div>	<!-- End row -->
					</div>	<!-- END FAQs-2 QUESTIONS -->	


					<!-- MORE QUESTIONS BUTTON -->	
					<div class="row">
						<div class="col">	
							<div class="more-questions">
								<h5 class="h5-sm">Avez-vous d'autres questions ? <a href="contacts.html">Posez votre question ici</a></h5>
							</div>
						</div>
					</div>


				</div>	   <!-- End container -->		
			</section>	<!-- END FAQs-2 -->




			<!-- PRICING-2
			============================================= -->
			<section id="pricing-2" class="bg-whitesmoke-gradient wide-60 pricing-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title title-01 mb-80">		

								<!-- Title -->	
								<h2 class="h2-md">Commencez à vendre gratuitement. Mettez à niveau à tout moment</h2>	

								<!-- Text -->	
								<p class="p-xl">Aucune carte de crédit requise. Modifiez ou annulez votre plan à tout moment</p>
									
							</div>	
						</div>
					</div>


					<!-- PRICING TABLES -->
					<div class="pricing-2-row pc-25">
						<div class="row row-cols-1 row-cols-md-3">


							<!-- BASIC PLAN -->
							<div class="col">
								<div class="pricing-2-table bg-white mb-40 wow fadeInUp">	
													
									<!-- Plan Price -->
									<div class="pricing-plan">

										<!-- Plan Title -->
										<div class="pricing-plan-title">
											<h5 class="h5-xs">Free</h5>
										</div>	

										<!-- Price -->
										<sup class="dark-color">$</sup>								
										<span class="dark-color">0</span>
										<sup class="validity dark-color"><span></span> / mois</sup>
										<p class="p-md"></p><br />

									</div>	

									<!-- Plan Features  -->
									<ul class="features">
										<li><p class="p-md">Durée: <span>illimitée </span></p></li>
										<li><p class="p-md">Nombre boutiques: <span>1 </span>  </p></li>
										<li><p class="p-md">Nombre de produits par boutique: <span>30</span>  </p></li>
										<li><p class="p-md">Vente de biens numériques: <span>Non</span>  </p></li>
										
										<li><p class="p-md">Activation de domaine: <span>Non</span></p></li>	
										<li><p class="p-md">Activation de sous-domaine: <span>Oui</span></p></li>	
										<li><p class="p-md">Activation de blog: <span>Oui</span></p></li>	

										<li><p class="p-md">Importation Depui AliExpress: <span>Non</span></p></li>
										<li><p class="p-md">Mise à jour Depui AliExpress: <span>Non</span>  </p></li>
										<li><p class="p-md">Autoremplissage des commandes AliExpress: <span>Non</span> </p></li>
										
										<li><p class="p-md">Formation en ligne: <span>Non </span></p></li>
										
										<li><p class="p-md">Passerelles de paiement: <span>3</span></p></li>
										<li><p class="p-md">Coupons de réduction: <span>Yes</span></p></li>
										<li><p class="p-md">Nombre de langues intégrées: <span>4</span></p></li>
							 
										
										
									</ul>

									<!-- Pricing Plan Button -->
									<a href="/register" class="btn btn-sm btn-stateblue tra-grey-hover">Sélectionner le plan</a>

								</div>
							</div>	<!-- END BASIC PLAN -->


							<!-- AGENCY PLAN -->
							<div class="col">
								<div class="pricing-2-table bg-white mb-40 wow fadeInUp">	

									<!-- Plan Price -->
									<div class="pricing-plan">

										<!-- Plan Title -->
										<div class="pricing-plan-title">
											<h5 class="h5-xs">Plan Platine</h5>
											<h6 class="h6-sm bg-lightgrey">Save 25%</h6>
										</div>	

										<!-- Price -->
										<sup class="dark-color">$</sup>								
										<span class="dark-color">15</span>
										<sup class="validity dark-color"><span>.00</span> / Mois</sup>
										<p class="p-md">Ou Facturé à 135$ par an</p>

									</div>	

									<!-- Plan Features  -->
									<ul class="features">
										<li><p class="p-md">Durée: <span>illimitée </span></p></li>
										<li><p class="p-md">Nombre boutiques: <span>3 </span>  </p></li>
										<li><p class="p-md">Nombre de produits par boutique: <span>250</span>  </p></li>
										<li><p class="p-md">Vente de biens numériques: <span>Oui</span>  </p></li>
										
										<li><p class="p-md">Activation de domaine: <span>Oui</span></p></li>	
										<li><p class="p-md">Activation de sous-domaine: <span>Oui</span></p></li>	
										<li><p class="p-md">Activation de blog: <span>Oui</span></p></li>	

										<li><p class="p-md">Importation Depui AliExpress: <span>Oui</span></p></li>
										<li><p class="p-md">Mise à jour Depui AliExpress: <span>Non</span>  </p></li>
										<li><p class="p-md">Autoremplissage des commandes AliExpress: <span>Non</span> </p></li>
										
										<li><p class="p-md">Formation en ligne: <span>Oui </span></p></li>
										
										<li><p class="p-md">Passerelles de paiement: <span>10</span></p></li>
										<li><p class="p-md">Coupons de réduction: <span>Yes</span></p></li>
										<li><p class="p-md">Nombre de langues intégrées: <span>4</span></p></li>
									</ul>

									<!-- Pricing Plan Button -->
									<a href="/register" class="btn btn-sm btn-stateblue tra-grey-hover">Sélectionner le plan</a>

								</div>
							</div>	<!-- END AGENCY PLAN  -->


							<!-- ADVANCED PLAN -->
							<div class="col">
								<div class="pricing-2-table bg-white mb-40 wow fadeInUp">

									<!-- Plan Price  -->
									<div class="pricing-plan highlight">

										<!-- Plan Title -->
										<div class="pricing-plan-title">
											<h5 class="h5-xs">Plan Gold</h5>
											<h6 class="h6-sm bg-stateblue white-color">Populaire</h6>
										</div>	

										<!-- Price -->
										<sup class="dark-color">$</sup>								
										<span class="dark-color">35</span>
										<sup class="validity dark-color"><span>.00</span> / month</sup>
										<p class="p-md">Ou Facturé à 315$ par an</p>
									</div>	

									<!-- Plan Features  -->
									<ul class="features">
										<li><p class="p-md">Durée: <span>illimitée </span></p></li>
										<li><p class="p-md">Nombre boutiques: <span>5 </span>  </p></li>
										<li><p class="p-md">Nombre de produits par boutique: <span>1000</span>  </p></li>
										<li><p class="p-md">Vente de biens numériques: <span>Oui</span>  </p></li>
										
										<li><p class="p-md">Activation de domaine: <span>Oui</span></p></li>	
										<li><p class="p-md">Activation de sous-domaine: <span>Oui</span></p></li>	
										<li><p class="p-md">Activation de blog: <span>Oui</span></p></li>	

										<li><p class="p-md">Importation Depui AliExpress: <span>Oui</span></p></li>
										<li><p class="p-md">Mise à jour Depui AliExpress: <span>Oui</span>  </p></li>
										<li><p class="p-md">Autoremplissage des commandes AliExpress: <span>Oui</span> </p></li>
										
										<li><p class="p-md">Formation en ligne: <span>Oui </span></p></li>
										
										<li><p class="p-md">Passerelles de paiement: <span>15</span></p></li>
										<li><p class="p-md">Coupons de réduction: <span>Yes</span></p></li>
										<li><p class="p-md">Nombre de langues intégrées: <span>4</span></p></li>
									</ul>

									<!-- Pricing Plan Button -->
									<a href="/register" class="btn btn-sm btn-stateblue tra-grey-hover">Sélectionner le plan</a>

								</div>
							</div>	<!-- END ADVANCED PLAN -->


						</div>
					</div>	<!-- END PRICING TABLES -->
 


					<!-- PAYMENT METHODS -->
					<div class="payment-methods pc-30">	
						<div class="row row-cols-1 row-cols-md-3">

							<!-- Payment Methods -->
							<div class="col col-lg-5">
								<div class="pbox mb-40">

									<!-- Title -->
									<h6 class="h6-md">Méthodes de paiement acceptées</h6>

									<!-- Payment Icons -->
									<ul class="payment-icons ico-50">
										<li><img src="public/style/images/png-icons/visa.png" alt="payment-icon" /></li>
										<li><img src="public/style/images/png-icons/am.png" alt="payment-icon" /></li>
										<li><img src="public/style/images/png-icons/discover.png" alt="payment-icon" /></li>
										<li><img src="public/style/images/png-icons/paypal.png" alt="payment-icon" /></li>	
										<li><img src="public/style/images/png-icons/jcb.png" alt="payment-icon" /></li>
									</ul>

								</div>
							</div>	


							<!-- Payment Guarantee -->
							<div class="col col-lg-4">
								<div class="pbox mb-40">

									<!-- Title -->
									<h6 class="h6-md">Garantie de remboursement</h6>

									<!-- Text -->
									<p>Découvrez StoreLancer Platine pendant 14 jours. Si cela ne convient pas parfaitement, vous recevrez un remboursement complet</p>
									
								</div>
							</div>	


							<!-- Payment Encrypted -->
							<div class="col col-lg-3">
								<div class="pbox mb-40">

									<!-- Title -->
									<h6 class="h6-md">Paiement SSL crypté</h6>

									<!-- Text -->
									<p>Vos informations sont protégées par un cryptage SSL 256 bits.</p>

								</div>
							</div>	

						</div>
					</div>	<!-- END PAYMENT METHODS -->


				</div>	   <!-- End container -->
			</section>	<!-- END PRICING-2 -->




			<!-- CALL TO ACTION-11
			============================================= -->
			<section id="cta-11" class="cta-section division">
				<div class="container">
					<div class="bg-tra-purple cta-11-wrapper">
						<div class="row d-flex align-items-center">


							<!-- CALL TO ACTION TEXT -->
							<div class="col-lg-7 col-lg-7">
								<div class="cta-11-txt">

									<!-- Title -->	
									<h2 class="h2-xs">Êtes-vous prêt à rejoindre StoreLancer ?</h2>

									<!-- Text -->
									<p class="p-lg">Découvrez StoreLancer et créez votre site Web ou votre boutique en ligne en quelques étapes simples. Nous offrons des fonctionnalités de pointe et un support technique 24/7 pour vous aider à réussir en ligne.
									</p>

									<!-- Button -->
									<a href="/login" class="btn btn-stateblue tra-stateblue-hover">Démarrer</a>

								</div>
							</div>


							<!-- CALL TO ACTION BUTTON -->
							<div class="col-lg-5">
								<div class="text-end">
									<div class="cta-11-img text-center">
										<img class="img-fluid" src="public/style/images/img-25.png" alt="cta-image">
									</div>	
								</div>
							</div>


						</div>
					</div>    <!-- End row -->
				</div>	   <!-- End container -->	
			</section>	<!-- END CALL TO ACTION-11 -->


 

			<!-- FOOTER-4
			============================================= -->
			<footer id="footer-4" class="footer division">
				<div class="container">


	 


					<hr>


					<!-- BOTTOM FOOTER -->
					<div class="bottom-footer">
						<div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


							<!-- FOOTER COPYRIGHT -->
							<div class="col">
								<div class="footer-copyright">
									<p>&copy; <?php echo e(__('Copyright')); ?> <?php echo e((Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :config('app.name', 'storelancer')); ?> <?php echo e(date('Y')); ?></p>
								</div>
							</div>


							<!-- BOTTOM FOOTER LINKS -->
							<div class="col">
								<ul class="bottom-footer-list text-secondary text-end">
							<li class="first-li"><p><a href="/privacy.html">Politique de confidentialité</a></p></li>
									<li><p><a href="/terms.html">Conditions d'utilisation</a></p></li>
									<li class="last-li"><p><a href="contact.html">Nous contacter </a></p></li>
								</ul>
							</div>


						</div>  <!-- End row -->
					</div>	<!-- BOTTOM FOOTER -->


				</div>
			</footer>	<!-- FOOTER-4 -->




		</div>	<!-- END PAGE CONTENT -->	
			



		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="public/style/js/jquery-3.6.0.min.js"></script>
		<script src="public/style/js/bootstrap.min.js"></script>	
		<script src="public/style/js/modernizr.custom.js"></script>
		<script src="public/style/js/jquery.easing.js"></script>
		<script src="public/style/js/jquery.appear.js"></script>
		<script src="public/style/js/jquery.scrollto.js"></script>	
		<script src="public/style/js/menu.js"></script>
		<script src="public/style/js/imagesloaded.pkgd.min.js"></script>
		<script src="public/style/js/isotope.pkgd.min.js"></script>
		<script src="public/style/js/owl.carousel.min.js"></script>
		<script src="public/style/js/jquery.magnific-popup.min.js"></script>
 
		<script src="public/style/js/wow.js"></script>
				
		<!-- Custom Script -->		
		<script src="public/style/js/custom.js"></script>

		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-YZYDB7BX05"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
 		 gtag('js', new Date());
		  gtag('config', 'G-YZYDB7BX05');
		</script>




<script>
  $(document).ready(function() {
    $('#email-form').submit(function(e) {
      e.preventDefault();
      var email = $('#email').val();
      window.location.href = '/register?email=' + email;
    });
  });
</script>





	</body>



</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/layouts/landing.blade.php ENDPATH**/ ?>