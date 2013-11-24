<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<?
function img_check($forbidden) {
$forbidden = eregi_replace("/defuse2.php","not allowed",$forbidden);
 return $forbidden;
} 
function img_check1($forbidden1) {
$forbidden1 = eregi_replace("javascript:document.getElementsByTagName
","not allowed",$forbidden1);
 return $forbidden1;
}
function img_check2($forbidden2) {
$forbidden2 = eregi_replace("/grave.php?piss=","not allowed",$forbidden2);
 return $forbidden2;
}


function replace($txt) {
$txt = str_replace(":normal:", "<img src=\"images/Smiles/icon_neutral.gif\">", $txt);
$txt = str_replace(":O", "<img src=\"images/Smiles/icon_surprised.gif\">", $txt);
$txt = str_replace(":o", "<img src=\"images/Smiles/icon_surprised.gif\">", $txt);
$txt = str_replace(":mad:", "<img src=\"images/Smiles/icon_mad.gif\">", $txt);
$txt = str_replace(":S", "<img src=\"images/Smiles/icon_confused.gif\">", $txt);
$txt = str_replace(":s", "<img src=\"images/Smiles/icon_confused.gif\">", $txt);
$txt = str_replace(":angry:", "<img src=\"images/Smiles/1502.gif.gif\">", $txt);
$txt = str_replace(":hospital:", "<img src=\"images/Smiles/hopical.gif\">", $txt);
$txt = str_replace(":evil:", "<img src=\"images/Smiles/icon_evil.gif\">", $txt);
$txt = str_replace(":D", "<img src=\"images/Smiles/grin.gif\">", $txt);
$txt = str_replace(":d", "<img src=\"images/Smiles/grin.gif\">", $txt);
$txt = str_replace(":P", "<img src=\"images/Smiles/icon_razz.gif\">", $txt);
$txt = str_replace(":p", "<img src=\"images/Smiles/icon_razz.gif\">", $txt);
$txt = str_replace(":sick:", "<img src=\"images/Smiles/ill.gif\">", $txt);
$txt = str_replace(":!:", "<img src=\"images/Smiles/!.gif\">", $txt);
$txt = str_replace(":)", "<img src=\"images/Smiles/smil.gif\">", $txt);
$txt = str_replace(":(", "<img src=\"images/Smiles/icon_sad.gif\">", $txt);
$txt = str_replace(":cool:", "<img src=\"images/Smiles/cool2.gif\">", $txt);
$txt = str_replace(":twisted:", "<img src=\"images/Smiles/twis.gif\">", $txt);
$txt = str_replace(":evil:", "<img src=\"images/Smiles/icon_evil.gif\">", $txt);
$txt = str_replace(":greenarmy:", "<img src=\"images/Smiles/greenarmy.gif\">", $txt);
$txt = str_replace(";)", "<img src=\"images/Smiles/wink.gif\">", $txt);
$txt = str_replace(":|", "<img src=\"images/Smiles/icon_eek.gif\">", $txt);
$txt = str_replace(":devil:", "<img src=\"images/Smiles/devil.gif\">", $txt);
$txt = str_replace(":rastaman:", "<img src=\"images/Smiles/rasta.gif\">", $txt);
$txt = str_replace(":club:", "<img src=\"images/Smiles/rave.gif\">", $txt);
$txt = str_replace(":cry:", "<img src=\"images/Smiles/sadd.gif\">", $txt);
$txt = str_replace(":cheers:", "<img src=\"images/Smiles/cheers.gif\">", $txt);
$txt = str_replace(":blush:", "<img src=\"images/Smiles/blush.gif\">", $txt);
$txt = str_replace(":boxer:", "<img src=\"images/Smiles/box.gif\">", $txt);
$txt = str_replace(":redface:", "<img src=\"images/Smiles/shy.gif\">", $txt);
$txt = str_replace(":hug:", "<img src=\"images/Smiles/hug.gif\">", $txt);
$txt = str_replace(":ninja:", "<img src=\"images/Smiles/ninja.gif\">", $txt);
$txt = str_replace(":roll:", "<img src=\"images/Smiles/icon_rolleyes.gif\">", $txt);
$txt = str_replace(":king:", "<img src=\"images/Smiles/king.gif\">", $txt);
$txt = str_replace(":banned:", "<img src=\"images/Smiles/banned.gif\">", $txt);
$txt = str_replace(":beye:", "<img src=\"images/Smiles/beye.gif\">", $txt);
$txt = str_replace(":love:", "<img src=\"images/Smiles/love.gif\">", $txt);
$txt = str_replace(":help:", "<img src=\"images/Smiles/help.gif\">", $txt);
$txt = str_replace(":huh:", "<img src=\"images/Smiles/wah.gif\">", $txt);
$txt = str_replace(":gun:", "<img src=\"images/Smiles/gun.gif\">", $txt);
$txt = str_replace(":angel:", "<img src=\"images/Smiles/angel.gif\">", $txt);
$txt = str_replace(":superman:", "<img src=\"images/Smiles/superman.gif\">", $txt);
$txt = str_replace(":taunt:", "<img src=\"images/Smiles/taunt.gif\">", $txt);
$txt = str_replace(":alien:", "<img src=\"images/Smiles/alien.gif\">", $txt);
$txt = str_replace(":lol:", "<img src=\"images/Smiles/icon_lol.gif\">", $txt);
$txt = str_replace(":meep:", "<img src=\"images/Smiles/roadrunner.gif\">", $txt);

/////////Racist Block's////////////

$txt = str_replace("Black Basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("black basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("BLACK BASTERD", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Black BASTERD", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("BLACK basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Black Cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("BLACK CUNT", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Black CUNT", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("BLACK Cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("black cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Paki", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Packi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("PAKI", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("PaKi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("paki", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("PaKi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("pAkI", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Nigger", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("nigger", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("NIGGER", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("NiGGer", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("Nigga", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("NiGGa", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("NIGGA", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = str_replace("nigga", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $txt);
$txt = eregi_replace("[img]javascript:document.getElementsByTagName
[/img]", "<font color=black><b>Russian Roulette HACK ATTEMPT contact a Mod or Admin about this to ban the player</a></b></font>", $txt);
$txt = str_replace("[img]www.empire2010.com/defuse2.php[/img]", "<font color=black><b>Russian Roulette HACK ATTEMPT contact a Mod or Admin about this to ban the player</a></b></font>", $txt);
$txt = str_replace("[img]http://www.Empire2010.com/defuse2.php[/img]", "<font color=black><b>Russian Roulette HACK ATTEMPT contact a Mod or Admin about this to ban the player</a></b></font>", $txt);

/////////Others//////////////

$txt = eregi_replace("www.gangparadise.com","<font color=black><b>I ADMIT THAT I AM GAY</b></font>",$txt);
$txt = eregi_replace("gangparadise","<font color=black><b>i-like-boys</b></font>",$txt);
$txt = eregi_replace("gangsterp","<font color=red><b>This Game Is MINT!!</b></font>",$txt);
$txt = eregi_replace("Gang Paradise","<font color=black><b>IM BENT</b></font>",$txt);
$txt = eregi_replace("Gangster Paradise","<font color=black><b>IM BENT</b></font>",$txt);



/////////BB Codes////////////

$txr = str_replace("#\[color=(.+?)\](.+?)\[/color\]#is","<font color=\"\\1\">\\2</font>",$string);
$txt = str_replace("[center]", "<center>", $txt);
$txt = str_replace("[/center]", "</center>", $txt);
$txt = str_replace("[b]", "<b>", $txt);
$txt = str_replace("[/b]", "</b>", $txt);
$txt = str_replace("[i]", "<i>", $txt);
$txt = str_replace("[/i]", "</i>", $txt);
$txt = str_replace("[u]", "<u>", $txt);
$txt = str_replace("[/u]", "</u>", $txt);
$txt = str_replace("[move]", "<marquee>", $txt);
$txt = str_replace("[/move]", "</marquee>", $txt);
$txt = str_replace("[url=]", "<a href=leave.php?site=$txt", $txt);
$txt = str_replace("[*url]", ">", $txt);
$txt = str_replace("[/url]", "</a>", $txt);
$txt = str_replace("[img]", "<img border=0 src=", $txt);
$txt = str_replace("[/img]", ">", $txt);
$txt = str_replace("[quote]", "<div id=quote><b>QUOTE:</b><br>", $txt);
$txt = str_replace("[/quote]", "</div>", $txt);
$txt = str_replace("[code]", "<div id=code>", $txt);
$txt = str_replace("[/code]", "</div>", $txt);
$txt = str_replace(array("\r\n", "\n", "\r"), '<br>', $txt); 
$txt = str_replace("[b]", "<b>", $txt);
$txt = str_replace("[size=5]", "<h1>", $txt);
$txt = str_replace("[size=4]", "<h2>", $txt);
$txt = str_replace("[size=3]", "<h3>", $txt);
$txt = str_replace("[size=3]", "<h3>", $txt);
$txt = str_replace("[size=2]", "<h4>", $txt);
$txt = str_replace("[size=1]", "<h5>", $txt);
$txt = str_replace("[/size]", "</h3>", $txt);
$txt = str_replace("[/size]", "</h2>", $txt);
$txt = str_replace("[/size]", "</h1>", $txt);
$txt = str_replace("[/size]", "</h4>", $txt);
$txt = str_replace("[/size]", "</h5>", $txt);
$txt = preg_replace("#\[color=(.+?)\](.+?)\[/color\]#is","<font color=\"\\1\">\\2</font>",$txt);

// HACK //

$txt = eregi_replace("/defuse2.php","<font color=black><b>HACK</b></font>",$txt);
$txt = eregi_replace("/hitlist.php","<font color=red><b>Not Permitted</b></font>",$txt);
$txt = eregi_replace("/grave.php","<font color=black><b>Not Permitted</b></font>",$txt);
$txt = eregi_replace("javascript","<font color=black><b>Not Permitted</b></font>",$txt);
$txt = eregi_replace("bootleggers","<font color=black><b>Not Permitted</b></font>",$txt);
$txt = eregi_replace("javascript;","<font color=black><b>Not Permitted</b></font>",$txt);
$txt = eregi_replace("[img]javascript[/img]
","<font color=black><b>Not Permitted</b></font>",$txt);


// end //








return $txt;
}

function rep2($txt) {
$txt = str_replace('&lt;','<',$txt);
$txt = str_replace('&gt;','>',$txt);
$txt = str_replace('&quot;','\"',$txt);
$txt = str_replace('&#039;',"'",$txt);
$txt = str_replace('&#amp;','&',$txt);
return $txt;
}
?>