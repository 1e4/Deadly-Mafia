<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();

echo "$style";

$username=$_SESSION['username'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch = mysql_fetch_object($above);
$terr=mysql_fetch_object(mysql_query("SELECT * FROM terr WHERE location='$fetch->location' AND owner='$username'"));
if (strtolower($terr->owner) == strtolower($username)){
echo "You own $terr->id";


}

if (strip_tags($_GET['takeover']) && strip_tags($_GET['location'])){
$takeover=strip_tags($_GET['takeover']);
$location=strip_tags($_GET['location']);
$own=mysql_num_rows(mysql_query("SELECT * FROM terr WHERE owner='$username'"));
if ($own != "0"){
echo "You cannot own more than 1 terrotory";
}else{
$check =mysql_query("SELECT * FROM terr WHERE id='$takeover' AND location='$fetch->location'");
$num=mysql_num_rows($check);
$def=mysql_fetch_object($check);


if ($num != "0"){
if (strip_tags($_POST['Submit']) && strip_tags($_POST['trys'])){
$trys=intval(strip_tags($_POST['trys']));

$total = $trys*10000;
if ($total > $fetch->money){
echo "You dont have enough money.";
}elseif ($total <= $fetch->money){
if ($trys <= $def->def){
echo "You did not get the Terrotory";
mysql_query("UPDATE terr SET def=def-$trys WHERE id='$takeover'");
$new_money = $fetch->money - $total;

mysql_query("UPDATE users SET money='$new_money' WHERE username='$username");
}elseif ($trys >= $def->def){

echo "You got the Terrotory";
mysql_query("UPDATE terr SET owner='$username' WHERE id='$takeover'");
}}}
echo "<form action='?takeover=$takeover&location=$location' method=POST><table width=53% border=1 align=center cellpadding=0 cellspacing=0 bordercolor=$td_border bgcolor=$td_bg >
  <tr> 
    <td height=22 background=$gradient><center class=TableHeading>
        <strong>Takeover Territory in $fetch->location</strong> 
      </center></td>
  </tr>
  <tr> 
    <td><table width=100% border=0 cellspacing=3 cellpadding=0>
        <tr> 
          <td width=72%>Amount of trys: (&pound;10,00 per try)</td>
          <td width=28%><input name=trys type=text id=trys size=10></td>
        </tr>
        <tr> 
          <td colspan=2><div align=center> </div></td>
        </tr>
        <tr> 
          <td colspan=2><div align=right>
              <input type=submit name=Submit value=Submit>
            </div></td>
        </tr>
      </table></td>
  </tr>
  
</table><p></form>
";


}}

}
?>




<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="53%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 colspan="3" background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Territory in <? echo "$fetch->location"; ?></strong> </center></td>
  </tr>
  <tr> 
    <td>Owner</td>
    <td>Income(daily)</td>
    <td>Takeover</td>
  </tr>
  
  <?php
  $select = mysql_query("SELECT * FROM terr WHERE location='$fetch->location'");
  while($me = mysql_fetch_object($select)){
  
echo "
  <tr>
    <td>$me->owner</td>
    <td>Income here</td>
    <td><a href='?takeover=$me->id&location=$me->location'>Takeover</a></td>
  </tr>";
  
    }
  ?>
</table>
</body>
</html>
