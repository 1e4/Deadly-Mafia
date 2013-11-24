<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php";
echo "$style";
logincheck();
$username = $_SESSION['username'];
$stat=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$bet=$_POST[bet];
$first=$_POST[first];
$second=$_POST[second];
$third=$_POST[third];
$fourth=$_POST[fourth];
$manipulate=$_POST[manipulate];

$first=strip_tags($first);
$second=strip_tags($second);
$third=strip_tags($third);
$fourth=strip_tags($fourth);
$bet=strip_tags($bet);
$manipulate=strip_tags($manipulate);

$bet=intval($bet);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM cubecombo WHERE location='$stat->location'"));
$pot=$cash=number_format("$fetch->pot","0",".",",");
print "<font face=symbol>&#169; &#168; &#167; &#170; </font><br><form action=cc.php method=post>\n";
print "Cash in pot: <b> $$pot</b><br>";
print "Just place a bet and go.... <br><br>Bet:<input name=bet type=text size=10 maxlength=10 value=1000>\n";?>
<Br>Game style: <br><INPUT type=radio value=1 name=manipulate><b>Manipulate<INPUT type=radio value=2 name=manipulate checked>Random</b><br><brr>

<table border= 0  cellpadding= 0  cellspacing= 0  style= border-collapse: collapse  width= 100%  id= AutoNumber1 >
  <tr>
    <td width= 33% >First number</td>
    <td width= 33% >Second number</td>
  </tr>
  <tr>
    <td width= 33% ><INPUT type=radio value=1 name=first>1<INPUT type=radio value=2 name=first>2<INPUT type=radio value=3 name=first>3<INPUT type=radio value=4 name=first>4<INPUT type=radio value=5 name=first>5<INPUT type=radio value=6 name=first>6</td>
    <td width= 33% ><INPUT type=radio value=1 name=second>1<INPUT type=radio value=2 name=second>2<INPUT type=radio value=3 name=second>3<INPUT type=radio value=4 name=second>4<INPUT type=radio value=5 name=second>5<INPUT type=radio value=6 name=second>6</td></tr>
  <tr>
    <td width= 33% >Third number</td>
    <td width= 33% >Fourth number</td>
  </tr>
    <tr>
    <td width= 34% ><INPUT type=radio value=1 name=third>1<INPUT type=radio value=2 name=third>2<INPUT type=radio value=3 name=third>3<INPUT type=radio value=4 name=third>4<INPUT type=radio value=5 name=third>5<INPUT type=radio value=6 name=third>6</td>
    <td width= 34% ><INPUT type=radio value=1 name=fourth>1<INPUT type=radio value=2 name=fourth>2<INPUT type=radio value=3 name=fourth>3<INPUT type=radio value=4 name=fourth>4<INPUT type=radio value=5 name=fourth>5<INPUT type=radio value=6 name=fourth>6</td>
  </tr>
  </table>
<?php
print "<input type=submit name=play value=go>\n";

if ($play=="go")
{
$bet=$_POST[bet];
	if ($stat->money<$bet || $bet<1)
	{
print "<br><br>Not enough money<br>";
die;
	}
	if ($bet<$fetch->min)
	{
print "<br><br>The min bet is $fetch->min<br>";
die;
	}
	if($manipulate=="2"){
        $first=rand(1,6);
        $second=rand(1,6);
        $third=rand(1,6);
        $fourth=rand(1,6);
    }

        $fifth=round(rand(1,6),"0");
        $sixth=round(rand(3,18)/3,"0");
        
        if($fetch->pot<0){
            mysql_query("update CubeCombo set pot=0 where min=$fetch->min");
        }


print"<center><table border=3 cellpadding=0 cellspacing=10 align=center><tr><td bgcolor=white><center>
<B>$first<td bgcolor=white>
<center><B>$second<td bgcolor=white>
<center><B>$third<td bgcolor=white>
<center><B>$fourth<td bgcolor=white>
<center><B>$fifth<td bgcolor=white>
<center><B>$sixth</td>
</tr></table>";

	if ($first==1&&$second==1&&$third==1&&$fourth==1&&$fifth==1&&sixth==1){
$win=($fetch->pot/5);
print"Wrong side of the dice; you won $$win";
$n_money = $stat->money - $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");;
mysql_query("update cubecombo set pot=pot-$bet where min=$fetch->min");
}
	elseif ($first==1&&$second==2&&$third==3&&$fourth==4&&$fifth==5&&sixth==6){
$win=($fetch->pot/3);
print"21th street, you won $$win";
$n_money = $stat->money + $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");
}
	elseif ($fifth==$first&&$sixth==$second){
$win=($fetch->pot/10);
print"2 in the middle, you won $$win";
$n_money = $stat->money + $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");
}
	elseif ($first==$second&&$third==$second&&$fourth==$third&&$fifth!=$first&&$sixth!=$first){
$win=($fetch->pot/1000);
print"4 to 2, you won $$win";
$n_money = $stat->money + $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");
}

	elseif ($first==1&&$second==3&&$third==5&&$fourth==2&&$fifth==4&&sixth==6){
$win=($fetch->pot/3);
print"Even to uneven, you won $$win";
$n_money = $stat->money + $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");
}
	elseif ($first==2&&$second==4&&$third==6&&$fourth==1&&$fifth==3&&sixth==5){
$win=($fetch->pot/3);
print"Uneven to even, you won $$win";
$n_money = $stat->money + $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");
}
	elseif ($first==6&&$second==6&&$third==6&&$fourth!=6&&$fifth!=6&&sixth!=6){
$bet=$bet*2;
print"Devil eyes, you lost $$bet";
$n_money = $stat->money - $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot+$bet where min=$fetch->min");
}
	elseif ($first==6&&$second==6&&$third==6&&$fourth==6&&$fifth==6&&sixth==6){
$win=$fetch->pot+($bet*2);
print"You got CubeCombo, and won $$win!";
$n_money = $stat->money + $win;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=0 where min=$fetch->min");
}
    elseif ($first==$second&&$third==$fourth&&$first!=$third){
$win=$fetch->pot/7;
print"You got a double single, and won $$win!";
$n_money = $stat->money + $win;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot-$win where min=$fetch->min");

}else{
print"You got nothing and lost $$bet.";
$n_money = $stat->money - $bet;
mysql_query("UPDATE users SET money=$n_money WHERE username='$username'");
mysql_query("update cubecombo set pot=pot+$bet where min=$fetch->min");
 }
}
print"<hr color=#000001>Instructions:<br>
<table width=646><tr><td width=294>
<font face= symbol  size= 20 >1 1 1 1 1 1</font><td width= 342 > Wrong side of
  the dice = pot/5<tr><td width=294>
<font face= symbol  size= 20 >1 2 3 4 5 6</font><td width= 342 > 21th street =
    pot/3<tr><td width=294>
<font face= symbol  size= 20 >AABBAA</font><td width= 342 > 2 in the middle =
    pot/8<tr><td width=294>
<font face= symbol  size= 20 >AABBCC</font><td width= 342 > Double Single =
    pot/7<tr><td width=294>
<font face= symbol  size= 20 >AAAABB</font><td width= 342 > 4 to 2 = pot/1,000</td></tr>
  <tr>
    <td width=294>
<font face= symbol  size= 20 >BBBBAA</font><td width= 342 > 2 to 4 = pot/1,000</td>
  </tr>
</table>
<table width=646>
<tr><td width=294>
<font face= symbol  size= 20 >1 3 5 2 4 6</font><td width= 342 > Even to uneven
  = pot/3</td></tr></table>
<table width=646>
<tr><td width=294>
<font face= symbol  size= 20 >2 4 6 1 3 5</font><td width= 342 > Uneven to even
  = pot/3</td></tr></table>
<table width=646>
<tr><td width=294>
<font face= symbol  size= 20 >6 6 6 CCC</font><td width= 342 > Devil eyes = lose
  bet*2</td></tr></table>
<table width=646>
<tr><td width=294>
<font face= symbol  size= 20 >6 6 6 6 6 6</font><td width= 342 > CubeCombo = pot
  + bet*2</td></tr></table>";


?>
