<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

?>

<HTML><HEAD>

<TITLE>Dreamweaver-Templates.org</TITLE>

<?




$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



?><?php 
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);

?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #FFFF00}
-->
</style>
<BODY text=#000000 vLink=#ff0000 aLink=#ff0000 link=#000000 bgColor=#ffffff 
topMargin=0 marginheight="0">

<TABLE height=77 width=756 align=center bgColor=#ffffff border=0>
  <TBODY>
  <TR>
    <TD width=214 height="73">
      <DIV align=left>
        <p style="margin-left: 7"><b><span lang="en-us"><font size="5" face="Arial">
        <font color="#FF0000">You</font>.com</font></span></b></DIV></TD>
    <TD vAlign=top width=32 height="73">&nbsp;</TD>
    <TD width=496 height="73">
    <p align="center"><b><span lang="en-us"><font size="4" face="Verdana">Place an 
    advertisement here</font></span></b></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 width=755 align=center bgColor=#ffffff border=0>
  <TBODY>
  <TR>
    <TD vAlign=top bgColor=#ffffff height=20 width="753">
      <div align="center">
        <center>
      <table border="1" cellpadding="0" cellspacing="0" style="border-width:0; border-collapse: collapse; " bordercolor="#111111" width="99%" id="AutoNumber1">
        <tr>
          <td align="center" bordercolor="#FFFFFF" bgcolor="#FF0000" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium; border-left-style:none; border-left-width:medium">
          <span lang="en-us"><b><font face="Arial" size="2" color="#FFFFFF">
          <span class="style1"><span class="style3" style="FONT-WEIGHT:bold">Rank: </span><?php echo "$fetch->rank"; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Money: </span><?php echo "&pound;".makecomma($fetch->money).""; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Location:</span><?php echo "$fetch->location"; ?> &nbsp;<span class="style3"> <span  style="FONT-WEIGHT:bold">Health</span></span><span  style="FONT-WEIGHT:bold">:</span><?php echo "$fetch->health%"; ?> &nbsp;&nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Bullets:</span><?php echo "".makecomma($fetch->bullets).""; ?> &nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> &nbsp; <span class="style3"  style="FONT-WEIGHT:bold">Energy:</span><?php echo "$fetch->energy%"; ?>
          <?php if ($inbox > 0){ echo "<span  style=FONT-WEIGHT:bold><a href=inbox.php 

ONMOUSEOUT=\"javascript:document.location.reload();\"

 target=middle><font color=red>You have $inbox new messages!</a></font></span>"; } ?>
          </span>&nbsp; <span  style="color:Yellow;font-weight:bold;"><? echo gmdate('Y-m-d h:i'); ?></span> </font></b></span></td>
          </tr>
      </table>
        </center>
      </div>
    </TD></TR></TBODY></TABLE>
<TABLE height=493 cellSpacing=3 cellPadding=0 width=756 align=center 
bgColor=#ffffff border=0>
  <TBODY>
    <TR>
      <TD vAlign=top width=134 bgColor=#ffffff height=491><br>
          <TABLE height=144 cellSpacing=0 cellPadding=0 width=124 align=center 
      border=0>
            <TBODY>
              <TR>
                <TD bgColor=#FF0000 height=21><p align="center"><b><font color="#FFFFFF" face="Arial" size="2"> <span lang="en-us">Main Menu</span></font></b></TD>
              </TR>
              <TR>
                <TD bgColor=#ff0000 height=128><TABLE height=118 cellSpacing=0 cellPadding=0 width=122 align=center 
            border=0>
                    <TBODY>
                      <TR>
                        <TD vAlign=top bgColor=#ffffff height=101><TABLE height=126 cellSpacing=5 cellPadding=0 width=118 
                  align=center border=0>
                            <TBODY>
                              <TR>
                                <TD vAlign=top height=115><p style="margin-top: 0; margin-bottom: 0"><FONT 
                        face="Verdana, Arial, Helvetica, sans-serif" size=1> <IMG src="sml-red-sq.gif" width="14" height="13"> <span lang="en-us">Your Link</span><BR>
                                          <IMG src="sml-red-sq.gif" width="14" height="13"><span lang="en-us"> Your Link</span></FONT></p>
                                    <p style="margin-top: 0; margin-bottom: 0"><FONT 
                        face="Verdana, Arial, Helvetica, sans-serif" size=1> <IMG src="sml-red-sq.gif" width="14" height="13"><span lang="en-us"> Your Link</span> </FONT></p>
                                    <p style="margin-top: 0; margin-bottom: 0"><FONT 
                        face="Verdana, Arial, Helvetica, sans-serif" size=1> <IMG src="sml-red-sq.gif" width="14" height="13"><span lang="en-us"> Your Link</span> </FONT></p>
                                    <p style="margin-top: 0; margin-bottom: 0"><FONT 
                        face="Verdana, Arial, Helvetica, sans-serif" size=1> <IMG src="sml-red-sq.gif" width="14" height="13"><span lang="en-us"> Your Link</span> </FONT></p>
                                    <p style="margin-top: 0; margin-bottom: 0"><FONT 
                        face="Verdana, Arial, Helvetica, sans-serif" size=1> <IMG src="sml-red-sq.gif" width="14" height="13"><span lang="en-us"> Your Link</span> </FONT></TD>
                              </TR>
                            </TBODY>
                        </TABLE></TD>
                      </TR>
                    </TBODY>
                </TABLE></TD>
              </TR>
            </TBODY>
          </TABLE>
          <DIV align=center> <IMG src="whitespace3mm.jpg" width="37" height="6"><BR>
          </DIV>
          <TABLE height=146 cellSpacing=0 cellPadding=0 width=124 align=center 
      border=0>
            <TBODY>
              <TR>
                <TD bgColor=#FF0000 height=20><p align="center"><b><font color="#FFFFFF" face="Arial" size="2"> <span lang="en-us">Text Box # 2</span></font></b></TD>
              </TR>
              <TR>
                <TD bgColor=#FFFFFF><div align="center">
                    <center>
                      <TABLE height=116 cellSpacing=0 cellPadding=0 width=122 
            border=0 style="border-collapse: collapse; border-left-width: 1; border-right-width: 1; border-bottom-width: 1" bordercolor="#FF0000">
                        <TBODY>
                          <TR>
                            <TD bgColor=#ffffff height=123 valign="top" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1"><p style="margin-left: 4; margin-right: 3; margin-top: 3; margin-bottom: 3"> <font size="2" face="Verdana">Insert your Test Here. Insert your Test Here. Insert your Test Here. Insert your Test Here.</font></TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                    </center>
                </div></TD>
              </TR>
            </TBODY>
          </TABLE>
          <p style="margin-top: -7; margin-bottom: -7">&nbsp;</p>
          <div align="center">
            <center>
              <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="87%" id="AutoNumber3">
                <tr>
                  <TD bgColor=#FF0000 height=20 style="border-style: none; border-width: medium"><p align="center"><b><font color="#FFFFFF" face="Arial" size="2"> <span lang="en-us">Text Box # 3</span></font></b></TD>
                </tr>
                <tr>
                  <TD bgColor=#FFFFFF style="border-left: medium none #111111; border-right: medium none #111111; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium"><div align="center">
                      <center>
                        <TABLE height=116 cellSpacing=0 cellPadding=0 width=122 
            border=0 style="border-collapse: collapse" bordercolor="#FF0000">
                          <TBODY>
                            <TR>
                              <TD bgColor=#ffffff height=123 valign="top" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1"><p style="margin-left: 4; margin-right: 3; margin-top: 3; margin-bottom: 3"> <font face="Verdana" size="2">Insert your Test Here. Insert your Test Here. Insert your Test Here. Insert your Test Here.</font></TD>
                            </TR>
                          </TBODY>
                        </TABLE>
                      </center>
                  </div></TD>
                </tr>
              </table>
            </center>
            <IMG src="whitespace3mm.jpg" width="37" height="6"><BR>
            <DIV align=left> <A 
href="http://www.historic-landmarks.com/index.html" target="_blank" class="style1"><FONT 
face=verdana,sans-serif size=1>Historic Landmarks</font></A></DIV>
        </div></TD>
      <TD vAlign=top width=477 bgColor=#ff0000 height=491><TABLE height=100% cellSpacing=1 width=483 align=center border=0>
          <TBODY>
            <TR>
              <TD vAlign=top bgColor=#ffffff height=461 width="479"><DIV align=center> <IMG src="whitespace3mm.jpg" width="37" height="6"><BR>
                      <TABLE height=115 cellSpacing=0 width=466 border=0>
                        <TBODY>
                          <TR>
                            <TD bgColor=#ffffff width="171"><DIV align=center> <img border="0" src="52-sml.jpg" width="194" height="144"></DIV></TD>
                            <TD bgColor=#ffffff width="291"><p align="center"><font face="Verdana" size="2"><b> <span lang="en-us">Place a main attraction or special here</span></b></font></TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                      <DIV align=center><FONT 
            color=#ff0000> _______________________________________________________</FONT> </DIV>
                      <TABLE height=90 cellSpacing=5 width=466 align=center 
            bgColor=#ffffff border=0>
                        <TBODY>
                          <TR>
                            <TD align=middle width=131 height=81><img border="0" src="53_A-sml.jpg" width="96" height="71"> </TD>
                            <TD width=316 bgColor=#ffffff height=81><strong> <span lang="en-us"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0000"> Your Description Here</font></span><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#ff0000 
                  size=2><BR>
                            </FONT></strong> <u> <span lang="en-us"> <FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  size=1>More Info Here</FONT></span></u> </TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                      <TABLE height=90 cellSpacing=5 width=466 align=center 
            bgColor=#ffffff border=0>
                        <TBODY>
                          <TR>
                            <TD align=middle width=131 height=81><img border="0" src="53_B-sml.jpg" width="113" height="73"> </TD>
                            <TD width=316 bgColor=#ffffff height=81><strong> <span lang="en-us"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#008000"> Your Description Here</font></span><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" color=#ff0000 
                  size=2><BR>
                            </FONT></strong> <u> <span lang="en-us"> <FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  size=1>More Info Here</FONT></span></u> </TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                      <DIV align=center style="width: 459; height: 110">
                        <p style="margin-top: 0; margin-bottom: 0"><FONT 
            color=#ff0000> _______________________________________________________</FONT> <br>
&nbsp;</p>
                        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="100%" id="AutoNumber2">
                          <tr>
                            <td width="100%" style="border-style: none; border-width: medium"><p align="center"><br>
                                    <font face="Verdana"> <b><span lang="en-us"><font size="4">Place an advertisement here</font></span></b><br>
&nbsp;</font></td>
                          </tr>
                        </table>
                      </DIV>
              </DIV></TD>
            </TR>
          </TBODY>
        </TABLE>
          <div align="center"> </div></TD>
      <TD vAlign=top width=127 bgColor=#ffffff height=491><TABLE height=167 cellSpacing=0 cellPadding=0 width=123 align=center 
      border=0>
          <TBODY>
            <TR>
              <TD bgColor=#FF0000 height=21><DIV align=center><b><font color="#FFFFFF" size="2" face="Arial"> <span lang="en-us">Text Box # 3</span></font></b></DIV></TD>
            </TR>
            <TR>
              <TD bgColor=#FFFFFF><div align="center">
                  <center>
                    <TABLE height=144 cellSpacing=0 cellPadding=5 width=121 
            border=1 bordercolor="#FF0000" style="border-collapse: collapse; border-top-width: 0">
                      <TBODY>
                        <TR>
                          <TD vAlign=top bgColor=#ffffff height=142 width="111" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1"><font size="2" face="Verdana"><a href="crime.php">crimes</a>Test Here. Insert your Test Here. Insert your Test Here. Insert your Test Here.</font></TD>
                        </TR>
                      </TBODY>
                    </TABLE>
                  </center>
              </div></TD>
            </TR>
          </TBODY>
        </TABLE>
          <DIV align=center> <IMG src="whitespace3mm.jpg" width="37" height="6"><BR>
          </DIV>
          <TABLE height=129 cellSpacing=0 cellPadding=0 width=123 align=center 
      border=0>
            <TBODY>
              <TR>
                <TD bgColor=#FF0000 height=20><DIV align=center><b><font color="#FFFFFF" size="2" face="Arial"> <span lang="en-us">Text Box # 4</span></font></b></DIV></TD>
              </TR>
              <TR>
                <TD bgColor=#FFFFFF valign="top" height="109"><div align="center">
                    <center>
                      <TABLE height=125 cellSpacing=0 cellPadding=5 width=121 
            border=0 style="border-collapse: collapse; border-width: 1" bordercolor="#FF0000">
                        <TBODY>
                          <TR>
                            <TD vAlign=top bgColor=#ffffff height=121 width="111" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1"><font size="2" face="Verdana">Insert your Test Here. Insert your Test Here. Insert your Test Here. Insert your Test Here.</font></TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                    </center>
                </div></TD>
              </TR>
            </TBODY>
          </TABLE>
          <DIV align=center> <IMG src="whitespace3mm.jpg" width="37" height="6"><BR>
          </DIV>
          <TABLE height=108 cellSpacing=0 cellPadding=0 width=122 align=center 
      border=0>
            <TBODY>
              <TR>
                <TD bgColor=#FF0000 height=21 width="122"><DIV align=center><b><font color="#FFFFFF" size="2" face="Arial"> <span lang="en-us">Text Box # 5</span></font></b></DIV></TD>
              </TR>
              <TR>
                <TD bgColor=#FFFFFF height=90 width="122"><div align="center">
                    <center>
                      <TABLE height=89 cellSpacing=0 width=120 border=1 style="border-collapse: collapse; border-top-width:0" bordercolor="#FF0000" cellpadding="0">
                        <TBODY>
                          <TR>
                            <TD bgColor=#ffffff height=75 width="118" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1" valign="top"><p style="margin-left: 4; margin-right: 3; margin-top: 3; margin-bottom: 3"> <font size="2" face="Verdana">Insert your Test Here. Insert your Test Here. </font> </TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                    </center>
                </div></TD>
              </TR>
            </TBODY>
          </TABLE>
          <div align="center"><IMG src="whitespace3mm.jpg" width="37" height="6"> </div>
          <br>
      </TD>
    </TR>
  </TBODY>
</TABLE>
<table width="756" height="20"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><b><font face="Arial" size="1">        Copyright
            YOU.com. All Rights Reserved.</font></b><br>
    </div></td>
  </tr>
</table>
<br>
</BODY></HTML>