<?php

ob_start();
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: index.php?error=unauthorized");
    die();
}

echo 0;

$author 			= $_POST["author"];
$image 				= "test.jpg";
$mydate				= getdate(date("U"));
$date 				= "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
$commentNum         = 0;//will be updated another way.
$title              = $_POST["title"];
$subject          	= $_POST["subject"];
$summary    		= $_POST["summary"];
$tag				= "test";

if (!$title or !$subject or !$summary or !$author)
{
    header("location: blog-home.php?error=incompletetopic");
    die();
}

echo 1;

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

echo 2;

$sql = "INSERT INTO Topic (image, date, commentNum, title, author, subject, summary, tag)
        VALUES ('$image', '$date', $commentNum, '$title', '$author', '$subject', '$summary', '$tag')";
$newrecord = mysql_query($sql);

if ($newrecord)
{
    header('location: blog-home.php?status=successtopic');
}

echo 4;
?>