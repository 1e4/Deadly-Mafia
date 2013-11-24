<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php require("system.class.php"); ?>
<?php $sys = new GamesSystem();
if(isset($_GET['act']) && isset($_GET['id']) && $_GET['act'] == 'play'){
	$sys->addPlay($_GET['id']);
}
$sys->Load(); ?>
<html>
<head>




<title>PlayZone</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="screen" href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI03.985/styles.css" />
</head>

<body>
<div class="wrapper">

	<div class="head">

		<div class="top" style="height: auto !important; height: 100%">

			<div class="image">

				<a href="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI03.985/index.php"><img style="border:0" src="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI03.985/title.gif" alt="Header Image" /></a>

			</div>

			<div class="googleads">
<script type="text/javascript"><!--
google_ad_client = "pub-9780028788089339";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_channel ="";
google_color_border = "99BDE6";
google_color_bg = "99BDE6";
google_color_link = "E9592F";
google_color_url = "000000";
google_color_text = "000000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
			</div>

			<div class="clear"></div>

		</div>

		<div class="menu">

			<div style="float: left;margin-top: 3px;margin-left: 5px;">
				<?php
				$plays = $sys->getPlaysToday();
				if($plays != ''){
					?>
					There have been <?php echo $plays; ?> games played today.
					<?php
				} ?>
			</div>

			<div style="float:right">

				<select name="games" id="games" onchange="switchme()">
					<option selected>Select a Game</option>
					<option class="headname" value="<?php echo $_SERVER['PHP_SELF']; ?>">Games List</option>
					<?php
					// makes list of options
					echo $sys->makeOptionList();
					?>
				</select>

			</div>
			<div class="clear"></div>

		</div>

	</div>
<div class="clear"></div>

<div class="clear"></div>

	<div class="body">

		<div class="core">

		<?php

		if(!isset($_GET['act']) || $_GET['act'] != 'play'){
			echo $sys->makeGamesList();
		} else {
			if(isset($_GET['id'])){
				echo $sys->makeGameHtml($_GET['id'], $_GET['cid']);
			} else {
				echo '<div style="margin: 30px;">
				<strong>Error: </strong>Invalid Input<br /><br />
				<a href="'.$_SERVER['PHP_SELF'].'">Click here to return Home</a>
				</div>';
			}
		}

		?>

		</div>

		<div class="right">
			<?php
			echo $sys->doMostPlayed();
			/* for most played, you can also use

			echo $sys->doMostPlayed(x);

			Where x = the ammount of games you wish to display.
			This same methods works for doNewestGames()

			Default for these functions is 10

			*/
			echo $sys->doNewestGames();
			?>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer">

		<?php include("footer.inc.php"); ?>

	</div>


</div>
<!-- Script for select box changes -->
<script type="text/javascript">
<!--<![CDATA[
function switchme(){
	if(document.getElementById('games').value != ''){
		window.location = document.getElementById('games').value;
	}
}
//]]>-->
</script>
</body>
</html>
