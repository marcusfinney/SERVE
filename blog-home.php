<?php 
session_start();
ob_start(); 


if (!isset($_SESSION['username']))
{
    header("Location: index.php?error=unauthorized");
    die();
}
$tagID = $_GET["tagID"];
$classAbbr = $_GET["classAbbr"];
$classNum = $_GET["classNum"];
$search = $_GET["search"];
$subID = $_GET["subID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$query = "SELECT *
        	FROM Tags
        	WHERE tagID='{$tagID}'";
        	
$loadByTag = mysql_query($query)or die('Invalid query: ' .mysql_error());
while($load = mysql_fetch_assoc($loadByTag))
{
	$tagName = $load['tagName'];
}

$query = "SELECT *
        	FROM Tags
        	WHERE tagName='{$tagName}'";
        	
$loadByTag = mysql_query($query)or die('Invalid query: ' .mysql_error());
while($load = mysql_fetch_assoc($loadByTag))
{
	$tagSum = $load['tagSum'];
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
	    <!--<script type="text/javascript" src="js/jpreLoader.js"></script>-->
	    <script type="text/javascript" src="js/custom.js"></script>
	     
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
						<h1 class=""><a class="brand" href="blog-home.php"><h2>SERVE.asu</h2></a></h1>
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
		        <!-- This area creates the list of articles for the selected field type (eg. Biology) -->
		        	<!-- =============Article Feed Query Call============= -->
		        	<?php 
		        			include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                                
                                $sql = "SELECT * 
                                    	FROM Topic
                                    	ORDER BY topicID DESC";
                                if (isset($_GET))
            					{
                					if(isset($_GET["tagID"]))
                					{
                						$sql = "SELECT *
       											FROM Topic
								 				INNER JOIN Tags
         										ON Topic.topicID = Tags.topicID
      											WHERE Tags.tagName = '{$tagName}'
      											ORDER BY Topic.topicID DESC"; 
                					}
                					if(isset($_GET["classAbbr"]))
                					{
                						$sql = "SELECT *
       											FROM Topic
								 				INNER JOIN Tags
         										ON Topic.topicID = Tags.topicID
      											WHERE Tags.tagName = '{$classAbbr}'
      											AND Tags.tagNum = '{$classNum}'
      											ORDER BY Topic.topicID DESC"; 
                					}
                					if(isset($_GET["search"]))
                					{
                						$sql = "SELECT *
       											FROM Topic
      											WHERE title LIKE '%".$search."%'
      											ORDER BY topicID DESC";
                					}
                					if(isset($_GET["subID"]))
                					{
                						$sql = "SELECT *
       											FROM Topic
      											WHERE subID='{$subID}'
      											ORDER BY topicID DESC";
                					}
                				}

                            $mytopics = mysql_query($sql)or die('Invalid query: ' .mysql_error());
                            $numberoftopics = mysql_num_rows($mytopics); 
		        	    		if ($numberoftopics == 0) 
                            	{
                               	 	echo '<br><br>No Topics Available...';
                            	}
                            	else
                            	{
                            	//set up with arrays so database prints in reverse(most recent) 
                            		$topiccount = 0;
                            		while ($row = mysql_fetch_assoc($mytopics)) 
                            		{
                            			$artID = $row['topicID'];
                            			$artStud = $row['studentID'];
                            			$artDate = $row['date'];
                            			$artImage = $row['image'];
                            			$artCommentCount = $row['commentNum'];
                            			$artTitle = $row['title'];
                            			$artAuthor = $row['author'];
                            			$artSubject = $row['subID'];
                            			$artSummary = $row['summary'];
                            			$artParagraph = $row['paragraph'];
                            			$artTag = $row['tag'];
                            			$tags="";
                            			$delete = "";
                            			
                            			if($_SESSION["userrecord"]["studentID"] == $artStud)
                            			{
                            				$delete = '<a class="scroll-link" href="#deleteThis'.$artID.'" data-toggle="modal"><button class="btn btn-danger pull-right" 
                            				style="margin-left:4px;" type=""><i class="icon-remove icon-white"></i> Delete Topic</button></a>
                            				
                    <!-- Delete Topic Modal -->
					<div id="deleteThis'.$artID.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="deleteTopic.php" style="height:100px;">
  						<div class="modal-header" style="background-color: black; text-align: center;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Are You Sure?</font></h3>
						</div>
  						<div class="modal-body" style="text-align: center;">
		                    <input class="span5" type="hidden" value="<?php echo $artID; ?>" name="topicID">
		                    <h3><i>Pressing "Yes" will delete this topic: '.$artTitle.'. . . </i></h3>
						</div>
  						<div class="modal-footer" style="background-color: black; text-align: center">
    						<button class="btn btn-danger span1 pull-right" style="margin-left:2px;" data-dismiss="modal" aria-hidden="true">No</button>
    						<button class="btn btn-success span1 pull-right" style="margin-right:2px;" type="submit" >Yes</button>
  						</div>
  						</form>
					</div>';
                            			}
                            			
                            			$sql2 = "SELECT * 
                                    			FROM Tags
                                    			WHERE summary='{$artSummary}'";
                                    	
                                    	$mytags = mysql_query($sql2)or die('Invalid query: ' .mysql_error());
                            			$numberoftags = mysql_num_rows($mytags);
                            			$tagcount = 0;
                            			if($numberoftags == 0)
                            			{
                            				$tags = 'No tags set for this article...';
                            			}
                            			else
                            			{
                            				while($tag = mysql_fetch_assoc($mytags))
                            				{
                            					$tagID = $tag['tagID'];
                            					$tsum = $tag['summary'];
                            					$ttagName = $tag['tagName'];
                            					
                            					$tagDisplay[$tagcount] = '<a href="blog-home.php?tagID='.$tagID.'" style="">['.$ttagName.']</a>';
                            					$tagcount++;
                            				}
                            				
                            				$i = 0;
		                					while($i<$tagcount)
		                					{
		                						$tags = $tags.' '.$tagDisplay[$i];
		                						$i++;
		                					}
                            			}
                            			
                            			$sql3 = "SELECT * 
                                    			FROM Subject
                                    			WHERE subID='{$artSubject}'";
                                    			
                            			$subName = '[No Subject]';
                            			$mysub = mysql_query($sql3)or die('Invalid query: ' .mysql_error());
                            			$numberofsub = mysql_num_rows($mysub);
                            			$subcount = 0;
                            			if($numberofsub == 0)
                            			{
                            				$subName = '[No Subject]';
                            			}
                            			else
                            			{
                            				while($sub = mysql_fetch_assoc($mysub))
                            				{
                            					$subName = $sub['subName'];
                            					$subcount++;
                            				}
                            			}
                            			
		              				  	$artDisplay[$topiccount] = 
		            						'
		              						  <div class="span8 wrapper post">
		                    <a class="overlay" href="viewPost.php?topicID='.$artID.'">
		                        <span class="hover"><h1>View Topic</h1></span>
		                        <img alt="image" class="media-object" src="'.$artImage.'">
		                    </a>
		                    <div class="padding30">
		                        <div class="clearfix meta mar-t30">
		                            <p class="pull-left">Date:
		                                <a>'.$artDate.'</a></p>
		                            '.$delete.'
		                            <a class="pull-right btn btn-inverse" href="viewPost.php?topicID='.$artID.'">
		                                <font color="white"><i class="icon-comments"></i> '.$artCommentCount.' Comments</font>
		                            </a>
		                        </div>
		                        <h2 class="post-title">'.$artTitle.'</h2>
		                        <div class="author">
		                            <p>posted by:
		                                <a>'.$artAuthor.'</a>
		                                in 
		                                '.$subName.'</p>
		                        </div>
		                        <p><strong>'.substr($artParagraph, 0, 149).'</strong>
		                            '.substr($artParagraph, 150	, 799).'...</p>
		                        <p class="read-more"><a class="btn btn-inverse" href="viewPost.php?topicID='.$artID.'" ><font color="white">Continue Reading &raquo;</font>
		        						                </a></p>
		        						                <div><h4 title="Sort by Class Abbreviation">Tags:&nbsp;'.$tags.'</h4></div>
		                    </div>
		                </div>
		                <hr style="border-top:1px solid #ccc;"></hr>';		                
		             				   $topiccount++;
		                			}
		                		}
		                		//to make the articles print by most recent
		                		$i = 0;
		                		while($i<$topiccount)
		                		{
		                			echo $artDisplay[$i];
		                			$i++;
		                		}
		                ?>		                		                
		        </section>
		        <!-- .span8 -->
		        <aside class="span4 wrapper">
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
									<a class="ilightbox-member-4" href='profile.php?studentID=<?php echo $_SESSION["userrecord"]["studentID"]; ?>'><img alt="" class="media-object comment-avatar img-circle pull-right" src="<?php echo $_SESSION["userrecord"]["image"]; ?>"></a><br>
									<h3 class=""><?php echo $_SESSION["userrecord"]["firstName"].' '.$_SESSION["userrecord"]["lastName"]; ?></h3>
									<h4><?php echo $_SESSION["userrecord"]["school"]; ?><br><?php echo $_SESSION["userrecord"]["subSchool"]; ?><br><?php echo $_SESSION["userrecord"]["major"]; ?></h4>
									<!--<p><?php echo $_SESSION["userrecord"]["bio"]; ?></p>-->
	                    	<hr style="border-top:1px solid #ccc;"></hr>
									<ul class="styled inline">
										<!--<li><a title="Home" href="blog-home.php" role="button" class="quick"><i class="icon-home"></i></a></li>-->
										<li><a title="Create Topic" href="#myModal" role="button" class="quick" data-toggle="modal"><i class="icon-list-alt"></i></a></li>
										<li><a title="Create Bookmark" href="#Bookmark" role=""button" class="quick" data-toggle="modal"><i class="icon-tags"></i></a></li>
										<li><a title="Register Class" href="#myClasses" role="button" class="quick" data-toggle="modal"><i class="icon-pencil"></i></a></li>
										<li><a title="SERVE. Messenger" class="ilightbox-member-2 quick" href="messenger.php"><i class="icon-envelope"></i></a></li>
										<li><a title="Settings" href="#editProfile" role="button" class="quick" data-toggle="modal"><i class="icon-cogs"></i></a></li>
									</ul>
								<form class="form-search" method="get" action="searchByTopic.php">
        							<button type="submit" style="width:35px;height:41px;" class="add-on btn-inverse"><i class="icon-search"></i></button><input type="text" style="height:19px;width:80%;border-color:#ccc;" class="span4" name="search" placeholder="Search For Topic" value="" required>
								</form>
	                    	<hr style="border-top:1px solid #ccc;"></hr>
	                    <ul>
	                        <li>
	                            <a class="ilightbox-member-1" href='profile.php?studentID=<?php echo $_SESSION["userrecord"]["studentID"]; ?>' title="View Profile"><i class="icon-caret-right">&nbsp;&nbsp;View Profile</i></a></li>
	                        <li>
	                            <!--<a class="ilight-member-1" href="messenger.php" title="team member"><i class="icon-envelope">&nbsp;-&nbsp;Messenger</a></i></li>-->
	                        <li>
	                            <!--<a href="#Bookmark" role="button" class="" data-toggle="modal" title=""><i class="icon-tags">&nbsp;-&nbsp;Bookmarks</i></a></li>-->
	                        <li>
	                            <a href="#editProfile" title="Edit Information" data-toggle="modal"><i class="icon-caret-right">&nbsp;&nbsp;Edit Profile Information</i></a></li>
							<li>
	                            <a href="#changePassword" title="Change Password" data-toggle="modal"><i class="icon-caret-right">&nbsp;&nbsp;Change Password</i></a></li>
	                        <li>
	                            <a href="logout.php" title="Sign Out"><i class="icon-caret-right">&nbsp;&nbsp;Sign Out</i></a></li>
	                    </ul>
		            </div>
		            
		            
					<!-- Register Classes Modal -->
					<div id="myClasses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="registerClass.php" style="height:300px;">
  						<div class="modal-header" style="background-color: black;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Register a Class:</font></h3>
						</div>
  						<div class="modal-body" style="text-align: center">
 							<input class="span5" type="text" style="width:96%;margin-left:1px;" placeholder="Class Name" name="class" required>
                    		<input class="span3" type="text" style="width:63%;margin-right:1px;" maxlength="3" minlength="3" placeholder="Class Abbreviation (eg. BIO)" name="abbr" required><input class="span2" style="" type="text" placeholder="Class Number (eg.181)" maxlength="3" minlength="3" name="num" required>
                        <!-- <h4>Select a Subject</h4> -->
                        <?php
                            include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            
                            $sql = "SELECT *
                                    FROM Subject
                                    Order by subName ASC";
                            $mysubjects = mysql_query($sql);
                            
                            $numberofsubjects = mysql_num_rows($mysubjects);	

                            if ($numberofsubjects == 0) {
                                echo '<div style="margin-top:10px;"><font color="grey">No current subjects...<font></div>';
                            }
                            else {
                                echo '			<br><input type="radio" name="chosenSubject" style="vertical-align:baseline;margin:10px;margin-right:19px;padding:10px;" value="old">
                                                    <select class="span2" style="height:43px;width:90%;" name="oldsub">
                                                    	<option value="0" selected="selected">Choose a Subject...</option>';
                                while ($row = mysql_fetch_assoc($mysubjects)) 
                                {
                                    echo  "             <option value={$row['subID']}>{$row['subName']}</option>";
                                }
                                echo '              </select>';
                            }
                        ?>
                         	<br><input type="radio" style="vertical-align:baseline;margin:10px;padding:10px;margin-right:12px;" name="chosenSubject" value="new">
                         		<input class="span2" style="width:88%;margin-left:7px;" type="text" placeholder="Add New Class Subject (eg. Biology)" name="newsub">
						</div>
  						<div class="modal-footer" style="background-color: black;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    						<button type="submit" class="btn btn-inverse">Submit</button>
  						</div>
  						</form>
					</div>
					<!-- Change Password Modal -->
					<div id="changePassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="changePassword.php" style="height:260px;">
  						<div class="modal-header" style="background-color: black;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Change Password:</font></h3>
						</div>
  						<div class="modal-body" style="text-align: center">
 							<input class="span5" type="password" style="width:96%;margin-left:1px;" placeholder="Current Password" name="oldpass" required>
 							<input class="span5" type="password" style="width:96%;margin-left:1px;" placeholder="New Password" name="newpass" required>
 							<input class="span5" type="password" style="width:96%;margin-left:1px;" placeholder="Confirm New Password" name="confpass" required>
						</div>
  						<div class="modal-footer" style="background-color: black;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    						<button type="submit" class="btn btn-inverse">Submit</button>
  						</div>
  						</form>
					</div>
					<!-- Edit Profile Inforamtion -->
					<div id="editProfile" class="modal alt hide fade" tabindex="-15" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="updateProfile.php" style="height:0px;">
  						<div class="modal-header" style="background-color: black;width:1275px;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Edit Information:</font></h3>
						</div>
  						<div  class="" style="background-color: white;height:500px;width:1305px;text-align: center;">
  						<?php
  						
  							$studentID = $_SESSION["userrecord"]["studentID"];
  							include 'config.php';
							mysql_connect($host, $user, $password) or die("cant connect");
							mysql_select_db($database) or die(mysql_error());
							$sql = "SELECT * 
									FROM Student 
									WHERE studentID={$studentID}";
                                    
							$myprofile = mysql_query($sql)or die('Invalid query: ' .mysql_error());
							$numberofpro = mysql_num_rows($myprofile); 
							if ($numberofpro == 0) 
							{
							}
							else
							{
   							 	while ($row = mysql_fetch_assoc($myprofile)) 
    							{
       								$proID = $row['studentID'];
       								$proBio = $row['bio'];
       								$proFName = $row['firstName'];
        							$proLName = $row['lastName'];
        							$proEmail = $row['email'];
        							$proUser = $row['username'];
        							$proTele = $row['telephone'];
        							$proGender = $row['gender'];
        							$proAge = $row['age'];
        							$proImage = $row['image'];
        							$proSchool = $row['school'];
        							$proSubSchool = $row['subSchool'];
        							$proMajor = $row['major'];
       				 				$proQuote = $row['quote'];
    								$proQuoteAuthor = $row['quoteauthor'];
        							$proSkill1 = $row['skill1'];
        							$proSkill1Num = $row['skill1num'];
        							$proSkill2 = $row['skill2'];
        							$proSkill2Num = $row['skill2num'];
        							$proSkill3 = $row['skill3'];
        							$proSkill3Num = $row['skill3num'];
        							$proFb = $row['fb'];
        							$proTw = $row['tw'];
        							$proLd = $row['ld'];
        							$proGp = $row['gp'];
    							}
							}  							
  						?>
							<div class="span6 pull-left" style="float:left;margin-top:25px;text-align:left;">
								<?php
									if($proGender == 0)
										$proGender = 'Male';
									else if($proGender == 1)
										$proGender = 'Female';
									else
										$proGender = 'Other';
										
										
									echo   '<h4>Name: '.$proFName.' '.$proLName.'<br>
											Username: '.$proUser.'<br>
											Email: '.$proEmail.'<br>
											Telephone Number: '.$proTele.'<br>
											Gender: '.$proGender.'<br>
											Age: '.$proAge.'<br>
											School: '.$proSchool.'<br>
											Subschool: '.$proSubSchool.'<br>
											Major: '.$proMajor.'<br>
											Quote Author: '.$proQuoteAuthor.'<br>
											Quote: '.$proQuote.'<br>
											Skill 1: '.$proSkill1.' - Proficiency: '.$proSkill1Num.'<br>
											Skill 2: '.$proSkill2.' - Proficiency: '.$proSkill2Num.'<br>
											Skill 3: '.$proSkill3.' - Proficiency: '.$proSkill3Num.'<br>
											Bio: '.$proBio.'<br>
											Facebook URL: '.$proFb.'<br>
											Twitter URL: '.$proTw.'<br>
											LinkedIn URL: '.$proLd.'<br>
											Google+ URL: '.$proGp.'</h4>											
											'; 
								?>
							</div>
							<div class="divider"></div>
    						<div class="span6 pull-right" style="float:left;margin-left:90px;margin-top:25px;">
    							<input class="span3" type="hidden" name="id" value="<?php echo $proID; ?>">
    							<input class="span3" style="width:243px;" type="text" placeholder="<?php echo $proFName; ?>" name="fname" value="<?php echo $proFName; ?>">
								<input class="span3" style="width:243px;" type="text" placeholder="<?php echo $proLName; ?>" name="lname" value="<?php echo $proLName; ?>">
								<input class="span3" style="width:243px;" type="text" placeholder="<?php echo $proUser; ?>" name="username" value="<?php echo $proUser; ?>">
								<input class="span3" style="width:243px;" type="text" placeholder="<?php echo $proEmail; ?>" name="email" value="<?php echo $proEmail; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proTele; ?>" name="telephone" value="<?php echo $proTele; ?>">
								<input class="span2" type="number" placeholder="<?php echo $proAge; ?>" name="age" value="<?php echo $proAge; ?>">
								<select class="span2" style="height:42px;" selected="<?php echo $proGender; ?>" id="gender" name="gender" >
                            		<option value="0">Male</option>
                            		<option value="1">Female</option>
                            		<option value="2">Other</option>
                        		</select>  
								<input class="span2" type="text" placeholder="<?php echo $proSchool; ?>" name="school" value="<?php echo $proSchool; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSubSchool; ?>" name="subSchool" value="<?php echo $proSubSchool; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proMajor; ?>" name="major" value="<?php echo $proMajor; ?>">
								<input class="span2" style="width:23%;" type="text" placeholder="<?php echo $proQuoteAuthor; ?>" name="quote-author" value="<?php echo $proQuoteAuthor ?>">
								<input class="span4" type="text" placeholder="<?php echo $proQuote; ?>" name="quote" value="<?php echo $proQuote; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill1; ?>" name="skill1" value="<?php echo $proSkill1; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill2; ?>" name="skill2" value="<?php echo $proSkill2; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill3; ?>" name="skill3" value="<?php echo $proSkill3; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill1Num; ?>" name="skill1num" value="<?php echo $proSkill1Num; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill2Num; ?>" name="skill2num" value="<?php echo $proSkill2Num; ?>">
								<input class="span2" type="text" placeholder="<?php echo $proSkill3Num; ?>" name="skill3num" value="<?php echo $proSkill3Num; ?>">
								<input class="span6" style="width:88%;" type="text" placeholder="<?php echo $proBio; ?>" name="bio" value="<?php echo $proBio; ?>"><br>
								<input class="span1" style="width:113px;" type="text" placeholder="<?php echo $proFb; ?>" name="fb" value="<?php echo $proFb; ?>">
								<input class="span1" style="width:113px;" type="text" placeholder="<?php echo $proTw; ?>" name="tw" value="<?php echo $proTw; ?>">
								<input class="span1" style="width:113px;" type="text" placeholder="<?php echo $proLd; ?>" name="ld" value="<?php echo $proLd; ?>">
								<input class="span1" style="width:113px;" type="text" placeholder="<?php echo $proGp; ?>" name="gp" value="<?php echo $proGp; ?>">
    						</div>
						</div>

  						<div class="modal-footer" style="background-color: black;width:1275px;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    						<button type="submit" class="btn btn-inverse">Submit</button>
  						</div>
    						</form>
					</div>

					<!-- New Topic Modal -->
					<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<form method="post" action="createTopic.php" style="height:510px;">
  						<div class="modal-header" style="background-color: black;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Make a New Topic:</font></h3>
						</div>
  						<div class="modal-body" style="text-align: center">
 							<input class="span5" type="text" placeholder="Title" name="title" required>
 							<input class="span5" type="text" value="<?php echo $_SESSION["userrecord"]["firstName"].' '.$_SESSION["userrecord"]["lastName"]; ?>" name="author" required>
                         	<!--<input class="span5" type="text" placeholder="Class Specific Category (eg. Habitat Destruction)" name="newsub" required>-->
                        <!-- <h4>Select a Subject</h4> -->
                        <?php
                            include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            
                            $sql = "SELECT *
                                    FROM Subject
                                    Order by subName ASC";
                            $mysubjects = mysql_query($sql);
                            
                            $numberofsubjects = mysql_num_rows($mysubjects);	

                            if ($numberofsubjects == 0) {
                                echo '<div style="margin-top:10px;"><font color="grey">No current subjects...</font></div>';
                            }
                            else {
                                echo '			<br><input type="radio" name="chosenSubject" style="vertical-align:baseline;margin:10px;margin-right:19px;padding:10px;" value="old">
                                                    <select class="span2" style="height:43px;width:80%;" name="oldsub">
                                                    	<option value="0" selected="selected">Choose a Subject...</option>';
                                while ($row = mysql_fetch_assoc($mysubjects)) 
                                {
                                    echo  "             <option value={$row['subID']}>{$row['subName']}</option>";
                                }
                                echo '              </select>';
                            }
                        ?>
                         	<br><input type="radio" style="vertical-align:baseline;margin:10px;padding:10px;margin-right:12px;" name="chosenSubject" value="new">
                         		<input class="span2" style="width:78%;margin-left:7px;" type="text" placeholder="Add New Class Subject (eg. Biology)" name="newsub">
                    		<input class="span3" type="text" maxlength="3" minlength="3" style="width:54%;" placeholder="Class Tag (eg.BIO)" name="tag1"><input class="span2" maxlength="3" minlength="3" type="text" placeholder="Class # Tag (eg.181)" name="tag1num">
 							<input class="span3" type="text" maxlength="3" minlength="3" style="width:54%;" placeholder="Class Tag (eg.BIO)" name="tag2"><input class="span2" maxlength="3" minlength="3" type="text" placeholder="Class # Tag (eg.181)" name="tag2num">
 							<input class="span3" type="text" maxlength="3" minlength="3" style="width:54%;" placeholder="Class Tag (eg.BIO)" name="tag3"><input class="span2" maxlength="3" minlength="3" type="text" placeholder="Class # Tag (eg.181)" name="tag3num">
							<textarea class="span5" style="height:270px; text-align: top" type="text" placeholder="Write your post..." name="paragraph" required></textarea>
						</div>
  						<div class="modal-footer" style="background-color: black;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    						<button type="submit" class="btn btn-inverse">Submit</button>
  						</div>
  						</form>
					</div>
					
					<!-- Bookmark Modal -->
					<div id="Bookmark" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<div class="modal-header" style="background-color: black;">
 						   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 							   <h3 id="myModalLabel"><font color="white">Bookmarks:</font></h3>
						</div>
  						<div class="modal-body" style="text-align: left; height: 250px;">
                        <!-- <h4>Select a Subject</h4> -->
                        <?php
                        	$studID = $_SESSION["userrecord"]["studentID"];
                        	$count = 0;
                        	
                            include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            
                            $sql = "SELECT *
                                    FROM Bookmarks
                                    WHERE studentID='{$studID}'";
                                    
                            $mymarks = mysql_query($sql);
                            $numberofmarks = mysql_num_rows($mymarks);

                            if ($numberofmarks == 0) 
                            {
                                echo '<p>You haven\'t bookmarked any topics yet...</p>';
                            }
                            else 
                            {
                                while ($row = mysql_fetch_assoc($mymarks)) 
                                {
                                	$title = $row['title'];
                            		$topicID = $row['topicID'];
                            		$studentID = $row['studentID'];
                            		$bookmarkID = $row['bookmarkID'];
                            		
                            		$titleDisplay[$count] = '<a href="viewpost.php?topicID='.$topicID.'"><h4 class="icon-tag">&nbsp;&nbsp; ID('.$topicID.') - Bookmarked Topic: <i>'.$title.'</i></h4></a>
                            									<a href="deleteBookmark.php?bookmarkID='.$bookmarkID.'"><h4 class="icon-remove pull-right delete"></h4></a>
                            									<hr style="border-top:1px solid #ccc;"></hr>';                            		
                            		$title."\n";
                            		$count++;
                                }
                            }
                            
                            $i = 0;
                            while($i < $count)
                            {
                            	echo $titleDisplay[$i];
                            	$i++;
                            }?>
                        </div>
  						<div class="modal-footer" style="background-color: black;">
    						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  						</div>
					</div>
					
		            <!-- .widget -->
		            <div class="widget" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <div class="tabbable">
		                    <!-- Only required for left/right tabs -->
		                    <div class="tab-content">
		                        <div class="tab-pane active" id="tab1">
		                            <ul>
		                                <li>
		                                   <h3 style="text-align:left">Class&nbsp;List</h3>
		                                </li>
		                                <hr style="border-top:1px solid #ccc;"></hr>
		                <?php 
		        			include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            
                            $studentID = $_SESSION["userrecord"]["studentID"];
                            
                            $sql = "SELECT * 
                                    FROM Classes
                                    WHERE studentID='{$studentID}'
                                    Order by className DESC";

                            $myclasses = mysql_query($sql)or die('Invalid query: ' .mysql_error());
                            $numberofclasses = mysql_num_rows($myclasses); 
		        	    		if ($numberofclasses == 0) 
                            	{
                               	 	echo 'No Classes Registered Yet...';
                            	}
                            	else
                            	{
                            	//set up with arrays so database prints in reverse(most recent) 
                            		$classcount = 0;
                            		while ($row = mysql_fetch_assoc($myclasses)) 
                            		{
                            			$studentID = $row['studentID'];
                            			$className = $row['className'];
                            			$classID = $row['classID'];
                            			$classAbbr = $row['classAbbr'];
                            			$classNum = $row['classNum'];
                            			$subID = $row['subID'];
                            			                            			
		              				  	$classDisplay[$classcount] = 
		            													'<li>
		                                    								<i class="icon-caret-right"></i>
		                                    								<a href="blog-home.php?classAbbr='.$classAbbr.'&classNum='.$classNum.'" title="Sort Topics by '.$className.'">'.substr($className,0,27).' - ['.$classAbbr.' '.$classNum.']</a>
		                                    								<a class="pull-right delete" href="deleteClass.php?classID='.$classID.'"><i class="icon-remove"></i></a>
		                                								 </li>
		              						  							';		                
		             				   $classcount++;
		                			}
		                		}
		                		
		                		//to make the articles print by most recent
		                		$i = $classcount;
		                		while($i>0)
		                		{
		                			$i--;
		                			echo $classDisplay[$i];
		                		}
		                	?>
		                            </ul>
		                            <hr style="border-top:1px solid #ccc;"></hr>
		                            		<a role="button" class="" data-toggle="modal" href="#myClasses" title="Register Class" style="text-align:left"><h4>&nbsp;&nbsp;Register a New Class&nbsp;&nbsp;&nbsp;____<i class="icon-pencil"></i>&nbsp;&nbsp;</h4></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <h3>Subjects</h3>		                
                        <hr style="border-top:1px solid #ccc;"></hr>
                        	<form class="form-search" action="createSubject.php" method="post">
        							<button type="submit" style="width:35px;height:41px;" class="add-on btn-inverse"><i class="icon-plus"></i></button><input type="text" style="height:19px;width:80%;border-color:#ccc;" class="span4" name="subject" placeholder="Add New Subject" value="" required>
                        	</form>
                        <?php
                            include 'config.php';
                            mysql_connect($host, $user, $password) or die("cant connect");
                            mysql_select_db($database) or die(mysql_error());
                            
                            $sql = "SELECT *
                                    FROM Subject
                                    Order by subName ASC";
                            $mysubjects = mysql_query($sql);
                            
                            $numberofsubjects = mysql_num_rows($mysubjects);
                            echo '<form class="form-search" method="get" action="searchBySubject.php" >';

                            if ($numberofsubjects == 0) {
                                echo '<div style="margin-top:10px;"><font color="grey">No Current Subjects to Search...</font></div>';
                            }
                            else {
                                echo '			
                                                    <select style="color:white;background-color:black;height:43px;width:298px;" name="subID" onchange="this.form.submit()">
                                                    	<option value="0" selected="selected">Search by Subject</option>';
                                while ($row = mysql_fetch_assoc($mysubjects)) 
                                {
                                    echo  "             <option value={$row['subID']}>{$row['subName']}</option>";
                                }
                                echo '              </select>';
                            }
                            echo '<noscript><input type="submit" value="Submit"></noscript>
                            </form>';
                        ?>
		            </div>
			        <!-- .widget -->
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
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
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <h3>Edit Your Profile!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-cogs icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Edit your profile to let your peers know a little about you! Having a biography lets others know a bit about you, and answer you according to your strengths...</p>
		                        <a href="#editProfile" data-toggle="modal" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <h3>Connect With Your Classmates!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-envelope icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Use <i>SERVE.</i> to find your classmates with our messenger and connect with them. Post a topic about something you're confused about and wait for answers to flood in from your classmates!</p>
		                        <a class="ilightbox-member-3" href="messenger.php" title="Continue">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>
		            <!-- .widget -->
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <h3>View Bookmarks!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-tags icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>When viewing a topic, click bookmark to save the topic for viewing later...</p>
		                        <a  href="#Bookmark" title="Continue" data-toggle="modal">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
		            </div>		            
		            <!-- .widget -->
		            <div class="widget widget-wrapper" style="border-top-style: solid; border-color: #000; border-width: 10px;">
		                <h3>Register a Class!</h3>
		                <div class="row-fluid clearfix">
		                    <div class="span3 pull-left icons hidden-phone">
		                        <i class="icon-pencil icon-4x"></i>
		                    </div>
		                    <div class="span9">
		                        <p>Register a new class so you can easily search for topics pertaining to it...</p>
		                        <a  href="#myClasses" title="Continue" data-toggle="modal">Continue &raquo;</a>
		                    </div>
		                </div>
		                <!-- .clearfix -->
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
		         
		<?php
	    if (isset($_GET))
            {
                if (isset($_GET["error"]) and $_GET["error"] == "unauthorized")
                {
                    echo '<script>alert("You are not currently logged in. Please log in or create an account...")</script>';
                }
                
                if (isset($_GET["status"]) and $_GET["status"] == "newbookmark")
                {
                    echo '<script>alert("Topic has been bookmarked. Select the Bookmark Button(right of create a topic) on the right menu to view your Bookmarks.")</script>';
                }
                                
                if (isset($_GET["error"]) and $_GET["error"] == "bookmarktaken")
                {
                    echo '<script>alert("Topic already bookmarked.")</script>';
                }                
                
                if (isset($_GET["status"]) and $_GET["status"] == "successtopic")
                {
                    echo '<script>alert("New topic created.")</script>';
                }
                
                if (isset($_GET["status"]) and $_GET["status"] == "classadded")
                {
                    echo '<script>alert("New class added.")</script>';
                }
                
                if (isset($_GET["error"]) and $_GET["error"] == "subjectexists")
                {
                    echo '<script>alert("That subject already exists.")</script>';
                }
                
                if (isset($_GET["status"]) and $_GET["status"] == "newsubject")
                {
                    echo '<script>alert("New subject created.")</script>';
                }
                
            	if (isset($_GET["status"]) and $_GET["status"] == "newpass")
                {
                    echo '<script>alert("Password Changed.")</script>';
                }            	
                
                if (isset($_GET["status"]) and $_GET["status"] == "updatedpro")
                {
                    echo '<script>alert("Profile Updated.")</script>';
                }
                
            	if (isset($_GET["error"]) and $_GET["error"] == "nopass")
                {
                    echo '<script>alert("Either your current password is not correct, or your new password and confirmation pass do not match.")</script>';
                }
            }
        ?>
        
	    </body>
</html>