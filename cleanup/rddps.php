<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"casinoCP.php";
logincheck();
$username=$_SESSION['username'];



echo "$style"; 
$input="RPS";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$RPS = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='RPS'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$RPS->owner'"));

if (strtolower($RPS->owner) == strtolower($fetch->username)){
casinoCP($input);
exit();
}



if (strip_tags(!$_POST['go']) && $_POST['bet'] == ""){
$ticked="0";
}elseif (strip_tags($_POST['go']) && $_POST['bet'] != ""){

	$bet=intval(strip_tags($_POST['bet']));
	$radiobutton=strip_tags($_POST['radiobutton']);

	if ($radiobutton == "R" || $radiobutton == "P" || $radiobutton=="S"){
		if ($bet > "0"){
		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){
	print "You cant bet that amount.";
	$ticked="0";
}elseif ($bet != 0 && $bet && !ereg('[^0-9]',$bet)){


if ($bet > $RPS->max){
echo "Your bet exceeds the max bet.";
$ticked="0";
}elseif ($bet <= $RPS->max){
if ($bet > $fetch->money){
echo "You dont have that much cash.";
$ticked="0";
}elseif ($bet <= $fetch->money){

if ($radiobutton == 'R'){
$player_number = 'R';
$img="images/rps/rock_you.jpg";
$pc_num = array('R','P','S','R','P','P','P','P','P');
}elseif ($radiobutton=="P"){
$player_number = 'P';
$img="images/rps/paper_you.jpg";
$pc_num = array('R','P','S','P','S','S','S','S','S');
}elseif ($radiobutton=="S"){
$player_number = 'S';
$img="images/rps/scis_you.jpg";
$pc_num = array('R','P','S','S','R','R','R','R','R');
}

$pc_guess = rand(0, 8);
$pc_number = $pc_num[$pc_guess];

//////START CHECKING
///////IF THERE ARE DRAWS
if($player_number == "R" && $pc_number == "R"){
$output = "It was a tie Rock V.S Rock";
$win="2";
}elseif($player_number == "P" && $pc_number == "P"){
$output = "It was a tie Paper V.S Paper";
$win="2";
}elseif($player_number == "S" && $pc_number == "S"){
$win="2";
$output = "It was a tie Scissors V.S Scissors ";/////END DRAWS START LOOSES
}elseif($player_number == "R" && $pc_number == "P"){
$output="You lost, Rock V.S Paper.";
$win="0";
}elseif($player_number == "P" && $pc_number == "S"){
$output="You lost, Paper V.S Scissors.";
$win="0";
}elseif($player_number == "S" && $pc_number == "R"){
$win="0";
$output="You lost, Scissors V.S Rock.";
//////END LOOSES START WINS
}elseif($player_number == "R" && $pc_number == "S"){
$output="You won, Rock V.S Scissors.";
$win="1";
}elseif($player_number == "S" && $pc_number == "P"){
$output="You won, Scissors V.S Paper.";
$win="1";
}elseif($player_number == "P" && $pc_number == "R"){
$output="You won, Paper V.S Rock.";//////END WINS
$win="1";
}
////END CHECKING******
if ($win == "1"){
////NOW UPDATE STATS
$new_money = $bet * 2;
$n_money = $fetch->money + $new_money;

$owner_money=$fetch_owner->money - $new_money;
if ($owner_money <= "0"){
echo "The casino owner went broke and had to drop the casino, check the countries page to pick it up!";

mysql_query("UPDATE casinos SET owner='0' WHERE casino='RPS' AND location='$fetch->location'");
}elseif($owner_money > "0"){

echo "<font color=#CC0000>$output <br> Congratulations you won £".makecomma($new_money)."</font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $RPS->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='RPS' AND owner !='0'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$RPS->owner'");
}
}elseif ($win == "0"){
//////NOT GETTING BROKE AND IF THEY LOOOOOOOOOOOOOSE//////

$new_money2 = $fetch_owner->money + $bet;
$ear2 = $RPS->profit + $bet;
$loose_money=$fetch->money-$bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='RPS' AND owner !='0'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$RPS->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'"); 
echo "$output <br>Sorry you lost £".makecomma($bet).", and you now have £".makecomma($fetch->money - $bet)." ";
}elseif ($win == "2"){
echo "$output";
}}}

if ($pc_number == "R"){
$img_pc="images/rps/rock_pc.jpg";
}elseif($pc_number == "P"){
$img_pc="images/rps/paper_pc.jpg";
}elseif($pc_number == "S"){
$img_pc="images/rps/scis_pc.jpg";
}

$ticked="1";

}}}}
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
</head>


<body OnLoad="goaway()">
<form action="" method=POST>

<br>
<?php if ($ticked == "0"){ ?>
  <table width="56%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td colspan="2" class=header><center>
        R.P.S </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td width="53%">Choose: </td>
    <td width="47%"><input type="radio" name="radiobutton" value="R">
      Rock 
      <input type="radio" name="radiobutton" value="P">
      Paper 
      <input type="radio" name="radiobutton" value="S">
      Scissors</td>
  </tr>
  <tr> 
    <td>Bet: </td>
    <td width="47%"><input name="bet" type="text" id="bet"></td>
  </tr>
  <tr> 
    <td height="25" colspan="2"> <div align="center"> 
        <input name="go" type="submit" id="go" value="Submit">
      </div></td>
  </tr>
</table></form>
<?php }elseif ($ticked =="1"){ ?>
<p>&nbsp;</p>
<form action="" method=POST>
<table width="56%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td colspan="2" class=header><center>
       R.P.S</center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr bgcolor=white> 
    <td width="53%" class=tip>You:</td>
    <td width="47%" class=tip>Pc:</td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><?php echo "<img src=$img width=98 height=93>"; ?></td>
    <td width="47%"><?php echo "<img src=$img_pc width=98 height=93>"; ?></td>
  </tr>
  <tr> 
    <td>Choose: </td>
    <td width="47%"><input type="radio" name="radiobutton" value="R" checked="<?php if ($_POST['radiobutton'] == "R"){ echo "checked"; } ?>">
      Rock 
      <input type="radio" name="radiobutton" value="P" <?php if ($_POST['radiobutton'] == "P"){ echo "checked"; }?>>
      Paper 
      <input type="radio" name="radiobutton" value="S" <?php if ($_POST['radiobutton'] == "S"){ echo "checked"; }?>>
      Scissors</td>
  </tr>
  <tr> 
    <td>Bet: </td>
    <td><input name="bet" type="text" id="bet" value="<?php echo "$_POST[bet]"; ?>"></td>
  </tr>
  <tr> 
    <td height="25" colspan="2"> <div align="center"> 
        <input name="go" type="submit" id="go" value="Submit">
      </div></td>
  </tr>
</table>
<p><br></form>
</p>
<?php } ?>
<br><center>
<?php if ($RPS->owner == "0"){ echo "This RPS table is not owned"; }else{ echo "This RPS table is owned by <a href='profile.php?viewuser=$RPS->owner'>$RPS->owner</a>. <br>The max bet is set at £".makecomma($RPS->max).""; } ?>
<p>

<?php include_once"includes/footer.php"; ?></center>