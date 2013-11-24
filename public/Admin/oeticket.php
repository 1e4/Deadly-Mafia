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



if($fetch->helper == 1){



if($danswer){

	mysql_query("update ticket set answer='$danswer' where id=$ticket_id");

	mysql_query("UPDATE users SET hdo_stat=hdo_stat+1 WHERE username='$username'");

	print"Ticket #$ticket_id has been edited $danswer!<br>";

}else{

	print"You have to enter an answer!<br>";

}



if($del){

	mysql_query("DELETE FROM ticket WHERE id=$del");

	print"Ticket has been cleared!<br>";

}



if($clse){

	mysql_query("UPDATE ticket SET open=0 WHERE id=$clse");

	print"Ticket has been closed!<br>";

}



$select = mysql_query("SELECT * FROM ticket WHERE open='1'");

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

    <p align=right>Problem:</td>

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

    <td width=50%><a href=oeticket.php?dell_t=$i->id>Delete ticket!</a><Br>

    <a href=oeticket.php?clse=$i->id>Close ticket!</a></td>

</tr>

</table><hr>";

}



?>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<form method=POST action=oeticket.php>

<table class=thinline width=100%><tr><td colspan=2 background="includes/grad.jpg"><div align="center"><strong>Answer a Ticket</strong></div></td>

</tr>

  <tr>

    <td width=50%>

    <tr>

        <td width=50% align=right><strong>Ticket #id</strong>:</td>

        <td width=50%><input type=text class=submit name=ticket_id id=ticket_id size=48></td>

    </tr>

      <tr>

        <td width=50% align=right><p>HDOP's. Please remember to close a ticket after answering it otherwise it doesn't show up that 

		you've answered it on the statistics page!</p>



        <td width=50%><textarea rows=14 name=Danswer cols=48></textarea></td>

      </tr><tr><td>

    

  <p align=center><input class=submit type=submit value=Answer ticket name=Send>

  <input class=submit type=reset value=Reset name=Reset></p></td></tr></table>

</form>

              <a href="hdohospital.php" target="main">&gt; HDOP's Hospital</a><br />

<p>

  <?

}

 else{

echo "HDOP's Only!";

}

?>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

</p>

<p align="center">&nbsp;</p>

