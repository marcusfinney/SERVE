<?php 
ob_start();
session_start();
$topicID = $_GET["topicID"];
echo $topicID;
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
        <!-- quivee Style -->
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
<?php 
							//grabs value from blog-home and uses it to print specific article when selecting
							//Continue Reading>>
							echo $topicID;
		        			include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            $sql = "SELECT * 
									FROM Topic 
									WHERE topicID={$topicID}";
                                    
                            $mytopics = mysql_query($sql)or die('Invalid query: ' .mysql_error());
                            $numberoftopics = mysql_num_rows($mytopics); 
		        	    		if ($numberoftopics == 0) 
                            	{
                               	 	echo 'This article is blank...';
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
                            			$artParagraph = $row['paragraph'];
                            			$artTag = $row['tag'];

$artDisplay ='
		<div class="container blog">
		    <div class="row">
		        <section class="span8">
		            <div class="row">
		                <div class="span8 wrapper post">
		                    <img alt="image" class="media-object" src="til1.png">
		                    <div class="padding30">
		                        <div class="clearfix meta mar-t30">
		                            <p class="pull-left">Date:
		                                <a>'.$artDate.'</a></p>
		                            <a style="margin:5px;" class="pull-right btn btn-quivee">
		                                <i class="icon-comment"></i>'.$artCommentCount.' Comments
		                            </a>
                         			<a style="margin:5px;" class="pull-right btn btn-quivee">
		                                <i class="icon-tag"></i> Bookmark Post
		                            </a>
		                        </div>
		                        <h2 class="post-title">'.$artTitle.'</h2>
		                        <div class="author">
		                            <p>posted by:
		                                <a>'.$artAuthor.'</a>
		                                in 
		                                <a>'.$artSubject.'</a></p>
		                         <NYT_TEXT>
<div id="articleBody">
 
    <p>'.$artParagraph.'</p>


<NYT_AUTHOR_ID><div id="authorId"><p>'.$artAuthor.'</p></div></NYT_AUTHOR_ID>


<NYT_UPDATE_BOTTOM>
</NYT_UPDATE_BOTTOM>
</div>
</NYT_TEXT>
		                        </div>
		                    </div>
		                </div>';
		                }
		                echo $artDisplay;
		            }
		        ?>
		                <!-- .post -->
		                <div class="comment-container span8">
		                    <h3 class="serif italic">Comments, Notes and Discussion on <i><b><?php echo $artTitle; ?></b></i>:</h3>
		                    <div class="comments">
		                        <ul class="media-list">
		                            <li class="media">
		                                <a class="pull-left" href="#">
		                                    <img alt="" class="media-object comment-avatar img-circle" src="me1.png">
		                                </a>
		                                <div class="media-body">
		                                    <div class="comment-holder">
		                                        <div class="media-head clearfix row-fluid">
		                                            <div class="span10">
		                                                <h4 class="media-heading">Marcus Finney</h4>
		                                            </div>
		                                            <!--/span10-->
		                                            <div class="span2">
		                                                <a class="btn btn-quivee pull-right" href="#" title="">Reply</a>
		                                            </div>
		                                            <!--/span2-->
		                                        </div>
		                                        <!--/ media-head-->
		                                        <p class="serif italic comment-date">Date: 15 May 2012</p>
		                                        <div class="comment-body">
		                                            <p>
		                                                This is really NEAT material! When will this come into practice?
		                                            </p>
		                                        </div>
		                                        <!--/comment-body-->
		                                    </div>
		                                    <!--/comment-holder-->
		                                    <!--NESTED COMMENT STARTS-->
		                                    <div class="media">
		                                        <a class="pull-left" href="#">
		                                            <img alt="" class="media-object comment-avatar img-circle" src="sam1.png">
		                                        </a>
		                                        <div class="media-body">
		                                            <div class="comment-holder">
		                                                <div class="media-head clearfix row-fluid">
		                                                    <div class="span10">
		                                                        <h4 class="media-heading">Erik Peterson</h4>
		                                                    </div>
		                                                    <!--/span10-->
		                                                    <div class="span2">
		                                                        <a class="btn btn-quivee pull-right" href="#" title="">Reply</a>
		                                                    </div>
		                                                    <!--/span2-->
		                                                </div>
		                                                <!--/ media-head-->
		                                                <p class="serif italic comment-date">Date: 15 May 2012</p>
		                                                <div class="comment-body">
		                                                    <p>
		                                                       There is still a bit of time til you find a quantum computer in your house, but research is significantly picking up in the field!
		                                                    </p>
		                                                </div>
		                                                <!--/comment-body-->
		                                            </div>
		                                            <!--/comment-holder-->
		                                        </div>
		                                    </div>
		                                     
		                                    <!--NESTED COMMENT ENDS-->
		                                </div>
		                            </li>
		                            <li class="media">
		                                <a class="pull-left" href="#">
		                                    <img alt="" class="media-object comment-avatar img-circle" src="veg1.png">
		                                </a>
		                                <div class="media-body">
		                                    <div class="comment-holder">
		                                        <div class="media-head clearfix row-fluid">
		                                            <div class="span10">
		                                                <h4 class="media-heading">John Derby</h4>
		                                            </div>
		                                            <!--/span10-->
		                                            <div class="span2">
		                                                <a class="btn btn-quivee pull-right" href="#" title="">Reply</a>
		                                            </div>
		                                            <!--/span2-->
		                                        </div>
		                                        <!--/ media-head-->
		                                        <p class="serif italic comment-date">Date: 15 May 2012</p>
		                                        <div class="comment-body">
		                                            <p>
		                                                Although quantum computing is still in its infancy, experiments have been carried out in which quantum computational operations were executed on a very small number of qubits (quantum bits).[6] Both practical and theoretical research continues, and many national governments and military funding agencies support quantum computing research to develop quantum computers for both civilian and national security purposes, such as cryptanalysis.
		                                            </p>
		                                        </div>
		                                        <!--/comment-body-->
		                                    </div>
		                                    <!--/comment-holder-->
		                                </div>
		                            </li>
		                            <li class="media">
		                                <a class="pull-left" href="#">
		                                    <img alt="" class="media-object comment-avatar img-circle" src="kea1.png">
		                                </a>
		                                <div class="media-body">
		                                    <div class="comment-holder">
		                                        <div class="media-head clearfix row-fluid">
		                                            <div class="span10">
		                                                <h4 class="media-heading">Brian Reston</h4>
		                                            </div>
		                                            <!--/span10-->
		                                            <div class="span2">
		                                                <a class="btn btn-quivee pull-right" href="#" title="">Reply</a>
		                                            </div>
		                                            <!--/span2-->
		                                        </div>
		                                        <!--/ media-head-->
		                                        <p class="serif italic comment-date">Date: 15 May 2012</p>
		                                        <div class="comment-body">
		                                            <p>
		                                                Integer factorization is believed to be computationally infeasible with an ordinary computer for large integers if they are the product of few prime numbers (e.g., products of two 300-digit primes).
		                                                 By comparison, a quantum computer could efficiently solve this problem using Shors algorithm to find its factors. This ability would allow a quantum 
		                                                computer to decrypt many of the cryptographic systems in use today, in the sense that there would be a polynomial time (in the number of digits of the integer) algorithm for solving the problem. 
		                                            </p>
		                                        </div>
		                                        <!--/comment-body-->
		                                    </div>
		                                    <!--/comment-holder-->
		                                </div>
		                            </li>
		                        </ul>
		                    </div>
		                    <!-- .comments -->
		                </div>
		                <!-- .comment-container -->
		                <div class="comment-form span8">
		                    <h3 class="section-title">Leave a comment</h3>
		                    <form action="#" method="post">
		                        <div class="input-prepend">
		                            <span class="add-on">
		                                <i class="icon-user"></i>
		                            </span>
		                            <input class="span4" placeholder="Name" type="text">
		                        </div>
		                        <div class="input-prepend">
		                            <span class="add-on">
		                                <i class="icon-envelope"></i>
		                            </span>
		                            <input class="span4" placeholder="Email" type="text">
		                        </div>
		                        <div class="input-prepend">
		                            <span class="add-on">
		                                <i class="icon-link"></i>
		                            </span>
		                            <input class="span4" placeholder="Website" type="text">
		                        </div>
		                        <textarea class="span6" placeholder="Your comment" rows="7"></textarea>
		                        <div class="clearfix row mar-b60">
		                            <button class="btn span2 btn-quivee btn-large" type="submit">Submit</button>
		                        </div>
		                    </form>
		                </div>
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
	                            <a href="index.php" title="title">Sign Out</a></li>
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
		                        <p>Update your strengths in your profile to show others what your good at, and how to help you with as much detail as possible...</p>
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
							<a href="#" class=""><h1>SERVE. </h1></a>
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
    </body>
</html>