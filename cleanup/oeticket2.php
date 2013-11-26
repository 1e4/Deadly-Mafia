<?php 
include "includes/db_connect.php";
include "includes/functions.php";
echo "$style";
logincheck();
$username = $_SESSION['username'];
$del = strip_tags($_GET[dell_t]);
$clse = strip_tags($_GET[clse]);
$danswer = strip_tags($_POST[Danswer]);

?>
<SCRIPT>
<!--
function click(Item) {
document.getElementById('ticket_id').value = Item;
}
//-->
</SCRIPT>
<?php

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($fetch->userlevel > 0){

if($danswer){
	mysql_query("update ticket2 set answer='$danswer' where id=$ticket_id");
	
	print"Request #$ticket_id has been edited NOW CLOSE IT!!<br>";
}else{
	print"You have to enter an answer!<br>";
}

if($del){
	mysql_query("DELETE FROM ticket2 WHERE id=$del");
	print"Request has been cleared!<br>";
}

if($clse){
	mysql_query("UPDATE ticket2 SET open=0 WHERE id=$clse");
	print"Request has been closed!<br>";
}

$select = mysql_query("SELECT * FROM ticket2 WHERE open='1'");
while ($i = mysql_fetch_object($select)){

print "
<table class=thinline width=70%>
  <tr>
    <td width=50%>
    <p align=right>Ticket id:</td>
    <td width=50%><a onclick=click($i->id); href=oeticket.php#>$i->id</a></td>
  </tr>
  <tr>
    <td width=50%>
    <p align=right>User</td>
    <td width=50%>$i->user ($i->started)</td>
  </tr>
  <tr>
    <td width=50%>
    <p align=right>Title:</td>
    <td width=50%>$i->title</td>
  </tr>
  <tr>
    <td width=50%>
    <p align=right>Code:</td>
    <td width=50%>$i->description</td>
  </tr>
    <tr>
    <td width=50%>
    <p align=right>Answer:</td>
    <td width=50%>$i->answer</td>
  </tr>
    </tr>
    <tr>
    <td width=50%>
    <p align=right>Options:</td>
    <td width=50%><a href=oeticket2.php?dell_t=$i->id>Delete ticket!</a><Br>
    <a href=oeticket2.php?clse=$i->id>Close ticket!</a></td>
</tr>
</table><hr>";
}

?>

<form method=POST action=oeticket.php>
<table class=thinline width=100%><tr><td colspan=2 class=header><div align="center"><strong>Code Verification </strong></div></td>
</tr>
  <tr>
    <td width=50%>
    <tr>
        <td width=50% align=right><strong>Username/claim type </strong>:</td>
        <td width=50%>&nbsp;</td>
    </tr>
      <tr>
        <td width=50% align=right><p>Before you award points ensure that the code is valid.</p>
          <p>To do this go to</p>
          <p><a href="http://www.hotmail.com">www.hotmail.com</a></p>
          <p>and then log in as</p>
          <p>themafiaverification@hotmail.co.uk </p>
          <p>password: dietcoke24element </p>
          <p>Check any newish emails to see if the code is there</p>
          <p><strong>Then delete the ticket for a request! otherwise another mod may award more points! </strong></p>
          <p>&nbsp; </p></td>
        <td width=50%>&nbsp;</td>
      </tr><tr><td>
    
  <p align=center><input class=submit type=submit value=Answer ticket name=Send>
  <input class=submit type=reset value=Reset name=Reset></p></td></tr></table>
</form>
<p>
  <?
}
 else{
echo "Error";
}
?>
</p>
<p align="center">&nbsp;</p>
