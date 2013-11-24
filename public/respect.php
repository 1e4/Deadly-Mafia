<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username']; ?><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
  <!--DWLayoutTable-->
  <tr background="aaaaaaa1.bmp">
    <td colspan="3"><div align="center">Last 15 killed</div></td>
  </tr>
  <tr bgcolor=white>
    <td width="109"  class=tip>Username</td>
    <td width="105" class=tip>Rank</td>
    <td width="126" class=tip>Date/time</td>
  </tr>
  <?
	   $e=mysql_query("SELECT * FROM users_info ORDER BY respect DESC LIMIT 15");
	   while($f=mysql_fetch_object($e)){
	   echo "<tr><td><a href='profile.php?viewuser=$f->username'>$f->username</a></td><td>$f->rank</td><td>$dae->date</td></tr>";
	   
	   
	   
	   }
	   ?>
</table>

