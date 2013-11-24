<?php session_start(); include_once"includes/functions.php"; include_once"includes/db_connect.php"; 
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
?>

<head>
<!--[if IE]>

<!--
Always On Top Content Script- 
© Dynamic Drive (www.dynamicdrive.com)
For full source code, installation instructions,
100's more DHTML scripts, and Terms Of
Use, visit dynamicdrive.com
-->

<style>
<!--
.drag{position:relative;cursor:hand
}
#scontentmain{
position:absolute;
width:150px;
}
#scontentbar{
cursor:hand;
position:absolute;
background-color:#000000;
height:15;
width:100%;
top:0;
}
#scontentsub{
position:absolute;
width:100%;
top:15;
background-color:dark green;
border:2px lightgrey;
padding:1.5px;
}
-->
</style>

<script language="JavaScript1.2">
<!--
//Drag and drop engine for static content
//© Dynamic Drive (www.dynamicdrive.com)

var dragapproved=false
var zcor,xcor,ycor

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function movescontentmain(){
if (event.button==1&&dragapproved){
zcor.style.pixelLeft=tempvar1+event.clientX-xcor
zcor.style.pixelTop=tempvar2+event.clientY-ycor
leftpos=document.all.scontentmain.style.pixelLeft-ietruebody().scrollLeft
toppos=document.all.scontentmain.style.pixelTop-ietruebody().scrollTop
return false
}
}
function dragscontentmain(){
if (!document.all)
return
if (event.srcElement.id=="scontentbar"){
dragapproved=true
zcor=scontentmain
tempvar1=zcor.style.pixelLeft
tempvar2=zcor.style.pixelTop
xcor=event.clientX
ycor=event.clientY
document.onmousemove=movescontentmain
}
}
document.onmousedown=dragscontentmain
document.onmouseup=new Function("dragapproved=false")
//-->
</script>

<![endif]-->
</head>

<body>
<!--[if IE]>
<div id="scontentmain">
<div id="scontentbar" >
<img align="right" src="barbutton.gif" onClick="onoffdisplay()">
</div>
<div id="scontentsub">


<p align="center"><br>
<?php
echo "<b>Username</b>$fetch->username<br>";
echo "<b>Money</b>£".makecomma($fetch->money)."<br>";
echo "<b>Rank</b>$fetch->rank<br>";

?>
</small></small></font></p>


</div>
</div>
</div>

<script language="JavaScript1.2">

/*
Always On Top Content Script- 
© Dynamic Drive (www.dynamicdrive.com)
For full source code, installation instructions,
100's more DHTML scripts, and Terms Of
Use, visit dynamicdrive.com
*/

//configure the below two variables to determine where the static content will initially be positioned when the document loads, in terms of X and Y cooridinates, respectively

var w=ietruebody().clientWidth-195
var h=50


////Do not edit pass this line///////////
w+=ietruebody().scrollLeft
h+=ietruebody().scrollTop

var leftpos=w
var toppos=h
scontentmain.style.left=w
scontentmain.style.top=h

function onoffdisplay(){
if (scontentsub.style.display=='') 
scontentsub.style.display='none'
else
scontentsub.style.display=''
}

function staticize(){
w2=ietruebody().scrollLeft+leftpos
h2=ietruebody().scrollTop+toppos
scontentmain.style.left=w2
scontentmain.style.top=h2
}
window.onscroll=staticize

</script>
<![endif]-->
</body>