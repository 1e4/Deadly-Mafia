
<script language=JavaScript>
function so(dis)
{
for (i=0;i<dis.elements.length;i++){ 
	if (dis.elements[i].type=='submit')
	   dis.elements[i].style.visibility='hidden';
	}
	if(fs==false){
		 fs=true;
		 return true;
	}else
 		return false;
	}
	function goaway()
{
for(i=0;i<document.forms.length;i++)
 document.forms[i].onsubmit = function() {return so(this);};
}
</script><body onload=goaway();><link REL="stylesheet" TYPE="text/css" HREF="connections/in.css">

<div align=center> You can carry 5 ounces</div>
<form name=form1 method=post action=http://www.ny-mafia.com/drugs.php>
  <table width=300 cellspacing=1 cellpadding=1 border=0 bordercolor=black class=black align=center>
    <tr>
      <td colspan=6 class=header><div align=center>Drugs </div></td>
    </tr>
    <tr class=title>
      <td colspan=2><div align=center>Buy/Sell</div></td>
      <td width=78><div align=center>Drug</div></td>
      <td width=70><div align=center>Price</div></td>
      <td colspan=2><div align=center>Ounces</div></td>
    </tr>
    <tr class=text>
      <td width=1 bgcolor=#99999></td>
      <td width=49><input name=W type=text class=submit size=5 maxlength=3></td>
      <td>Weed</td>
      <td>100</td>
      <td width=64>0</td>
      <td width=1 bgcolor=#99999></td>
    </tr>
    <tr class=text>
      <td bgcolor=#99999> </td>
      <td><input name=S type=text class=submit size=5 maxlength=3></td>
      <td>Shrooms</td>
      <td>359</td>
      <td>0</td>
      <td bgcolor=#99999></td>
    </tr>
    <tr class=text>
      <td  bgcolor=#99999></td>
      <td><input name=C type=text class=submit size=5 maxlength=3></td>
      <td> Cocaine </td>
      <td>915</td>
      <td>0</td>
      <td bgcolor=#99999></td>
    </tr>
    <tr class=text>
      <td  bgcolor=#99999></td>
      <td><input name=O type=text class=submit size=5 maxlength=3></td>
      <td>Opium</td>
      <td>636</td>
      <td>0</td>
      <td bgcolor=#99999></td>
    </tr>
    <tr class=text>
      <td  bgcolor=#99999></td>
      <td><input name=E type=text class=submit size=5 maxlength=3></td>
      <td> Ecstasy <br></td>
      <td>182</td>
      <td>0</td>
      <td  bgcolor=#99999></td>
    </tr>
    <tr class=text>
      <td bgcolor=#99999></td>
      <td><input name=P type=text class=submit size=5 maxlength=3></td>
      <td>Pcp</td>
      <td>1838</td>
      <td>0</td>
      <td bgcolor=#99999></td>
    </tr>
	<tr class=text>
      <td bgcolor=#99999></td>
      <td><input name=L type=text class=submit id=L size=5></td>
      <td>LSD</td>
      <td>534</td>
      <td>N</td>
      <td bgcolor=#99999></td>
    </tr>
	<tr class=text>
      <td bgcolor=#99999></td>
      <td><input name=K type=text class=submit id=K size=5 maxlength=3></td>
      <td>Vitamin K</td>
      <td>327</td>
      <td></td>
      <td bgcolor=#99999></td>
    </tr>
	<tr class=text>
      <td bgcolor=#99999></td>
      <td><input name=M type=text class=submit id=M size=5 maxlength=3></td>
      <td>Meth</td>
      <td>492</td>
      <td></td>
      <td bgcolor=#99999></td>
    </tr>
    <tr class=title>
      <td colspan=2>&nbsp;</td>
      <td><input name=tran type=radio value=buy  class=submit>
Buy</td>
      <td><input name=tran type=radio value=sell  class=submit>
Sell</td>
      <td colspan=2><input type=submit name=Submit value=Submit  class=submit></td>
    </tr>
  </table>
</form>