<?php include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck();
$username=$_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);
echo "$style";

$bf = mysql_fetch_object(mysql_query("SELECT * FROM bf WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($bf->owner) != strtolower($fetch->username)){
exit();
}else{
if (strip_tags($_POST['Submit'])){
if (strip_tags($_POST['drop']) == "Yes"){
mysql_query("UPDATE bf SET owner='0' WHERE location='$fetch->location'");
}elseif (strip_tags($_POST['give_to'] != "")){
$give_to=strip_tags($_POST['give_to']);
$find=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$give_to'"));
if ($find == "0"){
echo "No such user.";
}elseif ($find != "0"){
mysql_query("UPDATE bf SET owner='$give_to' WHERE location='$fetch->location'");
}

}

if (strip_tags($_POST['bullet_price'])){
$bullet_price=intval(strip_tags($_POST['bullet_price']));
if ($bullet_price == 0 || !$bullet_price || ereg('[^0-9]',$bullet_price)){
	print "Invalid price.";
exit();
}elseif ($bullet_price != 0 && $bullet_price && !ereg('[^0-9]',$bullet_price)){

if ($bullet_price >= "50000" || $bullet_price <= 100){
echo "Bullet factory prce must be cheaper than 50,000 per bullet. and more expensive than £100";
}elseif ($bullet_price < "1000000" || $bullet_price > 100){



mysql_query("UPDATE bf SET price ='$bullet_price' WHERE location='$fetch->location' AND owner='$username'");
}}}
/////END BULLET FACOTRY PRICE PER BULLET CHANGING
if (strip_tags($_POST['production']) == "Yes" || (strip_tags($_POST['production']) == "No")){
$production=$_POST['production'];
mysql_query("UPDATE bf set producing='$production' WHERE location='$fetch->location'");

}

echo "Bullet factory settings have been applied.";
}
if (strip_tags($_GET['reset']) == "confirm"){
mysql_query("UPDATE bf SET profit='0' WHERE location='$fetch->location'");
echo "Profits reset";
}

?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/in.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td class=header><center>
         Bullet factory CP</center></td>
    </tr>
	<tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td colspan="2" bgcolor="#666666"><span class="style1">Welcome to your bullet factory control panel here 
              you can check the status of your bullet factory and change the bullet 
              price and producing status. It costs &pound;10000 to produce a batch of bullets and 100 will be produced per hour.</span></td>
          </tr>
          <tr> 
            <td colspan="2" bgcolor="#666666"><span class="style1"></span></td>
          </tr>
          <tr> 
            <td width="44%" bgcolor="#666666"><span class="style1">Current price:</span></td>
            <td width="56%" bgcolor="#666666"><span class="style1"><?php echo "£".makecomma($bf->price).""; ?>&nbsp;</span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Current status:</span></td>
            <td width="56%" bgcolor="#666666"><span class="style1"><?php echo "$bf->producing"; ?>&nbsp;</span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Profit so far:</span></td>
            <td bgcolor="#666666"><span class="style1"><?php echo "£".makecomma($bf->profit).""; ?><a href="?reset=confirm">(Reset</a>)</span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Price per bullet:</span></td>
            <td width="56%" bgcolor="#666666"><input name="bullet_price" type="text"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Producing status:</span></td>
            <td bgcolor="#666666"><span class="style1">
              <select name="production" id="production">
                <option value="Yes" <?php if ($bf->producing == "Yes"){ echo "selected"; } ?>>Producing</option>
                <option value="No" <?php if ($bf->producing == "No"){ echo "selected"; } ?>>Stop production</option>
                </select>
            </span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Drop: </span></td>
            <td bgcolor="#666666"><span class="style1">
              <select name="drop" id="drop">
                <option>Dont drop</option>
                <option>Drop</option>
                </select>
            </span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Or Give to:</span></td>
            <td bgcolor="#666666"><input name="give_to" type="text" id="give_to"></td>
          </tr>
          <tr> 
            <td colspan="2" bgcolor="#666666"><div align="right" class="style1"> 
                <input type="submit" name="Submit" value="Submit">
            </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php } ?>