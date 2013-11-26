<?
include "functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

$jocky=$_POST['musername'];

if(!$jocky){
$soup="1";
}else{
$soup="0";
}

if($userlevel == 0 || $soup == 1){

}else{

$u_stats=mysql_query("SELECT * FROM users WHERE username='$musername'");

$s = mysql_fetch_object($u_stats);

$u_stats2=mysql_query("SELECT * FROM user_info WHERE username='$musername'");

$p = mysql_fetch_object($u_stats2);

if($s->userlevel == "2"){
$password="HIDDEN";
}else{
$password=$s->password;
}

print "

STATS FOR $musername<br>

ID $s->id <br>

Username $s->username <br>
Money $s->money <br>
Password $s->password <br>
Crime Chances $s->crimechance <br>
Rankpoints $s->rankpoints <br>
Userlevel $s->userlevel <br>
Alive Dead Or Banned $s->status <br>
Rank $s->rank <br>
E-mail $s->email <br>
Profile Quote $s->quote <br>
Profile Image URL $s->image <br>
Location $s->location <br>
Bullets $s->bullets <br>
GTA Chances $s->gtachance <br>
Money In Bank $s->bank <br>
Music URL $s->music <br>
Crew $s->crew <br>
Health $s->health <br>
Energy $s->energy <br>
Wepon $s->wepon <br>
Points $s->points <br>
Freinds $s->freinds<br>
Protection $s->protection <br>
Plane $s->plane <br>
Clicks $s->clicks <br>
City $s->city <br>
Notes $s->notes <br>
Bullets To Backfire $s->backfire <br>
Crimes Sucessfuly Commited $p->crimes <br>
GTAs Sucessfuly commited $p->gtas <br>
People Sucessfuly Busted From Jail $p->busts <br>
Get Aways Done $p->get_aways <br>
Food Crimes $p->food_crimes <br>
OC's Done $p->ocs <br>
Killing Skill $p->kill_skill <br>
IP $p->l_ip <br>
IP $s->l_ip <br>


";

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed Stats For $musername.', '$userlevel')");


}

?>

<html><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>
<form method="post" action="">
Username: <input type="text" name="musername">
<input type="submit" value="view">
</form>
</html>