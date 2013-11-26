<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



$in=mysql_num_rows(mysql_query("SELECT * FROM safe WHERE username='$username'"));
if ($in !="0" && strip_tags($_GET['leave'])){

mysql_query("DELETE FROM safe WHERE username='$username'");
echo "You left the Safehouse.";

}



if (strip_tags($_POST['Submit']) && strip_tags($_POST['mins'])){
$mins=intval(strip_tags($_POST['mins']));

		if ($mins == 0 || !$mins || ereg('[^0-9]',$mins)){
	print "Invalid amount of time.";
	
}elseif ($mins != 0 && $mins && !ereg('[^0-9]',$mins)){
$price=$mins*100000;
if ($price >  $fetch->money){
echo "You dont have enough money.";
}elseif($price <= $fetch->money){


$check=mysql_num_rows(mysql_query("SELECT * FROM safe WHERE username='$username'"));

if ($check != "0"){
echo "You are already in a safe house you need to wait for time to expire!";
}elseif  ($check == "0"){

$time=time()+($mins*60);
$new_money=$fetch->money - $price;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");



mysql_query("INSERT INTO `safe` ( `id` , `username` , `time` , `location` ) 
VALUES (
'', '$username', '$time', '$fetch->location'
)");

echo "You are now in the safehouse!";


}}}}




?>





<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<form action="" method=post>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="48%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class=header><center>
        Safehouse </center></td>
  </tr>
   <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2">Welcome to <?php echo "$fetch->location"; ?>'s safehouse, 
            if you hide in here then even the best detectives cannot find you! 
          It costs &pound;100,000 per min. You may spend up to 99 Minutes in the safehouse at one time. <br> </td>
        </tr>
        <tr> 
          <td>Mins to spend</td>
          <td><input name="mins" type="text" id="time" size="10" maxlength="2"> 
            <input type="submit" name="Submit" value="Submit"></td>
        </tr>
        <?
if ($in != "0"){
echo "<tr><td><a href=?leave=yes>Click here to leave the safehouse./a></tr></td>";
}
?>
      </table></td>
  </tr>
</table>
</body>
</html></form>
<?php require_once "includes/footer.php"; ?>