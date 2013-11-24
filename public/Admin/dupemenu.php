<?php 


session_start(); 


header("Cache-control: private"); 


include "db_connect.php";


include "functions.php";





logincheck();


$username = $_SESSION['username'];


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">


<head>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Untitled Document</title>


</head>





<body>





<tr>


  <td><table class="thinline" width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#ffffff">


        <tr>


          <td class=header bgcolor="#339966">


            <div align="center"><strong><center>Dupe Check </strong> </div>


            </div></td>


        </tr>


		


<tr>


  <td background="images/bigassgrad.jpg"><a href="dupecheck.php" target="maindupe"><center><b>IP Check </a></td>


</tr>


<tr>


  <td background="images/bigassgrad.jpg"><a href="dupesearch.php" target="maindupe"><center><b>IP Search </a></td>


</tr>





<tr>


  <td background="images/bigassgrad.jpg"><a href="bank_transfers_submit.php" target="maindupe"><center><b>Bank Transers </a></td>


</tr>





</table>


  </td>


  </tr>


  </body>





</html>


