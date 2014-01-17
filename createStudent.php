<?php

session_start();

$username           = $_POST["username"];
$password1          = $_POST["password"];
$firstname          = $_POST["firstname"];
$lastname           = $_POST["lastname"];
$age                = $_POST["age"];
$gender             = $_POST["gender"];
$email              = $_POST["email"];
$priority			= 0;
$image				= "default.jpg";
$ppassword          = $_POST["ppassword"];


if ($ppassword != $password1)
{
    header("location: index.php?error=passwordmismatch");
    die();
}

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "SELECT *
        FROM Student
        WHERE username='{$username}'";
$existingpatient = mysql_query($sql);

if (mysql_num_rows($existingpatient) == 1)
{
    header('location: index.php?error=usernametaken');
    die();
}

$sql = "INSERT INTO Student (username, password, firstName, lastName, email, gender, priority, age, image)
        VALUES ('$username', '$password1','$firstname', '$lastname', '$email', '$gender', $priority, '$age', '$image')";
$newrecord = mysql_query($sql);

if ($newrecord)
{
    header('location: index.php?status=newaccountcreated');
}

?>