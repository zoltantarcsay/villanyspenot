<!DOCTYPE html>

<html>
<head>
<title>Regisztráció</title>
<link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
require 'Functions.php';
require 'mysqlConnection.php';
	// define variables and set to empty values 
	$nameErr = $emailErr = $passwordErr = "";
	$name = $email = $password = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
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
					mysql_query($sql);
					header("location: index.php?p=belepes");
				}
	}
?>
<div class="formbox"">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
<legend>Regisztráció</legend>
<label for="name">Név:</label><input type="text" name="name" value="<?php echo $name; ?>"><span class="error">* </span><br>
<label for="email">E-mail:</label><input type="text" name="email" value="<?php echo $email ?>"><span class="error">* </span><br>
<label for="password">Jelszó:</label><input type="password" name="password"/><span class="error">* </span><br>
<input id="reg_btn" type="submit" value="Regisztráció" onclick="register();">
</form>
<div>
<span class="error"> <?php echo $nameErr;?></span>
<span class="error"> <?php echo $emailErr;?></span>
<span class="error"> <?php echo $emailErr2;?></span>
<span class="error"> <?php echo $emailErr3;?></span>
<span class="error"> <?php echo $passwordErr;?></span>
</div>
</fieldset>
</div>
</body>
</html>
