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
		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){ ?><!--MMDW 1 -->
		<div mmdw=0 align="center">
<table mmdw=1 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=2 background="includes/grad.jpg"><div mmdw=3 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=4 bgcolor="#FFCC00"><div mmdw=5 align="center"><!--MMDW 2 --><? print "You cant bet that amount."; ?><!--MMDW 3 -->. </div></td>
    </tr>
</table>
</div>
	<!--MMDW 4 --><?
	$ticked="0";
}elseif ($bet != 0 || $bet || !ereg('[^0-9]',$bet)){


if ($bet > $slots->max){ ?><!--MMDW 5 -->
<div mmdw=6 align="center">
<table mmdw=7 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=8 background="includes/grad.jpg"><div mmdw=9 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=10 bgcolor="#FFCC00"><div mmdw=11 align="center"><!--MMDW 6 --><? echo "Your bet exceeds the max bet."; ?><!--MMDW 7 -->. </div></td>
    </tr>
</table>
</div>
<!--MMDW 8 --><?
$ticked="0";
}elseif ($bet <= $slots->max){
if ($bet > $fetch->money){ ?><!--MMDW 9 -->
<div mmdw=12 align="center">
<table mmdw=13 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=14 background="includes/grad.jpg"><div mmdw=15 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=16 bgcolor="#FFCC00"><div mmdw=17 align="center"><!--MMDW 10 --><? echo "You dont have that much cash.";?><!--MMDW 11 -->. </div></td>
    </tr>
</table>
</div>
<!--MMDW 12 --><?
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
if ($owner_money <= "0"){ ?><!--MMDW 13 --><div mmdw=18 align="center">
<table mmdw=19 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=20 background="includes/grad.jpg"><div mmdw=21 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=22 bgcolor="#00FF00"><div mmdw=23 align="center"><!--MMDW 14 --><?echo "You won all the casinos money, the casino dropped!"; ?><!--MMDW 15 -->. </div></td>
    </tr>
</table>
</div>

<!--MMDW 16 --><?
mysql_query("UPDATE casinos SET owner='0' WHERE casino='Slots' AND location='$fetch->location'");
}elseif($owner_money > "0"){
?><!--MMDW 17 --><div mmdw=24 align="center">
<table mmdw=25 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=26 background="includes/grad.jpg"><div mmdw=27 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=28 bgcolor="#00FF00"><div mmdw=29 align="center"><!--MMDW 18 --><? echo "Congratulations you won $new_money"; ?><!--MMDW 19 -->. </div></td>
    </tr>
</table>
</div>
<!--MMDW 20 --><?
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
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'"); ?><!--MMDW 21 -->
		<div mmdw=30 align="center">
<table mmdw=31 width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td mmdw=32 background="includes/grad.jpg"><div mmdw=33 align="center">Outcome </div></td>
  </tr>
  <tr>
    <td mmdw=34 bgcolor="#FF0000"><div mmdw=35 align="center"><!--MMDW 22 --><? echo "Sorry you lost £".makecomma($bet).", and you now have £".makecomma($fetch->money - $bet)." "; ?><!--MMDW 23 -->. </div></td>
    </tr>
</table>
</div>

<!--MMDW 24 --><?

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

?><!--MMDW 25 -->


<!--MMDW 26 --><script language=JavaScript>
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
</script><!--MMDW 27 -->

<html>
<head>
<title>Untitled Document</title>
<meta mmdw=36 http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head><form mmdw=37 action="" method=POST>

<body mmdw=38 onload=goaway();>
<br>
<table mmdw=39 width="56%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" rules=none class=thinline>
  <tr> 
    <td mmdw=40 colspan="3" background="includes/grad.jpg"><center mmdw=41 class=bold>
        Slots</center></td>
  </tr>
  <tr> 
    <td mmdw=42 width="32%"> 
      <table mmdw=43 width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr>
          <td>
            <!--MMDW 28 --><?php if ($ticked == 1){   echo "<img src=$images[$thing]>"; } ?><!--MMDW 29 -->
          </td>
        </tr>
      </table></td>
    <td mmdw=44 width="38%"> 
      <table mmdw=45 width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr> 
          <td>
            <!--MMDW 30 --><?php if ($ticked == 1){  echo "<img src=$images[$thing1]>"; } ?><!--MMDW 31 -->
          </td>
        </tr>
      </table></td>
    <td mmdw=46 width="30%"> 
      <table mmdw=47 width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="black" bgcolor="#FFFFFF">
        <tr> 
          <td>
            <!--MMDW 32 --><?php if ($ticked == 1){   echo "<img src=$images[$thing2]>"; } ?><!--MMDW 33 -->
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td mmdw=48 height="26" colspan="3">
<div mmdw=49 align="center">
        <input mmdw=50 type="text" name="bet" value="<?php echo "$_POST[bet]"; ?>">
        <input mmdw=51 type="submit" name="spin" value="Submit">
      </div></td>
  </tr>
</table>
</body>
</html></form>
<center>
<!--MMDW 34 --><?php if ($slots->owner == "0"){ echo "This slots table is not owned"; }else{ echo "This slots table is owned by <a href='profile.php?viewuser=$slots->owner'><b>$slots->owner</b></a>"; } ?><!--MMDW 35 -->
<!--MMDW 36 --><?php echo "<br>The max bet is set at £".makecomma($slots->max).""; ?><!--MMDW 37 -->

<p><!--MMDW 38 --><?php include_once"includes/footer.php"; ?><!--MMDW 39 -->

</center>
<!-- MMDW:success -->