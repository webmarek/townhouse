<?php
if (!isset($_SESSION['is_logged_in'])) {
    header('location: ' . ROOT_PATH);
    exit();
}

require_once('assets/php/Roman.php');

function drawTable($picture, $resource)
{

    echo "<br/><table><th colspan = 13><img src='" . ROOT_PATH . "assets/img/flats/resources/" . $picture . ".png' height='45px' width='70px'></th><tr>";

    echo "<td>miesiąc</td>";
    $month = (string)date("n");

    for ($i = 0; $i <= 11; $i++) {

        echo "<td>" . Numbers_Roman::toNumeral($month) . "</td>";

        if ($month <= 11) {
            $month++;
        } elseif ($month === 12) {
            $month = 1;
        }
    }

    echo "</tr><tr>";

    echo "<td>stan</td>";
    for ($i = 0; $i <= 11; $i++) {
        echo "<td>" . $resource[$i] . "</td>";
    }

    echo "</tr></table>";
}

?>

<script src="<?php echo ROOT_URL; ?>assets/js/flats/index.js" type="text/javascript"></script>

<div id='container2'>

    <a href="#" id="scrollup" class="button scroll">&circ;</a>
    <a href="#" id="scrolldown" class="button scroll">&caron;</a>

    <div id="menuContainer">

        <div id="divMenu">
            <ul id="menu">
                <li><a href="#myData">moje dane</a>
                    <ul>
                        <li><a href="#counters">stan liczników wg. miesięcy</a></li>
                        <li><a href="#calculations">zużycie - obliczenia</a></li>
                    </ul>
                </li>
                <li><a href="#shame">kącik wstydu</a>
                    <ul>
                        <li><a href="#trash">ośmiecony trawnik</a></li>
                        <li><a href="#cart">pozostawiony wózek</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>

    <br/>

    <h2 id="myData">●▬▬▬▬๑ MOJE DANE ๑▬▬▬▬▬●</h2>
    <!--<h3><b>۩ DANE NA TEMAT UŻYCIA ۩</b></h3>-->&sect;
    <h3 id="counters"><b>۩ STAN LICZNIKÓW WG. MIESIĘCY ۩</b></h3>

    <br/>

    <b>ciepła woda [m<sup>3</sup>]</b>
    <?php drawTable("hot", $viewmodel['hwater']); ?>

    <b>zimna woda [m<sup>3</sup>]</b>
    <?php drawTable("cold", $viewmodel['cwater']); ?>

    <b>prąd [kWh]</b>;
    <?php drawTable("thunder", $viewmodel['electricity']); ?>

    <br/>

    <h3 id="calculations"><b> ۩ OBLICZENIA ۩</b></h3>

    <table class='costs'>

        <tr>
            <td class='left'><b>cena metra sześciennego ciepłej wody</b>:</td>
            <td>36.00 zł/m<sup>3</sup></td>
        </tr>

        <tr>
            <td class='left'><b>cena metra sześciennego zimnej wody</b>:</td>
            <td>11.50 zł/m<sup>3</sup></td>
        </tr>

        <tr>
            <td class='left'><b>cena kilowatogodziny prądu</b>:</td>
            <td>0.77zł/kWh</td>
        </tr>

        <tr>
            <td class='left'><b>zużycie ciepłej wody w tym miesiącu</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['hwater']; ?> m<sup>3</sup></td>
        </tr>

        <tr>
            <td class='left'><b>zużycie zimnej wody w tym miesiącu</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['cwater']; ?> m<sup>3</sup></td>
        </tr>

        <tr>
            <td class='left'><b>zużycie prądu w tym miesiącu</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['electricity']; ?> kWh</td>
        </tr>

        <tr>
            <td class='left'><b>Twój koszt zużycia ciepłej wody wynosi</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['hwater']; ?> * <?php echo $viewmodel['prices']['hwater']; ?>
                zł/m<sup>3</sup>
                = <?php echo($viewmodel['last_month_usage']['hwater'] * $viewmodel['prices']['hwater']); ?> zł
            </td>
        </tr>

        <tr>
            <td class='left'><b>Twój koszt zużycia zimnej wody wynosi</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['cwater']; ?> * <?php echo $viewmodel['prices']['cwater']; ?>
                zł/m<sup>3</sup>
                = <?php echo($viewmodel['last_month_usage']['cwater'] * $viewmodel['prices']['cwater']); ?> zł
            </td>
        </tr>

        <tr>
            <td class='left'><b>Twój koszt zużycia prądu wynosi</b>:</td>
            <td><?php echo $viewmodel['last_month_usage']['electricity']; ?> kWh
                * <?php echo $viewmodel['prices']['electricity']; ?> zł/kWh
                = <?php echo($viewmodel['last_month_usage']['electricity'] * $viewmodel['prices']['electricity']); ?> zł
            </td>
        </tr>

        <tr>
            <td class='left'><b>Razem do zapłacenia</b>:</td>
            <td><?php echo($viewmodel['last_month_usage']['hwater'] * $viewmodel['prices']['hwater']); ?> zł
                + <?php echo($viewmodel['last_month_usage']['cwater'] * $viewmodel['prices']['cwater']); ?> zł
                + <?php echo($viewmodel['last_month_usage']['electricity'] * $viewmodel['prices']['electricity']); ?> zł
                = <?php echo(($viewmodel['last_month_usage']['hwater'] * $viewmodel['prices']['hwater']) + ($viewmodel['last_month_usage']['cwater'] * $viewmodel['prices']['cwater']) + ($viewmodel['last_month_usage']['electricity'] * $viewmodel['prices']['electricity'])); ?>
                zł
            </td>
        </tr>

    </table>

    <br>

    <h2 id="shame"><b> ●▬▬▬▬๑ KĄCIK WSTYDU ๑▬▬▬▬▬● </b></h2>
    &sect;

    <h3 id="trash">۩ OŚMIECONY TRAWNIK ۩</h3>
    <br>
    <p>Cras rhoncus, augue ut feugiat commodo, mauris dui vestibulum tortor, ac pharetra est ligula vitae ipsum.
        Phasellus id iaculis lectus, ac efficitur dolor. Nam aliquet porttitor est, ut lobortis nisl. Etiam augue mi,
        luctus ut finibus at, eleifend et nulla. Vestibulum luctus urna est, id ornare ex malesuada id. Nam tincidunt
        mauris a finibus aliquam. Aliquam nunc massa, rhoncus congue odio eu, luctus maximus orci. Maecenas a iaculis
        dui, ac vehicula lacus. Vestibulum neque ipsum, finibus nec vestibulum ut, tempor nec purus. Morbi vulputate
        lobortis enim, et sodales urna rhoncus malesuada. Fusce dignissim risus ac tempus luctus. Vivamus sed pharetra
        neque. Praesent eget felis vulputate, tempus augue ut, fringilla nulla.</p>
    <br>
    &sect;
    <br>
    <br>
    <img src="<?php echo ROOT_URL; ?>assets/img/flats/shame/trash.jpg">
    <br>

    <h3 id="cart">۩ WÓZEK ۩</h3>
    <br>
    <p>Proin sagittis pulvinar placerat. Integer facilisis ante quam, sit amet fringilla orci luctus vitae. Sed
        convallis sapien ut velit vestibulum, ac lobortis sapien cursus. Nulla hendrerit dui nisi, nec aliquam ligula
        luctus at. Vivamus blandit sem sit amet diam scelerisque, a facilisis neque venenatis. Duis vestibulum eros id
        urna hendrerit, ut tempor lacus elementum. Aenean dignissim, nibh non volutpat tempor, urna sem sodales justo,
        nec imperdiet diam sem vitae libero. Etiam ornare nec nisl vitae sollicitudin. Phasellus elementum eu erat vel
        posuere. Ut viverra sem odio. Vivamus tempus arcu vitae dictum auctor. Vestibulum mollis nisl eu bibendum
        accumsan. Quisque tincidunt nec neque nec facilisis.</p>
    <br>
    &sect;
    <br>
    <br>
    <img src="<?php echo ROOT_URL; ?>assets/img/flats/shame/cart.png">
    <br>

</div>

