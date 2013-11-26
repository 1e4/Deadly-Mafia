<?php

session_start();

include "includes/db_connect.php"; 

include "includes/functions.php";  

include"includes/smile.php";

logincheck();

$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");

$fetch=mysql_fetch_object($query);



?>



<html>

<head>



<title>.::Murder Mafia::.</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<table class=thinline width="80%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black>

  <tr>

    <td background="includes/grad.jpg"><center class=bold>

      News

    </center></td>

  </tr>



  <tr>

    <td>

	<?php $select_updates=mysql_query("SELECT * FROM updates ORDER BY id DESC");

	while($the=mysql_fetch_object($select_updates)){

	echo "<b>Date</b> : $the->time<br>";

	echo "<b>Added by</b> : <A href='profile.php?viewuser=$the->username'>$the->username</a><p>";

	echo "$the->update<p>";



echo "<hr><br>";

	}

	

	

	?>

	

	</td>

  </tr>

</table>

<br>

<br>

<?php if ($fetch->userlevel == "4"){ 

if (strip_tags($_POST['submit']) && (strip_tags($_POST['update'] != ""))){

$update=strip_tags($_POST['update']);

$date = gmdate('Y-m-d h:i:s');

mysql_query("INSERT INTO `updates` ( `id` , `username` , `time` , `update` ) 

VALUES (

'', '$username', '$date', '$update'

)");

echo "News added";

}





?>

<form name="form1" method="post" action="">

  <table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

    <tr> 

      <center>

    <td background="includes/grad.jpg"><strong>Add News </strong>

      </center></td>

    </tr>

    <tr> 

      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

          <tr> 

            <td colspan="2"><div align="center"></div></td>

          </tr>

          <tr> 

            <td colspan="2"> <div align="center"> 

                <textarea name="update" cols="80" rows="5" id="update"></textarea>

              </div></td>

          </tr>

          <tr> 

            <td width="86%">&nbsp;</td>

            <td width="14%"><input name="submit" type="submit" id="submit" value="Add news"></td>

          </tr>

        </table></td>

    </tr>

  </table>

</form>

<? } ?><p>

<?php include_once"includes/footer.php"; ?>





</body>

</html>

