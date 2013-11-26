<?
include "functions.php";
logincheck();

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$shit=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));

$userlevel=$fetch->userlevel;

$choose_car = $_POST['choose_p'];






if($userlevel == "2"){


if((!$choose_car)){

}else{

$choose_p=$choose_car;

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'SET SITE STATUS $choose_p.', '$userlevel')");

if ($choose_p == "1"){
mysql_query("UPDATE site_stats SET closed='0' WHERE id='1'");
print "Sucsessful";
}

if($choose_p == "2"){
mysql_query("UPDATE site_stats SET closed='1' WHERE id='1'");
print "Sucsessful";
}

if($choose_p == "3"){
mysql_query("UPDATE site_stats SET closed='2' WHERE id='1'");
print "Sucsessful";
}

if($choose_p == "4"){
mysql_query("UPDATE site_stats SET closed='3' WHERE id='1'");
print "Sucsessful";
}

}

}

?>

<body bgcolor="#C0C0C0"><form name="car" method="post" action="">
  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td valign="top"> <table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" class="header"><center>
                Set Site Status</center></td>
          </tr>
          <tr> 
            <td height="101" colspan="2" valign="top"><table width="741" border="0" cellpadding="0" cellspacing="3">
                <tr> 
                  <td width="33" height="10"><input name="choose_p" type="radio" value="1">
                  <td width="339">Site Open To All</td>
                  <td width="4" rowspan="5"></td>
                </tr>
                <tr> 
                  <td height="21" width="33"><input type="radio" name="choose_p" value="2"></td>
                  <td height="21" width="339">Site Open To Mods & Admin</td>>
                </tr>
                <tr> 
                  <td height="21" width="33"><input type="radio" name="choose_p" value="3"></td>
                <td height="21" width="339">Admin Only</td>
                </tr>
                <tr> 
                  <td height="20" width="33"><input type="radio" name="choose_p" value="4"></td>
                  <td height="20" width="339">LOCKDOWN SITE (site can only be opened by the database).</td>
                </tr>
                <tr> 
                  <td height="8" width="33">&nbsp;</td>
                  <td height="8" width="339">&nbsp;</td>
                  <td height="8" colspan="2" width="337"><input type="submit" id="choose_p" value="Set Status"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </form>
  </table>