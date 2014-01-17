<?php 
session_start();


include 'config.php';
mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sessionuser = $_SESSION["userrecord"]["studentID"];
$num = 1;

$sql = "SELECT * 
      	FROM Messenger
      	WHERE recipientID='{$sessionuser}'
      	AND starred='{$num}'";

$mymessages = mysql_query($sql)or die('Invalid query: ' .mysql_error());
$numberofmessages = mysql_num_rows($mymessages); 
if ($numberofmessages == 0) 
{
    echo '<br><i>&nbsp;&nbsp;&nbsp;No Messages have been favorited...</i>';
}
else
{
//set up with arrays so database prints in reverse(most recent) 
$inboxcount = 0;
	while ($row = mysql_fetch_assoc($mymessages)) 
	{
       $sendID = $row['senderID'];
       $recipientID = $row['recipientID'];
       $date = $row['date'];
       $subject = $row['subject'];
       $message = $row['message'];
       $viewed = $row['viewed'];
       $starred = $row['starred'];
       
       $sql2 = "SELECT * 
                FROM Student
                WHERE studentID='{$sendID}'
                ";
                                	
    	$mystud = mysql_query($sql2)or die('Invalid query: ' .mysql_error());
        $numberofstud = mysql_num_rows($mystud);
        $studcount = 0;
        $test = 0;
        $name = '';
        if($numberofstud == 0)
        {
        	$name = 'Invalid User';
        	$test = 1;
        }
        else
        {
            while($stud = mysql_fetch_assoc($mystud))
            {
            	$studID = $stud['studentID'];
            	$sender = $stud['firstName'];
                $sender2 = $stud['lastName'];
                if($test == 0)
                {$name = $sender.' '.$sender2;}
                $studcount++;
           	}
        }
       
       $displayInbox[$inboxcount] = 
       '
       	   		<tr><td><a id="compose" href="profile.php?studentID='.$studID.'">'.$name.'</a></td><td><a href="#" role="button" class="popovers" data-toggle="popover" data-placement="bottom" title="Message from: <strong>'.$name.'</strong>" data-content="'.$message.'" data-original-title="test title"><strong><i>'.$subject.'</i></strong> - '.substr($message, 0, 69).'...</a></td><td>'.$date.'</td></tr>
      	';
      	$inboxcount++;
	}
echo '
    	<div class="column span9">
      	<table class="table table-striped">
        	
        		<thead><tr><th>Sender</th><th>Message</th><th>Date</th></tr></thead>
        		<tbody id="listStuff">';
        		
$i = 0;
	while($i<$inboxcount)
	{
		echo $displayInbox[$i];
		$i++;
	}
	
echo '
</table>  
      	<ul id="listStuffPager" class="pagination pagination-mini pager"></ul>
    	</div>
<script>
$("[data-toggle=popover]")
.popover({html:true})
</script>
    	';	
}

?>