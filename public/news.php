<?php
include "includes/functions.php";  
$user->handleLoginCheck();
$module_name = "news";
include_once "includes/class/{$module_name}.class.php";
$news = new News($db);
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
                foreach($news->getResults() as $key)
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
                ?>
    </body>
</html>