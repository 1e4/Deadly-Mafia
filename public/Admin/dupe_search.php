<?php 


session_start(); 


header("Cache-control: private"); 


include "db_connect.php";


include "functions.php";


echo "$style";


logincheck();





$ip=$_POST['ip'];





$userlevl = mysql_query("SELECT userlevel FROM users WHERE username='$username'");


while($successa = mysql_fetch_row($userlevl)){


	$userlevel = $successa[0];


	


}


if ($userlevel == 0){


echo "Error.";


}elseif ($userlevel > 0){














?>





<html>


<link rel="stylesheet" href="add/style.css" type="text/css">


<center>





<table border=1 cellspacing=0 cellpadding=2 width=75% class=thinline bordercolor=black><tr>


<td colspan=3 align=center background=images/topic.jpg><font color='#FFFFFF'>Dupes</font></td></tr>


<div id="lt">


<td class=header align=center width=33%>Username</td>


<td class=header align=center width=33%>Registered ip</td>


<td class=header align=center width=33%>Last online</td>


<td class=header align=center width=33%>Modkill</td>


</tr>	


<?


$test = mysql_query("SELECT * FROM users WHERE status='Alive' AND l_ip = '$ip' OR r_ip = '$ip'");


while($man = mysql_fetch_object($test)) {





$lol = mysql_query("SELECT * FROM users WHERE l_ip = '$ip' OR r_ip = '$ip'");


$rows = mysql_num_rows($lol);





?>








<? 





$loc = gmdate('Y-m-d h:i:s',$man->octime);





$onny = gmdate('Y-m-d h:i:s',$man->online);











if ($bgcolorswithcer == "0"){





$color_td = "#FFFFFF";


$bgcolorswithcer = '1';


 }


if ($bgcolorswithcer == '1'){





$color_td = "#666666"; 


$bgcolorswithcer = '0';


} 





if($rows > 0) {














if ($man->octime == ""){


echo "<tr bgcolor=$color_td><td><b>$man->username</a></td>< <td>$man->r_ip</td><td>$onny</td><td><a href= 'kill_user_submit.php->username'>Modkill</a></td></tr>";


}else{





echo "<tr bgcolor=$color_td><td><b>$man->username</a></td><td>$man->r_ip</td><td>$onny</td><td><a href= 'kill_user_submitit.php->username'>Modkill</a></td></tr>";


}





}


}


}


?>