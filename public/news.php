<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */
include "includes/functions.php";
$iNews = $db->query("SELECT COUNT(*) FROM updates")->fetchColumn();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?=$style;?>
    </head>
    <body>
                <?php
                if($iNews > 0)
                {
                    $oNews = $db->query("SELECT * FROM updates ORDER BY id DESC");

                    while($key = $oNews->fetchObject())
                    {
                        echo <<<EOF
                        <table width="80%">
                            <thead>
                                <tr>
                                    <th>{$key->title}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{$key->update}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="signature>Written by {$key->username}</td>
                                </tr>
                            </tfoot>
                        </table>
EOF;
                    }
                }
                ?>
    </body>
</html>