<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php";

logincheck();
$username = $_SESSION['username'];
$query2=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$in_out=mysql_fetch_object($query2);

///here are the config files


$drugsa = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($drugsa);

	$boya = explode("-", $fetch->drugs);
$last = $successa[1];
$prices = explode("-", $fetch->drugprices);
	$money = $fetch->money;
	$location= $fetch->location;
	$rank= $fetch->rank;
$mission=$fetch->mission;


if ($rank == "Chav"){
	$limit = "5";
}
if ($rank == "Pickpocket"){
	$limit = "10";
}
if ($rank == "Vandal"){
	$limit = "15";
}
if ($rank == "Gangster"){
	$limit = "20";
}
if ($rank == "Hitman"){
	$limit = "25";
}
if ($rank == "Knuckle Breaker"){
	$limit = "30";
}
if ($rank == "Boss"){
	$limit = "35";
}

if ($rank == "Assassin"){
	$limit = "40";
}

if ($rank == "Don"){
	$limit = "45";
}
if ($rank == "Godfather"){
	$limit = "50";
}

if ($rank == "Global Terror"){
	$limit = "55";
}
if ($rank == "Global Dominator"){
	$limit = "60";
}

if ($rank == "Untouchable Godfather"){
	$limit = "65";
}
if ($rank == "Legend"){
	$limit = "80";
}
if ($rank == "Official Deadly Mafia"){
	$limit = "99";
}
if ($_POST['tran']){
	$tran = $_POST['tran'];
if ($tran == 'buy'){



if ($_POST['hash']){
$hash_amount = intval(strip_tags($_POST['hash']));
$total_hash = $hash_amount* $prices[0];
}else{
$hash_amount = 0;
}

if ($_POST['ect']){
$ect_amount = intval(strip_tags($_POST['ect']));
$total_ect = $ect_amount* $prices[1];
}else{
$ect_amount = 0;
}
if ($_POST['coca']){
$coca_amount = intval(strip_tags($_POST['coca']));
$total_coca = $coca_amount* $prices[2];
}else{
$coca_amount = 0;
}
if ($_POST['phen']){
$phen_amount = intval(strip_tags($_POST['phen']));
			
$total_phen = $phen_amount* $prices[3];
}else{
$phen_amount = 0;
}

if ($_POST['amit']){
$amit_amount = intval(strip_tags($_POST['amit']));
$total_amit = $amit_amount* $prices[4];
}else{
$amit_amount = 0;
}

if(ereg("[^[:digit:]]", $hash_amount)){
			echo "			
<font color=red>Bad amount!!NUMBA 1</font>";
}elseif (!ereg("[^[:digit:]]", $hash_amount)){

///////////////////
if(ereg("[^[:digit:]]", $ect_amount)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $ect_amount)){
//////////////////////

if(ereg("[^[:digit:]]", $coca_amount)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $coca_amount)){
////////////////////////

if(ereg("[^[:digit:]]", $phen_amount)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $phen_amount)){

/////////////////////
if(ereg("[^[:digit:]]", $amit_amount)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $amit_amount)){
/////////////////////


if ($boya[0] != 0){
			$hash_amount = $hash_amount + $boya[0];
		}
if ($boya[1] != 0){
			$ect_amount = $ect_amount + $boya[1];
		}
if ($boya[2] != 0){
			$coca_amount = $coca_amount + $boya[2];
		}
if ($boya[3] != 0){
			
			$phen_amount = $phen_amount + $boya[3];
		}
if ($boya[4] != 0){
			$amit_amount = $amit_amount+ $boya[4];
		}

$total = $hash_amount + $ect_amount + $coca_amount + $phen_amount + $amit_amount;

if ($total > $limit){
			echo "<font color=red>You cant carry that much!</font>";
			}elseif ($total <= $limit){
$totalprice = $total_hash + $total_ect + $total_coca + $total_phen + $total_amit;


if ($totalprice > $money){
echo "You cant afford that.";
}elseif ($totalprice <= $money){


if($fetch->location == "London" && $fetch->mission == "1"){
				print"No more Phencyclidine left in London";
			
			}else{


$newgrams2 = "$hash_amount-$ect_amount-$coca_amount-$phen_amount-$amit_amount";
					$currentmoney = $money - $totalprice;
					mysql_query("UPDATE users SET money='$currentmoney',drugs='$newgrams2' WHERE username='$username'");
echo "Successful transaction.";
//echo "$newgrams";
}}}}}}}}}}

if ($_POST['tran']){
	$tran = $_POST['tran'];
if ($tran == "sell"){
if ($_POST['hash']){
$hash_sell = intval(strip_tags($_POST['hash']));
$total_hash = $hash_sell* $prices[0];
}else{
$hash_sell = 0;
}

if ($_POST['ect']){
$ect_sell = $_POST['ect'];
$total_ect = $ect_sell* $prices[1];
}else{
$ect_sell = 0;
}
if ($_POST['coca']){
$coca_sell = intval(strip_tags($_POST['coca']));
$total_coca = $coca_sell * $prices[2];
}else{
$coca_sell = 0;
}
if ($_POST['phen']){
$phen_sell = intval(strip_tags($_POST['phen']));
$total_phen = $phen_sell * $prices[3];
}else{
$phen_sell = 0;
}

if ($_POST['amit']){
$amit_sell = intval(strip_tags($_POST['amit']));
$total_amit = $amit_sell * $prices[4];
}else{
$amit_sell = 0;
}

if(ereg("[^[:digit:]]", $hash_sell)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $hash_sell)){

///////////////////
if(ereg("[^[:digit:]]", $ect_sell)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $ect_sell)){
//////////////////////

if(ereg("[^[:digit:]]", $coca_sell)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $coca_sell)){
////////////////////////

if(ereg("[^[:digit:]]", $phen_sell)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $phen_sell)){
/////////////////////
if(ereg("[^[:digit:]]", $amit_sell)){
			echo "			
<font color=red>Bad ammount!!</font>";
}elseif (!ereg("[^[:digit:]]", $amit_sell)){
/////////////////////


if($hash_sell > $boya[0]){
				echo "You dont have that much!";
				}elseif ($hash_sell <= $boya[0]){
			


if($ect_sell > $boya[1]){
				echo "You dont have that much!";
				}elseif ($ect_sell <= $boya[1]){



if($coca_sell > $boya[2]){
				echo "You dont have that much!";
				}elseif ($coca_sell <= $boya[2]){


if($phen_sell > $boya[3]){
				echo "You dont have that much!";
				}elseif ($phen_sell <= $boya[3]){

if($amit_sell > $boya[4]){
				echo "You dont have that much!";
				}elseif ($amit_sell <= $boya[4]){









if ($boya[0] != 0){
			$hash_sell =$boya[0] - $hash_sell;
		}
if ($boya[1] != 0){
			$ect_sell =  $boya[1] - $ect_sell;
		}
if ($boya[2] != 0){
			$coca_sell = $boya[2] - $coca_sell;
		}
if ($boya[3] != 0){
			$phen_sell = $boya[3] - $phen_sell;
		}
if ($boya[4] != 0){
			$amit_sell = $boya[4]- $amit_sell ;
		}


if ($hash_sell == ""){
			$hash_sell = 0;
		}	

if ($ect_sell == ""){
			$ect_sell = 0;
		}	
if ($coca_sell == ""){
			$coca_sell = 0;
		}	
if ($phen_sell == ""){
			$phen_sell = 0;
		}	
if ($amit_sell == ""){
			$amit_sell = 0;
		}	


$newgrams1 = "$hash_sell-$ect_sell-$coca_sell-$phen_sell-$amit_sell";
$totalprice = $total_hash + $total_ect + $total_coca + $total_phen + $total_amit;
						$currentmoney = $money + $totalprice;
						mysql_query("UPDATE users SET money='$currentmoney',drugs='$newgrams1' WHERE username='$username'");
								echo "Drugs sold";


//echo "$newgrams1";
}}}}}}}}}}}}

?>
<link href="includes/test.css" rel="stylesheet" type="text/css">


<center>

<form action='' method=post>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
    <table border=1 cellspacing=0 cellpadding=2 width=50% class=thinline bordercolor=black>
      <tr colspan="4" > 
        <td colspan="4" background="includes/grad.jpg"> <center>
            Drugs 
          </center>
          <center class=TableHeading>
          </center>
          <center class=TableHeading>
          </center>
          <center class=TableHeading>
          </center></td>
      </tr>
      <tr colspan="4" bgcolor=#666666> 
        <td  width=25% class=tip><div align="center" class="style2">Amount</div></td>
        <td  width=25% class=tip><div align="center" class="style2">Drugs</div></td>
        <td  width=25% class=tip><div align="center" class="style2">Price</div></td>
        <td  width=25% class=tip><div align="center" class="style2">Units</div></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input maxlength="2" type=text name=hash size=2>
        units</span></td>
        <td bgcolor="#666666"><span class="style3">Hash</span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "£".makecomma($prices[0]).""; ?></span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "$boya[0]"; ?></span></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input maxlength="2" type=text name=ect size=2>
        units</span></td>
        <td bgcolor="#666666"><span class="style3">Ecstasy</span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "£".makecomma($prices[1]).""; ?></span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "$boya[1]"; ?></span></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input maxlength="2" type=text name=coca size=2>
        units</span></td>
        <td bgcolor="#666666"><span class="style3">Cocaine</span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "£".makecomma($prices[2]).""; ?></span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "$boya[2]"; ?></span></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input maxlength="2" type=text name=phen size=2>
        units</span></td>
        <td bgcolor="#666666"><span class="style3">Phencyclidine</span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "£".makecomma($prices[3]).""; ?></span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "$boya[3]"; ?></span></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input maxlength="2" type=text name=amit size=2>
        units</span></td>
        <td bgcolor="#666666"><span class="style3">Amitriptyline</span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "£".makecomma($prices[4]).""; ?></span></td>
        <td bgcolor="#666666"><span class="style3"><?php echo "$boya[4]"; ?></span></td>
      </tr>
      <tr> 
        <td bgcolor="#666666"><span class="style3">
          <input type=radio name=tran value=buy checked>
        Buy</span></td>
        <td bgcolor="#666666"><span class="style3">
          <input type=radio name=tran value=sell>
        Sell</span></td>
        <td bgcolor="#666666"><span class="style3"></span></td>
        <td align=right bgcolor="#666666"><input name='submit' type=submit value="Deal Drugs"></td>
      </tr>
    </table>
</form>

</center>
<br>
<br>
<center>
<table width=25% border=1 align="center" cellpadding=2 cellspacing=0 bordercolor=black class=thinline>
  <tr>
<td colspan=2 align=center background="includes/grad.jpg"><center>Unit Table</center></td></tr>
<tr bgcolor=#666666>
<td width=50% align=center class=tip style3>Rank</td>
<td width=50% align=center class=tip style3>Units</td>
</tr>	

<?
if ($rank == 'Chav'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>";

}elseif ($rank == 'Pickpocket'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>";

}elseif ($rank == 'Vandal'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr>";

}elseif ($rank == 'Gangster'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr>
<tr> <td>Gangster</td> <td>20 Units</td></tr>";

}elseif ($rank == 'Hitman'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr>
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>";

}elseif ($rank == 'Knuckle Breaker'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>";

}elseif ($rank == 'Boss'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>";


}elseif ($rank == 'Assassin'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>";

}elseif ($rank == 'Don'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>";

}elseif ($rank == 'Godfather'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
";




}elseif ($rank == 'Global Terror'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
<tr> <td>Global Terror</td> <td>55 Units</td></tr>
";

}elseif ($rank == 'Global Dominator'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
<tr> <td>Global Terror</td> <td>55 Units</td></tr>
<tr> <td>Global Dominator</td> <td>60 Units</td></tr>
";




}elseif ($rank == 'Untouchable Godfather'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
<tr> <td>Global Terror</td> <td>55 Units</td></tr>
<tr> <td>Global Dominator</td> <td>60 Units</td></tr>
<tr> <td>Untouchable Godfather</td> <td>65 Units</td></tr>

";

}elseif ($rank == 'Legend'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
<tr> <td>Global Terror</td> <td>55 Units</td></tr>
<tr> <td>Global Dominator</td> <td>60 Units</td></tr>
<tr> <td>Untouchable Godfather</td> <td>65 Units</td></tr>
<tr> <td>Legend</td> <td>80 Units</td></tr>

";

}elseif ($rank == 'Official Deadly Mafia'){
echo "<tr> <td>Chav</td> <td>5 Units</td></tr>
<tr> <td>Pickpocket</td> <td>10 Units</td></tr>
<tr> <td>Vandal</td> <td>15 Units</td></tr
<tr> <td>Gangster</td> <td>20 Units</td></tr>
<tr> <td>Hitman</td> <td>25 Units</td></tr>
<tr> <td>Knuckle Breaker</td> <td>30 Units</td></tr>
<tr> <td>Boss</td> <td>35 Units</td></tr>
<tr> <td>Assassin</td> <td>40 Units</td></tr>
<tr> <td>Don</td> <td>45 Units</td></tr>
<tr> <td>Godfather</td> <td>50 Units</td></tr>
<tr> <td>Global Terror</td> <td>55 Units</td></tr>
<tr> <td>Global Dominator</td> <td>60 Units</td></tr>
<tr> <td>Untouchable Godfather</td> <td>65 Units</td></tr>
<tr> <td>Legend</td> <td>80 Units</td></tr>
<tr> <td>Official Deadly Mafia</td> <td>99 Units</td></tr>
";




}

?>
</table>
<p> </form> 
<?php include_once"includes/footer.php"; ?>