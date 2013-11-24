<?

session_start();

include_once "db_connect.php";

include_once"functions.php";

logincheck();


if ($info->userlevel=='0'){

die("");

}



$date = gmdate('Y-m-d h:i:s');







$username=$_SESSION['username'];

$page="Admimautokill.php";

$kill_username=strip_tags($_POST['kill_username']);

if (strip_tags($_POST['kill_username'])){

mysql_query("UPDATE users SET userlevel='3' WHERE username='$kill_username'");

///



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', 'CubZ', '$username', '$username Made $kill_username a Forum MOD ', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', '1703', '$username', '$username Made $kill_username a Forum MOD ', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', 'CrookyJ', '$username', '$username Made $kill_username a Forum MOD', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', '$kill_username', '$username', '$username Made You a Forum MOD! ', '$date', '0', '0', '')");





///

echo "$kill_username Is Now a Forum MOD!";

}

?>



<link href="includes/in.css" rel="stylesheet" type="text/css">





<form name="form1" method="post" action="">

  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">

    <tr>

      <td>

<table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>

          <tr>

            <td colspan="2" background="includes/grad.jpg"><center>



                Forum MOD a User </center></td>

          </tr>

          <tr>

            <td width="50%">Username:</td>

            <td width="50%"><input name="kill_username" type="text" id="kill_username3"></td>

          </tr>

           <tr>

            <td>&nbsp;</td>

            <td><input name="kill_button" type="submit" id="kill_button3" value="Submit"></td>

          </tr>

        </table></td>

    </tr>

