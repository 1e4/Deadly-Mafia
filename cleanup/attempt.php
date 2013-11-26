<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"click_limit.php";
include_once"probe.php";
logincheck();
$page="attempts.php";
script_check($page);

?>



<html>
<head>

<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="74%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td colspan="3" class=header><center>
       Last 10 attempts made on you </center></td>
  </tr>
  <tr bgcolor=#FFFFFF> 
    <td width="32%" class=tip>Username</td>
    <td width="45%" class=tip>Date/time</td>

  </tr>
  <?php
  $attempts_on_u=mysql_query("SELECT * FROM attempts WHERE target='$username'");
  while($fucker=mysql_fetch_object($attempts_on_u)){
 echo "
  
  <tr>
    <td width=32%>$fucker->username</td>
    <td width=45%>$fucker->date</td>
    
  </tr>";
  }
  
  ?>
  
  
  
</table>
<br>
<br>
<table width="74%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td colspan="3" class=header><center>
        Last 10 attempts you made
      </center></td>
  </tr>
  <tr bgcolor=#FFFFFF> 
    <td width="32%" class=tip>Username</td>
    <td width="45%" class=tip>Date/time</td>
  </tr>
  <?php
  $attempts_on_u1=mysql_query("SELECT * FROM attempts WHERE username='$username'");
  while($fucker1=mysql_fetch_object($attempts_on_u1)){
 echo "
  
  <tr>
    <td width=32%>$fucker1->target</td>
    <td width=45%>$fucker1->date</td>
    
  </tr>";
  }
  
  ?>
</table>
</body>
</html>
<?php require_once "includes/footer.php"; ?>