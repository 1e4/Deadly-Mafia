
							 

<?
session_start();


include_once "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
echo "$style"; 

$query = MYSQL_QUERY( "SELECT * FROM `users` WHERE username='$mysite_username'");
$cash = MYSQL_RESULT( $query,0, points );

echo "<b>points:</b> £$points<br>";
?>
<br>
<table>
<tr>
<td>
<form action="points.php" method="post">
<font face="verdana" color="#bccbdc" size="1.5">
Send to:</font></td> <td><input type="text" name="sendto" size="25"><br></td></tr>
<tr><td><font face="verdana" color="#bccbdc" size="1.5">Amount to send:</td> <td><input type="text" name="sendamount" size="25"><br></td></tr>
<tr><td>
<input type="submit" value="Send"></font>
</form></td></tr>
</table


></p>
							 
            </font></td>
        </tr>

</body>


</html>














