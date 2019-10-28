
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';
$db_connection = pg_connect("host=ec2-174-129-241-14.compute-1.amazonaws.com port=5432 dbname=d35s6fdts9mtqe user=crxjiiplfrwncf password=be7126872bcd36c2bc4bde1163ba5a72243fb144652c0e0b110d388e7efee0be");
// Check connection
if($db_connection === false){
    die("ERROR: Could not connect. ");
}
if( isset($_POST['Submit']) ){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$address = $_POST['address'];
	$city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipCode'];
	
	$getusers = pg_query($db_connection, "SELECT * FROM \"siteUsers\" where email='$email'");
	$getrows = pg_affected_rows($getusers);

	if($getrows >= 1){
		$txt = "User already exists! Please log in instead!.";
		echo  $txt ;
		
	}
	else{
		$query = "INSERT INTO \"siteUsers\" VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$address', '$city', '$state', '$zipcode')";
		$result = pg_query($db_connection, $query);
		
		$mail = new PHPMailer(TRUE);
		try{
	  	$mail->isSMTP();                                            // Send using SMTP
	  	$mail->Host 	  = 'smtp.gmail.com';                  // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 587;                                    // TCP port to connect to

		$mail->Username   = "ecomm.extraterrestrial@gmail.com";                     // SMTP username
		$mail->Password   = "AlfWeaver2019";                               // SMTP password

        $mail->setFrom('ecomm.extraterrestrial@gmail.com', 'Extraterrestrial');
        $mail->addAddress($email);
        $mail->Subject = 'Welcome to Extraterrestrial!';
        $mail->Body = 'Thanks for opening up your galaxy with Extraterrestrial. We look forward to working on your interplanetary needs!';
        $mail->send();
		
	}
	catch (Exception $e)
       {
          /* PHPMailer exception. */
          echo $e->errorMessage();
       }
       catch (\Exception $e)
       {
          /* PHP exception (note the backslash to select the global namespace Exception class). */
          echo $e->getMessage();
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
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="products.html">Products</a></li>
                            <li><a href="login.html" class="button primary">Login</a></li>
                        </ul>
                    </nav>
                </header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Sign Up</h2>
							<p>Create an Account to Start Your Journey Today!</p>
						</header>

						<!-- Content -->
							<section id="content">
                <a href="#" class="image fit"><img src="images/galaxy2.png"  alt="" /></a>
                
                <form id="signup" action="signup.php" method="POST"> 
                  First name: <input type="text" name="firstname" required pattern = "^[a-zA-Z]+$" value = ""  title = "At least one letter, nothing besides letters"> <br> 
                  Last name: <input type="text" name="lastname" required pattern = "^[a-zA-Z]+-*[a-zA-Z]*$" value = "" title = "At least one letter, nothing besides letters except for a hyphen"> <br> 
                  Email: <input type="text" name="email" required pattern = "^.+@+.+\.+.+$" value = "" title = "At least one @ symbol, at least one . symbol, at least one character, before, after, and between each symbol" > <br> 
				  Password: <input type = "text" name = "password" required> <br>
				  Address: <input type = "text" name = "address" required pattern = "^\d+.*[a-zA-Z]+$" value = "" title = "At least one number followed by at least one letter"> <br>
				  City: <input type = "text" name = "city" required pattern = "^[a-zA-Z]+$" value = "" title = "At least one letter, nothing besides letters"> <br>
				  State: <select name = "state" required>
							<option value = "">Make a Selection</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						 </select> <br>
				  Zip-Code <input type = "text" name = "zipCode" required pattern = "^\d{5}$" value = "" title = "Exactly 5 numbers, nothing else"> <br>
				  <input type="hidden" name="form_submitted" value="1" />
          
                  <input type="submit" name="Submit" value="Submit">

				  <p class="forgot"><a href="login.html">Already Have an Account? Login!</a></p>
                        
              </form>
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