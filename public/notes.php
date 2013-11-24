<?php
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$user=mysql_fetch_object($query1);

if (($_POST['change_notes']) && ($_POST['notes'])){
$notes=strip_tags($_POST['notes']);

mysql_query("UPDATE users SET notes='$notes' WHERE username='$username'");
echo "Your notes have been updated"; 
}
?>
<html>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<center>
  <br>
  <table width="500" border="1" class="thinline" rules="none" cellpadding="0" cellspacing="0" bordercolor="" bgcolor="">
    <tr>
      <td background="includes/grad.jpg">
		<p align="center">Your Notes </div></td>
    </tr>
    <tr>
      <td ><table width="100%" height="383"  border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td><form action="" method="POST">
         
              <br>
              <center><textarea name="notes" cols="90" rows="15" id="notes"><?php echo "$fetch->notes"; ?></textarea>
              </center>
              <br>

              <br>
              <center><input name="change_notes" type="submit" id="change_notes" value="submit">
              </center><br>        
          </form></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <p>&nbsp;</p>
</center><p>
<?php include_once"includes/footer.php"; ?>
</body>
</html>