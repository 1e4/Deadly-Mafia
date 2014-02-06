<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */
session_start();
error_reporting(E_ALL);

include_once "includes/db_connect.php";

include_once "config/game.config.php";
include_once "config/userlevel.config.php";
include_once "config/rank.config.php";

function logincheck()
{

    if(GameConfig::hasLoginSessions() === false)
    {
        header('Location: index.php');
    }

    return true;
}

logincheck();
$query = $db->prepare("SELECT * FROM users_master
                LEFT JOIN
                users ON users_master.id = users.masterid
                LEFT JOIN
                users_timers ON users.id = users_timers.userid
                LEFT JOIN
                user_stats ON users.id = user_stats.id
                WHERE users.id = :userid LIMIT 1");

$query->execute(array(':userid'=>GameConfig::getUserID()));

$user = $query->fetchObject();

//Include the stylesheets needed
$style = '<link href="includes/in.css" rel="stylesheet" type="text/css"><link href="includes/test.css" rel="stylesheet" type="text/css">';

function id2location($location)
{
    switch($location)
    {
        case 1:
            return 'London';
        break;
        default:
            return 'London';
    }
}

function id2rank($rank)
{
    switch($rank)
    {
        case 1:
            return 'Scum';
        break;
        default:
            return 'Scum';
    }
}



/**
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);
$don=mysql_num_rows(mysql_query("SELECT * FROM donaters WHERE username='$username'"));



$date = gmdate('Y-m-d h:i:s');

if ($info->health <= "0"){
mysql_query("UPDATE users SET status='Dead' WHERE username='$username'");
session_destroy();
}
if ($info->status == "Dead" || $info->status == "Banned"){
session_destroy();
echo "You Have Been Killed!";
exit();
}

$crew_check =mysql_query("SELECT * FROM crews");
while($k = mysql_fetch_object($crew_check)){
$user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$k->owner'"));
$rhm=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$k->rhm'"));
if ($user->status == "Dead" || $user->status == "Banned"){
if ($k->rhm != "0" && $rhm->status == "Alive"){
mysql_query("UPDATE crews SET owner='$k->rhm', rhm='0' WHERE name='$k->name'"); 

}
elseif ($k->rhm == "0" || $rhm->status == "Dead" || $rhm->status == "Banned"){

mysql_query("UPDATE `users` SET `crew`='1' WHERE `crew`='$k->name'");
mysql_query("DELETE FROM crews WHERE name='$k->name'");

}
}
}
$bba=mysql_query("SELECT * FROM bank");
while($nana =mysql_fetch_object($bba)){
$ppl=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$nana->owner'"));
if ($ppl->status == "Dead" || $ppl->status == "Banned"){
mysql_query("UPDATE bank SET owner='0' WHERE id='$nana->id'");
}

}




$oc_query=mysql_query("SELECT * FROM oc");
while($ttfn = mysql_fetch_object($oc_query)){
$user_oc=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$ttfn->leader'"));

if ($user_oc->status == "Dead" || $user_oc->status == "Banned"){
mysql_query("UPDATE users SET oc='0' WHERE username='$ttfn->we'");
mysql_query("UPDATE users SET oc='0' WHERE username='$ttfn->ee'");
mysql_query("UPDATE users SET oc='0' WHERE username='$ttfn->driver'");
mysql_query("UPDATE users SET oc='0' WHERE username='$ttfn->leader'");
mysql_query("DELETE FROM oc WHERE id='$ttfn->id'");

}}


function logincheck(){


if (empty($_SESSION['username'])){
echo "
<SCRIPT LANGUAGE='JavaScript'>
window.location='index.php';

</script>
";
exit();
}}

////UPDATE ONLINE
$time = time() + (60 * 10);
mysql_query("UPDATE users SET online='$time' WHERE username='$username'");
///FINSH UPDATING ONLINE

function makecomma($input)
{
  
   if(strlen($input)<=3)
   { return $input; }
   $length=substr($input,0,strlen($input)-3);
   $formatted_input = makecomma($length).",".substr($input,-3);
   return $formatted_input;
}

/////////NOW TO THE BB CODES ETC....







function rankcheck(){
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);
$date = gmdate('Y-m-d h:i:s');

if (($info->rank == "Scum") && ($info->rankpoints >= "200")){ $newrank="Tramp"; $done="1"; }

elseif (($info->rank == "Tramp") && ($info->rankpoints >= "400")){ $newrank="Chav"; $done="1"; }

elseif (($info->rank == "Chav") && ($info->rankpoints >= "800")){ $newrank="Vandal"; $done="1"; }

elseif (($info->rank == "Vandal") && ($info->rankpoints >= "1600")){ $newrank="Mobster"; $done="1"; }

elseif (($info->rank == "Mobster") && ($info->rankpoints >= "3000")){ $newrank="Hitman"; $done="1"; }


elseif (($info->rank == "Hitman") && ($info->rankpoints >= "5000")){ $newrank="Agent"; $done="1"; }

elseif (($info->rank == "Agent") && ($info->rankpoints >= "10000")){ $newrank="Boss"; $done="1"; }

elseif (($info->rank == "Boss") && ($info->rankpoints >= "20000")){ $newrank="Assassin"; $done="1"; }

elseif (($info->rank == "Assassin") && ($info->rankpoints >= "75000")){ $newrank="Godfather"; $done="1"; }

elseif (($info->rank == "Godfather") && ($info->rankpoints >= "233000")){ $newrank="Global Threat"; $done="1"; }

elseif (($info->rank == "Global Threat") && ($info->rankpoints >= "377000")){ $newrank="World Dominator"; $done="1"; }

elseif (($info->rank == "World Dominator") && ($info->rankpoints >= "610000")){ $newrank="Untouchable Godfather"; $done="1"; }

elseif (($info->rank == "Untouchable Godfather") && ($info->rankpoints >= "987000")){ $newrank="Legend"; $done="1"; }

elseif (($info->rank == "Legend") && ($info->rankpoints >= "1597000")){ $newrank="Official Bliss Godfather"; $done="1"; }
if (!$done){
$done="0";
}
if ($done == "1"){

mysql_query("UPDATE users SET rank='$newrank' WHERE username='$username'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'You have been promoted to $newrank Doing Well', '0', '0', '0'
)");

}}

rankcheck();///////HOUSTON WE HAVE JAIL CHECK!


$jail_check=mysql_query("SELECT * FROM jail");


while($monster=mysql_fetch_object($jail_check)){

if (time() > $monster->time_left){
mysql_query("DELETE FROM jail WHERE username='$monster->username'");
}}

function maketime($last){
$timenow = time();
			if($last>$timenow){
					$order = $last-$timenow;
						while($order >= 60){
							$order = $order-60;
							$ordermleft++;
						}
						while($ordermleft >= 60){
							$ordermleft = $ordermleft-60;
							$orderhleft++;
						}
						
						if($ordermleft == 0){
							$ordermleft = "";
						} else {
						$ordermleft = "$ordermleft Minutes";
						}
						if($orderhleft == 0){
							$orderhleft = "";
						} else {
						$orderhleft = "$orderhleft Hours";
						}	
return "$orderhleft $ordermleft $order Seconds";
}}

$most_online=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));
$timenow=time();
$now_online =mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$timenow'"));

if ($now_online > $most_online->online){

mysql_query("UPDATE site_stats SET online='$now_online' WHERE id='1'");
}



$drop =mysql_query("SELECT * FROM casinos");

while($tard=mysql_fetch_object($drop)){
$per = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$tard->owner'"));
if ($per->status == "Dead" || $per->status == "Banned"){
mysql_query("UPDATE casinos SET owner='0' WHERE casino='$tard->casino' AND owner='$tard->owner'");
}

}
$drop_bar =mysql_query("SELECT * FROM bar");

while($tard_bar=mysql_fetch_object($drop_bar)){
$per_bar = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$tard_bar->owner'"));
if ($per_bar->status == "Dead" || $per_bar->status == "Banned"){
mysql_query("UPDATE bar SET owner='0' WHERE owner='$tard_bar->owner'");
}

}
$drop_bf =mysql_query("SELECT * FROM bf");

while($tard_bf=mysql_fetch_object($drop_bf)){
$per_bf = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$tard_bf->owner'"));
if ($per_bf->status == "Dead" || $per_bf->status == "Banned"){
mysql_query("UPDATE bf SET owner='0' WHERE owner='$tard_bf->owner'");
}

}
if ($info->banktime <= time() && $info->bank > "0"){
$nmoney =  10 * $info->bank / 100;
$money_in = $info->bank + $nmoney;
$money_in= round($money_in); 
$recieve = $info->money + $money_in;

	mysql_query("UPDATE users SET money = '$recieve', bank='0', banktime='0' WHERE username='$username'");

}
$drop_und =mysql_query("SELECT * FROM shop");

while($tard_und=mysql_fetch_object($drop_und)){
$per_und = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$tard_und->owner'"));
if ($per_und->status == "Dead" || $per_und->status == "Banned"){
mysql_query("UPDATE shop SET owner='0' WHERE owner='$tard_und->owner'");
}

}
$user_info=mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$username'"));
if ($user_info->jail_able == "1" && $user_info->jail_untill <= time()){
mysql_query("UPDATE user_info SET jail_able='0' WHERE username='$username'");

}




$user_shit=mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$username'"));
if ($user_shit->last_respect < time() && $fetch->rank != "Tramp"){
if ($info->rank == "Paper Kid"){ $new_res="1"; }elseif($info->rank == "Theif"){  $new_res="2"; }elseif($info->rank == "Robber"){  $new_res="3"; }elseif($info->rank == "Gangster"){  $new_res="4";    }elseif($info->rank == "Associate"){  $new_res="5";   }elseif($info->rank == "Piciotto"){  $new_res="6";  }elseif($info->rank == "Made Man"){  $new_res="7";
}elseif($info->rank == "Capo"){  $new_res="8"; }elseif($info->rank == "Consigliere"){  $new_res="9"; }elseif($info->rank == "Underboss"){  $new_res="10"; }elseif($info->rank == "Druglord"){  $new_res="11"; }elseif($info->rank == "Godfather"){  $new_res="12"; }


$now=time() + (3600 * 24 * 7);
mysql_query("UPDATE user_info SET respect='$new_res', last_respect='$now' WHERE username='$username'"); 





}







?>
**/