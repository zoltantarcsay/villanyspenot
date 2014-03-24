<html>
<head>
<script type="text/javascript" src="main.js"></script>
<?php if (!isset($_SESSION["user"])) {
	header ('Location: index.php?p=belepes');
	exit;
}
?>
</head>
<body>
<form name="cimek" method="POST">
<select id="fejezetcim" name="cim">
	<?php
	$sql = "SELECT cim, szerzo, alcim, alcim2
			FROM szovegek
			WHERE sztp_kod = 11656
			ORDER BY `szovegek`.`alcim2` ASC";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
	echo "<option>" . $row['cim'] . "</option>";
	} ?>
</select>
<input type='submit' name='submit' value='Megnyit'>
</form>
<?php 
$cim = $_POST['cim'];
load_szoveg($cim, $sql, $result, $str_szoveg);
update_szoveg($text, $kod);
?>
</body>
</html>
