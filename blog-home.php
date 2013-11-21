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
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
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
		        <!-- This area creates the list of articles for the selected field type (eg. Biology) -->
		        
		        	<!-- =============Article Feed Query Call============= -->
		        	<?php 
		        	
		        			include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            $sql = "SELECT * 
                                    FROM Topic
                                    ";
                            $mytopics = mysql_query($sql)or die('Invalid query: ' .mysql_error());
                            $numberoftopics = mysql_num_rows($mytopics); 
		        	    		if ($numberoftopics == 0) 
                            	{
                               	 	echo 'No Topics';
                            	}
                            	else
                            	{
                            	//set up with arrays so database prints in reverse(most recent) 
                            		$topiccount = 0;
                            		while ($row = mysql_fetch_assoc($mytopics)) 
                            		{
                            			$artDate = $row['date'];
                            			$artImage = $row['image'];
                            			$artCommentCount = $row['commentNum'];
                            			$artTitle = $row['title'];
                            			$artAuthor = $row['author'];
                            			$artSubject = $row['subject'];
                            			$artSummary = $row['summary'];
                            			$artTag = $row['tag'];
		              				  	$artDisplay[$topiccount] = 
		            						'<div class="row">
		                						<div class="post wrapper row-fluid">
													<a class="overlay span4" href="#">
		                        						<span class="hover">View post</span>
		                        							<img alt="image" class="media-object" src="'.$artImage.'">
		                    						</a>
		                    						<div class="span8 post-content">
		                        						<div class="clearfix meta mar-t30 mar-t30">
		     						                       <p class="serif italic pull-left">Date:
		                            						    <a>'.$artDate.'</a></p>
		       						                     <a class="btn btn-quivee pull-right">
		                            						    <i class="icon-comment"></i> '.$artCommentCount.' Comments
		    							                    </a>
		            						            </div>
		                 						       <h2 class="post-title">'.$artTitle.'</h2>
		    						                    <div class="author">
		   						                         <p class="serif italic">posted by:
		                 						               <a>'.$artAuthor.'</a>
		                     						           in 
		                 						               <a>'.$artSubject.'</a></p>
		                      							  </div>
		                						        <p>'.$artSummary.'
		            						            </p>
		         						               	<form method="post" action="viewPost.php">
		         						               		<input type="hidden" id="tag" name="tag" value="'.$artID.'">
                 						                   	<input class="btn btn-quivee span4" type="submit" name="sign in" value="Continue Reading &raquo;">
		        						                </form>
		       								         </div>
		                   						 <p> &nbsp;tags:&nbsp;'.$artTag.'</p>
		              						  </div>';		                
		             				   $topiccount++;
		                			}
		                		}
		                		
		                		//to make the articles print by most recent
		                		$i=0;
		                		$i = $topiccount;
		                		while($i>0)
		                		{
		                			$i--;
		                			echo $artDisplay[$i];
		                		}
		                ?>
		                			
		                		                
		        </section>
		        <!-- .span8 -->
		        <aside class="span4 wrapper">
		            <div class="widget widget-wrapper">
								<div class="member-description">
									<img alt="" class="media-object comment-avatar img-circle pull-right" src="me1.png"><br>
									<h4 class="member-name">Marcus Finney</h4>

									<p class="member-role">Fulton - Computer Science SE</p>
									<p>I am currently a senior attending ASU studying Software Engineering. I'm a Michigan native, and my favorite movie is the Matrix.</p>
									<ul class="unstyled inline">
										<li><a href="#myModal" role="button" class="" data-toggle="modal" title=""><i class="icon-list-alt"></i></a></li>
										<li><a href="#" title=""><i class="icon-twitter"></i></a></li>
										<li><a href="#" title=""><i class="icon-linkedin"></i></a></li>
										<li><a href="#" title=""><i class="icon-google-plus-sign"></i></a></li>
									</ul>
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
		            
		            

		            
					<!-- Modal -->
					<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="createTopic.php" style="height:510px;">
  						<div class="modal-header" style="background-color: black;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Add a New Topic!</font></h3>
						</div>
  						<div class="modal-body" style="text-align: center">
 							<input class="span5" type="text" placeholder="Title" name="title" required>
 							<input class="span5" type="text" value="<?php echo $_SESSION["userrecord"]["firstName"].' '.$_SESSION["userrecord"]["lastName"]; ?>" name="author" required>
 							<input class="span5" type="text" placeholder="Subject" name="subject" required>
							<textarea class="span5" style="height:270px; text-align: top" type="text" placeholder="Write your post..." name="summary" required></textarea>
						</div>
  						<div class="modal-footer" style="background-color: black;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    						<button type="submit" class="btn btn-inverse">Submit</button>
  						</div>
  						</form>
					</div>
					
			        <!-- .widget -->
		            <div class="widget widget-wrapper">
		                <h3>Make a New Topic</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-list-alt icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Create a new topic for users to view!</p>
		                        <a  href="#myModal" role="button" class="" data-toggle="modal" title="">Continue &raquo;</a>
		                    </div>
		                </div>
		        	<!-- .clearfix -->
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