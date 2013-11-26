<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

?>
<HTML>
<HEAD>

<?




$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



?><?php 
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);

?>
<TITLE>WarPants</TITLE> <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1"> 
<LINK REL="stylesheet" HREF="style.css" TYPE="text/css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #FFFF00}
-->
</style>
</HEAD>

<BODY BGCOLOR="262626" TEXT="#000000" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
<TABLE WIDTH="10%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="CENTER"><TR><TD><img src="../empty_top.gif" width="750" height="129"></TD>
</TR><TR><TD><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD WIDTH="9%" VALIGN="TOP" BACKGROUND="images24/interface_11.gif"><TABLE WIDTH="10%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD><IMG SRC="images24/interface_02.gif" WIDTH="154" HEIGHT="35"></TD></TR><TR><TD BACKGROUND="images24/interface_04.gif"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD WIDTH="6%"><IMG SRC="images24/interface_07.gif" WIDTH="24" HEIGHT="22"></TD><TD WIDTH="94%" BACKGROUND="images24/interface_08.gif"><DIV ALIGN="LEFT"><FONT COLOR="FFC200" SIZE="1" FACE="Tahoma"><B><FONT COLOR="#000000">main</FONT></B></FONT></DIV></TD></TR></TABLE><DIV ALIGN="CENTER"></DIV></TD></TR><TR><TD BACKGROUND="images24/interface_09.gif"><TABLE WIDTH="85%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="RIGHT"><TR>
  <TD><FONT SIZE="1" FACE="Tahoma"><a href="?act=crime">Crime</a></FONT></TD>
</TR><TR>
  <TD><FONT SIZE="1" FACE="Tahoma"><a href="?act=jack">GTA</a></FONT></TD>
</TR><TR><TD><FONT SIZE="1" FACE="Tahoma"><A HREF="?act=count">link</A></FONT></TD>
</TR><TR><TD><FONT SIZE="1" FACE="Tahoma"><A HREF="#">link</A></FONT></TD></TR><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">link</FONT></A></TD></TR></TABLE></TD></TR><TR><TD BACKGROUND="images24/interface_09.gif"><DIV ALIGN="CENTER"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD WIDTH="6%"><IMG SRC="images24/interface_07.gif" WIDTH="24" HEIGHT="22"></TD>
<TD WIDTH="94%" BACKGROUND="images24/interface_08.gif"><FONT COLOR="FFC200" SIZE="1" FACE="Tahoma"><B><FONT COLOR="#000000">blah</FONT></B></FONT></TD>
</TR></TABLE></DIV></TD></TR><TR><TD BACKGROUND="images24/interface_09.gif"><TABLE WIDTH="85%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="RIGHT"><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">home</FONT></A></TD></TR><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">link</FONT></A></TD></TR><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">link</FONT></A></TD></TR><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">link</FONT></A></TD></TR><TR><TD><A HREF="#"><FONT SIZE="1" FACE="Tahoma">link</FONT></A></TD></TR></TABLE></TD></TR><TR><TD BACKGROUND="images24/interface_04.gif" VALIGN="TOP"><DIV ALIGN="CENTER"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD WIDTH="6%"><IMG SRC="images24/interface_07.gif" WIDTH="24" HEIGHT="22"></TD>
<TD WIDTH="94%" BACKGROUND="images24/interface_08.gif"><FONT COLOR="FFC200" SIZE="1" FACE="Tahoma"><B><FONT COLOR="#000000">stuff</FONT></B></FONT></TD>
</TR></TABLE></DIV></TD></TR><TR><TD BACKGROUND="images24/interface_09.gif"><DIV ALIGN="CENTER"><TABLE WIDTH="85%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="RIGHT"><TR><TD>&nbsp;</TD>
</TR><TR><TD>&nbsp;<a href="http://www.TwstC.nl.nu"><BR>
</a></TD>
</TR></TABLE></DIV></TD></TR><TR><TD BACKGROUND="images24/interface_04.gif"><IMG SRC="images24/interface_10.gif" WIDTH="154" HEIGHT="23"></TD></TR></TABLE></TD><TD WIDTH="91%" VALIGN="TOP"><TABLE WIDTH="10%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD>&nbsp;</TD>
</TR></TABLE>
  <span lang="en-us"><b><font face="Arial" size="2" color="#FFFFFF"><span class="style1"><span class="style3" style="FONT-WEIGHT:bold">Rank: </span><?php echo "$fetch->rank"; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Money: </span><?php echo "&pound;".makecomma($fetch->money).""; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Location:</span><?php echo "$fetch->location"; ?> &nbsp;<span class="style3"> <span  style="FONT-WEIGHT:bold">Health</span></span><span  style="FONT-WEIGHT:bold">:</span><?php echo "$fetch->health%"; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Bullets:</span><?php echo "".makecomma($fetch->bullets).""; ?> &nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> &nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Energy:</span><?php echo "$fetch->energy%"; ?>
  <?php if ($inbox > 0){ echo "<span  style=FONT-WEIGHT:bold><a href=inbox.php 

ONMOUSEOUT=\"javascript:document.location.reload();\"

 target=middle><font color=red>You have $inbox new messages!</a></font></span>"; } ?>
  </span>&nbsp; <span  style="color:Yellow;font-weight:bold;"><? echo gmdate('Y-m-d h:i'); ?></span> </font></b></span>
  <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD BGCOLOR="23241C" WIDTH="98%" VALIGN="TOP"><TABLE CELLPADDING="1" CELLSPACING="0" BORDER="0" BGCOLOR="#000000" WIDTH="407" HEIGHT="25" ALIGN="CENTER"> 
<TR> <TD WIDTH="405"><TABLE CELLPADDING="1" CELLSPACING="0" BORDER="0" BGCOLOR="776746" WIDTH="407" HEIGHT="25"> 
<TR> <TD WIDTH="405"> <TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" BGCOLOR="#ffffff" WIDTH="500"> 
<TR> <TD HEIGHT="45" BGCOLOR="393223"><DIV ALIGN="CENTER"><BR><TABLE CELLPADDING="1" CELLSPACING="0" BORDER="0" BGCOLOR="#000000" WIDTH="337" HEIGHT="25" ALIGN="CENTER"> 
<TR> <TD WIDTH="335"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD BGCOLOR="0E0E0B"><DIV ALIGN="CENTER"><FONT FACE="Tahoma" SIZE="1" COLOR="FFC200"><strong>tester</strong></FONT></DIV></TD></TR><TR><TD BGCOLOR="2F3028"><TABLE WIDTH="91%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="CENTER"><TR><TD><P>&nbsp;<?php


if(! $act=="yo") { 
require("yo.php");
}
if ($act=="crime") { 
require("crime.php");
}
if ($act=="count") { 
require("countrys.php");
}
if ($act=="rob") { 
require("rob.php");
}
if ($act=="robabank") { 
require("robabank.php");
}
if ($act=="send") { 
require("send.php");
}
if ($act=="sendingmoney") { 
require("sendingmoney.php");
}
if ($act=="withdraw") { 
require("withdraw.php");
}
if ($act=="deposit") { 
require("deposit.php");
}
if ($act=="die") { 
require("die.php");
}
if ($act=="bulletsfac") { 
require("bulletsfac.php");
}
if ($act=="buyingbullets") { 
require("buyingbullets.php");
}
if ($act=="memberlist") { 
require("list.php");
}
if ($act=="slots") { 
require("slots.php");
}
if ($act=="spinslots") { 
require("spinslots.php");
}
if ($act=="roulette") { 
require("roulette.php");
}
if ($act=="spinroulette") { 
require("spinroulette.php");
}
if ($act=="crimes") { 
require("crimes.php");
}
if ($act=="commitcrime") { 
require("commitcrime.php");
}
if ($act=="cartheft") { 
require("cars.php");
}
if ($act=="stealcar") { 
require("stealcar.php");
}
?></P></TD></TR></TABLE><BR></TD></TR></TABLE></TD></TR> </TABLE><BR><TABLE CELLPADDING="1" CELLSPACING="0" BORDER="0" BGCOLOR="#000000" WIDTH="337" HEIGHT="25" ALIGN="CENTER"> 
<TR> <TD WIDTH="335"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0"><TR><TD BGCOLOR="0E0E0B" HEIGHT="12"><DIV ALIGN="CENTER"><FONT FACE="Tahoma" SIZE="1" COLOR="FFC200"><B>More stuff maybe </B></FONT></DIV></TD></TR><TR><TD BGCOLOR="2F3028"><TABLE WIDTH="91%" BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="CENTER"><TR><TD><P><FONT FACE="Tahoma" SIZE="1" COLOR="999999"><BR>
</FONT></P></TD></TR></TABLE><P><FONT FACE="Tahoma" SIZE="1" COLOR="#FFFFFF"><BR></FONT></P></TD></TR></TABLE></TD></TR> 
</TABLE><BR></DIV></TD></TR> </TABLE>
    <span lang="en-us"><b></b></span></TD>
</TR> </TABLE></TD></TR> </TABLE><BR></TD><TD WIDTH="2%" BACKGROUND="images24/interface_06.gif"><IMG SRC="images24/interface_06.gif" WIDTH="25" HEIGHT="485"></TD></TR></TABLE></TD></TR></TABLE></TD></TR><TR><TD><IMG SRC="images24/interface_12.gif" WIDTH="750" HEIGHT="51"></TD></TR></TABLE> 
</BODY>
</HTML>
