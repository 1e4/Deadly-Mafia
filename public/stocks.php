<?
session_start(); 
include_once "includes/db_connect.php";
include_once "includes/functions.php";

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));


$stats12 = mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));

$stockam = explode("-", $fetch->stock);
$prices=explode("-", $stats12->newstockp);
$prices1=explode("-", $stats12->oldstockp);
if ($stats12->stime <= time()){
$newtime1 = time() + 100;
$a1 = $prices[0] + rand(-50,10000);
$a2 = $prices[1] + rand(-80,29474);
$a3 = $prices[2] + rand(-100,34750);
$a4 = $prices[3] + rand(-75,1934756);
$a5 = $prices[4] + rand(-92,347855);

$newpricess1="$a1-$a2-$a3-$a4-$a5";

	mysql_query("UPDATE site_stats SET oldstockp='$stats12->newstockp' WHERE id='1'");
		mysql_query("UPDATE site_stats SET newstockp='$newpricess1' WHERE id='1'");
	mysql_query("UPDATE site_stats SET stime='$newtime1' WHERE id='1'");
}
/////////diffrent ranks can hold diffrent stocks
if ($fetch->rank == "Scum"){
	$maxstocks = "15";
}
if ($fetch->rank == "Tramp"){
	$maxstocks = "20";
}
if ($fetch->rank == "Chav"){
	$maxstocks = "30";
}
if ($fetch->rank == "Vandal"){
	$maxstocks = "40";
}
if ($fetch->rank == "Buisness Man"){
	$maxstocks = "50";
}
if ($fetch->rank == "Hitman"){
	$maxstocks = "65";
}
if ($fetch->rank == "Agent"){
	$maxstocks = "70";
}
if ($fetch->rank == "Boss"){
	$maxstocks = "80";
}
if ($fetch->rank == "Assassin"){
	$maxstocks = "100";
}
if ($fetch->rank == "Godfather"){
	$maxstocks = "120";
}
if ($fetch->rank == "Global Threat"){
	$maxstocks = "135";
}
if ($fetch->rank == "World Dominator"){
	$maxstocks = "150";
}
if ($fetch->rank == "Untouchable Godfather"){
	$maxstocks = "200";
}
if ($fetch->rank == "Legend"){
	$maxstocks = "1000";
}
if ($fetch->rank == "Official Bliss Godfather"){
	$maxstocks = "1500";
}



if ($_POST['doit']){
	$doit = $_POST['doit'];
if ($doit == 'buy'){
/////////ny trains
if ($_POST['nytl']){
$stocka = (strip_tags($_POST['nytl']));
$totala=$stocka*$prices[0];
}else{
$stocka=0;
}

/////////ny trains
if ($_POST['tnyt']){
$stockb = (strip_tags($_POST['tnyt']));
$totalb=$stockb*$prices[1];
}else{
$stockb=0;
}

/////////ny trains
if ($_POST['qits']){
$stockc = (strip_tags($_POST['qits']));
$totalc=$stockc*$prices[2];
}else{
$stockc=0;
}

/////////ny trains
if ($_POST['abco']){
$stockd=(strip_tags($_POST['abco']));
$totald=$stockd*$prices[3];
}else{
$stockd=0;
}

/////////bronx consultancy
if ($_POST['brcg']){
$stocke=(strip_tags($_POST['brcg']));
$totale=$stocke*$prices[4];
}else{
$stocke=0;
}
///////////////////
if(ereg("[^[:digit:]]", $stocka)){
			echo "			
Bad amount!!</font>";
}elseif (!ereg("[^[:digit:]]", $stocka)){
///////////////////
if(ereg("[^[:digit:]]", $stockb)){
			echo "			
Bad amount!!</font>";
}elseif (!ereg("[^[:digit:]]", $stockb)){
///////////////////
if(ereg("[^[:digit:]]", $stockc)){
			echo "			
Bad amount!!</font>";
}elseif (!ereg("[^[:digit:]]", $stockc)){
///////////////////
if(ereg("[^[:digit:]]", $stockd)){
			echo "			
Bad amount!!</font>";
}elseif (!ereg("[^[:digit:]]", $stockd)){
///////////////////
if(ereg("[^[:digit:]]", $stocke)){
			echo "			
Bad amount!!</font>";
}elseif (!ereg("[^[:digit:]]", $stocke)){
///////////////////

if ($stockam[0] != 0){
			$stocka = $stocka + $stockam[0];
		}
if ($stockam[1] != 0){
			$stockb = $stockb + $stockam[1];
		}
if ($stockam[2] != 0){
			$stockc = $stockc + $stockam[2];
		}
if ($stockam[3] != 0){
			$stockd = $stockd + $stockam[3];
		}
if ($stockam[4] != 0){
			$stocke = $stocke + $stockam[4];
		}	
$total = $stocka+$stockb+$stockc+$stockd+$stocke;
		
if ($total > $maxstocks){
echo "You can only have $maxstocks stocks</font>";
}elseif ($total <= $maxstocks){
$totalprice = $totala + $totalb + $totalc + $totald + $totale;
if ($totalprice > $fetch->money){
echo "You cant afford that.";
}elseif ($totalprice <= $fetch->money){
$newstocks = "$stocka-$stockb-$stockc-$stockd-$stocke";
$new_money=$fetch->money-$totalprice;
					mysql_query("UPDATE users SET money=$new_money WHERE username='$username'");
					mysql_query("UPDATE users SET stock='$newstocks' WHERE username='$username'");
echo "Successful transaction.";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=stocks.php\">";

}}}}}}}}}
/////////////sell stocks
if ($_POST['doit']){
	$doit = $_POST['doit'];
if ($doit == 'sell'){
if ($_POST['nytl']){
$sell1 = intval(strip_tags($_POST['nytl']));
$totals1 = $sell1* $prices[0];
}else{
$sell1 = 0;
}
if ($_POST['tnyt']){
$sell2 = intval(strip_tags($_POST['tnyt']));
$totals2 = $sell2* $prices[1];
}else{
$sell2 = 0;
}
if ($_POST['qits']){
$sell3 = intval(strip_tags($_POST['qits']));
$totals3 = $sell3* $prices[2];
}else{
$sell3 = 0;
}
if ($_POST['abco']){
$sell4 = intval(strip_tags($_POST['abco']));
$totals4 = $sell4* $prices[3];
}else{
$sell4 = 0;
}
if ($_POST['brcg']){
$sell5 = intval(strip_tags($_POST['brcg']));
$totals5 = $sell5* $prices[4];
}else{
$sell5 = 0;
}
////////////check for invalid digits
if(ereg("[^[:digit:]]", $sell1)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $sell1)){
//////////////////////////
if(ereg("[^[:digit:]]", $sell1)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $sell2)){
////////////////////////////
if(ereg("[^[:digit:]]", $sell3)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $sell3)){
///////////////////////
if(ereg("[^[:digit:]]", $sell4)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $sell4)){
////////////////
if(ereg("[^[:digit:]]", $sell5)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $sell5)){
////////// check to see if they have that many stocks
if($sell1 > $stockam[0]){
				echo "You dont have that many!";
				}elseif ($sell1 <= $stockam[0]){
if($sell2 > $stockam[1]){
				echo "You dont have that many!";
				}elseif ($sell2 <= $stockam[1]){
if($sell3 > $stockam[2]){
				echo "You dont have that many!";
				}elseif ($sell3 <= $stockam[2]){
if($sell4 > $stockam[3]){
				echo "You dont have that many!";
				}elseif ($sell4 <= $stockam[3]){
if($sell5 > $stockam[4]){
				echo "You dont have that many!";
				}elseif ($sell5 <= $stockam[4]){
///////////work out new values of each stock
if ($stockam[0] != 0){
			$sell1 =$stockam[0] - $sell1;
		}
if ($stockam[1] != 0){
			$sell2 =$stockam[1] - $sell2;
		}

if ($stockam[2] != 0){
			$sell3 =$stockam[2] - $sell3;
		}
if ($stockam[3] != 0){
			$sell4 =$stockam[3] - $sell4;
		}
if ($stockam[4] != 0){
			$sell5 =$stockam[4] - $sell5;
		}
////////// workout values if you sell all stocks
if ($sell1 == ""){
			$sell1 = 0;
		}	
if ($sell2 == ""){
			$sell2 = 0;
		}	
if ($sell3 == ""){
			$sell3 = 0;
		}	
if ($sell4 == ""){
			$sell4 = 0;
		}	
if ($sell5 == ""){
			$sell5 = 0;
		}	
//////////////work out money and new stocks and insert it into db
$new_stocks1 = "$sell1-$sell2-$sell3-$sell4-$sell5";		
$setmemycash = $totals1 + $totals2 + $totals3 + $totals4 + $totals5;
						$new_money_1 = $fetch->money + $setmemycash;
						mysql_query("UPDATE users SET money='$new_money_1', stock='$new_stocks1' WHERE username='$username'");
						echo "Successful transaction.";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=stocks.php\">";
}}}}}}}}}}}}

?>
<link href="includes/test.css" rel="stylesheet" type="text/css">


<center>
<span class="style1"> You can hold <? echo "$maxstocks"; ?> stocks
</span>
<form action='' method='post'>
<table width="61%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#666666" class="thinline">
  <tr>
    <td class="header" colspan=7><div align="center">Stock Market </div></td>
  </tr>  </tr>
  <tr bgcolor=#666666>
    <td width="29%" colspan=6 bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">The prices will change in <? echo "".maketime($stats12->stime).""; ?></div></td>
  </tr>
  <tr bgcolor=#666666>
    <td width="29%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">Company</div></td>
    <td width="10%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">Symbol</div></td>
    <td width="10%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">Price </div></td>

    <td width="10%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">Old Price </div></td>
    <td width="11%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center"># Owned </div></td>
	    <td width="15%" bordercolor="#FFFFFF" bgcolor="#666666" class=tip><div align="center">Buy/Sell</div></td>
  <tr>
    <td bgcolor="#666666"><strong>Coca-Cola</strong></td>
    <td bgcolor="#666666">CC</td>
    <td bgcolor="#666666"><strong><? echo "£".makecomma($prices[0]).""; ?></strong></td>
   
    <td bgcolor="#666666"><? echo "£".makecomma($prices1[0]).""; ?></td>
    <td bgcolor="#666666"><? echo "$stockam[0]"; ?></td>
	    <td bgcolor="#666666"><input name="nytl" type="text" class="submit" size="8" maxlength="4"></td>
  </tr>
  <tr>
    <td bgcolor="#666666"><strong>Samsung</strong></td>
    <td bgcolor="#666666">Sa</td>
    <td bgcolor="#666666"><strong><? echo "£".makecomma($prices[1]).""; ?></strong></td>
  
    <td bgcolor="#666666"><? echo "£".makecomma($prices1[1]).""; ?></td>
    <td bgcolor="#666666"><? echo "$stockam[1]"; ?></td>
	    <td bgcolor="#666666"><input name="tnyt" type="text" class="submit" size="8" maxlength="4"></td>
  </tr>
  <tr>
    <td bgcolor="#666666"><strong>British airways </strong></td>
    <td bgcolor="#666666">BA</td>
    <td bgcolor="#666666"><strong><? echo "£".makecomma($prices[2]).""; ?></strong></td>

    <td bgcolor="#666666"><? echo "£".makecomma($prices1[3]).""; ?></td>
    <td bgcolor="#666666"><? echo "$stockam[2]"; ?></td>
	    <td bgcolor="#666666"><input name="qits" type="text" class="submit" size="8" maxlength="4"></td>
  </tr>
  <tr>
    <td bgcolor="#666666"><strong>Sony</strong></td>
    <td bgcolor="#666666">So</td>
    <td bgcolor="#666666"><strong><? echo "£".makecomma($prices[3]).""; ?></strong></td>
    
    <td bgcolor="#666666"><? echo "£".makecomma($prices1[3]).""; ?></td>
    <td bgcolor="#666666"><? echo "$stockam[3]"; ?></td>
	    <td bgcolor="#666666"><input name="abco" type="text" class="submit" size="8" maxlength="4"></td>
  </tr>
  <tr>
    <td bgcolor="#666666"><strong>Tesco</strong></td>
    <td bgcolor="#666666">Te</td>
    <td bgcolor="#666666"><strong><? echo "£".makecomma($prices[4]).""; ?></strong></td>
  
    <td bgcolor="#666666"><? echo "£".makecomma($prices1[4]).""; ?></td>
    <td bgcolor="#666666"><? echo "$stockam[4]"; ?></td>
	    <td bgcolor="#666666"><input name="brcg" type="text" class="submit" size="8" maxlength="4"></td>
  </tr>
  
  <tr>
     <td bgcolor="#666666">&nbsp;</td>
	   <td bgcolor="#666666"><input type="radio" name="doit" value="buy" checked="checked"/>
Buy</td>
	     <td bgcolor="#666666"><input type="radio" name="doit" value="sell"/>
      Sell</td>
		   
		   <td bgcolor="#666666">&nbsp;</td>
		     <td bgcolor="#666666">Total: <? $total3456=$stockam[0]+$stockam[1]+$stockam[2]+$stockam[3]+$stockam[4]; echo "$total3456"; ?></td>
			   <td bgcolor="#666666">
      <input name="Submit" type="submit" class="submit" value="Submit"/>		      </td>
  </tr>
</table>
</form>

<div align="center">
  <p>The Stock Market may crash at anytime </p>
  <p><a href="stocks.php">Refresh</a><br>
  </p>
</div>
<?php require_once "includes/footer.php"; ?>