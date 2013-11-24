<?
session_start();


include "includes/functions.php";
logincheck();
$info->username=$_SESSION['info->username'];
include "includes/db_connect.php";
echo "$style"; 

$page="bank.php";

$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$info->username'"));
$fetch_bank= mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$fetch->location'"));

$bank = mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($bank->owner) == strtolower($fetch->info->username)){
include_once"bankCP.php";
exit();
}else{

$last = $fetch->banktime - time();



/////CHECK IF INTREST TIME IS UP


/////CHECK IF INTREST TIME IS UP
////MOV ONTO WITHDRAW

if(strip_tags($_POST['With_button']) && (strip_tags($_POST['with_amount']))){
$with_amount=intval(strip_tags($_POST['with_amount']));
	
		if ($with_amount > "0"){
		if ($with_amount == 0 || !$with_amount || ereg('[^0-9]',$with_amount)){
	print "You cant withdraw that amount.";
	
}elseif ($with_amount != 0 && $with_amount && !ereg('[^0-9]',$with_amount)){
	if ($with_amount > $fetch->bank){
	echo "You dont have that much in the bank.";
	}elseif ($with_amount <= $fetch->bank){
	$money_plus = $fetch->money + $with_amount;
	$money_minus = $fetch->bank - $with_amount;
	if ($money_minus == "0"){

mysql_query("UPDATE users SET money = '$money_plus', bank='0', banktime='0' WHERE info->username='$info->username'");
}elseif($money_minus != "0"){

	mysql_query("UPDATE users SET money = '$money_plus', bank='$money_minus' WHERE info->username='$info->username'");

	}
echo "You withdrew £$with_amount";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank.php\">";
}}}}
/////IF THEY DEPOSIT:




if(strip_tags($_POST['dep_amount']) && (strip_tags($_POST['Dep_button']))){


	$dep_amount=intval(strip_tags($_POST['dep_amount']));
	
		if ($dep_amount > "0"){
		if ($dep_amount == 0 || !$dep_amount || ereg('[^0-9]',$dep_amount)){
	print "You cant deposit that amount.";
	
}elseif ($dep_amount != 0 && $dep_amount && !ereg('[^0-9]',$dep_amount)){



	if ($dep_amount > $fetch->money){
	echo "You do not have that much money";
	}elseif ($dep_amount <= $fetch->money){
	$user_loose = $fetch->money - $dep_amount;
	$bank_add = $dep_amount;


	$ha = 3600*24;
		$timewait=time()+ $ha;

	mysql_query("UPDATE users SET money = '$user_loose', bank='$bank_add', banktime='$timewait' WHERE info->username='$info->username'");

echo "Money deposited";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank.php\">";
}}}}


////SEND////


if($_POST['Send_button']){
$send_amount=intval(strip_tags($_POST['send_amount']));

$to_person = strip_tags($_POST['to_person']);
	if (!$to_person || ereg('[^A-Za-z0-9 _]',$to_person)){
	echo "Please enter a username.";
	}elseif ($to_person){

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE info->username='$to_person'"));

if ($num_true == 0){
echo "No such user."; 
}elseif ($num_true != 0){
	
	if ($send_amount > "0"){
		if ($send_amount == 0 || !$send_amount || ereg('[^0-9]',$send_amount)){
	print "You cant send that amount.";
	
}elseif ($send_amount != 0 || $send_amount || !ereg('[^0-9]',$send_amount)){



	if ($send_amount > $fetch->money){
	echo "You do not have that much money to send.";
	}elseif ($send_amount <= $fetch->money){
	

	if (strtolower($to_person) == strtolower($info->username)){
	echo "You cannot send the money to yourself";
	}elseif (strtolower($to_person) != strtolower($info->username)){
	
$to_user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE info->username='$to_person'"));

	
	$otheruser = $send_amount - round($send_amount * $fetch_bank->send_intrest /100);
$ban_owner_get=round($send_amount * $fetch_bank->send_intrest /100);

$otheruser=$to_user->money + $otheruser;
	mysql_query("UPDATE users SET money = money-$send_amount WHERE username='$username'");
	mysql_query("UPDATE users SET money = '$otheruser' WHERE username='$to_person'");
	
mysql_query("UPDATE users SET money = money+$ban_owner_get WHERE username='$fetch_bank->owner'");
mysql_query("UPDATE bank SET profit = profit+$ban_owner_get WHERE username='$to_person'");
$gmt_time = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `transfers` ( `id` , `to` , `from` , `amount` , `date` ) 
VALUES (
'', '$to_person', '$info->username', '$send_amount', '$gmt_time'
);") or die (mysql_error());



echo "Successful transaction";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank.php\">";
}
}}}}}}





?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/in.css type=text/css>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<form action="" method=POST>

  </tr>
</table>
<br>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header" colspan=4><center>
        <span class="style1">Last 10 recieved (Show all)        </span>
    </center></td>
  </tr>
  <tr> 
    <td> <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>From</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
        <? $k=mysql_query("SELECT * FROM `transfers` WHERE `to`='$username' ORDER BY id DESC LIMIT 10");
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
        <span class="style1">Last 10 sent (Show all)        </span>
     </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>To</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>

  
  <? $ka=mysql_query("SELECT * FROM `transfers` WHERE `from`='$username' ORDER BY id DESC LIMIT 10");
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



<?php } ?>
