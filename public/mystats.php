<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */

include "includes/functions.php";
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <?=$style;?>
        </head>
        <body>
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Your statistics</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Actions</td>
                        <td>Time left</td>
                        <td>Counter</td>
                    </tr>
                    <tr>
                        <td>Crime</td>
                        <td><?=Functions::timeLeft($oUser->last_crime)?></td>
                        <td><?=$oUser->crimes?></td>
                    </tr>
                    <tr>
                        <td>GTA</td>
                        <td><?=Functions::timeLeft($oUser->last_gta)?></td>
                        <td><?=$oUser->gtas?></td>
                    </tr>
                    <tr>
                        <td>Extortion</td>
                        <td><?=Functions::timeLeft($oUser->last_extortion)?></td>
                        <td><?=$oUser->extortions?></td>
                    </tr>
                    <tr>
                        <td>Race</td>
                        <td><?=Functions::timeLeft($oUser->last_race)?></td>
                        <td><?=$oUser->races?></td>
                    </tr>
                    <tr>
                        <td>Kill attempt</td>
                        <td><?=Functions::timeLeft($oUser->last_kill)?></td>
                        <td><?=$oUser->kills?></td>
                    </tr>
                    <tr>
                        <td>Flight</td>
                        <td><?=Functions::timeLeft($oUser->last_travel)?></td>
                        <td><?=$oUser->travels?></td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>