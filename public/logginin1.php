<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>...:::Web Design:::...</title>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	background-image: url(bks.gif);
}
.style4 {font-weight: bold; color: #CCCCCC; font-family: Rotator;}
.style9 {color: #FFFFFF}
.style10 {font-size: 18px}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>

<body><embed src="http://www.angelfire.com/ex2/gfunited/daftpunk.mp3" autostart="true" loop="false" hidden="true"> 
<div align="center">
  <table width="881" border="1">
    <tr>
      <td width="792" height="30" bgcolor="#FFFFFF" class="style4"><marquee>
      <span class="style10">
      <input type="submit" name="Submit" value="Login">
      </span>      </marquee></td>
    </tr>
  </table>
  <table width="881" height="453" border="1">
    <tr>
      <td height="20" colspan="2" bgcolor="#FFFFFF"><div align="center" class="style1">
    <p>        
    <span class="style9"><font face="verdana" size="2">You found some secret writing, well done you!</font></span>
    </tr>
        <tr> 
          <td valign="top" bgcolor="#FFFFFF"> 
            <p><font face="verdana" size="1.5">
              <?php
if (!isset($_COOKIE['loggedin'])) die("You are not logged in!");
$mysite_username = $HTTP_COOKIE_VARS["mysite_username"]; 
echo "Welcome <b>$mysite_username</b>.<p>";
?>
<?php

$dbh=mysql_connect ("localhost", "empire20_test", "accrue55") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("empire20_empire"); 

if (!isset($_COOKIE['loggedin'])) die("You are not logged in!");
$mysite_username = $HTTP_COOKIE_VARS["mysite_username"]; 

$query=mysql_query("SELECT * FROM Members where username='$mysite_username'");
$cash=stripslashes(mysql_result($query,0,"cash"));
$cash= htmlentities("$cash");
$group=stripslashes(mysql_result($query,0,"group"));
$group= htmlentities("$group");
$query3 = MYSQL_QUERY( "SELECT * FROM `groups` WHERE ID='$group'");
$rank = MYSQL_RESULT( $query3,0, group_name);
$maxhealth=stripslashes(mysql_result($query,0,"maxhealth"));
$maxhealth= htmlentities("$maxhealth");
$health=stripslashes(mysql_result($query,0,"health"));
$health= htmlentities("$health");
$weapon=stripslashes(mysql_result($query,0,"weapon"));
$weapon= htmlentities("$weapon");
$bullets=stripslashes(mysql_result($query,0,"bullets"));
$bullets= htmlentities("$bullets");
$protection=stripslashes(mysql_result($query,0,"protection"));
$exp=stripslashes(mysql_result($query,0,"exp"));
$protection= htmlentities("$protection");
echo "<b>Clicks:</b> $cash<br>";


if($group=="1" && $exp>"100")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';
}
if($group=="2" && $exp>"300")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="3" && $exp>"900")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="4" && $exp>"1500")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="5" && $exp>"2000")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="6" && $exp>"3400")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="7" && $exp>"6000")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="8" && $exp>"26000")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';

}
if($group=="9" && $exp>"38000")
{
$rank=$rank+1;
$promoted="true";
echo '<SCRIPT TYPE="text/javascript" language="JavaScript">window.open("rankup.php", "RankUp", "width=400,height=200,scrollbars=yes");</SCRIPT>';
}


?><br>

            </font></p>
          </td></p>
        </div></td>
      <td width="767" bgcolor="#FFFFFF"><p class="style4">Welcome TO The Members A rea</p>
        <p>&nbsp;</p>
      <p class="style4"><em>So you managed to log in, well done, nothin much here yet though </em></p></td>
    </tr>
  </table>
  <p class="style4">Copyright 2005 Tom R </p>
</div>
</body>
</html>
</body>
</html>
