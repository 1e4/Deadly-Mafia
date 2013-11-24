<?php include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck();
$username=$_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);

$bank = mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($bank->owner) != strtolower($fetch->username)){
exit();
}else{
if (strip_tags($_POST['Submit'])){
if (strip_tags($_POST['drop']) == "Yes"){
mysql_query("UPDATE bank SET owner='0' WHERE location='$fetch->location'");
}elseif (strip_tags($_POST['give_to'] != "")){
$give_to=strip_tags($_POST['give_to']);
$find=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$give_to'"));
if ($find == "0"){
echo "No such user.";
}elseif ($find != "0"){
mysql_query("UPDATE bank SET owner='$give_to' WHERE location='$fetch->location'");
}

}

if (strip_tags($_POST['tran_rate'])){
$tran_rate=strip_tags($_POST['tran_rate']);

if ($tran_rate > "25" || $tran_rate < "5"){
echo "The transfer rate should be under 25% and bigger than 5%";


}elseif ($tran_rate < "25" || $tran_rate > "5"){
mysql_query("UPDATE bank SET send_intrest='$tran_rate' WHERE location='$fetch->location'");
echo "Bank transfer rate has been set";

}
}





///THEsE 2 are imporant;)
}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="" method=POST>
<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class=header background="images/grad.jpg"><center>
        BankCP</center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="50%">Current transfer rate:</td>
          <td width="50%"><?php echo "$bank->send_intrest%"; ?></td>
        </tr>
        <tr> 
          <td>Profit made:</td>
          <td><?php echo "£".makecomma($bank->profit).""; ?></td>
        </tr>
        <tr> 
          <td>Set transfer rate:</td>
          <td><input name="tran_rate" type="text" id="tran_rate"></td>
        </tr>
        <tr> 
          <td>Drop:</td>
          <td><select name="drop" id="drop">
              <option value="No">Dont drop</option>
              <option value="Yes">Drop</option>
            </select></td>
        </tr>
        <tr> 
          <td>Or give to:</td>
          <td><input name="give_to" type="text" id="give_to"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="right">
              <input type="submit" name="Submit" value="Submit">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table></form>
</body>
</html>
