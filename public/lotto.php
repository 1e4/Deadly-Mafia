<?php session_start(); include "includes/db_connect.php"; include_once"includes/functions.php"; logincheck(); 
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$lotto_inf=mysql_fetch_object(mysql_query("SELECT * FROM lotto_info WHERE id='1'"));
$lotto = mysql_fetch_object(mysql_query("SELECT * FROM lotto"));
echo "$style"; 
$totalrows=mysql_num_rows(mysql_query("SELECT * FROM lotto"));
////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
if ($lotto_inf->time_to <= time()){
	$winner = rand(1,$winner);
	$winz=mysql_fetch_object(mysql_query("SELECT * FROM lotto WHERE id='$winner'"));
	$winner_stuff=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$winz->owner'"));

mysql_query("UPDATE users SET money = money+$lotto_inf->jackpot WHERE username='$winz->owner'");

$time = time() +(86400 * 3);
$new_num =$lotto_inf->lotto_num + 1;
	mysql_query("UPDATE lotto_info SET lotto_num = '$new_num', time_to='$time', winning_ticket='$winner', winner='$fetch_win->username', jackpot='0'");
mysql_query("TRUNCATE TABLE lotto");
}




////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
if (strip_tags($_POST['amount']) && strip_tags($_POST['Submit'])){
$amount=intval(strip_tags($_POST['amount']));
	if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){
	print "You cant buy that amount.";
	
}elseif ($amount != 0 || $amount || !ereg('[^0-9]',$amount)){



$cost= $lotto_inf->price * $amount;

if ($cost > $fetch->money){
echo "You dont have enough money";
}elseif ($cost <= $fetch->money){
$number=$amount;
$current = 0;
while ($current < $number) {


	mysql_query("INSERT INTO `lotto` (`id`, `owner`) VALUES ('', '$username');");

$current++;
}
mysql_query("UPDATE lotto_info SET jackpot=jackpot+$cost WHERE id='1'");
mysql_query("UPDATE users SET money=money-$cost WHERE username='$username'");
echo "$amount tickets bought";



}

}}
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> <link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form name="form1" method="post" action="">
  <table width="65%" border="1" align="center" cellpadding="2" cellspacing="0"  class=thinline bordercolor=black >
    <tr > 
      <td class=news height=20 colspan="2" background="includes/grad.jpg"><center>
          Lottery</center></td>
    </tr>
    <tr > 
      <td width="50%" bgcolor="666666" class=news>Lottery number:</td>
      <td width="50%" bgcolor="666666" class=news><?php echo "$lotto_inf->lotto_num"; ?></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>Price per ticket:</td>
      <td bgcolor="666666" class=news><?php echo "£".makecomma($lotto_inf->price).""; ?></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>The jackpot:</td>
      <td bgcolor="666666" class=news><?php echo "£".makecomma($lotto_inf->jackpot).""; ?></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>Tickets sold:</td>
      <td bgcolor="666666" class=news><?php echo "$totalrows"; ?></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>End date:</td>
      <td bgcolor="666666" class=news>
        <?php $cool = gmdate('Y-m-d h:i:s', $lotto_inf->time_to); echo "$cool"; ?>      </td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>Time left:</td>
      <td bgcolor="666666" class=news><?php echo "".maketime($lotto_inf->time_to).""; ?></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>Buy tickets:</td>
      <td bgcolor="666666" class=news><input name="amount" type="text" id="amount" size="15" maxlength="3">
      <input name="Submit" type="submit" id="Submit" value="Submit"></td>
    </tr>
    <tr> 
      <td bgcolor="666666" class=news>Your tickets:</td>
      <td bgcolor="666666" class=news><? $abc=mysql_query("SELECT * FROM lotto WHERE owner='$username'"); $r=mysql_num_rows($abc);
	  if ($r == "0"){
	  echo "None";
	  }
	  while($p=mysql_fetch_object($abc)){
	  echo " $p->id, ";
	  }
	  ?>	  </td>



</body>
</html>
