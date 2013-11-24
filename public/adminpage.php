<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

?>

<html>
<head>
<title>Admin Control Panel</title>
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
	font-weight: bold;
	border-bottom: 0px;
}

div.header {
	background: #DAE9F3;
	font-family: Tahoma;
	font-size: 8pt;
	color: #004E82;
	padding: 5px;
}

div.tabular_data {
	border: 1px solid #004E82;
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
	text
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
    <strong>Admin CP</strong> - [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/index.php">ACP Home</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/help.php?howto">How 
    to use ACP</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/help.php?mod">Modifying the Script</a> ] :: 
    [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/help.php?liscence">Licence</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/help.php?howto&mod&liscence" title="Opens How to, Modification and Liscence info on one page">Full 
    Help File</a> ] :: [ <a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/index.php">Site Home</a> ] </div>
	<?php
	require("admin.class.php");
	$sys = new GamesSystem(1);
	$a = new GamesAdmin();
	if($a->output_message != ''){
	?>
	<div style="clear:both;height:20px;">&nbsp;</div>
	<div class="header" style="border: 1px solid #004E82;text-align:left">
	<?php echo $a->output_message; ?>
	</div>
	<?php
	}
	$sys->Load();
	?>
</div>
<?php
if(isset($_GET['cmd']) && $_GET['cmd'] == 'cedit'){
$data = $a->editload($_GET['id']);
?>
<div style="margin:auto;width:740px;margin-bottom:20px;">
<form action="<?php echo $_SERVER['file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/PHP_SELF']; ?>?cmd=edit-done" method="post">
	<input type="hidden" name="cId" value="<?php echo $data['cId']; ?>" />
		<div class="pd" id="ec" style="background:#99BDE6;">
		Edit Category&nbsp; 
		[ <a class="pm" href="javascript:clickit('ectd','ec','0')">-</a>
		<a class="pm" href="javascript:clickit('ectd','ec','1')">+</a> ]
		</div>
		<div class="tabular_data" id="ectd">
		<div class="header" style="text-align:left"><strong>Enter the Data</strong></div>
		<table style="border-collapse: collapse;padding:0;width:100%;">
		
			<tr>
				<th style="width:40%">Request</th>
				<th style="width:60%" class="last">Input</th>
			</tr>
			<tr class="form">
				<td>Category Name</td>
				<td class="form"><input type="text" name="cName" value="<?php echo $data['cName']; ?>" /></td>
			</tr>
			<tr class="form">
				<td>Category Order</td>
				<td class="form"><input type="text" name="cOrder" value="<?php echo $data['cOrder']; ?>" /></td>
			</tr>
			<tr class="form">
				<td>Category is Visible</td>
				<td class="form"><select name="cVisible">
				<?php
				$y = ' selected="selected"';
				$n = '';
				if($data['cVisible'] != '1'){
					$n = ' selected="selected"';
					$y = '';
				}
				?>
				<option value="1"<?php echo $y; ?>>Yes</option>
				<option value="0"<?php echo $n; ?>>No</option>
				</select></td>
			</tr>
			<tr class="form">
				<th class="end">Finish</th>
				<th class="formend"><input type="submit" name="submit" value="Edit Category" /></th>
			</tr>
			
		</table>
		</div>
	</form>
</div>
<?php
}
?>

<div style="margin:auto;width:740px;">
	
	<form action="<?php echo $_SERVER['file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/PHP_SELF']; ?>?cmd=nc" method="post">
	<input type="hidden" name="ignore" value="ignore,submit" />
	<div style="width:360px;float:left">
		<div class="pd" id="ac" style="background:#99BDE6;">
		Add New Category&nbsp; 
		[ <a class="pm" href="javascript:clickit('actd','ac','0')">-</a>
		<a class="pm" href="javascript:clickit('actd','ac','1')">+</a> ]
		</div>
		<div class="tabular_data" id="actd">
		<div class="header" style="text-align:left"><strong>Enter the Data</strong></div>
		<table style="border-collapse: collapse;padding:0;width:100%;">
		
			<tr>
				<th style="width:40%">Request</th>
				<th style="width:60%" class="last">Input</th>
			</tr>
			<tr class="form">
				<td>Category Name</td>
				<td class="form"><input type="text" name="input[categories][cName]" /></td>
			</tr>
			<tr class="form">
				<td>Category Order</td>
				<td class="form"><input type="text" name="input[categories][cOrder]" /></td>
			</tr>
			<tr class="form">
				<td>Category is Visible</td>
				<td class="form"><select name="input[categories][cVisible]">
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="form">
				<th class="end">Finish</th>
				<th class="formend"><input type="submit" name="submit" value="Create Category" /></th>
			</tr>
			
		</table>
		</div>
	</div>
	</form>
	
	<form action="<?php echo $_SERVER['file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/PHP_SELF']; ?>?cmd=ng" method="post">
	<input type="hidden" name="ignore" value="ignore,submit" />
	<div style="width:360px;float:right">
		<div class="pd" id="ag" style="background:#99BDE6;">
		Add New Game&nbsp; 
		[ <a class="pm" href="javascript:clickit('agtd','ag','0')">-</a>
		<a class="pm" href="javascript:clickit('agtd','ag','1')">+</a> ]
		</div>
		<div class="tabular_data" id="agtd">
		<div class="header" style="text-align:left"><strong>Enter the Data</strong></div>
		<table style="border-collapse: collapse;padding:0;width:100%;">
		
			<tr>
				<th style="width:40%">Request</th>
				<th style="width:60%" class="last">Input</th>
			</tr>
			<tr class="form">
				<td>Game Name</td>
				<td class="form"><input type="text" name="input[games][gName]" /></td>
			</tr>
			<tr class="form">
				<td>Game Order</td>
				<td class="form"><input type="text" name="input[games][gOrder]" /></td>
			</tr>
			<tr class="form">
				<td>Description</td>
				<td class="form"><input type="text" name="input[games][gDescription]" /></td>
			</tr>
			<tr class="form">
				<td>Display (width x height)</td>
				<td class="form"><input type="text" name="input[games][gWidth]" style="width: 50px;" value="400" /> x 
				<input type="text" name="input[games][gHeight]" style="width: 50px;" value="300" /></td>
			</tr>
			<tr class="form">
				<td>Category</td>
				<td class="form"><select name="input[games][gInCategory]">
				<?php
					foreach($sys->gamedata as $category){
						echo '<option value="'.$category['cId'].'">'.$category['cName'].'</option>';
					}
				?>
				</select></td>
			</tr>
			<tr class="form">
				<td>Thumbnail Image</td>
				<td class="form"><select name="input[games][gThumb]">
				<?php
					//echo $sys->imgdir;
					$dir = opendir('../'.$sys->imgdir);
					while(false !== ($file = readdir($dir))){
						if($file != "." && $file != ".." && $file != "Thumbs.db"){
							echo '<option value="'.$file.'">'.$file.'</option>';
						}
					}
					closedir($dir);
				?>
				</select></td>
			</tr>
			<tr class="form">
				<td>Flash (SWF) File</td>
				<td class="form"><select name="input[games][gSwfFile]">
				<?php
					//echo $sys->imgdir;
					$dir = opendir('../'.$sys->swfdir);
					while(false !== ($file = readdir($dir))){
						if($file != "." && $file != ".." && $file != "Thumbs.db"){
							echo '<option value="'.$file.'">'.$file.'</option>';
						}
					}
					closedir($dir);
				?>
				</select></td>
			</tr>
			<tr class="form">
				<td>Game is Visible</td>
				<td class="form"><select name="input[games][gVisible]">
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="form">
				<th class="end">Finish</th>
				<th class="formend"><input type="submit" name="submit" value="Add Game" /></th>
			</tr>
			
		</table>
		</div>
	</div>
	<input type="hidden" name="input[playstats][pgId]" value="<sql_insert_id>" />
	<input type="hidden" name="input[playstats][pcId]" value="{$input['games']['gInCategory']}" />
	</form>
	
	<div style="clear:both;height:20px;">&nbsp;</div>
	
	<div class="pd" id="uf" style="background:#99BDE6;">
	Upload SWF Files and Thumbnails&nbsp; 
		[ <a class="pm" href="javascript:clickit('uftd','uf','0')">-</a>
		<a class="pm" href="javascript:clickit('uftd','uf','1')">+</a> ]
	</div>
	
	<div class="tabular_data" id="uftd">
	<div class="header"><strong>Select a Shockwave Flash File to Upload</strong> (*.swf)</div>
	<table style="border-collapse: collapse;padding:0;width:100%;">
		
		<tr>
			<th>Information</th>
			<th style="width:25%;">Browse For Shockwave Flash File</th>
			<th class="last">Upload</th>
		</tr>
		<form enctype="multipart/form-data" action="<?php echo $_SERVER['file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/PHP_SELF']; ?>?cmd=ulswf" method="post">
		<tr>
			<td>SWF Files will be uploaded to: <em>/<?php echo substr($sys->swfdir,2); ?></em></td>
			<td><input type="file" name="upload" /></td>
			<td class="last"><input type="submit" value="Upload File" /></td>
		</tr>
		</form>
	
	</table>
	
	<div class="header"><strong>Select an Image File to Upload</strong> (*.gif, *.jpg, *.png, *.bmp)</div>
	<table style="border-collapse: collapse;padding:0;width:100%;">
		
		<tr>
			<th>Information</th>
			<th style="width:25%;">Browse For Image File</th>
			<th class="last">Upload</th>
		</tr>
		<form enctype="multipart/form-data" action="<?php echo $_SERVER['file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI77.473/PHP_SELF']; ?>?cmd=ulimg" method="post">
		<tr>
			<td class="end">Image Files will be uploaded to: <em>/<?php echo substr($sys->imgdir,2); ?></em></td>
			<td class="end"><input type="file" name="upload" /></td>
			<td class="lastend"><input type="submit" value="Upload File" /></td>
		</tr>
		</form>
		
	</table>
	</div>
	
	<div style="clear:both;height:20px;">&nbsp;</div>

	<div class="pd" id="ao" style="background:#99BDE6;">
	Existing Categories and Games&nbsp; 
		[ <a class="pm" href="javascript:clickit('aotd','ao','0')">-</a>
		<a class="pm" href="javascript:clickit('aotd','ao','1')">+</a> ]
	</div>
	<div>
		<div class="tabular_data" id="aotd">
		<?php
		
		$loop = 1;
		$total = count($sys->gamedata);
		
		foreach($sys->gamedata as $category){
		
			if($loop == $total){
				$class = ' class="end"';
				$finalclass = ' class="lastend"';
			} else {
				$class = '';
				$finalclass = ' class="last"';
			}
			
			if($category['cName'] != 'Other Games'){
				echo '<div class="header"><strong>'.$category['cName'].'</strong> ( <a href="'.$_SERVER['PHP_SELF'].'?cmd=cedit&id='.$category['cId'].'">Edit</a> | 
				<a href="'.$_SERVER['PHP_SELF'].'?cmd=cdel&id='.$category['cId'].'">Delete</a> | 
				<a href="'.$_SERVER['PHP_SELF'].'?cmd=cempty&id='.$category['cId'].'">Empty</a> |
				<a href="'.$_SERVER['PHP_SELF'].'?cmd=cup&id='.$category['cId'].'">Up</a> | 
				<a href="'.$_SERVER['PHP_SELF'].'?cmd=cdown&id='.$category['cId'].'">Down</a> )</div>';
			} else {
				echo '<div class="header"><strong>'.$category['cName'].'</strong> ( <a href="'.$_SERVER['PHP_SELF'].'?cmd=cempty&id='.$category['cId'].'">Empty</a> )</div>';
			}
			
			echo '<table style="border-collapse: collapse;padding:0;width:100%;">
			<tr>
				<th'.$class.'>Game Id</th>
				<th'.$class.'>Game Name</th>
				<th'.$class.'>SWF File</th>
				<th'.$class.' style="width:15%">Visible</th>
				<th'.$class.'>Played</th>
				<th'.$class.' style="width:7%">Delete</th>
				<th'.$finalclass.' style="width:14%">Order</th>
			</tr>';
			
			
			foreach($category['games'] as $game){
			
				echo '<tr>
					<td'.$class.'>'.$game['gId'].'</td>
					<td'.$class.'>'.$game['gName'].'</td>
					<td'.$class.'>'.$game['gSwfFile'].'</td>
					<td'.$class.' style="width:8%">';
					
					if($game['gVisible'] == 1){
						echo 'yes';
					} else {
						echo 'no';
					}
					
					echo '</td>
					<td'.$class.'>'.$game['Played'].' times</td>
					<td'.$class.' style="width:7%"><a href="'.$_SERVER['PHP_SELF'].'?cmd=delg&id='.$game['gId'].'">Delete</a></td>
					<td'.$finalclass.' style="width:14%"><a href="'.$_SERVER['PHP_SELF'].'?cmd=upg&id='.$game['gId'].'">Up</a> | 
					<a href="'.$_SERVER['PHP_SELF'].'?cmd=downg&id='.$game['gId'].'">Down</a></td>
				</tr>';
			
			}
			
			echo '</table>';
			
			$loop++;
		
		}
		
		
		?>
	
	</div>
	
</div>
</div>
<script type="text/javascript">
clickit('actd','ac','0');
clickit('agtd','ag','0');
</script>
</body>
</html>
