<?php

include "includes/functions.php";

 

logincheck();

$high2 = time() - (3600 * 9*9*9*9*(9*9*9*9999999999)) * 7;

$high1 = time() - (3600 * 24) * 7;

$high = time() - (3600 * 24);



?><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<style type="text/css">



#skill{

position: absolute;

width: 150px;

border: 1px solid black;

padding: 2px;

background-color: 363636

visibility: hidden;

z-index: 100;

/*Remove below line to remove shadow. Below line should always appear last within this CSS*/

filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);

}



</style>

</body><head>

<div id="skill"></div>



<script type="text/javascript">





var offsetxpoint=-60 //Customize x offset of tooltip

var offsetypoint=20 //Customize y offset of tooltip

var ie=document.all

var ns6=document.getElementById && !document.all

var enabletip=false

if (ie||ns6)

var tipobj=document.all? document.all["skill"] : document.getElementById? document.getElementById("skill") : ""



function ietruebody(){

return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body

}



function tip(thetext, thecolor, thewidth){

if (ns6||ie){

if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"

if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor

tipobj.innerHTML=thetext

enabletip=true

return false

}

}



function positiontip(e){

if (enabletip){

var curX=(ns6)?e.pageX : event.x+ietruebody().scrollLeft;

var curY=(ns6)?e.pageY : event.y+ietruebody().scrollTop;

//Find out how close the mouse is to the corner of the window

var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20

var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20



var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000



//if the horizontal distance isn't enough to accomodate the width of the context menu

if (rightedge<tipobj.offsetWidth)

//move the horizontal position of the menu to the left by it's width

tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"

else if (curX<leftedge)

tipobj.style.left="5px"

else

//position the horizontal position of the menu where the mouse is positioned

tipobj.style.left=curX+offsetxpoint+"px"



//same concept with the vertical position

if (bottomedge<tipobj.offsetHeight)

tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"

else

tipobj.style.top=curY+offsetypoint+"px"

tipobj.style.visibility="visible"

}

}



function hide(){

if (ns6||ie){

enabletip=false

tipobj.style.visibility="hidden"

tipobj.style.left="-1000px"

tipobj.style.backgroundColor=''

tipobj.style.width=''

}

}



document.onmousemove=positiontip



</script></body>



<?





 $num_of_ppl1 = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$high1'")); 



 $num_of_ppl2 = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$high2'")); 



 $num_of_ppl = mysql_num_rows(mysql_query("SELECT * FROM users WHERE online > '$high'"));

$mostever=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));

$total_users=mysql_num_rows(mysql_query("SELECT * FROM users"));





echo "

$style

<center><p>";



echo "<table width=500 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>

    <tr>

      <td height=22 background=images/bg3.bmp>

<center class=TableHeading>

          Online Gangsters In The Last 2 Minutes

        </center></td>

    </tr>

    <tr>

      <td bgcolor=$td_bg>

<table width=100%  border=0 cellspacing=2 cellpadding=2>

        <tr>

            <td bgcolor=232323>

";



//////GAY THINGS ABOVE/////

$timenow = time() - (60 * 2);

$select = mysql_query("SELECT * FROM users WHERE online > '$timenow'");

$num = mysql_num_rows($select);

while ($i = mysql_fetch_object($select)){

if ($i->crew == "0"){

$crew="None";

}else{

$crew=$i->crew;

}







if ($i->userlevel=="3"){

$echo = "<b><font color=blue>$i->username</font></b>";

}elseif ($i->userlevel=="2"){

$echo = "<b><font color=red>$i->username</font></b>";

}elseif ($i->helper=="1"){

$echo = "<font color=green>$i->username</font>";

}elseif ($i->ghostmode=="1"){

$echo = " ";

}elseif ($i->username=="Rayer"){

$echo = "<b><font color=blue>$i->username</font></b>";

}elseif ($i->username=="MaTTi"){

$echo = "<b><font color=blue>$i->username</font></b>";

}elseif ($i->forumm=="1"){

$echo = "<font color=#9AFEFF>$i->username</font>";

}else{

$echo = "$i->username";

}

echo "<a href='profile.php?viewuser=$i->username' onMouseover=\"tip('Username: $i->username <br>Rank: $rank <br>Crew: $crew')\";

 onMouseout=\"hide()\"> $echo </a>,";

}









echo "</td>

        </tr>

      </table></td>

    </tr>

  </table>";



echo "



<p>&nbsp;</p>

<table width='98%' border='0' cellspacing='5' cellpadding='0'>

  <tr> 

    <td width='49%'><table width=261 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>

        <tr> 

          <td width='257' height=22 background=includes/grad.jpg> <center class=TableHeading>

              Other: </center></td>

        </tr>

        <tr> 

          <td height='104' bgcolor=232323> <table width=100%  border=0 cellspacing=2 cellpadding=2>

              <tr> 

                <td width='69%'><strong><font size='4'>Total users online:</font></strong></td>

                <td width='31%'><strong><font size='4'>".makecomma($num)."</font></strong></td>

              </tr>

              <tr> 

                <td><font color='#ffffff'>Most ever users online:</font></td>

                <td width='31%'>$num_of_ppl2</td>

              </tr>

              <tr> 

                <td>Online in last 24hrs</td>

                <td>

      $num_of_ppl  

 </tr>

              <tr> 

                <td>Total users:</td>

                <td>$total_users</td>

              </tr>

              <tr> 

                <td>Online in last week:</td>

                <td>  $num_of_ppl1



</td>

              </tr>

            </table></td>

        </tr>

      </table></td>

    <td width='51%'><table width=261 border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border>

        <tr> 

          <td width='257' height=22 background=includes/grad.jpg> <center class=TableHeading>

              Key: 

            </center></td>

        </tr>

        <tr> 

          <td bgcolor=232323> <table width=100%  border=0 cellspacing=2 cellpadding=2>

              <tr> 

                <td width='69%'><b><font color='blue'>Admin</font></b></td>

                <td width='31%' bgcolor='blue'>&nbsp;</td>

              </tr>

            <tr> 

                <td><b><font color='red'>Moderators</font></b></td>

                <td bgcolor='red'><font color='red'>&nbsp;</font></td>

              </tr>

              <tr> 

                <td><b><font color='green'>Forum Mods</font></b></td>

                <td bgcolor='green'><font color='green'>&nbsp;</font></td>

              </tr>

            

            </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>



";





require_once "includes/footer.php";

?>