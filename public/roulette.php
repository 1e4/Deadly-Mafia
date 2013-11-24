<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include_once"casinoCP.php";

$theError = "";

$totalBet = 0;
$totalWon = 0;

foreach($_POST as $amtBet) {
    if(strstr($amtBet, ".")) {
        $theError = "You must bet whole amounts!";
    } elseif($amtBet < 0) {
        $theError = "You cannot bet a negative amount!";
    } else {
	    $totalBet += intval($amtBet);
    }
}


?><link href="includes/test.css" rel="stylesheet" type="text/css"><? $input="Roulette";



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
	$maxBet = $success1[1];
	$minBet = $success1[2];
}

$crimes3 = mysql_query("SELECT money FROM users WHERE username='$owner'");
while($success3 = mysql_fetch_row($crimes3)){
	$ownersmoney = $success3[0];
}

$originalOwnersMoney = $ownersmoney;

$theNumber = rand(0, 36);

if($_POST[$theNumber] != "") {
	$totalWon += $_POST[$theNumber] * 36;
}

if($_POST['r'] != "") {
	if( ($theNumber == 1) ||
		($theNumber == 3) ||
		($theNumber == 5) ||
		($theNumber == 7) ||
		($theNumber == 9) ||
		($theNumber == 12) ||
		($theNumber == 14) ||
		($theNumber == 16) ||
		($theNumber == 18) ||
		($theNumber == 19) ||
		($theNumber == 21) ||
		($theNumber == 23) ||
		($theNumber == 25) ||
		($theNumber == 27) ||
		($theNumber == 30) ||
		($theNumber == 32) ||
		($theNumber == 34) ||
		($theNumber == 36)) {
		$totalWon += ($_POST['r'] * 2);
	}
}

if($_POST['b'] != "") {
	if( ($theNumber == 2) ||
		($theNumber == 4) ||
		($theNumber == 6) ||
		($theNumber == 8) ||
		($theNumber == 10) ||
		($theNumber == 11) ||
		($theNumber == 13) ||
		($theNumber == 15) ||
		($theNumber == 17) ||
		($theNumber == 20) ||
		($theNumber == 22) ||
		($theNumber == 24) ||
		($theNumber == 26) ||
		($theNumber == 28) ||
		($theNumber == 29) ||
		($theNumber == 31) ||
		($theNumber == 33) ||
		($theNumber == 35)) {
		$totalWon += ($_POST['b'] * 2);
	}
}

if($_POST['o'] != "") {
	if(($theNumber % 2) == 1) {
		$totalWon += ($_POST['o'] * 2);
	}}

if($_POST['e'] != "") {
	if(($theNumber % 2) == 0) {
		$totalWon += ($_POST['e'] * 2);
	}
}

if($_POST['eta'] != "") {
	if($theNumber < 19) {
		$totalWon += ($_POST['eta'] * 2);
	}
}

if($_POST['ntz'] != "") {
	if($theNumber > 18) {
		$totalWon += ($_POST['ntz'] * 2);
	}
}

if($_POST['ett'] != "") {
	if($theNumber < 13) {
		$totalWon += ($_POST['ett'] * 2);
	}
}

if($_POST['dtv'] != "") {
	if(($theNumber < 24) && ($theNumber > 13)) {
		$totalWon += ($_POST['vtz'] * 2);
	}
}

if($_POST['vtz'] != "") {
	if($theNumber > 24) {
		$totalWon += ($_POST['vtz'] * 2);
	}
}

if($_POST['ek'] != "") {
	for($theCount = 1; $theCount < 36; $theCount = $theCount + 3) {
		if($theNumber == $theCount) {
			$totalWon += ($_POST['ek'] * 3);
		}
	}
}

if($_POST['tk'] != "") {
	for($theCount = 2; $theCount < 36; $theCount = $theCount + 3) {
		if($theNumber == $theCount) {
			$totalWon += ($_POST['tk'] * 3);
		}
	}
}

if($_POST['dk'] != "") {
	for($theCount = 3; $theCount < 36; $theCount = $theCount + 3) {
		if($theNumber == $theCount) {
			$totalWon += ($_POST['dk'] * 3);
		}
	}
}



?>

<link href="includes/test.css" rel="stylesheet" type="text/css">

<?php





$usersmoney15 = $usersmoney + $bet;
if($theError != "") {
	echo '
	<div align="center">
		<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
	  		
	  		<tr>
	  			<td bgcolor="red" class="style4">'.$theError.'<td>
            <tr>
        </table>
	</div>';


} elseif ($totalWon > $originalOwnersMoney) {
	echo "You won all the owners cash and the table dropped!!";
	mysql_query("UPDATE casinos SET owner='0', max='0' WHERE casino='Roulette' AND location='$fetch->location'");
     mysql_query("UPDATE casinos SET max='0' WHERE casino='Roulette' AND location='$fetch->location'");

	mysql_query("UPDATE users SET money='$usersmoney15' WHERE username='$username'");
	mysql_query("UPDATE users SET money='0' WHERE username='$owner'");
} elseif($totalBet > $maxBet) {
	echo '
	<div align="center">
		<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
	  		<tr>
	  		</tr>
	  		<tr>
	  			<td bgcolor="red" class="style4">
	  				You can only bet &pound;'.$maxBet.'
                <td>
            </tr>
        </table>
	</div>'; 
	} elseif($totalBet > $usersmoney) {
	echo '
	<div align="center">
		<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
	  		<tr>
	  		</tr>
	  		<tr>
	  			<td bgcolor="red" class="style4">
	  				You can only bet &pound;'.$maxBet.'
                <td>
            </tr>
        </table>
	</div>'; 

} elseif($totalBet < $minBet) {
	echo '
	<div align="center">
		<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
	  		<tr>
	  		</tr>
	  		<tr>
	  			<td bgcolor="red" class="style4">
	  				You have to bet at least &pound;'.$minBet.'
                </td>
            </tr>
        </table>
	</div>';
} elseif($totalBet > 0) {
	echo '
	<div align="center">
		<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
	  		<tr>
	    		<td align=center background="./includes/grad.jpg" class="header">
	    			Wheel Number <span class="style4">'.$theNumber.'</span>
	    		</td>
	  		</tr>
	  		<tr>
	  		</tr>
	  		<tr>
	  			<td bgcolor="#00FF00" class="style4">
	  				You bet &pound;'.$totalBet.' and won &pound;'.$totalWon.'
                <td>
            <tr>
        </table>
	</div>';
	

	$netAmtWon = $totalWon - $totalBet;
	$usersmoney += $netAmtWon;
	$ownersmoney -= $netAmtWon;

	mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
	mysql_query("UPDATE users SET money='$usersmoney' WHERE username='$username'");
    mysql_query("UPDATE casinos SET profit = profit - ".$netAmtWon." WHERE location='$fetch->location' AND casino='Roulette'");

}
?>     

<span class="style3">
    <script language="JavaScript"> 
function disableEnterKey()
{ 
     if (window.event.keyCode == 13) window.event.keyCode = 0; 
} 
    </script>
<br>
<center>
<form action="" method=post onKeyPress="disableEnterKey()">
<table border=1 cellspacing=0 cellpadding=0 width=70% class=thinline bordercolor=black>
	<tr>
		<td colspan="2" align=center background="./includes/grad.jpg" class="style4">Roulette</td>
	</tr>
	<tr>
		<td width=100% align=center>
			<img src="roulettetable.gif" border=0>
		</td>
		<td align=center>
			<table border=0 cellspacing=0 cellpadding=1 bordercolor=#EEEEEE width=100% class=thinline>
				<tr>
					<td align=right>01:</td><td><input type=text size=5 name=1 ></td>
					<td align=right>02:</td><td><input type=text size=5 name=2 ></td>
					<td align=right>03:</td><td><input type=text size=5 name=3 ></td>
					<td align=right>04:</td><td><input type=text size=5 name=4 ></td>
				</tr>
				<tr>
					<td align=right>05:</td><td><input type=text size=5 name=5 ></td>
					<td align=right>06:</td><td><input type=text size=5 name=6 ></td>
					<td align=right>07:</td><td><input type=text size=5 name=7 ></td>
					<td align=right>08:</td><td><input type=text size=5 name=8 ></td>
				</tr>
				<tr>
					<td align=right>09:</td><td><input type=text size=5 name=9 ></td>
					<td align=right>10:</td><td><input type=text size=5 name=10 ></td>
					<td align=right>11:</td><td><input type=text size=5 name=11 ></td>
					<td align=right>12:</td><td><input type=text size=5 name=12 ></td>
				</tr>
				<tr>
					<td align=right>13:</td><td><input type=text size=5 name=13 ></td>
					<td align=right>14:</td><td><input type=text size=5 name=14 ></td>
					<td align=right>15:</td><td><input type=text size=5 name=15 ></td>
					<td align=right>16:</td><td><input type=text size=5 name=16 ></td>
				</tr>
				<tr>
					<td align=right>17:</td><td><input type=text size=5 name=17 ></td>
					<td align=right>18:</td><td><input type=text size=5 name=18 ></td>
					<td align=right>19:</td><td><input type=text size=5 name=19 ></td>
					<td align=right>20:</td><td><input type=text size=5 name=20 ></td>
				</tr>
				<tr>
					<td align=right>21:</td><td><input type=text size=5 name=21 ></td>
					<td align=right>22:</td><td><input type=text size=5 name=22 ></td>
					<td align=right>23:</td><td><input type=text size=5 name=23 ></td>
					<td align=right>24:</td><td><input type=text size=5 name=24 ></td>
				</tr>
				<tr>
					<td align=right>25:</td><td><input type=text size=5 name=25 ></td>
					<td align=right>26:</td><td><input type=text size=5 name=26 ></td>
					<td align=right>27:</td><td><input type=text size=5 name=27 ></td>
					<td align=right>28:</td><td><input type=text size=5 name=28 ></td>
				</tr>
				<tr>
					<td align=right>29:</td><td><input type=text size=5 name=29 ></td>
					<td align=right>30:</td><td><input type=text size=5 name=30 ></td>
					<td align=right>31:</td><td><input type=text size=5 name=31 ></td>
					<td align=right>32:</td><td><input type=text size=5 name=32 ></td>
				</tr>
				
				<tr>
					<td align=right>33:</td><td><input type=text size=5 name=33 ></td>
					<td align=right>34:</td><td><input type=text size=5 name=34 ></td>
					<td align=right>35:</td><td><input type=text size=5 name=35 ></td>
					<td align=right>36:</td><td><input type=text size=5 name=36 ></td>
				</tr>
				<tr>
					<td align=right>Red:</td><td><input type=text size=5 name=r></td>
					<td align=right>Black:</td><td><input type=text size=5 name=b ></td>
					<td align=right>Odd:</td><td><input type=text size=5 name=o ></td>
					<td align=right>Even:</td><td><input type=text size=5 name=e ></td>
				</tr>
				<tr>
					<td align=right>1-18:</td><td><input type=text size=5 name=eta ></td>
					<td align=right>19-36:</td><td><input type=text size=5 name=ntz ></td>
					<td align=right>1-12:</td><td><input type=text size=5 name=ett ></td>
					<td align=right>13-24:</td><td><input type=text size=5 name=dtv ></td>
				</tr>
				<tr>
					<td align=right>25-36:</td><td><input type=text size=5 name=vtz ></td>
					<td align=right>1st column:</td><td><input type=text size=5 name=ek ></td>
					<td align=right>2nd column:</td><td><input type=text size=5 name=tk ></td>
					<td align=right>3rd column:</td><td><input type=text size=5 name=dk ></td>
				</tr>
				<tr>
					<td colspan=10 align=center><input type="reset" class="submit" value="Bet" />					  
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type=reset class="submit" value=Reset>
				  </td>
				</tr>
			</table>
		</td>
	</tr>
</table>	
</form>	

</body>


<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none><tr>
  <td colspan="2" align=center background="./includes/grad.jpg">Max</td>
</tr>
<tr><td height=1 colspan="2" bgcolor=black></td></tr>
<tr><td bgcolor="#999999"><div align="center">  The max bet is set at <b>
<?php echo "£".makecomma($maxBet).""; ?>
</b><br>
</div></td>
  <td bgcolor="#999999">&nbsp;</td>
</tr>
</table>
<p>&nbsp;</p>
<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none>
  <tr>
    <td align=center background="./includes/grad.jpg">Owner</td>
  </tr>
  <tr>
    <td bgcolor=black height=1></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center"> This casino is owned by 
<?php 
if ($owner !=""){ 
	echo "<a href='profile.php?viewuser=$owner'><b>$owner</b></a>"; 
}elseif ($owner == ""){ 
	echo "<u><b>No one</u></b>"; 
}
?>
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