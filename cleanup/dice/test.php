
<!-- FIVE STEPS TO INSTALL CATEGORY MENUS:

  1.  Save the FRAMESET code and modify it for your page
  2.  Create a new document and save it as category-menus.html
  3.  Copy the coding into the HEAD of category-menus.html
  4.  Add the last code into the BODY of category-menus.html
  5.  Be sure to save the arrow images to your web server  -->

<!-- STEP TWO: Create a new document, save it as category-menus.html  -->

<!-- STEP THREE: Paste this code into the HEAD of category-menus.html  -->

<HEAD>

<style type="text/css">
a
{text-decoration: none;}

.title
{position: absolute;
width: 100px;
height: 20px;
left: 221px;
z-index: 10;
font-family: verdana, helvetica, sans-serif;
font-weight: bold;
font-size: 12px;}

.submenu
{position: absolute;
left: 25px;
width: 120px;
border: 1px solid black;
background-color: yellow;
layer-background-color: yellow;
font-family: verdana, helvetica, sans-serif;
font-size: 10px;
visibility: hidden;}
</style>

<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Fredrik Fridsten (fredrik.fridsten@home.se) -->
<!-- Web Site:  http://hem.passagen.se/dred -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin

// ADDITIONAL NOTES
// The input variables to the toggle function are the number of the submenu to open/close,
// starting with 0, and the number of pixels to move the objects below.
// For example toggle(1,60) opens/closes the second submenu and moves the objects below 60 pixels.

var nom = 4; // Number of menus
var usePictures = 1; // use pictures?  1 = yes, 0 = no

var ttls = new Array(); // An array for the title objects
var subs = new Array(); // An array for the submenu objects
var lastn;
var lastmove;

if (document.layers) {
visible = 'show';
hidden = 'hide';
}
else
if (document.all) {
visible = 'visible';
hidden = 'hidden';
}
for (var i = 1; i <= nom; i++) {
ttls[i] = ('title' + i);
subs[i] = ('submenu' +i);
}
function picopen(n) {
title = ('title' + n);
pic = ('pic' + n);
if (document.layers) {
document.layers[title].document.images[pic].src = "opened.gif";
}
else if (document.all) {
document.all(pic).src = "opened.gif";
   }
}
function picclose(n) {
title = ('title' + n);
pic = ('pic' + n);
if (document.layers) {
document.layers[title].document.images[pic].src = "closed.gif";
}
else if (document.all) {
document.all(pic).src = "closed.gif";
   }
}
lastn = (nom + 1);
lastmove = 0;
function lasttoggle(n,move) {
if (n <= nom) {
menu = ('submenu' + n);
if (document.layers) {
submenu = document.layers[menu];
}
else if (document.all) {
submenu = document.all(menu).style;
}
if (submenu.visibility == visible) {
submenu.visibility = hidden;
picclose(n); // Remove this if you don't use pictures
for (var i = (n+1); i <= nom; i++) {
if (document.layers) {
document.layers[ttls[i]].top -= move;
document.layers[subs[i]].top -= move;
}
else if (document.all) {
document.all(ttls[i]).style.pixelTop -= move;
document.all(subs[i]).style.pixelTop -= move;
            }
         }
      }
   }
}
function toggle(n,move) {
menu = ('submenu' + n);
if (document.layers) {
submenu = document.layers[menu];
}
else if (document.all) {
submenu = document.all(menu).style;
}
if (submenu.visibility == visible) {
submenu.visibility = hidden;
if (usePictures) picclose(n);
for (var i = (n+1); i <= nom; i++) {
if (document.layers) {
document.layers[ttls[i]].top -= move;
document.layers[subs[i]].top -= move;
}
else if (document.all) {
document.all(ttls[i]).style.pixelTop -= move;
document.all(subs[i]).style.pixelTop -= move;
      }
   }
}
else {
submenu.visibility = visible;
if (usePictures) picopen(n);
if (lastn != n) {
lasttoggle(lastn,lastmove);
}
for (var i = (n+1); i <= nom; i++) {
if (document.layers) {
document.layers[ttls[i]].top += move;
document.layers[subs[i]].top += move;
}
if (document.all) {
document.all(ttls[i]).style.pixelTop += move;
document.all(subs[i]).style.pixelTop += move;
      }
   }
}
lastn = n;
lastmove = move;
}
//  End -->
</script>
</HEAD>


<BODY>
<center>
<div class="title" id="title1" style="top: 0px"> 
<a href="#" onClick="javascript: toggle(1,30); return false"><img name="pic1" src="http://javascript.internet.com/img/category-menus/closed.gif" border="0">User Controls</a></div>

<div class="submenu" id="submenu1" style="top: 20px">
 <a href="#" target="right">View a users stats</a><br>
 <a href="page02.html" target="right">Item # 2</a>
</div>

<div class="title" id="title2" style="top: 20px"> 
<a href="#" onClick="javascript: toggle(2,60); return false"><img name="pic2" src="http://javascript.internet.com/img/category-menus/closed.gif" border="0">Category 2</a>
</div>

<div class="submenu" id="submenu2" style="top: 40px">
 <a href="page03.html" target="right">Item # 3</a><br>
 <a href="page04.html" target="right">Item # 4</a><br>
 <a href="page05.html" target="right">Item # 5</a><br>
 <a href="page06.html" target="right">Item # 6</a>
</div>

<div class="title" id="title3" style="top: 40px"> 
<a href="#" onClick="javascript: toggle(3,45); return false"><img name="pic3" src="http://javascript.internet.com/img/category-menus/closed.gif" border="0">Category 3</a>
</div>

<div class="submenu" id="submenu3" style="top: 60px">
 <a href="page07.html" target="right">Item # 7</a><br>
 <a href="page08.html" target="right">Item # 8</a><br>
 <a href="page09.html" target="right">Item # 9</a>
</div>

<div class="title" id="title4" style="top: 60px"> 
<a href="#" onClick="javascript: toggle(4,60); return false"><img name="pic4" src="http://javascript.internet.com/img/category-menus/closed.gif" border="0">Category 4</a>
</div>

<div class="submenu" id="submenu4" style="top: 80px">
 <a href="page10.html" target="right">Item # 10</a><br>
 <a href="page11.html" target="right">Item # 11</a><br>
 <a href="page12.html" target="right">Item # 12</a><br>
 <a href="page13.html" target="right">Item # 13</a>
</div>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</center>
</html>
