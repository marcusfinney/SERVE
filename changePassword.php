<?php
session_start();

$studentID       = $_SESSION["userrecord"]["studentID"];
$verification = 0;

$oldpass	        = $_POST["oldpass"];
$newpass			= $_POST["newpass"];
$confpass			= $_POST["confpass"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$check 	 = "SELECT *
   	    	FROM Student
    	    WHERE password='{$oldpass}'";
$existingpass = mysql_query($check);

if (mysql_num_rows($existingpass) == 1)
{
	$verification = 1;
}

if(($newpass == $confpass) and ($verification == 1))
{
	

	$sql = "UPDATE Student
			SET password='{$newpass}'
			WHERE studentID='{$studentID}'";
		
	$updatePass = mysql_query($sql);

	if ($updatePass)
	{
    	header('location: blog-home.php?status=newpass');
	}
}else
{
	header('location: blog-home.php?error=nopass');
}
?>