<?php
session_start();

$topicID = $_GET["topicID"];
$commentID = $_GET["commentID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "DELETE FROM Comment
		WHERE commentID='{$commentID}'";
		
$delete = mysql_query($sql);

if ($delete)
{
    header('location: viewPost.php?topicID='.$topicID);
}
?>