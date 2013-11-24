<?php
                 ///// Logout All Users Admin Tool /////
///// LICENCED TO E-MAFIA - BEN BLAKELEY AND TOM OSBORNE PRODUCTIONS/////
              ///// REPRODUCTION PROHIBITED E-Mafia™ /////

include "functions.php";

logincheck();


$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

if($userlevel > "0"){

$choose_car = $_POST['choose_p'];



if((!$choose_car)){

}else{

$choose_p=$choose_car;
////////////////////////////////////////////////////////////////
if ($choose_p == "1"){
mysql_query("UPDATE site_stats SET logou='0' WHERE id='1'");
print "Sucsessful";
////////////////////////////////////////////////////////////////
}elseif ($choose_p == "2"){
mysql_query("UPDATE site_stats SET logou='1' WHERE id='1'");
print "Sucsessful";
////////////////////////////////////////////////////////////////

}

}




}else{
print "You are not authorised to use this feature";
}


?>


<html>

<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style></head>

<body>
<form name="car" method="post" action="">
    <tr> 
      <td valign="top"> <table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" class="header"><center>Update Site Status</center></td>
          </tr>
          <tr> 
            <td height="101" colspan="2" valign="top"><table width="741" border="0" cellpadding="0" cellspacing="3">
                <tr> 
                  <td width="33" height="10"><input name="choose_p" type="radio" value="1">
                  <td width="339">Allow users to stay online.</td>
                  <td width="4" rowspan="5"></td>
                </tr>
                <tr> 
                  <td height="20" width="33"><input type="radio" name="choose_p" value="2"></td>
                  <td height="20" width="339">Make all users log out.</td>
                </tr>
               <tr> 
                  <td height="8" width="33">&nbsp;</td>
                  <td height="8" width="339"><input name="submit" type="submit" id="choose_p" value="Confirm"></td>
                  <td height="8" colspan="2" width="337">&nbsp;</td>
               </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
</form>
</body>
</html>
