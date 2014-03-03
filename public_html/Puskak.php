<?php $s = "fejezetek"; ?>
<article>
    <table>
        <th><a href ="?p=tartalom&s=<?= $s ?>&sort=alcim2">Szerző</a></th>
        <th><a href ="?p=tartalom&s=<?= $s ?>&sort=szerzo">Cím</a></th>
        <th><a href ="?p=tartalom&s=<?= $s ?>&sort=cim">Eredeti fejezet</a></th>
        <?php
            if (!$_GET[sort] == null) {
                $sort = $_GET[sort];
            }
            else {
                $sort = "puskak.szerzo, puskak.cim";
            }
            $sql = "SELECT puskak.kod, puskak.szov_kod, puskak.szerzo, puskak.cim,
                        szovegek.szerzo fszerzo, szovegek.cim fcim
                    FROM puskak, szovegek
                    WHERE puskak.szov_kod = szovegek.kod
                    ORDER BY $sort";
            $result = @mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr class='col'>";
                    echo "<td>", $row[szerzo], "</td>";
                    echo "<td><a class='col' href=\"?s=puskak&p=puska&n=", $row[kod], "\">", $row[cim], "</a></td>";
                    echo "<td><a class='col' href=\"?p=szoveg&n=", $row[szov_kod], "\">", $row[fszerzo], ": ", $row[fcim], "</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</article>
