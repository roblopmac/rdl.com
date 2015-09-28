<?php
	if ($_POST["submit"]) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = $_POST['human'];
		$from = 'RDLM Contact Form'; 
		$to = 'bpm.rubenlopez@gmail.com'; 
		$subject = 'Message from Contact RDLM ';
		$errCaptcha = "";
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//check the Captcha
		if (!$_POST['g-recaptcha-response']) {
			$errCaptcha = 'Are you a robot? ';
		}		
		
		

		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage && !$errHuman && !$errCaptcha) 
		{
			if (mail ($to, $subject, $body, $from)) 
			{
				$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
			} else {
					$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
				}
			}
		}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ruben Lopez - Contact</title>
    <meta name="description" content="Ruben Lopez, Software Developer located in Australia. Expert in BPM, Process Implementation and Systems Integration.">
    <meta name="author" content="Ruben Dario Lopez">
    <link rel="icon" href="bootstrap/docs/favicon.ico">

    <title>Ruben Dario Lopez - Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/dist/css/bootstrap-social.css" rel="stylesheet">
    <link href="bootstrap/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- custom style -->
	<link href="css/rdl-custom.css" rel="stylesheet">
	

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div id="div-navbar-wrapper" class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div id="menu-container" class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              	<a id="divSiteTitle" href="index.html">Ruben Dario Lopez</a><br/>
              	<a id="divTagLine" href="index.html" >Software Developer</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.html">Me</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="education.html">Education</a></li>
                <li class="active"><a href="contact.php">Contact Me</a></li>
                <li><a href="freetime.html">Free Time</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
</div>

<div id="decorative6" >
	    <div class="container">
	        <div class="divPanel headerArea">
	            <div class="row-fluid">
	                <div class="span12">
	                       <div id="headerSeparator"></div>

	                        <div id="divHeaderText" class="page-content">
								<br/>
								<br/>
	                            <div id="divHeaderLine2">"What you get by achieving your goals is not as important as what you become by achieving your goals." <br/> -Henry David Thoreau  </div><br />
	                        </div>
	
	                        <div id="headerSeparator2"></div>
	
	                </div>
	            </div>
	
	        </div>
	
	    </div>
</div>

<div id="content-separator-home"></div>

<div class="container">
	<hr>	
</div>

<div class="container">
		<div class="row-fluid">


  			<div class="col-md-6">

  				<h3 class="page-header">Send me a message</h3>
				
				<form class="form-horizontal" role="form" method="post" action="contact.php">
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
					
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>

					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<div class="g-recaptcha" data-sitekey="6LeBcgUTAAAAAN7W8iqND7ancXpFEE2WO1tWmUYh"></div>
							<?php echo "<p class='text-danger'>$errCaptcha</p>";?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>

				</form> 
			</div>
			
			
			<div class="col-md-6" style="padding-left:60px;">
  				<div class="row">                   
  				<h3 class="page-header">Contact me</h3>
  				<ul class="list-unstyled">
  				<li> <h4>Call Me :</h4> <br><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"> </span><span> Australia (+61) 406191412 </span></li>
  				<hr>
  				<li> <h4>More options:</h4>
  					<a class="btn btn-block btn-social btn-twitter" onclick="window.open('http://twitter.com/rubendariol')">
           			 <i class="fa fa-twitter"></i> Follow me on Twitter</a>
					<a class="btn btn-block btn-social btn-google-plus" onclick="window.open('https://plus.google.com/u/0/111743121626110304184/photos/p/pub')"">
					 <i class="fa fa-google-plus"></i>Check my wall in G+</a>
		        	<a class="btn btn-block btn-social btn-instagram" onclick="window.open('https://instagram.com/roblopmac/')">
		            <i class="fa fa-instagram"></i> Like this web photos? See more ! </a>
		            <a class="btn btn-block btn-social btn-linkedin" onclick="window.open('http://au.linkedin.com/in/rubendariolopez')">
			        <i class="fa fa-linkedin"></i>See my references here</a>
			        <a class="btn btn-block btn-social btn-pinterest" onclick="window.open('https://www.pinterest.com/lopez5339/')">
		            <i class="fa fa-pinterest"></i>My interests about IT</a>
			            
        			</li>
  				</ul>
  				
  				
  			</div>
  			</div>
		</div>
	</div> 


<div class="container"><hr></div>

<!-- FOOTER -->
 <footer>
      <div class="div-footer">
   					
	    			<p id="p-footer"><a style="color:lightblue;" href="#">Back to top</a> | <a style="color:lightblue;" href="contact.php">Contact Me</a></p>
	    			<div class="container">
	    				<a class="btn btn-social-icon btn-xs btn-twitter" onclick="window.open('http://twitter.com/rubendariol')"><i class="fa fa-twitter"></i></a>
						<a class="btn btn-social-icon btn-xs btn-google-plus" onclick="window.open('https://plus.google.com/u/0/111743121626110304184/photos/p/pub')"><i class="fa fa-google-plus"></i></a>
						<a class="btn btn-social-icon btn-xs btn-instagram" onclick="window.open('https://instagram.com/roblopmac/')"><i class="fa fa-instagram"></i></a>
						<a class="btn btn-social-icon btn-xs btn-linkedin" onclick="window.open('http://au.linkedin.com/in/rubendariolopez')"><i class="fa fa-linkedin"></i></a>
						<a class="btn btn-social-icon btn-xs btn-pinterest" onclick="window.open('https://www.pinterest.com/lopez5339/')"><i class="fa fa-pinterest"></i></a>
        			</div>
       				<br>
        			<p id="p-footer">All photos by <a target="_blank" href="http://500px.com/photorubenlopez">RDL Photo - ° </a></p>
        			<br>

        			<p id="p-footer">2015</p>
					<p id="p-footer">Ruben Dario Lopez</p>        			
      				
     </div>
 </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>
</html>
