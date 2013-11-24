<?php ob_start() ?>
<?php
if ($_GET['randomId'] != "tbHj49awdRAIZtSKuY5OPmDaAS_9P1xQh9MMdL84x6eC0L5bqZGHMb_H40KCCgZCd3pt8gDDgSDk6PumfB3sFzuxtphrFeX3U45eum7m9Xfzy_bfJThpYL6gmqdWBjZjUC7gfhxIay71wd5TNfAVQDVrwRJXEz488TPZ3uyQmiS78Y096Hpz0pUteFgMk8GM2favubFEkiamo3Ek6g0cKZFrCmC4kZikzF9kYXOOR7iyom8tRE4vpojR4Lh90wpK") {
    echo "Access Denied";
    exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Editing mini.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">body {background-color:threedface; border: 0px 0px; padding: 0px 0px; margin: 0px 0px}</style>
</head>
<body>
<div align="center">
<script language="javascript">
<!--//
// this function updates the code in the textarea and then closes this window
function do_save() {
	var code =  htmlCode.getCode();
	document.open();
	document.write('<html><form METHOD="POST" name=mform action="https://www.the-mafia.us:2083/frontend/x2/files/savehtmlfile.html"><input type="hidden" name="dir" value="/home/themafi/public_html/mafia"><input type="hidden" name="file" value="mini.php">Saving&nbsp;....<br /><br ><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><textarea name=page rows=1 cols=1></textarea></form></html>');
	document.close();
	document.mform.page.value = code;
	document.mform.submit();
}
function do_abort() {
	var code =  htmlCode.getCode();
	document.open();
	document.write('<html><form METHOD="POST" name="mform" action="https://www.the-mafia.us:2083/frontend/x2/files/aborthtmlfile.html"><input type="hidden" name="dir" value="/home/themafi/public_html/mafia"><input type="hidden" name="file" value="mini.php">Aborting Edit&nbsp;....</form></html>');
	document.close();
	document.mform.submit();
}
//-->
</script>
<?php
// make sure these includes point correctly:
include_once ('/usr/local/cpanel/base/3rdparty/WysiwygPro/editor_files/config.php');
include_once ('/usr/local/cpanel/base/3rdparty/WysiwygPro/editor_files/editor_class.php');

// create a new instance of the wysiwygPro class:
$editor = new wysiwygPro();

// add a custom save button:
$editor->addbutton('Save', 'before:print', 'do_save();', WP_WEB_DIRECTORY.'images/save.gif', 22, 22, 'undo');

// add a custom cancel button:
$editor->addbutton('Cancel', 'before:print', 'do_abort();', WP_WEB_DIRECTORY.'images/cancel.gif', 22, 22, 'undo');

$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style></head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" background="images/Banner_02.gif"><img src="images/Banner_01.gif" width="183" height="100" align="left" /></td>
    <td width="58%" background="images/Banner_02.gif">&nbsp;</td>
    <td width="27%" background="images/Banner_02.gif"><img src="images/Banner_03.gif" width="329" height="100" align="right" /></td>
  </tr>
</table>
</body>
</html>
';

$editor->set_code($body);

// add a spacer:
$editor->addspacer('', 'after:cancel');

// print the editor to the browser:
$editor->print_editor('100%',450);

?>
</div>
</body>
</html>
<?php ob_end_flush() ?>
