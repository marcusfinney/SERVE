<?php 
$search = $_GET["search"];

if ($search)
{
    header('location: blog-home.php?search='.$search);
}
?>
