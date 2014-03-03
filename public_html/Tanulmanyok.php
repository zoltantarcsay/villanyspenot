<?php $s = "tanulmanyok"; ?>
<article>
    <table>
        <th><a href ="?p=tartalom&s=<?= $s ?>&sort=szerzo">Szerző(k)</a></th>
        <th><a href ="?p=tartalom&s=<?= $s ?>&sort=cim">Cím</a></th>
        <?php
            if (!$_GET[sort] == null) {
                $sort = $_GET[sort];
            }
            else {
                $sort = "alcim2, cim";
            }
            $sql = "SELECT kod, szerzo, cim
                    FROM szovegek 
                    WHERE sztp_kod = 11657 
                    ORDER BY $sort";
            $result = @mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>", $row[szerzo], "</td>";
                    echo "<td><a href=\"?s=tanulmanyok&p=szoveg&n=", $row[kod], "\">", $row[cim], "</a></td>";
                    echo "</tr>";

                }
            }
        ?>
    </table>
</article>