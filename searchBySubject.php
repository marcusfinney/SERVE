<?php 
$subID = $_GET["subID"];

if ($subID)
{
    header('location: blog-home.php?subID='.$subID);
}
?>
