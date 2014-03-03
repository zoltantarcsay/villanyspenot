<div class="doboz">
    <h1>
        <?php 
            if ($_SESSION["kulcsszavak"] == null) {
                echo "tartalom";
            }
            else {
                echo "Keresett kifejezés: ", $_SESSION["kulcsszavak"];
            }
        ?>
    </h1>
</div>

<?php
    $s = $_SESSION["s"];
    if ($s == null | $s == "fejezetek" ) {
        include "Fejezetek.php";
    }
    if ($s == "tanulmanyok" ) {
        include "Tanulmanyok.php";
    }
    if ($s == "allomanyok" ) {
        include "Allomanyok.php";
    }
    if ($s == "hivatkozasok" ) {
        include "Hivatkozasok.php";
    }
    if ($s == "puskak" ) {
        include "Puskak.php";
    }
?>