<?php $s = "hivatkozasok"; ?>
<article>
    <table>
        <th>Cím</th>
        <th>Hivatkozás</th>
        <?php
            if (!$_GET[sort] == null) {
                $sort = $_GET[sort];
            }
            else {
                $sort = "cim";
            }
            $sql = "SELECT cim, link FROM hivatkozasok ORDER BY $sort";
            $result = @mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr class='col'>";
                    echo "<td>", $row[cim], "</td>";
                    echo "<td><a class='col' href=\"", $row[link], "\" target=\"_blank\">", $row[link], "</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</article>