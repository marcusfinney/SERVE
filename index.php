<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SERVE.</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="DataDoc" name="description">
        <meta content="playlab" name="author">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    	<!-- Styles -->
    	<link href="css/bootstrap.css" rel="stylesheet">
   		<link rel="stylesheet" type="text/css" href="css/theme.css">
    	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

   	 	<link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection">
    	<link rel="stylesheet" href="css/sign-in.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'> 
        <!-- Bootstrap  -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Font Awesome  -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- iLightbox -->
        <link rel="stylesheet" type="text/css" href="css/ilightbox.css"/>
        <link rel="stylesheet" type="text/css" href="dark-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="light-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="mac-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="metro-black-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="metro-white-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="parade-skin/skin.css"/>
        <link rel="stylesheet" type="text/css" href="smooth-skin/skin.css"/>
        <!-- Isotope Style -->
        <link rel="stylesheet" type="text/css" href="css/isotope.css"/>
        <!-- Flex slider -->
        <link rel="stylesheet" type="text/css" href="css/flexslider.css"/>
        <!-- Pie chart css -->
        <link rel="stylesheet" type="text/css" href="css/jquery.easy-pie-chart.css">
        <!-- DataDoc Style -->
        <link href="css/colors.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet"> 
        
        <!-- Favicon and touch icons  -->
        <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="ico/favicon.png" rel="shortcut icon">
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
      	<script src="js/html5shiv.js"></script>
    	<![endif]-->
    	
    </head>
    <body class="page-red hidden-body">

		<!-- Navigation -->
		<header>
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1 class=""><a class="brand" href="#"><h2>SERVE.</h2></a></h1>
						<div class="nav-collapse collapse">
							<ul class="nav pull-right">
							</ul>
						</div>
					</div>
				</div>
			</div><!-- .navbar -->
		</header>
		
		<!-- Home -->
		<section id="first" class="home text-center bg1 fullheight">
			<a class="anchor" id="row1"></a>
			<div class="headline-wrapper fullheight">
				<div id="sign_in2">
        <div class="container">
            <div class="section_header">
                <!--<h3>Sign in</h3>-->
            </div>
     <div id="sign_in2">
        <div class="container">
            <div class="section_header">
                <!--<h3>Sign in</h3>-->
            </div>
            <div class="row login">
                <div class="span12 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">                                                          
                            </div>
								<h3>Welcome to <font color="black"><i> SERVE.</i></font></h3>
                            <div class="division">
                                <div class="line l"></div>
                                <span>Sign-In</span>
                                <div class="line r"></div>
                            </div>
                            <!-- SIGN IN FORUM -->
                            <div class="form">
                                <form method="post" action="checklogin.php">
                                    <div>
                                    <input type="text" placeholder="Username" id="username" name="username" required>
                                    <input type="password" placeholder="Password" id="password" name="password" required>
                        			<div>
                        			<?php
                           			 if ($_GET and $_GET["error"] == "incorrectlogin") 
                           			 	{
                              			  echo '<p class="label label-important fadeIn">Incorrect username and/or password.</p><br>';
                           				}
                        			?>
                        			</div>                                  
                                    <div class="forgot">
                                        <span>Having Issues?</span>
                                        <font color="blue"><a href="sign-up.html"><i>Forgot Password?</i></a></font><br>
                                        <font color="blue"><a href="sign-up.html"><i>Sign Up for SERVE.</i></a></font>
                                    </div>
                                    	<input class="span4" type="submit" name="sign in" value="Login">
                                </form><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

		
		         
	    <!-- Javascript  -->
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
	    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
	    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="js/waypoints.min.js"></script>
	    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	    <script type="text/javascript" src="js/ilightbox.packed.js"></script>
	    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	    <script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script> 
	    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script> 
	    <script type="text/javascript" src="js/jpreLoader.js"></script>
	    <script type="text/javascript" src="js/custom.js"></script>
	    
	    <?php
	    if (isset($_GET))
            {
                if (isset($_GET["error"]) and $_GET["error"] == "unauthorized")
                {
                    echo '<script>alert("You are not currently logged in. Please log in or create an account...")</script>';
                }
            }
        ?>
	    
    </body>
</html>