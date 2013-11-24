<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$query2=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch = mysql_fetch_object($query2);

$stff = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Roulette'"));

if (strtolower($fetch->username) == strtolower($stff->owner)){

if (strip_tags($_POST['Submit_change_settings'])){
if (strip_tags($_POST['set_max_bet'])){
$set_max_bet=intval(strip_tags($_POST['set_max_bet']));

		if ($set_max_bet > "0"){
		if ($set_max_bet == 0 || !$set_max_bet){
	print "Fuck off! Invalid input";

}elseif ($set_max_bet != 0 || $set_max_bet){
mysql_query("UPDATE casinos SET max='$set_max_bet' WHERE location='$fetch->location' AND casino='Roulette'");
}
}
}
if (strip_tags($_POST['set_max_off'])){
$set_max_off=intval(strip_tags($_POST['set_max_off']));

		if ($set_max_off > "0"){
		if ($set_max_off == 0 || !$set_max_off){
	print "You Cannot Set The offer To that";

}elseif ($set_max_off != 0 || $set_max_off){
mysql_query("UPDATE casinos SET offer='$set_max_off' WHERE location='$fetch->location' AND casino='Roulette'");
}
}
}
if (strip_tags($_POST['drop']) == "Yes"){
mysql_query("UPDATE casinos SET owner='0' WHERE location='$fetch->location' AND casino='Roulette'");

}elseif(strip_tags($_POST['give_to']) != ""){
$give_to=strip_tags($_POST['give_to']);
$check_exist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$give_to'"));
if ($check_exist == "0"){
echo "That user does appear to be in the DB:S";
}elseif ($check_exist != "0"){

mysql_query("UPDATE casinos SET owner='$give_to', profit='0' WHERE location='$fetch->location' AND casino='Roulette'");
}
}
echo "<font color=white><center>Roulette Altered</center></font>";



}
}
?>
<br>
<br>
<form name="form1" method="post" action="">
  <table width="35%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor=black>
    <tr>
      <td colspan=2 height=18 align=center BGCOLOR="0E0E0B"> <FONT FACE="Tahoma" SIZE="1" COLOR="#FFFFFF" > <B>Roulette Management</B></FONT></td>
    </tr>
<tr BGCOLOR="2F3028">
            <td height=18><font color="#FFFFFF">&nbsp;Profit</font></td>
            <td><font color="#FFFFFF">&nbsp;<?php echo "$".makecomma($stff->profit).""; ?></font></td>
    </tr>
<tr>
      <td colspan=2 height=18 align=center BGCOLOR="0E0E0B"> <FONT FACE="Tahoma" SIZE="1" COLOR="#FFFFFF" > <B>Max Bet</B></FONT></td>
</tr>
<tr BGCOLOR="2F3028">
            <td height=18><font color="#FFFFFF">&nbsp;Maximum Bet</font></td>
            <td><font color="#FFFFFF">&nbsp;<?php echo "$".makecomma($stff->max).""; ?></font></td>
    </tr>
<tr BGCOLOR="2F3028">
            <td width="46%"><font color="#FFFFFF">&nbsp;Set Maxbet</font></td>
            <td width="54%"><center>
              <font color="#FFFFFF">
              <input name="set_max_bet" style="background-color: #000000; bottom; background-repeat: repeat; border: none; cursor:pointer; height: 20px; width: 100px;border-left: 1px solid #C0C0C0; border-right: 1px solid #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" type="text" id="set_max_bet2" maxlength="20">
              </font>
            </center></td>
    </tr>
<tr>
      <td colspan=2 height=18 align=center BGCOLOR="0E0E0B"> <FONT FACE="Tahoma" SIZE="1" COLOR="#FFFFFF" > <B>Give/Drop</B></FONT></td>
</tr>
          <tr BGCOLOR="2F3028">
            <td><font color="#FFFFFF">&nbsp;Drop</font></td>
            <td><font color="#FFFFFF">
              <select name="drop" style="background-color: #000000; bottom; background-repeat: repeat; border: none; cursor:pointer; height: 20px; width: 100px;border-left: 1px solid #C0C0C0; border-right: 1px solid #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" id="drop">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </font></td>
          </tr>
          <tr BGCOLOR="2F3028">
            <td><font color="#FFFFFF">&nbsp;Send to </font></td>
            <td><center>
              <font color="#FFFFFF">
              <input name="give_to" style="background-color: #000000; bottom; background-repeat: repeat; border: none; cursor:pointer; height: 20px; width: 100px;border-left: 1px solid #C0C0C0; border-right: 1px solid #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" type="text" id="give_to2" maxlength="40">
              </font>
            </center></td>
          </tr>
          <tr BGCOLOR="2F3028">
            <td height=25 colspan=2 align=right><input name="Submit_change_settings" style="background-color: #000000; bottom; background-repeat: repeat; border: none; color: #FEFEFE; cursor:pointer; height: 20px;border-left: 1px solid #C0C0C0; border-right: 1px solid #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" type="submit" id="Submit_change_settings" value="Submit">&nbsp;</td>
          </tr>
        </table>
</form>
<BR><BR><BR>
