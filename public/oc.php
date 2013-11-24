<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
$username = $_SESSION['username'];




if(($_GET['act'] == 'delete') ) //&&  ($usrstats['ocleader'] == 'Yes'))
{
    $sql = "SELECT * FROM users WHERE username= '$username'";
    $result = mysql_query($sql);
    $userstats = mysql_fetch_array($result);
    if( $userstats['ocleader'] == 'Yes' )
    {

        $ocid = $userstats['ocid'];
    	mysql_query("DELETE FROM oc WHERE id='$ocid'");
		mysql_query("DELETE FROM ocinvites WHERE ocid='$ocid'");
   		mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='0' WHERE ocid='$ocid'") ;
   		echo 'oc deleted';
    	echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
    	exit();
    }
}

if(($_GET['act'] == 'leave') ) //&&  ($usrstats['ocleader'] == 'Yes'))
{
    $sql = "SELECT u.*,o.* FROM users u, oc o WHERE u.username= '$username' AND u.ocid = o.id" ;
    $result = mysql_query($sql);
    $userstats = mysql_fetch_array($result);
    $username = $userstats['username'];
    $leader =  $userstats['leader'];
    $ocid = $userstats['ocid'];


    if($userstats['wexpert'] == $userstats['username'] )
    {
		mysql_query("UPDATE oc SET wexpert='', weapons='0-0-0-0', wready='Pending Invite' WHERE id='$ocid'");
		mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$username'");
		mysql_query("DELETE FROM ocinvites WHERE username='$username'");

   	}
   	if($userstats['eexpert'] == $userstats['username'] )
    {
		mysql_query("UPDATE oc SET eexpert='', explosives='0-0-0-0', eready='Pending Invite' WHERE id='$ocid'");
		mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$username'");
		mysql_query("DELETE FROM ocinvites WHERE username='$username'");

	}
    if($userstats['driver'] == $userstats['username'] )
    {

		mysql_query("UPDATE oc SET driver='', dready='Pending Invite' WHERE id='$ocid'");
		mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$username'");
		mysql_query("DELETE FROM ocinvites WHERE username='$username'");

	}

    $message="$username no longer wants to join the oc. He left your oc.";
	$senddate=gmdate('M dS Y H:i:s');
	mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
				VALUES ('', '$leader', '$leader', '$message', '$senddate', '0')") or die (mysql_error());

   	echo "You left the oc.";
   	echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}

?>

<head>
<link rel=stylesheet href=includes/test.css type=text/css>

</head>
<body>
<?
$usrstats = mysql_query("SELECT money, oc, octime, ocleader, location, ocpost, ocid, ocstatus, rank
						 FROM users
                         WHERE username='$username'");

while ($infoc = mysql_fetch_row($usrstats)) {
	$usrmoney = $infoc[0];
	$usroc = $infoc[1];
	$usroctime = $infoc[2];
	$usroclead = $infoc[3];
	$usrlocation = $infoc[4];
	$usrocpost = $infoc[5];
	$ooocid2 = $infoc[6];
	$oooocstatuss = $infoc[7];
	$usrrank = $infoc[8];

}
?>
<link rel=stylesheet href=includes/test.css type=text/css>


<?
//////sto them if there time is low


$timeee=time();
if($usroctime > $timeee){
echo "You need to wait ".maketime($usroctime)." untill you can oc!";
exit();
}
//////////create an oc
if($_POST['start'] && $_POST['type']){
if($usroc==1){
echo "Your already in an oc";
exit();
}
$octype=$_POST['type'];
if($octype==1){
$peecent="100|0|0|0";
}elseif($octype==2){
$peecent="25|25|25|25";
}elseif($octype==3){
$peecent=0;
}
if($usrmoney <150000){
echo "You need more money";
}elseif($usrmoney >= 150000){
mysql_query("INSERT INTO `oc` ( `id`,`leader`,`type`,`percentages`,`location`)
VALUES ('', '$username', '$octype', '$peecent', '$usrlocation')");
$id = mysql_insert_id();
mysql_query("UPDATE users SET money=money-150000, oc='1', ocleader='Yes', ocid='$id' WHERE username='$username'");
echo "OC Created";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}
/////////////if there the owner
if($usroclead==Yes && $usroc==1){
$ocsleader = mysql_query("SELECT type, percentages, leader, id, location, wexpert, eexpert, driver, weapons, explosives, wready, eready, dready, car, cardam FROM oc WHERE leader='$username'");
while ($ocleads = mysql_fetch_row($ocsleader)) {
	$octype = $ocleads[0];
	$ocpercent = $ocleads[1];
	$oclead = $ocleads[2];
	$ocid = $ocleads[3];
	$oclocation = $ocleads[4];
	$wexpert = $ocleads[5];
	$eexpert = $ocleads[6];
	$driver = $ocleads[7];
	$weapons = $ocleads[8];
	$explosives = $ocleads[9];
	$wready = $ocleads[10];
	$eready = $ocleads[11];
	$dready = $ocleads[12];
	$carusing = $ocleads[13];
	$cardamageuse = $ocleads[14];
}
if($username!=$oclead){
echo "Error. Please contact an admin";
exit();
}
if($usrlocation!=$oclocation){ ?><div align="center"><font color="#FFFFFF"><?
echo "You must be in $oclocation"; ?> </font></div><?
exit();
} 
//////////start leaders stuff
$weapons=explode("-", $weapons);
$explosives=explode("-", $explosives);
//////////set custom percentages
if($ocpercent==0){
$setthem=show;
if($_POST['setpercent']){
$leadper=strip_tags($_POST['leadper']);
$weaper=strip_tags($_POST['weaper']);
$expper=strip_tags($_POST['expper']);
$driper=strip_tags($_POST['driper']);
if(ereg("[^[:digit:]]", $leadper) || ereg("[^[:digit:]]", $weaper) || ereg("[^[:digit:]]", $expper) || ereg("[^[:digit:]]", $driper)){
echo "You can only enter numbers";
}else{
$added=$leadper+$weaper+$expper+$driper;
if($added!=100){
echo "All the percentages added together must equal 100";
}elseif($added==100){
$pecentages321= array($leadper, $weaper, $expper, $driper);
$newrates1=implode("|", $pecentages321);
mysql_query("UPDATE oc SET percentages='$newrates1' WHERE id='$ocid' AND leader='$username'");
echo "Percentages Set";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}
//////////end of change percent
//////rest of leaders panel
///show owners panel
if($ocpercent!=0){
$ownerspanel=show;
$showpercentages1=explode("|", $ocpercent);
//////////get info about the users in the oc
$stats1 = mysql_query("SELECT location FROM users WHERE username='$wexpert'");
while ($statss1 = mysql_fetch_row($stats1)) {
	$location1 = $statss1[0];
}
$stats2 = mysql_query("SELECT location FROM users WHERE username='$eexpert'");
while ($statss2 = mysql_fetch_row($stats2)) {
	$location2 = $statss2[0];
}
$stats3 = mysql_query("SELECT location FROM users WHERE username='$driver'");
while ($statss3 = mysql_fetch_row($stats3)) {
	$location3 = $statss3[0];
}
///////////invite
if($_POST['invite']){
$weinvite=strip_tags($_POST['invitewe']);
$eeinvite=strip_tags($_POST['inviteee']);
$driverinvite=strip_tags($_POST['invitedriver']);
///////////invite we
if($weinvite){
$weexist = mysql_result(mysql_query("SELECT COUNT(id) FROM users WHERE username='$weinvite'"),0);
if($weexist==0){
echo "That User Doesnt Exist<br>";
}else{
$westats = mysql_query("SELECT username, oc FROM users WHERE username='$weinvite'");
while ($weast = mysql_fetch_row($westats)) {
	$weusername = $weast[0];
	$weoc = $weast[1];
}
if($weusername==$username){
echo "You can not invite yourself to the oc<br>";
}else{
if($weoc==1){
echo "$weusername is already in an oc<br>";
}else{
$notinoc = mysql_query("SELECT eexpert, driver FROM oc WHERE leader='$username' AND id='$ocid'");
while ($ghfg321 = mysql_fetch_row($notinoc)) {
	$eeeexpert = $ghfg321[0];
	$ddddriver = $ghfg321[1];
}
if($weusername==$eeeexpert || $weusername==$ddddriver){
echo "$weusername is already in your oc<br>";
}else{
mysql_query("UPDATE oc SET wexpert='$weusername' WHERE id='$ocid' AND leader='$username'");
mysql_query("INSERT INTO `ocinvites` ( `id`,`username`,`ocid`,`posistion`, `octype`, `leader`, `location`)
VALUES ('', '$weusername', '$ocid', 'Weapons Expert', '$octype', '$username', '$usrlocation')");
////////send user a message
$message="You have been invited to $username\'s oc as the Weapons Expert.
The oc is going down in $oclocation.
You can accept the invite on the oc page";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$weusername', '$weusername', '$message', '$senddate', '0')") or die (mysql_error());
echo "$weusername has been invited as the Weapons Expert<br>";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}
////////////////invite ee
if($eeinvite!=$username && $eeinvite){
$eeexist = mysql_result(mysql_query("SELECT COUNT(id) FROM users WHERE username='$eeinvite'"),0);
if($eeexist==0){
echo "That User Doesnt Exist<br>";
}else{
$eestats = mysql_query("SELECT username, oc FROM users WHERE username='$eeinvite'");
while ($eeast = mysql_fetch_row($eestats)) {
	$eeusername = $eeast[0];
	$eeoc = $eeast[1];
}
if($eeusername==$username){
echo "You can not invite yourself to the oc<br>";
}else{
if($eeoc==1){
echo "$eeusername is already in an oc<br>";
}else{
$notinoc = mysql_query("SELECT wexpert, driver FROM oc WHERE leader='$username' AND id='$ocid'");
while ($ghfg321 = mysql_fetch_row($notinoc)) {
	$wwwwxpert = $ghfg321[0];
	$ddddriver = $ghfg321[1];
}
if($eeusername==$wwwwxpert || $eeusername==$ddddriver){
echo "$eeusername is already in your oc<br>";
}else{
mysql_query("UPDATE oc SET eexpert='$eeusername' WHERE id='$ocid' AND leader='$username'");
mysql_query("INSERT INTO `ocinvites` ( `id`,`username`,`ocid`,`posistion`, `octype`, `leader`, `location`)
VALUES ('', '$eeusername', '$ocid', 'Explosives Expert', '$octype', '$username', '$usrlocation')");
////////send user a message
$message="You have been invited to $username\'s oc as the Explosives Expert.
The oc is going down in $oclocation.
You can accept the invite on the oc page";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eeusername', '$eeusername', '$message', '$senddate', '0')") or die (mysql_error());
echo "$eeusername has been invited as the Explosives Expert<br>";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}
///////////////////invite driver
if($driverinvite!=$username && $driverinvite){
$driveeexist = mysql_result(mysql_query("SELECT COUNT(id) FROM users WHERE username='$driverinvite'"),0);
if($driveeexist==0){
echo "That User Doesnt Exist";
}else{
$drivestats = mysql_query("SELECT username, oc FROM users WHERE username='$driverinvite'");
while ($deast = mysql_fetch_row($drivestats)) {
	$driverusername = $deast[0];
	$deoc = $deast[1];
}
if($driverusername==$username){
echo "You can not invite yourself to the oc<br>";
}else{
if($deoc==1){
echo "$driverusername is already in an oc<br>";
}else{
$notinoc = mysql_query("SELECT wexpert, eexpert FROM oc WHERE leader='$username' AND id='$ocid'");
while ($ghfg321 = mysql_fetch_row($notinoc)) {
	$wwwwxpert = $ghfg321[0];
	$eeeeeexpert = $ghfg321[1];
}
if($driverusername==$wwwwxpert || $driverusername==$eeeeeexpert){
echo "$driverusername is already in your oc<br>";
}else{
mysql_query("UPDATE oc SET driver='$driverusername' WHERE id='$ocid' AND leader='$username'");
mysql_query("INSERT INTO `ocinvites` ( `id`,`username`,`ocid`,`posistion`, `octype`, `leader`, `location`)
VALUES ('', '$driverusername', '$ocid', 'Driver', '$octype', '$username', '$usrlocation')");
////////send user a message
$message="You have been invited to $username\'s oc as the Driver.
The oc is going down in $oclocation.
You can accept the invite on the oc page";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driverusername', '$driverusername', '$message', '$senddate', '0')") or die (mysql_error());
echo "$driverusername has been invited as the Driver<br>";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}
}///////////////end invite
}////////end
//////////////kick
if($_GET['kick']){
$kick=strip_tags($_GET['kick']);
if($kick==we){
mysql_query("UPDATE oc SET wexpert='', weapons='0-0-0-0', wready='Pending Invite' WHERE id='$ocid' AND leader='$username'");
mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$wexpert'");
mysql_query("DELETE FROM ocinvites WHERE username='$wexpert' AND leader='$username'");
$message="$username no longer wants you in there oc. The invertation has been cancelled.";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$wexpert', '$wexpert', '$message', '$senddate', '0')") or die (mysql_error());

echo "User has been kicked From Your OC";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}/////end kick we
elseif($kick==ee){
mysql_query("UPDATE oc SET eexpert='', explosives='0-0-0-0', eready='Pending Invite' WHERE id='$ocid' AND leader='$username'");
mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$eexpert'");
mysql_query("DELETE FROM ocinvites WHERE username='$eexpert' AND leader='$username'");
$message="$username no longer wants you in there oc. The invertation has been cancelled.";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eexpert', '$eexpert', '$message', '$senddate', '0')") or die (mysql_error());
echo "User has been kicked From Your OC";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}/////end kick ee
elseif($kick==driver){
mysql_query("UPDATE oc SET driver='', dready='Pending Invite' WHERE id='$ocid' AND leader='$username'");
mysql_query("UPDATE users SET oc='0', ocid='', ocpost='', ocstatus='Not Ready' WHERE username='$driver'");
mysql_query("DELETE FROM ocinvites WHERE username='$driver' AND leader='$username'");
$message="$username no longer wants you in there oc. The invertation has been cancelled.";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driver', '$driver', '$message', '$senddate', '0')") or die (mysql_error());
echo "User has been kicked From Your OC";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}/////end kick driver
}////end kick user from oc


///////do the oc
if($_POST['dooc']){
if($wready!=Ready || $eready!=Ready || $dready!=Ready || $location1!=$oclocation || $location2!=$oclocation || $location3!=$oclocation){
echo "Somebody isnt ready or is in the wrong location";
}elseif($wready==Ready && $eready==Ready && $dready==Ready && $location1==$oclocation && $location2==$oclocation && $location3==$oclocation){
$octime=time()+(3600*8);
/////////forumulae
//////////////////leaders rank points
if ($usrrank == "Scum"){
	$leadpoints = "1";
}
if ($usrrank == "Tramp"){
	$leadpoints = "2";
}
if ($usrrank == "Pickpocket"){
	$leadpoints = "3";
}
if ($usrrank == "Vandal"){
	$leadpoints = "4";
}
if ($usrrank == "Arsonist"){
	$leadpoints = "5";
}
if ($usrrank == "Don"){
	$leadpoints = "6";
}
if ($usrrank == "Assassin"){
	$leadpoints = "7";
}
if ($usrrank == "Boss"){
	$leadpoints = "8";
}
if ($usrrank == "Respectable Boss"){
	$leadpoints = "9";
}
if ($usrrank == "Godfather"){
	$leadpoints = "10";
}
if ($usrrank == "Headhunter"){
	$leadpoints = "11";
}
if ($usrrank == "Don"){
	$leadpoints = "12";
}
if ($usrrank == "Autocrat"){
	$leadpoints = "13";
}
if ($usrrank == "God"){
	$leadpoints = "14";
}
if ($usrrank == "Soldier"){
	$leadpoints = "15";
}
if ($usrrank == "Made Man"){
	$leadpoints = "16";
}
if ($usrrank == "Wiseguy"){
	$leadpoints = "17";
}
if ($usrrank == "Lieutenant"){
	$leadpoints = "18";
}
if ($usrrank == "Feared Headhunter"){
	$leadpoints = "19";
}
if ($usrrank == "Moderator"){
	$leadpoints = "20";
}
if ($usrrank == "Head Moderator"){
	$leadpoints = "21";
}
if ($usrrank == "Administrator"){
	$leadpoints = "22";
}
if ($usrrank == "Head Administrator"){
	$leadpoints = "23";
}
//////////////////////weapons expert rank
$weprank = @mysql_result(mysql_query("SELECT rank FROM users WHERE username = '$wexpert'"), 0);
if ($weprank == "Scum"){
	$weppoints = "1";
}
if ($weprank == "Tramp"){
	$weppoints = "2";
}
if ($weprank == "Pickpocket"){
	$weppoints = "3";
}
if ($weprank == "Vandal"){
	$weppoints = "4";
}
if ($weprank == "Arsonist"){
	$weppoints = "5";
}
if ($weprank == "Don"){
	$weppoints = "6";
}
if ($weprank == "Assassin"){
	$weppoints = "7";
}
if ($weprank == "Boss"){
	$weppoints = "8";
}
if ($weprank == "Respectable Boss"){
	$weppoints = "9";
}
if ($weprank == "Godfather"){
	$weppoints = "10";
}
if ($weprank == "Headhunter"){
	$weppoints = "11";
}
if ($weprank == "Don"){
	$weppoints = "12";
}
if ($weprank == "Autocrat"){
	$weppoints = "13";
}
if ($weprank == "God"){
	$weppoints = "14";
}

/////////////////explosives expert rank
$exprank = @mysql_result(mysql_query("SELECT rank FROM users WHERE username = '$eexpert'"), 0);
if ($exprank == "Scum"){
	$exppoints = "1";
}
if ($exprank == "Tramp"){
	$exppoints = "2";
}
if ($exprank == "Pickpocket"){
	$exppoints = "3";
}
if ($exprank == "Vandal"){
	$exppoints = "4";
}
if ($exprank == "Arsonist"){
	$exppoints = "5";
}
if ($exprank == "Don"){
	$exppoints = "6";
}
if ($exprank == "Assassin"){
	$exppoints = "7";
}
if ($exprank == "Boss"){
	$exppoints = "8";
}
if ($exprank == "Respectable Boss"){
	$exppoints = "9";
}
if ($exprank == "Godfather"){
	$exppoints = "10";
}
if ($exprank == "Headhunter"){
	$exppoints = "11";
}
if ($exprank == "Don"){
	$exppoints = "12";
}
if ($exprank == "Autocrat"){
	$exppoints = "13";
}
if ($exprank == "God"){
	$exppoints = "14";
}

//////////////drivers rank
$driverank = @mysql_result(mysql_query("SELECT rank FROM users WHERE username = '$driver'"), 0);
if ($driverank == "Scum"){
	$drivepoints = "1";
}
if ($driverank == "Tramp"){
	$drivepoints = "2";
}
if ($driverank == "Pickpocket"){
	$drivepoints = "3";
}
if ($driverank == "Vandal"){
	$drivepoints = "4";
}
if ($driverank == "Arsonist"){
	$drivepoints = "5";
}
if ($driverank == "Don"){
	$drivepoints = "6";
}
if ($driverank == "Assassin"){
	$drivepoints = "7";
}
if ($driverank == "Boss"){
	$drivepoints = "8";
}
if ($driverank == "Respectable Boss"){
	$drivepoints = "9";
}
if ($driverank == "Godfather"){
	$drivepoints = "10";
}
if ($driverank == "Headhunter"){
	$drivepoints = "11";
}
if ($driverank == "Don"){
	$drivepoints = "12";
}
if ($driverank == "Autocrat"){
	$drivepoints = "13";
}
if ($driverank == "God"){
	$drivepoints = "14";
}

///////////////////////weapons
if($weapons[0]!=0){
	$weaponpoints=2*$weapons[0];
	}
if($weapons[1]!=0){
	$weaponpoints=3*$weapons[1];
	}
if($weapons[2]!=0){
	$weaponpoints=4*$weapons[2];
	}
if($weapons[3]!=0){
	$weaponpoints=4*$weapons[3];
	}
///////////explosive points
if($explosives[0]!=0){
	$explodepoints=2*$explosives[0];
	}
if($explosives[1]!=0){
	$explodepoints=3*$explosives[1];
	}
if($explosives[2]!=0){
	$explodepoints=4*$explosives[2];
	}
if($explosives[3]!=0){
	$explodepoints=4*$explosives[3];
	}
//////////////
$carpoints=100-cardamageuse;
$addrand=rand(1,10);
$total=$leadpoints+$weppoints+$exppoints+$drivepoints+$carpoints+$weaponpoints+$explodepoints+$addrand;
////echo "$total";
////////end of formula
if($total >=100){
$winmoney=rand(300000,600000);
$winrank=rand(120,250);

$occtypee = @mysql_result(mysql_query("SELECT type FROM oc WHERE leader = '$username'"), 0);
if($occtypee==1){
//////////////////send messages to users
$message="Your oc was a success. You managed to steal £$winmoney.
$username was given all the money";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$wexpert', '$wexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eexpert', '$eexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driver', '$driver', '$message', '$senddate', '0')") or die (mysql_error());
///////////update users info
sqmyl_query("UPDATE users SET money=money+$winmoney, rankpoints=rankpoints+$winrank, oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$username'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$wexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$eexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$driver'");
}

elseif($occtypee==2){
$moneyeach=$winmoney/4;
$moneyeach=round($moneyeach);
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$moneyeach, rankpoints=rankpoints+170, octime='$octime' WHERE username='$username'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$moneyeach, rankpoints=rankpoints+150 , octime='$octime' WHERE username='$wexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$moneyeach, rankpoints=rankpoints+150 , octime='$octime' WHERE username='$eexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$moneyeach, rankpoints=rankpoints+150 , octime='$octime' WHERE username='$driver'");
/////send messages
$message="Your oc was a success. You managed to steal £$winmoney.
You made £$moneyeach";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$wexpert', '$wexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eexpert', '$eexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driver', '$driver', $message', '$senddate', '0')") or die (mysql_error());
}
elseif($occtypee==3){
$leadersmoney=$winmoney/100*$showpercentages1[0];
$wemoney=$winmoney/100*$showpercentages1[1];
$eesmoney=$winmoney/100*$showpercentages1[2];
$driversmoney=$winmoney/100*$showpercentages1[3];
$leadersmoney=round($leadersmoney);
$wemoney=round($wemoney);
$eesmoney=round($eesmoney);
$driversmoney=round($driversmoney);
//////////update users and send messages
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$leadersmoney, rankpoints=rankpoints+170, octime='$octime' WHERE username='$username'") or die (mysql_error());
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$wemoney, rankpoints=rankpoints+150, octime='$octime' WHERE username='$wexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$eesmoney, rankpoints=rankpoints+150, octime='$octime' WHERE username='$eexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', money=money+$driversmoney, rankpoints=rankpoints+150, octime='$octime' WHERE username='$driver'");
/////send messages
$wmessage="Your oc was a success. You managed to steal £$winmoney.
You made £$wemoney";
$emessage="Your oc was a success. You managed to steal £$winmoney.
You made £$eesmoney";
$dmessage="Your oc was a success. You managed to steal £$winmoney.
You made £$driversmoney";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$wexpert', '$wexpert', '$wmessage', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eexpert', '$eexpert', '$emessage', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driver', '$driver', '$dmessage', '$senddate', '0')") or die (mysql_error());
}
/////////$showpercentages1
echo "<center>The OC was a success!<br> You got away with £$winmoney";
$occcid = @mysql_result(mysql_query("SELECT id FROM oc WHERE leader = '$username'"), 0);
mysql_query("DELETE FROM oc WHERE id='$ooocid2'");
mysql_query("DELETE FROM ocinvites WHERE ocid='$ooocid2'");
exit();
}else{
echo "<center>The OC Failed";
$occcid = @mysql_result(mysql_query("SELECT id FROM oc WHERE leader = '$username'"), 0);
mysql_query("DELETE FROM oc WHERE id='$ooocid2'");
mysql_query("DELETE FROM ocinvites WHERE ocid='$ooocid2'");
////////send emssges
$message="The oc failed.";
$senddate=gmdate('M dS Y H:i:s');
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$wexpert', '$wexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$eexpert', '$eexpert', '$message', '$senddate', '0')") or die (mysql_error());
mysql_query("INSERT INTO `inbox` (`id` , `to` , `from` , `message` , `date` , `read`)
VALUES ('', '$driver', '$driver', '$message', '$senddate', '0')") or die (mysql_error());
$octime=time()+(3600*8);
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$username'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$wexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$eexpert'");
mysql_query("UPDATE users SET oc='0', ocleader='No', ocid='', ocpost='', ocstatus='Not Ready', octime='$octime' WHERE username='$driver'");
exit();
}}
}////////keep button of oc


}////keep at bottom of lead shit
/*
This part is or accepting and declining oc invites
*/
/////////////////accept invite
if($_GET['accept']){
$acceptid=strip_tags($_GET['accept']);
$aceptinv = mysql_query("SELECT username, ocid, posistion FROM ocinvites WHERE id='$acceptid'");
while ($acceptshit = mysql_fetch_row($aceptinv)) {
	$isityou = $acceptshit[0];
	$accetocid = $acceptshit[1];
	$acceptpost = $acceptshit[2];
	}
	if($isityou!=$username){
	echo "Error 132. Please cntact an admin with your error code";
	}elseif($isityou==$username){
	mysql_query("UPDATE users SET oc='1', ocid='$accetocid', ocpost='$acceptpost' WHERE username='$username'");
	if($acceptpost=="Weapons Expert"){
	mysql_query("UPDATE oc SET wready='Accepted Invite' WHERE wexpert='$username' AND id='$accetocid'");
	}elseif($acceptpost=="Explosives Expert"){
	mysql_query("UPDATE oc SET eready='Accepted Invite' WHERE eexpert='$username' AND id='$accetocid'");
	}elseif($acceptpost=="Driver"){
	mysql_query("UPDATE oc SET dready='Accepted Invite' WHERE driver='$username' AND id='$accetocid'");
	}
	mysql_query("DELETE FROM ocinvites WHERE id='$accetocid' AND username='$username'");
	echo "You have accepted the invite";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
	}
	}///end accept invite

/////////////////decline invite
	if($_GET['decline']){
$declineid=strip_tags($_GET['decline']);
$declineinv = mysql_query("SELECT username, ocid, posistion FROM ocinvites WHERE id='$declineid'");
while ($declineshit = mysql_fetch_row($declineinv)) {
	$isityou = $declineshit[0];
	$declineocid = $declineshit[1];
	$declinepostit = $declineshit[2];
	}
	if($isityou!=$username){
	echo "Error 132. Please cntact an admin with your error code";
	}elseif($isityou==$username){
	if($declinepostit=="Weapons Expert"){
	mysql_query("UPDATE oc SET wexpert='' WHERE wexpert='$username' AND id='$declineocid'");
	}elseif($declinepostit=="Explosives Expert"){
	mysql_query("UPDATE oc SET eexpert='' WHERE eexpert='$username' AND id='$declineocid'");
	}elseif($declinepostit=="Driver"){
	mysql_query("UPDATE oc SET driver='' WHERE driver='$username' AND id='$declineocid'");
	}
	mysql_query("DELETE FROM ocinvites WHERE id='$declineid' AND username='$username'");
	echo "You have declined the invite";
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
	}
	}///end invites invite

///////////////////////weapons expert control panel
if($usroc==1 && $usrocpost=='Weapons Expert'){
$usrocsh = mysql_query("SELECT location FROM oc WHERE id='$ooocid2' AND wexpert='$username'");
while ($occcinfo = mysql_fetch_row($usrocsh)) {
	$occlocate = $occcinfo[0];
}
if($occlocate!=$usrlocation){ ?><div align="center"><font color="#FFFFFF"><?
echo "You Must be in $occlocate"; ?></font></div><?
exit();
}
if($oooocstatuss!=Ready){
$weaponspanel=show;
if($_POST['buywea']){
$weaponselect=strip_tags($_POST['weaponselect']);
$weaamo=strip_tags($_POST['weaamo']);
if(!$weaponselect || !$weaamo){
echo "You must fill out all fields";
}else{
if(ereg("[^[:digit:]]", $weaamo)){
echo "Invalid Ammount";
}else{
if($weaamo > 4){
echo "You can not buy more then 4 weapons";
}elseif($weaamo <= 4){
if($weaponselect==1){
$price=1000*$weaamo;
$weaponss="$weaamo-0-0-0";
}
if($weaponselect==2){
$price=5000*$weaamo;
$weaponss="0-$weaamo-0-0";
}
if($weaponselect==3){
$price=10000*$weaamo;
$weaponss="0-0-$weaamo-0";
}
if($weaponselect==4){
$price=15000*$weaamo;
$weaponss="0-0-0-$weaamo";
}
if($usrmoney<$price){
echo "You need more money";
}elseif($usrmoney>=$price){
mysql_query("UPDATE oc SET weapons='$weaponss', wready='Ready' WHERE wexpert='$username' AND id='$ooocid2'");
mysql_query("UPDATE users SET money=money-$price, ocstatus='Ready' WHERE username='$username'");
echo "Weapons Bought";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}}
else{
echo "<font color=white>You are ready for the oc</font>";
} ?> <form method="post" action="oc.php?act=leave">
<div align="center">
<input name="leave" type="submit" id="dooc" value="Leave OC">
</div>
</form><?
}///////keep at end of weapons owner
///////////////////////explosives expert control panel
if($usroc==1 && $usrocpost=='Explosives Expert'){
$usrocsh = mysql_query("SELECT location FROM oc WHERE id='$ooocid2' AND eexpert='$username'");
while ($occcinfo = mysql_fetch_row($usrocsh)) {
	$occlocate = $occcinfo[0];
}
if($occlocate!=$usrlocation){
echo "You Must be in $occlocate";
exit();
}
if($oooocstatuss!=Ready){
$explodespanel=show;
if($_POST['buyexp']){
$weaponselect=strip_tags($_POST['weaponselect']);
$weaamo=strip_tags($_POST['weaamo']);
if(!$weaponselect || !$weaamo){
echo "You must fill out all fields";
}else{
if(ereg("[^[:digit:]]", $weaamo)){
echo "Invalid Ammount";
}else{
if($weaamo > 4){
echo "You can not buy more then 4 explosives";
}elseif($weaamo <= 4){
if($weaponselect==1){
$price=1000*$weaamo;
$weaponss="$weaamo-0-0-0";
}
if($weaponselect==2){
$price=5000*$weaamo;
$weaponss="0-$weaamo-0-0";
}
if($weaponselect==3){
$price=10000*$weaamo;
$weaponss="0-0-$weaamo-0";
}
if($weaponselect==4){
$price=15000*$weaamo;
$weaponss="0-0-0-$weaamo";
}
if($usrmoney<$price){
echo "You need more money";
}elseif($usrmoney>=$price){
mysql_query("UPDATE oc SET explosives='$weaponss', eready='Ready' WHERE eexpert='$username' AND id='$ooocid2'");
mysql_query("UPDATE users SET money=money-$price, ocstatus='Ready' WHERE username='$username'");
echo "Explosives Bought";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}}
else{
echo "You are reaady for the oc";
} ?> <form method="post" action="oc.php?act=leave">
<div align="center">
<input name="leave" type="submit" id="dooc" value="Leave OC" />
</div>
</form><?
}///////keep at end of explosives owner
/////////////driver control panel
if($usroc==1 && $usrocpost=='Driver'){
$usrocsh = mysql_query("SELECT location FROM oc WHERE id='$ooocid2' AND driver='$username'");
while ($occcinfo = mysql_fetch_row($usrocsh)) {
	$occlocate = $occcinfo[0];
}
if($occlocate!=$usrlocation){
echo "You Must be in $occlocate";
exit();
}
if($oooocstatuss!=Ready){
$driverpanel=show;
if($_POST['usecar']){
$cartouse=strip_tags($_POST['cars']);
if($cartouse==''){
echo "Error";
}else{
$carshit = mysql_query("SELECT owner, car, damage, location FROM garage WHERE id='$cartouse'");
while ($carrinfo = mysql_fetch_row($carshit)) {
	$carowner = $carrinfo[0];
	$carrtype = $carrinfo[1];
	$carrdam = $carrinfo[2];
	$carrlocate = $carrinfo[3];
}
if($carowner!=$username){
echo "This Is not your car";
}else{
if($carrlocate!=$usrlocation){
echo "This car must be in $occlocate";
}else{
mysql_query("UPDATE oc SET car='$carrtype', cardam='$carrdam', carid='$cartouse', dready='Ready' WHERE driver='$username' AND id='$ooocid2'");
mysql_query("UPDATE users SET ocstatus='Ready' WHERE username='$username'");
echo "You are now using that car";
echo "<meta http-equiv=\"refresh\" content=\"1;URL=oc.php\">";
}}}}}
else{
echo "You are reaady for the oc";
}?> <form method="post" action="oc.php?act=leave">
<div align="center">
<input name="leave" type="submit" id="dooc" value="Leave OC"/>
</div>
</form> <?
}//////////end of driver panel
?>
<link rel=stylesheet href=includes/test.css type=text/css>

<? if($usroc==0){ ?>
<link rel=stylesheet href=includes/test.css type=text/css>
<table width="45%" border="1" align="center" cellpadding="0" cellspacing="0" class="background" bordercolor=000000>
  <tr>
    <td background="includes/grad.jpg" class="header"><div align="center">Organised Crime </div></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center">Plan to rob the  bank in <?=$usrlocation?>.You will need to get together a team of 3 people. One to be a Weapons Expert, One to be a explosives expert and one to drive the get away vehicle.<br />
      <br />
    <span class="style1">Note: It will cost you &pound;150,000 to rent a safe house to plan your organised crime.</span></div></td>
  </tr>
</table>
<br> <form id="form1" name="form1" method="post" action="">
  <table width="39%" border="1" align="center" cellpadding="0" cellspacing="0" class="thinline" bordercolor=000000>
    <tr>
      <td colspan=3 background="includes/grad.jpg" class="header"><div align="center">Start A Organised Crime </div></td>
    </tr>
    <tr bgcolor="#999999" class="tip">
      <td class="background" colspan=3><div align="center">Plan to rob the bank <?=$location?>
      . It will cost you &pound;150,000 to rent a safe house to plan your organised crime. Please choose how you would like the money to be sorted if you are successful  with your organised crime. </div></td>
    </tr>
	<tr bgcolor="#999999"><td width="7%" class="background"><input name="type" type="radio" class="radioStyle" value="1" checked/></td>
	<td width="93%" class="background">Leader Gets All Money </td>
	<tr bgcolor="#999999"><td width="7%" class="background"><input name="type" type="radio" class="radioStyle" value="2" /></td>
		<td width="93%" class="background">Money is equaly split </td>
	<tr bgcolor="#999999"><td width="7%" class="background"><input name="type" type="radio" class="radioStyle" value="3" /></td>
			<td width="93%" class="background">Custom Percentages </td>
	</tr>
	<tr bgcolor="#999999">
	  <td colspan=2 class="background">
	    <div align="center">
	      <input name="start" type="submit" class="button" id="start" value="Start!!" />
    </div></td></tr>
  </table>  </form>
  <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
    <tr>
      <td colspan=6 background="includes/grad.jpg" class="header"><div align="center">Organised Crime Invertations </div></td>
    </tr>
    <tr class="background">
      <td colspan=6 bgcolor="#666666"><div align="center" class="style1">Below is a list of the organised crimes you are currently invited to! </div></td>
    </tr>
	   <tr class="top_ov_d_table">
      <td width="3%" bgcolor="#666666" class="tip style1">Id</td>
      <td width="18%" bgcolor="#666666" class="tip style1">Leader</td>
      <td width="16%" bgcolor="#666666" class="tip style1">Poistion</td>
      <td width="17%" bgcolor="#666666" class="tip style1">Location</td>
      <td width="25%" bgcolor="#666666" class="tip style1">Money Split </td>
      <td width="21%" bgcolor="#666666" class="tip style1">Action</td>
    </tr>
	<?
	$ocinvertations = mysql_query("select * from ocinvites WHERE username='$username' order by id asc");
$ocinvertationss=mysql_numrows($ocinvertations);
if($ocinvertationss=="0"){
echo "<tr><td colspan=8><Center>You Have No Invites!</td></tr>";
}
$i=0;
while ($i < $ocinvertationss) {
$occcinid=mysql_result($ocinvertations,$i,"id");
$occcid=mysql_result($ocinvertations,$i,"ocid");
$occcposistion=mysql_result($ocinvertations,$i,"posistion");
$occccctype=mysql_result($ocinvertations,$i,"octype");
$ooooocleader=mysql_result($ocinvertations,$i,"leader");
$ooooocccclocation=mysql_result($ocinvertations,$i,"location");
echo "<tr>
    <td bgcolor=666666>$occcinid</td>
	<td bgcolor=666666>$ooooocleader</td>
	<td bgcolor=666666>$occcposistion</td>
	<td bgcolor=666666>$ooooocccclocation</td>
		<td bgcolor=666666>"; if($occccctype==1){ echo "Leader Gets All Money"; }elseif($occccctype==2){ echo "Money wil be equaly split"; }elseif($occccctype==3){ echo "Custom Percentages"; }echo "</td>
			<td><a href=?accept=$occcinid>Accept</a> | <a href=?decline=$occcinid>Decline</a></td>

  </tr>";
  $i++;
}
?>
</table>
  <? }
	if($setthem==show){
	?>
</p><form id="form2" name="form2" method="post" action="">
<table width="45%" border="1" align="center" cellpadding="0" cellspacing="0" class="background" bordercolor="000000">
  <tr>
    <td colspan=2 background="includes/grad.jpg" class="header"><div align="center">Custom Percentages </div></td>
  </tr>
  <tr bgcolor="#999999">
    <td colspan=2 class="background"><div align="center">Please enter the percentages you want the money to be split into. <br />
            <br />
    <span class="style1">Note: All four together must add to 100. </span></div></td>
  </tr>
  <tr bgcolor="#999999">
    <td width="37%" class="background">Leader (You)</td>
    <td width="63%" class="background"><input name="leadper" type="text" size="5" />
    %</td>
  </tr>
  <tr bgcolor="#999999">
    <td width="37%" class="background">Weapons Expert </td>
    <td width="63%" class="background"><input name="weaper" type="text" size="5" />
    %</td>
  </tr>
  <tr bgcolor="#999999">
    <td width="37%" class="background">Explosives Expert </td>
    <td width="63%" class="background"><input name="expper" type="text" size="5" />
    %</td>
  </tr>
  <tr bgcolor="#999999">
    <td width="37%" class="background">Driver</td>
    <td width="63%" class="background"><input name="driper" type="text" size="5" />
    %</td>
  </tr>
  <tr bgcolor="#999999">
    <td colspan=2 class="background">
      <div align="center">
        <input name="setpercent" type="submit" class="button" id="setpercent" value="Set" />
      </div></td>
  </tr>
</table>

</form><br>
<? }
if($ownerspanel==show){
/////////////

?>
<table width="88%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
  <tr>
    <td colspan=7 background="includes/grad.jpg" class="header"><div align="center">Leader Control Panel </div></td>
  </tr>
  <tr class="top_ov_d_table">
    <td width="15%" bgcolor="999999" class="tip">Posistion</td>
    <td width="20%" bgcolor="999999" class="tip">Username</td>
    <td width="13%" bgcolor="999999" class="tip">Location</td>
    <td width="7%" bgcolor="999999" class="tip">%</td>
    <td width="31%" bgcolor="999999" class="tip">Equipment</td>
    <td width="14%" bgcolor="999999" class="tip">Status</td>
  </tr>
  <tr>
    <td bgcolor="999999" class="background">Leader (You) </td>
    <td bgcolor="999999" class="background"><?=$username?></td>
    <td bgcolor="999999" class="background"><?=$usrlocation?></td>
    <td bgcolor="999999" class="background"><?=$showpercentages1[0]?>%</td>
    <td bgcolor="999999" class="background">&nbsp;</td>
    <td bgcolor="999999" class="background">Ready</td>
  </tr>
  <tr>
    <td bgcolor="999999" class="background">Weapons Expert </td>
    <td bgcolor="999999" class="background">  <? if($wexpert==""){  echo "None"; }else{ echo "$wexpert"; }?>
      <? if($wexpert!=""){ ?>(<a href="?kick=we">kick</a>)<? } ?></td>
    <td bgcolor="999999" class="background"><?=$location1?></td>
    <td bgcolor="999999" class="background"><?=$showpercentages1[1]?>%</td>
    <td bgcolor="999999" class="background"><? if ($weapons[0]==0 && $weapons[1]==0 && $weapons[2]==0 && $weapons[3]==0){ echo "None"; }
	elseif($weapons[0]!=0){
	echo "$weapons[0]x BB Gun";
	}
		elseif($weapons[1]!=0){
	echo "$weapons[1]x Air Rifle";
	}
		elseif($weapons[2]!=0){
	echo "$weapons[2]x AK-47";
	}
		elseif($weapons[3]!=0){
	echo "$weapons[3]x Rocket Launcher";
	}

	?></td>
    <td bgcolor="999999" class="background"><? if ($wexpert!=""){ echo "$wready"; }else{ echo "&nbsp;"; }?></td>
  </tr>
  <tr>
    <td bgcolor="999999" class="background">Explosives Expert </td>
    <td bgcolor="999999" class="background"><? if($eexpert==""){  echo "None"; }else{ echo "$eexpert"; }?>
      <? if($eexpert!=""){ ?>
    (<a href="?kick=ee">kick</a>)
    <? } ?></td>
    <td bgcolor="999999" class="background"><?=$location2?></td>
    <td bgcolor="999999" class="background"><?=$showpercentages1[2]?>%</td>
    <td bgcolor="999999" class="background"><? if ($explosives[0]==0 && $explosives[1]==0 && $explosives[2]==0 && $explosives[3]==0){ echo "None"; }
	elseif($explosives[0]!=0){
	echo "$explosives[0]x Cherry Bomb";
	}
		elseif($explosives[1]!=0){
	echo "$explosives[1]x Grenade";
	}
		elseif($explosives[2]!=0){
	echo "$explosives[2]x TNT";
	}
		elseif($explosives[3]!=0){
	echo "$weapons[3]x C4";
	}

	?></td>
    <td bgcolor="999999" class="background"><? if ($eexpert!=""){ echo "$eready"; }else{ echo "&nbsp;"; }?></td>
  </tr>
  <tr>
    <td bgcolor="999999" class="background">Driver</td>
    <td bgcolor="999999" class="background"><? if($driver==""){  echo "None"; }else{ echo "$driver"; }?>
      <? if($driver!=""){ ?>
    (<a href="?kick=driver">kick</a>)
    <? } ?></td>
    <td bgcolor="999999" class="background"><?=$location3?></td>
    <td bgcolor="999999" class="background"><?=$showpercentages1[3]?>%</td>
    <td bgcolor="999999" class="background"><? if ($dready!="Ready"){ echo "None"; }else{ echo "$carusing, $cardamageuse% Damage"; }?></td>
    <td bgcolor="999999" class="background"><? if ($driver!=""){ echo "$dready"; }else{ echo "&nbsp;"; }?></td>
  </tr>
</table>
<br />
<form method="post" action="oc.php?act=delete">
  <div align="center">
    <input name="delete" type="submit" id="dooc" value="Delete OC" />
  </div>
</form>

<? if($wready==Ready && $eready==Ready && $dready==Ready && $location1==$oclocation && $location2==$oclocation && $location3==$oclocation){ ?>
<form id="form4" name="form4" method="post" action="">
  <div align="center">
    <input name="dooc" type="submit" id="dooc" value="Do The OC!" />
  </div>
</form>

<? } ?>
<br />

 <? if($wexpert=="" || $eexpert=="" || $driver==""){ ?>
<form id="form3" name="form3" method="post" action="">
<table width="42%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
  <tr>
    <td colspan=2 background="includes/grad.jpg" class="header"><div align="center">Invite Users </div></td>
  </tr>
    <tr bgcolor="#999999">
    <td colspan=2 class="top_ov_d_table"><div align="center">Only fill out the boxes next to te posistions you want to invite peole to. </div></td>

  </tr>
  <tr bgcolor="#999999">
    <td width="50%" class="top_ov_d_table"><div align="center">Posistion</div></td>
    <td width="50%" class="top_ov_d_table"><div align="center">Username</div></td>
  </tr>
  <? if($wexpert==""){ ?>
  <tr bgcolor="#999999">
    <td class="background"><div align="center">Weapons Expert </div></td>
    <td class="background"><div align="center">
      <input type="text" name="invitewe" />
    </div></td>
  </tr>
  <? }?>
    <? if($eexpert==""){ ?>
  <tr bgcolor="#999999">
    <td class="background"><div align="center">Explosives Expert </div></td>
    <td class="background"><div align="center">
      <input type="text" name="inviteee" />
    </div></td>
  </tr>
    <? }?>
    <? if($driver==""){ ?>
  <tr bgcolor="#999999">
    <td class="background"><div align="center">Driver</div></td>
    <td class="background"><div align="center">
      <input type="text" name="invitedriver" />
    </div></td>
  </tr><? }?>
   <? if($wexpert=="" || $eexpert=="" || $driver==""){ ?>
  <tr bgcolor="#999999"><td colspan=2 class="background"><div align="center">
    <input name="invite" type="submit" class="button" id="invite" value="Invite" />
  </div></td></tr><? } ?>
</table>
</form>

  <? } ?>
  <? } ?>
<br>
<? if($weaponspanel==show){ ?>
<form id="form5" name="form5" method="post" action="">
<table width="48%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
  <tr>
    <td colspan="2" background="includes/grad.jpg" class="header"><div align="center">Weapons Expert Control Panel </div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#999999" class="tip"><div align="center" class="top_ov_d_table">Please choose a weapon to buy. You can buy a maximum of 4 weapons. After you have bought the weapons you will be ready for the oc. </div></td>
  </tr>

  <tr>
    <td width="50%" bgcolor="#999999" class="background">
      <center>
      <input name="weaponselect" type="radio" class="radioStyle" id="1" value="1" checked/>
    <label for="1"> BB Gun (&pound;1,000 Each)    </label></td>
  </tr>

  <tr>
    <td bgcolor="#999999" class="background">
      <center>
      <input name="weaponselect" type="radio" class="radioStyle" id="2" value="2" />
    <label for="2">Air Rifle (&pound;5,000 Each) </label></td>
  </tr>

  <tr>
    <td bgcolor="#999999" class="background">
     <center>
     <input name="weaponselect" type="radio" class="radioStyle" id="3" value="3" />
    <label for="3">AK-47 (&pound;10,000 Each) </label></td>
    </tr>
	  <tr>
    <td bgcolor="#999999" class="background">
      <center>
      <input name="weaponselect" type="radio" class="radioStyle" id="4" value="4" />
  <label for="4">  Rocket Launcher (&pound;15,000 each) </label></td>
    </tr>
<tr><td bgcolor="#999999" class="background"><div align="center">
  Amount To Buy (Max is 4)
        <input name="weaamo" type="text" id="weaamo" size="4" maxlength="1" />
</div></td></tr>
  <tr>
    <td colspan="2" bgcolor="#999999" class="background"><div align="center">
      <input name="buywea" type="submit" id="buywea" value="BUY!" />
    </div></td>
  </tr>
</table>

</form>
<? } ?>
<? if($explodespanel==show){ ?>
<form id="form5" name="form5" method="post" action="">
  <table width="32%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
    <tr>
      <td colspan="2" background="includes/grad.jpg" class="header"><div align="center">Explosives Expert Control Panel </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#999999" class="tip"><div align="center" class="top_ov_d_table">Please choose a explosive to buy. You can buy a maximum of 4 explosives. After you have bought the explosives you will be ready for the oc. </div></td>
    </tr>
    <tr>
      <td width="50%" bgcolor="#999999" class="background"><center>
          <input name="weaponselect" type="radio" class="radioStyle" id="radio" value="1" checked="checked"/>
      <label for="radio"> Cherry Bomb(&pound;1,000 Each) </label></td>
    </tr>
    <tr>
      <td bgcolor="#999999" class="background"><center>
          <input name="weaponselect" type="radio" class="radioStyle" id="radio2" value="2" />
 Grenade
 <label for="radio2"> (&pound;5,000 Each) </label></td>
    </tr>
    <tr>
      <td bgcolor="#999999" class="background"><center>
          <input name="weaponselect" type="radio" class="radioStyle" id="radio3" value="3" />
 TNT
 <label for="radio3"> (&pound;10,000 Each) </label></td>
    </tr>
    <tr>
      <td bgcolor="#999999" class="background"><center>
          <input name="weaponselect" type="radio" class="radioStyle" id="radio4" value="4" />
      <label for="radio4"> C4 (&pound;15,000 each) </label></td>
    </tr>
    <tr>
      <td bgcolor="#999999" class="background"><div align="center"> Amount To Buy (Max is 4)
        <input name="weaamo" type="text" id="weaamo" size="4" maxlength="1" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#999999" class="background"><div align="center">
        <input name="buyexp" type="submit" class="button" id="buyexp" value="BUY!" />
      </div></td>
    </tr>
  </table>
</form>
<p>
  <? } ?>
  <? if($driverpanel==show){ ?>
</p>
<form id="form6" name="form6" method="post" action="">
  <table width="32%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class="thinline">
    <tr>
      <td colspan="2" background="includes/grad.jpg" class="header"><div align="center">Driver Control Panel </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#999999" class="tip"><div align="center" class="top_ov_d_table">Please choose a car to use in the oc. After you have chosen a car you will be ready for the oc. <br />
      <font color=red>Note: You will not get this car back</font></div></td>
    </tr>

    <tr>
      <td width="50%" bgcolor="#999999" class="background"><div align="center">
        <select name="cars" id="cars">
          <?
		  $usrocsh = mysql_query("SELECT location FROM oc WHERE id='$ooocid2' AND driver='$username'");
while ($occcinfo = mysql_fetch_row($usrocsh)) {
	$occlocate = $occcinfo[0];
	}
  $garage = mysql_query("select * from garage WHERE owner='$username' AND location='$occlocate' order by damage asc");
$garages=mysql_num_rows($garage);
if($garages=="0"){
echo "<option>You Have No cars In $usrlocation</option>";
}
$i=0;
while ($i < $garages) {

$carid=mysql_result($garage,$i,"id");
$cartype=mysql_result($garage,$i,"car");
$cardamage=mysql_result($garage,$i,"damage");
echo "
        <option value=\"$carid\">$cartype, $cardamage% Damage</option>";

		$i++;
}
?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td bgcolor="#999999" class="background"><div align="center">
        <input name="usecar" type="submit" class="button" id="usecar" value="Use!" <? if($garages=="0"){ echo "disabled"; } ?>/>
      </div></td>
    </tr>
  </table>
</form>


<p>
  <? } if( $weaponspanel==show || $driverpanel==show || $explodespanel==show){ ?>
</p>
<form method="post" action="oc.php?act=leave">
  <div align="center">
    <input name="leave" type="submit" id="dooc" value="Leave OC" />
  </div>
</form>
<? } ?>
</body>
<?  include 'includes/footer.php'; ?>