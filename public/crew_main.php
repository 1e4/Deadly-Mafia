<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch->crew'"));

if ($fetch->crew == $crew->name &&  strtolower($crew->rhm) != strtolower($username) &&  strtolower($crew->owner) != strtolower($username)){
include_once "crew_front.php";
exit();
}elseif ($fetch->crew == $crew->name  && strtolower($crew->rhm) == strtolower($username) ||  strtolower($crew->owner) == strtolower($username)){
////////////////////////////////////////////////////////////////////
$in = explode("-",$crew->income);
if (strip_tags($_POST['bus_button'])){
$type=strip_tags($_POST['type']);

if ($type == "1"){
$price = "25000";
$bit=$in[0]+1;
$new_income="$bit-$in[1]-$in[2]";

}elseif ($type == "2"){
$price = "125000";
$bit=$in[1]+1;
$new_income="$in[0]-$bit-$in[2]";

}elseif ($type == "3"){
$price = "500000";
$bit=$in[2]+1;
$new_income="$in[0]-$in[1]-$bit";
}else{
echo "Error";
exit();
}
if ($price > $fetch->money){
echo "You dont have enough money";
}elseif ($price <= $fetch->money){

$user_money = $fetch->money - $price;

mysql_query("UPDATE users SET money='$user_money' WHERE username='$username'");
mysql_query("UPDATE crews SET income='$new_income' WHERE name='$crew->name'");
echo "Buisness bought";
}}

if($reset=="fampayout"){
$new_payout = time() + (3600*24);
mysql_query("UPDATE crews SET payout='$new_payout' WHERE name='$crew->name'");
echo"Reseted family payout time!";
}
?><link rel=stylesheet href=includes/in.css type=text/css>
<form name="form1" method="post" action="">

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td class="header" colspan="4" > 
              <center>
                Crew members: </center></td>
          </tr>
          <tr bgcolor=white> 
            <td width="25%" height="21" class=tip>Username </td>
            <td width="25%" class=tip>Status</td>
            <td width="25%" class=tip>Money</td>
			<td width="25%" class=tip>Rank</td>
          </tr>
          <?php
		  $query=mysql_query("SELECT * FROM users WHERE crew='$crew->name'");
		  while($info_user=mysql_fetch_object($query)){
         echo"  <tr> 
            <td height=21><a href='profile.php?viewuser=$info_user->username'>$info_user->username</a></td>
            <td height=21>$info_user->status</td>
            <td height=21>£".makecomma($info_user->money)."</td>
			<td height=21>$info_user->rank</td>
          </tr>
        
    "; } echo "</tr>";
	?>
        </table></td>
    <tr> 
      <td>&nbsp;</td>
    <tr> 
      <td><table width="99%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td class="header" height="22"><center>
                Crew buisnesses </center></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td> <div align="center"> </div></td>
                  <td width="23%"><em><strong>&nbsp;Buisness</strong></em></td>
                  <td width="20%"><em><strong>Price</strong></em></td>
                  <td width="25%"><em><strong>Makes per day</strong></em></td>
                  <td width="25%"><em><strong>Current amount</strong></em></td>
                </tr>
                <tr> 
                  <td><input type="radio" name="type" value="1"></td>
                  <td width="23%">Crew Supplies </td>
                  <td>&pound;25,000</td>
                  <td>&pound;1000</td>
                  <td><?php echo "$in[0]"; ?>&nbsp;</td>
                </tr>
                <tr> 
                  <td width="7%"><input type="radio" name="type" value="2"></td>
                  <td>Antique copying</td>
                  <td>&pound;125,000</td>
                  <td>&pound;10,000</td>
                  <td><?php echo "$in[1]"; ?></td>
                </tr>
                <tr> 
                  <td> <input type="radio" name="type" value="3"></td>
                  <td>Hitman training facility</td>
                  <td>&pound;500,000</td>
                  <td>&pound;65,000</td>
                  <td><?php echo "$in[2]"; ?></td>
                </tr>
                <tr> 
                  <td><div align="right"> </div></td>
                  <td>&nbsp;</td>
                  <td colspan="3"><div align="right"> 
                      <input name="bus_button" type="submit" id="bus_button3" value="Purchase">
                    </div></td></tr>
		<tr>
                  <td colspan="6">Time untill  payout:                    <?php $tme=$crew->payout; $tme=$tme-time(); $tme=round($tme/60); echo"$tme minutes";?></td>
		  <a href=?reset=fampayout>Reset family payout(sets payout time current time+24 hours)</a><Br><br>

                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgcolor="#FFFFFF" ><div align="center"><a href="crew_users.php">Click Here to invite members, kick members and send mass messages etc </a></div></td>
    </tr>
  </table>
  <tr> 
    <td><table width="100%" height="23" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
        <tr> 
          <td height="21"> 
            <div align="center"><a href="crew_index.php?page=3">User panel - you can use this option to acces the same information normal members have</a></div></td>
        </tr>
      </table></td>
  </tr>
<?php
///////TO CHECK IF THERE IN THE CREW AND THERE RHM
}
/////// 
?>
<table width="100%" height="23" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr>
    <td height="21"><div align="center"><a href="crewowner.php">Click here to withdraw bullets and points and cash from your crew's bank </a></div></td>
  </tr>
</table>
</form>
<p>Welcome to the crew owner control panel. Your crew will collapse and the spot become free on the crew page if the crew owner, rhm and all 8 council members die. To hire council members and a rhm go to the users pag. </p>
