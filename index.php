<?php
session_start();
require('config/head.php');

$mysqli = new mysqli("localhost", "root", "root", "le_borsalino");

// Login
if (isset($_POST["name"]) && isset($_POST["password"])) {
	if ($_POST['name'] != "" && $_POST['password'] != "") {
		$result = $mysqli->query('SELECT *
			FROM admin
			WHERE name = "' . $_POST['name'] . '"
			AND password = "' . $_POST['password'] . '"');


		$rows = mysqli_num_rows($result);
		echo htmlspecialchars($row);
		$_SESSION['utilisateur'] = $_POST['name'];

		if ($rows == 1) {
			header("location:reservations.php");
		} else {
			echo "<div id=\"erreur_connection\">Identifiants érronés</div>";
		}
	} else {
		echo "<div id=\"erreur_connection\">Remplissez tout les champs</div>";
	}
}

// Reservation
if (isset($_POST["res_name"]) && isset($_POST["res_mail"]) && isset($_POST["res_comment"]) && isset($_POST["res_date"]) && isset($_POST["res_people"]) && isset($_POST["res_hour"])) {
	if (
		$_POST["res_name"] != "" &&
		$_POST["res_mail"] != "" &&
		$_POST["res_date"] != "" &&
		$_POST["res_people"] != "" &&
		$_POST["res_hour"] != ""
	) {
		$mysqli->query('INSERT INTO `reservations`(`name`, `email`, `comment`, `date`, `nb_people`, `hour`) VALUES ("' . $_POST['res_name'] . '", "' . $_POST['res_mail'] . '", "' . $_POST['res_comment'] . '", "' . $_POST['res_date'] . '", "' . $_POST['res_people'] . '", "' . $_POST['res_hour'] . '")');

		echo "<div id=\"erreur_connection\">Merci ! Votre réservation est enregistée elle vous sera confirmée par email.</div>";
	} else {
		echo "<div id=\"erreur_connection\">Remplissez tout les champs</div>";
	}
}
?>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo">
								<img src="images/logo.png" class="logo-img">
							</div>
							<nav class="main_nav">
							</nav>
							<div class="reservations_phone ml-auto"><i class="fa fa-phone"></i> 05 57 15 77 65</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Hamburger -->

		<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
			<div class="hamburger">
				<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
					<span>menu</span>
					<div class="hamburger_container">
						<div class="menu_hamburger">
							<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
							<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
							<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Menu -->

		<div class="menu trans_800">
			<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			</div>
			<div class="menu_reservations_phone ml-auto"><i class="fa fa-phone"></i> 05 57 15 77 65</div>
		</div>

		<!-- Home -->

		<div class="home">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/home.jpg" data-speed="0.8"></div>
			<div class="home_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content text-center">
								<div class="home_subtitle page_subtitle">Le Borsalino</div>
								<div class="home_title">
									<h1>Restaurant Pizzeria</h1>
								</div>
								<div class="home_text ml-auto mr-auto">
									<p>3 Boulevard Curepipe - 33260 La Teste de Buch</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="scroll_icon"></div>
		</div>

		<!-- Signature Dish -->

		<div class="sig">
			<div class="sig_content_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="sig_content">
								<div class="sig_subtitle page_subtitle">Actualités</div>
								<div class="sig_title">
									<h1></h1>
								</div>
								<div class="sig_name_container d-flex flex-row align-items-start justify-content-start">
									<div class="sig_name"></div>
									<div class="sig_price ml-auto"></div>
								</div>
								<div class="sig_content_list">
									<?php include('config/actualities.php') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sig_image_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 offset-lg-5">
							<div class="sig_image">
								<div class="background_image" style="background-image:url(images/sig.jpg)"></div>
								<img src="images/sig.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Video -->

		<div class="video_section">
			<div class="background_image" style="background-image:url(images/sig_2.jpg)"></div>
			<div class="video_section_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="video_section_title">De délicieuses pizzas sur place ou à emporter</div>
			</div>
		</div>

		<!-- Intro -->

		<div class="intro">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="intro_content">
							<div class="intro_subtitle page_subtitle">Rejoignez nous</div>
							<div class="intro_title">
								<h2>Situé au port de La Teste</h2>
							</div>
							<div class="intro_text">
								<p>3 boulevard Curepipe, proche du port de la teste et à côté du V&B.</p>
							</div>
							<div class="row map-containter">
								<img src="images/map.png" alt="" onclick="window.open('https://goo.gl/maps/nBnBDpEU4rL3dcgQ6')">
								<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2838.991387221101!2d-1.1421999999999999!3d44.638093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x40709c120652ac70!2sLe+Borsalino!5e0!3m2!1sfr!2s!4v1402489201881" style="width:100%;" height="340" frameborder="0" style="border:0"></iframe>		</div> -->

							</div>
						</div>
						<div class="row">
							<div class="col-xl-4 col-md-6 intro_col">
								<div class="intro_image"><img src="images/intro_1.jpg" alt="https://unsplash.com/@quanle2819"></div>
							</div>
							<div class="col-xl-4 col-md-6 intro_col">
								<div class="intro_image"><img src="images/intro_2.jpg" alt="https://unsplash.com/@fabmag"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- The Menu -->

		<div class="themenu">
			<div class="container">
				<div class="row menu-before-row">
					<div class="col">
						<div class="themenu_title_bar_container">
							<div class="themenu_rating text-center">
								<i class="fa fa-cutlery"></i>
							</div>
							<div class="themenu_title_bar d-flex flex-column align-items-center justify-content-center">
								<div class="themenu_title">Notre Menu</div>

							</div>
						</div>
					</div>
				</div>
				<div class="row themenu_row">
					<!-- <iframe src="images/carte.pdf" width="100%" height="700"> -->
					<img src="images/carte.jpg" alt="">

				</div>
			</div>

		</div>

		<!-- Reservations -->

		<div class="reservations text-center">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/reservations.jpg" data-speed="0.8"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="reservations_content d-flex flex-column align-items-center justify-content-center">
							<div class="res_title">Réservez votre table</div>
							<div class="res_form_container">
								<form id="res_form" class="res_form" method="POST">
									<div class="d-flex flex-sm-row flex-column align-items-center justify-content-start">
										<input type="text" id="res_name" class="res_input" required="required" placeholder="Nom" name="res_name">
										<input type="email" id="res_mail" class="res_input" required="required" placeholder="Adresse email" name="res_mail">
										<input type="text" id="res_comment" class="res_input" placeholder="Commentaire" name="res_comment">
									</div>
									<br>
									<div class="d-flex flex-sm-row flex-column align-items-center justify-content-start">
										<input type="text" id="datepicker" class="res_input" required="required" name="res_date">
										<input type="number" maw="10" min="1" value="1" class="res_input res_people" required="required" name="res_people">
										<select class="res_select" name="res_hour" id="">
											<option value="12h">12h</option>
											<option value="12h30">12h30</option>
											<option value="13h">13h</option>
											<option value="13h30">13h30</option>
											<option value="19h">19h</option>
											<option value="19h30">19h30</option>
											<option value="20h">20h</option>
											<option value="20h30">20h30</option>
											<option value="21h">21h</option>
										</select>
									</div>
									<input class="res_button" type="submit" value="Réservation" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">

					<!-- Footer Logo -->
					<div class="col-lg-3 footer_col">
						<div class="footer_logo">
							<img src="images/logo.png" class="logo-img">
						</div>
						<div class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							<p style="line-height: 1.2;">Copyright &copy; Audric Pandelé, All rights reserved | <a class="pointer" target="_blank" href="https://www.linkedin.com/in/audric-pandel%C3%A9/"><i class="fa fa-linkedin"></i></a> | <a class="pointer" data-toggle="modal" data-target="#exampleModal">
									Connexion
								</a></p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
					</div>

					<!-- Footer About -->
					<div class="col-lg-6 footer_col">
						<div class="footer_about">
						</div>
					</div>

					<!-- Footer Contact -->
					<div class="col-lg-3 footer_col">
						<div class="footer_contact">
							<ul>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>
										<div class="footer_contact_title">Adresse:</div>
									</div>
									<div class="footer_contact_text">3 boulevard Curepipe, 33260 La Test de Buch</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>
										<div class="footer_contact_title">Phone:</div>
									</div>
									<div class="footer_contact_text">05 57 15 77 65</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>
										<div class="footer_contact_title">Email:</div>
									</div>
									<div class="footer_contact_text">leborsalino-pizza@gmail.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6">
								<label for="">Nom d'utilisateur</label>
								<input name="name" type="text" class="form-control">
							</div>
							<div class="col-lg-6">
								<label for="">Mot de passe</label>
								<input name="password" type="password" class="form-control">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<input type="submit" class="btn btn-success" value="Connexion" />
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="plugins/jquery-datepicker/jquery-ui.js"></script>
	<script src="plugins/jquery-timepicker/jquery.timepicker.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>