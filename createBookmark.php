<?php

session_start();

$title	          	= $_GET["title"];
$topicID          	= $_GET["topicID"];
$studentID          = $_GET["studentID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "SELECT *
        FROM Bookmarks
        WHERE topicID='{$topicID}'";
$existingBookmark = mysql_query($sql);

if (mysql_num_rows($existingBookmark) == 1)
{
    header('location: viewpost.php?topicID='.$topicID.'&error=bookmarktaken');
    die();
}

$sql = "INSERT INTO Bookmarks (studentID, topicID, title)
        VALUES ('$studentID', '$topicID','$title')";
$newbookmark = mysql_query($sql);

if ($newbookmark)
{
    header('location: viewpost.php?topicID='.$topicID.'&status=newbookmark');
}
?>