<?php
session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";

logincheck(); ?>
<link href="includes/test.css" rel="stylesheet" type="text/css">
<?
function script_check($file){
global $gradient;
global $td_bg;
global $td_border;
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->last_script_check < time()){

if (strip_tags($_POST['script_check']) && strip_tags($_POST['subby'])){
if (strip_tags($_POST['script_check']) != $fetch->ver_code){
$error="1";
}else{
$time=time()+(60*12);
mysql_query("UPDATE users SET last_script_check='$time' WHERE username='$username'");
echo "Please Continue";
echo"<SCRIPT LANGUAGE='JavaScript'>
history.go(-1)

</script>";
}
}


echo "
<form name='form1' method='post' action=''>
  <table width='37%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
    <tr> 
      <td class=header><center>
         Verification </center></td>
    </tr>
	<tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td bgcolor=666666><table width='100%' border='0' cellspacing='3' cellpadding='0'>
          <tr> 
            <td colspan='2'><div align='center'>Type In the verification Code<br>
                If you get it wrong, you cannot get to the page.</div></td>
          </tr>
          <tr> 
            <td colspan='2'><div align='center'><img src='ver.php'></div></td>
          </tr>
          <tr> 
            <td>Code above:</td>
            <td> "; ?>
             <?php if ($error == "1"){ ?><link href="includes/test.css" rel="stylesheet" type="text/css">

<div align="center">
 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#666666">
                <tr>
                  <td></div>
<? }
echo "<input name='script_check' type='text' id='script_check2'>";
                  if ($error == "1"){ echo "Please Try Again</td>
                </tr>
              </table>";
			  }
			  
			  
			echo "  </td>
          </tr>
          <tr> 
            <td colspan='2'><div align='center'> 
                <input name='subby' type='submit' id='subby' value='Enter Verification'>
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
";
exit();
}


}

?>