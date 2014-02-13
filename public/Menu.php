<?php
include "includes/functions.php";
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <?php echo $style;?>
    </head>
    <body>
        
        <table class="menuTable">
            <tbody>
                <?php
                $string = '';
                if($oUser->userlevel >= UserlevelConfig::$admin)
                {
                    $string .= <<<EOF
                    <tr>
                        <td>
                            <a href="#">Admin CP</a>
                        </td>
                    </tr>
EOF;
                }

                if($oUser->userlevel >= UserlevelConfig::$moderator)
                {
                    $string .= <<<EOF
                        <tr>
                            <td>
                                <a href="#">Mod CP</a>
                            </td>
                        </tr>
EOF;
                }

                if($oUser->userlevel >= UserlevelConfig::$helpdesk)
                {
                    $string .= <<<EOF
                        <tr>
                            <td>
                                <a href="#">Helpdesk CP</a>
                            </td>
                        </tr>
EOF;
                }

                if($oUser->userlevel >= UserlevelConfig::$forummod)
                {
                    $string .= <<< EOF
                        <tr>
                            <td>
                                <a href="#">Helpdesk CP</a>
                            </td>
                        </tr>
EOF;

                }
                if(!empty($string))
                {
                    echo "<tr><th class='menuHeader'>Control Panels</th>";
                }
                echo $string;

                ?>

                <!-- information -->
                <tr>
                    <th class="menuHeader">Information</th>
                </tr>
                <tr>
                    <td class="menuContent">
                        <a href="news.php" target="main">&gt; News</a><br />
                        <a href="faq.php" target="main">&gt; FAQ</a><br />
                        <a href="online.php" target="main">&gt; Users Online</a> <br />
                        <a href="findplayer.php" target="main">&gt; Find Players</a><br />
                        <a href="gamestats.php" target="main">&gt; Statistics</a><br />
                        <a href="domination.php" target="main">&gt; Domination</a><br />
                        <a href="points.php" target="main">&gt; Points</a><br />
                        <a href="hitlist.php" target="main">&gt; Hitlist</a><br />
                        <a href="missions.php" target="main">&gt; Missions</a><br />
                        <a href="editprofile.php" target="main">&gt; Edit Profile</a><br />
                        <a href="mystats.php" target="main">&gt; My Stats</a><br />
                        <a href="notes.php" target="main">&gt; Notepad</a><br />
                        <a href="attempts.php" target="main">&gt; Attempts</a><br />
                    </td>
                </tr>
                <!-- /information -->
                <!-- communication -->
                <tr>
                    <th class="menuHeader">Communication</th>
                </tr>
                <tr>
                    <td class="menuContent">
                        <a href="app/communication/inbox.php" target="main">&gt; Inbox</a><br />
                        <a href="app/communication/send.php" target="main">&gt; Send message</a><br />
                        <a href="app/communication/forum_frame.php?forum=main" target="main">&gt; Forum</a><br />
                        <a href="app/communication/forum_frame.php?forum=oc" target="main">&gt; OC Forum</a><br />
                        <a href="app/communication/ticket.php" target="main">&gt; Help Desk</a><br />
                        <a href="app/communication/hdo_stats.php" target="main">&gt; HDOP Statistics</a><br />
                        <a href="app/communication/oeticket.php" target="main">&gt; HDOP Corner</a><br />
                        <a href="app/communication/forum_frame.php?forum=main" target="main">&gt; Crew Forum</a><br />
                    </td>
                </tr>
                <!-- /communication -->
                <!-- actions -->
                <tr>
                    <th class="menuHeader">Criminal Center</th>
                </tr>
                <tr>
                    <td class="menuContent">
                        <a href="app/criminal/crime.php" target="main">&gt; Crimes</a><br />
                        <a href="app/criminal/chase.php" target="main">&gt; Getaway</a><br />
                        <a href="app/criminal/jack.php" target="main">&gt; GTA</a><br />
                        <a href="app/criminal/jail.php" target="main">&gt; Jail</a><br />
                        <a href="app/criminal/oc.php" target="main">&gt; OC</a><br />
                        <a href="app/criminal/ext.php" target="main">&gt; Extortion</a><br />
                        <a href="app/criminal/drugs.php" target="main">&gt; Drug Cartel</a><br />
                        <a href="app/criminal/fly.php" target="main">&gt; Travel</a><br />
                        <a href="app/criminal/bf.php" target="main">&gt; Bullet Factory</a><br />
                        <a href="app/criminal/bank.php" target="main">&gt; Bank</a><br />
                        <a href="app/criminal/hospital.php" target="main">&gt; Hospital</a><br />
                        <a href="app/criminal/kill.php" target="main">&gt; Search & Kill</a><br />
                        <a href="app/criminal/safehouse.php" target="main">&gt; Safehouse</a><br />
                        <a href="app/criminal/crew.php" target="main">&gt; Crew</a><br />
                        <a href="app/criminal/buy_crew.php" target="main">&gt; Make Crew</a><br />
                        <a href="app/criminal/crew_cp.php" target="main">&gt; Crew Control Panel</a><br />
                        <a href="app/criminal/blackmarket.php" target="main">&gt; Blackmarket</a><br />
                        <a href="app/criminal/auctions.php" target="main">&gt; Bidding Center</a><br />
                        <a href="app/criminal/garage.php" target="main">&gt; Garage</a><br />
                        <a href="app/criminal/streetracing.php" target="main">&gt; Street Race</a><br />
                        <a href="app/criminal/dealership.php" target="main">&gt; Show Room</a><br />
                        <a href="app/criminal/depot.php" target="main">&gt; Car Mods</a></span></td>
                    </td>
                </tr>
                <!-- /actions -->
                <!-- gambling -->
                <tr>
                    <th class="menuHeader">Gambling</th>
                </tr>
                <tr>
                    <td class="menuContent">
                        <a href="app/gambling/keno.php" target="main">&gt; Keno</a><br />
                        <a href="app/gambling/blackjack.php" target="main">&gt; BlackJack</a><br />
                        <a href="app/gambling/race.php" target="main">&gt; Race Track</a><br />
                        <a href="app/gambling/roulette.php" target="main">&gt; Roulette</a><br />
                        <a href="app/gambling/slots.php" target="main">&gt; Slots</a><br />
                        <a href="app/gambling/lotto.php" target="main">&gt; Lottery</a><br/>
                    </td>
                </tr>
                <!-- /gambling -->
            </tbody>
        </table>
    </body>
</html>