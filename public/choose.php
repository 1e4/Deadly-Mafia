<?php include_once "includes/db_connect.php"; include_once "includes/functions.php"; logincheck();
?>

<?php echo "$style"; ?>

<head>
<!--[if IE]>

<style>

.drag{position:relative;cursor:hand
}
#scontentmain{
position:absolute;
width:150px;
}
#scontentbar{
cursor:hand;
position:absolute;
background-color:green;
height:15;
width:100%;
top:0;
}
#scontentsub{
position:absolute;
width:100%;
top:15;
background-color:lightyellow;
border:2px solid green;
padding:1.5px;
}

</style>

<script language="JavaScript1.2">

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

</script>

<![endif]-->

</head>
<?
if ($_POST['status_popup']){
?>
<body>
<!--[if IE]>
<div id="scontentmain">
<div id="scontentbar" >
<img align="right" src="barbutton.gif" onClick="onoffdisplay()">
</div>
<div id="scontentsub">


<p align="center"><br>
<a href="http://wsabstract.com"><img src="http://wsabstract.com/wabutton5.gif" border="1"
alt="Click here for Website Abstraction"></a><br>
<font face="Arial"><small><small>While we didn't invent JavaScript, we sure as hell
created the best site on IT. <a href="http://wsabstract.com">Website Abstraction</a> is
considered by many online as the definitive JavaScript technology site on the
internet. Online since December, 1997, <a href="http://wsabstract.com">Website Abstraction</a> features over 300+ original scripts, 100+
tutorials on JavaScript programming and web design, and a highly active programming forum
where developers from all over meet and share ideas on their latest projects. Click <b><a href="http://wsabstract.com">HERE</a></b>
for JavaScript!</small></small></font></p>


</div>
</div>
</div>
<body>
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
<![endif]--><?



}
?>


<form>
  <p>&nbsp;</p>
  <p>This is only the BETA version of popup stats, basiclaly this will show you 
    your stats in a popup and other stuff eg: bullet time.</p>
  <p align="center"> 
    <input name="status_popup" type=button id="status_popup" onClick="javascript:popUp('popup_stats.php')" value="Open your stats bar">
  </p>
</form>

