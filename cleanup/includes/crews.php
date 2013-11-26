<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
include "includes/smile.php";
logincheck(); 
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/in.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>
<tr> 
    <td align=center><table class='thinline' border=1 cellspacing=0 cellpadding=1 width=420 bordercolor="#000000" bgcolor="#666666" align="center">
        <tr> 
          <td width="414" height=20  class="header"><div align="center">Crews</div></td>
        </tr>
        <tr>
          <td height=44 valign="top" ><div align="center">This is the crew page you can View Various things on this page such as what crews are at war </div></td>
        </tr>
      </table> 
</table>

</table> 
  <p>&nbsp;</p>
<tr> 
    <td align=center><table class='thinline' border=1 cellspacing=0 cellpadding=1 width=851 bordercolor="#000000" bgcolor="#666666" align="center"><!--DWLayoutTable-->
        <tr> 
          <td height=20 colspan=3  class="Header"><center class="bold">
              Crews</center></td>
        </tr>

<tr bgcolor=white>
        <td width=271 align=center class=news><font color=black>Crew name</font></td>
        <td width=311 align=center class=news><font color=black>Owner</font></td>
        <td width=255 align=center class=news><font color=black>RHM</font></td>
      </tr>


        <? 
$biatch = mysql_query("SELECT * FROM crews ORDER BY id");
while($fucktard = mysql_fetch_object($biatch)){

echo "<tr><td class=news><a href='crewprofile.php?viewcrew=$fucktard->name'>$fucktard->name</a></td>";
echo "<td class=news><a href='profile.php?viewuser=$fucktard->owner'>$fucktard->owner</a></td>";
echo "<td class=news><a href='profile.php?viewuser=$fucktard->rhm'>$fucktard->rhm</a></td></tr>";


}

?>
      </table> 
  <p>&nbsp;</p>
<tr> 
  <td align=center><table class='thinline' border=1 cellspacing=0 cellpadding=1 width=857 bordercolor="#000000" bgcolor="#666666" align="center"><!--DWLayoutTable-->
        <tr> 
          <td height=20 colspan=2 valign="top"  class="Header"><center class="bold">
              Last Ten Crew Wars 
          </center></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width=429 height=23 align=center valign="top" class=news><font color=black>Crew name</font></td>
        <td width=418 align=center valign="top" class=news><font color="black">Went to war with</font></td>
      </tr>
</table>
      <p>&nbsp;</p>
  <tr> 
    <td align=center><table class='thinline' border=1 cellspacing=0 cellpadding=1 width=859 bordercolor="#000000" bgcolor="#666666" align="center"><!--DWLayoutTable-->
        <tr> 
          <td height=20 colspan=4  class="Header"><center class="bold">
             Richest 10 crews
          </center></td>
        </tr>

<tr align="center" bgcolor=white>
        <td width=288 class=news><font color=black>Crew name</font></td>
        <td width=180 class=news><font color=black>Owner</font></td>
        <td width=189 class=news><div align="center" class="style1">Makes per day </div></td>
        <td width=184><div align="center" class="style1">Bussineses Owned </div></td>
</tr>


        <? 
$biatch = mysql_query("SELECT * FROM crews ORDER BY bank DESC LIMIT 10");
while($fucktard = mysql_fetch_object($biatch)){
$bus=explode("-", $fucktard->income);
$first = $bus[0] * 10000;
$second = $bus[1] * 50000;
$third=$bus[2] * 100000;
$total = $first+$second+$third;
$totalbus=$bus[0]+$bus[1]+$bus[2];

echo "<tr><td class=news><a href='crewprofile.php?viewcrew=$fucktard->name'>$fucktard->name</a></td>";
echo "<td class=news><a href='profile.php?viewuser=$fucktard->owner'>$fucktard->owner</a></td>";
echo "<td class=news>£".makecomma($total)."</td>";
echo "<td class=news>$totalbus</td>";
echo "</tr>";
}

?>
      </table> 
<p>&nbsp;</p>
</body>
</html>