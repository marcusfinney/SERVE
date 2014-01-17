<?php
session_start();

$subject = $_POST["subject"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "SELECT *
        FROM Subject
        WHERE subName='{$subject}'";
$existingSubject = mysql_query($sql);

if (mysql_num_rows($existingSubject) == 1)
{
    header('location: blog-home.php?error=subjectexists');
    die();
}

$sub = "INSERT INTO Subject (subName)
		VALUES ('$subject')";

$newSubject = mysql_query($sub);

if ($newSubject)
{
    header('location: blog-home.php?status=newsubject');
}
?>