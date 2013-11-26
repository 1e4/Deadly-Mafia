<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>
<div align="left"></div>
<table width="756" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td width="340" height="200"><table width="26%" height="30" border="1" align="center" cellpadding="0" cellspacing="0" rules=none class=thinline>
        <tr>
          <td class="header"><center>
              Points
          </center></td>
        </tr>
        <tr bgcolor=black>
          <td height=1 colspan=3></td>
        </tr>
        <tr>
          <td><div align="center">Welcome To The points Cpanel! </div></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td height="8" colspan="3"><center class=Tableheading>
                    <span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;
                </center></td>
              </tr>
              <tr>
                <td height="2" colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td height="3" colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td height="0" colspan="3"><center class=Tableheading>
                    Send points:
                </center></td>
              </tr>
              <tr>
                <td width="44%" height="-1">To: </td>
                <td width="56%" height="-1" colspan="2"><input name="to_person" type="text" id="to_person"></td>
              </tr>
              <tr>
                <td height="-2">&nbsp;</td>
                <td height="-2" colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td height="-3">Amount:</td>
                <td height="-3" colspan="2"><input name="send_amount" type="text" id="send_amount"></td>
              </tr>
              <tr>
                <td height="-3" colspan="3"><div align="right">
                    <input name="Send_button" type="submit" id="Send_button" value="Send">
                </div></td>
              </tr>
          </table></td>
        </tr>
    </table>
      <table width="20%" height="15" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
        <tr>
          <td colspan="2"  background="includes/grad.jpg"><center>
        Points prices
          </center></td>
        </tr>
        <tr>
          <td width="51%" ><div align="center">Points</div></td>
          <td width="49%" ><div align="center">Price</div></td>
        </tr>
        <tr>
          <td ><div align="center">5 </div></td>
          <td ><div align="center">&pound;0.75</div></td>
        </tr>
        <tr>
          <td ><div align="center">10</div></td>
          <td ><div align="center">&pound;1.00</div></td>
        </tr>
        <tr>
          <td ><div align="center">40</div></td>
          <td ><div align="center">&pound;2.50</div></td>
        </tr>
        <tr>
          <td ><div align="center">100</div></td>
          <td ><div align="center">&pound;5.50</div></td>
        </tr>
        <tr>
          <td ><div align="center">200</div></td>
          <td ><div align="center">&pound;10.00</div></td>
        </tr>
        <tr>
          <td ><div align="center">500</div></td>
          <td ><div align="center">&pound;22.50</div></td>
        </tr>
        <tr>
          <td ><div align="center">1000</div></td>
          <td ><div align="center">&pound;40.00</div></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
    <td width="403"><table width="100%" height="120" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
        <tr>
          <td colspan="2"  background="includes/grad.jpg"><center>
              Points
          </center></td>
        </tr>
        <tr>
          <td width="51%" ><input type="radio" name="choice" value="1">
&pound;10,000 </td>
          <td width="49%" >10</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="3">
            Fly now</td>
          <td >5</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="4">
            Oc now</td>
          <td >50</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="5">
            Race now</td>
          <td >5</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="6">
            100% health</td>
          <td >80</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="10">
            1000 Bullets</td>
          <td >10</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="7">
            100% energy</td>
          <td >10</td>
        </tr>
        <tr>
          <td ><div align="left">
              <input type="radio" name="choice" value="21">
              Order from the Bar</div></td>
          <td >10</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="25">
            10 Rank Points </td>
          <td >10</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="35">
            100 Rank Points </td>
          <td >85</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="45">
            250 Rank Points </td>
          <td >200</td>
        </tr>
        <tr>
          <td ><input type="radio" name="choice" value="55">
            1000 Rank Points </td>
          <td >750</td>
        </tr>
        <tr>
          <td ><span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;</td>
          <td ><input type="submit" name="Submit" value="Submit"></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class="header" colspan=4><center>
        Last 10 recieved (Show all)
    </center></td>
  </tr>
  <tr>
    <td>
  <tr bgcolor=white>
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>From</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
  <? $k=mysql_query("SELECT * FROM `pointstransfers` WHERE `to`='$username' ORDER BY id DESC LIMIT 10");
       while($p=mysql_fetch_object($k)){
	   echo "
	   <tr>
          <td>$p->id</td>
          <td><a href='profile.php?viewuser=$p->from'>$p->from</a></td>
          <td>&pound;".makecomma($p->amount)."</td>
          <td>$p->date</td>
        </tr>";
		}
		?>
</table>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class="header" colspan=4><center>
        Last 10 sent (Show all)
    </center></td>
  </tr>
  <tr bgcolor=black>
    <td height=1 colspan=3></td>
  </tr>
  <tr bgcolor=white>
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>To</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
  <? $ka=mysql_query("SELECT * FROM `pointstransfers` WHERE `from`='$username' ORDER BY id DESC LIMIT 10");
       while($pa=mysql_fetch_object($ka)){
	   echo "
	   <tr>
          <td>$pa->id</td>
          <td><a href='profile.php?viewuser=$pa->to'>$pa->to</a></td>
          <td>&pound;".makecomma($pa->amount)."</td>
          <td>$pa->date</td>
        </tr>";
		}
		?>
</table>
<p>&nbsp;</p>
<table width="79%"  border="1" align="center" cellPadding="2" cellSpacing="0" class="thinline" bordercolor=black>
  <tr >
    <td background="includes/grad.jpg"><center class=bold>
        Payment methods
    </center></td>
  </tr>
  <tr>
    <td><p align="center">You can buy points for empire2010 in three different ways
              <p align="center">1) Paypal payment. Go to paypal by <a href="http://www.paypal.com">clicking here</a> then send the amount necessary to tomr182@hotmail.com remember to include your username.
              <p align="center">2) SMS text msg payment 
              <p align="center"><a href="pointstestsms.php">Click here to buy 35 Points for &pound;1.50</a></p>
              <p align="center">&nbsp;</p>
              <p align="center">3) Secure credit card/debit card payment. You can pay &pound;10.00 for 200 points via your credit/debit card by <a href="creditpoints.php">clicking here</a></p>
              <p align="center">
            <p></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?php  ?>
  <?php echo"<p>"; include_once"includes/footer.php"; ?> </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
