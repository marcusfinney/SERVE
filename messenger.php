<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Bootply.com - Layout - Gmail style w/grid</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">

        <!-- CSS code from Bootply.com editor -->
    <style type="text/css">
            /* bootstrap overrides */
html, body {
    height: 100%;
}

.row-fluid {
    height: 100%;
}

.column:before, .column:after {
    content: "";
    display: table;
}

.column:after {
    clear: both;
}

.column {
    height: 100%;
    overflow: auto;
}

.box {
  	bottom: 0; /* increase for footer use */
    left: 0;
    position: absolute;
    right: 0;
    top: 46px;
}

.span9.full {
    width: 100%;
}
        </style>
    </head>
    <!-- HTML code from Bootply.com editor -->
    <body>
        <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">SERVE. Messenger</a>
      <div class="btn-group pull-right">
        <a class="btn ilightbox-member-1" href='profile.php?studentID=<?php echo $_SESSION["userrecord"]["studentID"]; ?>' title="team member">
          <i class="icon-user"></i> View Profile
        </a>
      </div>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active" id="inbox"><a href="#inbox"><i class="icon-inbox"></i> Inbox</a></li>
          <li class="" id="compose"><a href="#compose"><i class="icon-edit"></i> Compose</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
<div class="box">
  <div class="row-fluid">
    <div class="column span3">
      <ul class="nav nav-list nav-fixed-sidebar">
        <li class="nav-header">Mailbox</li>
        <?php
				include 'config.php';
				mysql_connect($host, $user, $password) or die("cant connect");
				mysql_select_db($database) or die(mysql_error());

				$sessionuser = $_SESSION["userrecord"]["studentID"];

				$inbox = "SELECT * 
  				    	FROM Messenger
   					   	WHERE recipientID='{$sessionuser}'";

						$mymessages = mysql_query($inbox)or die('Invalid query: ' .mysql_error());
						$numberofinboxes = mysql_num_rows($mymessages);
				
				$num = 1;		
				$fav = "SELECT * 
  				    	FROM Messenger
   					   	WHERE recipientID='{$sessionuser}'
   					   	AND starred='{$num}'";

						$mymessages = mysql_query($fav)or die('Invalid query: ' .mysql_error());
						$numberoffavs = mysql_num_rows($mymessages);
				
				$sent = "SELECT * 
  				    	FROM Messenger
   					   	WHERE senderID='{$sessionuser}'";

						$mymessages = mysql_query($sent)or die('Invalid query: ' .mysql_error());
						$numbersent = mysql_num_rows($mymessages); 
        ?>
        <li class="" id="inbox"><a href="#inbox"><i class="icon-inbox"></i> Inbox (<?php echo $numberofinboxes; ?>)</a></li>
        <li class="" id="starred"><a href="#starred"><i class="icon-star-empty"></i> Favorites (<?php echo $numberoffavs; ?>)</a></li>
        <li class="" id="sent"><a href="#sent"><i class="icon-user"></i> Sent (<?php echo $numbersent; ?>)</a></li>
        <li class="divider"></li>
        <li class="nav-header">Recent People</li>
        <?php
        		include 'config.php';

				$studentID = $_SESSION["userrecord"]["studentID"];

				mysql_connect($host, $user, $password) or die("cant connect");
				mysql_select_db($database) or die(mysql_error());

				$sql = "SELECT DISTINCT recipientID, senderID 
       			 		FROM Messenger
        				WHERE senderID='{$studentID}'
        				OR recipientID='{$studentID}'";

				$recent = mysql_query($sql)or die('Invalid query: ' .mysql_error());
				$mostrecent = mysql_num_rows($recent); 
				$names=array();
				$idcount = 0;
				if ($mostrecent == 0) 
				{
				}
				else
				{
					while ($row = mysql_fetch_assoc($recent)) 
    				{
    					//$sendID = $row['senderID'];
    					$recID = $row['recipientID'];
    					
    					//$IDs[$idcount] = $sendID; $idcount++;
    					$IDs[$idcount] = $recID;  $idcount++;
    				}
    				$i = 0;
    				while($i<$idcount)
    				{
    					$sql2 = "SELECT * 
                		FROM Student
                		WHERE studentID='{$IDs[$i]}'
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
            					$sender = $stud['firstName'];
                				$sender2 = $stud['lastName'];
                				$name = $sender.' '.$sender2;
                				$names[] = $name;
                				$studcount++;
           					}
        				}
    					echo '<li id="compose" class="" ><a href="#compose">'.$name.'</a></li>';
    					$i++;
    				}
				}
        ?>
      </ul>
    </div>
    <m id="div1"></m>
  </div>
</div>
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type='text/javascript' src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
        <script type='text/javascript'>
        $(document).ready(function() {
            $.fn.pageMe = function(opts){

    var $this = this,
        defaults = {
            perPage: 7
        },
        settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
        console.log(children.size());
    }

    if (typeof settings.pagerSelector!="undefined") {
        console.log(settings.pagerSelector);
        pager = $(settings.pagerSelector);
    }

    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);
    pager.data("curr",0);
    var curr = 0;

    while(numPages > curr){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }    

    pager.find('.page_link:first').addClass('active');
    children.css('display', 'none');
    children.slice(0, perPage).css('display', '');

    pager.find('li a').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
    });

    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        if($('.active').prev('.page_link').length==true){
            goTo(goToPage);
        }
    }
    
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        if($('.active_page').next('.page_link').length==true){
            goTo(goToPage);
        }
    }

    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        children.css('display','none').slice(startAt, endOn).css('display','');
        pager.attr("curr",page);
    }
};

$('#listStuff').pageMe({pagerSelector:'#listStuffPager',childSelector:'tr',perPage:15});
        });
        </script>
        <script type='text/javascript'>			
			$('li').click(function()
			{
  				$('li.active').removeClass('active');
  				$(this).addClass('active');  
  				if($("li.active").is("#inbox"))
				{
					$("#div1").load("inbox.php");
				}
				else if($("li.active").is("#sent"))
				{
  					$("#div1").load("sent.php");
				}
				else if($("li.active").is("#starred"))
				{
  					$("#div1").load("starred.php");
				}
				else if($("li.active").is("#compose"))
				{
  					$("#div1").load("compose.php");
				}	
				else if($("submit").is("#compose"))
				{
  					$("#div1").load("compose.php");
				}				
			});
			if($("li.active").is("#inbox"))
				{
					$("#div1").load("inbox.php");
				}
				else if($("li.active").is("#sent"))
				{
  					$("#div1").load("sent.php");
				}
				else if($("li.active").is("#starred"))
				{
  					$("#div1").load("starred.php");
				}
				else if($("li.active").is("#compose"))
				{
  					$("#div1").load("compose.php");
				}

		</script>
    </body>
</html>