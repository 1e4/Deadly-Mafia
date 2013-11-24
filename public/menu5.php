<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
?><link rel=stylesheet href=includes/in.css type=text/css>



<style type="text/css">
<!--
.style2 {color: #0000FF}
.style2 {color: #FFFFFF}
.style3 {color: #000000}
body {
	background-color: #445212;
}
.style4 {color: #CCCC00; }
.style5 {color: #445212; }
-->
</style>
 <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#445212">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Casinos 
            </div></td>
        </tr>
		<tr>
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="keno.php" target="middle"><span class="style4">&raquo;Keno</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="race.php" target="middle"><span class="style4">&raquo;Race Track</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="roulette.php" target="middle"><span class="style4">&raquo;Roulette</span></a></td>
        </tr>
        <tr>
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="rps.php" target="middle"><span class="style4">&raquo;R 
            P S</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="slots.php" target="middle" class="style4">&raquo;Slots</a></td>
        </tr>
        
		<tr>
        </tr>
		<tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="lotto.php" target="middle" class="style4">&raquo;Lottery</a></td>
        </tr>
		
        
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#445212">
        <tr> 
          <td background="includes/grad.jpg"> <div align="center">Other</div></td>
        </tr>


       
        <tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="notes.php" target="middle" class="style5">&raquo;Note Pad</a></td>
        </tr><tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="tos.php" target="middle"><span class="style4">&raquo;Terms Of Service </span></a></td>
        </tr>
        <tr>
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="referral.php" target="middle" class="style4">&raquo;Referral Prog</a></td>
        </tr>
        <tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="tester.php" target="middle"><span class="style4">&raquo;Staff/Credits</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#445212" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="javascript:Ismell()" class="style4">&raquo;Logout</a></td>
        </tr>
      </table>