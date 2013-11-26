<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();

echo "";

$username=$_SESSION['username'];
$stat = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$username'"));

strip_tags($target);
strip_tags($amount);
strip_tags($reason);

if($target<>""){
	if($amount>"500000"){
		if($reason<>""){
			$amount2=$amount+100000;
			if($stat[money]>$amount2){
                $cshleft=$stat[money]-$amount2;
              	mysql_query("UPDATE users SET money = '$cshleft' WHERE username='$username'");
				$timem = strftime ("%M");
				$timeh = strftime ("%H");
				$tstamp = "$timeh:$timem";
				$today = getdate();
				$date="$today[mday].$today[mon].$today[year]";
				$tdstamp = "$date $tstamp";
mysql_query("INSERT INTO `hitlist` (`target` , `paid` , `amount`, `reason`, `tdstamp`) 
VALUES 
('$target' , '$username' , '$amount' , '$reason', '$tdstamp')") or die("<br>Could not hitlist $username.");
			}
		}else{
		print"<br>You have to enter a reason!";
		}
	}else{
	print"<br>You haven't got enough money!";
	}
}
if($buyout){
	$tsel1 = mysql_query("select * from hitlist where id=$buyout");
	$top1 = mysql_fetch_array($tsel1);
	if($stat[money]>$top1[amount]){
        $cshleft=$stat[money]-$top1[amount];
	    mysql_query("UPDATE users SET money = '$cshleft' WHERE username='$username'");
		mysql_query("delete from hitlist where id=$buyout");
		print"<br>You've bought him of the hitlist!";
	}else{
		print"<br>You haven't got enough cash!";
	}
}

print"
<center>

					
<table width=758 border=0 cellpadding=1 cellspacing=1 bordercolor=black class=black2 height=102>
	<tr>
	<td colspan=8 width=100% class=header align=center >Hitlist</td>
	</tr>
  <tr class=title>
 <td width=12% colspan=2>Target</td>
  <td width=16% >Amount</td>
  <td width=18% >Paid By</td>
  <td  width=27%>Reason</td>
  <td width=9% >Date</td>
  <td width=18% colspan=2>Buy Out!</td>
  </tr>";
						
	
$tsel = mysql_query("select * from hitlist order by id asc");
while ($top = mysql_fetch_array($tsel)) {

print "
 <tr class=text>
 <th width=1 height=57></th>
 <td height=57>
 <a href=profile.php?viewuser=$top[target]>$top[target]</a></td>
 <td height=57>$$top[amount]</td>
 <td height=57>
 <a href=profile.php?viewuser=$top[paid]>$top[paid]</a></td>
 <td height=57>$top[reason]</td><td height=57>
 $top[tdstamp]</td><td height=57><a href=wanted.php?buyout=$top[id]>
 Buy Out!</a></td>
 <th width=1 height=57></th> </tr>";
}
print"

	</table>

	<br><br>

	
	<form action=wanted.php method=post>
	<table width=300 cellspacing=1 cellpadding=1 border=0 bordercolor=black class=black align=center>
	<tr>

	<td class=header colspan=4><center>Hitlist Someone</center></td>

	</tr>

	<tr class=text>

	<th width=1></th>
	<td>Target: </td><td class=sub2>
    <input type=text name=target class=submit size=20></td>

	<th width=1></th>
	</tr>

	<tr class=text>

	<th width=1></th>
	<td>Amount:</td><td class=sub2>
    <input type=text name=amount class=submit size=20></td>

	<th width=1></th>
	</tr>

	<tr class=text>

	<th width=1></th>
	<td>Reason:</td><td class=sub2><textarea rows=3 cols=15 name=reason class=submit></textarea>

	<th width=1></th>
	</tr>

	<tr class=title>

	<td class=sub2 colspan=2>&nbsp;</td><td align=right colspan=2><input type=submit value=Hitlist! class=submit> </td>

	</tr>

	</table><br>

	</form>

	Adding someone to the hitlist costs $100,000 plus the amount you are paying.";

?>

