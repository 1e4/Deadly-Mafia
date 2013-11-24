<?php
session_start();
 include_once "includes/db_connect.php"; include_once "includes/functions.php"; logincheck();
$username=$_SESSION['username'];
echo "$style";
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);

$shop=mysql_fetch_object(mysql_query("SELECT * FROM shop WHERE location='$fetch->location'"));
$owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$shop->owner'"));
if (strtolower($shop->owner) == strtolower($username)){
if (strip_tags($_POST['Submit'])){
if (strip_tags($_POST['drop']) == "Yes"){
mysql_query("UPDATE shop SET owner ='0' WHERE location='$fetch->location'");
echo "Shop dropped<br>";
}elseif (strip_tags($_POST['give_to'])){
$give_to=strip_tags($_POST['give_to']);

$check_query=mysql_query("SELECT * FROM users WHERE username='$give_to'");
$check =mysql_num_rows($check_query);
$fetch_check =mysql_fetch_object($check_query);

if ($check =="0" || $fetch_check->status == "Dead" || $fetch_check->status =="Banned"){
echo "No such user.";
}elseif ($check != "0" && $fetch_check->status != "Dead" && $fetch_check->status !="Banned"){
mysql_query("UPDATE shop SET owner='$give_to' WHERE location='$fetch->location'");
echo "Shop given away";
}}



}
if (strip_tags($_GET['reset'])){
mysql_query("UPDATE shop SET profit='0' WHERE location='$fetch->location'");
echo "Profit reset.";
}

?>




<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="72%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr> 
      <td width="396" height="22" background="<?php echo "$gradient"; ?>"><center class="TableHeading">
          UndergroundCP </center></td>
    </tr>
    <tr> 
      <td height="27" valign="top"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
          <tr> 
            <td width="50%">Total profit</td>
            <td width="50%"><?php echo "£".makecomma($shop->profit).""; ?>(<a href="?reset=yes">Reset</a>)</td>
          </tr>
          <tr> 
            <td>Drop</td>
            <td><select name="drop" id="select">
                <option value="No">Dont Drop</option>
                <option value="Yes">Drop</option>
              </select></td>
          </tr>
          <tr> 
            <td>Or Give to:</td>
            <td><input name="give_to" type="text" id="give_to"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Submit"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html><?php } ?>
