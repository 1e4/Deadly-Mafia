<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="120" border="0" cellspacing="0" cellpadding="0">
  <?

  $i=0;
$colours = array('g','b');

  while ($i < 40){
  $c=$colours[rand(0,1)];
if ($i == "5" || $i == "15" || $i == "25" || $i == "35"){
echo "<tr>";
}


  echo "<td width=40><a href='?l=$i'><img src=create.php?c=$c border=0></a></td>
"; 
if ($i == "10" || $i == "20" || $i == "30" || $i == "40"){
echo "</tr>";
}

  $i++;
  }



  ?>
</table>
</body>
</html>
