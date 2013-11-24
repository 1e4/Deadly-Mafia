<?php
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->location == "England"){
$map="england.jpg";
?>   <map name=Map>
          <area shape=circle coords='273,112,12' href="javascript:flyto('York', '545', '5')">
          <area shape=circle coords='259,158,12' href="javascript:flyto('Manchester', '545', '5')">
          <area shape=circle coords='210,182,12' href="javascript:flyto('Liverpool', '545', '5')">
          <area shape=circle coords='385,302,13' href="javascript:flyto('Cambridgeshire', '545', '5')">
          <area shape=circle coords='368,363,11' href="javascript:flyto('London', '545', '5')">
          <area shape=circle coords='128,410,14' href="javascript:flyto('Plymouth', '545', '5')">
        </map>
		<?
}elseif ($fetch->location == "Japan"){
$map="japan.jpg";
}elseif ($fetch->location == "Colombia"){
$map="colombia.jpg";
}elseif ($fetch->location == "Usa"){
$map="usa.jpg";
}elseif ($fetch->location == "South Africa"){
$map="south.jpg";
}elseif ($fetch->location == "Mexico"){
$map="mexico.jpg";
}
?>

<script language=JavaScript>
function flyto (city, costs, cityid){ 
				var del = confirm("Are you sure you wish to travel to " + city + "? It will cost you $ " + costs); 
				if (del == true){ var loc="train.php?city=" + cityid; window.location=loc; } 
			}
			</script>
</head>

<body>
<table width="54%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td background="includes/grad.jpg"><center class=bold>
        Travel </center></td>
  </tr>
  <tr bgcolor=white>
    <td class=tip><div align="center">Take the train to:</div></td>
  </tr>
  <tr> 
    <td><div align="center"><img src="images/cities/<?php echo "$map"; ?>" width="502" height="480" border="0" usemap="#Map">
      
      </div></td>
  </tr>
</table>

</body>
</html>
