<?php

ob_start();
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: index.php?error=unauthorized");
    die();
}

$ID					= $_POST["id"];
$topicID			= $_POST["artid"];
$name 				= $_SESSION["userrecord"]["firstName"].' '.$_SESSION["userrecord"]["lastName"];
$image 				= $_SESSION["userrecord"]["image"];
$studentID 			= $_SESSION["userrecord"]["studentID"];
$today 				= date(DATE_RFC822);
					date_default_timezone_set('America/Phoenix');
					$currenttime = date('g:i:s');
   					list($hrs,$mins,$secs) = split(':',$currenttime);
$time = " $hrs:$mins:$secs MST";
$date =  date('l, F j, Y |',strtotime($today));
					$date =  $date.$time;
$comment			= $_POST["comment"];
$commentID			= $_POST["commentID"];
$reply				= $_POST["reply"];
$comNum				= $_POST["comNum"];
$comNum++;



if($ID == "primary")
{
	include 'config.php';

	mysql_connect($host, $user, $password) or die("cant connect");
	mysql_select_db($database) or die(mysql_error());

	$sql = "INSERT INTO Comment (topicID, date, name, image, comment, studentID)
	        VALUES ('$topicID', '$date', '$name', '$image', '$comment', '$studentID')";
	$newrecord = mysql_query($sql);
	
	$tym = "UPDATE Topic
			SET commentNum={$comNum}
			WHERE topicID={$topicID}";
	$newcount = mysql_query($tym);		

	if ($newrecord)
	{
	    header('location: viewpost.php?topicID='.$topicID.'&status=newcomment');
	}
}

if($ID == "secondary")
{
	include 'config.php';

	mysql_connect($host, $user, $password) or die("cant connect");
	mysql_select_db($database) or die(mysql_error());

	$sql = "INSERT INTO Reply (topicID, commentID, date, name, image, reply, studentID)
        VALUES ('$topicID', '$commentID', '$date', '$name', '$image', '$reply', '$studentID')";
	$newrecord = mysql_query($sql);

	if ($newrecord)
	{
   	 	header('location: viewpost.php?topicID='.$topicID.'&status=newreply');
	}
}



?>