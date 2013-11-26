<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



if ($Submit && $choice){
if ($choice == "1"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough Points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+10000 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "Money Purchased";
 ?></font></div></td>
    </tr>
  </table>
</div><?


}
}




}
if ($Submit && $choice){
if ($choice == "9"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon=Browning M2HB WHERE username='$username'");

echo "You bought the browning";

}
}




}
if ($Submit && $choice){
if ($choice == "4"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_oc=last_oc=0 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now OC";
 ?></font></div></td>
    </tr>
  </table>
</div><?


}
}




}
if ($Submit && $choice){
if ($choice == "5"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_race=last_race=0 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now race";
 ?></font></div></td>
    </tr>
  </table>
</div><?

}
}




}
if ($Submit && $choice){
if ($choice == "6"){
$cost="80";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET health=100 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You have 100% Health";
 ?></font></div></td>
    </tr>
  </table>
</div><?

}
}




}
if ($Submit && $choice){
if ($choice == "7"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET energy=+100 WHERE username='$username'");

echo "You have 100% energy";

}
}



}
if ($Submit && $choice){
if ($choice == "10"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET bullets=bullets+750 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got 750 bullets";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "3"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET lasttravel=lasttravel=0 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "Now you can fly";
 ?></font></div></td>
    </tr>
  </table>
</div>

<?
}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_order=last_order=0 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now order from the bar";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET protection=Doberman WHERE username='$username'");

echo "You can now order from the bar";

}
}




}
if ($Submit && $choice){
if ($choice == "25"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+10 WHERE username='$username'");

echo "You gained 10 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "11"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon='M16' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the M16";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

}
}




}
if ($Submit && $choice){
if ($choice == "12"){
$cost="60";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET plane='Private Jet' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the Private Jet";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "13"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET protection='Bunker' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the Bunker";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "1882"){
$cost="1";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_ext=0 WHERE username='$username'");

echo "You gained 1000 rankpoints";

}
}




}

?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="right"></div>
  <div align="left">
    <table width="753" height="200" border="0" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF">
<tr>
  <td><table width="79%"  border="1" align="center" cellPadding="2" cellSpacing="0" class="thinline" bordercolor=black>
          <tr >
            <td background="includes/grad.jpg"><center class=bold>
        Payment methods
            </center></td>
          </tr>
    <tr>
      <td><p align="center">If you want your message to appear in stats bar then you have to donate to the game . You have to ensure that you include your message in the paypal payments! and username if you want it included. 
        <p align="center">Only 3 messages will be included in the stats bar each day 
              <p align="center">If you want your message to appear then email:
              <p align="center">payments@the-mafia.us
              <p align="center">
                <p align="center">&nbsp;</p>
                    <p align="center">You can also purchase a mass message to every user in the game</p>
                    <p align="center">This will be seen by every player in the game, and because we do not want to be sending out messages all the time each</p>
                    <p align="center">mass message will cost &pound;10.00</p>
                    <p align="center">This can be up to 80 words and a picture of 250x250</p>
                    <p align="center">Please ensure in the paypal payment you enter the message you want and the link to the picture, max 250x250 or it wont be included, if you want your username include please state that as well, you will be messaged to tell you when the mass message will happen.</p>
                    <p align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHbwYJKoZIhvcNAQcEoIIHYDCCB1wCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYA8N24dp+mM2Kl4/7Qljs5/me5JELJDsKbodxqKnQ0nQix9U3fJNZq8YY9GA4OW/1pbg5A2C94L3ZIA1qZbom/B7K5Azlc6yEvrH/ATdwIsuDvy7iw/eVreBCmmCyg6+/CEpVNLhV1PrrT6p84iSNBa97VN/1VnNSOxzghjRKYSiDELMAkGBSsOAwIaBQAwgewGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQICuHS8ct571WAgcgX5Q0sIvn6yS4MD/+JwYM/P08RbHVJDmjXq+FpxBksPeR3N8qLcMa2XWFJyVv/6TMcYxmzYjcobLeUiwICmIR7mlyrZSy8CYcb9iq8PZuAZhLv7ronfRonIJpTktrfvWrVuA7iLax5BZsjRlcU328UTcSvyDXQQpXONTLK1edLal5pvGq94ZeBNgvuM1mjTcxo9aIIHQTyPjljVjVGnOmPBmdL78h3SRPxZcGaJBNXxgtbtmIz1Ix8xYHeHQGdrLNJPOA+esYtVaCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTA2MDYxMzE0MjYxMVowIwYJKoZIhvcNAQkEMRYEFE5bqcQkTixQYnREHDNwbNqG7LyZMA0GCSqGSIb3DQEBAQUABIGAOz36oJxfFMg8W1x93RzJmIysk4xgo+v69rYIuDX4/4Smay83Eodesj03mdram16Hks/bA/duaBrtSIbBm5OkezmJURlQLLXa0CBlPqmWj+Ult2CJ2rOuksmiWT6YHNJUREZJ8VUaaDKO2skNd8UFO5Hj0Sb0TCDJVVtg4xKjNIw=-----END PKCS7-----
">
</form></p>
                    <p align="center">
                  <p></p></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </div>
  <div align="center">
</form>
<div align="center">
  <div align="center">
     <p>&nbsp;</p>
</div>
  <p>&nbsp;</p>
</form>
</body>
</html>

  <div align="center">
    <p></p>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  </form>
  <p>&nbsp;</p>
</div>
<p>&nbsp;



<?php  ?>
 <?php echo"<p>"; include_once"includes/footer.php"; ?>

</p>
</form>
</body>
</html>

