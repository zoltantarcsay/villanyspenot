<ul id ="fulek">
    <a href="?p=tartalom&s=fejezetek&reset=1"><li <?= fulClass("fejezetek") ?>>fejezetek</li></a>
    <a href="?p=tartalom&s=tanulmanyok"><li <?= fulClass("tanulmanyok") ?>>tanulmányok</li></a>
    <a href="?p=tartalom&s=allomanyok"><li <?= fulClass("allomanyok") ?>>állományok</li></a>
    <a href="?p=tartalom&s=hivatkozasok"><li <?= fulClass("hivatkozasok") ?>>hivatkozások</li></a>
    <a href="?p=tartalom&s=puskak"><li <?= fulClass("puskak") ?>>puskák</li></a>
	<?php 
	if (isset($_SESSION["user"])) {
	    // couldn't echo the code properly
		include 'ful_szerk.php';
	}
	?>
</ul>
