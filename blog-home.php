<?php 
session_start();
ob_start(); 

if (!isset($_SESSION['username']))
{
    header("Location: index.php?error=unauthorized");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SERVE.</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="quivee" name="description">
        <meta content="playlab" name="author">
        
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'> 
        <!-- Bootstrap  -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Font Awesome  -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Revolution Responsive jQuery Slider -->
        <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
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
        <!-- iView Style -->
        <link rel="stylesheet" type="text/css" href="css/iview.css"/>
 		<!-- Isotope Style -->
        <link rel="stylesheet" type="text/css" href="css/isotope.css"/>
        <!-- Flex slider -->
        <link rel="stylesheet" type="text/css" href="css/flexslider.css"/>
        <!-- Pie chart css -->
        <link rel="stylesheet" type="text/css" href="css/jquery.easy-pie-chart.css">        <!-- quivee Style -->
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
    <body class="page-aqua">

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
		

		<div class="container blog">
		    <div class="row">
		        <section class="span8">
		            <div class="row">
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="bio1.jpeg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30 mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 4 Comments
		                            </a>
		                        </div>
		                        <!--<h2 class="post-title">New Native Shrubs Show Promise for Landscape, Nursery Industries</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Ronald Row</a>
		                                in 
		                                <a>Biology</a></p>
		                        </div>
		                        -->
		                        <p>Scientists studied softwood stem cutting propagation of four underused shrub species native to the northeastern United States. 
		                        The results indicated that two of these could be propagated for ...
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="#">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="cs1.jpg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 12 Comments
		                            </a>
		                        </div>
		                        <h2 class="post-title">Quantum Computing</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Karen Stein</a>
		                                in 
		                                <a>Computer Science</a></p>
		                        </div>
		                        <p>A quantum computer is any device for computation that makes direct use of distinctively quantum mechanical phenomena,
		                         such as superposition and entanglement, to perform operations on data. In a ...
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="article-form.php">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="mat1.jpg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 2 Comments
		                            </a>
		                        </div>
		                        <h2 class="post-title">Mobius Strip</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Gerald Fitz</a>
		                                in 
		                                <a>Mathematics</a></p>
		                        </div>
		                        <p>The Möbius strip or Möbius band is a surface with only one side and only one boundary component. 
		                        It has the mathematical property of being non-orientable. It is also a ruled surface. It was ...
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="#">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="hist1.jpg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 4 Comments
		                            </a>
		                        </div>
		                        <h2 class="post-title">The True Value of Columbus's Voyages</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Thomas Kean</a>
		                                in 
		                                <a>History</a></p>
		                        </div>
		                        <p>Columbus may have left a contentious legacy, but there's no denying his voyages expanded the 
		                        boundaries of European knowledge. 
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="#">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="lit1.jpg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 7 Comments
		                            </a>
		                        </div>
		                        <h2 class="post-title">Topping Shakespeare? Aspects of the Nobel Prize for Literature</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Richard Brown</a>
		                                in 
		                                <a>Literature</a></p>
		                        </div>
		                        <p>It has been asked how it may be determined whether one kind of literature is more ideal than another...
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="#">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                
		                <div class="post wrapper row-fluid">
		                    <a class="overlay span4" href="#">
		                        <span class="hover">View post</span>
		                        <img alt="image" class="media-object" src="phy1.jpg">
		                    </a>
		                    <div class="span8 post-content">
		                        <div class="clearfix meta mar-t30">
		                            <p class="serif italic pull-left">Date:
		                                <a>15 May 2012</a></p>
		                            <a class="btn btn-quivee pull-right">
		                                <i class="icon-comment"></i> 1 Comments
		                            </a>
		                        </div>
		                        <h2 class="post-title">Topological Light: Living On the Edge</h2>
		                        <div class="author">
		                            <p class="serif italic">posted by:
		                                <a>Javhid Simons</a>
		                                in 
		                                <a>Physics</a></p>
		                        </div>
		                        <p>Scientists report the first observation of topological effects for light in two dimensions, 
		                        analogous to the quantum Hall effect for electrons. To accomplish this, they built a structure ... 
		                        </p>
		                        <p class="read-more"><a class="btn btn-quivee" href="#">Continue Reading
		                            &raquo;</a></p>
		                    </div>
		                </div>
		                <!-- .post -->
		                
		                <!-- .post -->
		            </div>
		            <!-- .row -->
		        </section>
		        <!-- .span8 -->
		        <aside class="span4 wrapper">
		            <div class="widget widget-wrapper">
		            <!--<a class="ilightbox-member-1" href="team-member-1.html" title="team member">
										<span class="hover">View full profile</span>
										<img src="images/team1.png" alt="image" />
									</a>-->	
								<div class="member-description">
									<img alt="" class="media-object comment-avatar img-circle pull-right" src="me1.png"><br>
									<h4 class="member-name">Marcus Finney</h4>

									<p class="member-role">Fulton - Computer Science SE</p>
									<p>I am currently a senior attending ASU studying Software Engineering. I'm a Michigan native, and my favorite movie is the Matrix.</p>
									<ul class="unstyled inline">
										<li><a href="#" title=""><i class="icon-twitter"></i></a></li>
										<li><a href="#" title=""><i class="icon-linkedin"></i></a></li>
										<li><a href="#" title=""><i class="icon-google-plus-sign"></i></a></li>
									</ul>
									------------------------------------------------
								</div>
	                    <ul>
	                        <li>
	                            <i class="icon-caret-right"></i>
	                            <a class="ilightbox-member-1" href="profile.html" title="team member">View Profile</a></li>
	                        <li>
	                            <i class="icon-caret-right"></i>
	                            <a href="blog-home.php" title="title">Home</a></li>
	                        <li>
	                            <i class="icon-caret-right"></i>
	                            <a href="#" title="title">Bookmarks</a></li>
	                        <li>
	                            <i class="icon-caret-right"></i>
	                            <a href="#" title="title">Edit Information</a></li>
	                        <li>
	                            <i class="icon-caret-right"></i>
	                            <a href="logout.php" title="title">Sign Out</a></li>
	                    </ul>
		            </div>
		            <!-- .widget -->
		            <div class="widget">
		                <div class="tabbable">
		                    <!-- Only required for left/right tabs -->
		                    <ul class="nav nav-tabs">
		                        <li class="active"><a href="#tab1" data-toggle="tab">Classes</a></li>
		                        <li><a href="#tab2" data-toggle="tab">Popular</a></li>
		                    </ul>
		                    <div class="tab-content">
		                        <div class="tab-pane active" id="tab1">
		                            <ul>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">Biology</a></li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">Physics</a></li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">C++
		                                    </a>
		                                </li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">American Literature
		                                    </a>
		                                </li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">US History After WWII</a></li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">Computer Literacy
		                                    </a>
		                                </li>
		                                <li>
		                                    <i class="icon-caret-right"></i>
		                                    <a href="#" title="title">Calculus III for Engineers	</a></li>
		                            </ul>
		                        </div>
		                        <div class="tab-pane" id="tab2">
		                            <ul>
		                                <li class="clearfix row-fluid comment">
		                                    <div class="pull-right span12">
		                                        <a href="#" title="title">Lorem ipsum dolor sit amet</a>
		                                        <p>Abore et dolore magna aliqua adipisicing elit seddo.</p>
		                                    </div>
		                                </li>
		                                <li class="clearfix row-fluid comment">
		                                    <div class="pull-right span12">
		                                        <a href="#" title="title">Duis suscipit venenatis</a>
		                                        <p>Abore et dolore magna aliqua adipisicing elit seddo.</p>
		                                    </div>
		                                </li>
		                                <li class="clearfix row-fluid comment">
		                                    <div class="pull-right span12">
		                                        <a href="#" title="title">Etiam aliquet aliquam</a>
		                                        <p>Abore et dolore magna aliqua adipisicing elit seddo.</p>
		                                    </div>
		                                </li>
		                                <li class="clearfix row-fluid comment">
		                                    <div class="pull-right span12">
		                                        <a href="#" title="title">Cras venenatis pellentesque</a>
		                                        <p>Abore et dolore magna aliqua adipisicing elit seddo.</p>
		                                    </div>
		                                </li>
		                                <li class="clearfix row-fluid comment">
		                                    <div class="pull-right span12">
		                                        <a href="#" title="title">In tempus venenatis</a>
		                                        <p>Abore et dolore magna aliqua adipisicing elit seddo.</p>
		                                    </div>
		                                </li>
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Show Your Strengths!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-briefcase icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Update your strengths in you profile to show others what your good at, and how to help you with as much detail as possible...</p>
		                        <a href="#" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Edit Your Profile!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-cogs icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Edit your profile to let your peers know a little about you! Having a biography lets others know a bit about you, and answer you according to your strengths...</p>
		                        <a href="#" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Connect With Your Classmates!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-move icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Use <i>SERVE.</i> to find your classmates and connect with them. Post a topic about something you're confused on a wait for answers to flood in!</p>
		                        <a href="#" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Post a Topic!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-thumbs-up icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Post a topic and allow your peers, tutors and teachers on <i>SERVE.</i> help you find a solution...</p>
		                        <a href="#" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Discussions</h3>
		                <ul>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Psychology Exam Prep</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Improving Local Sustainability Project</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Need to Know for First Interview</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">C++ Coding</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Mobile Development Discussion</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Who's excited about Calculus?</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Deeper Meaning of Alice in Wonderland...</a></li>
		                </ul>
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Most commented articles</h3>
		                <ul>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Solving Calculus II Integrals Rules</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Static Vs. Dynamic Programming</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">What will work in Java, but not in C++?</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Vectors and Calc II Practice Problems</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Isaac Newtons Impact on Gravity</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Philosophy: How do we define real?</a></li>
		                    <li>
		                        <i class="icon-caret-right"></i>
		                        <a title="title" href="#">Derivatives Short Cut!</a></li>
		                </ul>
		            </div>
		        </aside>
		        <!-- .span4 -->
		    </div>
		    <!-- .row -->
		</div><!-- .blog -->
					
		<!-- Footer -->
		<footer >
			<div class="wrapper bg-colored">
				<div class="container text-center">
					<div class="row">
						<div class="span12">
							<a href="#" class=""><h1>SERVE.	</h3></a>
							<ul class="unstyled inline footer-icons">
								<li><a class="full-rounded" href="#" title="social"><i class="icon-twitter"></i></a></li>
								<li><a class="full-rounded" href="#" title="social"><i class="icon-facebook"></i></a></li>
								<li><a class="full-rounded" href="#" title="social"><i class="icon-linkedin"></i></a></li>
								<li><a class="full-rounded" href="#" title="social"><i class="icon-dribbble"></i></a></li>
								<li><a class="full-rounded" href="#" title="social"><i class="icon-pinterest"></i></a></li>
								<li><a class="full-rounded" href="#" title="social"><i class="icon-github"></i></a></li>
							</ul>
							<p>&copy; 2013</p>
						</div>
					</div>
				</div>
			</div>		
		</footer>		
		         
	    <!-- Javascript  -->
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
	    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
	    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="js/waypoints.min.js"></script>
	    <script type="text/javascript" src="js/raphael.2.1.0.min.js"></script>
	    <script type="text/javascript" src="js/justgage.1.0.1.min.js"></script>
	    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	    <script type="text/javascript" src="js/ilightbox.packed.js"></script>
	    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	    <script type="text/javascript" src="js/iview.min.js"></script>
	    
	    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	    <script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script> 
	    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script> 
	    <script type="text/javascript" src="js/jpreLoader.js"></script>
	    <script type="text/javascript" src="js/custom.js"></script>
	    </body>
</html>