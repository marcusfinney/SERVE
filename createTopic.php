<?php

ob_start();
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: index.php?error=unauthorized");
    die();
}


$author 			= $_POST["author"];
$image 				= "test.jpg";
$today 				= date(DATE_RFC822);
					date_default_timezone_set('America/Phoenix');
					$currenttime = date('g:i:s');
   					list($hrs,$mins,$secs) = split(':',$currenttime);
$time = " $hrs:$mins:$secs MST";
$date =  date('l, F j, Y |',strtotime($today));
					$date =  $date.$time;
$commentNum         = 0;//will be updated another way.
$title              = $_POST["title"];
$paragraph			= $_POST["paragraph"];
$summary    		= substr($paragraph, 0, 499)."...";
$tag1				= $_POST["tag1"];
$tag2				= $_POST["tag2"];
$tag3				= $_POST["tag3"];
$tag1num			= $_POST["tag1num"];
$tag2num			= $_POST["tag2num"];
$tag3num			= $_POST["tag3num"];
$studentID 			= $_SESSION["userrecord"]["studentID"];
$chosenSubject		= $_POST["chosenSubject"];
$newSub             = $_POST["newsub"];
$oldSub				= $_POST["oldsub"];

if (!$title or !$paragraph or !$summary or !$author)
{
    header("location: blog-home.php?error=incompletetopic");
    die();
}

$subID = "";

include 'config.php';
mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

/*====================================================================================================================*/
//DECIDE IF A SUBJECT EXISTS OR NOT AND ADD IT TO THE TABLE AS NEW 

if($chosenSubject == 'new')
{	
	$check = "SELECT *
   	    	  FROM Subject
    	      WHERE subName='{$newSub}'";
	$existingsubject = mysql_query($check);

	if (mysql_num_rows($existingsubject) == 1)
	{
    	header('location: blog-home.php?error=subjectexists');
    	die();
	}
	else
	{
		$sub = "INSERT INTO Subject (subName)
				VALUES ('$newSub')";
		$newSubject = mysql_query($sub);
		$subID = mysql_insert_id();
	}
}
else if($chosenSubject == 'old')
{
	$subID = $oldSub;
}


/*====================================================================================================================*/
//INSERT NEW TOPIC INTO TOPIC TABLE

$sql1 = "INSERT INTO Topic (image, date, commentNum, title, author, studentID, paragraph, subID, summary)
        	VALUES ('$image', '$date', $commentNum, '$title', '$author', '$studentID', '$paragraph', '$subID', '$summary')";
$newrecord = mysql_query($sql1);
/*====================================================================================================================*/


//get value of autoincremeteted primary key
$topicID = mysql_insert_id();


/*====================================================================================================================*/
//INSERT TAGS INTO TAG TABLE
$sql2 = "INSERT INTO Tags (subID, tagID, topicID, tagName, summary, tagNum)
			VALUES ('$subID', NULL, '$topicID', '$tag1', '$summary', '$tag1num'), 
				('$subID', NULL, '$topicID', '$tag2', '$summary', '$tag2num'),
				('$subID', NULL, '$topicID', '$tag3', '$summary', '$tag3num')";
$newtags = mysql_query($sql2);
/*====================================================================================================================*/


//get value of autoincremeteted primary key
$lastTagID = mysql_insert_id();
$secondTagID = $lastTagID + 1;
$firstTagID = $secondTagID + 1;


/*====================================================================================================================*/
//DELETE UNUTILIZED TAGS
$sql3 = "DELETE FROM Tags
			WHERE tagName=''";
$deleteEmptyTags = mysql_query($sql3);
/*====================================================================================================================*/

/*$sql3 = "INSERT INTO TagSort (tagID, topicID)
			VALUES ('$firstTagID', '$topicID'), 
				('$secondTagID', '$topicID'),
				('$lastTagID', '$topicID')";
$newsort = mysql_query($sql3); */


if ($newrecord)
{
    header('location: blog-home.php?status=successtopic');
}

?>