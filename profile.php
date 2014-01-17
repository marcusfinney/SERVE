<?php ob_start();
session_start();?>
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
        
        <link href="css/colors.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet"> 
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
      	<script src="js/html5shiv.js"></script>
    	<![endif]-->
    	

    </head>
<?php 
$studentID = $_GET["studentID"];

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
    	$proDate = $row['dateAdded'];
        $proBio = $row['bio'];
        $proFName = $row['firstName'];
        $proUser = $row['username'];
        $proLName = $row['lastName'];
        $proEmail = $row['email'];
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
    <body class="page-aqua">

		<div class="container member-profile">
			<div class="row">
				<div class="span4 offset1 text-center full-profile">
					<img src="<?php echo $proImage; ?>" alt="image" />
					<ul class="unstyled inline mar-t30">
						<li><a href="<?php echo $proFb; ?>" title="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="<?php echo $proTw; ?>" title="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="<?php echo $proLd; ?>" title="linkedin"><i class="icon-linkedin"></i></a></li>
						<li><a href="<?php echo $proGp; ?>" title="g+"><i class="icon-google-plus-sign"></i></a></li>
						<li><a class="ilightbox-member-2" href="messenger.php" title="team member"><i class="icon-envelope"></i></a></li>
					</ul>
					<?php
						if($proGender == 0)
							$proGender = 'Male';
						else if($proGender == 1)
							$proGender = 'Female';
						else
							$proGender = 'Other';
							
						echo   '<h6 class="pull-left" style="text-align:left;left:258px;position:absolute;">
											Username: '.$proUser.'<br>
											Email: '.$proEmail.'<br>
											Telephone Number: '.$proTele.'<br>
											Gender: '.$proGender.'<br>
											Age: '.$proAge.'<br>
											'; 
					?>
				</div>
				<div class="span6 full-profile">
					<h1 class="member-name"><?php echo $proFName.' '.$proLName; ?></h1>
					<p class="member-role"><?php echo $proSchool.'<br>'.$proSubSchool.' - '.$proMajor; ?></p>
					
					<h3><i>"<?php echo $proQuote; ?>"<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '-'.$proQuoteAuthor; ?></h4></i></h3>

					<p><strong>Skills</strong></p>
					<div class="progress">
						<span><?php echo $proSkill1; ?></span>
					    <div class="bar" style="width: 0%;" data-percentage="<?php echo $proSkill1Num; ?>"></div>
					</div>
					<div class="progress">
						<span><?php echo $proSkill2; ?></span>
					    <div class="bar" style="width: 0%;" data-percentage="<?php echo $proSkill2Num; ?>"></div>
					</div>
					<div class="progress">
						<span><?php echo $proSkill3; ?></span>
					    <div class="bar" style="width: 0%;" data-percentage="<?php echo $proSkill3Num; ?>"></div>
					</div>
					
					<p><?php echo $proBio; ?></p>
					</div>
			</div>
		</div>
		<!-- Javascript  -->
    			<!-- Javascript  -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			$('.bar').css('width',  function(){ return ($(this).attr('data-percentage')+'%')});
		</script>
    </body>
</html>


