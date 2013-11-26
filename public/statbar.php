<?php

session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

echo "$style"; 

?><head>

<script language="javascript">







function Logout (){

	var del = confirm("Logging Out - Thanks For Playing, Come back soon!");

	if (del == true){

		var loc = "index.php?logout=yes";

		parent.top.location.href=loc;

	}

}

function Toggle(item) {

   obj=document.getElementById(item);

   visible=(obj.style.display!="none")

   key=document.getElementById("x" + item);

   if (visible) {

     obj.style.display="none";

   } else {

      obj.style.display="block";

   }

}

</script>



<head>

<script language="javascript">

function doit (){

	var del = confirm("Welcome to Murder Mafia. Click ok to go to the FAQs and learn how to play the game.);

	if (del == true){

		var loc = "faq.php";

		parent.top.location.href=middle;

	}

}

function toggle(idname){

    document.getElementById(idname).style.display = (document.getElementById(idname).style.display == 'none') ? 'block' : 'none';

}

</script></head><?









$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->tut == "0"){



echo "<SCRIPT language=\"JavaScript\"> doit(); </SCRIPT>";

mysql_query("UPDATE users SET tut='1' WHERE username='$username'");

}





?>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>









<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



</head>







<?php 

$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");



?>

<?



$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");

$inbox=mysql_num_rows($check);





$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");

$info=mysql_fetch_object($query1);









$currank=$fetch->rank;

$rankp = $fetch->rankpoints;



if ($currank == "Scum"){

$max = "200";

$old="0";

}elseif ($currank == "Tramp"){

$max = '400';

$old="200";

}elseif ($currank == "Chav"){

$max = '800';

$old="400";

}elseif ($currank == "Vandal"){

$max = '1600';

$old="800";

}elseif ($currank == "Business Man"){

$max = '3000';

$old="1600";

}elseif ($currank == "Hitman"){

$max = '5000';

$old="3000";

}elseif ($currank == "Agent"){

$max = '10000';

$old="5000";

}elseif ($currank == "Boss"){

$max = '20000';

$old="10000";

}elseif ($currank == "Assassin"){

$max = '75000';

$old="20000";

}elseif ($currank == "Godfather"){

$max = '230000';

$old="75000";

}elseif ($currank == "Global Threat"){

$max = '377000';

$old="230000";

}elseif ($currank == "World Dominator"){

$max = '61000';

$old="377000";

}elseif ($currank == "Untouchable Godfather"){

$max = '987000';

$old="610000";

}elseif ($currank == "Legend"){

$max = '1597000';

$old="987000";

}elseif ($currank == "Official Bliss Godfather"){

$max = '2584000';

$old="1597000";

} 

$percent = round((($rankp-$old)/($max-$old))*100);

?>



<html>

<head>

<meta http-equiv="refresh" content="100">



<title>Stats</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

body {

	font-family: Verdana;

	font-size: 16px;

	font-style: normal;

	font-weight: 1000;

	font-variant: normal;

	color: #FFFFFF;

	background-color: #000000;

	background-image: url(images/bg3.bmp);

}

</style>

</head>

<body style="background-image: url('images/grad.jpg')">



<div align="center"> 

  <table height="0" align="center">

      <tr valign="top">

        <th valign="middle">

				</th>

        <th height="30" align="center" valign="middle"></th>

<th height="30" align="center" valign="middle"></th><th height="30" valign="middle" scope="col"><?php if ($inbox > 0){ echo "<a href=inbox.php 

 target=main><img src=images/mail.gif border=0></a>"; } ?></font> </th>

        <th height="30" valign="middle" scope="col"> <font color='white'>Name: <font color='orange'><?php echo "$fetch->username"; ?></font>  </th>

        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>Rank: <font color='#1589FF'><?php echo "$fetch->rank"; ?></b></font> </th>

        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>HP: <font color='green'><?php echo "$fetch->health"; ?>%</font> </th>

	

        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>Crew: <font color='#1589FF'><?php echo "$fetch->crew"; ?></font> </th>

        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>Cash: <font color='#FDD017'><?php echo "£".makecomma($fetch->money).""; ?></font> </th>

		        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>Points: <font color='#808080'><?php echo "$fetch->points"; ?></font> </th>

        <th height="30" valign="middle" scope="col"> &nbsp;<font color='white'>Loc: <font color='#1589FF'><?php echo "$fetch->location"; ?></font> </th>

        <th valign="middle" scope="col"> <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">



        <table width="100" height="0" border="1" cellpadding="0" cellspacing="0" bordercolor="black">

          <tr>

            <td width='<?php echo "".makecomma($percent)."%"; ?>' height='1' bgcolor="green"><div align="center"><font color="#FFFFFF">

				<b>

                <?php echo "".makecomma($percent)."%"; ?></b></font></div></td>

            <td width='58%' bgcolor="red"><div align="center"></div></td>

          </tr>

        </table>

    </div></td>

  </tr>

        <th height="30" valign="middle" scope="col"> &nbsp;              <a href="javascript:Logout()"&gt;?> Logout</a></b></font> </th>

</table>

</body>

</html>

 </th>

		

		

      </tr>

  </table> 

</div>

</body>

</html>