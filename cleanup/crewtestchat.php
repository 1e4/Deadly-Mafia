<?php 
session_start(); 
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

?>
<HTML><HEAD><TITLE>Empire2010</TITLE>


<style type="text/css">
<!--
.style1 {color: #0000FF}
.style5 {color: #FF0000; }
.style7 {color: #CC6633}
-->
</style>
<body>
<td class=header><div align="center">Mafia Club </div></td>
  </tr>
  <tr bgcolor=white> 
    <td class=tip><div align="center">Chat here, dont be racist or you WILL be banned </div></td>
  </tr>
  <tr bgcolor=black> 
    <td height=1 colspan=3></td>
  </tr>
  <tr> 
    <td> 
      <form method=post target=ifr action=chatmsgs.php?action=chat>
        <div align="center">Message: 
          <input type=text name=msg size=40 maxlength=200 onBlur=value='' onChange=focus()>
          [<a href="chat.php?p=chat">refresh</a>] </div>
        <tr>
            <td colspan=2 align=center> 
      </form></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="18"><div align="center"><p><iframe src=chatmsgs.php width="700px" height="400px" name=ifr frameborder=0></iframe>
            </p>
          </div></td>
        </tr>
      </table></td>







</body>

</html>







