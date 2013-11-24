<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
 /* Created on: 6-5-2005 */ ?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="includes/in.css">
<body>
<?php 
$sql = mysql_query("SELECT * FROM users WHERE username='$_SESSION[username]'");
$user = mysql_fetch_array($sql);
$c = mysql_query("SELECT * FROM users WHERE location = '$user[location]'");
$cont = mysql_fetch_array($c);
$o = mysql_query("SELECT * FROM users WHERE username = '$cont[blackjack]'");
$own = mysql_fetch_array($o);
$bet=strip_tags($_GET['bet']);
$deal=strip_tags($_GET['deal']);
$draw=strip_tags($_GET['draw']);
$hit=strip_tags($_GET['hit']);
if($_SESSION['username'] != $cont['blackjack'])
	{
if($deal<>''){
if($bet > $cont['blackjack_max'])
	{
		echo ("Your bet exceeds the max bet");
	}
elseif($bet > $user['money'])
	{
		echo ("You don't have that much money");
	}
elseif($own['money'] <= 0)
	{
		mysql_query("UPDATE casinos SET bj = '$_SESSION[username]'");
		echo ("You took over the blackjack");
	}
else
	{
		$card = rand(2,10);
		$card2 = rand(2,10);
		$image[0] = "images/".$card.".gif";
			 	$image[1] = "images/".$card2.".gif";
				session_register("playerbalance");
				session_register("dealerbalance");
				session_register("bet");
				$_SESSION['bet'] = $bet;
				$_SESSION['dealerbalance'] = $card2;
				$_SESSION['playerbalance'] = $card;	   
				$newmoney = $user['money']-$bet; 
				$newuser = $own['money']+$bet;
				$newprofit = $cont['blackjack_profit']+$bet;
				mysql_query("UPDATE users SET money='$newuser' WHERE username = '$cont[blackjack]'");
				mysql_query("UPDATE casinos SET profit='$newprofit' WHERE location='$fetch->location' AND casino='bj' AND owner !='0'");
				
				mysql_query("UPDATE users SET money='$newmoney' WHERE username = '$_SESSION[username]'");
	}
}
elseif($hit<>'')
	{
	$newcard = rand(2,10);
	$_SESSION['playerbalance'] = $newcard+$_SESSION['playerbalance'];
	$newcard2 = rand(2,10);
		$image[0] = "images/".$newcard.".gif";
			 	$image[1] = "images/".$newcard2.".gif";
	$_SESSION['dealerbalance'] = $newcard2+$_SESSION['dealerbalance'];
	if($_SESSION['playerbalance'] > 21)	
			{		
					$newprofit = $cont['blackjack_profit']+$_SESSION['bet'];
					$newmoney = $own['money']+$_SESSION['bet'];
					mysql_query("UPDATE users SET money = '$newmoney' WHERE username = '$cont[blackjack]'");					mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
					unset($_SESSION['playerbalance']);
					unset($_SESSION['bet']);
					unset($_SESSION['dealerbalance']);
					echo ("You busted. You lost.");
			}
	elseif($_SESSION['dealerbalance'] > 21)
			{
				$newprofit = $cont['blackjack_profit']-($_SESSION['bet']*2);
				$newmoney = $own['money']-($_SESSION['bet']*2);
				$newuser = $user['money']+($_SESSION['bet']*2);
				$best=$_SESSION['bet'];
				$best=$best*2;
				mysql_query("UPDATE users SET money = '$newuser' WHERE username = '$_SESSION[username]'");
				mysql_query("UPDATE users SET money = '$newmoney' WHERE username = '$cont[blackjack]'");
				mysql_query("UPDATE casinos SET profit='$newprofit' WHERE location='$fetch->location' AND casino='bj' AND owner !='0'");
				unset($_SESSION['playerbalance']);
				unset($_SESSION['bet']);
				unset($_SESSION['dealerbalance']);
				echo ("The dealer has busted. You won $best.");
			}
	elseif($_SESSION['playerbalance'] == 21)
			{
				$newprofit = $cont['blackjack_profit']-($_SESSION['bet']*2.5);
				$newmoney = $own['money']-($_SESSION['bet']*2.5);
				$newuser = $user['money']+($_SESSION['bet']*2.5);
				$best=$_SESSION['bet']*2.5;
				mysql_query("UPDATE users SET money = '$newuser' WHERE username = '$_SESSION[username]'");
				mysql_query("UPDATE users SET money = '$newmoney' WHERE username = '$cont[blackjack]'");
				mysql_query("UPDATE casinos SET profit='$newprofit' WHERE location='$fetch->location' AND casino='bj' AND owner !='0'");
				unset($_SESSION['playerbalance']);
				unset($_SESSION['bet']);
				unset($_SESSION['dealerbalance']);
				echo ("You had blackjack. You won $best.");
			}
	}	
elseif($draw<>''){
if($_SESSION['playerbalance'] > $_SESSION['dealerbalance'])
	{
				$newprofit = $cont['blackjack_profit']-($_SESSION['bet']*2);
				$newmoney = $own['money']-($_SESSION['bet']*2);
				$newuser = $user['money']+($_SESSION['bet']*2);
				$best=$_SESSION['bet'];
				mysql_query("UPDATE users SET money = '$newuser' WHERE username = '$_SESSION[username]'");
				mysql_query("UPDATE users SET money = '$newmoney' WHERE username = '$cont[blackjack]'");
				mysql_query("UPDATE casinos SET profit='$newprofit' WHERE location='$fetch->location' AND casino='bj' AND owner !='0'");
				unset($_SESSION['playerbalance']);
				unset($_SESSION['bet']);
				unset($_SESSION['dealerbalance']);
				echo ("You had higher than the dealer. You won $best.");
	}
elseif($_SESSION['playerbalance'] == $_SESSION['dealerbalance'])
	{
				$newprofit = $cont['blackjack_profit']-($_SESSION['bet']*1);
				$newmoney = $own['money']-($_SESSION['bet']*1);
				$newuser = $user['money']+($_SESSION['bet']*1);
				mysql_query("UPDATE users SET money = '$newuser' WHERE username = '$_SESSION[username]'");
				mysql_query("UPDATE users SET money = '$newmoney' WHERE username = '$cont[blackjack]'");
				mysql_query("UPDATE casinos SET profit='$newprofit' WHERE location='$fetch->location' AND casino='bj' AND owner !='0'");
				unset($_SESSION['playerbalance']);
				unset($_SESSION['bet']);
				unset($_SESSION['dealerbalance']);
				echo ("It was a push. Both you and the dealer had the same amount.");
	}
else
	{						
				unset($_SESSION['playerbalance']);
				unset($_SESSION['bet']);
				unset($_SESSION['dealerbalance']);
				echo ("The dealer has higher than you. You lost $bet.");
	}
}
			?>
			<center>
			<Form action="<?=$_SERVER['PHP_SELF']; ?>">
			<table border=1 cellpadding=0 cellspacing=0 width="75%" bordercolor="#000000">
			<th class="header" colspan="2">Blackjack</th>
			<?
			if(isset($_SESSION['playerbalance'])){
			?>
			<tr>
				<td height="150" align="center">You have <?=$_SESSION['playerbalance'];?><br>You got an <br><img src=<?=$image[0];?>></td>
				<td height="150" align="center">Dealer has <?=$_SESSION['dealerbalance'];?><br>Dealer got an <br><img src=<?=$image[1];?>></td>
			</tr>
			<?
			}
			?>
			<tr>
				<td><input type="submit" value="Hit" name="hit"></td>
				<td><input type="submit" value="Hold" name="draw"></td>
				</tr>
			<tr>
				<td>Bet:</td>
				<td><input type="text" name="bet" value="<?=$bet;?>"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Deal" name="deal"></td>
			</tr> 
			</table>
			</form>
			<br><br>
			This blackjack is owned by <a href="view.php?user=<?=$cont['blackjack']; ?>"><?=$cont['blackjack']; ?></a>.<br>
			The max bet is set at $<?=number_format($cont['blackjack_max']); ?>.<br>
			<? 
			 }
			 else{
			 $change_max=strip_tags($_GET[change_max]);
			 $newmax=strip_tags($_GET['newmax']);
			 $give_away=strip_tags($_GET['give_away']);
			 $newowner=strip_tags($_GET['newowner']);
			 $drop=strip_tags($_GET['drop']);

			 if($change_max)
			 	{
					mysql_query("UPDATE casinos SET max = '$newmax' WHERE location = '$user[location]'");
					echo ("The max bet has been changed");
				}
			elseif($give_away)
				{
					mysql_query("UPDATE casino SET bj = '$newowner' WHERE location = '$user[location]'");
					echo ("The blackjack has been given away");
				}
			elseif($drop)
				{
					mysql_query("UPDATE casino SET owner = '0' WHERE location = '$user[location]'");
					echo ("The blackjack has been dropped");
				}
			else
				{
				?>
				<center>
				<form action="<?=$_SERVER['PHP_SELF']; ?>">
				<table border=1 bordercolor="#000000" cellpadding=0 cellspacing=0>
				<th class="header" colspan="2">Blackjack Options</th>
				<tr>
					<td>Profit:</td>
					<td>$<?
					if($cont['blackjack_profit'] > 0)
						{
							echo "<font color=\"#00CC00\">".number_format($cont['blackjack_profit'])."</font>";
						}
					elseif($cont['blackjack_profit'] == 0)
						{
							echo $cont['blackjack_profit'];
						}
					else
						{
							echo "<font color=\"#FF0000\">".number_format($cont['blackjack_profit'])."</font>";
						}
						?></td>
				</tr>
				<tr>
					<td>Old max bet:</td>
					<td>$<?=number_format($cont['blackjack_max']); ?></td>
				</tr>
				<tr>
					<td>New max bet:</td>
					<td><input type="text" name="newmax"></td>
				</tr>
				<tr>
					<td>&nbsp;</tD>
					<td><input type="submit" value="Change" name="change_max"></td>
				</tr>
				</table>
				</form>
				<br>
				<form action="<?=$_SERVER['PHP_SELF']; ?>">
				<table border=1 bordercolor="#000000" cellpadding=0 cellspacing=0>
				<th class="header" colspan="2">Give blackjack away</th>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="newowner"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Give" name="give_away"></td>
				</tr>
				</table>
				</form>
				<br>
				<form action="<?=$_SERVER['PHP_SELF']; ?>">
				<input type="submit" value="Drop" name="drop">
				</form>
				<? 
				}
				}
		include("includes/footer.php");
?>
</body>
</html>

