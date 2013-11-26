<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include_once"casinoCP.php";

echo "$style"; 
$input="Slots";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$slots = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Slots'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$slots->owner'"));

if (strtolower($slots->owner) == strtolower($fetch->username)){
casinoCP($input);
exit();
}



if (strip_tags(!$_POST['spin']) && $_POST['bet'] == ""){
$ticked="0";
}elseif (strip_tags($_POST['spin']) && $_POST['bet'] != ""){

	$bet=intval(strip_tags($_POST['bet']));
	
		if ($bet > "0"){
		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){ ?>
		<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? print "You cant bet that amount."; ?>. </div></td>
    </tr>
</table>
</div>
	<?
	$ticked="0";
}elseif ($bet != 0 || $bet || !ereg('[^0-9]',$bet)){


if ($bet > $slots->max){ ?>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? echo "Your bet exceeds the max bet."; ?>. </div></td>
    </tr>
</table>
</div>
<?
$ticked="0";
}elseif ($bet <= $slots->max){
if ($bet > $fetch->money){ ?>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? echo "You dont have that much cash.";?>. </div></td>
    </tr>
</table>
</div>
<?
$ticked="0";
}elseif ($bet <= $fetch->money){
////OK they passed all the shit checks
    for ($i=0; $i < 5; $i++)
    {
      $random = rand(0,3);
      $slot[] = $random;
    }
	if($slot[0] == $slot[1] && $slot[0] == $slot[2]){


if ($slot[0] == 0 && $slot[1] == 0 && $slot[2] == 0){
$win = 2;
}elseif ($slot[0] == 1 && $slot[1] == 1 && $slot[2] == 1){
$win = 3;
}elseif ($slot[0] == 2 && $slot[1] == 2 && $slot[2] == 2){
$win = 7;
}elseif ($slot[0] == 3 && $slot[1] == 3 && $slot[2] == 3){
$win = 10;
}

$new_money = $bet * $win;
$n_money = $fetch->money + $new_money;
$owner_money=$fetch_owner->money - $new_money;
if ($owner_money <= "0"){ ?><div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#00FF00"><div align="center"><?echo "You won all the casinos money, the casino dropped!"; ?>. </div></td>
    </tr>
</table>
</div>

<?
mysql_query("UPDATE casinos SET owner='0' WHERE casino='Slots' AND location='$fetch->location'");
}elseif($owner_money > "0"){
?><div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#00FF00"><div align="center"><? echo "Congratulations you won $new_money"; ?>. </div></td>
    </tr>
</table>
</div>
<?
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $slots->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Slots' AND owner !='0'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$slots->owner'");
}


/////ElSE STATEMENT
}else{
$new_money2 = $fetch_owner->money + $bet;
$ear2 = $slots->profit + $bet;
$loose_money=$fetch->money-$bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Slots' AND owner !='0'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$slots->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'"); ?>
		<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF0000"><div align="center"><? echo "Sorry you lost £".makecomma($bet).", and you now have £".makecomma($fetch->money - $bet)." "; ?>. </div></td>
    </tr>
</table>
</div>

<?

}}
$images = array("images/slots/slot0.gif",
                "images/slots/slot1.gif",
		"images/slots/slot2.gif",
		"images/slots/slot3.gif"
		
                );

$thing = $slot[0];
$thing1 = $slot[1];
$thing2 = $slot[2];
$ticked = 1;
}

}}}else{
$ticked="0";
}

?>


<script language=JavaScript>
function so(dis)
{
for (i=0;i<dis.elements.length;i++){ 
	if (dis.elements[i].type=='submit')
	   dis.elements[i].style.visibility='hidden';
	}
	if(fs==false){
		 fs=true;
		 return true;
	}else
 		return false;
	}
	function goaway()
{
for(i=0;i<document.forms.length;i++)
 document.forms[i].onsubmit = function() {return so(this);};
}
</script>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head><form action="" method=POST>

<body onload=goaway();>
<br>
<table width="56%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" rules=none class=thinline>
  <tr> 
    <td colspan="3" background="includes/grad.jpg"><center class=bold>
        Slots</center></td>
  </tr>
  <tr> 
    <td width="32%"> 
      <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr>
          <td>
            <?php if ($ticked == 1){   echo "<img src=$images[$thing]>"; } ?>
          </td>
        </tr>
      </table></td>
    <td width="38%"> 
      <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr> 
          <td>
            <?php if ($ticked == 1){  echo "<img src=$images[$thing1]>"; } ?>
          </td>
        </tr>
      </table></td>
    <td width="30%"> 
      <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr> 
          <td>
            <?php if ($ticked == 1){   echo "<img src=$images[$thing2]>"; } ?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="26" colspan="3">
<div align="center">
        <input type="text" name="bet" value="<?php echo "$_POST[bet]"; ?>">
        <input type="submit" name="spin" value="Submit">
      </div></td>
  </tr>
</table>
</body>
</html></form>
<center>
<?php if ($slots->owner == "0"){ echo "This slots table is not owned"; }else{ echo "This slots table is owned by <a href='profile.php?viewuser=$slots->owner'><b>$slots->owner</b></a>"; } ?>
<?php echo "<br>The max bet is set at £".makecomma($slots->max).""; ?>

<p><?php include_once"includes/footer.php"; ?>

</center>
<!-- MMDW:success -->