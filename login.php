<?php
session_start();
//Load composer's autoloader
require 'vendor/autoload.php';
$db_connection = pg_connect("host=ec2-174-129-241-14.compute-1.amazonaws.com port=5432 dbname=d35s6fdts9mtqe user=crxjiiplfrwncf password=be7126872bcd36c2bc4bde1163ba5a72243fb144652c0e0b110d388e7efee0be");
// Check connection
if($db_connection === false){
    die("ERROR: Could not connect. ");
}
if( isset($_POST['Submit']) ){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $getuser = pg_query($db_connection, "SELECT * FROM \"siteUsers\" where email='$email'");
	$getrows = pg_affected_rows($getusers);

    if($getrows < 1){
		$txt = "<center><br><br><br><h3>No account found, sign up instead!</h3></center>";
        echo  $txt ;
    }
    else{
        //command to get hashed password
			$db_password = $getuser->fetch_assoc()["passwordhash"];
            //$db_password = $row['passwordhash'];
            if(strcmp($db_password, $hashed_password) == 0){
                //user inputed correct password
                $txt = "<center><br><br><br><h3>Welcome back!</h3></center>";
                echo  $txt ;
				$_SESSION['isLogged'] = true; //set session variable
                header('Location: memberHome.php');
		        exit();
            }
            else{
                $txt = "<center><br><br><br><h3>Email or password incorrect, please try again!</h3></center>";
                echo  $txt ;
            }
        

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
		<title>Login Or Sign Up</title>
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
                  <li><a href="login.html" class="button primary">Login</a></li>
              </ul>
          </nav>
      </header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Login</h2>
							<p>Welcome Back! Login to Continue Your Journey Today!</p>
						</header>

						<!-- Content -->
							<section id="content">
								<a href="#" class="image fit"><img src="images/galaxy2.png"  alt="" /></a>
								<div class="form">                      
                      <div id="login"> 
						<form id="login" action="login.php" method="POST"> 
							Email: <input type="text" name="email"> <br> 
							Password:<input type="text" name="password"> 
				  
							<input type="hidden" name="form_submitted" value="1" />
							
							<input type="submit" value="Submit">  
                        
                        <p class="forgot"><a href="#">Forgot Password?</a></p>
                        <p class="forgot"><a href="signup.php">Dont Have an Account? Sign Up!</a></p>
                    <!--    <button class="button button-primary">Log In</button>-->
                        
                        </form>
              
                      </div>                    
              </div> <!-- /form -->
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