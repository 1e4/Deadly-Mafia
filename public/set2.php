<?php
session_start();


include_once "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
echo "$style"; 



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch_bank= mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$fetch->location'"));

$bank = mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($fetch_bank->owner) == strtolower($fetch->username)){
include_once"bankCP.php";
exit();
}else{

$last = $fetch->banktime - time();

if($_POST['with'] && $_POST['with1']){
$with_amount=strip_tags($_POST['with']);
	
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

mysql_query("UPDATE users SET money = '$money_plus', bank='0', banktime='0' WHERE username='$username'");
}elseif($money_minus != "0"){

mysql_query("UPDATE users SET money = '$money_plus', bank='$money_minus' WHERE username='$username'");

	}
echo "You withdrew £$with_amount";
}}}}
/////IF THEY DEPOSIT:




if((strip_tags($_POST['dep_amount'])) && (strip_tags($_POST['Dep_button']))){


	$dep_amount=strip_tags($_POST['dep_amount']);
	
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

	mysql_query("UPDATE users SET money = '$user_loose', bank='$bank_add', banktime='$timewait' WHERE username='$username'");

echo "Money deposited";
}}}}


////SEND////


if($_POST['Send_button']){
$send_amount=strip_tags($_POST['send_amount']);

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



	if ($send_amount > $fetch->money){
	echo "You do not have that much money to send.";
	}elseif ($send_amount <= $fetch->money){
	

	if (strtolower($to_person) == strtolower($username)){
	echo "You cannot send the money to yourself";
	}elseif (strtolower($to_person) != strtolower($username)){
	
$to_user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

	

$otheruser = $send_amount - round($send_amount * $fetch_bank->send_intrest /100);
$bank_owner_get=round($send_amount * $fetch_bank->send_intrest /100);
$bankgets = $send_amount - $otheruser;
$otheruser=$to_user->money + $otheruser;
	mysql_query("UPDATE users SET money = money-$send_amount WHERE username='$username'");
	mysql_query("UPDATE users SET money = '$otheruser' WHERE username='$to_person'");
	
	
	



echo "Successful transaction";
}
}}}}}}





?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/in.css type=text/css>
</head>

<body>
<form action="bank.php" method="post">
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header"><center>
      Set money 
    </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><div align="center">use the fields to set a users cash </div></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td height="0" colspan="3"><center class=Tableheading>
              Set money 
          </center></td>
        </tr>
        <tr> 
          <td width="44%" height="-1">To: </td>
          <td width="56%" height="-1" colspan="2"><input name="to_person" type="text" id="to_person"></td>
        </tr>
        <tr> 
          <td height="-2">&nbsp;</td>
          <td height="-2" colspan="2">&nbsp;</td>
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
</form>
<p>&nbsp;</p>
</body>
</html>


<?php } ?>
 <?php echo"<p>"; include_once"includes/footer.php"; ?>

