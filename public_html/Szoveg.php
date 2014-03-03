<?php
    $n = $_GET[n];
    $sql = "SELECT szerzo, cim, alcim, alcim2, szoveg FROM szovegek WHERE kod = $n";
    $result = @mysql_query($sql);
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            echo "<div class=\"doboz\">";
            echo $row[szerzo];
            echo "<h1>", $row[cim], "</h1>";
            if (!$row[alcim] == null | !$row[alcim2] == null) {
                echo "<h2>", $row[alcim2], ": ", $row[alcim], "</h2>";
            }
            echo "</div>";
            echo "<article>";
            $szoveg = $row[szoveg];
			
					
            $kulcsszavak = trim($_SESSION["kulcsszavak"]);
            echo str_replace($kulcsszavak, '<span class="highlight">'.$kulcsszavak.'</span>', $szoveg);
			
			// $szoveg is already echoed above
            // echo $row[szoveg];
			
            echo "</article>";
            $footer = "&copy;".$row[szerzo]."<br />";
        }
    }
?>