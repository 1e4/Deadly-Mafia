<?php 
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$find = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($find);

$nums = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username='$username'"));



$bust = $_GET['bust'];
if(isset($bust)) {

if ($nums == "0"){

$rand = rand(1,100) + $fetch->jail_points;
if ($rand > "65"){

mysql_query("DELETE FROM jail WHERE id='$bust'");
echo "You busted him/her out.";
$rand1 = rand(6,20) - 5;
$nrank = $fetch->rankpoints + $rand1;
$njail = rand(1,3) + $fetch->jail_points;

mysql_query("UPDATE users SET rankpoints='$nrank', jail_points='$njail'  WHERE username='$username'");
mysql_query("UPDATE info SET busts=busts+1 WHERE username='$username'");

$msg = "$username busted you out from jail!";
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `msg`, `read`,`date`) VALUES ('', '$user','$msg','0',now());");
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../jail.php\">";
}
}
}
echo "$style
<center>
<table border=1 cellspacing=0 cellpadding=2 width=90%  bordercolor=$td_border bgcolor=$td_bg><tr>
<td height=22 colspan=6 align=center background=$gradient><center class=TableHeading>Jail</center></td></tr>

<td align=center width=16%>Name</td>
<td align=center width=16%>Rank</td>
<td align=center width=16%>Jailed For</td>
<td  align=center width=16%>Crew</td>
<td align=center width=16%>Bust Out</td>
<td align=center width=16%>Seconds Left</td>
</tr>	";
$query=mysql_query("SELECT * FROM jail WHERE location='$fetch->location'");

$num=mysql_num_rows($query);
if ($num == "0"){ echo "<TD align=middle colSpan=6><B>The is no one in this jail.</B></TD>"; }
while($inf = mysql_fetch_object($query)){

$per_in = mysql_query("SELECT * FROM users WHERE username='$inf->username'");
$per = mysql_fetch_object($per_in);
$left = $inf->time_left - time();
echo "<tr><td><a href='profile.php?viewuser=$inf->username'>$inf->username</a></td> <td>$per->rank</td> <td>$inf->reason</td> <td>$per->crew</td> <td><a href='jail.php?bust=$inf->id'>Bust!</a></td> <td>$left Seconds</td></tr>";


}
?>




</center>
	
</table><br><p>
<?php include_once"includes/footer.php"; ?>



