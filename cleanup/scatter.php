<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$find = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($find);
$choice=strip_tags($_GET['do']);
if ($fetch->last_chase > time()){ echo "You have to wait ".maketime($fetch->last_chase).""; exit(); }
if ($fetch->running == "0"){

////////////
if ($do == "1"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice. you got caught."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }

}elseif ($do == "2"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, he was too fast for you."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}elseif ($do == "3"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, it was a dead end."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}
/////////
}elseif ($fetch->running == "1"){
if ($do == "1"){

if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice. You think the cops are stupid or something?."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }

}elseif ($do == "2"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, the cops were back there!"; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}elseif ($do == "3"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, they spotted you."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}
//////
}elseif ($fetch->running == "2"){
if ($do == "1"){

if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice. you got caught."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }

}elseif ($do == "2"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, you made it look suspicious."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}elseif ($do == "3"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, you was spotted."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}

}elseif ($fetch->running == "3"){
if ($do == "1"){

if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice. you got caught."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }

}elseif ($do == "2"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, you made it look suspicious."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}elseif ($do == "3"){
$rand=rand(1,2);
if ($rand == "1"){ mysql_query("UPDATE users SET running=running+1 WHERE username='$username'"); }elseif ($rand == "2"){ echo "Bad choice, you was spotted."; mysql_query("UPDATE users SET last_chase='$timer' WHERE username='$username'"); }
}

}




elseif ($fetch->running == "4"){ $new_rank=$fetch->rankpoints + rand(1,5); $win=rand(30000,100000); $new_money=$fetch->money + $win; mysql_query("UPDATE users SET money='$new_money',rankpoints='$new_rank', running='0', last_chase='$timer' WHERE username='$username'");  }
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="74%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"><center>
        Scatter! </center></td>
  </tr>
  <tr bgcolor=#FFFFFF> 
    <td class=tip><div align="center">You need to get away from the cops quick.</div></td>
  </tr>
  <tr>
    <td ><div align="center">
	<?php  if ($fetch->running == "1"){ ?>
	<img src="images/scatter/first.jpg" width="300" height="300" border="1"><br>
        Youve just exited the bank with a suitcase full of money, you have a security 
        guard on your tail and only 5 bullets left in your gun what do you do?<br>
        [<a href="?do=1">Turn around and shoot</a>] [<a href="?do=2">Carry on 
        running</a>] [<a href="?do=3">Take the next cornor</a>]</div>
		
      <?
		}elseif ($fetch->running == "2"){
		
		?>
      <br>
      <div align="center"><img src="images/scatter/second.jpg" width="300" height="300" border="1"><br>
        You spot 2 police officers in their car do you<br>
        [<a href="?do=1">Start walking unsuspiciously</a>] [<a href="?do=2">Go 
        back</a>] [<a href="?do=3">Start running</a>]</div>
      <br>
      
      <br>
      <?
		}elseif ($fetch->running == "3"){
		
		?>
      <br> 
      <div align="center"><img src="images/scatter/third.jpg" width="300" height="300" border="1"><br>
        You see a car parked on the sidewalk, what do you do?<br>
        [<a href="?do=1">Try and hotwire it</a>] [<a href="?do=2">Ignore it and 
        carry on walking </a>] [<a href="?do=3">Start running</a>]</div>
      <br>

      <br>
      <?
		}elseif ($fetch->running == "4"){
		
		?>
      <br> <div align="center"><img src="images/scatter/second.jpg" width="300" height="300" border="1"><br>
        You spot 2 police officers in their car do you<br>
        [<a href="?do=1">Start walking unsuspiciously</a>] [<a href="?do=2">Go 
        back</a>] [<a href="?do=3">Start running</a>]</div>
      <br> 

      <br> 
      <?
		}elseif ($fetch->running == "5"){
		
		?>
      <br> 
      <div align="center"><img src="images/scatter/win.jpg" width="300" height="300" border="1"><br>
        Congratulations, you opened the breifcase and found &pound;<?php echo "".makecomma($win).""; ?>!<br>
      </div>
      <br> 
      <? } ?>
    </td>
  </tr>
  
</table>
</body>
</html>
