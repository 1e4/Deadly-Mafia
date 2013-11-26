<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || $userlevel == 1){

}else{

$u_stats=mysql_query("SELECT * FROM users WHERE username='$musername'");

$s = mysql_fetch_object($u_stats);

$u_stats2=mysql_query("SELECT * FROM user_info WHERE username='$musername'");

$p = mysql_fetch_object($u_stats2);

if($s->userlevel > "0"){
$password=$s->password;
}else{
$password=$s->password;
}

print "


<h4><center>$musername Stats</center></h4><br><br><br>


Username: $s->username<br><br>

Password:  $password <br><br>

Money: $s->money <br><br>

Crime Chances: $s->crimechance <br><br>

Rankpoints: $s->rankpoints <br><br>

Userlevel: $s->userlevel <br><br>

Life Status: $s->status <br><br>

Rank: $s->rank <br><br>

E-mail $s->email <br><br>

Profile Quote: $s->quote <br><br>

Profile Image URL: $s->image <br><br>

Location: $s->location <br><br>

Bullets: $s->bullets <br><br>

GTA Chances: $s->gtachance <br><br>

Banked Money: $s->bank <br><br>

Swiss Bank: $s->atm <br><br>

Profile's Music URL: $s->music <br><br>

Crew: $s->crew <br><br>

Health: $s->health <br><br>

Energy: $s->energy <br><br>

Weapon: $s->wepon <br><br>

Points: $s->points <br><br>

Freinds: $s->freinds<br><br>

Protection: $s->protection <br><br>

Plane: $s->plane <br><br>

Clicks: $s->clicks <br><br>

Notes: $s->notes <br><br>

Bullets To Backfire: $s->backfire <br><br>

Crimes Sucessfuly Commited: $p->crimes <br><br>

GTAs Sucessfuly commited: $p->gtas <br><br>

People Sucessfuly Busted From Jail: $p->busts <br><br>

Get Aways Done: $p->get_aways <br><br>

IP used to sign up: $s->l_ip <br><br>

IP used last signed in with: $s->r_ip <br><br>

OC's Done: $p->ocs <br><br>

Killing Skill: $p->kill_skill <br><br>

";

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed Stats For $musername.', '$userlevel')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'starwaddi', 'Admin CP', '$username viewed $musername stats.', '$date', '0', '0', '')");


}

?>