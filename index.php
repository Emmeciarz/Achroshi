<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Achroshi</title>
	<link rel="icon" type="image/x-icon" href="./img/ico.ico">
	<meta name="author" content="Kiriu" />
	<link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;700&family=Dancing+Script&display=swap" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;700&display=swap" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="./css/main.css" />
</head>

<body>
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid">
			<a class="navbar-brand" href="./index.php?home"><img src="./img/banner.png" class="navbar-brand-img" alt="Achroshi" /></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Projekty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php?aboutme">O Mnie</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php?community">Społeczność</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./index.php?faq">FAQ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">wesprzyj</a>
					</li>
					<?php
					if (isset($_SESSION["logged_in"])) {
						echo '<li class="nav-item-profile dropdown">';
						echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>';
						echo '<ul class="dropdown-menu">';
						echo '<li><a class="dropdown-item" href="#">User-name</a></li>';
						echo '<li><a class="dropdown-item" href="./index.php?login&&wyloguj">Wyloguj</a></li>';
						echo '</ul>';
						echo '</li>';
						echo '</ul>';
					} else {
						echo '</ul>';
						echo '<div class="d-flex justify-content-center nav-img ms-auto">';
						echo '<a class="nav-button nav-cta" href="./index.php?login">Login</a>';
						echo '</div>';
					}
					?>
			</div>
		</div>
	</nav>
	<main class="d-flex align-items-stretch justify-content-center">
		<?php
		function wyswietl($link)
		{
			$tablica = [
				"login" => "./php/login.php",
				"register" => "./php/register.php",
				"home" => "./php/home.php",
				"faq" => "./php/faq.php",
				"community" => "./php/community.php",
				"aboutme" => "./php/aboutme.php",
			];
			if (isset($link) && array_key_exists($link, $tablica)) {
				include $tablica[$link];
			} else {
				include $tablica["home"];
			}
		}
		echo wyswietl(key($_GET));
		?>
	</main>

	<footer>
		<div class="container text-center py-3">
			<div class="row">
				<div class="col-6 col-sm-3 py-4">
					<a class="footer-link" href="https://github.com/Emmeciarz/Achroshi"><i class="bi bi-github"></i> Oficjalny GitHub</a>
				</div>
				<div class="col-6 col-sm-3 py-4">
					<a class="footer-link" href="https://discord.gg/dUGuWJDM9H"><i class="bi bi-discord"></i> Oficjalny Discord</a>
				</div>
				<div class="col-6 col-sm-3 py-4">
					<a class="footer-link" href="https://steamcommunity.com/profiles/76561198352429559/"><i class="bi bi-steam"></i> Oficjalny Steam Autora</a>
				</div>
				<div class="col-6 col-sm-3 py-4">
					<a class="footer-link" href="https://www.twitch.tv/0909kiriu"><i class="bi bi-twitch"></i> Oficjalny Twitch Autora</a>
				</div>
				<div class="col-12 py-2">
					<p>Copyright &#169 Achroshi.net</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="./js/script.js"></script>
</body>

</html>