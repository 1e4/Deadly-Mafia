<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

?>

<html>
<head>
<title>ACP Help</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function clickit(id,header,state){
	if(state==1){
	   document.getElementById(id).style.display = 'block';
	   document.getElementById(header).style.borderBottom = '0';
	} else {
	   document.getElementById(id).style.display = 'none';
	   document.getElementById(header).style.borderBottom = '1px solid #004E82';
	}
}
</script>
<style type="text/css">
td,th {
	border: 1px solid #96A9C9;
	font-family: Tahoma;
	font-size: 8pt;
	color: #004E82;
	padding:5px;
	text-align: left;
	border-left:0;
	width: 16%;
}

td.end, th.end {
	border-bottom:0;
}

div.pd {
	border:1px solid #004E82;
	font-family: Tahoma;
	font-size: 8pt;
	color: #000;
	padding: 5px;
	text-align: left;
	border-bottom: 0px;
}

div.header {
	background: #DAE9F3;
	font-family: Tahoma;
	font-size: 8pt;
	color: #004E82;
	padding: 5px;
	border-bottom: 1px solid #004E82;
	border-top: 1px solid #004E82;
	text-align: left;
}

div.tabular_data {
	border: 1px solid #004E82;
	font-family: Tahoma;
	font-size: 8pt;
	color: #000;
}

p.general {
	margin: 10px;
	text-align: left;
}

tr:hover {
	background:#F7F8F9;
}

th {
	background: #EEEFFF;
	border-right: 1px solid #96A9C9;
}

.last {
	border-right: 0px;
}

.lastend {
	border-right:0;
	border-bottom:0;
}

a {
	color:#004E82;
}

.form {
	border-right:0px;
	padding:2px;
}

.formend {
	border-right:0;
	border-bottom:0;
	padding: 2px;
}

input,select {
	margin:0;
	font-family: tahoma;
	font-size: 8pt;
}
select {
	padding:0px;
}

tr.form, tr.form:hover {
	background: #FFF;
}

a.pm {
	font-weight: bold;
	text-decoration: none;
}

a:hover {
	color: #E9592F;
}
</style>
</head>

<body style="margin: 30px auto 30px auto; text-align: center">



<div style="margin:auto;width:740px;margin-bottom:20px;">
	<div style="text-align: left;border: 1px solid #004E82;background:#99BDE6;height:70px">
	<img src="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/title.gif" alt="playarcade" style="margin-left:8px;" />
	</div>
	
  <div class="header" style="border: 1px solid #004E82;border-top:0;padding-left:13px;text-align:left"> 
    <strong>Admin CP</strong> - [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/index.php">ACP Home</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/help.php?howto">How 
    to use ACP</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/help.php?mod">Modifying the Script</a> ] :: 
    [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/help.php?liscence">Licence</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/help.php?howto&mod&liscence" title="Opens How to, Modification and Liscence info on one page">Full 
    Help File</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/index.php">Site Home</a> ] </div>
</div>


<div style="margin:auto;width:740px;">
	
<?php
if(isset($_GET['howto'])){
?>
	<div class="pd" style="background:#99BDE6;">
	<strong>Admin Control Panel Help</strong>
	</div>
	
	<div class="tabular_data">
	<div class="header" style="border-top: 0px"><strong>Index</strong></div>
	<p class="general">
		<a href="#cac">Create Category</a> |
		<a href="#ag">Add Game</a> |
		<a href="#ulf">Upload File</a> |
		<a href="#dc">Delete Category/Game</a> |
		<a href="#emc">Empty Category</a> |
		<a href="#udcg">Up/Down a Category/Game</a>
	</p>
	
	<a name="cac"></a>
	<div class="header"><strong>Create a Category</strong></div>
	<p class="general">
	In order to create a category, you first need to expand the add a category menu. To do this
	click on the plus symbol next to the "Add a Category" header. The menu should open up. (If you have
	javascript disabled, this menu should automatically be opened). 
	<br /><br />
	You will then be presented with
	a form which will ask you for some simple information. You need to enter a category name, a number
	that can be used to order the category (the lower the number, the higher up the category) and
	also you need to select whether the category is visible or not. When you have entered this information
	click "Create Category" and your category should be created.
	</p>
	
	<a name="ag"></a>
	<div class="header"><strong>Add Game</strong></div>
	<p class="general">
	Similar to creating a category, you first need to expand the add a game menu. Click the plus
	sign next to the "Add New Game" menu. If javascript is disabled this menu will already be open.
	<br /><br />
	Next you need to input some information. You need to enter a Game name, an order Id (to define how
	the game should be ordered, a short description of the game (it is reccomended you keep this short
	as it could make the layout seem less fluid if the name is too long). Next you need to enter
	a width and height for the game... This is important! To keep the design looking good, it is reccomended
	you do not have a width above 440px. Next select a category (if you haven't created a category
	you will only be able to put it in "Other Games". Finally, select an image and a SWF file for the game
	(you will need to have uploaded these), and then choose whether or not you would like the game to be visible.<br /><br />
	To finish, click "Add Game". Your game should then be added to the database.
	</p>
	
	<a name="ulf"></a>
	<div class="header"><strong>Upload a File</strong></div>
	<p class="general">
	The upload file menu is the second menu down. There are two sections, upload
	SWF file and upload Image file.
	<br /><br />
	The upload process is very simple. Choose the type of file you want to upload
	and then click the browse button in the relevant section. Find the file and then
	click the "Upload" button. You will be given a message telling you if the upload
	worked or not. The file will then be added to the list of Images/SWF's (depending
	on what kind of file you uploaded). Please note that there are limitations on file type:<br /><br />
	<strong>SWF Files</strong><br />
	*.swf<br /><br />
	<strong>Image Files</strong><br />
	*.jpg,
	*.gif,
	*.png,
	*.bmp<br /><br />
	It is reccomended you use .gif, .jpg or .bmp files... .bmp (Bitmap) files are
	often far to large for web page use. If you want to lift this limitation, look
	at <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI74.972/help.php?mod#rlm">Modifying the Script - Removing filetype Limitation</a>.
	The limitation is in place, so that in the event that someone finds out your password
	and can access your ACP, they cannot upload PHP files or other files that could do
	damage to your server.
	</p>
	
	<a name="ec"></a>
	<div class="header"><strong>Edit a Category</strong></div>
	<p class="general">
	Editing a category is almost the same as creating one, except that you need to find the
	"Existing Categories and Games" section (at the bottom of ACP home) and then click the edit
	link on the category you want to alter. When you click edit, the page will reload and
	at the top you will see a new section for editing the category, with all the current category
	data within it. Alter the information and click "Edit Category". The category should now
	have been altered.
	</p>
	
	<a name="dc"></a>
	<div class="header"><strong>Delete a Category/Game</strong></div>
	<p class="general">
	To Delete a category or game, click the delete link in the category/game you want to delete. This will
	delete the category/game, and if you are deleting a category, it will delete all games within that category. There is no confirmation before
	deleting this, so ensure you are making the right choice before clicking delete!
	</p>
	
	<a name="emc"></a>
	<div class="header"><strong>Empty a Category</strong></div>
	<p class="general">
	Emptying a category does almost the same as deleting it, except that it doesnt remove the category
	itself, only the games within it. Once again, there is no confirmation, so make sure you are
	clicking empty on the correct category!
	</p>
	
	<a name="udcg"></a>
	<div class="header"><strong>Up/Down a Category/Game</strong></div>
	<p class="general">
	Up and Down describe the re-ordering of categories or games. When you click Up, the order id that you
	entered for that category or game goes down (so it moves up in the list), and vice versa. Basically,
	if you click "Up" your category/game moves up the list and if you click "Down" the category/game
	moves down the list. Depending on the order Id difference between categories and games, it may not appear
	that anything is happening. You can use the Up and Down buttons until you get the categories and games in
	the order you want (the order displayed in ACP will be the loading order on the home page)
	</p>
	
	</div>
	<div class="clear">&nbsp;</div>
<?php
}

if(isset($_GET['mod'])){

?>

<div class="pd" style="background:#99BDE6;">
	<strong>Modifying The Script</strong>
	</div>
	
	<div class="tabular_data">
	<div class="header" style="border-top: 0px"><strong>Index</strong></div>
	<p class="general">
		<a href="#et">Edit the Templates</a> |
		<a href="#rlm">Remove Upload Limitations</a> |
		<a href="#ref">Database Reference</a> |
		<a href="#dbg">Debugging</a>
	</p>
	
	<a name="et"></a>
	<div class="header"><strong>Edit the Templates</strong></div>
	<p class="general">
		The system uses a set of templates to generate output from certain functions. This
		allows changes to be made without direct alteration of the source code. The templates
		can be found in the file "templates.tpl.php". To edit a template, find the relevant
		value in the array and alter whichever sections you want.<br /><br />
		Please note you should use \" rather than " for single quotes, as single quotes will throw an
		error due to the way the template is parsed. You can also use variables, however, you need
		to use \' rather than ' in array names, due to the fact that the string is within single quotes.
		That is all there is to it. When you save the file the new template will be used instead of the old one.
	</p>
	
	<a name="rlm"></a>
	<div class="header"><strong>Remove Upload Limitations</strong></div>
	<p class="general">
		This modification would need to be applied in the file "admin.class.php" in the function "doUpload()".
		As default, there is a limitation on file types that can be uploaded. This is so that if someone else
		manages to get access to your Admin CP, they cannot upload scripts that could cause damage to your
		server. If you want to remove this limitation, then you can remove the entire "if($type == 'swf' ...."
		section from the function, and this will stop the limitation taking effect.
	</p>
	
	<a name="ref"></a>
	<div class="header"><strong>Database Reference</strong></div>
	<p class="general">
		For Reference, here are all the fields in the three tables used, and a description of what
		they each are:<br /><br />
		<strong>categories</strong><br />
		<u>cId</u> - Unique Id for category<br />
		<u>cName</u> - Name of category<br />
		<u>cOrder</u> - Order number for category<br />
		<u>cVisible</u> - Visibility of category, 1 = visible, 0 = invisible<br /><br />
		
		<strong>games</strong><br />
		<u>gId</u> - Unique Id for game<br />
		<u>gSwfFile</u> - Name of game (SWF) file<br />
		<u>gName</u> - Game Name<br />
		<u>gOrder</u> - Order number for game<br />
		<u>gThumb</u> - Game thumbnail Image<br />
		<u>gVisible</u> - Visibility of game, 1 = visible, 0 = invisible<br />
		<u>gWidth</u> - Width of game<br />
		<u>gHeight</u> - Height of game<br />
		<u>gDescription</u> - Description of Game<br /><br />
		
		<strong>playstats</strong><br />
		<u>pgId</u> - Game Id<br />
		<u>pcId</u> - Category of game<br />
		<u>Played</u> - The number of plays<br />
	</p>
	
	<a name="dbg"></a>
	<div class="header"><strong>Debugging</strong></div>
	<p class="general">
		If you are writing a modification and it wont work, one useful thing that often helps is to use
		the following short code snippet:<br /><br />
		<code>
		echo '&lt;pre&gt;';<br />
		var_dump($sys);<br />
		echo '&lt;/pre&gt;';
		</code>
		<br /><br />
		This will show you any information loaded from the class that has been stored. You can use
		var_dump() for any variables, or even call a function within var_dump() and have it output
		the return of the function. Lookup <a href="http://www.php.net/var-dump">var_dump</a> for
		more info.
	</p>
	</div>
	<div class="clear">&nbsp;</div>

<?php

}

if(isset($_GET['liscence'])){

	?>
	
  <div class="pd" style="background:#99BDE6;"> <strong>Licence for the code</strong> 
  </div>
	
	<div class="tabular_data">
	<div class="header" style="border-top: 0px"><strong>Licence Information</strong></div>
	<p class="general"> You may alter this system in any way that you like, incorperate 
      it within other scripts without any violation. However, you must not re-distribute 
      the source without prior contact, sell the source or parts of the source, 
      or pass the code off as your own work.<br />
      <br />
      <br />
		By using this code for your website you are agreeing to these terms. If you do not agree,
		please do not use the source for your website(s).
	</p>
	</div>
	<?php

}
?>
</div>
</div>
</body>
</html>
