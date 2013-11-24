<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include_once"casinoCP.php";

if (strip_tags($_POST['bet'])){

$winningnumber=rand(1,13);

echo "$winningnumber";
}


?>






<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head><form action="" method=POST>

<body>
<form name="form1" method="post" action="">
  <table width="56%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr> 
      <td height=22 colspan="2" background="<?php echo "$gradient"; ?>"><center class=TableHeading>
          <strong>Double or nothing</strong> </center></td>
    </tr>
    <tr> 
      <td width="53%">Bet: </td>
      <td width="47%"><input name="bet" type="text" id="bet"></td>
    </tr>
    <tr> 
      <td height="26" colspan="2"> <div align="center"> 
          <input name="start" type="submit" id="start" value="Bet">
        </div></td>
    </tr>
  </table>
</form>
