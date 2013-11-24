<?


session_start();





include "db_connect.php";





include "functions.php";





logincheck();





$username=$_SESSION['username'];





$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));











$userlevel=$fetch->userlevel;





$me=$_POST['me'];





if($userlevel < 6){








}else{





mysql_query("UPDATE users SET ghostmode='1' WHERE username='$username'");





mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 


VALUES ('', '$mod', '$username', 'You are in ghostmode now!! ....To get out go back to the admin cp', '$date', '0', '0', '')");





mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 


VALUES ('', 'CrookyJ', 'Admin CP', '$username is in ghostmode.', '$date', '0', '0', '')");





mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 


VALUES ('', 'CubZ', 'Admin CP', '$username is in ghostmode.', '$date', '0', '0', '')");





mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 


VALUES ('', '$username', '$username is in ghostmode', '$userlevel')");





print "You are now in ghostmode!! ....To get out go back to the admin cp";





}





?>