<?

include "includes/functions.php";
logincheck();

$nigger=mysql_query("SELECT * FROM users WHERE username='$username'");
$u=mysql_fetch_object($nigger);


$tit_wank=mysql_query("SELECT * FROM polls WHERE id='1'");
$p=mysql_fetch_object($tit_wank);

$title=$p->title;

$op1=$p->op1;
$op2=$p->op2;
$op3=$p->op3;

$pv1=$p->v1;
$pv2=$p->v2;
$pv3=$p->v3;

$total_votes=$pv3+$pv2+$pv1;

if($total_votes == "0"){
$total_votes=1;
}

$percent1 = round((($pv1)/($total_votes))*100);
$percent2 = round((($pv2)/($total_votes))*100);
$percent3 = round((($pv3)/($total_votes))*100);

$op = $_POST['op'];

if((!$op)){

}else{

if($u->poll == "0"){

if ($op == "1"){

mysql_query("UPDATE users SET poll='1' WHERE username='$username'");
mysql_query("UPDATE users SET money=$u->money+100 WHERE username='$username'");
$new=$pv1 + 1;
mysql_query("UPDATE polls SET v1='$new' WHERE id='1'");  ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thank You</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF00"><div align="center"><font color="#000000"><? print "You voted for option 1 $op1";
print"<META HTTP-EQUIV='Refresh' CONTENT='1; URL=poll.php'>"; ?></font></div></td>
    </tr>
  </table>
</div>
<?

}elseif ($op == "2"){

mysql_query("UPDATE users SET poll='1' WHERE username='$username'");
mysql_query("UPDATE users SET money=$u->money+100 WHERE username='$username'");
$new=$pv1 + 1;
mysql_query("UPDATE polls SET v2='$new' WHERE id='1'");  ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thank You</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF00"><div align="center"><font color="#000000"><? print "You voted for option 2 $op2";
print"<META HTTP-EQUIV='Refresh' CONTENT='1; URL=poll.php'>"; ?></font></div></td>
    </tr>
  </table>
</div>
<?

}elseif ($op == "3"){

mysql_query("UPDATE users SET poll='1' WHERE username='$username'");
mysql_query("UPDATE users SET money=$u->money+100 WHERE username='$username'");
$new=$pv1 + 1;
mysql_query("UPDATE polls SET v3='$new' WHERE id='1'"); ?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thank You</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF00"><div align="center"><font color="#000000"><? print "You voted for option 3 $op3";
print"<META HTTP-EQUIV='Refresh' CONTENT='1; URL=poll.php'>"; ?></font></div></td>
    </tr>
  </table>
</div>
<?


}

}else{ ?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? print "You can only vote once"; ?></font></div></td>
    </tr>
  </table>
</div>
<? 
}


}



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<body>
<table width="60%"  border="0" align="center" cellpadding="3" cellspacing="0" bordercolor="#0099FF" bgcolor="#666666" class="thinline">
  <tr>
    <td colspan="2" background="images/bg3.bmp"><div align="center"><? print"$title"; ?></div></td>
  </tr>
  <tr>
    <td height="82" colspan="2"><form name="form1" method="post" action="" class="thinline">
      <table width="100%"  border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="5%"><input name="op" type="radio" value="1" class="thinline"></td>
          <td width="95%"><span class="style1"><? print"$op1"; ?></span></td>
        </tr>
        <tr>
          <td><input name="op" type="radio" value="2" class="thinline"></td>
          <td><span class="style1"><? print"$op2"; ?></span></td>
        </tr>
        <tr>
          <td><input name="op" type="radio" value="3" class="thinline"></td>
          <td><span class="style1"><? print"$op3"; ?></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="poll_sub" type="submit" class="submit" id="op" value="Submit"></td>
          </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="60%"  border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="000000" bgcolor="#666666" class="thinline">
  <tr>
    <td colspan="2" background="images/bg3.bmp">Poll Stats</td>
  </tr>
  <tr>
    <td width="16%"><span class="style1">Total Votes </span></td>
    <td width="84%"><span class="style1"><? print"$total_votes"; ?></span></td>
  </tr>
  <tr>
    <td><p class="style1"><? print"$op1"; ?></p>    </td>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="thinline">
      <tr>
        <td bgcolor="#00FF00" width="<? print"$percent1"; ?>%" ?>%" ?>%" ?>%" ?>%"></td>
        <td><? print"$percent1"; ?>%</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><span class="style1"><? print"$op2"; ?></span></td>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="thinline">
      <tr>
        <td bgcolor="#00CCFF" width="<? print"$percent2"; ?>%" ?>%" ?>%" ?>%" ?>%"></td>
        <td><? print"$percent2"; ?>%</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><span class="style1"><? print"$op3"; ?></span></td>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="thinline">
      <tr>
        <td bgcolor="#FF9900" width="<? print"$percent3"; ?>%" ?>%" ?>%" ?>%" ?>%"></td>
        <td><? print"$percent3"; ?>%</td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

<br>
<? include 'includes/footer.php'; ?>