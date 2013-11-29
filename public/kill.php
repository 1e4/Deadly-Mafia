<?php
session_start();

include_once"includes/functions.php";
logincheck();
include_once "includes/jail_check.php";
include_once"probe.php";
$page="kill.php";
script_check($page);


$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($info->userlevel=='2'){

die("<center><h3>Closed Due To Bug! Up Soon</h3></center>");

}

if($info->userlevel=='1'){

die("<center><h3>Closed Due To Bug! Up Soon</h3></center>");

}

if($info->userlevel=='0'){

die("<center><h3>Closed Due To Bug! Up Soon</h3></center>");

}



$searches=mysql_query("SELECT * FROM search WHERE username='$username'");
while($a =mysql_fetch_object($searches)){

$target_find=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$a->target'"));
if ($a->time < time() && $a->status == "0"){
$time=time();
$safe=mysql_num_rows(mysql_query("SELECT * FROM safe WHERE username='$a->target' AND time > '$time'"));
if ($safe == "0" && $a->location == $target_find->location){
mysql_query("UPDATE search SET status='2' WHERE id='$a->id'");
}else{
mysql_query("UPDATE search SET status='1' WHERE id='$a->id'");
}



}}

if(strip_tags($_GET['d'])){
mysql_query("DELETE FROM search WHERE username='$username'");
echo "All searches deleted";
}
if(strip_tags($_GET['dl'])){
$check=mysql_num_rows(mysql_query("SELECT * FROM search WHERE id='$dl' AND username='$username'"));
if ($check !="0"){
mysql_query("DELETE FROM search WHERE id='$dl'");
echo "Search deleted";
}}
if (strip_tags($_POST['send_button']) && strip_tags($_POST['send_id']) && strip_tags($_POST['send_to'])){
$send_id=strip_tags($_POST['send_id']);
$send_to=strip_tags($_POST['send_to']);
$ha=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$send_to'"));
if ($ha == "0"){
echo "No such user.";
}elseif ($ha != "0"){


$yours=mysql_num_rows(mysql_query("SELECT * FROM search WHERE id='$send_id' AND username='$username' AND status='2'"));
if ($yours == "0"){
echo "The search ID you entered does not belong to you or it is nor ready to be sent.";
}elseif ($yours != "0"){
if ($fetch->money < "10000"){
echo "You dont have enough money to send this search!";
}elseif ($fetch->money >= "10000"){
mysql_query("UPDATE search SET username='$send_to' WHERE id='$send_id'");
mysql_query("UPDATE users SET money=money-10000 WHERE username='$send_to'");
echo "Search has been sent.";
}}}}



if (strip_tags($_POST['kill_button']) && strip_tags($_POST['kill_username']) && strip_tags($_POST['kill_bullets'])){

$kill_bullets=intval(strip_tags($_POST['kill_bullets']));
	$kill_username=strip_tags($_POST['kill_username']);
$target=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$kill_username'"));
	
		if ($kill_bullets == 0 || !$kill_bullets || ereg('[^0-9]',$kill_bullets)){
	print "You cannot shoot that amount.";
	
}elseif ($kill_bullets != 0 || $kill_bullets || !ereg('[^0-9]',$kill_bullets)){

$user_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$kill_username'"));

if ($user_true == "0"){
echo"This user does not excist";
}elseif ($user_true != "0"){

if ($kill_bullets > $fetch->bullets){

echo "You dont have that amount of bullets.";

}elseif($kill_bullets <= $fetch->bullets){

if ($target->status == "Dead" || $target->status == "Banned"){
echo "That user is already dead";

}elseif ($target->status != "Dead" && $target->status != "Banned"){

$a_query = mysql_query("SELECT * FROM search WHERE target='$target->username' AND status='2' AND username='$username' && location ='$target->location'");
$check_found=mysql_num_rows($a_query);

if ($check_found == "0"){
echo "You have not found this user yet or they have traveled to anouther location.";

}elseif ($check_found != "0"){
if($target->last_shot <= time()){
if ($fetch->last_kill > time()){
echo "You are still recovering from your last kill.";
}elseif ($fetch->last_kill <= time()){
if (strtolower($username) == strtolower($kill_username)){
echo "You cannot kill youself, if you want to do that then go to suicide!";
}elseif(strtolower($username) != strtolower($kill_username)){

if ($fetch->weapon == "None"){ 
echo "How do you except to kill someone without no weapon?!?";
}elseif($fetch->weapon != "None"){ 
if ($fetch->location != $target->location){
echo "You need to be in the same location as this user.";
}elseif ($fetch->location == $target->location){

if($target->userlevel == "3"){ $target_protection = 999999999999999999999999999999999999999999999999999999999999999999; }
elseif($target->protection == "Bunker"){ $target_protection = 500; }
elseif($target->protection == "Body Double"){ $target_protection = 4; }
elseif($target->protection == "Armoured Car"){ $target_protection = 3; }
elseif($target->protection == "Bullet Vest"){ $target_protection = 2; }
elseif($target->protection == "Doberman"){ $target_protection = 1; } else {
$target_protection = 1;
}


if($fetch->weapon == "Liquidx Cannon"){ $your_gun_power = "10000"; $gunpower =
($kill_bullets*100000) * 10; }
elseif($fetch->weapon == "M16"){ $your_gun_power = "75"; $gunpower =
($kill_bullets*1000) * 10; }
elseif($fetch->weapon == "M82A1"){ $your_gun_power = "25"; $gunpower = ($kill_bullets*1000) * 0; }
elseif($fetch->weapon == "PSG1"){ $your_gun_power = "20"; $gunpower = ($kill_bullets*1000) * 0; }
elseif($fetch->weapon == "Shotgun"){ $your_gun_power = "15"; $gunpower = ($kill_bullets*1000) * 0; }
elseif($fetch->weapon == "FiveSeven"){ $your_gun_power = "10"; $gunpower = ($kill_bullets*1000) * 0; } else {
echo "Error with weapon ";	
}

if ($fetch->rank == "Chav"){ $rank=1; }
elseif  ($fetch->rank == "Pickpocket"){ $rank=1; }
elseif  ($fetch->rank == "Vandal"){ $rank=1; }
elseif  ($fetch->rank == "Gangster"){ $rank=1; }
elseif  ($fetch->rank == "Hitman"){ $rank=1; }
elseif  ($fetch->rank == "Knuckle Breaker"){ $rank=1; }
elseif  ($fetch->rank == "Boss"){ $rank=1; }
elseif  ($fetch->rank == "Assassin"){ $rank=1; }
elseif  ($fetch->rank == "Don"){ $rank=1; }
elseif  ($fetch->rank == "Godfather"){ $rank=1; }
elseif  ($fetch->rank == "Global Terror"){ $rank=1; }
elseif  ($fetch->rank == "Global Dominator"){ $rank=1; }
elseif  ($fetch->rank == "Untouchable Godfather"){ $rank=1; }
elseif  ($fetch->rank == "Legend"){ $rank=1; }
elseif  ($fetch->rank == "Official Deadly Mafia"){ $rank=1; }


if ($target->rank == "Chav"){ $rank1=5000000; }
elseif  ($target->rank == "Pickpocket"){ $rank1=1000000; }
elseif  ($target->rank == "Vandal"){ $rank1=15000000; }
elseif  ($target->rank == "Gangster"){ $rank1=300000; }
elseif  ($target->rank == "Hitman"){ $rank1=5000000; }
elseif  ($target->rank == "Knuckle Breaker"){ $rank1=10000000; }
elseif  ($target->rank == "Boss"){ $rank1=12000000; }
elseif  ($target->rank == "Assassin"){ $rank1=15000000; }
elseif  ($target->rank == "Don"){ $rank1=20000000; }
elseif  ($target->rank == "Godfather"){ $rank1=55000000; }
elseif  ($target->rank == "Global Terror"){ $rank1=75000000; }
elseif  ($target->rank == "Global Dominator"){ $rank1=87000000; }
elseif  ($target->rank == "Untouchable Godfather"){ $rank1=100000000; }
elseif  ($target->rank == "Legend"){ $rank1=13000000; }
elseif  ($target->rank == "Official Deadly Mafia"){ $rank1=175000000; }

$your_total=$your_gun_power + $rank + $gunpower;

$defense=$target_protection  + $target->health  + $rank1;

$power = $power+$gunpower;
$power = round($power/2);

$defense = $defense+$target_protection;
$defense = round($defense/2);
$time=gmdate('Y-m-d h:i:s'); 

$new_bullets=$fetch->bullets - $kill_bullets;
if($power > $defense ){ 
$now=time()+3600;
$last=time()+(3600*2);
$hit_money=mysql_fetch_object(mysql_query("SELECT SUM(amount)AS jackpot FROM hitlist WHERE target='$target->username'"));
$your_money=$fetch->money + $hit_money->jackpot;
echo "Your Power was $power and his defence was $defense.<br> You shot $kill_bullets bullets at "; 
echo "<a href='profile.php?viewuser=$kill_username'>$kill_username</a>! He Died!<br>Lets Hope You Dont Get Grassed Up.<br><br>"; 
mysql_query("UPDATE users SET status='Dead' WHERE username='$kill_username'");
mysql_query("UPDATE user_info SET kill_skill=kill_skill+1 WHERE username='$username'");
mysql_query("UPDATE users SET bullets='$new_bullets',last_kill='$now',money='$your_money' WHERE username='$username'");
mysql_query("DELETE FROM hitlist WHERE target='$target->username'");
mysql_query("INSERT INTO `attempts` (`id`, `username`, `target`, `outcome`, `date`) VALUES ('', '$username', '$target->username', 'Dead', '$time')");


/////GIVE WITNESS STATEMENT/////
$rand=rand(1,10);
$i=0;

while($i < $rand){
$set= mysql_query("SELECT * FROM users WHERE username != '$username' AND location='$fetch->location' ORDER BY id DESC LIMIT 10");
while($dns=mysql_fetch_object($set)){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) 
VALUES (
'', '$dns->username', '$dns->username', 'You witnessed $username kill $target->username with $kill_bullets bullets!', '$date', '0', '0', '0', '1', '$target->username'
)");
$i++;
}}



}else { echo "You shot $kill_bullets bullets at <a href='profile.php?viewuser=$kill_username'>$kill_username</a>! He survived<br><br>"; }
$new_health_target=$target->health;
$it=$kill_bullets / 2;
$test=$kill_bullets / $it;
$new_health_target = $target->health - $test;

$now=time()+3600;
$last=time()+3600;
mysql_query("UPDATE user_info SET kill_attempts=kill_attempts+1 WHERE username='$username'");
$new_bullets=$fetch->bullets - $kill_bullets;
mysql_query("UPDATE users SET health='$new_health_target', last_attempted='$last' WHERE username='$target->username'");
mysql_query("UPDATE users SET last_kill='$now', bullets='$new_bullets' WHERE username='$username'");
mysql_query("INSERT INTO `attempts` (`id`, `username`, `target`, `outcome`, `date`) VALUES ('', '$username', '$target->username', 'Survived', '$time')");

}

}}}}}}}}}}





/////////CLASSING NEEDS TO GO IN THE BRACKET ABOVE



/////BASICALLY WHAT I NEED TO DO IS CLASS EACH WEAPON FOR A CERTIAN AMOUNT OF POINTS ADD THEM ALL UP THEN COMPARE THEM TO THE USERS DEFENCE SHIT ADDED UP.
/////tHEN DECIDE WETHER OR NOT TO KILL THEM.


if (strip_tags($_POST['hunt_button']) && strip_tags($_POST['hunt_username'])){
$hunt_item=strip_tags($_POST['hunt_item']);
$hunt_username=strip_tags($_POST['hunt_username']);
$hunt_time=intval(strip_tags($_POST['hunt_time']));
if ($hunt_time != "0"){

if ($hunt_time == 0 || !$hunt_time || ereg('[^0-9]',$hunt_time)){
	print "Invalid time.";
	
}elseif ($hunt_time != 0 || $hunt_time || !ereg('[^0-9]',$hunt_time)){


if ($hunt_item !=""){
$above_me=mysql_query("SELECT * FROM items WHERE item='$hunt_item' AND owner='$username'");
$item=mysql_fetch_object($above_me);
if (mysql_num_rows($above_me) == "0"){
echo "This is not your item!";
exit();
}elseif(mysql_num_rows($above_me) != "0"){
if ($item->item == "Yellow Pages"){

$price=4000*$hunt_time;
}elseif ($item->item == "Tracking Device"){
$price=3000*$hunt_time;
}else{
$price=5000*$hunt_time;
}}}




if (strip_tags($_POST['Eng'])){
$check_eng="1";
}
if (strip_tags($_POST['Jap'])){
$check_jap="1";
}
if (strip_tags($_POST['Colo'])){
$check_colo="1";
}
if (strip_tags($_POST['Rome'])){
$check_Rome="1";
}
if (strip_tags($_POST['South'])){
$check_south="1";
}
if (strip_tags($_POST['Mex'])){
$check_mex="1";
}
$init=$check_eng+$check_jap+$check_colo+$check_Rome+$check_south+$check_mex;
$total_price=$price * $init;
if ($total_price > $fetch->money){
echo "You dont have enough money!";
}elseif ($total_price <= $fetch->money){

$total_time=time()+(3600*$hunt_time);

if ($check_eng){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','london')");
$ponse=1;
}
if ($check_jap){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','New York')");
$ponse=1;
}
if ($check_colo){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','Beijing')");
$ponse=1;
}
if ($check_Rome){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','Rome')");
$ponse=1;
}
if ($check_south){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','Moscow')");
$ponse=1;
}
if ($check_mex){
mysql_query("INSERT INTO `search` (`id`, `username`, `target`, `time`, `status`,`location`) VALUES ('', '$username', '$hunt_username', '$total_time', '0','Bogota')");
$ponse=1;
}
if ($ponse == "1"){
$new_money=$fetch->money - $total_price;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");

echo "Searches are now out.";

}







}

}
}}



?>



<form name="form1" method="post" action="">
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td>
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr> 
            <td colspan="2" background="includes/grad.jpg"><center>
                Kill </center></td>
          </tr>
          <tr bgcolor=white>
            <td colspan="2" class=tip><div align="center">Cap a user.</div></td>
          </tr>
          <tr> 
            <td width="50%">Username:</td>
            <td width="50%"><input name="kill_username" type="text" id="kill_username3"></td>
          </tr>
          <tr> 
            <td>Amount of bullets:</td>
            <td><input name="kill_bullets" type="text" id="kill_bullets3"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="kill_button" type="submit" id="kill_button3" value="Submit"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr> 
            <td colspan="2" background="includes/grad.jpg"><center>
                Hunt down </center></td>
          </tr>
          <tr bgcolor=white>
            <td colspan="2" class=tip ><div align="center">Hunt a user down.</div></td>
          </tr>
          <tr> 
            <td width="50%">Username:</td>
            <td width="50%"><input name="hunt_username" type="text" id="hunt_username2"></td>
          </tr>
          <tr> 
            <td>Time:</td>
            <td><input name="hunt_time" type="text" id="hunt_time2"></td>
          </tr>
          <tr> 
            <td>Location:</td>
            <td><input name="Eng" type="checkbox" id="Eng22" value="1">
              london <input name="Jap" type="checkbox" id="Jap22" value="2">
              New York <input name="Colo" type="checkbox" id="Colo22" value="3">
              Beijing<br> <input name="Rome" type="checkbox" id="Rome22" value="4">
              Rome 
              <input name="South" type="checkbox" id="South" value="5">
              Moscow 
              <input name="Mex" type="checkbox" id="Mex" value="6">
              Bogota </td>
          </tr>
          <tr> 
            </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="hunt_button" type="submit" id="hunt_button23" value="Submit"></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr> 
      <td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr> 
            <td  colspan="4" background="includes/grad.jpg"><center>
               Searches Out(<a href=file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/?d=yes>Delete all</a>) </center></td>
          </tr>
          <tr bgcolor=white > 
            <td width="30%" height="6" class=tip>Target</td>
            <td width="31%" class=tip>Status</td>
            <td width="26%" class=tip>Location</td>
            <td width="13%" class=tip>Delete</td>
          </tr>

<SCRIPT>
<!--
function input(Item) {
document.getElementById('send_id').value = Item;
}

//-->
</SCRIPT>



          <?php $my=mysql_query("SELECT * FROM search WHERE username='$username'");
		 $humm=mysql_num_rows($my);
		 if ($humm == "0"){
		 echo "<tr> 
            <td height=5 colspan=4><center>No searches</center></td>
          </tr>";
		  }
		 while($i=mysql_fetch_object($my)){
		 
		 
		  echo "<tr>";
           echo " <td width=30% height=10><a href='profile.php?viewuser=$i->target'>$i->target</a></td>";
           echo " <td width=31%>"; if ($i->status == "0"){ echo "".maketime($i->time).""; }elseif ($i->status == "1"){ echo "Not found"; }else{ echo "<a Onclick=input($i->id) href=#send>Found</a>"; } echo "</td>";
            echo "<td>$i->location</td>";
echo "<td><a href='?dl=$i->id'>Delete</a></td>";
        echo "  </tr>";
		  }
		  ?>
        </table></td>
    </tr>
    <tr> 
      <td height="126"><a name="send">      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>


