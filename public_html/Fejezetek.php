<?php $s = "fejezetek"; ?>

<article>
    <table>
        <th><a href ="#" onClick="rendez(<?php echo rendez("alcim2") ?>)">Évszám</a></th>
        <th><a href ="#" onClick="rendez(<?php echo rendez("szerzo") ?>)">Szerző(k)</a></th>
        <th><a href ="#" onClick="rendez(<?php echo rendez("cim") ?>)">Cím</a></th>
        <th><a href ="#" onClick="rendez(<?php echo rendez("alcim") ?>)">Tárgy</a></th>
        <?php
            $sort = ($_SESSION["r"]) ? $_SESSION["r"] : "alcim2, cim";
            $kulcsszavak = $_SESSION["kulcsszavak"];
            if ($kulcsszavak != null) {
                $sql = "SELECT kod, szerzo, cim, alcim, CAST(alcim2 AS SIGNED) alcim2
                        FROM szovegek 
                        WHERE szoveg LIKE '%$kulcsszavak%'
                        OR cim LIKE '%$kulcsszavak%' 
                        ORDER BY $sort";
            }
            else {
                $sql = "SELECT kod, szerzo, cim, alcim, CAST(alcim2 AS SIGNED) alcim2 
                        FROM szovegek 
                        WHERE sztp_kod = 11656 
                        ORDER BY $sort";
            }
            $result = @mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>", $row["alcim2"], "</td>";
                    echo "<td>", $row["szerzo"], "</td>";
                    echo "<td><a href=\"?p=szoveg&n=", $row["kod"], "\">", $row["cim"], "</a></td>";
                    echo "<td>", $row["alcim"], "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</article>
