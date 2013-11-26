<?php 
include "functions.php";
logincheck();
?><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>

<form name="glform"method="post" action="http://www.glpayment.co.uk/glpay0205/Auth_Standard.php">
<input type="text" name="number">
<input type="hidden" name="ddi_id" value="1947">
<input type="submit" value="Go">  
</form>