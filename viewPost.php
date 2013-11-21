<?php
session_start();
ob_start();

include 'config.php';

$message = $_POST["tag"];


echo $message;

?>