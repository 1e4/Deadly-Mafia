<?php 
session_start(); 
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

?>
<HTML><HEAD><TITLE>Empire2010</TITLE>


<style type="text/css">
<!--
.style1 {color: #0000FF}
.style10 {color: #000000}
.style11 {color: #FF0000}
-->
</style>
<body>
<table width="64%" border="1" align="center" cellpadding="2" cellspacing="0" rules=none class=thinline >
  <tr> 
          <td  background="includes/grad.jpg"><center>
            Welcome to the Empire2010 Photo Album!
          </center></td></tr>
		  
		  <tr>    
    <td><p align="center">&nbsp;</p>
      </td>
        </tr>
</table>







<p>&nbsp;</p>
<table width="79%"  border="1" align="center" cellPadding="2" cellSpacing="0" class="thinline" bordercolor=black>
  <tr >
    <td background="includes/grad.jpg"><center class=bold>
        Staff
    </center></td>
  </tr>
  <tr>
    <td><p align="center"><img src="DSC003009.JPG" width="300" height="300"></p>
        <p><span class="style1">Fenchurch</span></p>
        <p align="center"><img src="http://img486.imageshack.us/img486/6133/me9gp.png" width="300" height="300"></p>
        <p><span class="style11">Monkeyavenger</span></p>
        <p align="center"><img src="menmabeer.JPG" width="300" height="300"></p>
        <p align="left"><span class="style11">Reprisal</span><br>
        </p></td>
  </tr>
</table>

<table width="79%"  border="1" align="center" cellPadding="2" cellSpacing="0" class="thinline" bordercolor=black>
  <tr >
    <td background="includes/grad.jpg"><center class=bold>
        Players
    </center></td>
  </tr>
  <tr>
    <td><p align="center"><img src="http://img418.imageshack.us/img418/8334/moiwearinthemexicanhat8ah.png" width="300" height="300"></p>
      <p><span class="style10">DonVengence</span></p>
        <p align="center"><img src="http://img.photobucket.com/albums/v237/oxcide/me2222.jpg" width="300" height="300"></p>
        <p align="left">Iced</p>
        <p align="center"><br>
      <img src="http://img.photobucket.com/albums/v200/superchris/Me.jpg" width="300" height="300"> </p>
        <p align="left">DreamCatcher</p>
        <p align="center"><img src="http://pics-04.hi5.com/userpics/604/679/67950604.img.jpg" width="300" height="300"></p>
        <p align="left">Highbury</p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
<script language="JavaScript"> <!--
// No rightclick script v.2.5
// (c) 1998 barts1000
// barts1000@aol.com
// Don't delete this header!

var message="Why are you trying to do right click save as?."; // Message for the alert box

// Don't edit below!

function click(e) {
if (document.all) {
if (event.button == 2) {
alert(message);
return false;
}
}
if (document.layers) {
if (e.which == 3) {
alert(message);
return false;
}
}
}
if (document.layers) {
document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;
// --> </script>

</html>





