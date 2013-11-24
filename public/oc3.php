<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();



$username=$_SESSION['username'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch = mysql_fetch_object($above);
if ($fetch->rank == "Tramp" || $fetch->rank == "Paper Kid" || $fetch->rank == "Theif" || $fetch->rank == "Robber"){
echo "You need to be Gangster to make a oc.";
exit();
}



if ($fetch->oc == "0"){
if ($fetch->last_oc > time()){
echo "You done a OC recently you need to wait ".maketime($fetch->last_oc)."";
exit();
}


if (strip_tags($_POST['start_button']) && strip_tags($_POST['share']) == "1" || strip_tags($_POST['share']) == "2"){
$share=strip_tags($_POST['share']); 
if ($fetch->money < 100000){
echo "You dont have enough money to start an OC";
}elseif ($fetch->money >= 100000){
mysql_query("INSERT INTO `oc` ( `id` , `leader` , `we` , `ee` , `driver` , `weapons` , `explosives` , `car` , `we_inv` , `ee_inv` , `driver_inv` , `share` , `we_ready` , `ee_ready` , `driver_ready`,`location` ) 
VALUES (
'', '$username', '0', '0', '0', '0-0-0-0-0', '0-0-0-0-0', '0', '0', '0', '0', '1', '0', '0', '0','$fetch->location'
)");
echo "Oc has been successfully created.";
$new_money = $fetch->money - 100000;
mysql_query("UPDATE users SET money='$new_money', oc='1' WHERE username='$username'");

}}
?><form action="" method=POST>
<table width="72%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class=header><center>
        Organised crime (OC)
      </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td>To start up a organised crime it will cost &pound;100,000 and you 
            will  need 3 other people to work alongside you.</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>First choose the way you wish to split the money.</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td><input type="radio" name="share" value="1">
            Equally between each criminal</td>
        </tr>
        <tr> 
          <td><input type="radio" name="share" value="2">
            Leader receives all </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
              <input name="start_button" type="submit" id="start_button" value="Start the OC!">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table></form>
<?


}elseif ($fetch->oc == "1"){


$oc=mysql_fetch_object(mysql_query("SELECT * FROM oc WHERE leader='$username'"));
$weapons=explode("-", $oc->weapons);
$exp=explode("-", $oc->explosives);

$we=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$oc->we'"));
$ee=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$oc->ee'"));
$driver=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$oc->driver'"));


if (strtolower($oc->leader) == strtolower($username)){
if ($fetch->location != $oc->location){
echo "You need to be in $oc->location for the oc to go ahead!";
exit();
}
if (strip_tags($_POST['Dis'])){
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->we'");
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->ee'");
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->driver'");
mysql_query("DELETE FROM oc WHERE id='$oc->id'");
echo "Oc has been disbanded";
}
if (strip_tags($_GET['kick'])){

$kick=strip_tags($_GET['kick']);
if ($kick == "we"){
mysql_query("UPDATE oc SET we='0', weapons='0-0-0-0-0', we_ready='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->we'");
echo "Weapons Expert kicked";
}elseif ($kick == "ee"){
mysql_query("UPDATE oc SET ee='0', explosives='0-0-0-0-0', ee_ready='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->ee'");
echo "Explosives Expert kicked";
}elseif ($kick == "driver"){
mysql_query("UPDATE oc SET driver='0', car='0', driver_ready='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$oc->driver'");
echo "Driver kicked";
}
}

if (strip_tags($_POST['inv_button'])){
$inv_username=strip_tags($_POST['inv_username']);
$com=mysql_num_rows(mysql_query("SELECT * FROM oc WHERE leader='$inv_username' OR we='$inv_username' OR ee='$inv_username' OR driver='$inv_username'"));
$lee=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$inv_username'"));
if ($lee->last_oc > time()){
echo "This is user is not ready to do an oc!";
}elseif ($lee->last_oc <= time()){ 
if ($com != "0"){
echo "This person is in an oc!";
}elseif ($com == "0"){
if (strtolower($username) == strtolower($inv_username)){
echo "You cannot invite your self";
}elseif(strtolower($username) != strtolower($inv_username)){

if (strip_tags($_POST['inv']) == "inv_we"){
$inv_username=strip_tags($_POST['inv_username']);
$check = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$inv_username'"));
if ($check == "0"){
echo "No such user.";
}elseif ($check != "0"){





if ($oc->we != "0"){
echo "You need to kick the Weapons expert before you invite someone else.";
}elseif ($oc->we == "0"){


$invite_text="
  <div align=center>You have been invited to join $username s Organised crime as the Weapons Expert,<br> please 
    choose one of the following options:<br>
    <input name=Decline_OC type=submit id=Decline value=Decline>
    | 
    <input name=Accept_OC type=submit value=Accept>
  </div><input type=hidden name=place value=we><input type=hidden name=oc_id value=$oc->id>
";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$inv_username', '$inv_username', '$invite_text', '$date', '0'
)");
echo "Weapons expert invited";
mysql_query("UPDATE oc SET we_inv='$inv_username' WHERE id='$oc->id'");


}}}
if (strip_tags($_POST['inv']) == "inv_ee"){
$inv_username=strip_tags($_POST['inv_username']);
$check = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$inv_username'"));
if ($check == "0"){
echo "No such user.";
}elseif ($check != "0"){

if ($oc->ee != "0"){
echo "You need to kick the Explosives expert before you invite someone else.";
}elseif ($oc->ee == "0"){

$invite_text="
  <div align=center>You have been invited to join $username s Organised crime as the Explosives expert<br>, please 
    choose one of the following options:<br>
    <input name=Decline_OC type=submit id=Decline value=Decline>
    | 
    <input name=Accept_OC type=submit value=Accept>
  </div><input type=hidden name=place value=ee><input type=hidden name=oc_id value=$oc->id>
";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$inv_username', '$inv_username', '$invite_text', '$date', '0'
)");
echo "Explosives expert invited";
mysql_query("UPDATE oc SET ee_inv='$inv_username' WHERE id='$oc->id'");

}}}
if (strip_tags($_POST['inv']) == "inv_driver"){
$inv_username=strip_tags($_POST['inv_username']);
$check = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$inv_username'"));
if ($check == "0"){
echo "No such user.";
}elseif ($check != "0"){

if ($oc->driver != "0"){
echo "You need to kick the Current Driver expert before you invite someone else.";
}elseif ($oc->driver == "0"){

$invite_text="
  <div align=center>You have been invited to join $username s Organised crime as the Driver<br>, please 
    choose one of the following options:<br>
    <input name=Decline_OC type=submit id=Decline value=Decline>
    | 
    <input name=Accept_OC type=submit value=Accept>
  </div><input type=hidden name=place value=driver><input type=hidden name=oc_id value=$oc->id>
";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$inv_username', '$inv_username', '$invite_text', '$date', '0'
)");
echo "Driver invited";
mysql_query("UPDATE oc SET driver_inv='$inv_username' WHERE id='$oc->id'");

}}}
}}}


}


if ($_POST['GOGO'] && $oc->we_ready == "Ready" && $oc->ee_ready == "Ready" && $oc->driver_ready == "Ready"){



if ($fetch->rank == 'Tramp'){ $add = 1; }
elseif  ($fetch->rank == 'Paper Kid'){ $add = 2; }
elseif  ($fetch->rank == 'Theif'){ $add = 3; }
elseif  ($fetch->rank == 'Robber'){ $add = 4; }
elseif  ($fetch->rank == 'Gangster'){ $add = 5; }
elseif  ($fetch->rank == 'Hitman'){ $add = 6; }
elseif  ($fetch->rank == 'Consultant'){ $add = 6; }
elseif  ($fetch->rank == 'Assassin'){ $add = 7; }
elseif  ($fetch->rank == 'Made Man'){ $add = 8; }
elseif  ($fetch->rank == 'Bouncer'){ $add = 9; }
elseif  ($fetch->rank == 'Club Owner'){ $add = 10; }
elseif  ($fetch->rank == 'Druglord'){ $add = 11; }
elseif  ($fetch->rank == 'Boss'){ $add = 12; }
elseif  ($fetch->rank == 'Respectable Boss'){ $add = 13; }
elseif  ($fetch->rank == 'Honored Boss'){ $add = 14; }
elseif  ($fetch->rank == 'Cugine'){ $add = 15; }
elseif  ($fetch->rank == 'Godfather'){ $add = 16; }
elseif  ($fetch->rank == 'Legendary Godfather'){ $add = 17; }
elseif  ($fetch->rank == 'Don'){ $add = 18; }

if ($we->rank == 'Tramp'){ $add_we = 1; }
elseif  ($we->rank == 'Paper Kid'){ $add_we = 2; }
elseif  ($we->rank == 'Theif'){ $add_we = 3; }
elseif  ($we->rank == 'Robber'){ $add_we = 4; }
elseif  ($we->rank == 'Gangster'){ $add_we = 5; }
elseif  ($we->rank == 'Hitman'){ $add_we = 6; }
elseif  ($we->rank == 'Consultant'){ $add_we = 6; }
elseif  ($we->rank == 'Assassin'){ $add_we = 7; }
elseif  ($we->rank == 'Made Man'){ $add_we = 8; }
elseif  ($we->rank == 'Bouncer'){ $add_we = 9; }
elseif  ($we->rank == 'Club Owner'){ $add_we = 10; }
elseif  ($we->rank == 'Druglord'){ $add_we = 11; }
elseif  ($we->rank == 'Boss'){ $add_we = 12; }
elseif  ($we->rank == 'Respectable Boss'){ $add_we = 13; }
elseif  ($we->rank == 'Honored Boss'){ $add_we = 14; }
elseif  ($we->rank == 'Cugine'){ $add_we = 15; }
elseif  ($we->rank == 'Godfather'){ $add_we = 16; }
elseif  ($we->rank == 'Legendary Godfather'){ $add_we = 17; }
elseif  ($we->rank == 'Don'){ $add_we = 18; }

/////CLASS THE EEEEEEEEE EEEEE


if ($ee->rank == 'Tramp'){ $add_ee = 1; }
elseif  ($ee->rank == 'Paper Kid'){ $add_ee = 2; }
elseif  ($ee->rank == 'Theif'){ $add_ee = 3; }
elseif  ($ee->rank == 'Robber'){ $add_ee = 4; }
elseif  ($ee->rank == 'Gangster'){ $add_ee = 5; }
elseif  ($ee->rank == 'Hitman'){ $add_ee = 6; }
elseif  ($ee->rank == 'Consultant'){ $add_ee = 6; }
elseif  ($ee->rank == 'Assassin'){ $add_ee = 7; }
elseif  ($ee->rank == 'Made Man'){ $add_ee = 8; }
elseif  ($ee->rank == 'Bouncer'){ $add_ee = 9; }
elseif  ($ee->rank == 'Club Owner'){ $add_ee = 10; }
elseif  ($ee->rank == 'Druglord'){ $add_ee = 11; }
elseif  ($ee->rank == 'Boss'){ $add_ee = 12; }
elseif  ($ee->rank == 'Respectable Boss'){ $add_ee = 13; }
elseif  ($ee->rank == 'Honored Boss'){ $add_ee = 14; }
elseif  ($ee->rank == 'Cugine'){ $add_ee = 15; }
elseif  ($ee->rank == 'Godfather'){ $add_ee = 16; }
elseif  ($ee->rank == 'Legendary Godfather'){ $add_ee = 17; }
elseif  ($ee->rank == 'Don'){ $add_ee = 18; }



////cLASS DRIVER

if ($driver->rank == 'Tramp'){ $add_driver = 1; }
elseif  ($driver->rank == 'Paper Kid'){ $add_driver = 2; }
elseif  ($driver->rank == 'Theif'){ $add_driver = 3; }
elseif  ($driver->rank == 'Robber'){ $add_driver = 4; }
elseif  ($driver->rank == 'Gangster'){ $add_driver = 5; }
elseif  ($driver->rank == 'Hitman'){ $add_driver = 6; }
elseif  ($driver->rank == 'Consultant'){ $add_driver = 6; }
elseif  ($driver->rank == 'Assassin'){ $add_driver = 7; }
elseif  ($driver->rank == 'Made Man'){ $add_driver = 8; }
elseif  ($driver->rank == 'Bouncer'){ $add_driver = 9; }
elseif  ($driver->rank == 'Club Owner'){ $add_driver = 10; }
elseif  ($driver->rank == 'Druglord'){ $add_driver = 11; }
elseif  ($driver->rank == 'Boss'){ $add_driver = 12; }
elseif  ($driver->rank == 'Respectable Boss'){ $add_driver = 13; }
elseif  ($driver->rank == 'Honored Boss'){ $add_driver = 14; }
elseif  ($driver->rank == 'Cugine'){ $add_driver = 15; }
elseif  ($driver->rank == 'Godfather'){ $add_driver = 16; }
elseif  ($driver->rank == 'Legendary Godfather'){ $add_driver = 17; }
elseif  ($driver->rank == 'Don'){ $add_driver = 18; }

$kid=$weapon[0]+$exp[0] * 2;
$kid2=$weapon[1]+$exp[1] * 3;
$kid3=$weapon[2]+$exp[2] * 4;
$kid4=$weapon[3]+$exp[3] * 5;
$kid5=$weapon[4]+$exp[4] * 6;



$total = $kid + $kid2 + $kid3 + $kid4 + $kid5 + $add + $add_we + $add_ee + $add_driver;
echo "$total";
$winornot = rand(20,200);
if ($winornot < $total){
$cash = $total *100000;
$cash = rand(200000, $cash);

if ($oc->share == "1"){
$cash_split = round($cash/4);
$leader_money = $fetch->money + $cash_split;
$we_money = $we->money + $cash_split;
$ee_money = $ee->money + $cash_split;
$driver_money = $driver->money + $cash_split;

mysql_query("UPDATE users set money='$leader_money' WHERE username='$username'"); 
mysql_query("UPDATE users set money='$we_money' WHERE username='$oc->we'"); 
mysql_query("UPDATE users set money='$ee_money' WHERE username='$oc->ee'"); 
mysql_query("UPDATE users set money='$driver_money' WHERE username='$oc->driver'"); 
$message = "Congratulations your oc was a success the money has already been shared out. into four sums of $cash_split"; 
}else{

$cash = round($cash);
$new_money = $fetch->money + $cash;
$message = "Congratulations your oc was a success you got away with $cash. to get your share talk to the leader."; 
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
}



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$username', '$username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$we->username', '$we->username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$ee->username', '$ee->username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$driver->username', '$driver->username', '$message', '$date', '0'
)");

$wait=time()+86400;

$new_rank_u=$fetch->rankpoints + rand(100,200);
$new_rank_we=$we->rankpoints + rand(100,200);
$new_rank_ee=$ee->rankpoints + rand(100,200);
$new_rank_driver=$driver->rankpoints + rand(100,200);
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_u', oc='0' WHERE username='$username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_we', oc='0' WHERE username='$we->username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_ee', oc='0' WHERE username='$ee->username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_driver', oc='0' WHERE username='$driver->username'");

mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$fetch->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$we->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$ee->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$driver->username'");

echo "<center><font size=8><font color=red>Congratulations. you got away with ".makecomma($cash)."</font></font></center>";
	mysql_query("DELETE from oc WHERE id='$oc->id'"); 
exit();
	
}
}elseif ($winornot > $total){
$message = "The oc was a failure.";



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$person->username', '$username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$fetch->username', '$we->username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$fetch->username', '$ee->username', '$message', '$date', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$fetch->username', '$driver->username', '$message', '$date', '0'
)");

$wait=time()+86400;

$new_rank_u=$fetch->rankpoints + rand(1,20);
$new_rank_we=$we->rankpoints + rand(1,20);
$new_rank_ee=$ee->rankpoints + rand(1,20);
$new_rank_driver=$driver->rankpoints + rand(1,60);
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_u', oc='0' WHERE username='$username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_we', oc='0' WHERE username='$we->username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_ee', oc='0' WHERE username='$ee->username'");
mysql_query("UPDATE users SET last_oc ='$wait', rankpoints='$new_rank_driver', oc='0' WHERE username='$driver->username'");

mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$fetch->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$we->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$ee->username'");
mysql_query("UDPATE user_info SET ocs=ocs+1 WHERE username='$driver->username'");




echo "<center><font size=8><font color=red>You failed!</font></font></center>";
	mysql_query("DELETE from oc WHERE id='$oc->id'"); 
exit();
}



?>
<form name="form1" method="post" action="">
  <table width="82%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td class=header><center>
          Organised crime (OC) Position: leader </center></td>
    </tr>
	 <tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td colspan="5">Welcome to the leaderCP for the OC, which is going 
              down in <?php echo "$oc->location"; ?></td>
          </tr>
          <tr> 
            <td width="25%"><div align="center">Position</div></td>
            <td width="19%">Username:</td>
            <td width="20%">Equiptment</td>
            <td width="16%">Location</td>
            <td width="20%">Ready</td>
          </tr>
          <tr> 
            <td>Weapons EXP(<a href=?kick=we>X</a>)</td>
            <td> 
              <?php if ($oc->we != "0"){ echo "$oc->we"; }else{ echo "None"; } ?>
            </td>
            <td> 
              <?php if ($weapons[0] > 0){ echo "$weapons[0] Sig Sauer P229's"; } if ($weapons[1] > 0){ echo "$weapons[1] Jackhammer automatic shotgun's"; } if ($weapons[2] > 0){ echo "$weapons[2] Heckler und Koch MP-5k's"; } if ($weapons[3] > 0){ echo "$weapons[3] FN SCAR's"; } if ($weapons[4] > 0){ echo "$weapons[4] Browning M2HB's"; }else{ echo "None"; } ?>
            </td>
            <td> 
              <?php if ($oc->we != "0"){ echo "$we->location"; }else{ echo "N/A"; } ?>
            </td>
            <td> 
              <?php if ($oc->we_ready == "0"){ echo "No"; }else{ echo "Yes"; } ?>
            </td>
          </tr>
          <tr> 
            <td>Explosives EXP(<a href=?kick=ee>X</a>)</td>
            <td> 
              <?php if ($oc->ee != "0"){ echo "$oc->ee"; }else{ echo "None"; } ?>
            </td>
            <td> 
              <?php if ($exp[0] > 0){ echo "$exp[0] Petrol bombs"; } if($exp[1] > 0){ echo "$exp[1] Grenades"; } if ($exp[2] > 0){ echo "$exp[2] Grenades"; } if ($exp[3] > 0){ echo "$exp[3] C4 packs"; } if ($exp[4] > 0){  echo "$exp[4] Uranium packs"; }else{ echo "None"; } ?>
            </td>
            <td> 
              <?php if ($oc->ee != "0"){ echo "$ee->location"; }else{ echo "N/A"; } ?>
            </td>
            <td> 
              <?php if ($oc->ee_ready == "0"){ echo "No"; }else{ echo "Yes"; } ?>
            </td>
          </tr>
          <tr> 
            <td>Driver(<a href=?kick=driver>X</a>)</td>
            <td> 
              <?php if ($oc->driver != "0"){ echo "$oc->driver"; }else{ echo "None"; } ?>
            </td>
            <td> 
              <?php
$select = mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$oc->car'"));

if ($oc->car != "0"){ echo "$select->car, $select->damage%"; }else{ echo "None"; }
?>
            </td>
            <td> 
              <?php if ($oc->driver != "0"){ echo "$driver->location"; }else{ echo "N/A"; } ?>
            </td>
            <td> 
              <?php if ($oc->driver_ready == "0"){ echo "No"; }else{ echo "Yes"; } ?>
            </td>
          </tr>
          <tr> 
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="5"><div align="center">Invite:</div></td>
          </tr>
          <tr> 
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5">Position: 
              <select name="inv" id="inv">
                <option value="inv_we">Weapons expert</option>
                <option value="inv_ee">Explosives expert</option>
                <option value="inv_driver">Driver</option>
              </select></td>
          </tr>
          <tr>
            <td colspan="5">Username: 
              <input name="inv_username" type="text" id="inv_user"></td>
          </tr>
          <tr>
            <td colspan="5"><input name="inv_button" type="submit" id="inv_button" value="Invite"></td>
          </tr>
          <tr> 
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="5"><div align="center"> 
                <input name="GOGO" type="submit" id="go_but" value="Go for it!">
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?

}
$oc=mysql_fetch_object(mysql_query("SELECT * FROM oc WHERE we='$username'"));
$weapons=explode("-", $oc->weapons);
if (strtolower($oc->we) == strtolower($username)){
if ($fetch->oclocation != $oc->location){
echo "You need to be in $oc->location for the oc to go down!";
exit();
}

if ($oc->we_ready == "Ready"){ 
if (strip_tags($_GET['stop']) == "yes"){
echo "You left the oc.<br>";
mysql_query("UPDATE oc SET we='0', we_ready='0', weapons='0-0-0-0-0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");
}
echo "You are Ready! <a href=?stop=yes>Leave the oc</a>(Will not be refunded)";
exit();
}

if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE oc SET we='0', we_ready='0', weapons='0-0-0-0-0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");
echo "You left the oc";
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE oc SET we_ready='Ready' WHERE id='$oc->id'");
echo "You are now ready for the the oc";
}

if (strip_tags($_POST['buy'])){
if (strip_tags($_POST['sig'])){
$sig_amount=intval(strip_tags($_POST['sig']));
	
		if ($sig_amount == 0 || !$sig_amount || ereg('[^0-9]',$sig_amount)){
	print "You cant buy that amount.";
	
}elseif ($sig_amount != 0 && $sig_amount && !ereg('[^0-9]',$sig_amount)){
	
$new_weapons = $weapons[0]+$weapons[1]+$weapons[2]+$weapons[3]+$weapons[4]+$sig_amount;
if ($new_weapons > 5){
echo "You cannot buy more than 5 weapons!";
}elseif ($new_weapons <= 5){
$price= $sig_amount * 1000;
if ($price > $fetch->money){
echo "You dont have enough money";
}elseif ($price <= $fetch->money){

$a = $weapons[0]+$sig_amount;
$a = "$a-$weapons[1]-$weapons[2]-$weapons[3]-$weapons[4]";
mysql_query("UPDATE oc SET weapons='$a' WHERE id='$oc->id'");
$new_money=$fetch->money - $price;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");

echo "Weapons bought";
}}}}

if (strip_tags($_POST['jack'])){
$jack_amount=intval(strip_tags($_POST['jack']));
	
		if ($jack_amount == 0 || !$jack_amount || ereg('[^0-9]',$jack_amount)){
	print "You cant buy that amount.";
	
}elseif ($jack_amount != 0 && $jack_amount && !ereg('[^0-9]',$jack_amount)){
	
$new_weapons1 = $weapons[0]+$weapons[1]+$weapons[2]+$weapons[3]+$weapons[4]+$jack_amount;
if ($new_weapons1 > 5){
echo "You cannot buy more than 5 weapons!";
}elseif ($new_weapons1 <= 5){
$price1= $jack_amount * 5000;
if ($price1 > $fetch->money){
echo "You dont have enough money";
}elseif ($price1 <= $fetch->money){

$b = $weapons[1]+$jack_amount;
$b = "$weapons[0]-$b-$weapons[2]-$weapons[3]-$weapons[4]";
mysql_query("UPDATE oc SET weapons='$b' WHERE id='$oc->id'");
$new_money1=$fetch->money - $price1;
mysql_query("UPDATE users SET money='$new_money1' WHERE username='$username'");

echo "Weapons bought";
}}}}
if (strip_tags($_POST['hek'])){
$hek_amount=intval(strip_tags($_POST['hek']));
	
		if ($hek_amount == 0 || !$hek_amount || ereg('[^0-9]',$hek_amount)){
	print "You cant buy that amount.";
	
}elseif ($hek_amount != 0 && $hek_amount && !ereg('[^0-9]',$hek_amount)){
	
$new_weapons2 = $weapons[0]+$weapons[1]+$weapons[2]+$weapons[3]+$weapons[4]+$hek_amount;
if ($new_weapons2 > 5){
echo "You cannot buy more than 5 weapons!";
}elseif ($new_weapons2 <= 5){
$price2= $hek_amount * 10000;
if ($price2 > $fetch->money){
echo "You dont have enough money";
}elseif ($price2 <= $fetch->money){

$c = $weapons[2]+$hek_amount;
$c = "$weapons[0]-$weapons[1]-$c-$weapons[3]-$weapons[4]";
mysql_query("UPDATE oc SET weapons='$c' WHERE id='$oc->id'");
$new_money2=$fetch->money - $price2;
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$username'");

echo "Weapons bought";
}}}}
if (strip_tags($_POST['fn'])){
$fn_amount=intval(strip_tags($_POST['fn']));
	
		if ($fn_amount == 0 || !$fn_amount || ereg('[^0-9]',$fn_amount)){
	print "You cant buy that amount.";
	
}elseif ($fn_amount != 0 && $fn_amount && !ereg('[^0-9]',$fn_amount)){
	
$new_weapons3 = $weapons[0]+$weapons[1]+$weapons[2]+$weapons[3]+$weapons[4]+$fn_amount;
if ($new_weapons3 > 5){
echo "You cannot buy more than 5 weapons!";
}elseif ($new_weapons3 <= 5){
$price3= $fn_amount * 15000;
if ($price3 > $fetch->money){
echo "You dont have enough money";
}elseif ($price3 <= $fetch->money){

$d = $weapons[3]+$fn_amount;
$d = "$weapons[0]-$weapons[1]-$weapons[2]-$d-$weapons[4]";
mysql_query("UPDATE oc SET weapons='$d' WHERE id='$oc->id'");
$new_money3=$fetch->money - $price3;
mysql_query("UPDATE users SET money='$new_money3' WHERE username='$username'");

echo "Weapons bought";
}}}}

if (strip_tags($_POST['brown'])){
$brown_amount=intval(strip_tags($_POST['brown']));
	
		if ($brown_amount == 0 || !$brown_amount || ereg('[^0-9]',$brown_amount)){
	print "You cant buy that amount.";
	
}elseif ($brown_amount != 0 && $brown_amount && !ereg('[^0-9]',$brown_amount)){
	
$new_weapons4 = $weapons[0]+$weapons[1]+$weapons[2]+$weapons[3]+$weapons[4]+$brown_amount;
if ($new_weapons4 > 5){
echo "You cannot buy more than 5 weapons!";
}elseif ($new_weapons4 <= 5){
$price4= $brown_amount * 25000;
if ($price4 > $fetch->money){
echo "You dont have enough money";
}elseif ($price4 <= $fetch->money){

$e = $weapons[4]+$brown_amount;
$e = "$weapons[0]-$weapons[1]-$weapons[2]-$weapons[3]-$e";
mysql_query("UPDATE oc SET weapons='$e' WHERE id='$oc->id'");
$new_money4=$fetch->money - $price4;
mysql_query("UPDATE users SET money='$new_money4' WHERE username='$username'");

echo "Weapons bought";
}}}}


}

?><form action="" method=POST>

<table width="72%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class=header><center>
        Organised crime (OC) Position: Weapons expert 
      </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Choose the weapons:</div></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">You can buy up to 5 weapons in total</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="31%"><input name="sig" type="text" id="sig" size="5">
          9MM</td>
          <td width="69%">&pound;1000</td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="jack" type="text" id="jack" size="5">
            Spaz Shotgun </div></td>
          <td>&pound;5000</td>
        </tr>
        <tr> 
          <td><input name="hek" type="text" id="hek" size="5">
          KSMG</td>
          <td>&pound;10000</td>
        </tr>
        <tr> 
          <td><input name="fn" type="text" id="fn" size="5">
          AK-47</td>
          <td>&pound;15000</td>
        </tr>
        <tr> 
          <td><input name="brown" type="text" id="brown" size="5">
          M16</td>
          <td>&pound;25000</td>
        </tr>
        <tr> 
          <td><div align="right"> 
              <input name="buy" type="submit" id="Buy" value="Buy the weapons">
            </div></td>
          <td> <div align="right">
              <input name="Ready" type="submit" id="Ready" value="I'm Ready">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table></form>
<?

}


$oc=mysql_fetch_object(mysql_query("SELECT * FROM oc WHERE ee='$username'"));
$explosives=explode("-", $oc->explosives);
if (strtolower($oc->ee) == strtolower($username)){
if ($fetch->location != $oc->location){
echo "You need to be in $oc->location for the oc to go down!";
exit();
}

if ($oc->ee_ready == "Ready"){ 
if (strip_tags($_GET['stop']) == "yes"){
echo "You left the oc.";
mysql_query("UPDATE oc SET ee='0', explosives='0-0-0-0-0', ee_ready='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");
}

echo "You are Ready! <a href=?stop=yes>Leave the oc</a>(Will not be refunded)";
exit();
}

if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE oc SET ee='0', explosives='0-0-0-0-0', ee_ready='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");
echo "You left the oc";
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE oc SET ee_ready='Ready' WHERE id='$oc->id'");
echo "You are now ready for the the oc";
}

if (strip_tags($_POST['Buy'])){
if (strip_tags($_POST['pb'])){
$pb_amount=intval(strip_tags($_POST['pb']));
	
		if ($pb_amount == 0 || !$pb_amount || ereg('[^0-9]',$pb_amount)){
	print "You cant buy that amount.";
	
}elseif ($pb_amount != 0 && $pb_amount && !ereg('[^0-9]',$pb_amount)){
	
$new_explosives = $explosives[0]+$explosives[1]+$explosives[2]+$explosives[3]+$explosives[4]+$pb_amount;
if ($new_explosives > 5){
echo "You cannot buy more than 5 explosives!";
}elseif ($new_explosives <= 5){
$price= $pb_amount * 2000;
if ($price > $fetch->money){
echo "You dont have enough money";
}elseif ($price <= $fetch->money){

$a = $explosives[0]+$pb_amount;
$a = "$a-$explosives[1]-$explosives[2]-$explosives[3]-$explosives[4]";
mysql_query("UPDATE oc SET explosives='$a' WHERE id='$oc->id'");
$new_money=$fetch->money - $price;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");

echo "Explosives bought";
}}}}

if (strip_tags($_POST['gren'])){
$gren_amount=intval(strip_tags($_POST['gren']));
	
		if ($gren_amount == 0 || !$gren_amount || ereg('[^0-9]',$gren_amount)){
	print "You cant buy that amount.";
	
}elseif ($gren_amount != 0 && $gren_amount && !ereg('[^0-9]',$gren_amount)){
	
$new_explosives1 = $explosives[0]+$explosives[1]+$explosives[2]+$explosives[3]+$explosives[4]+$gren_amount;
if ($new_explosives1 > 5){
echo "You cannot buy more than 5 explosives!";
}elseif ($new_explosives1 <= 5){
$price1= $gren_amount * 4000;
if ($price1 > $fetch->money){
echo "You dont have enough money";
}elseif ($price1 <= $fetch->money){

$b = $explosives[1]+$gren_amount;
$b = "$explosives[0]-$b-$explosives[2]-$explosives[3]-$explosives[4]";
mysql_query("UPDATE oc SET explosives='$b' WHERE id='$oc->id'");
$new_money1=$fetch->money - $price1;
mysql_query("UPDATE users SET money='$new_money1' WHERE username='$username'");

echo "Explosives bought";
}}}}
if (strip_tags($_POST['dyn'])){
$dyn_amount=intval(strip_tags($_POST['dyn']));
	
		if ($dyn_amount == 0 || !$dyn_amount || ereg('[^0-9]',$dyn_amount)){
	print "You cant buy that amount.";
	
}elseif ($dyn_amount != 0 && $dyn_amount && !ereg('[^0-9]',$dyn_amount)){
	
$new_explosives2 = $explosives[0]+$explosives[1]+$explosives[2]+$explosives[3]+$explosives[4]+$dyn_amount;
if ($new_explosives2 > 5){
echo "You cannot buy more than 5 explosives!";
}elseif ($new_explosives2 <= 5){
$price2= $dyn_amount * 8000;
if ($price2 > $fetch->money){
echo "You dont have enough money";
}elseif ($price2 <= $fetch->money){

$c = $explosives[2]+$dyn_amount;
$c = "$explosives[0]-$explosives[1]-$c-$explosives[3]-$explosives[4]";
mysql_query("UPDATE oc SET explosives='$c' WHERE id='$oc->id'");
$new_money2=$fetch->money - $price2;
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$username'");

echo "Explosives bought";
}}}}
if (strip_tags($_POST['c4'])){
$c4_amount=intval(strip_tags($_POST['c4']));
	
		if ($c4_amount == 0 || !$c4_amount || ereg('[^0-9]',$c4_amount)){
	print "You cant buy that amount.";
	
}elseif ($c4_amount != 0 && $c4_amount && !ereg('[^0-9]',$c4_amount)){
	
$new_explosives3 = $explosives[0]+$explosives[1]+$explosives[2]+$explosives[3]+$explosives[4]+$c4_amount;
if ($new_explosives3 > 5){
echo "You cannot buy more than 5 explosives!";
}elseif ($new_explosives3 <= 5){
$price3= $c4_amount * 16000;
if ($price3 > $fetch->money){
echo "You dont have enough money";
}elseif ($price3 <= $fetch->money){

$d = $explosives[3]+$c4_amount;
$d = "$explosives[0]-$explosives[1]-$explosives[2]-$d-$explosives[4]";
mysql_query("UPDATE oc SET explosives='$d' WHERE id='$oc->id'");
$new_money3=$fetch->money - $price3;
mysql_query("UPDATE users SET money='$new_money3' WHERE username='$username'");

echo "Explosives bought";
}}}}

if (strip_tags($_POST['ura'])){
$ura_amount=intval(strip_tags($_POST['ura']));
	
		if ($ura_amount == 0 || !$ura_amount || ereg('[^0-9]',$ura_amount)){
	print "You cant buy that amount.";
	
}elseif ($ura_amount != 0 && $ura_amount && !ereg('[^0-9]',$ura_amount)){
	
$new_explosives4 = $explosives[0]+$explosives[1]+$explosives[2]+$explosives[3]+$explosives[4]+$ura_amount;
if ($new_explosives4 > 5){
echo "You cannot buy more than 5 explosives!";
}elseif ($new_explosives4 <= 5){
$price4= $ura_amount * 35000;
if ($price4 > $fetch->money){
echo "You dont have enough money";
}elseif ($price4 <= $fetch->money){

$e = $explosives[4]+$ura_amount;
$e = "$explosives[0]-$explosives[1]-$explosives[2]-$explosives[3]-$e";
mysql_query("UPDATE oc SET explosives='$e' WHERE id='$oc->id'");
$new_money4=$fetch->money - $price4;
mysql_query("UPDATE users SET money='$new_money4' WHERE username='$username'");

echo "Explosives bought";
}}}}


}

?><form action="" method=POST>
<table width="72%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class=header><center>
        Organised crime (OC) Position: Explosives expert 
      </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="3"><div align="center">Choose the explosives:</div></td>
        </tr>
        <tr> 
          <td colspan="3"><div align="center">You can buy up to 5 explosives in 
              total</div></td>
        </tr>
        <tr> 
          <td><div align="center">Amount:</div></td>
          <td><div align="center">Explosive</div></td>
          <td><div align="center">Price:</div></td>
        </tr>
        <tr> 
          <td width="31%"><input name="pb" type="text" id="pb" size="5"></td>
          <td width="36%">Grenades</td>
          <td width="33%">&pound;2,000</td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="gren" type="text" id="gren" size="5">
            </div></td>
          <td>Molotov Cocktails </td>
          <td>&pound;4,000</td>
        </tr>
        <tr> 
          <td><input name="dyn" type="text" id="dyn" size="5"></td>
          <td>Dynamite </td>
          <td>&pound;8,000</td>
        </tr>
        <tr> 
          <td><input name="c4" type="text" id="c4" size="5"></td>
          <td>C4 </td>
          <td>&pound;16,000</td>
        </tr>
        <tr> 
          <td><input name="ura" type="text" id="ura" size="5"></td>
          <td>TNT</td>
          <td>&pound;35,000</td>
        </tr>
        <tr> 
          <td><div align="right"> 
              <input name="Buy" type="submit" id="Buy" value="Buy the explosives">
            </div></td>
          <td colspan="2"> <div align="right"> 
              <input name="Ready" type="submit" id="Ready" value="I'm Ready">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<?

}
$oc=mysql_fetch_object(mysql_query("SELECT * FROM oc WHERE driver='$username'"));
if (strtolower($oc->driver) == strtolower($username)){
if ($fetch->location != $oc->location){
echo "You need to be in $oc->location for the oc to go down!";
exit();
}

if ($oc->driver_ready == "Ready"){ 
if (strip_tags($_GET['stop']) == "yes"){
echo "<br>You left the oc.";
mysql_query("UPDATE oc SET driver='0', driver_ready='0', car='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");

}

echo "You are Ready! <a href=?stop=yes>Leave the oc</a>(Will not be refunded)";
exit();
}

if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE oc SET driver='0', driver_ready='0', car='0' WHERE id='$oc->id'");
mysql_query("UPDATE users SET oc='0' WHERE username='$username'");
echo "You left the oc";
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE oc SET driver_ready='Ready' WHERE id='$oc->id'");
echo "You are now ready for the the oc";
}


if (strip_tags($_POST['car']) && strip_tags($_POST['buy'])){
$cars=intval(strip_tags($_POST['car']));
$check=mysql_query("SELECT * FROM garage WHERE id='$cars' AND owner='$username'");
$nums=mysql_num_rows($check);
$fetch_c=mysql_fetch_object($check); 
if ($nums == "0"){ echo "This is not your car."; }elseif($nums != "0"){
if ($fetch_c->status != "0"){ echo "This car is in use."; }elseif($fetch_c->status == "0"){

mysql_query("UPDATE oc SET car='$cars' WHERE id='$oc->id'");

echo "You're now using car ID# $cars'";
}}}
?>
<form action="" method=POST>
<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class=header><center>
        Organised crime </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td colspan="2"><div align="center">Organised crime (Position: Driver)</div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="43%"><div align="left">Your car: <br>(please enter the ID number in the field below the selection)</div></td>
          <td width="57%"><select size="1" name="car"><?php

  $gather = mysql_query("SELECT * FROM garage WHERE owner='$username' AND location='$fetch->location'");
  while($object=mysql_fetch_object($gather)){

  echo "<option value='$object->id'>$object->car ($object->id)): $object->damage% damage : $object->location</option><br>";
    }
                  ?>
  </select></td><br>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="buy" type="submit" id="update" value="Change"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>0
        <tr>
          <td><div align="right">
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><div align="left"><input name="Ready" type="submit" id="Ready" value="Ready"></div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?php















}



}





?>













