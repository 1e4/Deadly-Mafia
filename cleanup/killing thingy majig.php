<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
include_once "includes/jail_check.php";
include_once"probe.php";
$page="kill.php";
script_check($page);
$Expired = date( 'Y-m-d H:i:s', time( ) + 32400); 
$dateCheck = date('Y-m-d H:i:s');
mysql_query("DELETE FROM search WHERE $dateCheck >= expired");



$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));


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



if(strip_tags($_POST['kill_button']) && strip_tags($_POST['kill_username']) && strip_tags($_POST['kill_bullets'])){

	$kill_bullets=intval(strip_tags($_POST['kill_bullets']));
	$kill_username=strip_tags($_POST['kill_username']);
	$target=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$kill_username'"));
	
	if($kill_bullets == 0 || !$kill_bullets || ereg('[^0-9]',$kill_bullets)){
		print "You cannot shoot that amount.";
	}elseif($kill_bullets != 0 || $kill_bullets || !ereg('[^0-9]',$kill_bullets)){
		$user_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$kill_username'"));
		if($user_true == "0"){
			echo"This user does not excist";
		}elseif($user_true != "0"){
			if($kill_bullets > $fetch->bullets){
				echo "You dont have that amount of bullets.";
			}elseif($kill_bullets <= $fetch->bullets){
				if ($target->status == "Dead" || $target->status == "Banned"){
					echo "That user is already dead";
				}elseif ($target->status != "Dead" && $target->status != "Banned"){

					$a_query = mysql_query("SELECT * FROM search WHERE target='$target->username' AND status='2' AND username='$username' && location ='$target->location'");
					$check_found=mysql_num_rows($a_query);
					$searcha = mysql_fetch_array($a_query);
					
					$left = $searcha['nextshot'] - time();
					if($left <= 0){
						//-----------------------------Add here: time - nextshot <= 0 --------------------------->
							
						if ($check_found == "0"){
							echo "You have not found this user yet or they have traveled to anouther location.";
						}elseif ($check_found != "0"){
							if ($target->last_attempted > time()){
								echo "This user is still recovering";
							}elseif($target->last_shot <= time()){
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
											}elseif($fetch->location == $target->location){
						
													
												$datum1 = gmdate('Y-m-d H:i:s');
													
												// checks //
													
												$sqlout="SELECT * FROM users WHERE username = '".$_SESSION['username']."'";  
												$query_naam = mysql_query($sqlout) or die(mysql_error());
												$query_row=mysql_fetch_array($query_naam);
												$myrow = $query_row;
													
												$killer_rank=$query_row['rank'];
													
												$sqlout="SELECT * FROM users WHERE username = '".$_POST['kill_username']."'";  
												$query_naam = mysql_query($sqlout) or die(mysql_error());
												$query_row=mysql_fetch_array($query_naam);
													
												$target_rank=$query_row['rank'];
												$target_name=$query_row['username'];
													
												$sqlout="SELECT * FROM kill_chart WHERE username = '$target_rank' AND target = '$killer_rank'";  
												$query_naam = mysql_query($sqlout) or die(mysql_error());
												$query_row=mysql_fetch_array($query_naam);
													
												$fetch="SELECT weapon FROM users WHERE username = '$username'";
													
												$guns = array("Pistol" => 1, "Rifle" => 2, "Shotgun" => 3, "Twin Uzi" => 4, "M16" => 5);

												if($guns[$myrow['weapon']]){
													$gunnum = $guns[$myrow['weapon']];
												}else{
													$gunnum = 1;
												}	

												$bullets=$query_row['bullets'];

													
												$mod = (((-8.5*$gunnum) + 133.5))/100;
												$bullets *= $mod;
												$lose = ($bullets / 100);
												$boo = ($_POST['kill_bullets'] / $lose);
													?><font color="#FFFFFF"><?
												echo "<br><center>You shot <b>".$_POST['kill_bullets']."</b> bullets at <b>$target_name</b></center>"; ?></font><?
													
												$sqlout="UPDATE users set bullets=bullets-'".$_POST['kill_bullets']."' WHERE username = '".$_SESSION['username']."'"; 
												$query_naam = mysql_query($sqlout) or die(mysql_error());
													
												$sqlout="UPDATE users set health=health-'$boo' WHERE username = '$target_name'"; 
												$query_naam = mysql_query($sqlout) or die(mysql_error());
													
													
												$sqlout="SELECT * FROM users WHERE username = '$target_name'";  
												$query_naam = mysql_query($sqlout) or die(mysql_error());
												$query_row=mysql_fetch_array($query_naam);
													
												$health=$query_row['health'];
													
												if($health <= 0){
												?><font color="#FFFFFF"><?	echo "<center>and they died!!</center>";
								 ?></font><?					
													$sqlout="UPDATE users set status='dead' WHERE username = '$target_name'"; 
													$query_naam = mysql_query($sqlout) or die(mysql_error());
													
													$sqlout="INSERT into attempts set target = '$target_name', username='".$_SESSION['username']."', id='', date='$datum1', outcome='Dead'"; 
													$query_naam = mysql_query($sqlout) or die(mysql_error());
													
													mysql_query("DELETE FROM `search` WHERE username='{$_SESSION['username']}' AND target='{$searcha['target']}'") or die(mysql_error());
													// witnes statment //
													
													$rand=rand(1,10);
													$i=0;
$timenow = time();
													
													while($i < $rand){
															$set= mysql_query("SELECT * FROM users WHERE username != '$username' AND location='$fetch->location' AND online > '$timenow' ORDER BY id DESC LIMIT 10");
															while($dns=mysql_fetch_object($set)){
															mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) VALUES ('', '$dns->username', '$dns->username', 'You witnessed $username kill $target_name ', '$date', '0', '0', '0', '1', '$target->username')");
															$i++;
														}
													}
													
													// survived //
												
												}else{
												?><font color="#FFFFFF"><?	echo "<center>and they survived, better watch your back now!!"; ?></font><?
													
													//----------------------------Add here: nextshot += 1hr ------------------------------
													
													$nextshot = time() + (1 * 60 * 60);
													
													mysql_query("UPDATE `search` SET nextshot='{$nextshot}' WHERE id='{$searcha['id']}'");
													
													$sqlout="INSERT into attempts set target = '$target_name', username='".$_SESSION['username']."', id='', date='$datum1', outcome='Survived'"; 
													$query_naam = mysql_query($sqlout) or die(mysql_error());
												}
													
												// end //
												
											}
										}
									}
								}
							}
						}
					}else{
						echo "You must wait one (1) hour before shooting that person again.";
					}
				}
			}
		}
	}
}




/////////CLASSING NEEDS TO GO IN THE BRACKET ABOVE



/////BASICALLY WHAT I NEED TO DO IS CLASS EACH WEAPON FOR A CERTIAN AMOUNT OF POINTS ADD THEM ALL UP THEN COMPARE THEM TO THE USERS DEFENCE SHIT ADDED UP.
/////tHEN DECIDE WETHER OR NOT TO KILL THEM.


if (strip_tags($_POST['hunt_button']) && strip_tags($_POST['hunt_username'])){
$hunt_item=strip_tags($_POST['hunt_item']);
$hunt_username=strip_tags($_POST['hunt_username']);
$hunt_time=intval(strip_tags($_POST['hunt_time']));
if ($hunt_time != "0"){

if ($hunt_time == 0 || !$hunt_time || ereg('[^3-9]',$hunt_time)){
	print "Invalid time.";
	
}elseif ($hunt_time != 0 || $hunt_time || !ereg('[^3-9]',$hunt_time)){


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
if (strip_tags($_POST['Chi'])){
$check_chi="1";
}
if (strip_tags($_POST['Rus'])){
$check_rus="1";
}
if (strip_tags($_POST['Usa'])){
$check_usa="1";
}
if (strip_tags($_POST['Sau'])){
$check_sau="1";
}
if (strip_tags($_POST['Pan'])){
$check_pan="1";
}
$init=$check_eng+$check_chi+$check_rus+$check_usa+$check_sau+$check_pan;
$total_price=$price * $init;
if ($total_price > $fetch->money){
echo "You dont have enough money!";
}elseif ($total_price <= $fetch->money){

$total_time=time()+(3600*$hunt_time);

$hrends = time() + (8 * 60 * 60);

if ($check_eng){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username', '$Expired',  '$hunt_username', '$total_time', '0','London', '{$hrends}')");
$ponse=1;
}
if ($check_chi){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username', '$Expired',  '$hunt_username', '$total_time', '0','New York', '{$hrends}')");
$ponse=1;
}
if ($check_rus){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username', '$Expired',  '$hunt_username', '$total_time', '0','Beijing', '{$hrends}')");
$ponse=1;
}
if ($check_usa){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username', '$Expired',  '$hunt_username', '$total_time', '0','Rome', '{$hrends}')");
$ponse=1;
}
if ($check_sau){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username', '$Expired',  '$hunt_username', '$total_time', '0','Moscow', '{$hrends}')");
$ponse=1;
}
if ($check_pan){
mysql_query("INSERT INTO `search` (`id`, `username`, `expired`, `target`, `time`, `status`,`location`, `8hrends`) VALUES ('', '$username',  '$Expired', '$hunt_username', '$total_time', '0','Bogota', '{$hrends}')");
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
<link href="file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/in.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<form name="form1" method="post" action="">
  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td>
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr>
            <td colspan=2 align=center background="includes/grad.jpg"><center>
                <span class="style1">Kill                </span>
            </center></td>
          </tr>
          <tr bgcolor=#666666>
            <td colspan="2" bgcolor="#666666" class=tip><div align="center" class="style1">Kill a user </div></td>
          </tr>
          <tr> 
            <td width="50%" bgcolor="#666666"><span class="style1">Username:</span></td>
            <td width="50%" bgcolor="#666666"><input name="kill_username" type="text" id="kill_username3"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Amount of bullets:</span></td>
            <td bgcolor="#666666"><input name="kill_bullets" type="text" id="kill_bullets3"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1"></span></td>
            <td bgcolor="#666666"><input name="kill_button" type="submit" id="kill_button3" value="Submit"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr>
            <td colspan=2 align=center background="includes/grad.jpg"><center>
                <span class="style1">Search                </span>
            </center></td>
          </tr>
          <tr bgcolor=#666666>
            <td colspan="2" bgcolor="#666666" class=tip ><div align="center" class="style1">
              Search down a user <br>
              You have to search for 3 hours </p>
            </div></td>
          </tr>
          <tr> 
            <td width="50%" bgcolor="#666666"><span class="style1">Username:</span></td>
            <td width="50%" bgcolor="#666666"><input name="hunt_username" type="text" id="hunt_username2"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Time:</span></td>
            <td bgcolor="#666666"><input name="hunt_time" type="text" id="hunt_time2"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1">Location:</span></td>
            <td bgcolor="#666666"><span class="style1">
              <input name="Eng" type="checkbox" id="Eng22" value="1">
              London
                <input name="Chi" type="checkbox" id="Chi22" value="2">
              New York
              <input name="Rus" type="checkbox" id="Rus22" value="3">
              Beijing<br> 
              <input name="Usa" type="checkbox" id="Usa22" value="4">
              Rome
              <input name="Sau" type="checkbox" id="Sau22" value="5">
              Moscow
              <input name="Pan" type="checkbox" id="Pan22" value="6">
            Bogota</span></td>
          </tr>
          <tr> 
            <td bgcolor="#666666"><span class="style1"></span></td>
            <td bgcolor="#666666"><input name="hunt_button" type="submit" id="hunt_button23" value="Submit"></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr> 
      <td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr>
            <td colspan="4" background="includes/grad.jpg"><div align="center" class="style1">Searches  </div></td>
          </tr>
          <tr bgcolor=#666666 > 
            <td width="30%" height="6" class=tip><div align="center" class="style1">Target</div></td>
            <td width="31%" class=tip><div align="center" class="style1">Status</div></td>
            <td width="26%" class=tip><div align="center" class="style1">Location</div></td>
            <td width="13%" class=tip><div align="center" class="style1">Delete</div></td>
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
           echo " <td width=30% height=10 bgcolor=666666><a href='profile.php?viewuser=$i->target'>$i->target</a></td>";
           echo " <td width=31% bgcolor=666666>"; if ($i->status == "0"){ echo "".maketime($i->time).""; }elseif ($i->status == "1"){ echo "Not found"; }else{ echo "<a Onclick=input($i->id) href=#send>Found</a>"; } echo "</td>";
            echo "<td bgcolor=666666>$i->location</td>";
echo "<td bgcolor=666666><a href='?dl=$i->id'>Delete</a></td>";
        echo "  </tr>";
		  }
		  if ($Submit && $choice){
if ($choice == "3"){
$cost="1000";

if ($cost > $fetch->points){
echo "You dont have enough cash";
}else{
mysql_query("UPDATE users SET money=money-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_kill=last_kill=0 WHERE username='$username'");

echo "Now you can kill";

}
}




}?>
        </table></td>
    </tr>
    <tr> 
      <td height="126">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <div align="center">
<p>&nbsp;</p>
</form>