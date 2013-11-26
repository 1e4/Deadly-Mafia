<?php
$templates = array();

$templates['category'] = '<div class=\"header\">{$category[\'cName\']}</div>
{$gamedata}';

$templates['game'] = '<div class=\"game\">
<p class=\"img\">
<img src=\"{$this->imgdir}/{$game[\'gThumb\']}\" alt=\"{$game[\'gName\']} - {$game[\'gDescription\']}\" />
</p>
<p class=\"ic\">
<strong>{$game[\'gName\']}</strong>
<br />
{$game[\'gDescription\']}
<br />
<strong><a href=\"{$_SERVER[\'PHP_SELF\']}?act=play&id={$game[\'gId\']}\">Play</a></strong>
</p>
<div style=\"clear:both\"></div>
</div>';
				
				
$templates['gdoublewrapper'] = '<div>
{$games}
<div style=\"clear:both\"></div>
</div>';


$templates['list_wrapper_all'] = '<div class=\"header\">{$action}</div>
<p class=\"general\" style=\"margin-bottom: 10px;\">
{$list}
</p>';

$templates['list_repeat_all'] = '<a href=\"{$_SERVER[\'PHP_SELF\']}?act=play&id={$stat[\'gId\']}\">{$stat[\'gName\']}</a><em>{$extra}</em><br />';

$templates['game_play'] = '
<div class=\"playcenter\">
<p class=\"header\">{$game[\'cName\']} &raquo; {$game[\'gName\']}</p>
<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"{$game[\'gWidth\']}\" height=\"{$game[\'gHeight\']}\">
  <param name=\"movie\" value=\"{$this->swfdir}/{$game[\'gSwfFile\']}\" />
  <param name=\"quality\" value=\"high\" />
  <embed src=\"{$this->swfdir}/{$game[\'gSwfFile\']}\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"{$game[\'gWidth\']}\" height=\"{$game[\'gHeight\']}\"></embed>
</object>
<p class=\"header\">&nbsp;</p>
<p class=\"general\"><strong>Description: </strong>{$game[\'gDescription\']}<br />
<strong>Player: </strong>You are player number {$this->gamedata[$game[\'gInCategory\']][\'games\'][$game[\'gId\']][\'Played\']}</p>
</div>';
?>