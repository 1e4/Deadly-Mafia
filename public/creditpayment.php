<?php 
session_start(); 
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

?>
<HTML><HEAD><TITLE>Empire2010</TITLE>

<link rel=stylesheet href=includes/in.css type=text/css>
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style9 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
<body>
<p>&nbsp;</p>
<table width="79%"  border="1" align="center" cellPadding="2" cellSpacing="0" class="thinline" bordercolor=black>
  <tr >
    <td background="includes/grad.jpg"><center class=bold>
        Payment successful! 
    </center></td>
  </tr>
  <tr>
    <td><p align="center">You have paid successfully, Points will be distributed within 48 hours <span class="style1"></span><br>
      </p>
    </td>
  </tr>
</table>

</body>

</html>





