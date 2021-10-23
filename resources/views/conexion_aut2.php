<?php
    $nestados1=$_GET['estados1'];
    $estf=$_GET['estfin'];
	$esti=$_GET['estini'];
    $guardar=fopen('aut2.txt','a+');
    fwrite($guardar,$nestados1);
    fwrite($guardar,"\n");
	fwrite($guardar,$esti);
	fwrite($guardar,',');
	fwrite($guardar,$estf);
	fwrite($guardar,"\n");
    fclose($guardar);
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	
	<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">GyL<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.html">Trabajo 1</a></li>
							<li class="active"><a href="portfolio.html">Trabajo 2</a></li>
							<li class="has-dropdown"><a href="blog.html">Trabajo 3</a></li>
							<li><a href="about.html">Trabajo 4</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<div id="fh5co-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Trabajo 2</h2>
					<p>En la siguiente pagina se podra observar el desarrollo de la segunda actividad a evaluar, la cual posee las siguientes exigencias:
						<ul align = "justify">
							<li>Ingresar 2 autómatas a la aplicación (pueden ser AFD y/o AFND)</li>
							<li>Obtener el AFD equivalente (si es AFND) y simplificarlos.</li>
							<li>Obtener el autómata a partir del complemento, unión, concatenación e intersección entre
							ambos autómatas.</li>
							<li>Pasar los autómatas del punto anterior a AFD y simplificarlos.</li>
						</ul>
					</p>
				</div>
			</div>
			<div class="row animate-box">	
				<div class="col-md-6 col-md-offset-3 text-center heading-section">
					<h3>Demostracion</h3>
					<p align = "justify">Ingrese valores AUTOMATA 2:</p>
					<form action="recoleccion_de_datos2" mclass="#fh5co-started" method="GET">
						<p align = "text-center">	
							Estado inicial <input type="number" min="0" name="ini">
							<br>
							<br>
							Letra Camino <input type="char" min="0" name="letra">
							<br>
							<br>
							Punto de llegada <input type="number" min="0" name="lleg">
							<br>
							<br>
							<input type="submit" value="Ingresar">
						</p>
					</form>
				<div>
					
			</div>
		</div>
	</div>
 
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

