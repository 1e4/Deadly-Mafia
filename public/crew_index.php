<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel=stylesheet href=includes/in.css type=text/css>
<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr> 
    <td><table width="100%" height="23" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
        <tr> 
          <td height="21"> 
            <div align="center"><a href="?page=">Main</a></div></td>
          <td><div align="center"><a href="?page=1">Users</a></div></td>
          <td><div align="center"><a href="?page=2">Profile</a></div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?php $page=strip_tags($_GET['page']); if ($page == "1"){ include_once"crew_users.php"; }elseif ($page == "2"){ include_once"crew_profile.php"; }elseif ($page == "3"){ include_once"crew_front.php"; }else{ include_once"crew_main.php"; } ?>
      <div align="center"></div></td>
  </tr>
</table>
<br>
</body>
</html>
