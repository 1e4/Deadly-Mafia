<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
$username=$_SESSION['username'];

$fetch = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

include_once"casinoCP.php";



$input="Keno";

$kenogame = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Keno'"));

$kenoown = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$kenogame->owner'"));

if (strtolower($kenogame->owner) == strtolower($fetch->username)){

casinoCP($input);

exit();

}

?>
<link rel=stylesheet href=includes/test.css type=text/css>




<CENTER>

	<P>

<?PHP





$keno_numbers = array (

	"0" => "",

	"1" => "",

	"2" => "",

	"3" => "",

	"4" => "",

	"5" => "",

	"6" => "",

	"7" => "",

	"8" => "",

	"9" => "",

	"10" => "",

	"11" => "",

	"12" => "",

	"13" => "",

	"14" => "",

	"15" => "",

	"16" => "",

	"17" => "",

	"18" => "",

	"19" => "",

	"20" => "");

$player_numbers = array (

	"0" => "$n1",

	"1" => "$n2",

	"2" => "$n3",

	"3" => "$n4",

	"4" => "$n5",

	"5" => "$n6",

	"6" => "$n7",

	"7" => "$n8",

	"8" => "$n9",

	"9" => "$n10",

	"10" => "$n11",

	"11" => "$n12",

	"12" => "$n13",

	"13" => "$n14",

	"14" => "$n15",

	"15" => "$n16",

	"16" => "$n17",

	"17" => "$n18",

	"18" => "$n19",

	"19" => "$n20");



if ($action == "play" && $_POST['n1'] == "" && $_POST['n2'] == "" && $_POST['n3'] == "" && $_POST['n4'] == "" && $_POST['n5'] == "" && $_POST['n6'] == "" && $_POST['n7'] == "" && $_POST['n8'] == "" && $_POST['n9'] == "" && $_POST['n10'] == "" && $_POST['n11'] == "" && $_POST['n12'] == "" && $_POST['n13'] == "" && $_POST['n14'] == "" && $_POST['n15'] == "" && $_POST['n16'] == "" && $_POST['n17'] == "" && $_POST['n18'] == "" && $_POST['n19'] == "" && $_POST['n20'] == ""){

echo "<center>You must enter a number in every box!";

}

elseif ($action == "play" && $_POST['n1'] != "" && $_POST['n2'] != "" && $_POST['n3'] != "" && $_POST['n4'] != "" && $_POST['n5'] != "" && $_POST['n6'] != "" && $_POST['n7'] != "" && $_POST['n8'] != "" && $_POST['n9'] != "" && $_POST['n10'] != "" && $_POST['n11'] != "" && $_POST['n12'] != "" && $_POST['n13'] != "" && $_POST['n14'] != "" && $_POST['n15'] != "" && $_POST['n16'] != "" && $_POST['n17'] != "" && $_POST['n18'] != "" && $_POST['n19'] != "" && $_POST['n20'] != ""){



$bet=intval(strip_tags($_POST['amountbet']));

	$i = 0;

	while ($i < 20)

	{

		$temp = rand(1,80);

		if (!in_array($temp,$keno_numbers))

		{

			$keno_numbers[$i] = $temp;

			$i++;

		}

	} 

	sort($keno_numbers);

	sort($player_numbers);

}

$i = 0;

$points = 0;

while ($i < 20)

{

	if (in_array($keno_numbers[$i],$player_numbers))

		$points++;

	$i++;

}

echo "<A NAME=keno></A><script type=\"text/javascript\">\n";

echo "<!--\n";

echo "function selectkeno(v)\n";

echo "{\n";

echo "	document.kenoform.n20.value = document.kenoform.n19.value\n";

echo "	document.kenoform.n19.value = document.kenoform.n18.value\n";

echo "	document.kenoform.n18.value = document.kenoform.n17.value\n";

echo "	document.kenoform.n17.value = document.kenoform.n16.value\n";

echo "	document.kenoform.n16.value = document.kenoform.n15.value\n";

echo "	document.kenoform.n15.value = document.kenoform.n14.value\n";

echo "	document.kenoform.n14.value = document.kenoform.n13.value\n";

echo "	document.kenoform.n13.value = document.kenoform.n12.value\n";

echo "	document.kenoform.n12.value = document.kenoform.n11.value\n";

echo "	document.kenoform.n11.value = document.kenoform.n10.value\n";

echo "	document.kenoform.n10.value = document.kenoform.n9.value\n";

echo "	document.kenoform.n9.value = document.kenoform.n8.value\n";

echo "	document.kenoform.n8.value = document.kenoform.n7.value\n";

echo "	document.kenoform.n7.value = document.kenoform.n6.value\n";

echo "	document.kenoform.n6.value = document.kenoform.n5.value\n";

echo "	document.kenoform.n5.value = document.kenoform.n4.value\n";

echo "	document.kenoform.n4.value = document.kenoform.n3.value\n";

echo "	document.kenoform.n3.value = document.kenoform.n2.value\n";

echo "	document.kenoform.n2.value = document.kenoform.n1.value\n";

echo "	document.kenoform.n1.value = v\n";

echo "}\n";

echo "//-->\n";

echo "</script>\n";

echo "<TABLE class=thinline border=1 bordercolor=black cellpadding=0 cellspacing=0><tr><td colspan=15 class=header><center>Keno</td></tr>";

$i = 0;

$n = 1;

while ($i < 8)

{

	if ($i % 2 == 1)

		echo "  <TR BGCOLOR=\"white\">";

	else

		echo "  <TR bgcolor=white>";



	$j = 0;

	while ($j < 10)

	{



		if (in_array($n, $keno_numbers))

			echo "<TD bgcolor=666666 ALIGN=center>";

		else

			echo "<TD ALIGN=center>";

		echo "<FONT FACE=\"verdana, arial, helvetica\" SIZE=1 color=black>";

		if (in_array ($n, $player_numbers))

			echo "<B> &nbsp; <A HREF=\"#keno\" onClick=\"selectkeno($n)\"><FONT COLOR=000000><strong>$n</strong></FONT></A> &nbsp; </B>";

		else

			echo " &nbsp; <A HREF=\"#keno\" onClick=\"selectkeno($n)\"><FONT COLOR=black><strong>$n</strong></FONT></A> &nbsp; ";

		echo "</FONT></TD>";

		$j++;

		$n++;

	}

	$i++;

}

echo "<tr><td colspan=15>";

if ($action == "play" && $_POST['n1'] == "" && $_POST['n2'] == "" && $_POST['n3'] == "" && $_POST['n4'] == "" && $_POST['n5'] == "" && $_POST['n6'] == "" && $_POST['n7'] == "" && $_POST['n8'] == "" && $_POST['n9'] == "" && $_POST['n10'] == "" && $_POST['n11'] == "" && $_POST['n12'] == "" && $_POST['n13'] == "" && $_POST['n14'] == "" && $_POST['n15'] == "" && $_POST['n16'] == "" && $_POST['n17'] == "" && $_POST['n18'] == "" && $_POST['n19'] == "" && $_POST['n20'] == ""){

echo "<center>You must enter a number in every box!";

}

elseif ($action == "play" && $_POST['n1'] != "" && $_POST['n2'] != "" && $_POST['n3'] != "" && $_POST['n4'] != "" && $_POST['n5'] != "" && $_POST['n6'] != "" && $_POST['n7'] != "" && $_POST['n8'] != "" && $_POST['n9'] != "" && $_POST['n10'] != "" && $_POST['n11'] != "" && $_POST['n12'] != "" && $_POST['n13'] != "" && $_POST['n14'] != "" && $_POST['n15'] != "" && $_POST['n16'] != "" && $_POST['n17'] != "" && $_POST['n18'] != "" && $_POST['n19'] != "" && $_POST['n20'] != ""){



if ($bet ==""){

echo "<center>Enter A Bet Dumbass";



}elseif ($bet != "0"){



if ($bet > "$kenogame->max"){

echo "<center>The Max Bet Is £".makecomma($kenogame->max)."!";



}elseif ($bet <= "$kenogame->max"){



		if ($bet > "0"){

		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){

	print "<center>You cant bet that amount.";

	exit();

	}elseif ($bet != 0 || $bet || !ereg('[^0-9]',$bet)){

	

	if ($fetch->money < $bet){

		Print "<center>Sorry, you must have atleast $$bet to play keno. ";

		exit();

	} else {

	

	   mysql_query("update users set money=money-$bet where username='$username'");
	   mysql_query("UPDATE casinos SET profit=profit+$bet WHERE casino='Keno' AND location='$fetch->location'");

	     mysql_query("update users set money=money+$bet where username='$kenogame->owner'");

	}



	$again = " again!";

	echo "<br><B><font color=red>Winning Numbers:</font></B>";

	$w = 0;

	while ($w < 21)

	{

		echo " &nbsp; $keno_numbers[$w]";

		$w++;

		if ($w == 10)

			echo "<BR>";

	}

	echo "<Br><br><B><font color=red>Your Numbers:</font></B>";

	$w = 0;

	while ($w < 21)

	{

		echo " &nbsp; $player_numbers[$w]";

		$w++;

		if ($w == 10)

			echo "<BR>";

	}

	echo "<br><BR><B>You have $points winning numbers!";

	if ($points <= 5){

	echo "<center><br>You need at least 6 winning numbers!<br><a href=keno.php>Play Again</a>";

	}

		elseif ($points == 6){

			$betwinha = $bet * 2;

		if ($kenoown->money <= $betwinha){

		echo "The owner went broke, You didnt loose any money. go to the ownerships page to pick it up";

mysql_query("UPDATE casinos SET owner='0' AND max='0' WHERE casino='Keno' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='0' WHERE username='$kenoown->username'");

		}

			elseif ($kenoown->money >= $betwinha){

	mysql_query("update users set money=money+($bet*2) where username='$username'");
	
	   mysql_query("UPDATE casinos SET profit=profit-($bet*2) WHERE casino='Keno' AND location='$fetch->location'");
		mysql_query("update users set money=money-($bet*2) where username='$kenoown->username'");

	print "And you have won £". ($bet*2) .".</B>";

	}}

			elseif ($points == 7){

				$betwinha = $bet * 3;

		if ($kenoown->money <= $betwinha){

		echo "The owner went broke, You didnt loose any money. go to the ownerships page to pick it up";

mysql_query("UPDATE casinos SET owner='0' WHERE casino='Keno' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='0' WHERE username='$kenoown->username'");

		}

			elseif ($kenoown->money >= $betwinha){

	mysql_query("update users set money=money+($bet*4) where username='$username'");
	
		   mysql_query("UPDATE casinos SET profit=profit+($bet*3) WHERE casino='Keno' AND location='$fetch->location'");

		mysql_query("update users set money=money-($bet*3) where username='$kenoown->username'");

	print "And you have won £". ($bet*3) .".</B>";

	}}

			elseif ($points >= 8){

				$betwinha = $bet * 5;

		if ($kenoown->money <= $betwinha){

		echo "The owner went broke, You didnt loose any money. go to the ownerships page to pick it up";

mysql_query("UPDATE casinos SET owner='0' WHERE casino='Keno' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='0' WHERE username='$kenoown->username'");

		}

			elseif ($kenoown->money >= $betwinha){

	mysql_query("update users set money=money+($bet*5) where username='$username'");
	   mysql_query("UPDATE casinos SET profit=profit+($bet*5) WHERE casino='Keno' AND location='$fetch->location'");
	mysql_query("update users set money=money-($bet*5) where username='$kenoown->username'");

	print "And you have won £". ($bet*5) .".</B>";

	}}

	

		elseif ($points >= 10){

		$betwinha = $bet * 6;

		if ($kenoown->money <= $betwinha){

		echo "The owner went broke, You didnt loose any money. go to the ownerships page to pick it up";

mysql_query("UPDATE casinos SET owner='0' WHERE casino='Keno' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='0' WHERE username='$kenoown->username'");
		}

		elseif ($kenoown->money >= $betwinha){

	mysql_query("update users set money=money+($bet*6) where username='$username'");
	   mysql_query("UPDATE casinos SET profit=profit+($bet*6) WHERE casino='Keno' AND location='$fetch->location'");
	mysql_query("update users set money=money-($bet*6) where username='$kenoown->username'");

		print "And you have won £". ($bet*6) .".</B>";

	}}

}}}}}

echo "<FORM METHOD=post ACTION=\"$PHP_SELF?page=keno&". time(). "#keno\" NAME=kenoform><p align=center>Select 20 numbers between 1 and 80:<BR>";

echo "<INPUT TYPE=hidden NAME=action VALUE=\"play\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n1 VALUE=\"$player_numbers[0]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n2 VALUE=\"$player_numbers[1]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n3 VALUE=\"$player_numbers[2]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n4 VALUE=\"$player_numbers[3]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n5 VALUE=\"$player_numbers[4]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n6 VALUE=\"$player_numbers[5]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n7 VALUE=\"$player_numbers[6]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n8 VALUE=\"$player_numbers[7]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n9 VALUE=\"$player_numbers[8]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n10 VALUE=\"$player_numbers[9]\"><BR>";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n11 VALUE=\"$player_numbers[10]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n12 VALUE=\"$player_numbers[11]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n13 VALUE=\"$player_numbers[12]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n14 VALUE=\"$player_numbers[13]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n15 VALUE=\"$player_numbers[14]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n16 VALUE=\"$player_numbers[15]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n17 VALUE=\"$player_numbers[16]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n18 VALUE=\"$player_numbers[17]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n19 VALUE=\"$player_numbers[18]\"> ";

echo "<INPUT TYPE=text SIZE=2 class=\"submit\" MAXLENGTH=2 NAME=n20 VALUE=\"$player_numbers[19]\"><BR>";


echo "<center>Bet: <input type='text' class=\"submit\" maxlength='10' value='$bet' name='amountbet'><br><INPUT TYPE=submit class=\"submit\" VALUE=\"Play KENO$again\"> <input type=\"reset\" value=\"Start Over\" class=\"submit\"></FORM></td></tr></table>";



?>

</P>

</CENTER>

<p><center>
  <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Max Bet </div></td>
    </tr>
    <tr>
      <td bgcolor="#999999"><div align="center">The max bet is set at <? echo "&pound;".makecomma($kenogame->max).""; ?>.</div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Owner</div></td>
    </tr>
    <tr>
      <td bgcolor="#999999"><div align="center">This casino is owned By <a href=profile.php?view=<? echo "$kenogame->owner"; ?>><? echo "$kenogame->owner"; ?></a></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</center>

<br>

<?php require_once "includes/footer.php"; ?>