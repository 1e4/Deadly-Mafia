<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$time=time();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$judge = rand(1,20);

$shizzle = rand(7,15);

$shizzle2 = $shizzle*123456;

if ($fetch->rank == "Tramp" || $fetch->rank == "Scum" || $fetch->rank == "Thug" || $fetch->rank == "Robber"){

print "You need to be Gangster + to play RR";

}else{

if($judge > 12){

mysql_query("UPDATE users SET money=money+$shizzle2 WHERE username='$username'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$username', 'Russian Roulette', 'You survived ".makecomma($d)." ', '$date', '0', '0', '')");


print "You survived. you made £".makecomma($shizzle2)."";

}else{

mysql_query("UPDATE users SET status='Dead' WHERE username='$username'");

print "You died!.";

$set=mysql_query("SELECT * FROM users WHERE userlevel='0' AND location='$fetch->location' LIMIT 2");

mysql_query("INSERT INTO `attempts` (`id`, `username`, `target`, `outcome`, `date`) VALUES ('', 'BOMB SQUAD', '$username', 'Dead', '$time')");


}
}


?>