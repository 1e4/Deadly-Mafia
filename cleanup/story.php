<?php
session_start();
header("Cache-control: private"); 
include_once"includes/db_connect.php";

if (isset($_SESSION['username'])){
header("Location: logged_in.php");
exit();
}


if ($_POST['submit']){
$username = $_POST['username']; 
$password = $_POST['password'];
$username = strip_tags($username);
$password = strip_tags($password);
$ip = $REMOTE_ADDR;


$username=strtolower($username);

if((!$username) || (!$password)){ 
    echo "You have not submitted one or more fields <br />"; 
}else{



///check INFO
$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND activated='1' LIMIT 1"); 
$login_check = mysql_num_rows($sql); 
$inf = mysql_fetch_object($sql); 

if ($login_check > "0"){
if ($inf->status == "Dead"){
include_once"dead.php";
exit();

}
        ini_set(session.cookie_lifetime, "3600");
        session_register('username'); 
        $_SESSION['username'] = $inf->username; 
       

       
       
         $timestamp = time()+60; 
mysql_query("UPDATE users SET online='$timestamp' WHERE username='$username'");
        
mysql_query("UPDATE users SET l_ip='$domain' WHERE username='$username'");



        header("Location: logged_in.php"); 
   
} else { 
    echo "You could not be logged in.<br />"; 
    include_once 'index.php'; 
}}}
?> 


<HTML><HEAD><TITLE>MafiaWarz</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<type=text/css rel=stylesheet href=includes/trad1.css type=text/css>

<STYLE>
BODY {
	BACKGROUND-POSITION: right bottom;
	BACKGROUND-ATTACHMENT: fixed;
	BACKGROUND-IMAGE: url(images/home-pic.gif);
	BACKGROUND-REPEAT: no-repeat;
	background-color: #CCCCCC;
}
.style1 {
	color: #000000;
	font-weight: bold;
}
.style2 {
	color: #000044;
	font-size: 12px;
	font-weight: bold;
}
.style4 {color: #880000}
.style5 {color: #770000}
.style6 {color: #880000; font-size: 18px; }
.style7 {color: #000000; font-size: 12px; font-weight: normal; }
</STYLE>

<META content="MSHTML 6.00.2900.2604" name=GENERATOR></HEAD>
<BODY bottomMargin=0 leftMargin=0 topMargin=0 
onload="if(window.top != window.self)top.location='game-login.php'" 
rightMargin=0>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR height=100>
    <TD>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom>
            <H1><img src="images/tst1.jpg" width="986" height="99"> </H1>
            <TABLE height=20 cellSpacing=0 cellPadding=0 
            background="" 
            border=0>
              <TBODY>
              <TR>
                <TD 
                width=149 align="middle" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Welcome" 
                  href="http://www.mafiawarz.com"><FONT color=#000000><B>About 
                  mafia warz</B></FONT></A></TD>
                <TD 
                width=149 align="middle" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Register now for free! " 
                  href="login.php"><FONT 
                  color=#000000><strong>Login</strong></FONT></A></TD>
                <TD 
                width=149 align=middle bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Login!" 
                  href="register.php"><FONT 
                  color=#000000><strong>Register</strong></FONT></A></TD>
              </TR></TBODY></TABLE></TD>
      </TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD style="BORDER-TOP: #000000 1px solid">
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=160>
            <TABLE width=150 height="85" border=0 cellPadding=0 cellSpacing=0>
              <TBODY>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><span class="style2"><a href="http://www.mafiawarz.com"> Welcome</a></span></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><A 
                  href="story.php" 
                  title="Read the story" class="style2">The Story</A></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="faq_not.php" class="style2">F.A.Q</a></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="contact.php" class="style2">Contact</a></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD height="21" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="screens.php" class="style2">Screen shots </a></TD>
              </TR></TBODY></TABLE>
            <BR></TD>
          <TD width="830" vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 align=right border=0>
              <TBODY>
              <TR height=20>
                <TD width=25></TD></TR></TBODY></TABLE>
            <BR>
            <TABLE width="99%">
              <!--DWLayoutTable-->
              <TBODY>
              <TR vAlign=top>
                <TD width="747" height="184" valign="top" style="TEXT-ALIGN: justify">
                  <BLOCKQUOTE style="MARGIN: 10px">
                      <H1 align="left" class=style6><font size="2">Welcome to Mafia Warz </font></H1>
                      <H1 align="left" class=style7>
                        <P align="left"><font size="2">You've just entered one of the most dangerous places in history.<BR>
                          This is the first time police has lost control, and mafioso roam freely trough the once so peacefull world.<BR>
    Most people aren't involved in it, neither were you.<BR>
    Untill one night, a night which changed everything...<BR>
    You just went outside to have a smoke when a car hits the brakes, and a group of mafioso pulls you in their car,<BR>
    once you're fully aware of what's happening, someone points a gun at your head, after which someone else<BR>
    gives you a choice, between the mafia world or your dead.<BR>
    You haven't got a clue why this happens with you, but since you want to survive, you made a decission, the decission<BR>
    to live and to rule the mafia world.<BR>
    Once you told them you'll enter the mafiaworld they give you 100 pound and kick you out of their car, saying you're on your own now.<BR>
    Good luck surviving and becoming the most feared and powerfull mafioso ever.<BR>
    Roam around the world, get friends and make enemies, it's your life.<BR>
                        </font>                      
                      </H1>
                      <p></P>
                      <H1 align="center" class="style6">&nbsp;</H1>
                      <H1 align="center" class="style7">&nbsp;</H1>
                      </BLOCKQUOTE></TD>
                <TD width="63">&nbsp;</TD>
              </TR>
              </TBODY></TABLE>
      <BLOCKQUOTE></BLOCKQUOTE></TD></TR></TBODY></TABLE></TD>
  </TR>
  <TR>
    <TD 
    height=20 align=right bordercolor="#000000" bgcolor="999999"><A href="" target=_blank><FONT 
      color=#cccccc size=1></FONT></A>
      <CENTER>
      &copy;Kja-solutions gaming network All rights reserved
      </CENTER></TD>
</TR></TBODY></TABLE></BODY></HTML></form>
