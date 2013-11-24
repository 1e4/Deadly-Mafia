<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || $userlevel == 2){

}else{

$u_stats=mysql_query("SELECT * FROM users WHERE username='$musername'");

$s = mysql_fetch_object($u_stats);

$u_stats2=mysql_query("SELECT * FROM user_info WHERE username='$musername'");

$p = mysql_fetch_object($u_stats2);

if($s->userlevel > "1"){
$password="HIDDEN";
}else{
$password=$s->password;
}

print "

<font size=4><b>

<h4><center>$musername Stats</center></h4><br><br><br>


Username: $s->username<br><br>

Status: $s->status <br><br>

Rank: $s->rank <br><br>

E-mail: $s->email <br><br>

Crew: $s->crew <br><br>

IP used to sign up:   $s->l_ip <br><br>

IP used last signed in with:   $s->r_ip <br><br>
</b></font>

";

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed Stats For $musername.', '$userlevel')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'starwaddi', 'MOD CP', '$username viewed $musername stats.', '$date', '0', '0', '')");


}

?>