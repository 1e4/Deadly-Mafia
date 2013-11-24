<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <?php  $co = "2,5"; $i=0;
 while($i < 10){ 
 echo "
  <tr> "; 
 $l++; 
$a=0;
$a++;
$b=1;
$b++;
$c=2;
$c++;
$d=3;
$d++;
$e=4;
$e++;
$f=5;
$f++;

    echo "<td bgcolor='#009933'>_"; if ($co == "$l,$a"){ echo "X"; }echo "</td>";
  echo "  <td bgcolor='#999999'>_"; if ($co == "$l,$b"){ echo "X"; }echo "</td>";
    echo "<td bgcolor='#006633'>_";if ($co == "$l,$c"){ echo "X"; }echo "</td>";
   echo " <td bgcolor='#CCCCCC'>_";if ($co == "$l,$d"){ echo "X"; }echo "</td>";
   echo " <td bgcolor='#0066FF'>_";if ($co == "$l,$e"){ echo "X"; }echo "</td>";
   echo " <td bgcolor='#000000'>_";if ($co == "$l,$f"){ echo "X"; }echo "</td>";
 echo" </tr>"; 

 $i++;
 }
 ?>
  
  
</table>
</body>
</html>
