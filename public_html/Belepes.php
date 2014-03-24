<div class="doboz">
    <h1>Belépés</h1>
</div>
<?php	
    if (isset($_SESSION["user"])) {
		header ('Location: index.php?p=tartalom&s=szerkeszto');
    }
?>
<div class="formbox">
<form name="belepes" method="POST">
<fieldset>
<legend>Belépés</legend>
    <label for="email">E-mail:</label><input type='text' name='email'><br>
    <label for="password">Jelszó:</label><input type='password' name='password'><br>
    <input id="log_btn" type='submit' name='submit' value='Belépés'>
</fieldset>
</form>
</div>
