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

if( isset($_POST['SubmitCode']) ){
	$user_input = $_POST['code'];
	echo"<br><br><br>pressed";
	echo "<br><br><br><br>",$user_input;
	if(strcmp($user_input, "YEET") == 0){
		echo "<br><br><br>comp done";
		$_SESSION['discountMars'] = true;
		header('Location: mars-trip-discount.php');
		exit();
	}
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
		<title>Round-Trip Moon Excursion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
      <header id="header">
          <img src="images/extraterrestrial-logo-transparent.png" style="margin-top: 5px; margin-right: 5px" width="70" height="50"/>
          <h1 id="logo" style="margin-left:50px"><a href="index.html">Extraterrestrial</a></h1>
          <nav id="nav">
              <ul>
                  <li><a href="index.html">Home</a></li>
				  <li><a href="memberHome.php">Members</a></li>
                  <li>
                      <a href="about.html">About Us</a>
                  </li>
				  <li><a href="contact.php">Contact Us</a></li>
				  <li><a href="products.html">Products</a></li>
              </ul>
          </nav>
      </header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">

						<!-- Content -->
						<section id="content">
							<div class="row">
								<div class="col-4 col-12-xsmall">
									<figure>
										<center><img src="images/mars.jpg" width="400" height="400" alt="Image" class="img-fluid"></center>
									</figure>
									<a href="products.html" class="button primary fit">Return to Products</a>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="px-4">
											<h3><a href="#">Mars Venture</a></h3>
											<ul class="alt">
												<li>
														Visit Mars today! Experience the mysteries and magic of Earth's most friendly neighbor planet.
													<h4>Details:</h4>
													<ul>
														<li>Includes round-trip space travel at a great price.</li>
														<li>Does NOT include food or lodging.</li>
													</ul>
												</li>
												<li>0.010 BTC</li>
												<form action = "mars-trip.php" method = "POST">
													<div class = "row">
														<div class = "column">
																<input type="text" name = "code" value = "Enter Promo Code">
														</div>
														<div class = "column" style="padding:10px">
																<input type="hidden" name="form_submitted" value="1" />
																<input type="submit" name="SubmitCode" value="Apply Code">
														</div>
													</div>
													<div class = "row">
														<div class = "column">
															<form action="https://test.bitpay.com/checkout" method="post">
																<input type="hidden" name="action" value="checkout" />
																<input type="hidden" name="posData" value="" />
																<input type="hidden" name="data" value="J1lYV+byihsEl55U2HGD2t0AP6dLRKTnE2SQCmP3OVK8CT75S8U0hvGLPzaQUYpNsiyoZ7spHBM1WgtaQuRk2gbRAV6y3igSv3vtUBtrL2GdS8IUarTzlv7wuTlj4cWnIruvdE+WmOV8NQ7kD9ySRQ==" />
																<input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px" alt="BitPay, the easy way to pay with bitcoins.">
															</form>	
														</div>
														<div class = "column" style="padding:10px">
															<iframe frameBorder="0" scrolling="no" allowtransparency="0" src="https://bitcoinaverage.com/en/widgets?widgetType=conversion&bgcolor=#FFFFFF&bwidth=1&bcolor=#CCCCCC&cstyle=round&fsize=16px&ffamily=arial&fcolor=#000000&bgTransparent=solid&chartStyle=none&lastUpdateTime=none&currency0=USD&total=1" style="width:250px; height:275px; overflow:hidden; background-color:transparent !important;"></iframe>
														</div>
													</div>
												</form>
											</ul>
									</div>
								</div>
							</div>
						</section>

						
					</div>
				</div>

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
		</div>

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