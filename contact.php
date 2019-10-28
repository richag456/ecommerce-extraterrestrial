<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';
if( isset($_POST['submit']) ){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	$mail = new PHPMailer(TRUE);
	try{
	$mail->isSMTP();                                            // Send using SMTP
	$mail->Host 	  = 'smtp.gmail.com';                  // Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port       = 587;                                    // TCP port to connect to

	$mail->Username   = "ecomm.extraterrestrial@gmail.com";                     // SMTP username
	$mail->Password   = "AlfWeaver2019";                               // SMTP password

    $email_to_send = "ecomm.extraterrestrial@gmail.com";
    $mail->setFrom($email_to_send, 'Contact Form Response');
    $mail->addAddress($email_to_send);
    $mail->Subject = 'Contact Form Response';
    $mail->Body = 'New contact form response from ' .$email. ' with message: ' .$message. '';
    $mail->send();
		
	}
	catch (Exception $e)
       {
          /* PHPMailer exception. */
          #echo $e->errorMessage();
       }
       catch (\Exception $e)
       {
          /* PHP exception (note the backslash to select the global namespace Exception class). */
          #echo $e->getMessage();
 	  }
		
	}

?>


<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Contact</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
                    <h2>Contact Us</h2>
                    <p>Reach out and we'll get back to you as soon as possible!</p>
                </header>

                <!-- Content -->
                <section id="content">
                    <a href="#" class="image fit"><img src="images/galaxy3.png" alt="" /></a>
                    <!-- insert the page content here -->
                    <h1>Contact Us</h1>
                    <form action="#" method="post">
                        <div class="form_settings">
                            <p><span>Name</span><input class="contact" type="text" name="name" required pattern = "^[a-zA-Z]+\h*[a-zA-Z]*$" value = ""  title = "At least one letter, nothing besides letters" /></p>
                            <p><span>Email Address</span><input class="contact" type="text" name="email" required pattern = "^.+@+.+\.+.+$" value = "" title = "At least one @ symbol, at least one . symbol, at least one character, before, after, and between each symbol" /></p>
                            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50"
                                    name="message"></textarea></p>
                            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit"
                                    name="submit" value="submit" /></p>
                        </div>
                    </form>
                    </li>
                    </ul>
                </section>

            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="https://github.com/richag456/ecommerce-extraterrestrial"
                        class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="mailto:rg4wd@virginia.edu" class="icon solid alt fa-envelope"><span
                            class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Extraterrestrial. All rights reserved.</li>
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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