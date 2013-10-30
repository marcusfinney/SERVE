<?php
ob_start(); 

session_start();

include 'config.php';


mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$myusername = $_POST["username"];
$mypassword = $_POST["password"];
$usertable = "Student";//add in some type of checking system for mods


$sql = "SELECT * FROM {$usertable} WHERE username='{$myusername}' AND password='{$mypassword}'";
$result = mysql_query($sql);

$count = mysql_num_rows($result);

if ($count == 1) {
	//echo "here";
    $_SESSION["username"] = $myusername;
    $_SESSION["password"] = $mypassword;
    $_SESSION["accountType"] = $usertable;
    $_SESSION["userrecord"] = mysql_fetch_assoc($result);
    if($usertable == 'Student')
    {header("location: blog-home.php");}
    /*elseif($usertable == 'Patients')
    {
        $sql = "SELECT *
                FROM Patients
                WHERE idpatient={$_SESSION["userrecord"]["idpatient"]}";
        $result = mysql_query($sql);
        $patient = mysql_fetch_assoc($result);

        $_SESSION["patientrecord"] = $patient;

        header("location: patient.php");
    }*/
    else
    {header("location: index.php");}
}
else{
    // return user to login page and mark page with login error
    header("location:index.php?error=incorrectlogin");
}
?>

<!-- <html>
	<head>
		<title></title>
	</head>
<body>
<br>
Go back to <a href="index.php">login</a> page.
</body>
</html> -->
