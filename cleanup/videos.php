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
.style9 {font-weight: bold; color: #CCCCCC; font-family: Rotator; font-size: 16px; }
-->
</style><style>
A { text-decoration:none }
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style20 {color: #333366}
.style22 {color: #CCCCCC; font-family: Verdana, Arial, Helvetica, sans-serif; }
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
      <td width="792" height="30" bgcolor="#FFFFFF" class="style4"><marquee class="style9">
      Welcome To The Members Area, doesn't it just make you feel special?       
      </marquee></td>
    </tr>
  </table>
  <table width="881" height="485" border="1"><tr><td colspan="3"></div><tr><td colspan="3"></td>
        <tr>
            <td height="67" bgcolor="#FFFFFF" class="style4"><span class="style4 style20"><font face="verdana" size="1.5">
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


?>
            </font></span></td>
          <td width="297" rowspan="7" bgcolor="#FFFFFF">            <table width="180" border="1">
            <tr>
              <td width="170"><span class="style4 style15">Olympios Videos </span></td>
            </tr>
          </table>            
            <p class="style22">peaCOCK</p>
            <p class="style22">crazy golf</p>
            <p class="style22">tekken 1</p>
            <p><span class="style22">tekken 2 </span> </p>
            <p class="style4 style15">&nbsp;</p>
          </td>
          <td width="297" rowspan="7" bgcolor="#FFFFFF" class="style4 style15"><table width="165" border="1">
              <tr>
                <td>Other Videos</td>
              </tr>
            </table>
            <p>Zilch here yet ~ </p></td>
        </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/videos.php" class="style22">Videos</a></td>
    </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/pictures.php" class="style22">Pics</a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/flash.php" class="style22">Flash 'toons</a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/forum.php" class="style22">Forum</a></td>
      </tr>
      <tr>
        <td height="64" bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/oldskool.php" class="style22">Oldskool stuff</a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="style4"><a href="http://www.empire2010.com/contactemail.php" class="style22">Contact</a></td>
      </tr>
  </table>
  <p class="style4">Copyright 2005 Tom R </p>
</div>
</body>
</html>
</body>
</html>
