<?
session_start();
include "includes/db_connect.php"; 
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$secondcheck = mysql_num_rows(mysql_query("SELECT * FROM buisnesses WHERE owner='$username'"));
if ($secondcheck != "0"){
exit();
}elseif ($secondcheck == "0"){

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if (strip_tags($_POST['submit'])){
$color1 = strip_tags($_POST['color1']);
$color2=strip_tags($_POST['color2']);
$name=strip_tags($_POST['name']);
$logo = strip_tags($_POST['logo']);
$slogan=strip_tags($_POST['slogan']);

if ($slogan ==""  || $logo =="" || $name =="" || $color2 =="" || $color1 ==""){
echo "You need to enter all the information. You missed out:<p>";
if ($slogan ==""){
echo "Your companys slogan<br>";
}
if ($logo ==""){
echo "Your companys logo<br>";
}
if ($name ==""){
echo "You companys name<br>";
}
}else{
if ($size == "1"){
$price = "10000";
}elseif ($size == "2"){
$price= "200000";
}elseif ($size == "3"){
$price= "400000";
}elseif ($size == "4"){
$price= "1000000";
}elseif ($size == "5"){
$price= "2000000";
}
$price = $price + 10000;
if ($fetch->money < $price){
echo "You dont have enough money";
}elseif ($fetch->money >= $price){
$secondcheck = mysql_num_rows(mysql_query("SELECT * FROM buisnesses WHERE owner='$username'"));
if ($secondcheck == "0"){


mysql_query*("UPDATE users SET money=money-$price WHERE username='$username'");

echo "Success you can now start making money.";
mysql_query("INSERT INTO `buisnesses` ( `id` , `owner` , `size` , `profit` , `slogan` , `logo` , `color1` , `color2` ) 
VALUES (
'', '$username', '$size', '0', '$slogan', '$logo', '$color1', '$color2'
)");

}}}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php echo "$style"; ?>
<body>
<table width="48%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr>
    <td background =<?php echo "$gradient"; ?>><center class=TableHeading>DownTown</center></td>
  </tr>
  <tr>
    <td height="212">I thought i'd be seeing you here soon, welcome to the richest 
      and cleanest part of <?php echo "$fetch->location"; ?>, this is were buisness 
      men walk, were you look like a old tramp living on the streets. As i see 
      you have a desire to start up a buisness. Let me tell you, its not going 
      to be easy. First of all you need to buy a area to setup your buisness, 
      and then get it done up. But rember its going to take some investment.</td>
  </tr>
</table>
<br>
<form name="form1" method="post" action="">
  <table width="58%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr> 
      <td background=<?php echo "$gradient"; ?>><center class=Tableheading>
          Starting up a buisness</center></td>
    </tr>
    <tr> 
      <td><table width="100%" height="162" border="0" cellpadding="0" cellspacing="3">
          <tr> 
            <td width="55%">Company name:</td>
            <td width="45%"><input name="name" type="text" id="name2"></td>
          </tr>
          <tr> 
            <td>Shop size:</td>
            <td><select name="size" id="select">
                <option value="1">Small house-&pound;10,000</option>
                <option value="2">Large house-&pound;200,000</option>
                <option value="3">Small office-&pound;400,000</option>
                <option value="4">Large office-&pound;1,000,000</option>
                <option value="5">Huge office-&pound;2,000,000</option>
              </select> </td>
          </tr>
          <tr> 
            <td>Company slogan:</td>
            <td><input name="slogan" type="text" id="slogan2"></td>
          </tr>
          <tr> 
            <td>Company logo:</td>
            <td><input name="logo" type="text" id="logo2"></td>
          </tr>
          <tr> 
            <td>Company color scheme:</td>
            <td><input name="color1" type="text" id="color1"></td>
          </tr>
          <tr> 
            <td>Company color scheme 2:</td>
            <td><input name="color2" type="text" id="color2"></td>
          </tr>
          <tr> 
            <td>Note: <font color="#FF0000">theres is a &pound;10,000 setup fee</font> 
              <u>Not inc size.</u></td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><div align="right"> 
                <input name="submit" type="submit" id="submit" value="Create company">
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<br>
<br>
</body>
</html><?php } ?>
