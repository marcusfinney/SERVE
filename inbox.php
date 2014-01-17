<?php 
session_start();


include 'config.php';
mysql_connect($host, $user, $password) or die("cant connect");
mysql_select_db($database) or die(mysql_error());

$sessionuser = $_SESSION["userrecord"]["studentID"];

$sql = "SELECT * 
      	FROM Messenger
      	WHERE recipientID='{$sessionuser}'
      	ORDER BY date DESC";

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
       $messID = $row['messageID'];
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
        if($numberofstud == 0)
        {
        	$sender = 'Invalid User';
        }
        else
        {
            while($stud = mysql_fetch_assoc($mystud))
            {
            	$studID = $stud['studentID'];
            	$sender = $stud['firstName'];
                $sender2 = $stud['lastName'];
                $name = $sender.' '.$sender2;
                $studcount++;
           	}
        }

       $star = '<a href="updateFavorite.php?status=1&messageID='.$messID.'"><font color="#1898b4"><i class="icon-star-empty"></i></font></a>';
       if($starred == 1)
       {
       		$star = '<a href="updateFavorite.php?status=0&messageID='.$messID.'"><font color="#eace40"><i class="icon-star"></i></font></a>';
       }
       
       $displayInbox[$inboxcount] = 
       '
       	   		<tr><td class="mail">&nbsp;&nbsp;&nbsp;&nbsp;
       	   		'.$star.'</td><td><a id="compose" href="profile.php?studentID='.$studID.'">'.$name.'</a></td><td><a href="#" role="button" class="popovers" data-toggle="popover" data-placement="bottom" title="Message from: <strong>'.$name.'</strong>" data-content="'.$message.'" data-original-title="test title"><strong><i>'.$subject.'</i></strong> - '.substr($message, 0, 69).'...</a></td><td>'.$date.'</td></tr>
      	';
      	$inboxcount++;
	}
echo '
    	<div class="column span9">
      	<table class="table table-striped">
        	
        		<thead><tr><th>Favorite</th><th>Sender</th><th>Message</th><th>Date</th></tr></thead>
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