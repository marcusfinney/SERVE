<?php
session_start();

$favorite	        = $_GET["status"];
$messageID          = $_GET["messageID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "UPDATE Messenger
		SET starred='{$favorite}'
		WHERE messageID='{$messageID}'";
		
$updateFavorite = mysql_query($sql);

if ($updateFavorite)
{
    header('location: messenger.php');
}
?>