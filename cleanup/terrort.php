<?php 
include_once 'includes/db_connect.php'; 
include_once 'includes/functions.php'; 
include_once 'includes/jail_check.php';

logincheck();
echo "$style";

$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch = mysql_fetch_object($above);
$terr=mysql_fetch_object(mysql_query("SELECT * FROM territory WHERE location='$fetch->location' AND owner='$username'"));
$stat12=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));

if ($terr->payouttime < time() && $terr->owner==$username){
$newtime=time()+86400;
$newmon = $fetch->money+$stat12->terr;
mysql_query("UPDATE territory SET payouttime=$newtime WHERE location='$fetch->location' AND owner='$username'");
mysql_query("UPDATE users SET money='$newmon' WHERE username='$username'");
echo "You just got $stat12->terr from your territory";
}

if (strip_tags($_GET['takeover']) && strip_tags($_GET['location'])){
$takeover=strip_tags($_GET['takeover']);
$location=strip_tags($_GET['location']);
$own=mysql_num_rows(mysql_query("SELECT * FROM territory WHERE owner='$username'"));
if ($own != "0"){
echo "You cannot own more than 1 terrotory";
}else{
$check =mysql_query("SELECT * FROM territory WHERE id='$takeover' AND location='$fetch->location'");
$num=mysql_num_rows($check);
$def=mysql_fetch_object($check);


if ($num != "0"){
if (strip_tags($_POST['Submit']) && strip_tags($_POST['trys'])){
$trys=intval(strip_tags($_POST['trys']));

$total = $trys*10000;


if ($total > $fetch->money){
echo "You dont have enough money.";
}elseif ($total <= 0){
echo "You cannot enter that amount";
}elseif ($total <= $fetch->money){
if ($trys <= $def->def){
echo "You did not get the Terrotory";
mysql_query("UPDATE territory SET def=def-$trys WHERE id='$takeover'");
$new_money = $fetch->money - $total;

mysql_query("UPDATE users SET money='$new_money' WHERE username='$username");
}elseif ($trys >= $def->def){

echo "You got the Terrotory";
mysql_query("UPDATE territory SET owner='$fetch->username' WHERE id='$takeover'");
mysql_query("UPDATE territory SET def='10' WHERE id='$takeover'");
}}}
echo "<form action='?takeover=$takeover&location=$location' method=POST><table width=53% border=1 align=center cellpadding=0 cellspacing=0 bordercolor=000000 class=thinline>
  <tr> 
    <td height=22 class=header><center class=TableHeading>
        <strong>Takeover Territory in $fetch->location</strong> 
      </center></td>
  </tr>
  <tr> 
    <td><table width=100% border=0 cellspacing=0 cellpadding=0>
        <tr> 
          <td width=72%>Amount of trys: (&pound;10,00 per try)</td>
          <td width=28%><input name=trys class=\"submit\" type=text id=trys size=10></td>
        </tr>
        <tr> 
          <td colspan=2><div align=center> </div></td>
        </tr>
        <tr> 
          <td colspan=2><div align=right>
              <input type=submit name=Submit class=\"submit\" value=Submit>
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
<link href="/includes/in.css" rel="stylesheet" type="text/css">
</head>

<body>
<p align="center" class="indexnav">Sorry Turf has been disabled. </p>
<table width="53%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="000000" class=thinline>
  <tr> 
    <td height=22 colspan="3" class=header><center class="TableHeading">
        <strong>Territory in <? echo "$fetch->location"; ?></strong> </center></td>
  </tr>
  <tr bgcolor=white> 
    <td class=tip>Owner</td>
    <td class=tip>Income(daily)</td>
    <td class=tip>Takeover</td>
  </tr>
  
  <?php
  $select = mysql_query("SELECT * FROM territory WHERE location='$fetch->location'");
  while($me = mysql_fetch_object($select)){
  
echo "
  <tr>
    <td>$me->owner</td>
    <td>$$stat12->terr</td>
    <td><a href='?takeover=$me->id&location=$me->location'>Takeover</a></td>
  </tr>";
  
    }
  ?>
</table>
</body>
</html>
<br>
<? include'footer.php' ?>