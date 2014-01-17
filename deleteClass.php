<?php
session_start();

$classID = $_GET["classID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "DELETE FROM Classes
		WHERE classID='{$classID}'";
		
$delete = mysql_query($sql);

if ($delete)
{
    header('location: blog-home.php');
}
?>