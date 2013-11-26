<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$date = gmdate('Y-m-d h:i:s');
include_once"probe.php";
$page="arm.php";
script_check($page);

echo "$style";
echo " <form method=post action=''>";
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$info=mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$username'"));
$stats=explode(":",$info->wl);

if ($info->mem_gym == "0"){
if (strip_tags($_GET['member']) == "yes"){
if ($fetch->money < "1000"){
echo "You dont have enough money!";
}elseif ($fetch->money >= "1000"){
$new_money=$fetch->money - 1000;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
mysql_query("UPDATE user_info SET mem_gym='1' WHERE username='$username'");
echo "Membership purchased <a href=arm.php>Click here to continue</a>";
}}

?>
<table width="74%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td width="100%" background="includes/grad.jpg"><center class=bold>
      Gym card
      </center></td>
  </tr>
  <tr> 
    <td height="10"><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="100%"><div align="center"><a href="?member=yes">Click here 
              to signup for a gym pass it costs &pound;1000</a></div></td>
        </tr>
      </table></td>
  </tr>
</table><? }else{
if (strip_tags($_POST['train']) && strip_tags($_POST['choice'])){
if ($info->last_train > time()){
echo "You've trained recently you must wait ".maketime($info->last_train)."";
}else{

$choice=strip_tags($_POST['choice']);
if ($choice == "1" || $choice == "2" || $choice == "3"){
if ($choice == "1"){
$plus="5";
$wait="1";
}elseif ($choice == "2"){
$plus="10";
$wait="5";
}elseif ($choice == "3"){
$plus="15";
$wait="10";
}
$new_exp=$info->exp + $plus;
$now=time()+ (60*$wait);
if ($new_exp >= "100"){
$new_lvl=$info->level+1;
$left=$new_exp-100;
mysql_query("UPDATE user_info SET exp='$left', level='$new_lvl', last_train='$now' WHERE username='$username'");
echo "You successfully trained.. And grew up a level!";
}else{
mysql_query("UPDATE user_info SET exp='$new_exp', last_train='$now' WHERE username='$username'");
echo "You successfully trained!";
}
}}}



if (strip_tags($_POST['create_button']) && strip_tags($_POST['create_bet'])){
$create_bet=intval(strip_tags($_POST['create_bet']));
if ($create_bet == 0 || !$create_bet || ereg('[^0-9]',$create_bet)){
	print "You cant bet that amount.";
	
}elseif ($create_bet != 0 && $create_bet && !ereg('[^0-9]',$create_bet)){
if ($create_bet > $fetch->money){
echo "You dont have enough money to make this match!";
}elseif ($create_bet <= $fetch->money){
$already=mysql_num_rows(mysql_query("SELECT * FROM matches WHERE username='$username'"));
if ($already != "0"){
echo "You have a match already!";
}elseif ($already == "0"){


mysql_query("INSERT INTO `matches` ( `id` , `username` , `bet` ) 
VALUES (
'', '$username', '$create_bet'
)");
$new_money=$fetch->money - $create_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
echo "Match Created";
}}}}

if (strip_tags($_POST['play_id']) && strip_tags($_POST['Submit'])){
$play_id=strip_tags($_POST['play_id']);
$match_info=mysql_query("SELECT * FROM matches WHERE id='$play_id'");
$num = mysql_num_rows($match_info);
$match_fetch=mysql_fetch_object($match_info);
if ($num == "0"){
echo "No such match.";
}elseif ($num != "0"){
if ($match_fetch->bet > $fetch->money){
echo "You do not have enough money to play this game.";
}elseif($match_fetch->bet <= $fetch->money){
if (strtolower($match_fetch->username) == strtolower($username)){
echo "You cannot play yourself sado.";
}elseif (strtolower($match_fetch) != strtolower($username)){
$oppon = mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$match_fetch->username'"));
$oppon_user = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$match_fetch->username'"));
$wl=explode(":",$oppon->wl);
////FINSHIED ALL SHITTY FETCHING

if ($oppon->level == $info->level && $oppon->exp == $info->exp){
echo "And..... its a draw!";
$new_money=$oppon_user->money + $match_fetch->bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$match_fetch->username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$match_fetch->username', '$match_fetch->username', 'You <b>Drew</b> in an arm wrestle!', '$date', '0', '0', '0'
)");


}elseif ($oppon->level > $info->level){
echo "And..... You lost!";
$new_money=$oppon_user->money + ($match_fetch->bet * 2);
mysql_query("UPDATE users SET money='$new_money' WHERE username='$match_fetch->username'");
$your_money=$fetch->money - $match_fetch->bet;
mysql_query("UPDATE users SET money='$your_money' WHERE username='$username'");


$new_stats = $stats[1] + 1;
$new_stats="$stats[0]:$new_stats";
mysql_query("UPDATE user_info SET wl='$new_stats' WHERE username='$username'");

$new_ekk = $wl[0] + 1;
$new_e="$new_ekk:$wl[0]";
mysql_query("UPDATE user_info SET wl='$new_e' WHERE username='$oppon->username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$match_fetch->username', '$match_fetch->username', 'You <b>Won</b> in an arm wrestle!', '$date', '0', '0', '0'
)");


}elseif ($oppon->level == $info->level && $oppon->exp > $info->exp){
echo "And..... You lost!";
$new_money=$oppon_user->money + ($match_fetch->bet * 2);
mysql_query("UPDATE users SET money='$new_money' WHERE username='$match_fetch->username'");
$your_money=$fetch->money - $match_fetch->bet;
mysql_query("UPDATE users SET money='$your_money' WHERE username='$username'");

$new_stats = $stats[1] + 1;
$new_stats="$stats[0]:$new_stats";
mysql_query("UPDATE user_info SET wl='$new_stats' WHERE username='$username'");

$new_ekk = $wl[0] + 1;
$new_e="$new_ekk:$wl[1]";
mysql_query("UPDATE user_info SET wl='$new_e' WHERE username='$oppon->username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$match_fetch->username', '$match_fetch->username', 'You <b>Won</b> in an arm wrestle!', '$date', '0', '0', '0'
)");
///////WINNING

}elseif ($oppon->level < $info->level){
echo "And.... You won!";
$new_money=$fetch->money + $match_fetch->bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");

$new_stats = $stats[0] +1;
$new_stats="$new_stats:$stats[1]";
mysql_query("UPDATE user_info SET wl='$new_stats' WHERE username='$username'");

$new_ekk = $wl[1] +1;
$new_e="$wl[0]:$new_ekk";
mysql_query("UPDATE user_info SET wl='$new_e' WHERE username='$oppon->username'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$match_fetch->username', '$match_fetch->username', 'You <b>Lost</b> in an arm wrestle!', '$date', '0', '0', '0'
)");


}elseif ($oppon->level == $info->level && $oppon->exp < $info->exp){
echo "And.... You won!";
$new_money=$fetch->money + $match_fetch->bet;

mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
$new_stats = $stats[0] +1;
$new_stats="$new_stats:$stats[1]";
mysql_query("UPDATE user_info SET wl='$new_stats' WHERE username='$username'");

$new_ekk = $wl[1] +1;
$new_e="$wl[0]:$new_ekk";
mysql_query("UPDATE user_info SET wl='$new_e' WHERE username='$oppon->username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$match_fetch->username', '$match_fetch->username', 'You <b>Lost</b> in an arm wrestle!', '$date', '0', '0', '0'
)");


}
mysql_query("DELETE FROM matches WHERE id='$play_id'");
}}}}



?>




<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="763" border="0" cellpadding="0" cellspacing="2">
    <!--DWLayoutTable-->
    <tr> 
      <td width="386" height="156" valign="top"> <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td  colspan="2" background="includes/grad.jpg"><div align="center" class=bold>Exercise</div></td>
          </tr>
          <tr bgcolor=white> 
            <td height="25" colspan="2" class=tip><div align="center">Choose a 
                exercise</div></td>
          </tr>
          <tr> 
            <td width="199" height="25"><input name="choice" type="radio" value="1" checked>
              10 Situps</td>
            <td width="178" height="25">+5</td>
          </tr>
          <tr> 
            <td height="12"><input name="choice" type="radio" value="2">
              5 Pressups</td>
            <td height="12">+10</td>
          </tr>
          <tr> 
            <td height="13"><input name="choice" type="radio" value="3">
              1 Lap of swimming pool</td>
            <td height="13">+15</td>
          </tr>
          <tr> 
            <td height="25">&nbsp;</td>
            <td height="25"><input name="train" type="submit" id="train2" value="Train"></td>
          </tr>
        </table></td>
      <td width="387" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black"  class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td background="includes/grad.jpg" colspan="3"><div align="center">Current 
                Matches</div></td>
          </tr>
          <tr bgcolor=white> 
            <td width="124" height="13" class=tip>Username</td>
            <td width="122" class=tip>Bet</td>
            <td width="123" class=tip>Wins:Looses</td>
          </tr>
          
          <?php $select=mysql_query("SELECT * FROM matches ORDER by bet DESC");
	   while($dada = mysql_fetch_object($select)){
	   $ls =mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$dada->username'"));
	  $explode=explode(":", $ls->wl);
	  
	   echo "
	    <tr> 
          <td><input type=radio name=play_id value=$dada->id>$dada->username</td>
          <td>£".makecomma($dada->bet)."</td>
          <td>$explode[0]:$explode[1]</td>
        </tr>";
		}
		?><tr > 
            <td height="12" colspan="3" ><div align="center">
                <input type="submit" name="Submit" value="Submit">
              </div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="125" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black"  class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td  colspan="2" background="includes/grad.jpg"><div align="center">Your 
                strength stats</div></td>
          </tr>
          <tr> 
            <td width="196" height="25">Level:</td>
            <td width="179"><?php echo "$info->level"; ?></td>
          </tr>
          <tr> 
            <td height="25">Current Experience:</td>
            <td height="25"><table width="<?php echo "$info->exp"; ?>%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
                <tr> 
                  <td bgcolor="#FF0000"><?php echo "$info->exp%"; ?></td>
                </tr>
              </table></td>
          </tr>
          <tr> 
            <td height="25">Your wins:</td>
            <td height="25"><?php echo "$stats[0]"; ?></td>
          </tr>
          <tr> 
            <td height="25">Your looses</td>
            <td height="25"><?php echo "$stats[1]"; ?></td>
          </tr>
        </table></td>
      <td valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
          <!--DWLayoutTable-->
          <tr> 
            <td background="includes/grad.jpg" colspan="2"><div align="center">Create 
                a match</div></td>
          </tr>
          <tr> 
            <td width="177" height="25">Bet</td>
            <td width="195"><input name="create_bet" type="text" id="create_bet2"></td>
          </tr>
          <tr> 
            <td height="25">&nbsp;</td>
            <td height="25"><input name="create_button" type="submit" id="create_button" value="Submit"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php } ?>
<?php include_once"includes/footer.php"; ?>

