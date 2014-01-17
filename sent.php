<?php 
session_start();


include 'config.php';
mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sessionuser = $_SESSION["userrecord"]["studentID"];

$sql = "SELECT * 
      	FROM Messenger
      	WHERE senderID='{$sessionuser}'";

$mymessages = mysql_query($sql)or die('Invalid query: ' .mysql_error());
$numberofmessages = mysql_num_rows($mymessages); 
if ($numberofmessages == 0) 
{
    echo '<br><i>&nbsp;&nbsp;&nbsp;No Messages in Inbox...</i>';
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
                WHERE studentID='{$recipientID}'
                ";
                                	
    	$mystud = mysql_query($sql2)or die('Invalid query: ' .mysql_error());
        $numberofstud = mysql_num_rows($mystud);
        $studcount = 0;
        if($numberofstud == 0)
        {
        	$rec = 'Invalid User';
        }
        else
        {
            while($stud = mysql_fetch_assoc($mystud))
            {
            	$studID = $stud['studentID'];
            	$rec = $stud['firstName'];
                $rec2 = $stud['lastName'];
                $name = $rec.' '.$rec2;
                $reccount++;
           	}
        }
       
       /*$star = '<a href="#"><font color="#1898b4"><i class="icon-star-empty"></i></font></a>';
       if($starred == 1)
       {
       		$star = '<a href="#"><font color="#eace40"><i class="icon-star"></i></font></a>';
       }*/
       
       
       $displaySent[$reccount] = 
       '
       	   		<tr><td><a id="compose" href="profile.php?studentID='.$studID.'">'.$name.'</a></td><td><a href="#" role="button" class="popovers" data-toggle="popover" data-placement="bottom" title="Message from: <strong>'.$name.'</strong>" data-content="'.$message.'" data-original-title="test title"><strong><i>'.$subject.'</i></strong> - '.substr($message, 0, 69).'...</a></td><td>'.$date.'</td></tr>
      	';
      	$reccount++;
	}
echo '
    	<div class="column span9">
      	<table class="table table-striped">
        	
        		<thead><tr><th>Sender</th><th>Message</th><th>Date</th></tr></thead>
        		<tbody id="listStuff">';
        		
$i = 0;
	while($i<$reccount)
	{
		echo $displaySent[$i];
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