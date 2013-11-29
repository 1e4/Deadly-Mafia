<?php



session_start();



include "includes/functions.php";

include"includes/smile.php";

logincheck();

$username=$_SESSION['username'];

$viewuser=$_GET['viewuser'];



$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$viewuser'"));

if (!$fetch){

echo "No such user";

exit();

}





?>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="includes/test.css">

	

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">





<center><br>



<div align="center"><br />

  <table bgcolor="black" width="90%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000000">

   

</center>

    <tr>

      <td bgcolor="black"width="4%" bgcolor="#000000" align="right">&nbsp;</td>

      <td bgcolor="black"width="8%" bgcolor="#000000" align="right"><strong><center><font color=#625D5D>Username:</color></strong></td>

<td bgcolor="black"width="27%" bgcolor="#000000"><?php echo "

<font color=#2B60DE><b><allign=right><a href='send.php?fromper=$viewuser'>$viewuser</a></b></color>"; ?>

</td></div>

</color></b>



   

 

      <td bgcolor="black"bgcolor="#000000" width="40%">&nbsp;</td>



   

 

      <td bgcolor="black"bgcolor="#000000" width="5%" align="left"><strong><center><font color=#625D5D>Status:</color></strong></td>

            <td bgcolor="black"bgcolor="#000000" width="14%"><?php

$time_min=time() - (60 * 1);

$time_five=time() - (60 * 4);

$time_day=time() - (60 * 24);

$time_year=time() - (60 * 300);

if ($fetch->online > $time_min){

$state="<font color=green><b>Online</b></font>";

}elseif ($fetch->online > $time_five){

$state="<font color=RED><b>Offline</b></font>";

}elseif ($fetch->online > $time_day){

$state="<font color=RED><b>Offline</b></font>";

}elseif ($fetch->online > $time_year){

$state="<font color=RED><b>Offline</b></font>";

}



           echo "$fetch->status ($state)"; ?>

    </td>

</tr>

    <td bgcolor="black"bgcolor="#000000" align="right">&nbsp;</td>

    <td bgcolor="black"bgcolor="#000000" align="right"><strong><center><font color=#625D5D>Rank:</color></strong></td>

      <td bgcolor="black"bgcolor="#000000"><?php

      if($fetch->rank == "Official Bliss Godfather") { echo "<font color=red><b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Scum") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Tramp") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Chav") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Vandal") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Business Man") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Hitman") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Agent") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Boss") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Assassin") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Godfather") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Global Threat") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "World Dominator") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Untouchable Godfather") { echo "<b>$fetch->rank"; }?>

<?php

      if($fetch->rank == "Legend") { echo "<b>$fetch->rank"; }?>

<?php

      

      if($fetch->userlevel == "1") { echo "<font color='green'><b> [ForumMOD]"; }

      if($fetch->userlevel == "2") { echo "<font color=red><b> [MOD]"; }

      if($fetch->userlevel == "3") { echo "<font color='blue'><b> [Admin]"; }

if($fetch->userlevel == "4") { echo "<font color='blue'><b> [Admin]"; }

      ?></td></td></color></b>

    

      <td bgcolor="black"bgcolor="#000000" width="40%">&nbsp;</td>

    

      <td bgcolor="black"bgcolor="#000000" width="5%" align="left"><strong><center><font color=#625D5D>Wealth:</color></strong></td>

      <td bgcolor="black"bgcolor="#000000" width="14%"><?php

		if ($fetch->money >= "0" && $fetch->money < "50000"){ $wealth = "<b>Begger</b>"; }

		elseif ($fetch->money >= "50000" && $fetch->money < "1000000"){ $wealth = "<b>Survives</b>"; }

		elseif ($fetch->money >= "1000000" && $fetch->money < "5000000"){ $wealth = "<b>Millionaire</b>"; }

		elseif ($fetch->money >= "5000000" && $fetch->money < "10000000"){ $wealth = "<b>Multi Millionaire Tycoon</b>"; }	 

		elseif ($fetch->money >= "10000000" && $fetch->money < "25000000"){ $wealth = "<b>Sleeps In Money</b>"; }

		elseif ($fetch->money >= "25000000" && $fetch->money < "50000000"){ $wealth = "<b>Runs The Bank</b>"; }

		elseif ($fetch->money >= "50000000" && $fetch->money < "100000000"){ $wealth = "<b>Worldwide Millionaire</b>"; }

		elseif ($fetch->money >= "100000000" && $fetch->money < "500000000"){ $wealth = "<b>Haxor</b>"; }

		elseif ($fetch->money >= "500000000" && $fetch->money < "1000000000"){ $wealth = "<b>Multi HAX</b>"; }

		elseif ($fetch->money >= "1000000000" && $fetch->money < "2000000000"){ $wealth = "<b>Billionaire</b>"; }



		elseif ($fetch->money >= "2000000000"){ $wealth = "<b><font color=#FF0000>Trillionaire</color></b>"; }

echo "$wealth";

?></td>

    </tr>



    <tr>

      <td bgcolor="black"bgcolor="#000000" align="right">&nbsp;</td>

      <td bgcolor="black"bgcolor="#000000" align="right"><strong><center><font color=#625D5D>Crew:</color></strong></td>

      <td bgcolor="black"bgcolor="#000000"><b><?php if ($fetch->crew == "0"){ echo "None"; }else{ echo "$fetch->crew" ;  } ?></td></b></color>



<td bgcolor="black"bgcolor="#000000" width="40%">&nbsp;</td>



<td bgcolor="black"bgcolor="#000000" width="5%" align="left"><strong><center><font color=#625D5D>Gender:</color></strong></td>

      <td bgcolor="black"bgcolor="#000000" width="14%"><?php echo "$fetch->gender" ?></td>



    <tr>

      <td bgcolor="black"bgcolor="#000000">&nbsp;</td>

      <td bgcolor="black"bgcolor="#000000"><strong></strong></td>

      <td bgcolor="black"colspan="3" bgcolor="000000"><br /><br /><center><?php echo "".replace($fetch->quote).""; ?><br /><br /></td>

    </tr>



<embed src="<?php echo "".addslashes($fetch->music).""; ?>" width=10 height=10 play=true loop=true quality=high>

</embed>







  </table>  

  <br />

  

  

  </center>

</div>

</body>

</html>



<? include_once"includes/footer.php"; ?>