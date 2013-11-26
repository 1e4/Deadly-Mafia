<?
session_start();


include_once "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
echo "$style"; 

include_once"probe.php";
$page="sendpointstest.php";
script_check($page);

$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$bank = mysql_fetch_object(mysql_query("SELECT * FROM points WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($bank->owner) == strtolower($fetch->username)){
include_once"bankCP.php";
exit();
}else{

$last = $fetch->banktime - time();





////SEND////


if($_POST['Send_button']){
$send_amount=intval(strip_tags($_POST['send_amount']));

$to_person = strip_tags($_POST['to_person']);
	if (!$to_person){
	echo "Please enter a username.";
	}elseif ($to_person){

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

if ($num_true == 0){
echo "No such user."; 
}elseif ($num_true != 0){
	
	if ($send_amount > "0"){
		if ($send_amount == 0 || !$send_amount || ereg('[^0-9]',$send_amount)){
	print "You cant send that amount.";
	
}elseif ($send_amount != 0 || $send_amount || !ereg('[^0-9]',$send_amount)){



	if ($send_amount > $fetch->points){
	echo "You do not have that much points to send.";
	}elseif ($send_amount <= $fetch->points){
	

	if (strtolower($to_person) == strtolower($username)){
	echo "You cannot send the points to yourself";
	}elseif (strtolower($to_person) != strtolower($username)){
	
$to_user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

	
	$otheruser = $send_amount - round($send_amount * $fetch_points->send_intrest /100);
$ban_owner_get=round($send_amount * $fetch_points->send_intrest /100);

$otheruser=$to_user->points + $otheruser;
	mysql_query("UPDATE users SET points = points-$send_amount WHERE username='$username'");
	mysql_query("UPDATE users SET points = '$otheruser' WHERE username='$to_person'");
	
mysql_query("UPDATE users SET points = points+$ban_owner_get WHERE username='$fetch_points->owner'");
mysql_query("UPDATE points SET profit = profit+$ban_owner_get WHERE username='$to_person'");
$gmt_time = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `pointstransfers` ( `id` , `to` , `from` , `amount` , `date` ) 
VALUES (
'', '$to_person', '$username', '$send_amount', '$gmt_time'
);") or die (mysql_error());



echo "Successful transaction";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=sendpointstest.php\">";
}
}}}}}}





?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/in.css type=text/css>
</head>

<body>
<form action="" method=POST>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header"><center>
      Points Transfer 
    </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><div align="center">Welcome to your points control panel! </div></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td height="8" colspan="3"><center class=Tableheading>
              Your account:</center></td>
        </tr>
        <tr> 
          <td height="2" colspan="3">&nbsp;</td>
        </tr>
        <tr> 
          <td height="3" colspan="3">&nbsp;</td>
        </tr>
        <tr> 
          <td width="44%" height="19"><span  style="FONT-WEIGHT:bold">Points:</span>
						<span  ></span></td>
          <td width="56%" colspan="2"><?php echo "".makecomma($fetch->points).""; ?></td>
        </tr>
        <tr> 
          <td height="0" colspan="3"><center class=Tableheading>
              Send Points 
          </center></td>
        </tr>
        <tr> 
          <td height="-1">To: </td>
          <td height="-1" colspan="2"><input name="to_person" type="text" id="to_person"></td>
        </tr>
        <tr> 
          <td height="-2">Message to include:</td>
          <td height="-2" colspan="2"><input type="text" name="textfield"></td>
        </tr>
        <tr> 
          <td height="-3">Amount:</td>
          <td height="-3" colspan="2"><input name="send_amount" type="text" id="send_amount"></td>
        </tr>
        <tr> 
          <td height="-3" colspan="3"><div align="right">
              <input name="Send_button" type="submit" id="Send_button" value="Send">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header" colspan=4><center>
        Last 10 recieved (Show all) 
      </center></td>
  </tr>
  <tr> 
    <td> <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>From</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
        <? $k=mysql_query("SELECT * FROM `pointstransfers` WHERE `to`='$username' ORDER BY id DESC LIMIT 10");
       while($p=mysql_fetch_object($k)){
	   echo "
	   <tr>
          <td>$p->id</td>
          <td><a href='profile.php?viewuser=$p->from'>$p->from</a></td>
          <td>£".makecomma($p->amount)."</td>
          <td>$p->date</td>
        </tr>";
		}
		?>
      </table></td>
  </tr>
</table>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
     <td class="header" colspan=4><center>
        Last 10 sent (Show all) 
      </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>To</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>

  
  <? $ka=mysql_query("SELECT * FROM `pointstransfers` WHERE `from`='$username' ORDER BY id DESC LIMIT 10");
       while($pa=mysql_fetch_object($ka)){
	   echo "
	   <tr>
          <td>$pa->id</td>
          <td><a href='profile.php?viewuser=$pa->to'>$pa->to</a></td>
          <td>£".makecomma($pa->amount)."</td>
          <td>$pa->date</td>
        </tr>";
		}
		?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php if ($fetch_points->owner == "0"){ echo "<p><center>This bank is not owned</center>"; }else{ echo "<p><center>This bank is owned by <b><a href='profile.php?viewuser=$fetch_bank->owner'>$fetch_bank->owner</a></b></center>";  } ?>


<?php } ?>
 <?php echo"<p>"; include_once"includes/footer.php"; ?>

