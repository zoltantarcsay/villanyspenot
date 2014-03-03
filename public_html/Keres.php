<form id="keres" name="keres" method="POST" action="index.php?p=tartalom&s=fejezetek">
    <label for="kulcsszavak">Keresés a fejezetek szövegében:</label>
    <input name="kulcsszavak" type="search" value="<?php echo $_POST[kulcsszavak]; ?>" />
    <input name="r" type="hidden" value="" />
    <input type="submit" value="Keresés" />
</form>