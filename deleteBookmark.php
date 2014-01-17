<?php
session_start();

$bookmarkID	 = $_GET["bookmarkID"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "DELETE FROM Bookmarks
		WHERE bookmarkID='{$bookmarkID}'";
		
$delete = mysql_query($sql);

if ($delete)
{
    header('location: blog-home.php');
}
?>