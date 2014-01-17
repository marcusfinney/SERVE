<?php
session_start();

$proID = $_POST["id"];
$proBio = $_POST["bio"];
$proFName = $_POST["fname"];
$proLName = $_POST["lname"];
$proEmail = $_POST["email"];
$proUser = $_POST["username"];
$proTele = $_POST["telephone"];
$proGender = $_POST["gender"];
$proAge = $_POST["age"];
$proImage = $_POST["image"];
$proSchool = $_POST["school"];
$proSubSchool = $_POST["subSchool"];
$proMajor = $_POST["major"];
$proQuote = $_POST["quote"];
$proQuoteAuthor = $_POST["quote-author"];
$proSkill1 = $_POST["skill1"];
$proSkill1Num = $_POST["skill1num"];
$proSkill2 = $_POST["skill2"];
$proSkill2Num = $_POST["skill2num"];
$proSkill3 = $_POST["skill3"];
$proSkill3Num = $_POST["skill3num"];
$proFb = $_POST["fb"];
$proTw = $_POST["tw"];
$proLd = $_POST["ld"];
$proGp = $_POST["gp"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "UPDATE SERVE.Student
		SET firstName='{$proFName}', lastName='{$proLName}', bio='{$proBio}', email='{$proEmail}', username='{$proUser}', 
			telephone='{$proTele}', gender='{$proGender}', age='{$proAge}', school='{$proSchool}', 
			subSchool='{$proSubSchool}', major='{$proMajor}', quote='{$proQuote}', quoteauthor='{$proQuoteAuthor}', 
			skill1='{$proSkill1}', skill1num='{$proSkill1Num}', skill2='{$proSkill2}', skill2num='{$proSkill2Num}', 
			skill3='{$proSkill3}', skill3num='{$proSkill3Num}', fb='{$proFb}', tw='{$proTw}', ld='{$proLd}', gp='{$proGp}'
		WHERE Student.studentID='{$proID}'";


$update = mysql_query($sql);

if($update)
{
    header('location: blog-home.php?status=updatedpro');
}
else
	echo $sql;
?>