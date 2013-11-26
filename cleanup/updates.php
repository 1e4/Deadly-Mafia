	?>
	
	</td>
  </tr>
</table>
<br>
<br>
<?php if ($fetch->userlevel == "2"){ 
if (strip_tags($_POST['submit']) && (strip_tags($_POST['update'] != ""))){
$update=strip_tags($_POST['update']);
$date = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `updates` ( `id` , `username` , `time` , `update` ) 
VALUES (
'', '$username', '$date', '$update'
)");
echo "Update has been added";
}


?>
<form name="form1" method="post" action="">
  <table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr> 
      <td class="header"><center>
          <strong>Add a update</strong> </center></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td colspan="2"><div align="center">Add an update:</div></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <textarea name="update" cols="80" rows="5" id="update"></textarea>
              </div></td>
          </tr>
          <tr> 
            <td width="86%">&nbsp;</td>
            <td width="14%"><input name="submit" type="submit" id="submit" value="Add update"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<? } ?><p>
<?php include_once"includes/footer.php"; ?>


</body>
</html>
