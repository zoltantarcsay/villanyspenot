<?php $s = "allomanyok"; ?>
<article>
    <table>
        <th>Cím</th>
        <th>Méret</th>
        <th>Formátum</th>
        <?php
            if (!$_GET[sort] == null) {
                $sort = $_GET[sort];
            }
            else {
                $sort = "cim";
            }
            $sql = "SELECT cim, link FROM fajlok ORDER BY $sort";
            $result = @mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr class='col'>";
                    echo "<td><a class='col' href=\"", $row[link] , "\">", $row[cim], "</a></td>";
                    $filesize = number_format(round(filesize($row[link]) / 1024), 0, ",", " ");
                    echo "<td>", $filesize, " KB</td>";
                    $fileext = pathinfo($row[link], PATHINFO_EXTENSION);
                    echo "<td>", $fileext, "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</article>