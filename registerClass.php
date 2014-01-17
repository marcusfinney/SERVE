<?php

session_start();

$studentID          = $_SESSION["userrecord"]["studentID"];
$className          = $_POST["class"];
$classAbbr          = $_POST["abbr"];
$classNum           = $_POST["num"];
$chosenSubject		= $_POST["chosenSubject"];
$newSub             = $_POST["newsub"];
$oldSub				= $_POST["oldsub"];
$subID = "";

include 'config.php';
mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

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

$sql = "INSERT INTO Classes (studentID, subID, className, classAbbr, classNum)
        VALUES ('$studentID', '$subID','$className', '$classAbbr', '$classNum')";
$newclass = mysql_query($sql);

if ($newclass)
{
    header('location: blog-home.php?status=classadded');
}

?>