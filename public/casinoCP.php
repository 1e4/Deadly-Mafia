<?php session_start(); include_once"includes/db_connect.php"; include_once "includes/functions.php"; logincheck(); $username=$_SESSION['username'];

function casinoCP($typo){

$username=$_SESSION['username'];
$query2=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch = mysql_fetch_object($query2);

$stff = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='$typo'"));


if (strtolower($fetch->username) == strtolower($stff->owner)){

if (strip_tags($_POST['Submit_change_settings'])){
if (strip_tags($_POST['set_max_bet'])){
$set_max_bet=intval(strip_tags($_POST['set_max_bet']));
	
		if ($set_max_bet > "0"){
		if ($set_max_bet == 0 || !$set_max_bet){
	print "Invalid input";
	
}elseif ($set_max_bet != 0 || $set_max_bet){
mysql_query("UPDATE casinos SET max='$set_max_bet' WHERE location='$fetch->location' AND casino='$typo'");
}
}
}
if (strip_tags($_POST['drop']) == "Yes"){
mysql_query("UPDATE casinos SET owner='0' WHERE location='$fetch->location' AND casino='$typo'");
mysql_query("UPDATE casinos SET max='0' WHERE location='$fetch->location' AND casino='$typo'");

}elseif(strip_tags($_POST['give_to']) != ""){
$give_to=strip_tags($_POST['give_to']);
$check_exist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$give_to'"));
if ($check_exist == "0"){ ?><div align="center"><font color="#FFFFFF"><?
echo "That user does not exist"; ?></font></div><?
}elseif ($check_exist != "0"){

mysql_query("UPDATE casinos SET owner='$give_to' WHERE location='$fetch->location' AND casino='$typo'");
mysql_query("UPDATE casinos SET max='0' WHERE location='$fetch->location' AND casino='$typo'");

}
}
} ?><div align="center"><font color="#FFFFFF"><?
echo "Casino settings updated"; ?></font></div><?



}
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="72%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td class=header> <center>
          Casino CP </center></td>
    </tr>
    <tr> 
      <td height="27"> <table width="100%" border="0" cellpadding="0" cellspacing="3" bgcolor="#666666">
          <tr> 
            <td width="46%"><span class="style1">Set Maxbet</span></td>
            <td width="54%"><input name="set_max_bet" type="text" id="set_max_bet2" maxlength="10"></td>
          </tr>
          <tr> 
            <td><span class="style1">Drop</span></td>
            <td><select name="drop" id="drop">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select></td>
          </tr>
          <tr> 
            <td><span class="style1">Or Give to</span></td>
            <td><input name="give_to" type="text" id="give_to2" maxlength="40"></td>
          </tr>
          <tr>
            <td>Max</td>
            <td><span class="style1"><?php echo "£".makecomma($stff->max).""; ?></span></td>
          </tr>
          <tr> 
            <td><span class="style1">Profit</span></td>
            <td><span class="style1"><?php echo "£".makecomma($stff->profit).""; ?></span></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="Submit_change_settings" type="submit" id="Submit_change_settings" value="Edit casino settings"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html><?php } ?>
