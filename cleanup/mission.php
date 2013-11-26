<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="mission.php";
script_check($page);
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));




?><link href="includes/test.css" rel="stylesheet" type="text/css">



<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="68%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#666666" rules=none class=thinline>
  <tr> 
    <td background="images/bg3.bmp"><center>
        Missions
      </center></td>
  </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td> <?php 

if ($fetch->mission == "1"){


	if (strip_tags($_POST['Submit']) && strip_tags($_POST['amount'])){
	$amount=intval(strip_tags($_POST['amount']));


if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){
	print "Invalid amount of drugs";
	
}elseif ($amount != 0 || $amount || !ereg('[^0-9]',$amount)){
$drugs=explode("-",$fetch->drugs);
if ($amount > $drugs[3]){
echo "You dont have that much Phencyclidine!";
}elseif ($amount <= $drugs[3]){
if ($fetch->location !="London"){
echo "The drugs must be stored in London.";
}elseif ($fetch->location =="London"){


$new_amount=$drugs[3] - $amount;
$new_mission=$amount + $fetch->total_drugs_mission;

$new_drugs="$drugs[0]-$drugs[1]-$drugs[2]-$new_amount-$drugs[4]";

mysql_query("UPDATE users SET drugs='$new_drugs',total_drugs_mission='$new_mission' WHERE username='$username'");

	echo "Drugs added!";

}}}}

if ($fetch->total_drugs_mission >= "30"){
$new_money=$fetch->money + 1000000;
$new_bullets=$fetch->bullets + 5000;
$new_rank=$fetch->rankpoints + rand(10,60);


mysql_query("UPDATE users SET money='$new_money',rankpoints='$new_rank', mission='2',bullets='$new_bullets',total_drugs_mission='0' WHERE username='$username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'Well Done.<br>You will be hearing from me <br><b>Your rewards:</b> £1,000,000 <br>5000 Bullets ', '$date', '0', '0', '0'
)");

	}
	
	
	?>
	<form action="" method=POST>
	<table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><center><img src="images/missions/pen.jpg" border=1></center></td>
        </tr>
        <tr> 
          <td colspan="2">You are in Bliss now and that means for the time being you work for me, i want something , you get it, i want someting done, you do it, got it? Good because my drugs supplier is short on Phencyclidine. Get the Phencyclidine from anywhere but London because the London price is to high. Once you've bought some units of Phencyclidine get it to London and you will be rewarded. </td>
        </tr>
        <tr> 
          <td width="52%">Drugs left</td>
          <td width="48%"><?php echo "$fetch->total_drugs_mission/30"; ?></td>
        </tr>
        <tr> 
          <td>Add</td>
          <td><input type="text" name="amount"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
            </div></td>
        </tr>
      </table></form>

	  <?php }elseif ($fetch->mission == "2"){
if (strip_tags($_GET['car'])){
$car=strip_tags($_GET['car']);
$check=mysql_query("SELECT * FROM garage WHERE id='$car' AND owner='$username'");
$true=mysql_num_rows($check);
$stuff=mysql_fetch_object($check);
if ($true != "0"){
$explode=explode("-", $stuff->upgrades);
if ($explode[0] >= "6"){ $a= "<font colour=red>Yes</font>"; $tyre="Yes"; }else{ $a= "<font colour=red>No</font>"; }
if ($explode[4] >= "6"){ $b= "<font colour=red>Yes</font>"; $nos ="Yes"; }else{ $b= "<font colour=red>No</font>"; }
if ($explode[2] >= "6"){ $c= "<font colour=red>Yes</font>"; $int="Yes"; }else{ $c= "<font colour=red>No</font>"; }
if ($stuff->car == "Ferrari F430"){ $d="<font colour=red>Yes</font>"; $car_yes="Yes"; }else{ $d= "<font colour=red>No</font>"; }
if ($stuff->location == "Beijing"){ $e= "<font colour=red>Yes</font>"; $loc="Yes"; }else{ $e= "<font colour=red>No</font>"; }

if ($tyre == "Yes" && $nos == "Yes" && $int == "Yes" && $car_yes == "Yes" && $loc=="Yes"){
if (strip_tags($_POST['SUBMIT'])){
if ($fetch->location != "Beijing"){
echo "Get on a plane and go to Beijing";
}elseif ($fetch->location == "Beijing"){
mysql_query("DELETE FROM garage WHERE id='$car'");
echo "You successfully compleated the mission!";
$new_money=$fetch->money + 3500000;
$new_rank=$fetch->rankpoints + 1000;
$new_bullets=$fetch->bullets + 5000;


mysql_query("UPDATE users SET mission='3', money='$new_money',bullets='$new_bullets',rankpoints='$new_rank' WHERE username='$username'");


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'The Businessman certainly paid to notch for the car, heres your cut <br>5000 Bullets<br>£3,500,000', '$date', '0', '0', '0'
)");

}

}

}

}}
 ?>


<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<form action="" method=POST>
	
  <table width="100%" border="0" cellspacing="3" cellpadding="0">
    <tr> 
      <td colspan="2"><center>
          <img src="images/missions/ferrari430d.jpg" border=1 with=250 height=250></center></td>
    </tr>
    <tr> 
      <td colspan="2">With China's increased economic growth there are people becoming seriously rich and will pay top money for a car if they dont have to go on a waiting list for years. Do this and you will be rewarded well. <br> 
        <br>
        <font color="#0000FF">Ferrari F430</font> <?php echo "$d"; ?> <br>
        <font color="#0000FF">Level 6 NOS</font> <?php echo "$b"; ?><br>
        <font color="#0000FF">Level 6 Tyres</font> <?php echo "$a"; ?><br>
        <font color="#0000FF">Level 6 interior</font> <?php echo "$c"; ?><br>
	<font color="#0000FF">Location</font> <?php echo "$e"; ?><br>
        <br>
        </font>Get this to <strong>Beijing</strong> and the client will pay up </td>
    </tr>
    <tr> 
      <td width="52%">Select car:</td>
      <td width="48%"> <select name="choose" id="choose" onChange="MM_jumpMenu('this',this,0)">
                <option selected>Choose car</option>
                
<?php $get=mysql_query("SELECT * FROM garage WHERE owner='$username'");
while($it=mysql_fetch_object($get)){


echo "<option value=?car=$it->id>$it->car, $it->damage%</option>";
}
?>
              </select></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <input type="submit" name="SUBMIT" value="Submit">
        </div></td>
    </tr>
  </table>
  </form>









	  	  <p>
	  	    <?php }elseif ($fetch->mission == "3"){

 ?>
	  	  </p>
	  	  <form action="" method=POST>
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td width="100%"><center>
                  <img src="jail.large.jpeg" width="320" height="240">                                  </center></td>
              </tr>
              <tr>
                <td>Remember the guy you supplied the Phencyclidine to a couple weeks back? Well he was in Bogota, Columbia to try sort us out a new deal, he was set up though and now in a Bogotan prison, facing life, we need him out. His real name is kind of a mystery to us, he goes under the alias of 'Dealer'. Go to Bogota and for god's sake get him out of there, you two are gonna be working together for a lot longer and i'm sure he will repay the favour if you get him out.</td>
              </tr>
            </table>
      </form>
  	  <p>
  	    <? } ?> 
		
      </p></td>
  </tr>
</table>

<p>&nbsp;</p>
</body>
</html>

<?php include_once"includes/footer.php"; ?>

