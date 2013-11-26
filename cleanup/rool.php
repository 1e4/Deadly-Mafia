<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);
?>
<?
echo "$style";
$input="roulette";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$roulette = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Roulette'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$roulette->owner'"));

if (strtolower($roulette->owner) == strtolower($fetch->username)){
include_once"roulettecontrol.php";
exit();
}
$crimes = mysql_query("SELECT money, location FROM users WHERE username='$username'");
while($success = mysql_fetch_row($crimes)){
	$usersmoney = $success[0];
$location = $success[1];
	
}
$crimes1 = mysql_query("SELECT owner, max  FROM casinos WHERE location='$fetch->location' AND casino='Roulette'");
while($success1 = mysql_fetch_row($crimes1)){
	$owner = $success1[0];
$max = $success1[1];
$min = $success1[2];
	
}
$crimes3 = mysql_query("SELECT money FROM users WHERE username='$roulette->owner'");
while($success3 = mysql_fetch_row($crimes3)){
	$ownersmoney1 = $success3[0];
	
}


$number = rand(1,36);



$n0 = $_POST['n0']; 
$n1 = $_POST['n1']; 
$n2 = $_POST['n2']; 
$n3 = $_POST['n3']; 
$n4= $_POST['n4']; 
$n5 = $_POST['n5']; 
$n6= $_POST['n6']; 
$n7 = $_POST['n7']; 
$n8 = $_POST['n8']; 
$n9 = $_POST['n9']; 
$n10 = $_POST['n10']; 
$n11 = $_POST['n11']; 
$n12 = $_POST['n12']; 
$n13 = $_POST['n13']; 
$n14 = $_POST['n14']; 
$n15 = $_POST['n15']; 
$n16= $_POST['n16']; 
$n17= $_POST['n17']; 
$n18 = $_POST['n18']; 
$n19 = $_POST['n19']; 
$n20= $_POST['n20']; 
$n21= $_POST['n21']; 
$n22= $_POST['n22']; 
$n23 = $_POST['n23']; 
$n24 = $_POST['n24']; 
$n25 = $_POST['n25']; 
$n26 = $_POST['n26']; 
$n27 = $_POST['n27']; 
$n28 = $_POST['n28']; 
$n29= $_POST['n29']; 
$n30 = $_POST['n30']; 
$n31= $_POST['n31']; 
$n32 = $_POST['n32']; 
$n33 = $_POST['n33']; 
$n34 = $_POST['n34']; 
$n35 = $_POST['n35']; 
$n36 = $_POST['n36']; 
$e = $_POST['e']; 
$o = $_POST['o']; 
$teen = $_POST['teen']; 
$teen1 = $_POST['teen1']; 
$black = $_POST['black']; 
$red = $_POST['red']; 
$twelve = $_POST['twelve']; 
$dtv = $_POST['dtv']; 
$vtz = $_POST['vtz']; 
$ek = $_POST['ek']; 
$tk = $_POST['tk']; 
$dk = $_POST['dk']; 

	if (!empty($_POST['go4'])){

$bet = $n0+$n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15+$n16+$n17+$n18+$n19+$n20+$n21+$n22+$n23+$n24+$n25+$n26+$n27+$n28+$n29+$n30+$n31+$n32+$n33+$n34+$n35+$n36+$e+$o+$teen+$teen1+$black+$red+$twelve+$dtv+$vtz+$ek+$dk+$tk;


if  (ereg('[^0-9]',$bet))
   {
     
    echo "Invalid Numbers!";
	exit;
}



if ($bet == 0){
echo "You need to enter a bet!";
}elseif ($bet != 0){
if ($bet > $usersmoney){
echo "You do not have that much money!";
}elseif ($bet <= $usersmoney){

if ($bet > $max){
echo "You cannot bet higher than the max bet!";
}elseif ($bet <= $max){
if (($bet >! $usersmoney) || ($bet != 0)){

$nmoney = 0;

if ($number == 1){ $nmoney = $nmoney + $n1 * 36;
$on = 1;
$color=Red;
}elseif ($number == 2){$nmoney = $nmoney + $n2 * 36;
$on = 2;
$color=Black;
}elseif ($number == 3){$nmoney = $nmoney + $n3 * 36;
$on = 3;
$color=Red;
}elseif ($number == 4){$nmoney = $nmoney + $n4 * 36;
$on = 4;
$color=Black;
}elseif ($number == 5){$nmoney = $nmoney + $n5 * 36;
$on = 5;
$color=Red;
}elseif ($number == 6){$nmoney = $nmoney + $n6 * 36;
$on = 6;
$color=Black;
}elseif ($number == 7){$nmoney = $nmoney + $n7 * 36;
$on = 7;
$color=Red;
}elseif ($number == 8){$nmoney = $nmoney + $n8 * 36;
$on = 8;
$color=Black;
}elseif ($number == 9){$nmoney = $nmoney + $n9 * 36;
$on = 9;
$color=Red;
}elseif ($number == 10){$nmoney = $nmoney + $n10 * 36;
$on = 10;
$color=Black;
}elseif ($number == 11){$nmoney = $nmoney + $n11 * 36;
$on = 11;
$color=Black;
}elseif ($number == 12){$nmoney = $nmoney + $n12 * 36;
$on = 12;
$color=Red;
}elseif ($number == 13){$nmoney = $nmoney + $n13 * 36;
$on = 13;
$color=Black;
}elseif ($number == 14){$nmoney = $nmoney + $n14 * 36;
$on = 14;
$color=Red;
}elseif ($number == 15){$nmoney = $nmoney + $n15 * 36;
$on = 15;
$color=Black;
}elseif ($number == 16){$nmoney = $nmoney + $n16 * 36;
$on = 16;
$color=Red;
}elseif ($number == 17){$nmoney = $nmoney + $n17 * 36;
$on = 17;
$color=Black;
}elseif ($number == 18){$nmoney = $nmoney + $n18 * 36;
$on = 18;
$color=Red;
}elseif ($number == 19){$nmoney = $nmoney + $n19 * 36;
$on = 19;
$color=Red;
}elseif ($number == 20){$nmoney = $nmoney + $n20 * 36;
$on = 20;
$color=Black;
}elseif ($number == 21){$nmoney = $nmoney + $n21 * 36;
$on = 21;
$color=Red;
}elseif ($number == 22){$nmoney = $nmoney + $n22 * 36;
$on = 22;
$color=Black;
}elseif ($number == 23){$nmoney = $nmoney + $n23 * 36;
$on = 23;
$color=Red;
}elseif ($number == 24){$nmoney = $nmoney + $n24 * 36;
$on = 24;
$color=Black;
}elseif ($number == 25){$nmoney = $nmoney + $n25 * 36;
$on = 25;
$color=Red;
}elseif ($number == 26){$nmoney = $nmoney + $n26 * 36;
$on = 26;
$color=Black;
}elseif ($number == 27){$nmoney = $nmoney + $n27 * 36;
$on = 27;
$color=Red;
}elseif ($number == 28){$nmoney = $nmoney + $n28 * 36;
$on = 28;
$color=Black;
}elseif ($number == 29){$nmoney = $nmoney + $n29 * 36;
$on = 29;
$color=Black;
}elseif ($number == 30){$nmoney = $nmoney + $n30 * 36;
$on = 30;
$color=Red;
}elseif ($number == 31){$nmoney = $nmoney + $n31 * 36;
$on = 31;
$color=Black;
}elseif ($number == 32){$nmoney = $nmoney + $n32 * 36;
$on = 32;
$color=Red;
}elseif ($number == 33){$nmoney = $nmoney + $n33 * 36;
$on = 33;
$color=Black;
}elseif ($number == 34){$nmoney = $nmoney + $n34 * 36;
$on = 34;
$color=Red;
}elseif ($number == 35){$nmoney = $nmoney + $n35 * 36;
$on = 35;
$color=Black;
}elseif ($number == 36){$nmoney = $nmoney + $n36 * 36;
$on = 36;
$color=Red;
}else { $nmoney = ""; }

// odd or even
if($number % 2 == 0) { $type = "even"; } else { $type = "odd"; }
if($type == "odd") { $nmoney = $nmoney + $o * 2; }
elseif($type == "even") { $nmoney = $nmoney + $e * 2; }



//Low or  high
if ($nummer >= 19) { $nmoney = $nmoney + $high * 2; }
elseif($nummer >= 0) { $nmoney = $nmoney + $low * 2; }
$red = $_POST['red'];
$black = $_POST['black'];

$red22 = array (
	"1" => "1",
	"2" => "3",
	"3" => "5",
	"4" => "7",
	"5" => "9",
	"6" => "12",
	"7" => "14",
	"8" => "16",
	"9" => "18",
	"10" => "19",
	"11" => "21",
	"12" => "23",
	"13" => "25",
	"14" => "27",
	"15" => "30",
	"16" => "32",
	"17" => "34",
	"18" => "36");
$ii = 1;
	while ($ii < 18){
if ($red22[$ii] == $number){
$colour1 = red;
$nmoney = $nmoney + $red * 2;
}
/////////////////////////////////////////////need to fix coloums!!!!
$ii++;
}
if ($colour1 == ""){


$black1 = array (
	"1" => "2",
	"2" => "4",
	"3" => "6",
	"4" => "8",
	"5" => "10",
	"6" => "13",
	"7" => "15",
	"8" => "17",
	"9" => "20",
	"10" => "22",
	"11" => "24",
	"12" => "26",
	"13" => "28",
	"14" => "29",
	"15" => "31",
	"16" => "33",
	"17" => "35");

$iii = 0;
	while ($iii < 18){
if ($black1[$iii] == $number){
$colour1 = black;
$nmoney = $nmoney + $black * 2;
}



$iii++;
}}



//fine
$one218 = array (
	"0" => "1",
	"1" => "2",
	"2" => "3",
	"3" => "4",
	"4" => "5",
	"5" => "6",
	"6" => "7",
	"7" => "8",
	"8" => "9",
	"9" => "10",
	"10" => "11",
	"11" => "12",
	"12" => "13",
	"13" => "14",
	"14" => "15",
	"15" => "16",
	"16" => "17",
	"17" => "18");
$part = 0;
	while ($part < 17){
	if ($one218[$part] == $number){
$nmoney = $nmoney + $teen * 2;
}
	$part++;
		}

$teen236 = array (
	"0" => "19",
	"1" => "20",
	"2" => "21",
	"3" => "22",
	"4" => "23",
	"5" => "24",
	"6" => "25",
	"7" => "26",
	"8" => "27",
	"9" => "28",
	"10" => "29",
	"11" => "30",
	"12" => "31",
	"13" => "32",
	"14" => "33",
	"15" => "34",
	"16" => "35",
	"17" => "36");
$part1 = 0;
	while ($part1 < 17){
	if ($teen236[$part1] == $number){
$nmoney = $nmoney + $teen1 * 2;
}

	$part1++;
		}

$one212 = array (
	"0" => "1",
	"1" => "2",
	"2" => "3",
	"3" => "4",
	"4" => "5",
	"5" => "6",
	"6" => "7",
	"7" => "8",
	"8" => "9",
	"9" => "10",
	"10" => "11",
	"11" => "12");
$part2 = 0;
	while ($part2 < 11){
	if ($one212[$part2] == $number){
$nmoney = $nmoney + $twelve * 3;
}

	$part2++;
		}
$teen2244 = array (
	"0" => "13",
	"1" => "14",
	"2" => "15",
	"3" => "16",
	"4" => "17",
	"5" => "18",
	"6" => "19",
	"7" => "20",
	"8" => "21",
	"9" => "22",
	"10" => "23",
	"11" => "24");
$part3 = 0;
	while ($part3 < 11){
	if ($teen2244[$part3] == $number){
$nmoney = $nmoney + $dtv * 3;
}

	$part3++;
		}
$twen5 = array (
	"0" => "25",
	"1" => "26",
	"2" => "27",
	"3" => "28",
	"4" => "29",
	"5" => "30",
	"6" => "31",
	"7" => "32",
	"8" => "33",
	"9" => "34",
	"10" => "35",
	"11" => "36");
$part4 = 0;
	while ($part4 < 11){
	if ($twen5[$part4] == $number){
$nmoney = $nmoney + $vtz * 3;
}

	$part4++;
		}
$small = array (
	"0" => "1",
	"1" => "4",
	"2" => "7",
	"3" => "10",
	"4" => "13",
	"5" => "16",
	"6" => "19",
	"7" => "22",
	"8" => "25",
	"9" => "28",
	"10" => "31",
	"11" => "34"
	);
$part5 = 0;
	while ($part5 < 11){
	if ($small[$part5] == $number){
$nmoney = $nmoney + $ek * 3;
}

	$part5++;
		}
$small1 = array (
	"0" => "2",
	"1" => "5",
	"2" => "8",
	"3" => "11",
	"4" => "14",
	"5" => "17",
	"6" => "20",
	"7" => "23",
	"8" => "26",
	"9" => "29",
	"10" => "32",
	"11" => "35"
	);
$part6 = 0;
	while ($part6 < 11){
	if ($small1[$part6] == $number){
$nmoney = $nmoney + $tk * 3;
}

	$part6++;
		}

$small2 = array (
	"0" => "3",
	"1" => "6",
	"2" => "9",
	"3" => "12",
	"4" => "15",
	"5" => "18",
	"6" => "21",
	"7" => "24",
	"8" => "27",
	"9" => "30",
	"10" => "33",
	"11" => "36"
	);
$part7 = 0;
	while ($part7 < 11){
	if ($small2[$part7] == $number){
$nmoney = $nmoney + $dk * 3;
}

	$part7++;
		}

$yougot = $nmoney - $bet;






if ($yougot <= 0){

$lala = $usersmoney - $bet;
$ownersmoney = $ownersmoney1 + $bet;
$ear2 = $roulette->profit + $bet;
mysql_query("UPDATE users SET money='$lala' WHERE username='$username'");
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$roulette->owner'");
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='roulette' AND owner !='0'");
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<br>
<table align=center cellspacing=0 cellpadding=0 width=20% class='tblout'>
<tr class='tblin'>
      <td height=18 colspan=2 align=center background="includes/bg1.jpg" class='tblhdr'><FONT class='text' >Wheel</FONT></td>
  </tr>
<tr class='tblin' >
<td hieght=100 align=center BGCOLOR=<?php echo"$color"; ?>><?php echo "<b><font face=verdana size=8>$number</font></b>"; ?></td>
</tr>
</table>
<br>
<center>
  <font class='text style1'>You bet <? echo"<b>£".makecomma($bet)."</b>"; ?> and made <b>&pound;0</b>.</font>
</center>
<?
}elseif ($yougot > 0){
$lala = $usersmoney + $bet;
$ownersmoney = $ownersmoney1 - $bet;
$ear3 = $roulette->profit - $nmoney;
mysql_query("UPDATE users SET money='$ownersmoney2' WHERE username='$roulette->owner'");
mysql_query("UPDATE users SET money='$lala1' WHERE username='$username'");
mysql_query("UPDATE casinos SET profit='$ear3' WHERE location='$fetch->location' AND casino='roulette' AND owner !='0'");
?>
<br>
<table align=center cellspacing=0 cellpadding=0 width=20% class='tblout'>
<tr class='tblin'>
      <td height=18 colspan=2 align=center background="includes/bg1.jpg" class='tblhdr'><FONT class='text' >Wheel</FONT></td>
  </tr>
<tr>
<td hieght=100 align=center BGCOLOR=<?php echo"$color"; ?>><?php echo "<b><font face=verdana size=8>$number</font></b>"; ?></td>
</tr>
</table>
<br>
<center><font class='text style1'>You bet <? echo"<b>$".makecomma($bet)."</b>"; ?> and made <b><? echo"<b>$".makecomma($nmoney)."</b>"; ?></b>.</font>
</center>
<?


if ($nmoney > $ownersmoney1){
$lost ='1';
$ownersmoney = $money1; ///if the win is bigger than th owners money then.

////lost=1

}elseif ($nmoney <= $ownersmoney1){
$lost = '0';
///else if its the other way around, take the monety form owners profile
$ownersmoney = $ownersmoney1 - $nmoney;

}

$ownersmoney = $ownersmoney1 - $nmoney;
$winermoney = $usersmoney + $nmoney;
$ear = $roulette->profit - $nmoney;


if ($lost == '1'){
echo "<center><font color=white>You Won The Table!</font></center>";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Roulette'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$roulette->owner'");
mysql_query("UPDATE users SET money='$winermoney' WHERE username='$username'");

}elseif ($lost == '0'){

mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
mysql_query("UPDATE users SET money='$winermoney' WHERE username='$username'");
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='roulette' AND owner !='0'");
}
}
}
}}}}

?>
<script language="JavaScript">
function disableEnterKey()
{
     if (window.event.keyCode == 13) window.event.keyCode = 0;
}
</script>
<html>
<br>
<br>
<center>
<table width=70% align=center cellpadding=0 cellspacing=0 bgcolor="#666666" class='tblout'>
<tr class='tblin'>
      <td height=18 colspan=10 align=center background="includes/bg1.jpg" class='tblhdr'><FONT class='text' >Roulette</FONT></td>
  </tr>
<tr class='tblin'>
<td class='btext' width=30% align=center rowspan=15><img src="images/roulette.gif" width=250 height=350 border=0></td>

<form action="" method=post onKeyPress="disableEnterKey()">

<td class='btext' align=right>01:</td>
<td class='btext'><input size=3 class='textbox' maxlength="10" name=n1 type=text></td>

<td class='btext' align=right>02:</td>
<td class='btext'><input type=text name=n2 size=3 class='textbox' maxlength="10"></td>

<td class='btext' align=right>03:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n3 maxlength="10"></td>

<td class='btext' align=right>04:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n4 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>05:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n5 maxlength="10"></td>

<td class='btext' align=right>06:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n6 maxlength="10"></td>

<td class='btext' align=right>07:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n7 maxlength="10"></td>

<td class='btext' align=right>08:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n8 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>09:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n9 maxlength="10"></td>

<td class='btext' align=right>10:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n10 maxlength="10"></td>

<td class='btext' align=right>11:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n11 maxlength="10"></td>

<td class='btext' align=right>12:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n12 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>13:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n13 maxlength="10"></td>

<td class='btext' align=right>14:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n14 maxlength="10"></td>

<td class='btext' align=right>15:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n15 maxlength="10"></td>

<td class='btext' align=right>16:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n16 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>17:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n17 maxlength="10"></td>

<td class='btext'  align=right>18:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n18 maxlength="10"></td>

<td class='btext' align=right>19:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n19 maxlength="10"></td>

<td class='btext' align=right>20:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n20 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>21:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n21 maxlength="10"></td>

<td class='btext' align=right>22:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n22 maxlength="10"></td>

<td class='btext' align=right>23:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n23 maxlength="10"></td>

<td class='btext' align=right>24:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n24 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>25:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n25 maxlength="10"></td>

<td class='btext' align=right>26:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n26 maxlength="10"></td>

<td class='btext' align=right>27:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n27 maxlength="10"></td>

<td class='btext' align=right>28:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n28 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>29:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n29 maxlength="10"></td>

<td class='btext' align=right>30:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n30 maxlength="10"></td>

<td class='btext' align=right>31:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n31 maxlength="10"></td>

<td class='btext' align=right>32:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n32 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>33:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n33 maxlength="10"></td>

<td class='btext' align=right>34:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n34 maxlength="10"></td>

<td class='btext' align=right>35:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n35 maxlength="10"></td>

<td class='btext' align=right>36:</td>
<td class='btext'><input type=text class='textbox' size=3 name=n36 maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>Red:</td>
<td class='btext'><input type=text class='textbox' size=3 name=red maxlength="10"></td>

<td class='btext' align=right>Black:</td>
<td class='btext'><input type=text class='textbox' size=3 name=black maxlength="10"></td>

<td class='btext' align=right>Odd:</td>
<td class='btext'><input type=text class='textbox' size=3 name=o maxlength="10"></td>

<td class='btext' align=right>Even:</td>
<td class='btext'><input type=text class='textbox' size=3 name=e maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>1-18:</td>
<td class='btext'><input type=text class='textbox' size=3 name=teen maxlength="10"></td>

<td class='btext' align=right>19-36:</td>
<td class='btext'><input type=text class='textbox' size=3 name=teen1 maxlength="10"></td>

<td class='btext' align=right>1-12:</td>
<td class='btext'><input type=text class='textbox' size=3 name=twelve maxlength="10"></td>

<td class='btext' align=right>13-24:</td>
<td class='btext'><input type=text class='textbox' size=3 name=dtv maxlength="10"></td></tr>

<tr>
<td class='btext' align=right>25-36:</td>
<td class='btext'><input type=text class='textbox' size=3 name=vtz maxlength="10"></td>

<td class='btext' align=right>1st column:</td>
<td class='btext'><input type=text class='textbox' size=3 name=ek maxlength="10"></td>

<td class='btext' align=right>2nd column:</td>
<td class='btext'><input type=text class='textbox' size=3 name=tk maxlength="10"></td>

<td class='btext' align=right>3rd column:</td>
<td class='btext'><input type=text class='textbox' size=3 name=dk maxlength="10"></td></tr>

<p>
<tr>
<td class='btext' colspan=10 align=center><input type=submit class='button' value=Bet! name='go4'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=reset class='button' value=Clear!></td>
</tr>
</table>
</td>
</tr>
</table>

<center>
<p>
  <?php if ($roulette->owner == "0"){ echo "<a href=states.php?grab=Casinos&location=$fetch->location&casino=Roulette> This roulette is not owned <a/>"; }else{ echo "<font color=white class='text'>This roulette is managed by <a href=profiles.php?viewuser=$roulette->owner><b>$roulette->owner</b></a></font>"; } ?>
  
  
  <?php echo "<br><font color=white class='text'>The maximum bet is set at <b>£".makecomma($roulette->max)."</b>"; ?>
  <br>
  <br>
</p>
</p>
