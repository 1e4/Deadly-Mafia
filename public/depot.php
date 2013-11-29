<?php
session_start();

include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();

$username=$_SESSION['username'];
?><link href="includes/test.css" rel="stylesheet" type="text/css"><? $fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



if (strip_tags($_GET['car'])){
$car=strip_tags($_GET['car']);
$check=mysql_query("SELECT * FROM garage WHERE id='$car' AND owner='$username'");
$true=mysql_num_rows($check);
$stuff=mysql_fetch_object($check);
if ($true != "0"){
$upgrades=explode("-", $stuff->upgrades);
$next_1=$upgrades[0]+1;
$next_2=$upgrades[1]+1;
$next_3=$upgrades[2]+1;
$next_4=$upgrades[3]+1;
$next_5=$upgrades[4]+1;
$next_6=$upgrades[5]+1;
$next_7=$upgrades[6]+1;
$next_8=$upgrades[7]+1;

if (strip_tags($_POST['up1'])){
$price= $next_1*1000;

if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$next_1-$upgrades[1]-$upgrades[2]-$upgrades[3]-$upgrades[4]-$upgrades[5]-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up2'])){
$price= $next_1*1000;

if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$next_2-$upgrades[2]-$upgrades[3]-$upgrades[4]-$upgrades[5]-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up3'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$next_3-$upgrades[3]-$upgrades[4]-$upgrades[5]-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up4'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$upgrades[2]-$next_4-$upgrades[4]-$upgrades[5]-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up5'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$upgrades[2]-$upgrades[3]-$next_5-$upgrades[5]-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up6'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$upgrades[2]-$upgrades[3]-$upgrades[4]-$next_6-$upgrades[6]-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!"; 
}
}elseif (strip_tags($_POST['up7'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){

$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$upgrades[2]-$upgrades[3]-$upgrades[4]-$upgrades[5]-$next_7-$upgrades[7]";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}
}elseif (strip_tags($_POST['up8'])){
$price= $next_1*1000;
if ($fetch->money < $price){
echo "You dont have enough money to upgrade your car!";
}elseif ($fetch->money >= $price){
$new_money=$fetch->money-$price;
$new_up="$upgrades[0]-$upgrades[1]-$upgrades[2]-$upgrades[3]-$upgrades[4]-$upgrades[5]-$upgrades[6]-$next_8";
mysql_query("UPDATE garage SET upgrades='$new_up' WHERE id='$car' AND owner='$username'");
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Car upgraded!";
}}




}

}



?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<form name="form2" method="post" action="">
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
  <table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td class=header background="includes/grad.jpg"><center>
          The depot </center></td>
    </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="55%" bgcolor="#666666"><div align="center">Car:</div></td>
          <td bgcolor="#666666"><select name="choose" id="choose" onChange="MM_jumpMenu('this',this,0)">
              <option selected>Choose car</option>
              <?php $get=mysql_query("SELECT * FROM garage WHERE owner='$username'");
while($it=mysql_fetch_object($get)){


echo "<option value=?car=$it->id>$it->car, $it->damage%</option>";
}
?>
            </select>
          </td>
        </tr>
          <tr>
            <td colspan="2" bgcolor="#666666">It costs &pound;1,000 to upgrade a part to the first level, then &pound;2,000 to the second, &pound;3,000 to the third and so on. </td>
          </tr><?php if (strip_tags($_GET['car'])){
		  ?>
          <tr> 
            <td bgcolor="#666666"><div align="center">Tyres</div></td>
            <td width="45%" bgcolor="#666666"><div align="center">Engine</div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/tyres.gif" width="100" height="100" border="1"></div></td>
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/engine.gif" width="100" height="100" border="1"></div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"> 
                <input name="up1" type="submit" id="up1" value="Upgrade to level <?php echo "$next_1"; ?>">
            </div></td>
            <td bgcolor="#666666"><div align="center"> 
                <input name="up2" type="submit" id="up2" value="Upgrade to level <?php echo "$next_2"; ?>">
            </div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center">Interior</div></td>
            <td bgcolor="#666666"><div align="center">Exhaust</div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/interior.gif" width="100" height="100" border="1"></div></td>
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/ex.gif" width="100" height="100" border="1"></div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"> 
                <input name="up3" type="submit" id="up3" value="Upgrade to level <?php echo "$next_3"; ?>">
            </div></td>
            <td bgcolor="#666666"><div align="center"> 
                <input name="up4" type="submit" id="up4" value="Upgrade to level <?php echo "$next_4"; ?>">
            </div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center">NOS</div></td>
            <td bgcolor="#666666"><div align="center">Rims</div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/nos.gif" width="100" height="100" border="1"></div></td>
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/rims.gif" width="100" height="100" border="1"></div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"> 
                <input name="up5" type="submit" id="up5" value="Upgrade to level <?php echo "$next_5"; ?>">
            </div></td>
            <td bgcolor="#666666"><div align="center"> 
                <input name="up6" type="submit" id="up6" value="Upgrade to level <?php echo "$next_6"; ?>">
            </div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center">Brakes</div></td>
            <td bgcolor="#666666"><div align="center">Body kit</div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/brakes.gif" width="100" height="100" border="1"></div></td>
            <td bgcolor="#666666"><div align="center"><img src="images/cars_up/body.gif" width="100" height="100" border="1"></div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><div align="center"> 
                <input name="up7" type="submit" id="up7" value="Upgrade to level <?php echo "$next_7"; ?>">
            </div></td>
            <td bgcolor="#666666"><div align="center"> 
                <input name="up8" type="submit" id="up8" value="Upgrade to level <?php echo "$next_8"; ?>">
            </div></td>
          </tr>
          <tr> 
            <td bgcolor="#666666">&nbsp;</td>
            <td bgcolor="#666666">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="2" bgcolor="#666666">&nbsp;</td>
          </tr><? } ?>
        </table></td>
    </tr>
  </table>
</form>
<p align="center">
  <?php include_once"includes/footer.php"; ?>