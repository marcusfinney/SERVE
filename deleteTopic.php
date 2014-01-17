<?php
session_start();

$topicID = $_POST["topicID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "DELETE FROM Topic
		WHERE topicID='{$topicID}'";
		
$delete = mysql_query($sql);

if ($delete)
{
    header('location: blog-home.php');
}
?>