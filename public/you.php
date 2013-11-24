<?php session_start(); include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck(); 

$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username'");

$fetch=mysql_fetch_object($query);

?><link href="includes/test.css" rel="stylesheet" type="text/css"><?



$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");

$info=mysql_fetch_object($query1);



$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->donate != "1"){

  



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





<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">



<table width="755" border="0" align="center" cellpadding="0" cellspacing="3">

  <!--DWLayoutTable-->

  <tr> 

    <td width="370" height="174" valign="top">

	<table width="370" border="1" cellpadding="2" cellspacing="0" bordercolor="black" bgcolor="#666666" class=thinline height="136">

        <!--DWLayoutTable-->

        <tr>

          <td background="includes/grad.jpg" colspan="2" height="18"><div align="center">Waiting 

              times</div></td>

        </tr>

		<tr>

          <td ><strong>Crime</strong></td>

          <td height="18"> 

            <?php  if ($fetch->lastcrime <= time()){ echo "<font color=green>Ready</font>"; }else{   echo "".maketime($fetch->lastcrime).""; } ?>

          </td>

        </tr>

		<tr>

          <td ><strong>GTA</strong></td>

          <td height="18" > 

            <?php  if ($fetch->lastgta <= time()){ echo "<font color=green>Ready</font>"; }else{   echo "".maketime($fetch->lastgta).""; } ?>

          </td>

        </tr>

		<tr>

          <td><strong>Extortion</strong></td>

          <td height="16"> 

            <?php if ($fetch->last_ext < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_ext).""; } ?>

          </td>

         </tr>

		<tr>

          <td><strong>Order</strong></td>

          <td height="16"> 

            <?php if ($fetch->last_order < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_order).""; } ?>

          </td>

        </tr>

		<tr>

          <td><strong>Next race</strong></td>

          <td height="16"> 

            <?php if ($fetch->last_race < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_race).""; } ?>

          </td>

        </tr>

		<tr>

          <td><strong>Next kill attempt</strong></td>

          <td height="16"> 

            <?php if ($fetch->last_kill < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_kill).""; } ?>

          </td>

         </tr>

		<tr>

          <td width="181"><strong>Next flight</strong></td>

          <td height="16" width="175"> 

            <?php if ($fetch->lasttravel < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->lasttravel).""; } ?>

          </td>

        </tr>

      </table></td>

    <td width="376" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" bgcolor="#666666" class=thinline>

        <!--DWLayoutTable-->

        <tr> 

          <td background="includes/grad.jpg" colspan="2"><div align="center">Counters</div></td>

        </tr>

        <tr> 

          <td width="184" ><strong>Crimes</strong></td>

          <td width="177"><?php echo "".makecomma($info->crimes).""; ?></td>

        </tr>

       <tr> 

          <td width="184" ><strong>Busts</strong></td>

          <td width="177"><?php echo "".makecomma($info->busts).""; ?></td>

        </tr>

        <tr> 

          <td ><strong>GTA's</strong></td>

          <td ><?php echo "".makecomma($info->gtas).""; ?>

        </tr>

          <p>&nbsp;</p></td>

      </table></td>

  </tr>

  <tr> 

    <td height="138" valign="top"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">

        <!--DWLayoutTable-->

        <tr> 

          <td width="375" height="138">

			<table width="370" border="1" cellpadding="2" cellspacing="0" bordercolor="black" bgcolor="#666666" class=thinline height="88">

              <!--DWLayoutTable-->

              <tr>

                <td background="includes/grad.jpg" colspan="2" height="18"><div align="center">Inventory</div></td>

              </tr>

				<tr>

                <td ><strong>Weapon</strong></td>

                <td height="18"><?php echo "$fetch->weapon"; ?></td>

              </tr>

				<tr>

                <td ><strong>Protection</strong></td>

                <td height="18" ><?php echo "$fetch->protection"; ?></td>

              </tr>

				<tr>

                <td><strong>Plane</strong></td>

                <td height="16"><?php echo "$fetch->plane"; ?></td>

              </tr>

				<tr>

                <td width="181"><strong>Bullets</strong></td>

                <td height="16" width="175"><?php echo "".makecomma($fetch->bullets).""; ?></td>

              </tr>

            </table></td>

        </tr>

      </table></td>

    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

        <!--DWLayoutTable-->

        <tr> 

          <td width="380" height="138">

			<table width="376" border="1" cellpadding="2" cellspacing="0" bordercolor="black" bgcolor="#666666" class=thinline height="162">

              <!--DWLayoutTable-->

              <tr>

                <td colspan="2" background="includes/grad.jpg" height="18"><div align="center">Your 

                    information</div></td>

              </tr>

				<tr>

                <td ><strong>User ID</strong></td>

                <td height="18">#<?php echo "$fetch->id"; ?></td>

              </tr>

				<tr>

                <td ><strong>Username</strong></td>

                <td height="18"><?php echo "$fetch->username"; ?></td>

              </tr>

				<tr>

                <td ><strong>Money</strong></td>

                <td height="18" >&pound;<?php echo "".makecomma($fetch->money).""; ?></td>

              </tr>

				<tr>

                <td ><strong>Registered date</strong></td>

                <td height="18" ><?php echo "$fetch->regged"; ?></td>

              </tr>

				<tr>

                <td ><strong>Rank</strong></td>

                <td height="18" ><?php echo "$fetch->rank"; ?></td>

              </tr>

				<tr>

                <td ><strong>Rep.</strong></td>

                <td height="18" ><?php echo "$fetch->rankpoints"; ?></td>

              </tr>

				<tr>

          <td><strong>Kills</strong></td>

          <td height="16"><?php echo "".makecomma($info->kill_skill).""; ?></td>

        		</tr>

				<tr>

                <td width="188" ><strong>Location</strong></td>

                <td height="18" width="174" ><?php echo "$fetch->location"; ?></td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

  <tr> 

    <td height="48" valign="top"> </td>

    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>

  </tr>

</table></td>

  </tr>

  <tr> 

    <td height="32"><table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">

        <!--DWLayoutTable-->

        <tr> 

          <td width="370" background="includes/grad.jpg" valign="top"><div align="center">Health</div></td>

        </tr>

        <tr> 

          <td height="25" valign="top"> <table width="<?php echo "$fetch->health"; ?>%" border="1" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>

              <tr> 

                <td width="18" bgcolor="green"><?php echo "$fetch->health"; ?>%</td>

              </tr>

            </table></td>

        </tr>

      </table></td>

    <td>&nbsp;</td>

  </tr>

  <tr> 

    <td height="44">&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

</table>

<div align="center"></div>

<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<? }else{

echo "To buy access to this page contact an admin. It costs £1.50 The page countains a rankbar, your user id,

crime and gta counters as well as how long you have left before your next crimes, gtas etc



You only need to buy once as it will be rolled over to your new account if you die.

";

}?>