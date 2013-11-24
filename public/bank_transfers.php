<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();


$username2=$_POST['search_username'];

$u_stats=mysql_query("SELECT * FROM users WHERE username='$musername'");

$s = mysql_fetch_object($u_stats);

?>
<br><center>IP used to sign up: 

IP used last signed in with:
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
     <td class="header" colspan=4><center>
        <span class="style1">Last 10 sent (Show all)        </span>
     </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>To</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>

  
  <? $ka=mysql_query("SELECT * FROM `transfers` WHERE `from`='$username2' ORDER BY id DESC LIMIT 10");
       while($pa=mysql_fetch_object($ka)){
	   echo "
	   <tr>
          <td>$pa->id</td>
          <td><a href='profile.php?viewuser=$pa->to'>$pa->to</a></td>
          <td>£".makecomma($pa->amount)."</td>
          <td>$pa->date</td>
        </tr>";
		}
		?>
</table>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header" colspan=4><center>
        <span class="style1">Last 20 recieved (Show all)        </span>
    </center></td>
  </tr>
  <tr> 
    <td> <tr bgcolor=white> 
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>From</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
        <? $k=mysql_query("SELECT * FROM `transfers` WHERE `to`='$username2' ORDER BY id DESC LIMIT 20");
       while($p=mysql_fetch_object($k)){
	   echo "
	   <tr>
          <td>$p->id</td>
          <td><a href='profile.php?viewuser=$p->from'>$p->from</a></td>
          <td>£".makecomma($p->amount)."</td>
          <td>$p->date</td>
        </tr>";
		}
		?>
      </table></td>
  </tr>
</table>

