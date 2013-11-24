<?
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/smile.php";

logincheck(); echo "$style";

$username=$_SESSION['username'];
$edi=strip_tags($_GET['edi']);
if (!$edi){
$edition = "1";
}else{
$edi=strip_tags($_GET['edi']);
}
$gradient="includes/grad.jpg"



?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/test.css type=text/css>


</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr> 
    <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000" bgcolor="#666666">
        <tr> 
          <td height=22 background="<?php echo "$gradient"; ?>"><center class=TableHeading>
            The Bliss Times 
          </center></td>
        </tr><tr>


<td> <div align="center"><img src="images/timeuz3.gif" width="449" height="82"></div></td>
        </tr>
        <tr>
          <td><?php
		  
		  include_once "includes/smile.php";
$it_edi = mysql_query("SELECT DISTINCT edition FROM paper");
	 while($info_edi = mysql_fetch_object($it_edi)){

 echo "<a href='?edi=$info_edi->edition'>Edition $info_edi->edition</a> / ";
}
?>

</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>

<?php


echo "<tr>";
$it = mysql_query("SELECT * FROM paper WHERE edition='$edi'");
	 while($info = mysql_fetch_object($it)){

 if ($swithcer == 0) {

	echo "


    <td><table width=100% border=1 cellspacing=0 cellpadding=0 bordercolor='000000' bgcolor='666666'>
        <tr>
          <td height=22 background=$gradient>$info->title</td>
        </tr>
        <tr>
          <td>".replace($info->news)." <br><font color='red'> Written by: $info->by</font></td>
        </tr>
      </table></td>";

$swithcer=1;
}else{ echo "

      <td><table width=100% border=1 cellspacing=0 cellpadding=0 bordercolor='000000' bgcolor='CCCCCC'>
        <tr>
          <td height=22 background=$gradient>$info->title</td>
        </tr>
        <tr>
          <td>".replace($info->news)." <br><font color='red'> Written by: $info->by</font></td>
        </tr>
      </table></td>";
$swithcer=0;
echo "</tr><tr>";
}

}
?>

  
</table>
</body>
</html>
              <a href="paperCP.php" target="main">&gt; Editors Click Here</a> <br />
<?php require_once "includes/footer.php"; ?>
