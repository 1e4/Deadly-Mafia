<?php
session_start();
include_once "db_connect.php";
include_once"functions.php";
logincheck();
$username=$_SESSION['username'];

echo '<Script language="javascript"> parent.topFrame.location.href = \'../mini.php\' </script>';

$check = mysql_query("SELECT * FROM jail WHERE username='$username'");
$joosters = mysql_fetch_object($check);
$checkifjailed = mysql_num_rows($check);
if ($checkifjailed > '0'){
$check1 = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch = mysql_fetch_object($check1);



$left = $joosters->time_left - time();
?>



<html>
<?php echo "$style"; ?>
<center>




<p align="center">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr> 
    <td><table width=70% border=1 align="center" cellpadding=0 cellspacing=0  class=thinline rules=none>
        <tr> 
          <td height='22' class=header><center>
              Your in jail! </center></td>
        </tr>
        <tr> 
          <td align=center><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr> 
                <td bgcolor="#666666"><div align="center">Try to make the best of it... </div></td>
              </tr>
              <tr> 
                <td><div align="center"><img width="340" height="268" src=images/Jail.jpg></div></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width=70% border=1 align="center" cellpadding=0 cellspacing=0  class=thinline rules=none>
        <tr>
          <td height='22' class=header><center>
              Other Players In Jail</center></td>
        </tr>
        <tr bgcolor=white>
          <td bgcolor="#666666"  class=tip><div align="center">Players In Jail In The Last 60 Seconds</div></td>
        </tr>
        <tr> 
          <td> <table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr> 
                <td> 
                  <? $query=mysql_query("SELECT * FROM jail WHERE location='$fetch->location'");
while($it = mysql_fetch_object($query)){


echo "<a href='profile.php?viewuser=$it->username'>$it->username</a>,";

}
?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<p align="center">
<p>

<p>
<?php exit; }  ?>





