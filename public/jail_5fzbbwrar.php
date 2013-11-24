<?php 
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$find = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($find);

$nums = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username='$username'"));



$bust = strip_tags($_GET['bust']);
if($bust) {

if ($nums == "0"){
$info_jail=mysql_fetch_object(mysql_query("SELECT * FROM jail WHERE id='$bust'"));

if ($info_jail->bust_able == "1"){
echo "This user is unbreakable.";
}elseif ($info_jail->bust_able == "0"){
$rand = rand(1,100) + $fetch->jail_points;
if ($rand < "45"){
$reason = "Jail busting";
require_once"includes/failed.php";
}

if ($rand > "65"){

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$info_jail->username', '$info_jail->username', '<b>$username</b> busted you out of jail.', '$date', '0', '0', '0'
)");


echo "You busted him/her out.";
$rand1 = rand(6,20) - 5;
$nrank = $fetch->rankpoints + $rand1;
$njail = rand(5,10) + $fetch->jail_points;


mysql_query("UPDATE users SET rankpoints='$nrank', jail_points='$njail' WHERE username='$username'");
mysql_query("UPDATE info SET busts=busts+1 WHERE username='$username'");


mysql_query("DELETE FROM jail WHERE id='$bust'");
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../jail.php\">";
}
}}
}
if (strip_tags($_GET['mission']) == "do" && $fetch->mission == "3" && $fetch->location == "Panama"){
$rand=rand(1,100);
$nums1 = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username='$username'"));
if ($nums1 == "0"){
if ($rand > 87){
echo "You busted him out of jail!";
$new_money=$fetch->money + 50000;
$new_bullets=$fetch->bullets+150;
$new_rank=$fetch->rankpoints+rand(10,28);
mysql_query("UPDATE users SET money='$new_money',bullets='$new_bullets', rankpoints='$new_rank', mission='4' WHERE username='$username'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'How did you find me!<br> The other gangs paid me off as dead! But thanks all the same heres all i go take it<br><b>Your rewards:</b> £50,000 <br>150 Bullets ', '$date', '0', '0', '0'
)");
}else{
echo "You failed! and was put in jail";
$jail_time=time() + rand(120,400);
mysql_query("INSERT INTO `jail` ( `id` , `username` , `location` , `time_left` , `reason` , `bust_able` ) 
VALUES (
'', '$username', '$fetch->location', '$jail_time', 'Attempted jail busting', '1'
)");
}
}}

echo "

<table width=90% border=1 align=center cellpadding=2 cellspacing=0  class=thinline bordercolor=black>
  <tr>
<td  colspan=6  background=includes/grad.jpg><center>Jail</center></td></tr>
<tr bgcolor=#666666>
<td align=center width=16% class=tip>Name</td>
<td align=center width=16% class=tip>Rank</td>
<td align=center width=16% class=tip>Jailed For</td>
<td  align=center width=16% class=tip>Crew</td>
<td align=center width=16% class=tip>Bust!</td>
<td align=center width=16% class=tip>Time Left</td>
</tr>";
$query=mysql_query("SELECT * FROM jail WHERE location='$fetch->location'");

$num=mysql_num_rows($query);
if ($num == "0" && $fetch->mission != "3"){ echo "<TD align=middle colSpan=6><div align=center><B>The 
        is no one in this jail.</B></div></TD>"; }
if ($fetch->mission == "3" && $fetch->location == "Panama"){
echo "<tr><td><b>The Don</b></td> <td>Don</td> <td>Organised crime</td> <td>The Mafia</td> <td><a href='jail.php?mission=do'>Bust!</a></td> <td>15 Years</td></tr>";

}
while($inf = mysql_fetch_object($query)){
if ($inf->bust_able == "1"){
$it="*";
}else{
$it="";
}


$per_in = mysql_query("SELECT * FROM users WHERE username='$inf->username'");
$per = mysql_fetch_object($per_in);
$left = $inf->time_left - time();
echo "<tr><td>$it<a href='profile.php?viewuser=$inf->username'>$inf->username</a></td> <td>$per->rank</td> <td>$inf->reason</td> <td>$per->crew</td> <td><a href='jail.php?bust=$inf->id'>Bust!</a></td> <td>$left Seconds</td></tr>";


}
?>





	
</table> <br>
<table width="39%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
  <tr>
    <td background=includes/grad.jpg><div align="center">Key</div></td>
  </tr>
  <tr>
    <td><div align="center">*Unbreakable</div></td>
  </tr>
</table>
<p>
<?php include_once"includes/footer.php"; ?>



<!-- MMDW:success -->