<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
?><script language="javascript">



function Logout (){
	var del = confirm("Logging Out - Thanks For Playing, Come back soon!");
	if (del == true){
		var loc = "index.php?logout=yes";
		parent.top.location.href=loc;
	}
}
function Toggle(item) {
   obj=document.getElementById(item);
   visible=(obj.style.display!="none")
   key=document.getElementById("x" + item);
   if (visible) {
     obj.style.display="none";
   } else {
      obj.style.display="block";
   }
}
</script>



<link rel=stylesheet href=includes/in.css type=text/css>



<style type="text/css">
<!--
.style2 {color: #0000FF}
.style2 {color: #FFFFFF}
-->
body {background-color: #454545}
a{text-decoration:none; color:white; font-size: 10px;}
a:link{text-decoration:none; color:white; font-size: 10px;}
a:visited{text-decoration:none; color:white; font-size: 10px;}
a:hover{text-decoration:none; color:red; font-size: 10px;}
a:active{text-decoration:none color:white;
	font-size: 10px;
	text-decoration: none;
	color: red;
}
.style3 {color: #FFFFFF; font-weight: bold; }
</style>

  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center" class="style3">Updates</div></td>
        </tr>
        <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="crime.php" target="middle" class="style2">Hmm guess il have to add stuff ehre </a><a href="stocks.php" target="middle" class="style2"></a></td>
      </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center" class="style3">Recent Happenings</div></td>
        </tr>
		<tr>
          <td bordercolor="#454545" class="style2" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';">Not much as not yet released! </td>
        </tr>

		
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td bordercolor="#454545" background="includes/grad.jpg"> <div align="center" class="style3">Vote</div></td>
        </tr>


       
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="http://www.gamesites200.com/mpog/in.php?id=627" target="middle" class="style2">Vote By Clicking here! </a><a href="javascript:Logout()" class="style2"></a></td>
        </tr>
      </table></td>
  </tr>
</table>