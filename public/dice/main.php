<?

include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;
$todopost=$_POST['todo'];
$to_do_del=$_GET['delete'];
if($userlevel > "0"){

if(!$todopost){

}else{
mysql_query("INSERT INTO `to_do` ( `id` , `by` , `todo` , `done`) 
VALUES ('', '$username', '$todopost', '0')")or die(mysql_error());
print "To Do Added";
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=main.php\">";
}

if(!$to_do_del){

}else{
mysql_query("UPDATE to_do SET done='1' WHERE id='$to_do_del'");
}

$select = mysql_query("SELECT * FROM users WHERE online > '$timenow' ORDER by rank DESC");
$num = mysql_num_rows($select);

$to_do=mysql_query("SELECT * FROM to_do WHERE done='0' ORDER by id ASC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #999999;
}
.maintext {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 12px;
	font-style: normal;
	font-weight: lighter;
	font-variant: normal;
	color: #990000;
}
.tabletext {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-style: normal;
	line-height: normal;
	font-weight: lighter;
	color: #990000;
}
.tableinner {
	font-size: 10px;
	font-weight: lighter;
	color: #000000;
}
-->
</style>
</head>

<body>
<p class="maintext">Welcome to the mafia mod and admin PwNaGe AreA :) </p>
<p class="maintext">Users Online: <? print"$num"; ?></p>
<table width="622" border="1" bordercolor="#990000">
  <tr>
    <td width="352"><div align="center" class="tabletext">To Do </div></td>
    <td width="124" class="tabletext">Written By </td>
    <td width="124"><div align="center" class="tabletext">Done</div></td>
  </tr>
 <? while($object = mysql_fetch_object($to_do)){ ?>
  <tr>
    <td height="22" class="tabletext"><? print"$object->todo"; ?></td>
    <td class="tabletext"><? print"$object->by"; ?></td>
    <td class="tabletext"><a href="?delete=<? print"$object->id"; ?>">Done</a></td>
  </tr>
  <? } ?>
</table>
<form method="post" action="">
  <div align="center"><span class="maintext">New To Do: </span><br>
    <textarea name="todo" cols="80" rows="8" id="todo"></textarea>
    <br>
    <input type="submit" value="Add Item">
    </center>
  </div>
</form>
<p class="maintext">&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
</body>
</html>
<? } ?>