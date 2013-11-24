<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$info = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

?>


<html>
<HEAD>

<script language="JavaScript"><!-- Start
var value1 = "", value2 = "", value3 = "0"
var value4 = "done", num = 0, mvalue = 0; 
function nkey(i) {
  if (num == 1) { 
     value1 = value2; value2 = value3;
     value3 = "" + i; value4 = "eidt"; num = 2; 
  } else { 
     if (value4 == "done" || value3 + "" == "0")
     { value3 = "" + i; value4 = "eidt"; } 
     else { value3 += "" + i; }
  }
  more(); 
}
function ptkey() {
 if (value4 != "point")  { 
   if (value4 == "done") {
     if (num != 1) { ckey(0); } 
     nkey("0.");
   } else { value3 += "."; more(); }
   value4 = "point"; 
 }
} 
function more() {
 document.cform.V1.value = value1 + " " + value2 + " " + value3;
}
function fkey(j) {
 if (num != 1) {
   value2 = eval(value1 + value2 + value3); value1 = ""; 
   value2 = round(value2); num = 1; value4 = "done";
 }
 value3 = j; more();
}     
function rkey(j) {
 if (num != 1) { if (j == "%") {
     value3 = value3 * 0.01; 
   } 
   if (j == "=") {
     value3 = eval(value1 + value2 + value3); 
     value2 = ""; value1 = ""; num = 0;
   }
   value3 = round(value3); more(); value4 = "done"; 
 }
}
function ckey(k) {
 if (k == 0) { if (value2 != "") 
   { value3 = value2; } else { value3 = "0"; }
   value2 = value1; value1 = "";
   if (num == 2) { num = 1; } else { num = 0; }
 } 
 if (k == 1) {
   value3 = "0"; value2 = ""; value1 = ""; num = 0;
 }
 more(); value4 = "done"; 
}
function mvkey(k) {
 if (num == 0) {
   if (k == "+") { mvalue = mvalue + eval(value3); }
   if (k == "-") { mvalue = mvalue - eval(value3); }
   mvalue = round(mvalue); setmemo(); value4 = "done"; 
 }
}
function mckey(k) {
 if(k == "=") {
   if (num != 1) { ckey(0); }
   nkey(mvalue); value4 = "done"; 
 }
 if (k == "c") { mvalue = 0; setmemo(); } 
}
function setmemo() {
  document.cform.V2.value = "";
  if (mvalue != 0) {
    document.cform.V2.value = "<M> " + mvalue + "; ";
  }
}
function sbkey() {
 value2 = altsb(value2 + ""); 
 value3 = altsb(value3 + ""); more();
} 
function altsb(sb) {
 if (sb == "") { value3 = - eval(value3) + ""; }
 if (sb == "+") { return "-"; }
 if (sb == "-") { return "+"; }
 if (sb == "*") { return "/"; }
 if (sb == "/") { return "*"; }
 return sb; 
}

function round(rndval) {
 var full = rndval + "", endstr = ""; 
 if (full.indexOf('.') < 0) { return rndval; } 
 if (eval(full.substring(0, full.indexOf('.') + 9)) == 0) 
 { return rndval; }
 var cutsize = full.length; 
 if (full.indexOf('e') > 0 ) {
   cutsize = full.indexOf('e') - 1; 
   endstr = full.substring(cutsize + 1, full.length); 
 }
 var cutstr = full.substring(full.indexOf('.'), cutsize); 
 cutsize = cutstr.length;
 if (cutsize > 9) {
   var addup = 1;
   full = full.substring(0, full.indexOf('.')); 
   for (var x=0; x<cutsize - 1; x++) {addup *= 0.1;}
   cutstr = (addup*4 + eval(cutstr)) + "";
   var cutlen = cutstr.length; 
   if (cutstr.indexOf('e') != -1) { return rndval; } 
   if (cutsize - cutlen > 4) {
     return eval(full + cutstr.substring(1, cutlen)) + endstr; 
   }
   cutstr = cutstr.substring(0, cutstr.length - 2); 
   cutstr = eval(cutstr) + "";
   if (cutstr.indexOf('e') != -1) { return rndval; } 
   if (cutlen - cutstr.length > 4) {
     return eval(full + cutstr.substring(1, cutstr.length)) + endstr; 
   }
 }
 return rndval; 
}

// END / Many more are available free online -->
</SCRIPT>

<style>
.cabutt
{background-color: #FFEECC; color: #3366CC; width: 100%; height: 50; 
 position: relative; border-style: solid; border-color: #FFEECC}
.cdbutt
{background-color: #000080; color: #FFEECC; height: 50; 
 position: relative;border-style: solid; border-color: #000080}
</style>
</HEAD>


<body>

<table width="100%" height="100%" border="1" align="center" cellpadding="3" cellspacing="0" 
 bordercolor=black class="thinline">

<tr><td align="center" colspan="2" background="includes/grad.jpg">Calculator</td></tr>


  <tr> 
    <td align="center" colspan="2">
<table border="1" width="50%" height="50" 
      cellpadding="2" bgcolor="#999999" class=thinline bordercolor=black>
      <form class="liform" name="cform"> 
  <tr>
    <td width="100%" bgcolor="#999999" colspan="6" height="50">
  <table border="0" width="100%" height="100%" 
     cellspacing="0" cellpadding="0" bgcolor="#000080">
              <tr> 
                <td width="350" align="right"><nobr> 
                  <input type=button class="cdbutt" name="V2">
                  <input type=button class="cdbutt" name="V1">
                  </nobr></td>
            </table>
    </td>
  </tr>
  <tr>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="1" onClick="nkey(1)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="2" onClick="nkey(2)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="3" onClick="nkey(3)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="+" onClick='fkey("+")'></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="+/-" onClick="sbkey()"></td>
    <td width="100" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="C" onClick="ckey(1)"></td>
  </tr>
  <tr>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="4" onClick="nkey(4)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="5" onClick="nkey(5)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="6" onClick="nkey(6)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="-" onClick='fkey("-")'></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="M+" onClick='mvkey("+")'></td>
    <td width="100" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="CE" onClick="ckey(0)"></td>
  </tr>
  <tr>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="7" onClick="nkey(7)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="8" onClick="nkey(8)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="9" onClick="nkey(9)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="*" onClick='fkey("*")'></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="M-" onClick='mvkey("-")'></td>
    <td width="100" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="MC" onClick='mckey("c")'></td>
  </tr>
  <tr>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="." onClick="ptkey()" 
    style="font-weight: bold"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="0" onClick="nkey(0)"></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="%" onClick='rkey("%")'></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="/" onClick='fkey("/")'></td>
    <td width="50" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="M" onClick='mckey("=")'></td>
    <td width="100" bgcolor="#999999" height="50">
<input class="cabutt" type=button value="=" onClick='rkey("=")'></td>  
  </tr></form>
</table>

</body>
</html>
