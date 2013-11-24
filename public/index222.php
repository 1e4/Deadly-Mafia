<form action="" method="post"><div align="center">
    <table width="362" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="354" height="235"><p align="center">
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="400" height="200">
              <param name="movie" value="Empire.swf">
              <param name="quality" value="high">
              <embed src="Empire.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="200"></embed>
            </object>
          </p>
            <p align="center"><span class="style4"> </span></p></td>
      </tr>
    </table>
  </div>
  <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
    <tr>
      <td background="includes/grad.jpg"><center>
        Gangster Name
      </center></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="username" type="text" id="username" value="<?php if (strip_tags($_GET['l'])){ echo "$l"; } ?>" size="15" maxlength="40">
      </div></td>
    </tr>
  </table><br>
  <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
    <tr>
      <td background="includes/grad.jpg"><center>
        Password
      </center></td>
    </tr>
    <tr>
      <td><div align="center"> <span class="style4">
          <input name="password" type="password" id="password2" value="<?php if (strip_tags($_GET['pw'])){ echo "$pw"; } ?>" size="15" maxlength="40">
      </span></div></td>
    </tr>
  </table>
  <tr> 
    <td height="114" colspan="3" valign="top"> <table width="79%" border="0" align="center" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
        </tr>
      </table>
      <div align="center"><span class="style4">
        <input type="submit" name="Submit" value="Login">
</span></div></td>
  </tr>
  <tr> 
    <td width="178" height="100">&nbsp;</td>
    <td width="402" valign="top" background="empbgg.jpeg"><div align="center">
      <p>
        <?
				$timenow=time();
$select = mysql_query("SELECT * FROM users WHERE online > '$timenow' ORDER by id");
$num = mysql_num_rows($select);
 ?>
</p>
      <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
        <tr>
          <td background="includes/grad.jpg"><center>
        Gangsters Online
          </center></td>
        </tr>
        <tr>
          <td><div align="center"><font color="#0000FF"><?php echo "$num"; ?></font> </div></td>
        </tr>
      </table>
      <table width="215" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
        <tr>
          <td colspan="3" background="includes/grad.jpg"><center>
        Not a member? |Forgotten ? |Waiting?
          </center></td>
        </tr>
        <tr>
          <td width="46"><div align="center"><a href="register.php">Register</a></div></td>
          <td width="78"><div align="center"><a href="lost.php">Lost password</a></div></td>
          <td width="71"><a href="act.php">Resend activation</a> </td>
        </tr>
      </table>
      <p align="center">&nbsp;</p>
      <p align="center" class="style4">&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center" class="style4">&nbsp;</p>
    </div>
    </td>
    <td width="190">&nbsp;</td>
  </tr>
  <tr> 
    <td height="14"></td>
    <td valign="top" bgcolor="#000000"><div align="center">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;          </p>
      <p class="style1">
      <p align="center">&nbsp;</p>
      </p>
      </div></td>
    <td></td>
  </tr>
</form>
  <tr>
    <td height="87"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
