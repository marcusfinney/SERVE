<?php
session_start();

$senderID 			= $_SESSION["userrecord"]["studentID"];
$recipientID 		= $_POST["recipient"];
$pattern 			= " ";
$firstName 			= strstr($recipientID, $pattern, true);
$lastName 			= str_replace($firstName." ", "", $recipientID);
$today 				= date(DATE_RFC822);
					date_default_timezone_set('America/Phoenix');
					$currenttime = date('g:i:s');
   					list($hrs,$mins,$secs) = explode(':',$currenttime);
$time = " $hrs:$mins:$secs MST";
$date =  date('l, F j, Y |',strtotime($today));
					$date =  $date.$time;
$subject			= $_POST["subject"];
$message			= $_POST["message"];

include 'config.php';

mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sql = "SELECT *
        FROM Student
        WHERE firstName='{$firstName}'
        AND lastName='{$lastName}'";
$grabRecipientID = mysql_query($sql)or die('Invalid query: ' .mysql_error());
$numberofrec = mysql_num_rows($grabRecipientID); 

if ($numberofrec == 0) 
{
    echo '<script>alert("User does not exist!")</script>';
	header('location: messenger.php');}
else
{
	while ($row = mysql_fetch_assoc($grabRecipientID)) 
    {
    	$recID = $row['studentID'];
    }
}
                            		
$sql2 = "INSERT INTO Messenger (senderID, recipientID, date, subject, message, starred)
        VALUES ('$senderID', '$recID','$date', '$subject', '$message', 0)";
$newmessage = mysql_query($sql2);

if ($newmessage)
{
    header('location: messenger.php');
    echo '<script>alert("Message Sent!")</script>';
}
?>