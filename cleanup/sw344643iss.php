<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();


$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if (strip_tags($_GET['open'])=="new_acc"){
if ($fetch->atm!="False"){die("You already got an account!");}
$acca=rand(10000,10000000);
$pina=rand(10000,10000000);

$chk=mysql_fetch_object(mysql_query("SELECT * FROM swiss WHERE account='$acca'"));
if($chk->pin!=''){die("Error, please try again!");}
mysql_query("INSERT INTO `swiss` ( `id` , `account` , `pin`)
VALUES (
'', '$acca', '$pina'
)");

echo "Welcome,<br>You have just openend a bank account<br>Your account number is: <b>$acca</b> and your pin is: <b>$pina</b><br><B>Do not lose this code, as you will not be able to recover it!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` )
VALUES (
'', '$username', '$username', '$accatxt', '$date', '0'
)");
mysql_query("UPDATE users SET atm='True' WHERE username='$username'");
}
if (strip_tags($_POST['Submit']) && strip_tags($_POST['account']) && strip_tags($_POST['pin']) && strip_tags($_POST['money']) && strip_tags($_POST['option'])){
$account=intval(strip_tags($_POST['account']));
$pin=intval(strip_tags($_POST['pin']));
$cash=intval(strip_tags($_POST['money']));
$option=strip_tags($_POST['option']);
		if (!$pin || !$account || !$cash){
	print "You haven't entered the information needed'.";
	
}elseif ($pin&&$account&&$cash){

if ($option=="dep"){
if ($cash > $fetch->money || 0 >= $cash){
echo "You dont have enough money";
}elseif ($cash <= $fetch->money && $cash > 0){
$new_money=$fetch->money - $cash;

$chk=mysql_fetch_object(mysql_query("SELECT * FROM swiss WHERE account='$account' AND pin='$pin'"));
$new_bank=$chk->money;
if($new_bank <> ''){
  $new_bank=$chk->money+$cash;
}
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
mysql_query("UPDATE swiss SET money='$new_bank' WHERE account=$account AND pin=$pin");
$invite_text="You've deposited <b>$cash</b> pounds to your swiss account nr: <b>$account</b><br>You now have $new_bank pounds in your banking account!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$username', '$username', '$invite_text', '$date', '0'
)");

echo "Transaction succesfully done!";
}
}elseif($option=="with"){
  $chk=mysql_fetch_object(mysql_query("SELECT * FROM swiss WHERE account='$account' AND pin='$pin'"));
if ($cash > $chk->money || 0 >= $cash){
echo "You dont have enough money in your banking account";
}elseif ($chk->money >= $cash){
$new_money=$fetch->money + $cash;
$new_bank=$chk->money;
if($new_bank <> ''){
  $new_bank=$chk->money-$cash;
}
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
mysql_query("UPDATE swiss SET money='$new_bank' WHERE account=$account AND pin=$pin");
$invite_text="You've withdraw <b>$cash</b> pounds to your swiss account nr: <b>$account</b><br>You now have $new_bank pounds in your banking account!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` )
VALUES (
'', '$username', '$username', '$invite_text', '$date', '0'
)");

echo "Transaction succesfully done!";
}
}
}}
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="774" border="0" align="center" cellpadding="0" cellspacing="2">
    <!--DWLayoutTable-->
    <tr> 
      <td width="387" height="108" valign="top"> <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td  background="includes/grad.jpg"><div align="center">Create swiss 
                bank account</div></td>
          </tr>
          <tr> 
            <td height="25"> <div align="center"> 
                <?php if($fetch->atm=="False"){echo"<a href=?open=new_acc>Click here to open an account!</a>";}else{ echo "You already have an account."; }?>
              </div></td>
          </tr>
        </table></td>
      <td width="387" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td background="includes/grad.jpg" colspan="2"><div align="center">Check 
                balance</div></td>
          </tr>
          <tr bgcolor=white> 
            <td class=tip colspan="2"><div align="center">Input both fields</div></td>
          </tr>
          <tr> 
            <td width="192" height="18">Account number:</td>
            <td width="178"><input name="check_account" type="text" id="check_account"></td>
          </tr>
          <tr> 
            <td height="9">Account pin:</td>
            <td height="9"><input name="check_pin" type="password" id="check_pin"></td>
          </tr>
          <?php if (strip_tags($_POST['check_button']) && strip_tags($_POST['check_account']) && strip_tags($_POST['check_pin'])){
	   $select =mysql_query("SELECT * FROM swiss WHERE account='$check_account' AND pin='$check_pin'");
	   $nums=mysql_num_rows($select);
	   $k=mysql_fetch_object($select);
	   if ($nums == "0"){ echo "<tr><td colspan=2>No account found.</td></tr>"; }
	   
	  ?>
          <tr> 
            <td height="9">Balance:</td>
            <td height="9"><?php echo "£".makecomma($k->money)."" ?></td>
          </tr>
          <? }
	   ?>
          <tr> 
            <td height="25"><div align="right"> 
                <input name="check_button" type="submit" id="check_button" value="Submit">
              </div></td>
            <td height="25">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="133"> <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td background="includes/grad.jpg" colspan="2"><div align="center">Alter 
                account</div></td>
          </tr>
          <tr bgcolor=white> 
            <td class=tip colspan="2"><div align="center">Input both fields</div></td>
          </tr>
          <tr> 
            <td width="192" height="18">Account number:</td>
            <td width="178"><input name="account" type="text" id="account"></td>
          </tr>
          <tr> 
            <td height="9">Account pin:</td>
            <td height="9"><input name="pin" type="password" id="pin"></td>
          </tr>
          <tr> 
            <td height="4" colspan="2"><div align="center"> 
                <input name="option" type="radio" value="with" checked>
                Withdraw! - 
                <input type="radio" name="option" value="dep">
                Deposit!</div></td>
          </tr>
          <tr> 
            <td height="5">Amount:</td>
            <td height="5"><input name="money" type="text" id="money"></td>
          </tr>
          <tr> 
            <td height="25"><div align="right"> 
                <input name="Submit" type="submit" id="Submit" value="Submit">
              </div></td>
            <td height="25">&nbsp;</td>
          </tr>
        </table></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>


<?php include_once"includes/footer.php"; ?>

