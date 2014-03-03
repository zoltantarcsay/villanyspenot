<div class="doboz">
    <h1>Belépés</h1>
</div>
<div id="msg" class="msg"></div>
<?php
    if (isset($_SESSION["user"])) {
        echo "<script>msg('Bejelentkezve " . $_SESSION["user"] . " néven');</script>";
    }
?>
<form name="belepes" method="POST">
    Felhasználónév: <br>
    <input type='text' name='username'><br>
    Jelszó: <br>
    <input type='password' name='password'><br>
    <input type='submit' name='submit' value='Belépés'>
</form>