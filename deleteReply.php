<?php
session_start();

$topicID = $_GET["topicID"];
$replyID = $_GET["replyID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "DELETE FROM Reply
		WHERE replyID='{$replyID}'";
		
$delete = mysql_query($sql);

if ($delete)
{
    header('location: viewPost.php?topicID='.$topicID);
}
?>