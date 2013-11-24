<?php
start_session;
include("includes/functions.php");
 /* Created on: 6-5-2005 */ ?>
<html>
<head>
<title>includes-Network</title>
<link rel="stylesheet" href="includes/in.css">
<body>
<strong> 
<?php 
$sql = mysql_query("SELECT * FROM users WHERE username='$_SESSION[username]'");
$user = mysql_fetch_array($sql);
$c = mysql_query("SELECT * FROM countries WHERE country = '$user[location]'");
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
		mysql_query("UPDATE countries SET blackjack = '$_SESSION[username]'");
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
				mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
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
				mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
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
				mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
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
				mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
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
				mysql_query("UPDATE countries SET blackjack_profit = '$newprofit' WHERE country = '$user[location]'");
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
			?><center>
</strong> 
<Form action="<?=$_SERVER['file:///C|/Documents%20and%20Settings/Tin%20Tin/Desktop/john/game_scripts/mafia/PHP_SELF']; ?>">
  <table border=1 cellpadding=0 cellspacing=0 width="75%" bordercolor="#000000">
    <tr bgcolor="#0033FF"> 
      <th colspan="2" class="header"><strong>Blackjack</strong></th>
    <?
			if(isset($_SESSION['playerbalance'])){
			?>
    <tr> 
      <td height="150" align="center"><strong>You have 
        <?=$_SESSION['playerbalance'];?>
        <br>
        You got an <br>
        <img src=<?=$image[0];?>></strong></td>
      <td height="150" align="center"><strong>Dealer has 
        <?=$_SESSION['dealerbalance'];?>
        <br>
        Dealer got an <br>
        <img src=<?=$image[1];?>></strong></td>
    </tr>
    <?
			}
			?>
    <tr> 
      <td><strong> 
        <input type="submit" value="Hit" name="hit">
        </strong></td>
      <td><strong> 
        <input type="submit" value="Hold" name="draw">
        </strong></td>
    </tr>
    <tr> 
      <td><strong>Bet:</strong></td>
      <td><strong> 
        <input type="text" name="bet" value="<?=$bet;?>">
        </strong></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><strong> 
        <input type="submit" value="Deal" name="deal">
        </strong></td>
    </tr>
  </table>
</form>
<strong><br>
<br>
This blackjack is owned by <a href="file:///C|/Documents%20and%20Settings/Tin%20Tin/Desktop/john/game_scripts/mafia/view.php?user=<?=$cont['blackjack']; ?>"> 
<?=$cont['blackjack']; ?>
</a>.<br>
The max bet is set at $ 
<?=number_format($cont['blackjack_max']); ?>
.<br>
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
					mysql_query("UPDATE countries SET blackjack_max = '$newmax' WHERE country = '$user[location]'");
					echo ("The max bet has been changed");
				}
			elseif($give_away)
				{
					mysql_query("UPDATE countries SET blackjack = '$newowner' WHERE country = '$user[location]'");
					echo ("The blackjack has been given away");
				}
			elseif($drop)
				{
					mysql_query("UPDATE countries SET blackjack = '' WHERE country = '$user[location]'");
					echo ("The blackjack has been dropped");
				}
			else
				{
				?><center>
</strong> 
<form action="<?=$_SERVER['file:///C|/Documents%20and%20Settings/Tin%20Tin/Desktop/john/game_scripts/mafia/PHP_SELF']; ?>">
  <table border=1 bordercolor="#000000" cellpadding=0 cellspacing=0>
    <tr bgcolor="#0033FF"> 
      <th colspan="2" class="header"><strong>Blackjack Options</strong></th>
    
    <tr> 
      <td><strong>Profit:</strong></td>
      <td><strong>$ 
        <?
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
						?>
        </strong></td>
    </tr>
    <tr> 
      <td><strong>Old max bet:</strong></td>
      <td><strong>$ 
        <?=number_format($cont['blackjack_max']); ?>
        </strong></td>
    </tr>
    <tr> 
      <td><strong>New max bet:</strong></td>
      <td><strong> 
        <input type="text" name="newmax">
        </strong></td>
    </tr>
    <tr> 
      <td>&nbsp;</tD>
      <td><strong> 
        <input type="submit" value="Change" name="change_max">
        </strong></td>
    </tr>
  </table>
</form>
<strong><br>
</strong> 
<form action="<?=$_SERVER['file:///C|/Documents%20and%20Settings/Tin%20Tin/Desktop/john/game_scripts/mafia/PHP_SELF']; ?>">
  <table border=1 bordercolor="#000000" cellpadding=0 cellspacing=0>
    <tr bgcolor="#0033FF"> 
      <th colspan="2" class="header"><strong>Give blackjack away</strong></th>
    
    <tr> 
      <td><strong>Username:</strong></td>
      <td><strong> 
        <input type="text" name="newowner">
        </strong></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><strong> 
        <input type="submit" value="Give" name="give_away">
        </strong></td>
    </tr>
  </table>
</form>
<strong><br>
</strong> 
<form action="<?=$_SERVER['file:///C|/Documents%20and%20Settings/Tin%20Tin/Desktop/john/game_scripts/mafia/PHP_SELF']; ?>">
  <strong> 
  <input type="submit" value="Drop" name="drop">
  </strong> 
</form>
<strong> 
<? 
				}
				}
		include("includes/footer.php");
?>
</strong> 
</body>
</html>

