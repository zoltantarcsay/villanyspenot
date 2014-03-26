<?php

    function processPage() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach($_POST as $postkey => $postvalue) {
                $_SESSION[$postkey] = $postvalue;
			}
            //header( "Location: index.php?p=" . $_SESSION["p"] . "&s=" . $_SESSION["s"]);
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            foreach($_GET as $getkey => $getvalue) {
                $_SESSION[$getkey] = $getvalue;
            }
        }
    }

    function login() {
	    	if ($_SESSION["user"] == null) {
				// changed $_SESSION[''] to _POST[''] because of login bug
				$email = mysql_real_escape_string($_POST['email']);
				$pass = mysql_real_escape_string($_POST['password']);
				$sql = "SELECT email, jelszo, nev 
						FROM felhasznalok 
						WHERE email = '{$email}' 
						AND jelszo = '{$pass}'";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$nev = $row['nev'];
				if (mysql_num_rows($result) == 1) {
					$_SESSION['loggedin'] = "YES";
					$_SESSION['user'] = $nev;
					echo "<script>msg('Sikeres belépés!');</script>";
					resetAttrs("email,password,submit");            
				}
			}	
	}
	
    function logout() {
        session_unset();
        session_destroy();
        header( "Location: index.php");
    }
    
    function rendez($oszlop) {
        if (!strstr($_SESSION["r"], $oszlop)) {
            $rendezes = "asc";
        }
        else {
            $rendezes = strstr($_SESSION["r"], "asc") ? "desc": "asc";
        }
        return "'" . $oszlop . "','" . $rendezes . "'";
    }
    
    function fulClass($fulId) {
        $s = $_SESSION["s"];
        if ($s == $fulId) {
            return "class=\"ful_aktiv\"";
        }
        if ($s == null && $fulId == "fejezetek") {
            return "class=\"ful_aktiv\"";
        }
    }
    
    function resetAttrs($attributes) {
        if ($attributes) {
            foreach (explode(",", $attributes) as $key) {
                if ($key) $_SESSION[$key] = null;
            }
        }
    }
	
	function load_szoveg($cim, $sql, $result, $str_szoveg) {
		processPage();
		$sql = "SELECT szoveg,kod 
				FROM szovegek 
				WHERE cim='$cim' ";					
		$result = mysql_query($sql);
			if ($row = mysql_fetch_assoc($result)) {
				$str_szoveg = $row['szoveg'];
				$kod = $row['kod'];
				echo "<div id='editor'>";
				echo "<div id='menu_cont'><div id='menu_left'><h1>" . $cim . "</h1></div>";
				echo "</div>";
				include 'text_editor.php';
				echo "</div>";
			}
	}
	function update_szoveg($text, $kod) {
		if(isset($_POST['text']) && !empty($_POST['text'])) {
			$text = mysql_real_escape_string($_POST['text']);
			$kod = $_POST['kod'];
			$sql = "UPDATE szovegek 
					SET szoveg='$text' 
					WHERE kod='$kod'";
			$result = mysql_query($sql);
			if ($result) {
				echo "<script>alert('Sikeresen elküldve!');</script>";
			}
			else {
				die('Sikertelen küldés: ' . mysql_error());
			}
		}
	}
	function test_input($data) {
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}	
?>
