<?php
session_start();


include_once "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
echo "$style"; 


		
	
/////IF THEY DEPOSIT:





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



	if ($send_amount = 0){
	echo "You cant set cash";
	}elseif ($send_amount <= $fetch->money){
	

	if (strtolower($to_person) == strtolower($username)){
	echo "You cannot send the money to yourself";
	}elseif (strtolower($to_person) != strtolower($username)){
	
$to_user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

	
	
$otheruser=$to_user->money + $otheruser;
	mysql_query("UPDATE users SET money = $send_amount WHERE username='$username'");
	mysql_query("UPDATE users SET money = '$send_amount' WHERE username='$to_person'");
	
	
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
      Set users cash 
    </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><div align="center">Type in the users cash to set it to. </div></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td height="3" colspan="3">&nbsp;</td>
        </tr>
        <tr> 
          <td height="0" colspan="3"><center class=Tableheading>
              Set money
          </center></td>
        </tr>
        <tr> 
          <td width="44%" height="-1">Name</td>
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

