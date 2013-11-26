<?php
include "includes/functions.php";
include "includes/db_connect.php"; 
logincheck();
$high1 = time() - (3600 * 24) * 7;
$high = time() - (3600 * 24);

 $num_of_ppl1 = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$high1'")); 

 $num_of_ppl = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$high'"));
$mostever=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));
$total_users=mysql_num_rows(mysql_query("SELECT * FROM users"));


echo "
$style
<center><p>";

echo "<table width=500 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>
    <tr>
      <td height=22 background=$gradient>
<center class=TableHeading>
          Online Gangsters In The Last 1 Minuite 
        </center></td>
    </tr>
    <tr>
      <td bgcolor=$td_bg>
<table width=100%  border=0 cellspacing=2 cellpadding=2>
        <tr>
            <td bgcolor=$td_bg>&nbsp; 

            ";

//////GAY THINGS ABOVE/////

$timenow = time();
$select = mysql_query("SELECT * FROM users WHERE online > '$timenow'");
$num = mysql_num_rows($select);
while ($i = mysql_fetch_object($select)){

echo "<a href='profile.php?viewuser=$i->username'>$i->username</a> |";

}
echo "</td>
        </tr>
      </table></td>
    </tr>
  </table>";

echo "

<p>&nbsp;</p>
<table width='98%' border='0' cellspacing='5' cellpadding='0'>
  <tr> 
    <td width='49%'><table width=261 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>
        <tr> 
          <td width='257' height=22 background=$gradient> <center class=TableHeading>
              Other: </center></td>
        </tr>
        <tr> 
          <td height='104' bgcolor=$td_bg> <table width=100%  border=0 cellspacing=2 cellpadding=2>
              <tr> 
                <td width='69%'><strong><font size='4'>Total users online:</font></strong></td>
                <td width='31%'><strong><font size='4'>".makecomma($num)."</font></strong></td>
              </tr>
              <tr> 
                <td><font color='#000000'>Most ever users online:</font></td>
                <td width='31%'>$mostever->online</td>
              </tr>
              <tr> 
                <td>Online in last 24hrs</td>
                <td>
      $num_of_ppl  
 </tr>
              <tr> 
                <td>Total users:</td>
                <td>$total_users</td>
              </tr>
              <tr> 
                <td>Online in last week:</td>
                <td>  $num_of_ppl1

</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width='51%'><table width=261 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>
        <tr> 
          <td width='257' height=22 background=$gradient> <center class=TableHeading>
              Key: 
            </center></td>
        </tr>
        <tr> 
          <td bgcolor=$td_bg> <table width=100%  border=0 cellspacing=2 cellpadding=2>
              <tr> 
                <td width='69%'><font color='#FF8040'>Admin</font></td>
                <td width='31%' bgcolor='#0000CC'>&nbsp;</td>
              </tr>
              <tr> 
                <td><font color='#FFFF00'>Moderators</font></td>
                <td bgcolor='#FF0000'><font color='#FF0000'>&nbsp;</font></td>
              </tr>
              <tr> 
                <td>Donaters (<font color='gold'>*</font>Name)</td>
                <td bgcolor='gold'>&nbsp;</td>
              </tr>
              <tr> 
                <td><strong>Crew owners</strong></td>
                <td><strong>Bold</strong></td>
              </tr>
              <tr> 
                <td><u>Casino owners</u></td>
                <td><u>Underlined</u></td>
              </tr>
              <tr> 
                <td><em>Friends</em></td>
                <td><em>Italic</em></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>

";


require_once "includes/footer.php";
?>
