<?php
session_start();
//Load composer's autoloader
require 'vendor/autoload.php';
$db_connection = pg_connect("host=ec2-174-129-241-14.compute-1.amazonaws.com port=5432 dbname=d35s6fdts9mtqe user=crxjiiplfrwncf password=be7126872bcd36c2bc4bde1163ba5a72243fb144652c0e0b110d388e7efee0be");
// Check connection
if($db_connection === false){
    die("ERROR: Could not connect. ");
}

if(!$_SESSION['isLogged']){
	header('Location: login.php');
}

if( isset($_POST['Logout']) ){
	session_unset();
	session_destroy();
	header('Location: index.html');
}
// Close connection
pg_close($db_connection);
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Member Homepage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
      		<header id="header">
          		<img src="images/extraterrestrial-logo-transparent.png" style="margin-top: 5px; margin-right: 5px" width="70" height="50"/>
          		<h1 id="logo" style="margin-left:50px"><a href="memberHome.php">Extraterrestrial</a></h1>
          		<nav id="nav">
              		<ul>
                  		<li><a href="index.html">Home</a></li>
						<li><a href="memberHome.php">Members</a></li>
						<li>
							<a href="about.html">About Us</a>
						</li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="products.html">Products</a></li>
						<li><a href="login.php" class="button primary">Login</a></li>
					</ul>
         		</nav>
      		</header>

			<!-- Banner -->
			<section id="banner">
				<div class="content" style="text-align: center">
					<header>
						<?php 
							echo "<h2>";
							echo "Hello, " , $_SESSION['name'] , "!"; 
							echo "</h2>";
						?>
						<!--logout button-->
						<form id="logout" action="memberHome.php" method="POST">
							<input type="hidden" name="form_submitted" value="1" />
							<input type="submit" name="Logout" value="Logout" class="primary">
						</form>
					</header>
					<span class="image"><img src="images/extraterrestrial-logo.png" alt="" style="text-align: center; margin-top: 40px"/></span>
				</div>
				<a href="#two" class="goto-next scrolly">Next</a>
			</section>

			<!-- Two -->
			<section id="two" class="spotlight style2 right">
				<span class="image fit main"><img src="images/nasa1-unsplash.jpg" alt="" /></span>
				<div class="content">
					<header>
						<center><h3>Make sure your next trip is...</h3></center>
						<h2>OUT-OF-THIS-WORLD!</h2>
						<br><br>
						<p>Plan your visit to:</p>
					</header>
					<center><ul class="actions">
						<li><a href="moon-trip.php" class="button">The Moon</a></li>
						<li><a href="mars-trip.php" class="button">Mars</a></li>
					</ul></center>
				</div>
				<a href="#three" class="goto-next scrolly">Next</a>
			</section>

			<!-- Three -->
			<section id="three" class="spotlight style3 left">
				<span class="image fit main bottom"><img src="images/nasa2-unsplash.jpg" alt="" /></span>
				<div class="content">
					<header>
						<h2>We love your feedback.</h2>
					</header>
					<p>Not meeting your expectations? Feel free to give us suggestions!</p>
					<ul class="actions">
						<li><a href="feedback.php" class="button">Roast us</a></li>
					</ul>
				</div>
				<a href="#five" class="goto-next scrolly">Next</a> 
			</section>

			<!-- Footer -->
     		 <footer id="footer">
				<ul class="icons">
					<li><a href="https://github.com/richag456/ecommerce-extraterrestrial" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="mailto:rg4wd@virginia.edu" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Extraterrestrial. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>