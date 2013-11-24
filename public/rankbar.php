<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$retard1 = mysql_query("SELECT `rankpoints`, `rank` FROM `users` WHERE `username`='$username'");
while($retard = mysql_fetch_row($retard1)){
	$rankp= $retard[0];
$currank= $retard[1];


}
if ($currank == "Tramp"){
$max = "90";
$old="0";
}elseif ($currank == "Paper Kid"){
$max = '120';
$old="90";
}elseif ($currank == "Theif"){
$max = '220';
$old="120";
}elseif ($currank == "Robber"){
$max = '350';
$old="220";
}elseif ($currank == 'Gangster'){
$max = '460';
$old="350";
}elseif ($currank == "Hitman"){
$max = '880';
$old="460";
}elseif ($currank == "Consultant"){
$max = '1000';
$old="880";
}elseif ($currank == "Assassin"){
$max = '1300';
$old="1000";
}elseif ($currank == "Made Man"){
$max = '3500';
$old="1300";
}elseif ($currank == "Bouncer"){
$max = '6500';
$old="3500";

}elseif ($currank == "Club Owner"){
$max = '9500';
$old="6500";
}elseif ($currank == "Druglord"){
$max = '10900';
$old="9500";

}elseif ($currank == "Boss"){
$max = '11800';
$old="10900";
}elseif ($currank == "Respectable Boss"){
$max = '12000';
$old="11800";
}elseif ($currank == "Honored Boss"){
$max = '13500';
$old="12000";
}elseif ($currank == "Cugine"){
$max = '14500';
$old="13500";

}elseif ($currank == "Godfather"){
$max = '16000';
$old="14500";
}elseif ($currank == "Legendary Godfather"){
$max = '18000';
$old="16000";
}elseif ($currank == "Don"){
$max = '39000';
} 
$percent = round((($rankp-$old)/($max-$old))*100, 2);
?>
<?php echo "$style"; ?>
<p align="center"><strong>Rank Bar(Rounded to 2 decimal places):</strong></p>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000" bgcolor="#666666">
  <tr>
    <td height="76">
<table width="<? echo $percent; ?>%" height="70" border="1" cellpadding="0" cellspacing="0" bordercolor="#003300" bgcolor="#003300">
        <tr> 
          <td width="<? echo $percent; ?>%" height="53">&nbsp;<font color="#000000" size="5"><strong><? echo "$percent";print "%"; ?> 
            </strong></font> </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>


