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
        Buy Points Via Credit/debit card securely
    </center></td>
  </tr>
  <tr>
    <td><p align="center">Contact Mosphaitus after the purchase of points
      <form name="glform" method="post" action="http://www.glpayment.co.uk/glpay0205/gl_shop.php" target="newWindow">
<input type="hidden" name="ddi_id" value=" 1955">
<input type="hidden" name="Cust_Name" value="">
<input type="hidden" name="Cust_Email" value="">
<input type="hidden" name="Cust_gamename" value="">

<img src="http://www.glpayment.co.uk/glpay0205/images/glpaybutton.gif" onClick="document.glform.submit()" style="cursor:hand;"> </form></p>
    </td>
  </tr>
</table>

</body>

</html>





