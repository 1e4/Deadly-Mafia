<?php
include_once "includes/functions.php";

$inboxCount = 0;
$max = 5;
$old = 0;
$rankp = 3;
$percent = round((($rankp-$old)/($max-$old))*100);

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?=$style?>
    </head>
    <body style="background-image: url('images/Statsbg.jpg')">
        <div id="statsbar">
            <?=($inboxCount > 0) ? '<a href="inbox.php" target="main"><img src="images/mail.jpg" border="0"></a>' : ''?>
            <font color="white">Name:   </font><font color="orange"><?=$oUser->username;?></font>
            <font color="white">Rank:   </font><font color="#1589FF"><?=id2rank($oUser->rank);?></font>
            <font color="white">HP:     </font><font color="green"><?=$oUser->health;?></font>
            <font color="white">Crew:   </font><font color="#1589FF"><?=$oUser->crewname;?></font>
            <font color="white">Money:  </font><font color="#FDD017"><?=number_format($oUser->money);?></font>
            <font color="white">Points: </font><font color="#808080"><?=$oUser->points;?></font>
            <font color="white">Loc:    </font><font color="#1589FF"><?=id2location($oUser->location);?></font>
        </div>
    </body>
</html>