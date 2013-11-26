<html>
<head>
<title>you spin the wheel...</title>
</head>
<body bgcolor="black" text="#bccbdc" link="#bccbdc" alink="#bccbdc" vlink="#bccbdc">
<div align=center>
<tr> 
          <td height="20" bgcolor=#336699 valign="center"><font face="verdana" size="2">
						<strong>Welcome to 2010: Empire</strong></font></td>
        </tr>
        <tr> 
          <td valign="top"> <font face="verdana" color="#bccbdc" size="1.5">



<?php
session_start();
include_once "includes/db_connect.php";

$mysite_username = $HTTP_COOKIE_VARS["mysite_username"]; 
$query2 = MYSQL_QUERY( "SELECT * FROM `user` WHERE username='username'");
$money = MYSQL_RESULT( $query2,0, money);
$earnings = 0;

if (($bet01==null) and ($bet02==null) and ($bet03==null) and ($bet04==null) and ($bet05==null) and ($bet06==null) and ($bet07==null) and ($bet08==null) and ($bet09==null) and ($bet10==null) and ($bet11==null) and ($bet12==null) and ($bet13==null) and ($bet14==null) and ($bet15==null) and ($bet16==null) and ($bet17==null) and ($bet18==null) and ($bet19==null) and ($bet20==null) and ($bet21==null) and ($bet22==null) and ($bet23==null) and ($bet24==null) and ($bet25==null) and ($bet26==null) and ($bet27==null) and ($bet28==null) and ($bet29==null) and ($bet30==null) and ($bet31==null) and ($bet32==null) and ($bet33==null) and ($bet34==null) and ($bet35==null) and ($bet36==null) and ($betred==null) and ($betblack==null) and ($betodd==null) and ($beteven==null) and ($betlow==null) and ($bethigh==null) and ($bet1st12==null) and ($bet2nd12==null) and ($bet3rd12==null))
{
echo "<table width=\"250px\"><tr><td>You didn't place a bet!</br>Please retry</td></tr><tr><td><a href=\"roulette.php\">Play again</a></td></tr></table>";
exit;
}
if ((($bet01<=0) and ($bet01!=null)) or (($bet02<=0) and ($bet02!=null)) or (($bet03<=0) and ($bet03!=null)) or (($bet04<=0) and ($bet04!=null)) or (($bet05<=0) and ($bet05!=null)) or (($bet06<=0) and ($bet06!=null)) or (($bet07<=0) and ($bet07!=null)) or (($bet08<=0) and ($bet08!=null)) or (($bet09<=0) and ($bet09!=null)) or (($bet10<=0) and ($bet10!=null)) or (($bet11<=0) and ($bet11!=null)) or (($bet12<=0) and ($bet12!=null)) or (($bet13<=0) and ($bet13!=null)) or (($bet14<=0) and ($bet14!=null)) or (($bet15<=0) and ($bet15!=null)) or (($bet16<=0) and ($bet16!=null)) or (($bet17<=0) and ($bet17!=null)) or (($bet18<=0) and ($bet18!=null)) or (($bet19<=0) and ($bet19!=null)) or (($bet20<=0) and ($bet20!=null)) or (($bet21<=0) and ($bet21!=null)) or (($bet22<=0) and ($bet22!=null)) or (($bet23<=0) and ($bet23!=null)) or (($bet24<=0) and ($bet24!=null)) or (($bet25<=0) and ($bet25!=null)) or (($bet26<=0) and ($bet26!=null)) or (($bet27<=0) and ($bet27!=null)) or (($bet28<=0) and ($bet28!=null)))
{
echo "<table width=\"250px\"><tr><td>all your bets have to be above 0!</br>Please retry</td></tr><tr><td><a href=\"roulette.php\">Play again</a></td></tr></table>";
exit;
}
if ((($bet29<=0)and ($bet29!=null)) or (($bet30<=0) and ($bet30!=null)) or (($bet31<=0) and ($bet31!=null)) or (($bet32<=0) and ($bet32!=null)) or (($bet33<=0) and ($bet33!=null)) or (($bet34<=0) and ($bet34!=null)) or (($bet35<=0) and ($bet35!=null)) or (($bet36<=0) and ($bet36!=null)) or (($betred<=0) and ($betred!=null)) or (($betblack<=0) and ($betblack!=null)) or (($betodd<=0) and ($betodd!=null)) or (($beteven<=0) and ($beteven!=null)) or (($betlow<=0) and ($betlow!=null)) or (($bethigh<=0) and ($bethigh!=null)) or (($bet1st12<=0) and ($bet1st12!=null)) or (($bet2nd12<=0) and ($bet2nd12!=null)) or (($bet3rd12<=0) and ($bet3rd12!=null)))
{
echo "<table width=\"250px\"><tr><td>all your bets have to be above 0!</br>Please retry</td></tr><tr><td><a href=\"roulette.php\">Play again</a></td></tr></table>";
exit;
}
$totalbet = ($bet02+$bet03+$bet04+$bet05+$bet06+$bet07+$bet08+$bet09+$bet10+$bet11+$bet12+$bet13+$bet14+$bet15+$bet16+$bet17+$bet18+$bet19+$bet20+$bet21+$bet22+$bet23+$bet24+$bet25+$bet26+$bet27+$bet28+$bet29+$bet30+$bet31+$bet32+$bet33+$bet34+$bet35+$bet36+$betred+$betblack+$betodd+$beteven+$betlow+$bethigh+$bet1st12+$bet2nd12+$bet3rd12);
if($totalbet>$money)
{
echo "<table width=\"250px\"><tr><td>you don't have that much money!</br>Please retry</td></tr><tr><td><a href=\"roulette.php\">Play again</a></td></tr></table>";
exit;
}
?>

<?php
$number=rand(0,36);
if ($number==0)
{
$color=green;
}
if ($number==1)
{
$color=red;
}
if ($number==2)
{
$color=black;
}
if ($number==3)
{
$color=red;
}
if ($number==4)
{
$color=black;
}
if ($number==5)
{
$color=red;
}
if ($number==6)
{
$color=black;
}
if ($number==7)
{
$color=red;
}
if ($number==8)
{
$color=black;
}
if ($number==9)
{
$color=red;
}
if ($number==10)
{
$color=black;
}
if ($number==11)
{
$color=black;
}
if ($number==12)
{
$color=red;
}
if ($number==13)
{
$color=black;
}
if ($number==14)
{
$color=red;
}
if ($number==15)
{
$color=black;
}
if ($number==16)
{
$color=red;
}
if ($number==17)
{
$color=black;
}
if ($number==18)
{
$color=red;
}
if ($number==19)
{
$color=red;
}
if ($number==20)
{
$color=black;
}
if ($number==21)
{
$color=red;
}
if ($number==22)
{
$color=black;
}
if ($number==23)
{
$color=red;
}
if ($number==24)
{
$color=black;
}
if ($number==25)
{
$color=red;
}
if ($number==26)
{
$color=black;
}
if ($number==27)
{
$color=red;
}
if ($number==28)
{
$color=black;
}
if ($number==29)
{
$color=black;
}
if ($number==30)
{
$color=red;
}
if ($number==31)
{
$color=black;
}
if ($number==32)
{
$color=red;
}
if ($number==33)
{
$color=black;
}
if ($number==34)
{
$color=red;
}
if ($number==35)
{
$color=black;
}
if ($number==36)
{
$color=red;
}
?>

<?php
if ($bet01!=null)
{
if ($number==1)
{
$earnings = $earnings+($bet01*35);
}
else{
$earnings = $earnings-$bet01;
}
}
if ($bet02!=null)
{
if ($number==2)
{
$earnings = $earnings+($bet02*35);
}
else{
$earnings = $earnings-$bet02;
}
}
if ($bet03!=null)
{
if ($number==3)
{
$earnings = $earnings+($bet03*35);
}
else{
$earnings = $earnings-$bet03;
}
}
if ($bet04!=null)
{
if ($number==4)
{
$earnings = $earnings+($bet04*35);
}
else{
$earnings = $earnings-$bet04;
}
}
if ($bet05!=null)
{
if ($number==5)
{
$earnings = $earnings+($bet05*35);
}
else{
$earnings = $earnings-$bet05;
}
}
if ($bet06!=null)
{
if ($number==6)
{
$earnings = $earnings+($bet06*35);
}
else{
$earnings = $earnings-$bet06;
}
}
if ($bet07!=null)
{
if ($number==7)
{
$earnings = $earnings+($bet07*35);
}
else{
$earnings = $earnings-$bet07;
}
}
if ($bet08!=null)
{
if ($number==8)
{
$earnings = $earnings+($bet08*35);
}
else{
$earnings = $earnings-$bet08;
}
}
if ($bet09!=null)
{
if ($number==9)
{
$earnings = $earnings+($bet09*35);
}
else{
$earnings = $earnings-$bet09;
}
}
if ($bet10!=null)
{
if ($number==10)
{
$earnings = $earnings+($bet10*35);
}
else{
$earnings = $earnings-$bet10;
}
}
if ($bet11!=null)
{
if ($number==11)
{
$earnings = $earnings+($bet11*35);
}
else{
$earnings = $earnings-$bet11;
}
}
if ($bet12!=null)
{
if ($number==12)
{
$earnings = $earnings+($bet12*35);
}
else{
$earnings = $earnings-$bet12;
}
}
if ($bet13!=null)
{
if ($number==13)
{
$earnings = $earnings+($bet13*35);
}
else{
$earnings = $earnings-$bet13;
}
}
if ($bet14!=null)
{
if ($number==14)
{
$earnings = $earnings+($bet14*35);
}
else{
$earnings = $earnings-$bet14;
}
}
if ($bet15!=null)
{
if ($number==15)
{
$earnings = $earnings+($bet15*35);
}
else{
$earnings = $earnings-$bet15;
}
}
if ($bet16!=null)
{
if ($number==16)
{
$earnings = $earnings+($bet16*35);
}
else{
$earnings = $earnings-$bet16;
}
}
if ($bet17!=null)
{
if ($number==17)
{
$earnings = $earnings+($bet17*35);
}
else{
$earnings = $earnings-$bet17;
}
}
if ($bet18!=null)
{
if ($number==18)
{
$earnings = $earnings+($bet18*35);
}
else{
$earnings = $earnings-$bet18;
}
}
if ($bet19!=null)
{
if ($number==19)
{
$earnings = $earnings+($bet19*35);
}
else{
$earnings = $earnings-$bet19;
}
}
if ($bet20!=null)
{
if ($number==20)
{
$earnings = $earnings+($bet20*35);
}
else{
$earnings = $earnings-$bet20;
}
}
if ($bet21!=null)
{
if ($number==21)
{
$earnings = $earnings+($bet21*35);
}
else{
$earnings = $earnings-$bet21;
}
}
if ($bet22!=null)
{
if ($number==22)
{
$earnings = $earnings+($bet22*35);
}
else{
$earnings = $earnings-$bet22;
}
}
if ($bet23!=null)
{
if ($number==23)
{
$earnings = $earnings+($bet23*35);
}
else{
$earnings = $earnings-$bet23;
}
}
if ($bet24!=null)
{
if ($number==24)
{
$earnings = $earnings+($bet24*35);
}
else{
$earnings = $earnings-$bet24;
}
}
if ($bet25!=null)
{
if ($number==25)
{
$earnings = $earnings+($bet25*35);
}
else{
$earnings = $earnings-$bet25;
}
}
if ($bet26!=null)
{
if ($number==26)
{
$earnings = $earnings+($bet26*35);
}
else{
$earnings = $earnings-$bet26;
}
}
if ($bet27!=null)
{
if ($number==27)
{
$earnings = $earnings+($bet27*35);
}
else{
$earnings = $earnings-$bet27;
}
}
if ($bet28!=null)
{
if ($number==28)
{
$earnings = $earnings+($bet28*35);
}
else{
$earnings = $earnings-$bet28;
}
}
if ($bet29!=null)
{
if ($number==29)
{
$earnings = $earnings+($bet29*35);
}
else{
$earnings = $earnings-$bet29;
}
}
if ($bet30!=null)
{
if ($number==30)
{
$earnings = $earnings+($bet30*35);
}
else{
$earnings = $earnings-$bet30;
}
}
if ($bet31!=null)
{
if ($number==31)
{
$earnings = $earnings+($bet31*35);
}
else{
$earnings = $earnings-$bet31;
}
}
if ($bet32!=null)
{
if ($number==32)
{
$earnings = $earnings+($bet32*35);
}
else{
$earnings = $earnings-$bet32;
}
}
if ($bet33!=null)
{
if ($number==33)
{
$earnings = $earnings+($bet33*35);
}
else{
$earnings = $earnings-$bet33;
}
}if ($bet34!=null)
{
if ($number==34)
{
$earnings = $earnings+($bet34*35);
}
else{
$earnings = $earnings-$bet34;
}
}
if ($bet35!=null)
{
if ($number==35)
{
$earnings = $earnings+($bet35*35);
}
else{
$earnings = $earnings-$bet35;
}
}
if ($bet36!=null)
{
if ($number==36)
{
$earnings = $earnings+($bet36*35);
}
else{
$earnings = $earnings-$bet36;
}
}
if ($betred!=null)
{
if ($color==red)
{
$earnings=$earnings+$betred;
}
else{
$earnings=$earnings-$betred;
}
}
if ($betblack!=null)
{
if ($color==black)
{
$earnings=$earnings+$betblack;
}
else{
$earnings=$earnings-$betblack;
}
}
if ($betlow!=null)
{
if (($number < 19) and ($number > 0))
{
$earnings=$earnings+$betlow;
}
else{
$earnings=$earnings-$betlow;
}
}
if ($bethigh!=null)
{
if ($number >= 19)
{
$earnings=$earnings+$bethigh;
}
else{
$earnings=$earnings-$bethigh;
}
}
if ($bet1st12!=null)
{
if (($number>0) and ($number<13))
{
$earnings=$earnings+(2*$bet1st12);
}
else{
$earnings=$earnings-$bet1st12;
}
}
if ($bet2nd12!=null)
{
if (($number>12) and ($number<25))
{
$earnings=$earnings+(2*$bet2nd12);
}
else{
$earnings=$earnings-$bet2nd12;
}
}
if ($bet3rd12!=null)
{
if ($number>24)
{
$earnings=$earnings+(2*$bet3rd12);
}
else{
$earnings=$earnings-$bet3rd12;
}
}
$test = $number;
while ($test>2){
$test=$test-2;
}
if ($beteven!=null)
{
if ($test==2)
{
$earnings=$earnings+$beteven;
}
else{
$earnings=$earnings-$beteven;
}
}
if ($betodd!=null)
{
if ($test==1)
{
$earnings=$earnings+$betodd;
}
else{
$earnings=$earnings-$betodd;
}
}
?>

<table width="250px">
<tr><td align="center">your total bet was £<?php echo $totalbet ?><br>the wheel starts spinning...<br>the ball goes in...<br> and it lands on:</td></tr>
</table>
<table width="50px" border="1" bordercolor="#bccbdc">
<tr><td align="center" bgcolor="<?php echo $color ?>"><font color="#bccbdc" size="5"><?php echo $number ?></td></tr>
</table>
<table width="250px">
<tr><td align="center">this give the following result:<br>
<?php
$money=$money+$earnings;
MYSQL_QUERY(" UPDATE Members SET money = '$money' WHERE username ='$mysite_username' LIMIT 1") ;

if ($earnings > 0)
{
echo "You won £" . $earnings . "<br>You now have £"  . $money;
}
if ($earnings < 0)
{
echo "You lost £" . (-1*$earnings) . "<br>You now have £"  . $money;
}
if ($earnings == 0)
{
echo "You didn't win or lose any money<br> You still have £" . $money;
}
?>
</td></tr>
<tr><td align="center"><a href="file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/empire/empire/main.php?act=roulette">Play again</a></td></tr>
</table>

            </font></td>
        </tr>
</div>
</body>
</html>




