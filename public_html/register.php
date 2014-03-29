<html>
<head>
<title>Regisztráció</title>
<link rel="stylesheet" href="styles.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
require 'Functions.php';
require 'mysqlConnection.php';
	/* define variables and set to empty values */
	$nameErr = $emailErr = $passwordErr = $checkErr = "";
	$name = $email = $password = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST['checkbox'])) {
			$checkErr = "A feltételeket el kell fogadni a regisztrációhoz!";
			}
			else {
	
			if (empty($_POST["name"])) {
				$nameErr = "*Nincs megadva név!<br>";}
				else {
					$name = test_input($_POST["name"]);
				}
				
			if (empty($_POST["email"])) {
				$emailErr = "*Nincs megadva e-mail cím!<br>";
			}
				else {
					if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",($_POST['email']))) {
						$emailErr2 = "*Nem megfelelő e-mail formátum!<br>";
					}
						else {
							$email = test_input($_POST["email"]);
						}
				}
			
			if (empty($_POST["password"])) {
				$passwordErr = "*Nincs megadva jelszó!<br>";
			}
				else {
					$password = test_input($_POST["password"]);
				}
		}
	}
	
test_input($data);

	if (!empty($name) && ($email) && ($password)) {	
		$sqlexist ="SELECT email 
					FROM felhasznalok 
					WHERE email='$email' ";
		$result = mysql_num_rows(mysql_query($sqlexist));
			if ($result >= 1) {
				$emailErr3 = "*Ez e-mail cím már foglalt!";
			}
				else {
					$sql = 	"INSERT INTO felhasznalok (kod, email, jelszo, nev)
							VALUES (DEFAULT, '$email', '$password', '$name')";
					$result = mysql_query($sql);
					if ($result) {
						echo "<script type='text/javascript'>
							alert('Sikeres regisztráció!');
							location = 'index.php?p=belepes';
						</script>";
						}
					else {
						die('Sikertelen regisztráció: ' . mysql_error());
					}				
				}
	}
?>
<div class="formbox"">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
<legend>Regisztráció</legend>
<label for="name">Név:</label><input type="text" name="name" placeholder="Név" value="<?php echo $name; ?>"><span class="error">* </span><br>
<label for="email">E-mail:</label><input type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>"><span class="error">* </span><br>
<label for="password">Jelszó:</label><input type="password" name="password" placeholder="Jelszó"/><span class="error">* </span><br><br>
<div id="checkbox"><input type="checkbox" name="checkbox" value="checked"/>
	Elfogadom, hogy adataimat külföldi<p id="cecktext">szervereken tárolják.
	<span class="error">* </span></p></div><br>
<input id="reg_btn" type="submit" value="Regisztráció" onclick="register();">
</form>
<div>
<span class="error"> <?php echo $nameErr;?></span>
<span class="error"> <?php echo $emailErr;?></span>
<span class="error"> <?php echo $emailErr2;?></span>
<span class="error"> <?php echo $emailErr3;?></span>
<span class="error"> <?php echo $passwordErr;?></span>
<span class="error"> <?php echo $checkErr;?></span>
</div>
</fieldset>
</div>
</body>
</html>
