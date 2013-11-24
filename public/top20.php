<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

?><link href="includes/test.css" rel="stylesheet" type="text/css">
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Most Wanted Gangsters by Rep </div></td>
        </tr>
        <tr bgcolor=#999999> 
          <td width="109"  class=tip><div align="center">Name</div></td>
          <td width="105" class=tip><div align="center">Rep.</div></td>
         
        </tr>
      <?
	   $e = mysql_query("SELECT * FROM users WHERE status='Alive' AND userlevel='0' ORDER BY `rankpoints` DESC LIMIT 25");
	   while($f = mysql_fetch_array($e)){
		   echo "<tr><td bgcolor=666666><a href='profile.php?viewuser={$f['username']}'>{$f['username']}</a></td><td bgcolor=666666>{$f['rankpoints']}</td></tr>\n";	   
	   }
	   ?>   
      </table>
<br /><br /><br />
<?php 
	require_once "includes/footer.php";
?>