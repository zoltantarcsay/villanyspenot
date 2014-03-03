<?php
    $n = $_SESSION["n"];
    $sql = "SELECT szerzo, cim, szoveg FROM puskak WHERE kod = $n";
    $result = @mysql_query($sql);
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            echo "<div class=\"doboz\">";
            echo $row["szerzo"];
            echo "<h1>", $row["cim"], "</h1>";
            echo "</div>";
            echo "<article>";
            echo $row["szoveg"];
            echo "</article>";
            $footer = "&copy; ".$row["szerzo"]."<br />";
        }
    }
?>