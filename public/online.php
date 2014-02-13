<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */

include "includes/functions.php";
$datetime = (time()-(60*60)*15);

$date = new DateTime();
$date->setTimestamp($datetime);
$date = $date->format('Y-m-d H:i:s');

$total = $db->query("SELECT COUNT(*) AS totalOnline FROM users WHERE online >= '{$date}'")->fetchColumn();
$online = $db->query("SELECT username, users.id, userlevel FROM users INNER JOIN users_master on users.masterid = users_master.id WHERE online >= '{$date}'");
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <?=$style;?>
        </head>
        <body>
            <table width="80%">
                <thead>
                    <tr>
                        <th>Users Online in the past 5 minutes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                            foreach($online as $usersOnline)
                            {
                                switch($usersOnline['userlevel'])
                                {
                                    case 0:
                                        $currentusers[] = "<a href='profile.php?id={$usersOnline['id']}'>{$usersOnline['username']}</a>";
                                    break;
                                    case 1:
                                        $currentusers[] = "<a href='profile.php?id={$usersOnline['id']}'><font color='#adff2f'>{$usersOnline['username']}</font></a>";
                                    break;
                                    case 2:
                                        $currentusers[] = "<a href='profile.php?id={$usersOnline['id']}'><font color='#cd5c5c'>{$usersOnline['username']}</font></a>";
                                    break;
                                    default:
                                        $currentusers[] = "<a href='profile.php?id={$usersOnline['id']}'><font color='#cd5c5c'>{$usersOnline['username']}</font></a>";
                                    break;
                                }
                            }
                            echo implode(', ', $currentusers);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total online: <?php echo number_format($total); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>